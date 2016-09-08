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
 if ( wp_script_is( 'mic-gallery-js', 'enqueued' ) ) {add_action( 'wp_footer', 'print_inline_script',9999 ); }

 if (isset( $atts['show_titles'] ) && $atts['show_titles'] == 'yes') {
 	add_action( 'wp_head', 'print_inline_style',9999 );
 }


	function print_inline_script() {
		  
		?>
		<script type="text/javascript">
		jQuery(document).ready(function($) {
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
									return	'<h4>' + item.el.attr('data-title') + '</h4>' + '<p>' + item.el.attr('data-description') + '</p>';
								}
							}
						});
		});
				
		</script>
		<?php
		  
		}
		
		function print_inline_style() {
			?>
	
		<style>
			.mic-gallery-slide a {
					position: relative;
			    display: block;
			    overflow: hidden;
			    text-align: center;
			    width: 100%;
				}
			.mic-slide-title span {
				position: relative;
				display: block;
				width: 90%;
				margin: 0 auto;
				color: white;
		    background: rgba(0, 0, 0, 0.55);
		    border: solid 1px rgba(158, 158, 158, 0.6);
		    padding: 5px 0;
			}
			.mic-slide-title {
				position: absolute;
		    display: block;
		    width: 100%;
		    bottom: 10%;
		    left: 0;
			}
		</style>

			<?php
		}

    return $atts;
 
}

?>