<?php 
add_action('init', 'mic_map_params', 99);

function mic_map_params()
  {
  global $kc;
  $kc->add_map(array(
    'mic_gallery' => array(
      'name' => 'MIC Magnific Gallery',
      'description' => __('Another Gallery', 'KingComposer') ,
      'icon' => 'kc-icon-box',

      // 'is_container' => true,

      'category' => 'Gallery M',
      // 'css_box' => true,
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
          'type'      => 'text',
          'label'     => __( 'Image size', 'kingcomposer' ),
          'name'      => 'image_size',
          'description' => __( 'Set the image size : thumbnail, medium, large or full.', 'kingcomposer' ),
          'value'     => 'full'
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
          array(
            'type' => 'checkbox',
            'label' => __('Show Titles?', 'kingcomposer') ,
            'name' => 'show_titles',
            'options' => array(
          'yes' =>  __( 'Yes, Please!', 'kingcomposer' ),
        ),
            'description' => __('Show Titles For Items', 'kingcomposer') ,
            'admin_label' => true,
          ) ,
        ) ,
        'Style' => array(
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
            'label' => __('Title Text Align', 'kingcomposer') ,
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
          array(
            'name' => 'images_border_size',
            'label' => 'Images Border Size',
            'type' => 'number_slider',
            'options' => array(
              'min' => 0,
              'max' => 10,
              'unit' => 'px',
              'show_input' => true
            ) ,
            'value' => '0',
            'description' => 'Chose Border Font Size here'
          ) ,
          array(
                'name' => 'border_color',
                'label' => 'Border Color',
                'type' => 'color_picker', 
            ) ,
        ) ,
      )
    )
  ));
  }

 ?>