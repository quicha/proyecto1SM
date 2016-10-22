<?php

if ( ! function_exists( 'ghostpool_related_posts' ) ) {

	function ghostpool_related_posts( $atts, $content = null ) {
	
		extract( shortcode_atts( array( 
			'widget_title' => '',
			'content' => 'post',
			'cats' => '',
			'id' => '',
			'images' => 'true',
			'image_width' => '139',
			'image_height' => '120',
			'image_wrap' => 'false',
			'hard_crop' => 'true',
			'cols' => '3',
			'per_page' => '3',
			'link' => 'both',
			'orderby' => 'rand',
			'order' => 'desc',
			'offset' => '',
			'content_display' => 'excerpt',
			'excerpt_length' => '0',
			'title' => 'true',
			'title_size' => '',
			'title_font' => '',
			'meta' => 'false',
			'meta_author' => 'false',
			'meta_date' => 'false',
			'meta_cats' => 'false',
			'meta_comments' => 'false',
			'meta_tags' => 'false',
			'read_more' => 'false',
			'preload' => 'false',
			'spacing' => 'spacing-normal'	
		 ), $atts ) );

		require( ghostpool_inc . 'options.php' ); global $post, $dirname, $wp_query;

		// Unique Name	
		STATIC $gp_i = 0;
		$gp_i++;
		$gp_name = 'ghostpool_related_posts_' . $gp_i;

		// Post ID
		if ( $id == '' ) {
			$id = $post->ID;
		} else {
			$id;
		}

		// Title Size
		if ( $title_size != '' ) {
			if ( preg_match( '/%/', $title_size ) OR preg_match( '/em/', $title_size ) OR preg_match( '/px/', $title_size ) ) {
				$title_size = 'font-size: '.$title_size.'; ';				
			} else {
				$title_size = 'font-size: '.$title_size.'px; ';		
			}
		} else {
			$title_size = '';
		}
	
		// Preload
		if ( $preload == 'true' ) {
			$preload = " preload ";
		} else {
			$preload = '';
		}	
	
		// Check for tags and categories
		$gp_related_tags = wp_get_post_tags( get_the_ID() );
		$gp_related_cats = wp_get_post_terms( get_the_ID(), 'category' );
		
		if ( $gp_related_tags ) {
			$related_type = 'tag__in';
			$gp_related_items = $gp_related_tags;
		} elseif ( $gp_related_cats ) {
			$related_type = 'category__in';
			$gp_related_items = $gp_related_cats;
		} else {
			$gp_related_items = '';
		}

		$tempQuery = $wp_query;
	
		if ( $gp_related_items ) {

			$gp_related_ids = array();
	
			foreach ( $gp_related_items as $gp_related_item ) $gp_related_ids[] = $gp_related_item->term_id;
		
			$gp_args = array( 
				'post_status' => 'publish',
				'post_type' => explode( ',', $content ),
				'cat' => $cats,
				'paged' => 1,
				'orderby' => $orderby,
				'order' => $order,
				'posts_per_page' => $per_page,
				'offset' => $offset,
				$related_type         => $gp_related_ids,
				'post__not_in' => array( $id ),
				'ignore_sticky_posts' => true,
			 );

			ob_start(); $gp_query = new wp_query( $gp_args ); $gp_counter = ''; ?>
										
			<?php if ( $gp_query->have_posts() ) : ?>

				<div id="<?php echo sanitize_html_class( $gp_name ); ?>" class="gp-blog-wrapper related-posts <?php echo sanitize_html_class( $spacing ); ?><?php if ( $cols > 1 ) { ?> gp-blog-columns-<?php echo absint( $cols ); ?><?php } ?>">

					<?php if ( $widget_title ) { ?><h3><?php echo esc_attr( $widget_title ); ?></h3><?php } ?>

					<?php while ( $gp_query->have_posts() ) : $gp_query->the_post(); $gp_counter = $gp_counter + 1;

						// Image Dimensions
						if ( get_post_meta( $post->ID, '_' . $dirname . '_thumbnail_width', true ) && get_post_meta( $post->ID, '_' . $dirname . '_thumbnail_width', true ) ) {
							$thumbnail_width = get_post_meta( $post->ID, '_' . $dirname . '_thumbnail_width', true );
						} else {
							$thumbnail_width = $image_width;
						}
						if ( get_post_meta( $post->ID, '_' . $dirname . '_thumbnail_height', true ) != '' ) {
							$thumbnail_height = get_post_meta( $post->ID, '_' . $dirname . '_thumbnail_height', true );
						} else {
							$thumbnail_height = $image_height;
						}

						?>
						
						<section <?php post_class( 'post-loop'.$preload ); ?>>
						
							<?php if ( has_post_thumbnail() && $images == 'true' ) { ?>
								
								<div class="post-thumbnail<?php if ( $image_wrap == 'true' ) { ?> wrap<?php } ?>">
				
									<?php if ( ( $link == 'image' OR $link == 'both' ) && get_post_meta( $post->ID, '_' . $dirname . '_link_type', true ) != 'None' ) { ?>
										<a href="<?php if ( get_post_meta( $post->ID, '_' . $dirname . '_link_type', true ) == 'Lightbox Video' ) { ?>file=<?php echo get_post_meta( $post->ID, '_' . $dirname . '_custom_url', true ); } elseif ( get_post_meta( $post->ID, '_' . $dirname . '_link_type', true ) == 'Lightbox Image' ) { if ( get_post_meta( $post->ID, '_' . $dirname . '_custom_url', true ) ) { echo get_post_meta( $post->ID, '_' . $dirname . '_custom_url', true ); } else { echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); }} else { if ( get_post_meta( $post->ID, '_' . $dirname . '_custom_url', true ) ) { echo get_post_meta( $post->ID, '_' . $dirname . '_custom_url', true ); } else { the_permalink(); }} ?>"<?php if ( get_post_meta( get_the_ID(), '_' . $dirname . '_link_type', true ) == 'Lightbox Image' OR get_post_meta( get_the_ID(), '_' . $dirname . '_link_type', true ) == 'Lightbox Video' ) { ?> data-rel="prettyPhoto[<?php echo sanitize_html_class( $gp_name . get_the_ID() ); ?>]"<?php } ?>>
									<?php } ?>
																		
										<?php $gp_image = aq_resize( wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ), $thumbnail_width, $thumbnail_height, $hard_crop, false, true ); ?>
										<?php if ( get_option( $dirname . '_retina' ) == '0' ) { 
											$gp_retina = aq_resize( wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ), $thumbnail_width * 2, $thumbnail_height * 2, $hard_crop, true, true ); 
										} else {
											$gp_retina = ''; 
										} ?>
										<img src="<?php echo esc_url( $gp_image[0] ); ?>" data-rel="<?php echo esc_url( $gp_retina ); ?>" width="<?php echo absint( $gp_image[1] ); ?>" height="<?php echo absint( $gp_image[2] ); ?>" alt="<?php if ( get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ) ) { echo esc_attr( get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ) ); } else { the_title_attribute(); } ?>" class="gp-post-image" />

									<?php if ( ( $link == 'image' OR $link == 'both' ) && get_post_meta( $post->ID, '_' . $dirname . '_link_type', true ) != 'None' ) { ?></a><?php } ?>
						
								</div>					
									
								<?php if ( $image_wrap == 'false' ) { ?><div class="clear"></div><?php } ?>
				
							<?php } ?>
				
							<?php if ( get_post_meta( $post->ID, '_' . $dirname . '_link_type', true ) == 'Lightbox Image' OR get_post_meta( $post->ID, '_' . $dirname . '_link_type', true ) == 'Lightbox Video' ) { ?>
				
								<?php $args = array( 'post_type' => 'attachment', 'post_parent' => $post->ID, 'numberposts' => -1, 'orderby' => 'menu_order', 'order' => 'asc', 'post__not_in'	=> array( get_post_thumbnail_id() ) ); $attachments = get_children( $args ); if ( $attachments ) { foreach ( $attachments as $attachment ) { ?>
				
									<a href="<?php if ( get_post_meta( $attachment->ID, '_' . $dirname . '_lightbox_url', true ) ) { ?>file=<?php echo esc_url( get_post_meta( $attachment->ID, '_' . $dirname . '_lightbox_url', true ) ); } else { echo esc_url( wp_get_attachment_url( $attachment->ID ) ); } ?>" data-rel="prettyPhoto[<?php echo sanitize_html_class( $gp_name . get_the_ID() ); ?>]" title="<?php echo esc_attr( $attachment->post_content ); ?>" style="display: none;"><img src='' alt="<?php echo esc_attr( $attachment->post_title ); ?>"></a>
				
								<?php }} ?>
				
							<?php } ?>
								
							<div class="post-text">
							
								<?php if ( $title == 'true' ) { ?><h2 style="<?php echo esc_attr( $title_size ); ?><?php if ( $title_font ) { ?> font-family: <?php echo esc_attr( $title_font ); ?>;<?php } ?>"><?php if ( $link == "title" OR $link == 'both' ) { ?><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php } ?><?php the_title(); ?><?php if ( $link == "title" OR $link == 'both' ) { ?></a><?php } ?></h2><?php } ?>
					
								<?php if ( $meta == 'true' && ( $meta_date == 'true' OR $meta_author == 'true' OR $meta_cats == 'true' OR $meta_comments == 'true' ) ) { ?>
						
									<div class="gp-loop-meta">
							
										<?php if ( $meta_author == 'true' ) { ?>
											<span class="gp-post-meta gp-meta-author"><a href="<?php echo get_author_posts_url( $post->post_author ); ?>"><?php echo get_the_author_meta( 'display_name', $post->post_author ); ?></a></span>
										<?php } ?>

										<?php if ( $meta_date == 'true' ) { ?>
											<time class="gp-post-meta gp-meta-date" datetime="<?php echo get_the_date( 'c' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>
										<?php } ?>
					
										<?php if ( $meta_cats == 'true' && $post->post_type == 'post' ) { ?>
											<span class="gp-post-meta gp-meta-cats"><?php the_category( ', ' ); ?></span>
										<?php } ?>
				
										<?php if ( $meta_comments == 'true' && comments_open() ) { ?>
											<span class="gp-post-meta gp-meta-comments"><?php comments_popup_link( esc_html__( '0', 'buddy' ), esc_html__( '1', 'buddy' ), esc_html__( '%', 'buddy' ), 'comments-link', '' ); ?></span>
										<?php } ?>
						
									</div>
						
								<?php } ?>
					
								<?php if ( $content_display == 'full' ) { ?>
						
									<?php global $more; $more = 0; the_content( esc_html__( 'Read More &raquo;', 'buddy' ) ); ?>
						
								<?php } else { ?>
					
									<?php if ( $excerpt_length != '0' ) { ?><p><?php echo ghostpool_excerpt( $excerpt_length ); ?><?php if ( $read_more == 'true' ) { ?> <a href="<?php the_permalink(); ?>" class="read-more" title="<?php the_title_attribute(); ?>"><?php esc_html_e( 'Read More', 'buddy' ); ?> &raquo;</a><?php } ?></p><?php } ?>
						
								<?php } ?>
								
								<?php if ( $meta == 'true' && $meta_tags == 'true' ) { ?>
									<?php the_tags( '<div class="gp-loop-meta"><span class="gp-post-meta gp-meta-tags">', ', ', '</span></div>' ); ?>
								<?php } ?>
				
							</div>
	
						</section>
			
					<?php endwhile; ?>
				
					<div class="clear"></div>

				</div>
			
			<?php endif; wp_reset_postdata(); ?>

			<?php 

			$gp_output_string = ob_get_contents();
			ob_end_clean();
			return $gp_output_string;
		
		}

	}
	
}

add_shortcode( 'related_posts', 'ghostpool_related_posts' );

?>