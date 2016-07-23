<?php

//Loading CSS and JS
add_action( 'wp_enqueue_scripts', 'usa_before_after_shortcode_css_js' );
function usa_before_after_shortcode_css_js() {

    wp_enqueue_style('ba_css', plugins_url( 'css/before-after.css' , __FILE__ ) );
    wp_enqueue_script('usa_event_move', plugins_url('js/jquery.event.move.js', __FILE__), array('jquery'), '', false);
    wp_enqueue_script('usa_twentytwenty_js', plugins_url('js/jquery.twentytwenty.js', __FILE__), array('jquery'), '', false );
    
}


add_action('init', 'usa_before_after_shortcode_init', 99 );
 
function usa_before_after_shortcode_init(){
 
    global $kc;
    $kc->add_map(
        array(
            'usa_before_after' => array(
                'name' => 'Image Before After',
                'description' => __('flexible image before after shortcode', 'KingComposer'),
                'icon' => 'fa-ellipsis-h',
                'css_box' => true,
                'category' => 'Ultimate Shortcodes Addon',
                'params' => array(
                    array(
                        'name' => 'before_image',
                        'label' => 'Before Image',
                        'type' => 'attach_image',
                    ),
                    array(
                        'name' => 'after_image',
                        'label' => 'After Image',
                        'type' => 'attach_image',
                    ),
                )
            )
        )
    );
} 


// Register Before After Shortcode
function usa_before_after_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
    
        'before_image' => '',
        'after_image' => '',
        
    ), $atts) );
    
    $before_image = wp_get_attachment_image_src( $before_image, 'full' );
    $after_image = wp_get_attachment_image_src( $after_image, 'full' );
    
    $id = rand(1, 10000000);            
        
    $output = ' <div class="'.esc_attr( $atts['css'] ).'" id="container_'.$id.'">
                  <img src="'.$before_image[0].'">
                  <img src="'.$after_image[0].'">
                </div>';
    
    $output .= '<script>
                jQuery(window).load(function() {
                  jQuery("#container_'.$id.'").twentytwenty();
                });
            </script>';
                
    
    return $output;
}


add_shortcode('usa_before_after', 'usa_before_after_shortcode'); 
