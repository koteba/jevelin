<?php
defined( 'ABSPATH' ) || exit;
if( !class_exists( 'Shufflehound_Theme_Server' ) && is_admin() ) :
	class Shufflehound_Theme_Server {
		public $license;
		public $theme_slug;
		public $theme_version;
		public $version;
		public $cache_key;
		public $cache_allowed;

		public function __construct() {
			global $pagenow;
			$this->license = get_option( 'jevelin_license' );
			$this->theme_slug = 'jevelin';
			$this->cache_key = 'shufflehound_update_cache';
			$this->cache_allowed = true;

			$theme_data = is_child_theme() ? wp_get_theme()->parent() : wp_get_theme();
			$this->version = $this->theme_version = $theme_data->Version;

			if( $this->license ) :
				add_filter( 'site_transient_update_themes', array( $this, 'update' ) );
				// add_action( 'upgrader_process_complete', array( $this, 'purge' ), 10, 2 );

				if( $pagenow == 'update-core.php' && !empty( $_GET['force-check'] ) ) :
					$this->purge();
				endif;
			endif;
		}

		public function request( $type = 'check-update', $purchase_code_custom = '' ){
			$remote = ( $type == 'check-update' ) ? get_transient( $this->cache_key ) : false;
			$purchase_code = $purchase_code_custom ? $purchase_code_custom : $this->license;

			if( false === $remote || !$this->cache_allowed ) :
				$remote = wp_remote_post(
					'https://api.shufflehound.com/v2/themes/jevelin/' . $type,
					[
						'timeout' => 5,
						'headers' => [
							'Accept' => 'application/json'
						],
						'body' => [
							'current_website' => esc_url( home_url() ), // Website where purchase code will be activated
							'theme_version' => $this->theme_version, // Theme version compatibility check
							'php_version' => phpversion(), // PHP version compatibility check
							'license' => $purchase_code, // Purchase code
						],
					]
				);

				if(
					is_wp_error( $remote )
					|| 200 !== wp_remote_retrieve_response_code( $remote )
					|| empty( wp_remote_retrieve_body( $remote ) )
				) {
					if( $type == 'check-update' ) :
						set_transient( $this->cache_key, $remote, ( HOUR_IN_SECONDS * 6 ) );
					endif;

					return false;
				}

				if( $type == 'check-update' ) :
					set_transient( $this->cache_key, $remote, DAY_IN_SECONDS );
				endif;
			endif;

			$remote = json_decode( wp_remote_retrieve_body( $remote ) );

			// Check if license still valid for this website
			if( isset( $remote->remove_license ) && $remote->remove_license == 'remove' ) :
				delete_option( 'jevelin_license' );
				set_transient( $this->cache_key, false, ( HOUR_IN_SECONDS * 6 ) );
				return false;
			endif;

			return $remote;
		}

		public function update( $transient ) {
			if( empty( $transient->checked ) ) :
				return $transient;
			endif;

			$remote = $this->request();

			if(
				$remote
				&& !empty( $remote->version )
				&& version_compare( $this->version, $remote->version, '<' )
				&& version_compare( $remote->requires, get_bloginfo( 'version' ), '<' )
				&& version_compare( $remote->requires_php, PHP_VERSION, '<' )
			) :
				$res = new stdClass();
				$res->theme = $this->theme_slug;
				$res->new_version = $remote->version;
				$res->url = 'https://support.shufflehound.com/';
				$res->package = $remote->download_url;
				$res->requires = $remote->requires;
				$res->requires_php = $remote->requires_php;

				$transient->response[ $this->theme_slug ] = (array)$res;
	    	endif;

			return $transient;
		}

		public function purge(){
			delete_transient( $this->cache_key );
		}

		public function check_license( $purchase_code ) {
			$purchase_code = sanitize_text_field( $purchase_code );
			if( strlen( $purchase_code ) < 20 ) :
				return false;
			endif;

			$remote = $this->request( 'activate', $purchase_code );

			if(
				$remote
				&& !empty( $remote->version )
			) :
				update_option( 'jevelin_license', $purchase_code );
				return true;
			endif;
		}

		public static function get_license() {
			if( get_option( 'jevelin_license' ) ) :
				return true;
			endif;
		}

		public function remove_license() {
			if( $this->license ) :
				$this->request( 'remove-activation', $this->license );
				delete_transient( $this->cache_key );
			endif;

			delete_option( 'jevelin_license' );
		}
	}

	new Shufflehound_Theme_Server();
endif;