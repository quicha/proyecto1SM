<?php
/*
Template Name: Login
*/
get_header(); global $post, $gp_settings, $user_ID, $user_identity, $user_level; 

if ( isset( $_SERVER['REQUEST_URI'] ) ) { $referrer = $_SERVER['REQUEST_URI']; }

?>

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

			<?php if ( $post->post_content ) { ?>	
			
				<div id="post-content">

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
		
					<?php the_content(); ?>
					
				</div>
				
			<?php } else { ?>
			
				<?php the_content(); ?>
				
			<?php } ?>
			
			<?php if ( $user_ID ) { ?>
			
				<h2><?php esc_html_e( 'You are already logged in.', 'buddy' ); ?></h2>
			
			<?php } else { ?>

				<form action="<?php echo esc_url( site_url( 'wp-login.php', 'login_post' ) ); ?>" method="post" id="login-page-form">
				
					<p><label for="log"><?php esc_html_e( 'Username', 'buddy' ); ?></label>
					<input type="text" name="log" id="log" value="<?php if ( ! empty( $user_login ) ) { echo esc_attr( stripslashes( $user_login ), 1 ); } ?>" size="22" placeholder="<?php esc_attr_e( 'Username', 'buddy' ); ?>" /></p>
					
					<p><label for="pwd"><?php esc_html_e( 'Password', 'buddy' ); ?></label>
					<input type="password" name="pwd" id="pwd" size="22" placeholder="<?php esc_attr_e( 'Password', 'buddy' ); ?>" /></p>
					
					<p><input type="submit" name="submit" value="<?php esc_attr_e( 'Login', 'buddy' ); ?> &rarr;" class="button" />
					
					<label for="rememberme"><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> <?php esc_html_e( 'Remember Me', 'buddy' ); ?></label></p>
					
					<input type="hidden" name="redirect_to" value="<?php echo esc_url( home_url( '/' ) ); ?>" />
					
				</form>

				<div id="login-page-links">
				
					<?php if ( function_exists( 'bp_is_active' ) && bp_get_signup_allowed() ) { ?>
						<a href="<?php echo esc_url( bp_get_signup_page( false ) ); ?>" class="gp-register-link"><?php esc_html_e( 'Register', 'buddy' ); ?></a>
					<?php } ?>
				
					<a href="<?php echo esc_url( site_url( 'wp-login.php?action=lostpassword', 'login_post' ) ); ?>" class="gp-lost-password-link"><?php esc_html_e( 'Lost Password', 'buddy' ); ?></a>
			
				</div>
				
			<?php } ?>
			
		
		</div>
		
	</div>
	
<?php endwhile; endif; ?>

<?php get_footer(); ?>