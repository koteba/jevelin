<?php
$light_logo = ( jevelin_option_image('logo_light') ) ? jevelin_option_image('logo_light') : $standard_logo;

if( !$light_logo ) :
	$light_logo = jevelin_option_image('logo');
endif;

if( !$light_logo ) :
	$light_logo = get_template_directory_uri().'/img/logo.png';
endif;


$copyrights = '';
$dev = 'https://shufflehound.com';
if( jevelin_option( 'copyright_deveveloper_all', true ) == true ) :
	$copyrights = '<span class="developer-copyrights '.(( jevelin_option('copyright_deveveloper', true) == false ) ? ' sh-hidden' : '' ).'">
		'.esc_html__( 'WordPress Theme built by', 'jevelin' ).' <a href="'.esc_attr( $dev ).'" target="_blank"><strong>'.esc_html__( 'Shufflehound', 'jevelin' ).'</strong>.</a>
		</span>';
endif;
?>
<footer class="amp-wp-footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
	<div class="amp-wp-footer-container">
		<div class="amp-wp-footer-logo">
			<a href="<?php echo esc_url( $this->get( 'home_url' ) ); ?>">
				<span class="amp-wp-footer-logo-img" style="background-image: url( <?php echo esc_url( $light_logo ); ?> );"></span>
			</a>
		</div>

		<div class="amp-wp-footer-copyrights">
			<?php echo do_shortcode( wp_kses_post( $copyrights ) ); ?>
			<span><?php echo wp_kses_post( jevelin_remove_p( jevelin_option('copyright_text') ) ); ?></span>
		</div>

		<a href="#top" class="amp-wp-back-to-top">
			<?php esc_html_e( 'Back to top', 'amp' ); ?>
		</a>
	</div>
</footer>
