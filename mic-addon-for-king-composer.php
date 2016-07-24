<?php
/*
Plugin Name: Mic Addon for King Composer
Plugin URI: http://webworks.ga/mic-addon/
Description: Mic Addon is collection of shortcodes for king composer
Author: Mic
Author URI: http://webworks.ga/mic-addon/
Version: 1.0.0
*/

if ( ! defined( 'ABSPATH' ) ) exit;


if(!function_exists('is_plugin_active')){
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

if ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ){
    //loading shortcodes
    require_once ( 'helpers/filters.php' );
    require_once ( 'helpers/mic_maps.php' );
    require_once ( 'shortcodes/magnific-gallery/magnific-gallery-shortcode.php' );
    // require_once ( 'shortcodes/before_after/before-after-shortcode.php' );
    // require_once ( 'shortcodes/accordion/accordion-shortcode.php' );
    
} 


add_action( 'admin_init', 'mic_addon_required_plugin' );
function mic_addon_required_plugin() {
    if ( is_admin() && current_user_can( 'activate_plugins' ) &&  !is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
        add_action( 'admin_notices', 'mic_addon_required_plugin_notice' );

        deactivate_plugins( plugin_basename( __FILE__ ) ); 

        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
    }

}

function mic_addon_required_plugin_notice(){
    ?><div class="error"><p>Error! you need to install or activate the <a href="https://wordpress.org/plugins/kingcomposer/">King Composer</a> plugin to run this plugin.</p></div><?php
}



?>