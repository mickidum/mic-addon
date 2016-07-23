<?php

//Loading CSS and JS
add_action( 'wp_enqueue_scripts', 'usa_accordion_shortcode_css_js' );
function usa_accordion_shortcode_css_js() {
	
    wp_enqueue_style( 'usa_accordion_bootstrap', ( 'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' ) );
    wp_enqueue_style( 'usa_accordion_font_awesome', ( 'http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css' ) );
    wp_enqueue_style('usa_accordion_css', plugins_url( 'css/style.css' , __FILE__ ) );
    wp_enqueue_script('usa_accordion_js', plugins_url('js/paccordion.js', __FILE__), array('jquery'), '', false);
    
}


add_action('init', 'usa_accordion_shortcode_init', 99 );
 
function usa_accordion_shortcode_init(){
 
    global $kc;
    $kc->add_map(
        array(
            'usa_accordion' => array(
                'name' => 'Accordion',
                'description' => __('Modern style accordion', 'KingComposer'),
                'icon' => 'fa-ellipsis-h',
                'css_box' => true,
                'category' => 'Ultimate Shortcodes Addon',
                'params' => array(
				
				
                    array(
                        'name' => 'title_color',
                        'label' => 'Title Color',
                        'type' => 'color_picker',
                        'value' => '#ffffff',
                        'admin_label' => true,
                    ),            
                    array(
                        'name' => 'descr_color',
                        'label' => 'Description Color',
                        'type' => 'color_picker',
                        'value' => '#ffffff',
                        'admin_label' => true,
                    ),
                                
                    // Title Background Color
                    array(
                        'name' => 'title_bg_color',
                        'label' => 'Title Background Color',
                        'type' => 'color_picker',
                        'value' => '#1ABC9C',
                        'admin_label' => true,
                    ),
					
					//Description Background Color
			    	array(
                        'name' => 'descr_bg_color',
                        'label' => 'Description Background Color',
                        'type' => 'color_picker',
                        'value' => '#16A085',
                        'admin_label' => true,
                    ),
					
					array(
                        'name' => 't_f_size',
                        'label' => 'Title Font Size',
                        'type' => 'number_slider',
                        'options' => array(
                            'min' => 1,
                            'max' => 50,
                            'unit' => 'px',
                            'show_input' => true,
                            
                        ),
                        'value' => '18'
                    ),
					
										
					array(
                        'name' => 'd_f_size',
                        'label' => 'Description Font Size',
                        'type' => 'number_slider',
                        'options' => array(
                            'min' => 1,
                            'max' => 30,
                            'unit' => 'px',
                            'show_input' => true,
                            
                        ),
                        'value' => '14'
                    ),
				
            		array(
                        'type'            => 'group',
                        'label'            => __('Add Accordion Items', 'KingComposer'),
                        'name'            => 'options',
                        'description'    => __( 'Repeat this fields', 'KingComposer' ),
                        'params' => array(
                                array(
                                    'name' => 'title',
                                    'label' => 'Title',
                                    'type' => 'text',
            						'value' => 'title goes here',
                                ),
                                array(
                                    'name' => 'descr',
                                    'label' => 'Description',
                                    'type' => 'editor',
            						//'value' => base64_encode( 'description goes here' ),
                                ),						
                				array(
                                    'name' => 'act_accordion',
                                    'label' => 'Active Item?',
                                    'type' => 'checkbox',
                                    'options' => array(
                                    'active' => 'Yes',
                                    )
                                    ),	
            					),
            				),	
					
                )
            )
        )
    );
} 

// Register Before After Shortcode
function usa_accordion_shortcode( $atts, $content ){
    extract( shortcode_atts( array(
    
		'title' => '',
        'descr' => '',
        'title_color' => '',
        'descr_color' => '',
        'acc_bg_color' => '',
        't_f_size' => '',
        'd_f_size' => '',
        'title_bg_color' => '',
        'descr_bg_color' => '',
        'act_accordion' => '',
        
    ), $atts) );


$options = $atts['options'];

$output = '<div class="accordion-wrapper '.esc_attr( $atts['css'] ).'">';


    if( isset( $options ) ){
        
   
        foreach( $options as $option ){
  
            $output .='<div class="ac-pane '. $option->act_accordion.'">
    			        <a style="background-color:'.$title_bg_color.';" href="#" class="ac-title" data-accordion="true">
            				<span style="color:'.$title_color.';  font-size:'.$t_f_size.';">'.$option->title.'</span>
            				<i class="fa"></i>
        			    </a>
                			<div style="color:'.$descr_color.'; background:'.$descr_bg_color.';" class="ac-content">
                				'.$option->descr.'
                			</div>
        		</div>
        		';
	    }
    }

    $output .='</div>';		  
    
    return $output;
}


add_shortcode('usa_accordion', 'usa_accordion_shortcode'); 
