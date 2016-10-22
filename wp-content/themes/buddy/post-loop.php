<?php global $post, $gp_settings, $dirname; ?>

<div id="content">

	<div class="padder">

		<?php if ( $gp_settings['title'] == 'Show' ) { ?>
			<h1 class="page-title" itemprop="headline">
				<?php if ( is_search() ) { ?>
					<?php echo absint( $wp_query->found_posts ); ?> <?php esc_html_e( 'search results for', 'buddy' ); ?> "<?php echo esc_html( $s ); ?>"
				<?php } elseif ( is_category() ) { ?>
					<?php single_cat_title(); ?>
				<?php } elseif ( is_tag() ) { ?>
					<?php single_tag_title(); ?>
				<?php } else { ?>
					<?php if ( ! function_exists( '_wp_render_title_tag' ) && ! function_exists( 'ghostpool_render_title' ) ) { esc_html_e( 'Archives', 'buddy' ); } else { the_archive_title(); } ?>
				<?php } ?>
			</h1>
		<?php } ?>

		<div class="gp-blog-wrapper">
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post();			
			
			// Image Dimensions			
			if ( get_post_meta( get_the_ID(), '_' . $dirname . '_thumbnail_width', true ) && get_post_meta( get_the_ID(), '_' . $dirname . '_thumbnail_width', true ) != '' ) {
				$thumbnail_width = get_post_meta( get_the_ID(), '_' . $dirname . '_thumbnail_width', true );
			} else {
				$thumbnail_width = $gp_settings['thumbnail_width'];
			}
			if ( get_post_meta( get_the_ID(), '_' . $dirname . '_thumbnail_height', true ) != '' ) {
				$thumbnail_height = get_post_meta( get_the_ID(), '_' . $dirname . '_thumbnail_height', true );
			} else {
				$thumbnail_height = $gp_settings['thumbnail_height'];
			}		

			?>

				<section <?php post_class( 'post-loop ' . $gp_settings['preload'] ); ?> itemscope itemtype="http://schema.org/Blog">

					<?php if ( has_post_thumbnail() ) { ?>				
						<div class="post-thumbnail<?php if ( $gp_settings['image_wrap'] == 'Enable' ) { ?> wrap<?php } ?>">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<?php $gp_image = aq_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ), $thumbnail_width, $thumbnail_height, $gp_settings['hard_crop'], false, true ); ?>
								<?php if ( get_option( $dirname . '_retina' ) == '0' ) {
									$gp_retina = aq_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ), $thumbnail_width * 2, $thumbnail_height * 2, $gp_settings['hard_crop'], true, true );
								} else {
									$gp_retina = '';
								} ?>
								<img src="<?php echo esc_url( $gp_image[0] ); ?>" data-rel="<?php echo esc_url( $gp_retina ); ?>" width="<?php echo absint( $gp_image[1] ); ?>" height="<?php echo absint( $gp_image[2] ); ?>" alt="<?php if ( get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ) ) { echo esc_attr( get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ) ); } else { the_title_attribute(); } ?>" class="gp-post-image" itemprop="image" />
							</a>				
						</div><?php if ( $gp_settings['image_wrap'] == 'Disable' ) { ?><div class="clear"></div><?php } ?>
					<?php } ?>
				
					<div class="post-text">
					
						<h2 itemprop="headline"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

						<?php if ( ( isset( $gp_settings['meta_date'] ) && $gp_settings['meta_date'] == '0' ) OR ( isset( $gp_settings['meta_author'] ) && $gp_settings['meta_author'] == '0' ) OR ( isset( $gp_settings['meta_cats'] ) && $gp_settings['meta_cats'] == '0' && $post->post_type == 'post' ) OR ( isset( $gp_settings['meta_comments'] ) && $gp_settings['meta_comments'] == '0' ) ) { ?>
			
							<div class="gp-loop-meta">
				
								<?php if ( $gp_settings['meta_author'] == '0' ) { ?>
									<span class="gp-post-meta gp-meta-author"><a href="<?php echo get_author_posts_url( $post->post_author ); ?>" itemprop="author"><?php echo get_the_author_meta( 'display_name', $post->post_author ); ?></a></span>
								<?php } ?>

								<?php if ( $gp_settings['meta_date'] == '0' ) { ?>
									<time class="gp-post-meta gp-meta-date" itemprop="datePublished" datetime="<?php echo get_the_date( 'c' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>
								<?php } ?>
					
								<?php if ( $gp_settings['meta_cats'] == '0' && $post->post_type == 'post' ) { ?>
									<span class="gp-post-meta gp-meta-cats"><?php the_category( ', ' ); ?></span>
								<?php } ?>
				
								<?php if ( $gp_settings['meta_comments'] == '0' && comments_open() ) { ?>
									<span class="gp-post-meta gp-meta-comments"><?php comments_popup_link( esc_html__( '0', 'buddy' ), esc_html__( '1', 'buddy' ), esc_html__( '%', 'buddy' ), 'comments-link', '' ); ?></span>
								<?php } ?>
				
							</div>
				
						<?php } ?>
	
						<?php if ( $gp_settings['content_display'] == '1' ) { ?>	
						
							<?php global $more; $more = 0; the_content( esc_html__( 'Read More &raquo;', 'buddy' ) ); ?>
							
						<?php } else { ?>
						
							<?php if ( $gp_settings['excerpt_length'] != '0' ) { ?><p><?php echo ghostpool_excerpt( $gp_settings['excerpt_length'] ); ?><?php if ( $gp_settings['read_more'] == '0' ) { ?> <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="read-more"> &raquo;</a><?php } ?></p><?php } ?>
							
						<?php } ?>

						<?php if ( $gp_settings['meta_tags'] == '0' ) { ?>
							<?php the_tags( '<div class="post-meta post-tags"><span><i class="fa fa-tags"></i>', ', ', '</span></div>' ); ?>
						<?php } ?>

					</div>
					
				</section>
				
			<?php endwhile; ?>

				<?php echo ghostpool_pagination( $wp_query->max_num_pages ); ?>
		
			<?php else : ?>	
			
				<h4><?php esc_html_e( 'Try searching again using the search form below.', 'buddy' ); ?></h4>
			
				<div class="sc-divider"></div>
				
				<h3><?php esc_html_e( 'Search The Site', 'buddy' ); ?></h3>
				<?php get_search_form(); ?>	

			<?php endif; ?>	
	
		</div>

	</div>

</div>