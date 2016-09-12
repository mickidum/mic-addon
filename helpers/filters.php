<?php 

add_filter( 'shortcode_mic_gallery', 'mic_gallery_filter' );
// This filter will run before wp_header
 
function mic_gallery_filter( $atts ){

  wp_enqueue_style('mic-gallery-css', plugin_dir_url(__DIR__). '/vendor/magnific-popup/dist/magnific-popup.css', false, '1.0' );
  wp_enqueue_script('mic-gallery-js', plugin_dir_url(__DIR__). '/vendor/magnific-popup/dist/jquery.magnific-popup.min.js',array('jquery'), true, '1.0' );
  wp_enqueue_script('mic-gallery-custom-js', plugin_dir_url(__DIR__). '/vendor/magnific-popup/dist/custom.js',array('mic-gallery-js'), true, '1.0' );
				
    
	if( isset( $atts['foundation'] ) && $atts['foundation'] == 'yes' ){
    
        wp_enqueue_style('mic-gallery-foundation-css', plugin_dir_url(__DIR__). '/vendor/foundation/foundation.min.css', false, '1.0' );
        wp_enqueue_script('mic-gallery-foundation-js', plugin_dir_url(__DIR__). '/vendor/foundation/foundation.min.js', array('jquery'), false, '1.0' );
      }

    return $atts;
}

?>