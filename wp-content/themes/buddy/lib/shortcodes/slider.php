<?php 

if ( ! function_exists( 'ghostpool_slider' ) ) {

	function ghostpool_slider( $atts, $content = null ) {
	
		extract( shortcode_atts( array( 
			'content' => 'slide',
			'cats' => '',
			'ids' => '',
			'width' => '1003',
			'height' => '480',
			'hard_crop' => 'true',
			'cats' => '',
			'slides' => '-1',
			'effect' => 'fade',
			'timeout' => '6',
			'orderby' => 'menu_order',
			'order' => 'asc',
			'buttons' => 'true',
			'content_display' => 'excerpt',
			'excerpt_length' => '0',
			'title' => 'true',       
			'title_length' => '40',        
			'margins' => '',
			'align' => 'aligncenter',
			'preload' => 'false',
		 ), $atts ) );

		require( ghostpool_inc . 'options.php' ); global $post, $is_IE, $is_gecko, $gp_settings, $dirname;

		// Unique Name	
		STATIC $gp_i = 0;
		$gp_i++;
		$gp_name = 'ghostpool_slider_wrapper_' . $gp_i;
	
		// Load Scripts
		wp_enqueue_script( 'gp-flexslider' );
		wp_enqueue_script( 'gp-touchswipe' );
		
		// Categories	
		if ( $cats ) { 
			$slide_cats = array( 'taxonomy' => 'slide_categories', 'terms' => explode( ',', $cats ), 'field' => 'id' );
			$post_cats = array( 'taxonomy' => 'category', 'terms' => explode( ',', $cats ), 'field' => 'id' );
		} else {
			$slide_cats = null;
			$post_cats = null;
		}
	
		// IDs
		if ( $ids ) { 
			$ids = explode( ',', $ids );
		} else {
			$ids = null;
		}
	
		// Margins
		if ( $margins != '' ) {
			if ( preg_match( '/%/', $margins ) OR preg_match( '/em/', $margins ) OR preg_match( '/px/', $margins ) ) {
				$margins = str_replace( ",", " ", $margins );
				$margins = 'margin: ' . $margins . '; ';	
			} else {
				$margins = str_replace( ",", "px ", $margins );
				$margins = 'margin: ' . $margins . 'px; ';		
			}
			$margins = str_replace( "autopx", "auto", $margins );
		} else {
			$margins = '';
		}
	
		// Preload
		if ( $preload == 'true' ) {
			$preload = " preload";
		} else {
			$preload = '';
		}
	
		// Slider Query	
		$gp_args = array( 
			'post_status' => 'publish',
			'post_type' => explode( ',', $content ),
			'posts_per_page' => $slides,
			'post__in' => $ids,
			'ignore_sticky_posts' => 0,
			'orderby' => $orderby,
			'order' => $order,
			'tax_query' => array( 'relation' => 'OR', $slide_cats, $post_cats )
		 );

		ob_start(); $gp_query = new WP_Query( $gp_args ); ?>
		
		<?php if ( $gp_query->have_posts() ) : $gp_counter = ''; ?>

			<div id="<?php echo sanitize_html_class( $gp_name ); ?>" class="flexslider <?php echo sanitize_html_class( $align ); ?><?php echo sanitize_html_class( $preload ); ?>" style="<?php echo esc_attr( $margins ); ?>">

				<ul class="slides">
			
					<?php while ( $gp_query->have_posts() ) : $gp_query->the_post(); $gp_counter++;			
			
						// Video Type
						$vimeo = strpos( get_post_meta( get_the_ID(), '_' . $dirname . '_slide_video', true ),"vimeo.com" );
						$youtube1 = strpos( get_post_meta( get_the_ID(), '_' . $dirname . '_slide_video', true ),"youtube.com" );
						$youtube2 = strpos( get_post_meta( get_the_ID(), '_' . $dirname . '_slide_video', true ),"youtu.be" ); 
												
						?>

						<li class="slide<?php if ( $gp_counter != '1' ) {} elseif ( get_post_meta( get_the_ID(), '_' . $dirname . '_slide_autostart_video', true ) ) { ?> video-autostart<?php } ?>" id="<?php echo sanitize_html_class( $gp_name ); ?>-slide-<?php the_ID(); ?>">
					
							<?php if ( ( !get_post_meta( get_the_ID(), '_' . $dirname . '_slide_title', true ) && $title == 'true' ) OR get_post_meta( get_the_ID(), '_' . $dirname . '_slide_caption_link_text', true ) OR ( $post->post_content && $excerpt_length != '0' ) ) { ?>
						
								<div class="caption <?php if ( get_post_meta( get_the_ID(), '_' . $dirname . '_slide_caption_position', true ) ) { echo get_post_meta( get_the_ID(), '_' . $dirname . '_slide_caption_position', true ); } else { echo "caption-bottomright"; } ?>">

									<?php if ( ! get_post_meta( get_the_ID(), '_' . $dirname . '_slide_title', true ) && $title == 'true' ) { ?><h2><?php echo ghostpool_title_limit( $title_length ); ?></h2><?php } ?>
							
									<?php if ( $content_display == 'full' ) { ?>	
							
										<?php global $more; $more = 0; the_content( esc_html__( 'Read More &raquo;', 'buddy' ) ); ?>
								
									<?php } else { ?>
							
										<?php if ( $excerpt_length != '0' ) { ?><p><?php echo ghostpool_excerpt( $excerpt_length ); ?></p><?php } ?>
								
									<?php } ?>
									
								</div>
					
							<?php } ?>
					
							<?php if ( get_post_meta( get_the_ID(), '_' . $dirname . '_slide_video', true ) OR get_post_meta( get_the_ID(), '_' . $dirname . '_webm_mp4_slide_video', true ) OR get_post_meta( get_the_ID(), '_' . $dirname . '_ogg_slide_video', true ) ) { ?>

								<?php if ( wp_is_mobile() ) { ?><a href="file=<?php if ( $is_gecko && get_post_meta( get_the_ID(), '_' . $dirname . '_ogg_slide_video', true ) ) { echo get_post_meta( get_the_ID(), '_' . $dirname . '_ogg_slide_video', true ); } elseif ( get_post_meta( get_the_ID(), '_' . $dirname . '_webm_mp4_slide_video', true ) ) { echo esc_url( get_post_meta( get_the_ID(), '_' . $dirname . '_webm_mp4_slide_video', true ) ); } else { echo esc_url( get_post_meta( get_the_ID(), '_' . $dirname . '_slide_video', true ) ); } ?>" data-rel="prettyPhoto"><?php } ?>
								
									<div class="video-image">
						
										<div class="video-button"></div>
							
										<?php if ( has_post_thumbnail() ) { ?>
											<?php $gp_image = aq_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ), $width, $height, $hard_crop, false, true ); ?>
											<?php if ( get_option( $dirname . '_retina' ) == '0' ) { 
												$gp_retina = aq_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ), $width * 2, $height * 2, $hard_crop, true, true );
											} else { 
												$gp_retina = '';
											} ?>
											<img src="<?php echo esc_url( $gp_image[0] ); ?>" data-rel="<?php echo esc_url( $gp_retina ); ?>" width="<?php echo absint( $gp_image[1] ); ?>" height="<?php echo absint( $gp_image[2] ); ?>" alt="<?php if ( get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ) ) { echo esc_attr( get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ) ); } else { the_title_attribute(); } ?>" class="gp-post-image" itemprop="image" />
										<?php } ?>
								
									</div>
						
								<?php if ( wp_is_mobile() ) { ?></a><?php } ?>

								<?php if ( ! wp_is_mobile() ) { ?>
				
									<?php if ( $vimeo ) { ?>
						
										<?php 
									
										// Vimeo ID
										$vimeo_url = str_replace( 'www.', '', get_post_meta( get_the_ID(), '_' . $dirname . '_slide_video', true ) );
										if ( preg_match( '/http:\/\/vimeo/', $vimeo_url ) ) {
											$vimeoid = str_replace( 'http://vimeo.com/', '', $vimeo_url );
										} else {
											$vimeoid = str_replace( 'https://vimeo.com/', '', $vimeo_url );
										}
									
										?>

										<div class="video-player">
						
											<iframe src="http://player.vimeo.com/video/<?php echo esc_attr( $vimeoid ); ?>?byline=0&amp;portrait=0&amp;autoplay=<?php if ( $gp_counter != '1' ) { ?>0<?php } elseif ( get_post_meta( get_the_ID(), '_' . $dirname . '_slide_autostart_video', true ) ) { ?>1<?php } else { ?>0<?php } ?>" allowFullScreen></iframe>

										</div>

										<script>		
										jQuery( window ).load( function() {
					
											// Play Vimeo Player
						
											jQuery( "#<?php echo sanitize_html_class( $gp_name ); ?>-slide-<?php the_ID(); ?> .video-image" ).click( function(){
											  var thePage = jQuery( "#<?php echo sanitize_html_class( $gp_name ); ?>-slide-<?php the_ID(); ?> .video-player" );
											  thePage.html( thePage.html().replace( 'http://player.vimeo.com/video/<?php echo esc_attr( $vimeoid ); ?>?byline=0&amp;portrait=0&amp;autoplay=0', 'http://player.vimeo.com/video/<?php echo esc_attr( $vimeoid ); ?>?byline=0&amp;portrait=0&amp;autoplay=1' ) );
											  jQuery( '#<?php echo sanitize_html_class( $gp_name ); ?>-slide-<?php the_ID(); ?> .video-player' ).show();
											} );
						
											// Stop Vimeo Player
						
											jQuery( "#<?php echo sanitize_html_class( $gp_name ); ?> .flex-control-nav li a" ).click( function(){
											  var thePage = jQuery( "#<?php echo sanitize_html_class( $gp_name ); ?>-slide-<?php the_ID(); ?> .video-player" );
											  thePage.html( thePage.html().replace( 'http://player.vimeo.com/video/<?php echo esc_attr( $vimeoid ); ?>?byline=0&amp;portrait=0&amp;autoplay=1', 'http://player.vimeo.com/video/<?php echo esc_attr( $vimeoid ); ?>?byline=0&amp;portrait=0&amp;autoplay=0' ) );
											  jQuery( '#<?php echo sanitize_html_class( $gp_name ); ?>-slide-<?php the_ID(); ?> .video-player' ).hide();
											} );
						
										} );
										</script>			

									<?php } elseif ( ( $youtube1 OR $youtube2 ) && get_option( $dirname . '_jwplayer' ) == '1' ) {

										// YouTube ID
										$youtube_url = str_replace( 'www.', '', get_post_meta( get_the_ID(), '_' . $dirname . '_slide_video', true ) );
										if ( preg_match( '/http:\/\/youtube.com/', $youtube_url ) ) {
											$youtubeid = str_replace( 'http://youtube.com/watch?v=', '', $youtube_url );
										} elseif ( preg_match( '/https:\/\/youtube.com/', $youtube_url ) ) {
											$youtubeid = str_replace( 'https://youtube.com/watch?v=', '', $youtube_url );
										} elseif ( preg_match( '/http:\/\/youtu.be/', $youtube_url ) ) {
											$youtubeid = str_replace( 'http://youtu.be/', '', $youtube_url );
										} else {
											$youtubeid = str_replace( 'https://youtu.be/', '', $youtube_url );												
										}
			
									?>											
					
										<div class="video-player">
											<iframe width="<?php echo absint( $width ); ?>" height="<?php echo absint( $height ); ?>" src="//www.youtube.com/embed/<?php echo esc_attr( $youtubeid ); ?>?autoplay=<?php if ( $gp_counter != '1' ) { ?>0<?php } elseif ( get_post_meta( get_the_ID(), '_' . $dirname . '_slide_autostart_video', true ) ) { ?>1<?php } else { ?>0<?php } ?>&amp;controls=0&amp;showinfo=0" frameborder='0' allowfullscreen></iframe>
										</div>
					
										<script>						
										jQuery( window ).load( function() {
								
											// Play YouTube video
								
											jQuery( "#<?php echo sanitize_html_class( $gp_name ); ?>-slide-<?php the_ID(); ?> .video-image" ).click( function(){
											  var thePage = jQuery( "#<?php echo sanitize_html_class( $gp_name ); ?>-slide-<?php the_ID(); ?> .video-player" );
											  thePage.html( thePage.html().replace( '//www.youtube.com/embed/<?php echo esc_attr( $youtubeid ); ?>?autoplay=0&amp;controls=0&amp;showinfo=0', '//www.youtube.com/embed/<?php echo esc_attr( $youtubeid ); ?>?autoplay=1&amp;controls=0&amp;showinfo=0' ) );
											  jQuery( '#<?php echo sanitize_html_class( $gp_name ); ?>-slide-<?php the_ID(); ?> .video-player' ).show();
											} );
									
											// Stop YouTube video
									
											jQuery( "#<?php echo sanitize_html_class( $gp_name ); ?> .flex-control-nav li a" ).click( function(){
											  var thePage = jQuery( "#<?php echo sanitize_html_class( $gp_name ); ?>-slide-<?php the_ID(); ?> .video-player" );
											  thePage.html( thePage.html().replace( '//www.youtube.com/embed/<?php echo esc_attr( $youtubeid ); ?>?autoplay=1&amp;controls=0&amp;showinfo=0', '//www.youtube.com/embed/<?php echo esc_attr( $youtubeid ); ?>?autoplay=0&amp;controls=0&amp;showinfo=0' ) );
											   jQuery( '#<?php echo sanitize_html_class( $gp_name ); ?>-slide-<?php the_ID(); ?> .video-player' ).hide();
											} );
									
										} );
										</script>
													
									<?php } else { ?>
	
										<div class="video-player">
											<div id="<?php echo sanitize_html_class( $gp_name ); ?>-player-<?php the_ID(); ?>" class="video-player"></div>															
										</div>
								
										<script>
										//<![CDATA[

										jwplayer( "<?php echo sanitize_html_class( $gp_name ); ?>-player-<?php the_ID(); ?>" ).setup( {
											image: "<?php ghostpool_images; ?>black.gif",
											icons: 'true',
											autostart: "<?php if ( $gp_counter != '1' ) { ?>false<?php } elseif ( get_post_meta( get_the_ID(), '_' . $dirname . '_slide_autostart_video', true ) ) { ?>true<?php } else { ?>false<?php } ?>",
											stretching: "fill",
											controlbar: "<?php if ( get_post_meta( get_the_ID(), '_' . $dirname . '_slide_video_controls', true ) == 'Over' ) { ?>over<?php } elseif ( get_post_meta( get_the_ID(), '_' . $dirname . '_slide_video_controls', true ) == 'Bottom' ) { ?>bottom<?php } else { ?>none<?php } ?>",
											skin: "<?php ghostpool_scripts; ?>mediaplayer/fs39/fs39.xml",
											width: "100%",
											height: "<?php echo absint( $height ); ?>",
											screencolor: "000000",
											modes:
												[
												<?php if ( $is_IE OR get_post_meta( get_the_ID(), '_' . $dirname . '_slide_video_priority', true ) == 'Flash' ) { ?>
													{type: "flash", src: "<?php ghostpool_scripts; ?>mediaplayer/player.swf", config: {file: "<?php echo esc_url( get_post_meta( get_the_ID(), '_' . $dirname . '_slide_video', true ) ); ?>"}},					
													{type: "html5", config: {file: "<?php if ( $is_gecko && get_post_meta( get_the_ID(), '_' . $dirname . '_ogg_slide_video', true ) ) { echo get_post_meta( get_the_ID(), '_' . $dirname . '_ogg_slide_video', true ); } elseif ( get_post_meta( get_the_ID(), '_' . $dirname . '_webm_mp4_slide_video', true ) ) { echo esc_url( get_post_meta( get_the_ID(), '_' . $dirname . '_webm_mp4_slide_video', true ) ); } else { echo esc_url( get_post_meta( get_the_ID(), '_' . $dirname . '_slide_video', true ) ); } ?>"}}
												<?php } else { ?>
													{type: "html5", config: {file: "<?php if ( $is_gecko && get_post_meta( get_the_ID(), '_' . $dirname . '_ogg_slide_video', true ) ) { echo get_post_meta( get_the_ID(), '_' . $dirname . '_ogg_slide_video', true ); } elseif ( get_post_meta( get_the_ID(), '_' . $dirname . '_webm_mp4_slide_video', true ) ) { echo esc_url( get_post_meta( get_the_ID(), '_' . $dirname . '_webm_mp4_slide_video', true ) ); } else { echo esc_url( get_post_meta( get_the_ID(), '_' . $dirname . '_slide_video', true ) ); } ?>"}},
													{type: "flash", src: "<?php echo get_template_directory_uri(); ?>/lib/scripts/mediaplayer/player.swf", config: {file: "<?php echo esc_url( get_post_meta( get_the_ID(), '_' . $dirname . '_slide_video', true ) ); ?>"}}
												<?php } ?>
												],
											plugins: {}
										} );

										// Play JW Player
										jQuery( document ).ready( function(){
											jQuery( "#<?php echo sanitize_html_class( $gp_name ); ?>-slide-<?php the_ID(); ?> .video-image" ).click( function() {
												jQuery( '#<?php echo sanitize_html_class( $gp_name ); ?>-slide-<?php the_ID(); ?> .video-player' ).show();
												jwplayer( "<?php echo sanitize_html_class( $gp_name ); ?>-player-<?php the_ID(); ?>" ).play();
											} );	
										} );
						
										// Stop JW Player
										jQuery( window ).load( function() {	
											jQuery( "#<?php echo sanitize_html_class( $gp_name ); ?> .flex-control-nav li a" ).click( function() {
												if ( jwplayer( "<?php echo sanitize_html_class( $gp_name ); ?>-player-<?php the_ID(); ?>" ).getState() === "PLAYING" ) {
													jQuery( '#<?php echo sanitize_html_class( $gp_name ); ?>-slide-<?php the_ID(); ?> .video-player' ).hide();
													jwplayer( "<?php echo sanitize_html_class( $gp_name ); ?>-player-<?php the_ID(); ?>" ).stop();
												}
											} );
										} );
													
										//]]>
										</script>
						
									<?php } ?>

								<?php } ?>
								
								<?php if ( ! wp_is_mobile() ) { ?>
						
									<script>
						
									jQuery( document ).ready( function() {
						
										// Hide Video Image/Play Button
										jQuery( "#<?php echo sanitize_html_class( $gp_name ); ?>-slide-<?php the_ID(); ?> .video-image" ).click( function() {
											jQuery( '#<?php echo sanitize_html_class( $gp_name ); ?>-slide-<?php the_ID(); ?> .video-image' ).hide();
											jQuery( '#<?php echo sanitize_html_class( $gp_name ); ?>-slide-<?php the_ID(); ?> .caption' ).hide();
										} );	

									} );	
							
									</script>
								
								<?php } ?>	

							<?php } else { ?>
							
								<?php if ( has_post_thumbnail() ) { ?>
						
									<?php if ( get_post_meta( get_the_ID(), '_' . $dirname . '_custom_url', true ) OR get_post_meta( get_the_ID(), '_' . $dirname . '_link_type', true ) != 'None' ) { ?>
									<a href="<?php if ( get_post_meta( get_the_ID(), '_' . $dirname . '_link_type', true ) == 'Lightbox Video' ) { ?>file=<?php echo esc_url( get_post_meta( get_the_ID(), '_' . $dirname . '_custom_url', true ) ); } elseif ( get_post_meta( get_the_ID(), '_' . $dirname . '_link_type', true ) == 'Lightbox Image' ) { if ( get_post_meta( get_the_ID(), '_' . $dirname . '_custom_url', true ) ) { echo esc_url( get_post_meta( get_the_ID(), '_' . $dirname . '_custom_url', true ) ); } else { echo esc_url( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ) ); }} else { if ( get_post_meta( get_the_ID(), '_' . $dirname . '_custom_url', true ) ) { echo esc_url( get_post_meta( get_the_ID(), '_' . $dirname . '_custom_url', true ) ); } else { the_permalink(); }} ?>" title="<?php the_title_attribute(); ?>"<?php if ( get_post_meta( get_the_ID(), '_' . $dirname . '_link_type', true ) == 'Lightbox Image' OR get_post_meta( get_the_ID(), '_' . $dirname . '_link_type', true ) == 'Lightbox Video' ) { ?> data-rel="prettyPhoto[<?php echo sanitize_html_class( $gp_name . get_the_ID() ); ?>]"<?php } ?>>
									<?php } ?>
								
										<?php if ( get_post_meta( get_the_ID(), '_' . $dirname . '_link_type', true ) == 'Lightbox Image' OR get_post_meta( get_the_ID(), '_' . $dirname . '_link_type', true ) == 'Lightbox Video' ) { ?><span class="lightbox-hover fa fa-plus"></span><?php } ?>							
																																																											
										<?php $gp_image = aq_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ), $width, $height, $hard_crop, false, true ); ?>
										<?php if ( get_option( $dirname . '_retina' ) == '0' ) { 
											$gp_retina = aq_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ), $width * 2, $height * 2, $hard_crop, true, true );
										} else {
											$gp_retina = ''; 
										} ?>
										<img src="<?php echo esc_url( $gp_image[0] ); ?>" data-rel="<?php echo esc_url( $gp_retina ); ?>" width="<?php echo absint( $gp_image[1] ); ?>" height="<?php echo absint( $gp_image[2] ); ?>" alt="<?php if ( get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ) ) { echo esc_attr( get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ) ); } else { the_title_attribute(); } ?>" class="gp-post-image" itemprop="image" />
									
									<?php if ( get_post_meta( get_the_ID(), '_' . $dirname . '_custom_url', true ) OR  get_post_meta( get_the_ID(), '_' . $dirname . '_link_type', true ) != 'None' ) { ?></a><?php } ?>	
					
								<?php } ?>
				
								<?php if ( get_post_meta( get_the_ID(), '_' . $dirname . '_link_type', true ) == 'Lightbox Image' OR get_post_meta( get_the_ID(), '_' . $dirname . '_link_type', true ) == 'Lightbox Video' ) { ?>

									<?php $args = array( 'post_type' => 'attachment', 'post_parent' => get_the_ID(), 'numberposts' => -1, 'orderby' => 'menu_order', 'order' => 'asc', 'post__not_in'	=> array( get_post_thumbnail_id() ) ); $attachments = get_children( $args ); if ( $attachments ) { foreach ( $attachments as $attachment ) { ?>
				
										<a href="<?php if ( get_post_meta( $attachment->ID, '_' . $dirname . '_lightbox_url', true ) ) { ?>file=<?php echo esc_url( get_post_meta( $attachment->ID, '_' . $dirname . '_lightbox_url', true ) ); } else { echo esc_url( wp_get_attachment_url( $attachment->ID ) ); } ?>" data-rel="prettyPhoto[<?php echo sanitize_html_class( $gp_name . get_the_ID() ); ?>]" title="<?php echo esc_attr( $attachment->post_content ); ?>" style="display: none;"><img src='' alt="<?php echo esc_attr( $attachment->post_title ); ?>"></a>
				
									<?php }} ?>
						
								<?php } ?>
								
							<?php } ?>
							
						</li>
				
					<?php endwhile; ?>
					
				</ul>
		
			</div>
		
		<?php endif; wp_reset_postdata(); ?>	
		
		<script>
		jQuery( document ).ready( function() {
		
			jQuery( "#<?php echo sanitize_html_class( $gp_name ); ?>.flexslider" ).flexslider( { 
				animation: "<?php echo esc_attr( $effect ); ?>",
				slideshowSpeed: <?php if ( $timeout == 0 ) { echo "9999999"; } else { echo absint( $timeout ) * 1000; } ?>,
				animationSpeed: 600,
				directionNav: false,			
				controlNav: <?php if ( $buttons == 'true' ) { ?>true<?php } else { ?>false<?php } ?>,				
				pauseOnAction: true, 
				pauseOnHover: false,
				touch: <?php if ( $slides > 1 OR $slides == '-1' ) { ?>true<?php } else { ?>false<?php } ?>,
				start: function( slider ) {

					// Pause Slider
					jQuery( "#<?php echo sanitize_html_class( $gp_name ); ?> .flex-control-nav li a, #<?php echo sanitize_html_class( $gp_name ); ?> .video-image" ).click( function() { 
						slider.pause(); 
					} );
		
				}
			
			} );	
					
			// Resize Video Player
			jQuery( window ).load( function(){
				resizePlayer();
				jQuery( window ).resize( function() {
					resizePlayer();
				} );	
			} );

			function resizePlayer() {
				parentContainer = jQuery( "#<?php echo sanitize_html_class( $gp_name ); ?> .slides" ).parent().attr( 'id' );
				sliderWidth = jQuery( '#' + parentContainer ).width();
				newVideoWidth = sliderWidth;
				newVideoHeight = ( sliderWidth * <?php echo absint( $height ); ?> ) / <?php echo absint( $width ); ?>;
				jQuery( "#<?php echo sanitize_html_class( $gp_name ); ?>.flexslider .slides > li, #<?php echo sanitize_html_class( $gp_name ); ?>.flexslider .video-image, #<?php echo sanitize_html_class( $gp_name ); ?>.flexslider iframe, #<?php echo sanitize_html_class( $gp_name ); ?>.flexslider video, #<?php echo sanitize_html_class( $gp_name ); ?>.flexslider object, #<?php echo sanitize_html_class( $gp_name ); ?>.flexslider embed" ).width( newVideoWidth ).height( newVideoHeight );						
			}
					
			// Show All Video Images & Captions
			jQuery( "#<?php echo sanitize_html_class( $gp_name ); ?> .flex-control-nav li a" ).click( function() {
				jQuery( '#<?php echo sanitize_html_class( $gp_name ); ?> .video-image' ).show();
				jQuery( '#<?php echo sanitize_html_class( $gp_name ); ?> .video-player' ).hide();
				jQuery( '#<?php echo sanitize_html_class( $gp_name ); ?> .caption' ).show();
			} );	
		
		} );			
		</script>
	
		<?php

		$gp_output_string = ob_get_contents();
		ob_end_clean();
		return $gp_output_string;

	}
	
}

add_shortcode( 'slider', 'ghostpool_slider' );

?>