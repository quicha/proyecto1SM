<?php get_header(); global $post, $gp_settings, $dirname; ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<div id="content">

		<?php if ( has_post_thumbnail() && $gp_settings['image_wrap'] == 'Disable' && $gp_settings['show_image'] == 'Show' ) { ?>
			<div class="post-thumbnail single-thumbnail">
				<?php $gp_image = aq_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ), $gp_settings['image_width'], $gp_settings['image_height'], $gp_settings['hard_crop'], false, true ); ?>
				<?php if ( get_option( $dirname . '_retina' ) == '0' ) { 
					$gp_retina = aq_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ), $gp_settings['image_width'] * 2, $gp_settings['image_height'] * 2, $gp_settings['hard_crop'], true, true ); 
				} else { 
					$gp_retina = '';
				} ?>
				<img src="<?php echo esc_url( $gp_image[0] ); ?>" data-rel="<?php echo esc_url( $gp_retina ); ?>" width="<?php echo absint( $gp_image[1] ); ?>" height="<?php echo absint( $gp_image[2] ); ?>" alt="<?php if ( get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ) ) { echo esc_attr( get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ) ); } else { the_title_attribute(); } ?>" class="gp-post-image" />	
			</div>
		<?php } ?>
			
		<div class="padder<?php if ( has_post_thumbnail() && $gp_settings['image_wrap'] == 'Disable' && $gp_settings['show_image'] == 'Show' ) { ?> content-post-thumbnail<?php } ?>">

			<?php if ( $gp_settings['title'] == 'Show' ) { ?><h1 class="page-title"><?php the_title(); ?></h1><?php } ?>

			<?php if ( ( isset( $gp_settings['meta_date'] ) && $gp_settings['meta_date'] == '0' ) OR ( isset( $gp_settings['meta_author'] ) && $gp_settings['meta_author'] == '0' ) OR ( isset( $gp_settings['meta_comments'] ) && $gp_settings['meta_comments'] == '0' ) ) { ?>
		
				<div class="gp-entry-meta">
			
					<?php if ( $gp_settings['meta_author'] == '0' ) { ?>
						<span class="gp-post-meta gp-meta-author"><a href="<?php echo get_author_posts_url( $post->post_author ); ?>" itemprop="author"><?php echo get_the_author_meta( 'display_name', $post->post_author ); ?></a></span>
					<?php } ?>

					<?php if ( $gp_settings['meta_date'] == '0' ) { ?>
						<time class="gp-post-meta gp-meta-date" itemprop="datePublished" datetime="<?php echo get_the_date( 'c' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>
					<?php } ?>
			
					<?php if ( $gp_settings['meta_comments'] == '0' && comments_open() ) { ?>
						<span class="gp-post-meta gp-meta-comments"><?php comments_popup_link( esc_html__( '0', 'buddy' ), esc_html__( '1', 'buddy' ), esc_html__( '%', 'buddy' ), 'comments-link', '' ); ?></span>
					<?php } ?>
			
				</div>
			
			<?php } ?>

			<?php if ( $post->post_content ) { ?>	
		
				<div id="post-content" itemprop="text">

					<?php if ( has_post_thumbnail() && $gp_settings['image_wrap'] == 'Enable' && $gp_settings['show_image'] == 'Show' ) { ?>
						<div class="post-thumbnail wrap">
							<?php $gp_image = aq_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ), $gp_settings['image_width'], $gp_settings['image_height'], $gp_settings['hard_crop'], false, true ); ?>
							<?php if ( get_option( $dirname . '_retina' ) == '0' ) { $gp_retina = aq_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ), $gp_settings['image_width'] * 2, $gp_settings['image_height'] * 2, $gp_settings['hard_crop'], true, true ); } else { $gp_retina = ''; } ?>
							<img src="<?php echo esc_url( $gp_image[0] ); ?>" data-rel="<?php echo esc_url( $gp_retina ); ?>" width="<?php echo absint( $gp_image[1] ); ?>" height="<?php echo absint( $gp_image[2] ); ?>" alt="<?php if ( get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ) ) { echo esc_attr( get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ) ); } else { the_title_attribute(); } ?>" class="gp-post-image" />		
						</div>
					<?php } ?>
			
					<?php the_content(); ?>
				
				</div>
			
			<?php } else { ?>
		
				<?php the_content(); ?>
			
			<?php } ?>

			<?php wp_link_pages( 'before=<div class="gp-pagination gp-pagination-numbers gp-standard-pagination gp-entry-pagination"><ul class="page-numbers">&pagelink=<span class="page-numbers">%</span>&after=</ul></div>' ); ?>

			<?php if ( isset( $gp_settings['author_info'] ) && $gp_settings['author_info'] == '0' ) { ?><?php echo do_shortcode( '[author]' ); ?><?php } ?>

			<?php comments_template(); ?>

			<div class="clear"></div>
				
		</div>
					
	</div>
	
<?php endwhile; endif; ?>

<?php get_footer(); ?>