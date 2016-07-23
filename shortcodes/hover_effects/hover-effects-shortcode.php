<?php

//Loading CSS
add_action( 'wp_enqueue_scripts', 'usa_hover_effects_shortcode_css' );
function usa_hover_effects_shortcode_css() {

    wp_enqueue_style('he_stylesheet', plugins_url( 'css/ihover.css' , __FILE__ ) );
    
}


add_action('init', 'usa_hover_effects_shortcode_init', 99 );
 
function usa_hover_effects_shortcode_init(){
 
    global $kc;
    $kc->add_map(
        array(
        
            'usa_hover_effects' => array(
            
                'name' => 'Hover Effects',
                'description' => __('Display hover effects on images', 'KingComposer'),
                'icon' => 'fa-picture-o',
                //'is_container' => true,
                'category' => 'Ultimate Shortcodes Addon',
                //'css_box'    => true,
                
                'params' => array(
                    array(
                        'name' => 'hover_image',
                        'label' => 'Hover Image',
                        'type' => 'attach_image',
                    ),
                    array(
                        'name' => 'hover_heading',
                        'label' => 'Heading',
                        'type' => 'text',
                        'value' => __('Heading Here', 'KingComposer')
                    ),
                    array(
                        'name' => 'hover_desc',
                        'label' => 'Description',
                        'type' => 'text',
                        'value' => __('description here', 'KingComposer')
                    ),
                    array(
                        'name' => 'custom_link',
                        'label' => 'Custom Link?',
                        'type' => 'checkbox',
                        'options' => array(
                            'yes' => 'Yes',
                        ),
                    ),
                    array(
                        'name' => 'hover_link',
                        'label' => 'Image Link',
                        'type' => 'text',
                        'relation' => array(
                            'parent' => 'custom_link',
                            'show_when' => 'yes'
                            ),
                    ),
                    array(
                        'name' => 'link_new_tab',
                        'label' => 'Open Link in New Tab?',
                        'type' => 'checkbox',
                        'options' => array(
                            '_blank' => 'Yes',
                        ),                        
                        'relation' => array(
                            'parent' => 'custom_link',
                            'show_when' => 'yes'
                            ),
                    ),
                    array(
                        'name' => 'hover_style',
                        'label' => 'Select Style',
                        'type' => 'select',
                        //'value' => 'bg_img', // Set default is value_2, remove this if you dont need to set default                     
                        'options' => array(
                             'none' => 'None',
                             'circle' => 'Circle',
                             'square' => 'Square',
                        ),

                    ),
                    array(
                        'name' => 'hover_effect',
                        'label' => 'Select Effect',
                        'type' => 'select',                       
                        'options' => array(
                             'effect1' => 'Effect 1',
                             'effect2' => 'Effect 2',
                             'effect3' => 'Effect 3',
                             'effect4' => 'Effect 4',
                             'effect5' => 'Effect 5',
                             'effect6' => 'Effect 6',
                             'effect7' => 'Effect 7',
                             'effect8' => 'Effect 8',
                             'effect9' => 'Effect 9',
                             'effect10' => 'Effect 10',
                             'effect11' => 'Effect 11',
                             'effect12' => 'Effect 12',
                             'effect13' => 'Effect 13',
                             'effect14' => 'Effect 14',
                             'effect15' => 'Effect 15',
                             'effect16' => 'Effect 16',
                             'effect17' => 'Effect 17',
                             'effect18' => 'Effect 18',
                             'effect19' => 'Effect 19',
                             'effect20' => 'Effect 20',
                        ),
                        'relation' => array(
                            'parent' => 'hover_style',
                            'show_when' => 'circle',
                            ),                        
                            
                    ),
                    array(
                        'name' => 'hover_effect_square',
                        'label' => 'Select Effect',
                        'type' => 'select',                       
                        'options' => array(
                             'effect1' => 'Effect 1',
                             'effect2' => 'Effect 2',
                             'effect3' => 'Effect 3',
                             'effect4' => 'Effect 4',
                             'effect5' => 'Effect 5',
                             'effect6' => 'Effect 6',
                             'effect7' => 'Effect 7',
                             'effect8' => 'Effect 8',
                             'effect9' => 'Effect 9',
                             'effect10' => 'Effect 10',
                             'effect11' => 'Effect 11',
                             'effect12' => 'Effect 12',
                             'effect13' => 'Effect 13',
                             'effect14' => 'Effect 14',
                             'effect15' => 'Effect 15',
                        ),
                        'relation' => array(
                            'parent' => 'hover_style',
                            'show_when' => 'square',
                            ),                        
                            
                    ),                    
                    array(
                        'name' => 'hover_animation',
                        'label' => 'Animation Direction',
                        'type' => 'select',                    
                        'options' => array(
                             'left_to_right' => 'Left to Right',
                             'right_to_left' => 'Right to Left',
                             'top_to_bottom' => 'Top to Bottom',
                             'bottom_to_top' => 'Bottom to Top',
                        ),
                        'relation' => array(
                            'parent' => 'hover_style',
                            'show_when' => 'circle',
                            ),                        

                    ),
                    array(
                        'name' => 'hover_animation_square',
                        'label' => 'Animation Direction',
                        'type' => 'select',                    
                        'options' => array(
                             'left_to_right' => 'Left to Right',
                             'right_to_left' => 'Right to Left',
                             'top_to_bottom' => 'Top to Bottom',
                             'bottom_to_top' => 'Bottom to Top',
                             'left_and_right' => 'Left & Right',
                        ),
                        'relation' => array(
                            'parent' => 'hover_style',
                            'show_when' => 'square',
                            ),                        

                    ),                    
                    array(
                        'name' => 'hover_image_width',
                        'label' => 'Image Width',
                        'type' => 'number_slider',
                        'options' => array(
                            'min' => 50,
                            'max' => 1000,
                            'unit' => 'px',
                            'show_input' => true
                        ),
                        'value' => 300,
                        'description' => 'use custom image width, default is 300px'
                    ),
                    array(
                        'name' => 'hover_image_height',
                        'label' => 'Image Height',
                        'type' => 'number_slider',
                        'options' => array(
                            'min' => 50,
                            'max' => 1000,
                            'unit' => 'px',
                            'show_input' => true
                        ),
                        'value' => 300,
                        'description' => 'use custom image height, default is 300px'
                    ),
                    array(
                        'name' => 'bg_color',
                        'label' => 'Background Color',
                        'type' => 'color_picker',
                        //'value' => '#F2F2F2',
                        //'description' => 'default color is #F2F2F2'
                    ),                                                             
                    array(
                        'name' => 'remove_border',
                        'label' => 'Remove Border?',
                        'type' => 'checkbox',
                        'options' => array(
                            'yes' => 'Yes',
                        ),
                    ),                    
                    array(
                        'name' => 'remove_hor_line',
                        'label' => 'Remove Horizontal Line?',
                        'type' => 'checkbox',
                        'options' => array(
                            'none' => 'Yes',
                        ),
                    ),                     
                    array(
                        'name' => 'heading_font_size',
                        'label' => 'Heading Font Size',
                        'type' => 'number_slider',
                        'options' => array(
                            'min' => 1,
                            'max' => 50,
                            'unit' => 'px',
                            'show_input' => true
                        ),
                        'value' => 15,
                        'description' => 'use custom heading font size, default is 15px'
                    ),
                    array(
                        'name' => 'heading_color',
                        'label' => 'Heading Color',
                        'type' => 'color_picker',
                        'value' => '#F2F2F2',
                        'description' => 'default color is #F2F2F2'
                    ),                    
                    array(
                        'name' => 'desc_font_size',
                        'label' => 'Description Font Size',
                        'type' => 'number_slider',
                        'options' => array(
                            'min' => 1,
                            'max' => 50,
                            'unit' => 'px',
                            'show_input' => true
                        ),
                        'value' => 12,
                        'description' => 'use custom description font size, default is 12px'
                    ), 
                    array(
                        'name' => 'description_color',
                        'label' => 'Description Color',
                        'type' => 'color_picker',
                        'value' => '#F2F2F2',
                        'description' => 'default color is #F2F2F2'
                    ),                     
                    
                    
                )
            )
        )
    );
}

// Register Hover Shortcode
function usa_hover_image_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
    
        'hover_image' => '',
        'hover_heading' => '',
        'hover_desc' => '',
        'custom_link' => '',
        'hover_link' => '',
        'link_new_tab' => '',
        'hover_style' => '',
        'hover_effect' => '',
        'hover_effect_square' => '',
        'hover_animation' => '',
        'hover_animation_square' => '',
        'bg_color' => '',
        'hover_image_width' => '',
        'hover_image_height' => '',
        'remove_border' => '',
        'remove_hor_line' => '',
        'heading_font_size' => '',
        'heading_color' => '',
        'desc_font_size' => '',
        'description_color' => '',
        
    ), $atts) );
    
    $hover_image = wp_get_attachment_image_src( $hover_image, 'full' );
    
    
    if ( $hover_style=='circle' && $hover_effect=='effect1' ){
        
        $output ='<div class="ih-item circle effect1">
                    <a target="'.$link_new_tab.'" href="'.$hover_link.'">
                        <div class="spinner"></div>
                        <div class="img"><img src="'.$hover_image[0].'"></div>
                        <div class="info" style="background: '.$bg_color.'">
                          <div class="info-back">
                            <h3 style=" font-size: '.$heading_font_size.'; color:'.$heading_color.'; ">'.$hover_heading.'</h3>
                            <p style=" font-size: '.$desc_font_size.'; color:'.$description_color.'; border: '.$remove_hor_line.' ">'.$hover_desc.'</p>
                          </div>
                        </div>
                    </a>
                </div>';
    
    }
    else if ( $hover_style=='circle' && $hover_effect=='effect2' ){
        
        $output ='<div class="ih-item circle effect2 '.$hover_animation.'">
                    <a target="'.$link_new_tab.'" href="'.$hover_link.'">
                        <div class="img"><img src="'.$hover_image[0].'"></div>
                        <div class="info" style="background: '.$bg_color.'">
                           <h3 style=" font-size: '.$heading_font_size.'; color:'.$heading_color.'; ">'.$hover_heading.'</h3>
                            <p style=" font-size: '.$desc_font_size.'; color:'.$description_color.'; border: '.$remove_hor_line.' ">'.$hover_desc.'</p>
                        </div>
                    </a>
                </div>';
        
    }
    else if ( $hover_style=='circle' && $hover_effect=='effect3' ){
        
        $output ='<div class="ih-item circle effect3 '.$hover_animation.'">
                    <a target="'.$link_new_tab.'" href="'.$hover_link.'">
                        <div class="img"><img src="'.$hover_image[0].'"></div>
                        <div class="info" style="background: '.$bg_color.'">
                          <h3 style=" font-size: '.$heading_font_size.'; color:'.$heading_color.'; ">'.$hover_heading.'</h3>
                          <p style=" font-size: '.$desc_font_size.'; color:'.$description_color.'; border: '.$remove_hor_line.' ">'.$hover_desc.'</p>
                        </div>
                    </a>
                </div>';
        
    }
    else if ( $hover_style=='circle' && $hover_effect=='effect4' ){
        
        $output ='<div class="ih-item circle effect4 '.$hover_animation.'">
                    <a target="'.$link_new_tab.'" href="'.$hover_link.'">
                        <div class="img"><img src="'.$hover_image[0].'"></div>
                        <div class="info" style="background: '.$bg_color.'">
                          <h3 style=" font-size: '.$heading_font_size.'; color:'.$heading_color.'; ">'.$hover_heading.'</h3>
                          <p style=" font-size: '.$desc_font_size.'; color:'.$description_color.'; border: '.$remove_hor_line.' ">'.$hover_desc.'</p>
                        </div>
                    </a>
                </div>';
        
    }
    else if ( $hover_style=='circle' && $hover_effect=='effect5' ){
        
        $output ='<div class="ih-item circle effect5 '.$hover_animation.'">
                    <a target="'.$link_new_tab.'" href="'.$hover_link.'">
                        <div class="img"><img src="'.$hover_image[0].'"></div>
                        <div class="info" style="background: '.$bg_color.'">
                        <div class="info-back">
                          <h3 style=" font-size: '.$heading_font_size.'; color:'.$heading_color.'; ">'.$hover_heading.'</h3>
                          <p style=" font-size: '.$desc_font_size.'; color:'.$description_color.'; border: '.$remove_hor_line.' ">'.$hover_desc.'</p>
                        </div>
                        </div>
                    </a>
                </div>';
        
    }    
    else if ( $hover_style=='circle' && $hover_effect=='effect6' ){
        
        $output ='<div class="ih-item circle effect6 '.$hover_animation.'">
                    <a target="'.$link_new_tab.'" href="'.$hover_link.'">
                        <div class="img"><img src="'.$hover_image[0].'"></div>
                        <div class="info" style="background: '.$bg_color.'">
                          <h3 style=" font-size: '.$heading_font_size.'; color:'.$heading_color.'; ">'.$hover_heading.'</h3>
                          <p style=" font-size: '.$desc_font_size.'; color:'.$description_color.'; border: '.$remove_hor_line.' ">'.$hover_desc.'</p>
                        </div>
                    </a>
                </div>';
        
    }
    else if ( $hover_style=='circle' && $hover_effect=='effect7' ){
        
        $output ='<div class="ih-item circle effect7 '.$hover_animation.'">
                    <a target="'.$link_new_tab.'" href="'.$hover_link.'">
                        <div class="img"><img src="'.$hover_image[0].'"></div>
                        <div class="info" style="background: '.$bg_color.'">
                          <h3 style=" font-size: '.$heading_font_size.'; color:'.$heading_color.'; ">'.$hover_heading.'</h3>
                          <p style=" font-size: '.$desc_font_size.'; color:'.$description_color.'; border: '.$remove_hor_line.' ">'.$hover_desc.'</p>
                        </div>
                    </a>
                </div>';
        
    }    
    else if ( $hover_style=='circle' && $hover_effect=='effect8' ){
        
        $output ='<div class="ih-item circle effect8 '.$hover_animation.'">
                    <a target="'.$link_new_tab.'" href="'.$hover_link.'">
                        <div class="img-container">
                        <div class="img"><img src="'.$hover_image[0].'"></div>
                        </div>
                        <div class="info-container">
                        <div class="info" style="background: '.$bg_color.'">
                          <h3 style=" font-size: '.$heading_font_size.'; color:'.$heading_color.'; ">'.$hover_heading.'</h3>
                          <p style=" font-size: '.$desc_font_size.'; color:'.$description_color.'; border: '.$remove_hor_line.' ">'.$hover_desc.'</p>
                        </div>
                        </div>
                    </a>
                </div>';
        
    }
    else if ( $hover_style=='circle' && $hover_effect=='effect9' ){
        
        $output ='<div class="ih-item circle effect9 '.$hover_animation.'">
                    <a target="'.$link_new_tab.'" href="'.$hover_link.'">
                        <div class="img"><img src="'.$hover_image[0].'"></div>
                        <div class="info" style="background: '.$bg_color.'">
                          <h3 style=" font-size: '.$heading_font_size.'; color:'.$heading_color.'; ">'.$hover_heading.'</h3>
                          <p style=" font-size: '.$desc_font_size.'; color:'.$description_color.'; border: '.$remove_hor_line.' ">'.$hover_desc.'</p>
                        </div>
                    </a>
                </div>';
        
    }                 
    else if ( $hover_style=='circle' && $hover_effect=='effect10' ){
        
        $output ='<div class="ih-item circle effect10 '.$hover_animation.'">
                    <a target="'.$link_new_tab.'" href="'.$hover_link.'">
                        <div class="img"><img src="'.$hover_image[0].'"></div>
                        <div class="info" style="background: '.$bg_color.'">
                          <h3 style=" font-size: '.$heading_font_size.'; color:'.$heading_color.'; ">'.$hover_heading.'</h3>
                          <p style=" font-size: '.$desc_font_size.'; color:'.$description_color.'; border: '.$remove_hor_line.' ">'.$hover_desc.'</p>
                        </div>
                    </a>
                </div>';
        
    }                
    else if ( $hover_style=='circle' && $hover_effect=='effect11' ){
        
        $output ='<div class="ih-item circle effect11 '.$hover_animation.'">
                    <a target="'.$link_new_tab.'" href="'.$hover_link.'">
                        <div class="img"><img src="'.$hover_image[0].'"></div>
                        <div class="info" style="background: '.$bg_color.'">
                          <h3 style=" font-size: '.$heading_font_size.'; color:'.$heading_color.'; ">'.$hover_heading.'</h3>
                          <p style=" font-size: '.$desc_font_size.'; color:'.$description_color.'; border: '.$remove_hor_line.' ">'.$hover_desc.'</p>
                        </div>
                    </a>
                </div>';
        
    }                
    else if ( $hover_style=='circle' && $hover_effect=='effect12' ){
        
        $output ='<div class="ih-item circle effect12 '.$hover_animation.'">
                    <a target="'.$link_new_tab.'" href="'.$hover_link.'">
                        <div class="img"><img src="'.$hover_image[0].'"></div>
                        <div class="info" style="background: '.$bg_color.'">
                          <h3 style=" font-size: '.$heading_font_size.'; color:'.$heading_color.'; ">'.$hover_heading.'</h3>
                          <p style=" font-size: '.$desc_font_size.'; color:'.$description_color.'; border: '.$remove_hor_line.' ">'.$hover_desc.'</p>
                        </div>
                    </a>
                </div>';
        
    }
    else if ( $hover_style=='circle' && $hover_effect=='effect13' ){
        
        $output ='<div class="ih-item circle effect13 '.$hover_animation.'">
                    <a target="'.$link_new_tab.'" href="'.$hover_link.'">
                        <div class="img"><img src="'.$hover_image[0].'"></div>
                        <div class="info" style="background: '.$bg_color.'">
                        <div class="info-back">
                          <h3 style=" font-size: '.$heading_font_size.'; color:'.$heading_color.'; ">'.$hover_heading.'</h3>
                          <p style=" font-size: '.$desc_font_size.'; color:'.$description_color.'; border: '.$remove_hor_line.' ">'.$hover_desc.'</p>
                        </div>
                        </div>
                    </a>
                </div>';
        
    }    
    else if ( $hover_style=='circle' && $hover_effect=='effect14' ){
        
        $output ='<div class="ih-item circle effect14 '.$hover_animation.'">
                    <a target="'.$link_new_tab.'" href="'.$hover_link.'">
                        <div class="img"><img src="'.$hover_image[0].'"></div>
                        <div class="info" style="background: '.$bg_color.'">
                          <h3 style=" font-size: '.$heading_font_size.'; color:'.$heading_color.'; ">'.$hover_heading.'</h3>
                          <p style=" font-size: '.$desc_font_size.'; color:'.$description_color.'; border: '.$remove_hor_line.' ">'.$hover_desc.'</p>
                        </div>
                    </a>
                </div>';
        
    }    
    else if ( $hover_style=='circle' && $hover_effect=='effect15' ){
        
        $output ='<div class="ih-item circle effect15 '.$hover_animation.'">
                    <a target="'.$link_new_tab.'" href="'.$hover_link.'">
                        <div class="img"><img src="'.$hover_image[0].'"></div>
                        <div class="info" style="background: '.$bg_color.'">
                          <h3 style=" font-size: '.$heading_font_size.'; color:'.$heading_color.'; ">'.$hover_heading.'</h3>
                          <p style=" font-size: '.$desc_font_size.'; color:'.$description_color.'; border: '.$remove_hor_line.' ">'.$hover_desc.'</p>
                        </div>
                    </a>
                </div>';
        
    }    
    else if ( $hover_style=='circle' && $hover_effect=='effect16' ){
        
        $output ='<div class="ih-item circle effect16 '.$hover_animation.'">
                    <a target="'.$link_new_tab.'" href="'.$hover_link.'">
                        <div class="img"><img src="'.$hover_image[0].'"></div>
                        <div class="info" style="background: '.$bg_color.'">
                          <h3 style=" font-size: '.$heading_font_size.'; color:'.$heading_color.'; ">'.$hover_heading.'</h3>
                          <p style=" font-size: '.$desc_font_size.'; color:'.$description_color.'; border: '.$remove_hor_line.' ">'.$hover_desc.'</p>
                        </div>
                    </a>
                </div>';
        
    }     
    else if ( $hover_style=='circle' && $hover_effect=='effect17' ){
        
        $output ='<div class="ih-item circle effect17 '.$hover_animation.'">
                    <a target="'.$link_new_tab.'" href="'.$hover_link.'">
                        <div class="img"><img src="'.$hover_image[0].'"></div>
                        <div class="info" style="background: '.$bg_color.'">
                          <h3 style=" font-size: '.$heading_font_size.'; color:'.$heading_color.'; ">'.$hover_heading.'</h3>
                          <p style=" font-size: '.$desc_font_size.'; color:'.$description_color.'; border: '.$remove_hor_line.' ">'.$hover_desc.'</p>
                        </div>
                    </a>
                </div>';
        
    }     
    else if ( $hover_style=='circle' && $hover_effect=='effect18' ){
        
        $output ='<div class="ih-item circle effect18 '.$hover_animation.'">
                    <a target="'.$link_new_tab.'" href="'.$hover_link.'">
                        <div class="img"><img src="'.$hover_image[0].'"></div>
                        <div class="info" style="background: '.$bg_color.'">
                        <div class="info-back">
                          <h3 style=" font-size: '.$heading_font_size.'; color:'.$heading_color.'; ">'.$hover_heading.'</h3>
                          <p style=" font-size: '.$desc_font_size.'; color:'.$description_color.'; border: '.$remove_hor_line.' ">'.$hover_desc.'</p>
                        </div>
                        </div>
                    </a>
                </div>';
        
    }
    else if ( $hover_style=='circle' && $hover_effect=='effect19' ){
        
        $output ='<div class="ih-item circle effect19 '.$hover_animation.'">
                    <a target="'.$link_new_tab.'" href="'.$hover_link.'">
                        <div class="img"><img src="'.$hover_image[0].'"></div>
                        <div class="info" style="background: '.$bg_color.'">
                          <h3 style=" font-size: '.$heading_font_size.'; color:'.$heading_color.'; ">'.$hover_heading.'</h3>
                          <p style=" font-size: '.$desc_font_size.'; color:'.$description_color.'; border: '.$remove_hor_line.' ">'.$hover_desc.'</p>
                        </div>
                    </a>
                </div>';
        
    }    
    else if ( $hover_style=='circle' && $hover_effect=='effect20' ){
        
        $output ='<div class="ih-item circle effect20 '.$hover_animation.'">
                    <a target="'.$link_new_tab.'" href="'.$hover_link.'">
                        <div class="img"><img src="'.$hover_image[0].'"></div>
                        <div class="info" style="background: '.$bg_color.'">
                        <div class="info-back">
                          <h3 style=" font-size: '.$heading_font_size.'; color:'.$heading_color.'; ">'.$hover_heading.'</h3>
                          <p style=" font-size: '.$desc_font_size.'; color:'.$description_color.'; border: '.$remove_hor_line.' ">'.$hover_desc.'</p>
                        </div>
                        </div>
                    </a>
                </div>';
        
    }    
    else if ( $hover_style=='square' && $hover_effect_square=='effect1' ){
        
        $output ='<div class="ih-item square effect1 '.$hover_animation_square.'" style="height: '.$hover_image_height.'; width: '.$hover_image_width.';">
                    <a target="'.$link_new_tab.'" href="'.$hover_link.'">
                        <div class="img"><img style="height: '.$hover_image_height.'; width: '.$hover_image_width.';" src="'.$hover_image[0].'"></div>
                        <div class="info" style="background: '.$bg_color.'">
                          <h3 style=" font-size: '.$heading_font_size.'; color:'.$heading_color.'; ">'.$hover_heading.'</h3>
                          <p style=" font-size: '.$desc_font_size.'; color:'.$description_color.'; border: '.$remove_hor_line.' ">'.$hover_desc.'</p>
                        </div>
                    </a>
                </div>';
        
    }        
    else if ( $hover_style=='square' && $hover_effect_square=='effect2' ){
        
        $output ='<div class="ih-item square effect2" style="height: '.$hover_image_height.'; width: '.$hover_image_width.';">
                    <a target="'.$link_new_tab.'" href="'.$hover_link.'">
                        <div class="img"><img style="height: '.$hover_image_height.'; width: '.$hover_image_width.';" src="'.$hover_image[0].'"></div>
                        <div class="info" style="background: '.$bg_color.'">
                          <h3 style=" font-size: '.$heading_font_size.'; color:'.$heading_color.'; ">'.$hover_heading.'</h3>
                          <p style=" font-size: '.$desc_font_size.'; color:'.$description_color.'; border: '.$remove_hor_line.' ">'.$hover_desc.'</p>
                        </div>
                    </a>
                </div>';
        
    }
    else if ( $hover_style=='square' && $hover_effect_square=='effect3' ){
        
        $output ='<div class="ih-item square effect3 '.$hover_animation_square.'" style="height: '.$hover_image_height.'; width: '.$hover_image_width.';">
                    <a target="'.$link_new_tab.'" href="'.$hover_link.'">
                        <div class="img"><img style="height: '.$hover_image_height.'; width: '.$hover_image_width.';" src="'.$hover_image[0].'"></div>
                        <div class="info" style="background: '.$bg_color.'">
                          <h3 style=" font-size: '.$heading_font_size.'; color:'.$heading_color.'; ">'.$hover_heading.'</h3>
                          <p style=" font-size: '.$desc_font_size.'; color:'.$description_color.'; border: '.$remove_hor_line.' ">'.$hover_desc.'</p>
                        </div>
                    </a>
                </div>';
        
    }    
    else if ( $hover_style=='square' && $hover_effect_square=='effect4' ){
        
        $output ='<div class="ih-item square effect4" style="height: '.$hover_image_height.'; width: '.$hover_image_width.';">
                    <a target="'.$link_new_tab.'" href="'.$hover_link.'">
                        <div class="img"><img style="height: '.$hover_image_height.'; width: '.$hover_image_width.';" src="'.$hover_image[0].'"></div>
                         <div class="mask1"></div>
                         <div class="mask2"></div>
                        <div class="info" style="background: '.$bg_color.'">
                          <h3 style=" font-size: '.$heading_font_size.'; color:'.$heading_color.'; ">'.$hover_heading.'</h3>
                          <p style=" font-size: '.$desc_font_size.'; color:'.$description_color.'; border: '.$remove_hor_line.' ">'.$hover_desc.'</p>
                        </div>
                    </a>
                </div>';
        
    }    
    else if ( $hover_style=='square' && $hover_effect_square=='effect5' ){
        
        $output ='<div class="ih-item square effect5 '.$hover_animation_square.'" style="height: '.$hover_image_height.'; width: '.$hover_image_width.';">
                    <a target="'.$link_new_tab.'" href="'.$hover_link.'">
                        <div class="img"><img style="height: '.$hover_image_height.'; width: '.$hover_image_width.';" src="'.$hover_image[0].'"></div>
                        <div class="info" style="background: '.$bg_color.'">
                          <h3 style=" font-size: '.$heading_font_size.'; color:'.$heading_color.'; ">'.$hover_heading.'</h3>
                          <p style=" font-size: '.$desc_font_size.'; color:'.$description_color.'; border: '.$remove_hor_line.' ">'.$hover_desc.'</p>
                        </div>
                    </a>
                </div>';
        
    }    
    else if ( $hover_style=='square' && $hover_effect_square=='effect6' ){
        
        $output ='<div class="ih-item square effect6 from_top_and_bottom" style="height: '.$hover_image_height.'; width: '.$hover_image_width.';">
                    <a target="'.$link_new_tab.'" href="'.$hover_link.'">
                        <div class="img"><img style="height: '.$hover_image_height.'; width: '.$hover_image_width.';" src="'.$hover_image[0].'"></div>
                        <div class="info" style="background: '.$bg_color.'">
                          <h3 style=" font-size: '.$heading_font_size.'; color:'.$heading_color.'; ">'.$hover_heading.'</h3>
                          <p style=" font-size: '.$desc_font_size.'; color:'.$description_color.'; border: '.$remove_hor_line.' ">'.$hover_desc.'</p>
                        </div>
                    </a>
                </div>';
        
    }   
    else if ( $hover_style=='square' && $hover_effect_square=='effect7' ){
        
        $output ='<div class="ih-item square effect7" style="height: '.$hover_image_height.'; width: '.$hover_image_width.';">
                    <a target="'.$link_new_tab.'" href="'.$hover_link.'">
                        <div class="img"><img style="height: '.$hover_image_height.'; width: '.$hover_image_width.';" src="'.$hover_image[0].'"></div>
                        <div class="info" style="background: '.$bg_color.'">
                          <h3 style=" font-size: '.$heading_font_size.'; color:'.$heading_color.'; ">'.$hover_heading.'</h3>
                          <p style=" font-size: '.$desc_font_size.'; color:'.$description_color.'; border: '.$remove_hor_line.' ">'.$hover_desc.'</p>
                        </div>
                    </a>
                </div>';
        
    }    
    else if ( $hover_style=='square' && $hover_effect_square=='effect8' ){
        
        $output ='<div class="ih-item square effect8 scale_up" style="height: '.$hover_image_height.'; width: '.$hover_image_width.';">
                    <a target="'.$link_new_tab.'" href="'.$hover_link.'">
                        <div class="img"><img style="height: '.$hover_image_height.'; width: '.$hover_image_width.';" src="'.$hover_image[0].'"></div>
                        <div class="info" style="background: '.$bg_color.'">
                          <h3 style=" font-size: '.$heading_font_size.'; color:'.$heading_color.'; ">'.$hover_heading.'</h3>
                          <p style=" font-size: '.$desc_font_size.'; color:'.$description_color.'; border: '.$remove_hor_line.' ">'.$hover_desc.'</p>
                        </div>
                    </a>
                </div>';
        
    }    
    else if ( $hover_style=='square' && $hover_effect_square=='effect9' ){
        
        $output ='<div class="ih-item square effect9 '.$hover_animation.'" style="height: '.$hover_image_height.'; width: '.$hover_image_width.';">
                    <a target="'.$link_new_tab.'" href="'.$hover_link.'">
                        <div class="img"><img style="height: '.$hover_image_height.'; width: '.$hover_image_width.';" src="'.$hover_image[0].'"></div>
                        <div class="info" style="background: '.$bg_color.'">
                        <div class="info-back">
                          <h3 style=" font-size: '.$heading_font_size.'; color:'.$heading_color.'; ">'.$hover_heading.'</h3>
                          <p style=" font-size: '.$desc_font_size.'; color:'.$description_color.'; border: '.$remove_hor_line.' ">'.$hover_desc.'</p>
                        </div>
                        </div>
                    </a>
                </div>';
        
    }
    else if ( $hover_style=='square' && $hover_effect_square=='effect10' ){
        
        $output ='<div class="ih-item square effect10 '.$hover_animation_square.'" style="height: '.$hover_image_height.'; width: '.$hover_image_width.';">
                    <a target="'.$link_new_tab.'" href="'.$hover_link.'">
                        <div class="img"><img style="height: '.$hover_image_height.'; width: '.$hover_image_width.';" src="'.$hover_image[0].'"></div>
                        <div class="info" style="background: '.$bg_color.'">
                          <h3 style=" font-size: '.$heading_font_size.'; color:'.$heading_color.'; ">'.$hover_heading.'</h3>
                          <p style=" font-size: '.$desc_font_size.'; color:'.$description_color.'; border: '.$remove_hor_line.' ">'.$hover_desc.'</p>
                        </div>
                    </a>
                </div>';
        
    }
    else if ( $hover_style=='square' && $hover_effect_square=='effect11' ){
        
        $output ='<div class="ih-item square effect11 '.$hover_animation_square.'" style="height: '.$hover_image_height.'; width: '.$hover_image_width.';">
                    <a target="'.$link_new_tab.'" href="'.$hover_link.'">
                        <div class="img"><img style="height: '.$hover_image_height.'; width: '.$hover_image_width.';" src="'.$hover_image[0].'"></div>
                        <div class="info" style="background: '.$bg_color.'">
                          <h3 style=" font-size: '.$heading_font_size.'; color:'.$heading_color.'; ">'.$hover_heading.'</h3>
                          <p style=" font-size: '.$desc_font_size.'; color:'.$description_color.'; border: '.$remove_hor_line.' ">'.$hover_desc.'</p>
                        </div>
                    </a>
                </div>';
        
    }    
    else if ( $hover_style=='square' && $hover_effect_square=='effect12' ){
        
        $output ='<div class="ih-item square effect12 '.$hover_animation_square.'" style="height: '.$hover_image_height.'; width: '.$hover_image_width.';">
                    <a target="'.$link_new_tab.'" href="'.$hover_link.'">
                        <div class="img"><img style="height: '.$hover_image_height.'; width: '.$hover_image_width.';" src="'.$hover_image[0].'"></div>
                        <div class="info" style="background: '.$bg_color.'">
                          <h3 style=" font-size: '.$heading_font_size.'; color:'.$heading_color.'; ">'.$hover_heading.'</h3>
                          <p style=" font-size: '.$desc_font_size.'; color:'.$description_color.'; border: '.$remove_hor_line.' ">'.$hover_desc.'</p>
                        </div>
                    </a>
                </div>';
        
    }    
    else if ( $hover_style=='square' && $hover_effect_square=='effect13' ){
        
        $output ='<div class="ih-item square effect13 '.$hover_animation_square.'" style="height: '.$hover_image_height.'; width: '.$hover_image_width.';"> 
                    <a target="'.$link_new_tab.'" href="'.$hover_link.'">
                        <div class="img"><img style="height: '.$hover_image_height.'; width: '.$hover_image_width.';" src="'.$hover_image[0].'"></div>
                        <div class="info" style="background: '.$bg_color.'">
                          <h3 style=" font-size: '.$heading_font_size.'; color:'.$heading_color.'; ">'.$hover_heading.'</h3>
                          <p style=" font-size: '.$desc_font_size.'; color:'.$description_color.'; border: '.$remove_hor_line.' ">'.$hover_desc.'</p>
                        </div>
                    </a>
                </div>';
        
    }    
    else if ( $hover_style=='square' && $hover_effect_square=='effect14' ){
        
        $output ='<div class="ih-item square effect14 '.$hover_animation_square.'" style="height: '.$hover_image_height.'; width: '.$hover_image_width.';">
                    <a target="'.$link_new_tab.'" href="'.$hover_link.'">
                        <div class="img"><img style="height: '.$hover_image_height.'; width: '.$hover_image_width.';" src="'.$hover_image[0].'"></div>
                        <div class="info" style="background: '.$bg_color.'">
                          <h3 style=" font-size: '.$heading_font_size.'; color:'.$heading_color.'; ">'.$hover_heading.'</h3>
                          <p style=" font-size: '.$desc_font_size.'; color:'.$description_color.'; border: '.$remove_hor_line.' ">'.$hover_desc.'</p>
                        </div>
                    </a>
                </div>';
        
    }        
    else if ( $hover_style=='square' && $hover_effect_square=='effect15' ){
        
        $output ='<div class="ih-item square effect15 '.$hover_animation_square.'" style="height: '.$hover_image_height.'; width: '.$hover_image_width.';">
                    <a target="'.$link_new_tab.'" href="'.$hover_link.'">
                        <div class="img"><img style="height: '.$hover_image_height.'; width: '.$hover_image_width.';" src="'.$hover_image[0].'"></div>
                        <div class="info" style="background: '.$bg_color.'">
                          <h3 style=" font-size: '.$heading_font_size.'; color:'.$heading_color.'; ">'.$hover_heading.'</h3>
                          <p style=" font-size: '.$desc_font_size.'; color:'.$description_color.'; border: '.$remove_hor_line.' ">'.$hover_desc.'</p>
                        </div>
                    </a>
                </div>';
        
    }    




        $output .='<style>.ih-item.circle {
                          position: relative;
                          width: '.$hover_image_width.';
                          height: '.$hover_image_height.';
                          border-radius: 50%;
                        }.ih-item.circle .img {
                          border-radius: 50%;
                          height: '.$hover_image_height.';
                          position: relative;
                          width: '.$hover_image_width.';
                        }
                    </style>';
           
    return $output;
}


add_shortcode('usa_hover_effects', 'usa_hover_image_shortcode');    


?>