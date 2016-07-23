<?php
add_action('init', 'mic_magnific_popup_gallery_params', 99);

function mic_magnific_popup_gallery_params()
  {
  global $kc;
  $kc->add_map(array(
    'mic_gallery' => array(
      'name' => 'MIC Magnific Gallery',
      'description' => __('Another Gallery', 'KingComposer') ,
      'icon' => 'kc-icon-box',

      // 'is_container' => true,

      'category' => 'MIC ADDON SHORTCODES',
      'css_box' => true,
      'params' => array(
        'General' => array(
          array(
            'type' => 'text',
            'label' => __('Gallery Title', 'kingcomposer') ,
            'name' => 'title',
            'description' => __('Title of the Gallery. Leave blank if no title is needed.', 'kingcomposer') ,
            'admin_label' => true,
          ) ,
          array(
            'name' => 'images',
            'label' => 'Upload Images',
            'type' => 'attach_images',
            'admin_label' => true,
          ) ,
          array(
            'type' => 'dropdown',
            'label' => __('Align Images', 'kingcomposer') ,
            'name' => 'images_align',
            'description' => __('Select the Images Align', 'kingcomposer') ,
            'options' => array(
              'left' => __('Left', 'kingcomposer') ,
              'center' => __('Center', 'kingcomposer') ,
              'right' => __('Right', 'kingcomposer')
            ) ,
            'admin_label' => true,
            'value' => 'center'
          ) ,
          array(
					'type'			=> 'text',
					'label'			=> __( 'Image size', 'kingcomposer' ),
					'name'			=> 'image_size',
					'description'	=> __( 'Set the image size : thumbnail, medium, large or full.', 'kingcomposer' ),
					'value'			=> 'full'
				),
          array(
            'type' => 'checkbox',
            'label' => __('Add Vendor Style?', 'kingcomposer') ,
            'name' => 'foundation',
            'options' => array(
					'yes' =>  __( 'Yes, Please!', 'kingcomposer' ),
				),
            'description' => __('Load Foundation.css style', 'kingcomposer') ,
            'admin_label' => true,
          ) ,
        ) ,
        'Typography' => array(
          array(
            'name' => 'title_size',
            'label' => 'Title font size',
            'type' => 'number_slider',
            'options' => array(
              'min' => 0,
              'max' => 40,
              'unit' => 'px',
              'show_input' => true
            ) ,
            'value' => '20',
            'description' => 'Chose Title Font Size here, Default is 20px'
          ) ,
          array(
            'type' => 'dropdown',
            'label' => __('Text Align', 'kingcomposer') ,
            'name' => 'title_align',
            'description' => __('Select the Text Align', 'kingcomposer') ,
            'options' => array(
              'left' => __('Left', 'kingcomposer') ,
              'center' => __('Center', 'kingcomposer') ,
              'right' => __('Right', 'kingcomposer')
            ) ,
            'admin_label' => true,
            'value' => 'left'
          ) ,
        ) ,
      )
    )
  ));
  }

// Register Hover Shortcode

function mic_gallery_shortcode($atts, $content = null)
  {
  	// var_dump($atts);
  extract(shortcode_atts(array(
    'title' => 'Title Goes here',
    'images' => '',
    'images_align' => '',
    'title_size' => '',
    'title_align' => '',
    'foundation' => '',
    'image_size' => '',
  ) , $atts));
  $output = '';
  extract($atts);
  if (!empty($images))
    {
    $images = explode(',', $images);
    var_dump($images);
    }

  if (is_array($images) && !empty($images))
    {
		  foreach($images as $image_id){
				$attachment_data[] = wp_get_attachment_image_src( $image_id, $image_size );
				$attachment_data_full[] = wp_get_attachment_image_src( $image_id, 'full' );
			}
			echo "<hr>";
			var_dump($attachment_data);
			echo "<hr>";
			var_dump($attachment_data_full);
    }
    else
    {
    echo '<div class="kc-carousel_images align-center" style="border:1px dashed #ccc;"><br /><h3>Carousel Images: ' . __('No images upload', 'kingcomposer') . '</h3></div>';
    return;
    }

  ob_start();
  if (!empty($title))
    {
    echo '<h3 style="font-size:' . $title_size . ';text-align:' . $title_align . ';" class="kc-title image-gallery-title">' . esc_html($title) . '</h3>';
    }

?>
		<?php echo '<div class="popup-gallery">'; ?>
          
  		<?php foreach($attachment_data as $i => $image): ?>
     	<?php echo '<a href="'.esc_attr( esc_attr( $attachment_data_full[$i][0] ) ).'"><img src="'.esc_attr($image[0]).'" alt=""></a>'; ?>     
        
 			<?php endforeach; echo "</div>";?>
      


<?php
  $output = ob_get_clean();
  echo '<div class="kc-carousel_images">' . $output . '</div>';
  }

add_shortcode('mic_gallery', 'mic_gallery_shortcode');

