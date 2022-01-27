<?php
/**
 * Dashboard - System Status Page
 */
function shufflehound_system_page() {
    sh_tgmpa_header(); ?>

    <div class="shufflehound-dashboard-content">

        <div class="shufflehound-dashboard-message" style="padding: 0; max-width: 100%;">
            <h1 style="margin-top: 3px;">System Status</h1>
            <p style="margin-top: 21px; max-width: 600px;">
                Information about your WordPress installation that can be helpful when debugging
            </p>
        </div>


<?php
/*
** Debugging Code
**
$url = 'https://cdn.shufflehound.com/jevelin/ocdi_wpbakery_files/startup_clean/startup_clean_content.xml';
$response = wp_remote_get(
	$url,
	array( 'timeout' => apply_filters( 'pt-ocdi/timeout_for_downloading_import_file', 20 ) )
);

echo '<h2>Conntection Test</h2>';
if ( is_wp_error( $response ) || 200 !== $response['response']['code'] ) :
    echo 'FAIL';
else :
    echo 'OK';
endif;
*/


$wordpress = array();

// WordPress Home URL
$wordpress[] = array(
'name' => 'Homepage URL',
'version' => get_home_url(),
);


// WordPress Site URL
$wordpress[] = array(
'name' => 'Site URL',
'version' => get_site_url(),
);


// WordPress Version
$wordpress[] = array(
'name' => 'WordPress version',
'version' => get_bloginfo('version'),
);


// WordPress Multisite
$wordpress[] = array(
'name' => 'WordPress multisite',
'type' => ( function_exists( 'is_multisite' ) && is_multisite() ) ? true : false,
);


// WordPress Debugging
$wordpress[] = array(
'name' => 'WordPress debug mode',
'type' => ( defined( 'WP_DEBUG' ) && true === WP_DEBUG ) ? true : false,
);


// WordPress memory limit
$wordpress[] = array(
'name' => 'WordPress memory limit',
'version' => ( defined( 'WP_MEMORY_LIMIT' ) ) ? WP_MEMORY_LIMIT : false,
);


// WordPress language
$wordpress[] = array(
'name' => 'WordPress language',
'version' => get_bloginfo("language"),
);


// WordPress language
$theme = wp_get_theme();
$theme_name = ( $theme->Name ) ? $theme->Name : '';
$theme_version = ( $theme->Version ) ? $theme->Version : '';

$wordpress[] = array(
'name' => 'Theme',
'version' => $theme_name . ' ' . $theme_version
);






$server = array();

// Server Sowtware
$server[] = array(
'name' => 'Server info',
'version' => isset( $_SERVER['SERVER_SOFTWARE'] ) ? $_SERVER['SERVER_SOFTWARE'] : '',
);


// PHP version
$php_description = '';
if( defined('PHP_VERSION') ) :
if( version_compare(PHP_VERSION, '7.0.0') <= 0 ) :
    $php_description = 'Upgrade to version 7.X and improve loading time by up to <strong>100%</strong>';
    $php_status = 0;
elseif( version_compare(PHP_VERSION, '7.1.0') <= 0 ) :
    $php_description = 'Upgrade to version 7.2 and improve loading time by up to <strong>20%</strong>';
    $php_status = 1;
elseif( version_compare(PHP_VERSION, '7.2.0') <= 0 ) :
    $php_description = 'Upgrade to version 7.2 and improve loading time by up to <strong>10%</strong>';
    $php_status = 1;
else:
    $php_status = 1;
endif;
$server[] = array(
    'name' => 'PHP Version',
    'version' => PHP_VERSION,
    'type' => true,
    'desc' => $php_description,
);
endif;


// Opcache
$opcache_status = 0;
$opcache_description = '';
if( function_exists( 'opcache_get_status' ) ) :
$opcache = opcache_get_status( 0 );
if( isset( $opcache['opcache_enabled'] ) && $opcache['opcache_enabled'] == false ) :
    $opcache_status = 0;
    $opcache_description = 'Enable this extension to improve loading time by up to <strong>50%</strong>';
else :
    $opcache_status = 1;
endif;
endif;
$server[] = array(
'name' => 'PHP extension Opcache',
'type' => $opcache_status,
'desc' => $opcache_description,
);


// PHP post max size
$server[] = array(
'name' => 'PHP post max size',
'version' => function_exists( 'ini_get' ) ? ini_get('post_max_size') : '',
);


// PHP upload max size
$server[] = array(
'name' => 'PHP upload max size',
'version' => function_exists( 'ini_get' ) ? ini_get('upload_max_filesize') : '',
);


// PHP time limit
$server[] = array(
'name' => 'PHP time limit',
'version' => function_exists( 'ini_get' ) ? ini_get('max_execution_time') : '',
);

// PHP Max Input Vars
$server[] = array(
'name' => 'PHP Max Input Vars',
'version' => function_exists( 'ini_get' ) ? ini_get('max_input_vars') : '',
);

// MySQL version
global $wpdb;
$mysql_version = empty( $wpdb->use_mysqli ) ? mysql_get_server_info() : mysqli_get_server_info( $wpdb->dbh );
$server[] = array(
'name' => 'MySQL version',
'version' => $mysql_version ? $mysql_version : '',
);


?>
<br>

<h2>WordPress Environment</h2>
<?php
foreach( $wordpress as $item ) :
$name = isset( $item['name'] ) ? $item['name'] : '';
$version = isset( $item['version'] ) ? $item['version'] : '';
$type = isset( $item['type'] ) ? $item['type'] : '';
?>

<div style="display: flex; padding: 5px 0;">
    <div style="width: 40%;">
        <?php echo $name; ?>:
    </div>
    <div style="width: 60%;">
        <?php
            echo $version . ' ';

            if( $type === true || $type == 1 ) :
                echo '<i class="icon icon-check" style="color: #00b50f;"></i><span style="color: #fff;">Enabled</span>';
            elseif( $type === false ) :
                echo '<i class="icon icon-close"></i><span style="color: #fff;">Disabled</span>';
            endif;
        ?>
    </div>
</div>

<?php endforeach; ?>

<br>

<h2>Server Environment</h2>
<?php
foreach( $server as $item ) :
$name = isset( $item['name'] ) ? $item['name'] : '';
$version = isset( $item['version'] ) ? $item['version'] : '';
$type = isset( $item['type'] ) ? $item['type'] : '';
?>

<div style="display: flex; padding: 5px 0;">
    <div style="width: 40%;">
        <?php echo $name; ?>:
    </div>
    <div style="width: 60%;">
        <?php
            echo $version . ' ';

            if( $type === true || $type == 1 ) :
                echo '<i class="icon icon-check" style="color: #00b50f;"></i><span style="color: #fff;">Enabled</span>';
            elseif( $type === false ) :
                echo '<i class="icon icon-close"></i><span style="color: #fff;">Disabled</span>';
            endif;
        ?>
    </div>
</div>

<?php endforeach; ?>




    </div>
<?php }
