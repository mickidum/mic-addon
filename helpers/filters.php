<?php 

add_filter( 'shortcode_mic_gallery', 'mic_gallery_filter' );
// This filter will run before wp_header
 
function mic_gallery_filter( $atts ){

  wp_enqueue_style('mic-gallery-css', plugin_dir_url(__DIR__). '/vendor/magnific-popup/dist/magnific-popup.css', false, '1.0' );
  wp_enqueue_script('mic-gallery-js', plugin_dir_url(__DIR__). '/vendor/magnific-popup/dist/jquery.magnific-popup.min.js',array('jquery'), true, '1.0' );
				
    
	if( isset( $atts['foundation'] ) && $atts['foundation'] == 'yes' ){
    
        wp_enqueue_style('mic-gallery-foundation-css', plugin_dir_url(__DIR__). '/vendor/foundation/foundation.min.css', false, '1.0' );
        wp_enqueue_script('mic-gallery-foundation-js', plugin_dir_url(__DIR__). '/vendor/foundation/foundation.min.js', array('jquery'), false, '1.0' );
      }
 
	function print_inline_script() {
		  if ( wp_script_is( 'mic-gallery-js', 'enqueued' ) ) {
		?>
		<script type="text/javascript">
				$(document).ready(function() {
						$('.popup-gallery').magnificPopup({
							delegate: 'a',
							type: 'image',
							tLoading: 'Loading image #%curr%...',
							mainClass: 'mfp-img-mobile',
							gallery: {
								enabled: true,
								navigateByImgClick: true,
								preload: [0,1] // Will preload 0 - before current, and 1 after the current image
							},
							image: {
								tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
								titleSrc: function(item) {
									return item.el.attr('title') + '';
								}
							}
						});
					});
		</script>
		<?php
		  }
		}
		add_action( 'wp_footer', 'print_inline_script',9999 ); 


    return $atts;
 
}

?>