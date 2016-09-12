<?php

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
    'images_border_size' => '',
    'border_color' => '',
    'show_titles' => '',
    'count_columns_large' => '',
    'count_columns_medium' => '',
    'count_columns_small' => '',
  ) , $atts));
  $output = '';
  extract($atts);
  // var_dump($atts);
  if (!empty($images))
    {
    $images = explode(',', $images);

    }

  if (is_array($images) && !empty($images))
    {
		  foreach($images as $image_id){
				$attachment_data[] = wp_get_attachment_image_src( $image_id, $image_size );
				$attachment_data_full[] = wp_get_attachment_image_src( $image_id, 'full' );
			}
			
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
    <?php 
      if(!empty($count_columns_large)) {
        $count_col_l = 'large-up-'.$count_columns_large;
      }
      else {
        $count_col_l = "large-up-4";
      }
      if(!empty($count_columns_medium)) {
        $count_col_m = 'medium-up-'.$count_columns_medium;
      }
      else {
        $count_col_m = "medium-up-3";
      }
      if(!empty($count_columns_small)) {
        $count_col_s = 'small-up-'.$count_columns_small;
      }
      else {
        $count_col_s = "small-up-1";
      }
     ?>

		<?php echo '<div class="popup-gallery"><div class="row '.$count_col_s.' '.$count_col_m.' '.$count_col_l.'">'; 
      if(!empty($images_border_size)) {
        $image_css = 'style="border:solid '.$images_border_size.' '.$border_color.'";';
      }
      else {
        $image_css = '';
      }
    ?>
      <?php 
      $end_class = 'end'; 
      $index_img = count($images) - 1;
      ?>
  		<?php foreach($attachment_data as $i => $image): ?>
       
       <?php   $image_alt = get_post_meta( $images[$i], '_wp_attachment_image_alt', true);
        $image_ttl = get_the_title(esc_attr($images[$i]));
        $image_desc = get_post(esc_attr($images[$i]));;
         
     	 echo '<div class="column mic-gallery-slide '.(($i == $index_img) ? "$end_class" : "").'"><a href="'.esc_attr( esc_attr( $attachment_data_full[$i][0] ) ).'" data-description="'.(!empty($image_desc->post_content) ? $image_desc->post_content : (!empty($image_alt) ? $image_alt : $image_ttl)).'" data-title="'.$image_ttl.'"><img class="thumbnaila" src="'.esc_attr($image[0]).'" alt="'.(!empty($image_alt) ? $image_alt : $image_ttl).'" '.$image_css.'>'; 


      
      if (!empty($show_titles)) {
        echo '<h5 class="mic-slide-title"><span>'.$image_ttl.'</span></h5>'; 
      }
      echo "</a></div>";
      ?>
       
       <?php  endforeach; 
      echo "</div></div>";

      ?>
      


<?php
  $output = ob_get_clean();
  echo '<div class="popup-gallery-container">' . $output . '</div>';
  }

add_shortcode('mic_gallery', 'mic_gallery_shortcode');

?>