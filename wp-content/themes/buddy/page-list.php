<?php
/*
Template Name: Page List
*/
get_header(); global $gp_settings; ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div id="content">
		
		<?php if ( has_post_thumbnail() && $gp_settings['show_image'] == 'Show' ) { ?>	
			<div class="post-thumbnail single-thumbnail">
				<?php $gp_image = aq_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ), $gp_settings['image_width'], $gp_settings['image_height'], $gp_settings['hard_crop'], false, true ); ?>
				<?php if ( get_option( $dirname . '_retina' ) == '0' ) { 
					$gp_retina = aq_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ), $gp_settings['image_width'] * 2, $gp_settings['image_height'] * 2, $gp_settings['hard_crop'], true, true );
				} else { 
					$gp_retina = '';
				} ?>
				<img src="<?php echo esc_url( $gp_image[0] ); ?>" data-rel="<?php echo esc_url( $gp_retina ); ?>" width="<?php echo absint( $gp_image[1] ); ?>" height="<?php echo absint( $gp_image[2] ); ?>" alt="<?php if ( get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ) ) { echo esc_attr( get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ) ); } else { the_title_attribute(); } ?>" class="gp-post-image" itemprop="image" />				
			</div>					
		<?php } ?>
			
		<div class="padder<?php if ( has_post_thumbnail() && $gp_settings['show_image'] == 'Show' ) { ?> content-post-thumbnail<?php } ?>">

			<?php if ( $gp_settings['title'] == 'Show' ) { ?><h1 class="page-title"><?php the_title(); ?></h1><?php } ?>

			<?php if ( has_post_thumbnail() && $gp_settings['image_wrap'] == 'Enable' && $gp_settings['show_image'] == 'Show' ) { ?>
				<div class="post-thumbnail wrap">
					<?php $gp_image = aq_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ), $gp_settings['image_width'], $gp_settings['image_height'], $gp_settings['hard_crop'], false, true ); ?>
					<?php if ( get_option( $dirname . '_retina' ) == '0' ) { 
						$gp_retina = aq_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ), $gp_settings['image_width'] * 2, $gp_settings['image_height'] * 2, $gp_settings['hard_crop'], true, true );
					} else { 
						$gp_retina = '';
					} ?>
					<img src="<?php echo esc_url( $gp_image[0] ); ?>" data-rel="<?php echo esc_url( $gp_retina ); ?>" width="<?php echo absint( $gp_image[1] ); ?>" height="<?php echo absint( $gp_image[2] ); ?>" alt="<?php if ( get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ) ) { echo esc_attr( get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ) ); } else { the_title_attribute(); } ?>" class="gp-post-image" itemprop="image" />		
				</div>
			<?php } ?>
				
			<?php 
			
			$children = wp_list_pages( 'depth=1&title_li=&child_of='.get_the_ID().'&echo=0' ); 
			
			if ( $children ) { ?>
			
				<ul class="page-list">
					<?php echo wp_kses_post( $children ); ?>
				</ul>
				
			<?php } ?>

			<div class="clear"></div>
					
		</div>

	</div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>