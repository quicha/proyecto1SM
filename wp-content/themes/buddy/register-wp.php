<?php
/*
Template Name: Register
*/
get_header(); global $gp_settings, $user_ID, $user_identity, $user_level; ?>

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
				<img src="<?php echo esc_url( $gp_image[0] ); ?>" data-rel="<?php echo esc_url( $gp_retina ); ?>" width="<?php echo absint( $gp_image[1] ); ?>" height="<?php echo absint( $gp_image[2] ); ?>" alt="<?php if ( get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ) ) { echo esc_attr( get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ) ); } else { the_title_attribute(); } ?>" class="gp-post-image" />			
			</div>
		<?php } ?>

		<div class="padder<?php if ( has_post_thumbnail() && $gp_settings['show_image'] == 'Show' ) { ?> content-post-thumbnail<?php } ?>">

			<?php if ( $gp_settings['title'] == 'Show' ) { ?><h1 class="page-title"><?php the_title(); ?></h1><?php } ?>

			<?php if ( $post->post_content ) { ?>	
			
				<div id="post-content">

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

			<?php if ( $user_ID ) { ?>
			
				<h2><?php esc_html_e( 'You are already logged in.', 'buddy' ); ?></h2>
			
			<?php } else { ?>

				<form action="<?php echo site_url( 'wp-login.php?action=register', 'login_post' ); ?>" method="post">
			
					<p><label for="log"><?php esc_html_e( 'Username', 'buddy' ); ?></label>
					<br/><input type="text" name="user_login" id="user_login" class="input" value="<?php esc_attr( stripslashes( $user_login ) ); ?>" size="22" /></p>
			
					<p><label for="pwd"><?php esc_html_e( 'Email', 'buddy' ); ?></label><br/>
					<input type="text" name="user_email" id="user_email" class="input" value="<?php esc_attr( stripslashes( $user_email ) ); ?>" size="22" /></p>
			
					<?php do_action( 'register_form' ); ?>
					<p><?php esc_html_e( 'Your password will be emailed to you.', 'buddy' ); ?></p>
					<p><input type="submit" name="wp-submit" id="wp-submit" value="<?php esc_attr_e( 'Register', 'buddy' ); ?>" tabindex="100" /></p>
			
				</form>
		
			<?php } ?>
				
		</div>

	</div>
	
<?php endwhile; endif; ?>

<?php get_footer(); ?>