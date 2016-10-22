<!DOCTYPE html>
<!--[if !IE]><!-->
<html <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->
<!--[if IE 9]>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?> class="no-js ie9">
<![endif]-->
<head>
<?php require( ghostpool_inc . 'options.php' ); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<?php global $dirname, $gp_settings; if ( get_option( $dirname . '_responsive' ) == '0' ) { ?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<?php } else { ?>
	<meta name="viewport" content="width=1230">
<?php } ?>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php esc_url( bloginfo( 'pingback_url' ) ); ?>" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

<?php if ( ! is_page_template( 'blank-page.php' ) ) { ?>

	<div id="page-wrapper">

		<header id="header" itemscope itemtype="http://schema.org/WPHeader">

			<<?php if ( $gp_settings['title'] == 'Show' ) { ?>div<?php } else { ?>h1<?php } ?> id="logo" style="<?php if ( get_option( $dirname . '_logo_top' ) ) { ?> margin-top: <?php echo get_option( $dirname . '_logo_top' ); ?>px;<?php } ?><?php if ( get_option( $dirname . '_logo_right' ) ) { ?> margin-right: <?php echo get_option( $dirname . '_logo_right' ); ?>px;<?php } ?><?php if ( get_option( $dirname . '_logo_bottom' ) ) { ?> margin-bottom: <?php echo get_option( $dirname . '_logo_bottom' ); ?>px;<?php } ?><?php if ( get_option( $dirname . '_logo_left' ) ) { ?> margin-left: <?php echo get_option( $dirname . '_logo_left' ); ?>px;<?php } ?>"<?php if ( ! get_option( $dirname . '_logo' ) ) { ?> class="default-logo"<?php } ?>>

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">
					<img src="<?php if ( get_option( $dirname . '_logo' ) ) { echo( get_option( $dirname . '_logo' ) ); } else { echo ghostpool_images; ?>logo.png<?php } ?>" width="<?php if ( get_option( $dirname . '_logo_width' ) ) { echo get_option( $dirname . '_logo_width' ); } else { echo '108'; } ?>" height="<?php if ( get_option( $dirname . '_logo_height' ) ) { echo get_option( $dirname . '_logo_height' ); } else { echo '25'; } ?>" alt="<?php bloginfo( 'name' ); ?>" />
				</a>
			
			</<?php if ( $gp_settings['title'] == 'Show' ) { ?>div<?php } else { ?>h1<?php } ?>>

			<nav id="nav" itemscope itemtype="http://schema.org/SiteNavigationElement">		

				<?php if ( has_nav_menu( 'main-nav' ) ) { ?>
					<?php wp_nav_menu( array( 'theme_location' => 'main-nav', 'sort_column' => 'menu_order', 'container' => 'ul', 'fallback_cb' => 'null' ) ); ?>
				<?php } ?>

				<?php if ( get_option( $dirname . '_bp_buttons' ) == '0' ) { ?>
							
					<div id="bp-buttons">
				
						<?php if ( is_user_logged_in() ) { ?>	
							
							<?php if ( get_option( $dirname . '_profile_button' ) !== 'gp-profile-disabled' ) { $gp_current_user = wp_get_current_user(); ?>
								<a href="<?php if ( function_exists( 'bp_is_active' ) ) { global $bp; echo $bp->loggedin_user->domain; } else { get_currentuserinfo(); echo get_author_posts_url( $gp_current_user->ID ); } ?>" class="bp-button" id="gp-profile-desktop-button"><?php echo $gp_current_user->display_name; ?></a>
								<a href="<?php if ( function_exists( 'bp_is_active' ) ) { global $bp; echo $bp->loggedin_user->domain; } else { get_currentuserinfo(); echo get_author_posts_url( $gp_current_user->ID ); } ?>" class="bp-button" id="gp-profile-mobile-button"></a>
							<?php } ?>
										
							<a href="<?php echo wp_logout_url( esc_url( $_SERVER['REQUEST_URI'] ) ); ?>" class="bp-button login-button"><?php esc_html_e( 'Logout', 'buddy' ); ?></a>
	
						<?php } else { ?>
						
							<a href="<?php if ( get_option( $dirname . '_login_url' ) ) { echo esc_url( get_option( $dirname . '_login_url' ) ); } else { echo esc_url( wp_login_url() ); } ?>" class="bp-button login-button"><?php esc_html_e( 'Login', 'buddy' ); ?></a>
						
							<?php if ( get_option( 'users_can_register' ) ) { ?><a href="<?php if ( function_exists( 'bp_is_active' ) ) { echo esc_url( bp_get_signup_page( false ) ); } elseif ( get_option( $dirname . '_register_url' ) ) { echo esc_url( get_option( $dirname . '_register_url' ) ); } ?>" class="bp-button signup-button"><?php esc_html_e( 'Sign Up', 'buddy' ); ?></a><?php } ?>
						
						<?php } ?>
				
					</div>
				
				<?php } ?>
			
				<?php if ( has_nav_menu( 'main-nav' ) ) { ?>
					<a id="mobile-nav-button"><i class="fa fa-bars"></i></a>
				<?php } ?>
								
			</nav>

			<nav id="mobile-nav" itemscope itemtype="http://schema.org/SiteNavigationElement">

				<?php if ( get_option( $dirname . '_bp_buttons' ) == '0' ) { ?>
							
					<div id="mobile-bp-buttons">
				
						<?php if ( is_user_logged_in() ) { ?>	
										
							<a href="<?php echo esc_url( wp_logout_url( $_SERVER['REQUEST_URI'] ) ); ?>" class="bp-button login-button"><?php esc_html_e( 'Logout', 'buddy' ); ?></a>
	
						<?php } else { ?>
						
							<a href="<?php if ( get_option( $dirname . '_login_url' ) ) { echo esc_url( get_option( $dirname . '_login_url' ) ); } else { echo esc_url( wp_login_url() ); } ?>" class="bp-button login-button"><?php esc_html_e( 'Login', 'buddy' ); ?></a>
						
							<?php if ( get_option( 'users_can_register' ) ) { ?><a href="<?php if ( function_exists( 'bp_is_active' ) ) { echo esc_url( bp_get_signup_page( false ) ); } elseif ( get_option( $dirname . '_register_url' ) ) { echo esc_url( get_option( $dirname . '_register_url' ) ); } ?>" class="bp-button signup-button"><?php esc_html_e( 'Sign Up', 'buddy' ); ?></a><?php } ?>
						
						<?php } ?>
				
					</div>
				
				<?php } ?>
	
				<?php wp_nav_menu( array( 'theme_location' => 'main-nav', 'sort_column' => 'menu_order', 'container' => '', 'items_wrap' => '<ul class="menu">%3$s</ul>', 'fallback_cb' => 'null' ) ); ?>
				
			</nav>
				
		</header>
		
		<div id="gp-fixed-padding"></div>

		<div id="content-wrapper">
	
			<div id="left-content-wrapper">		

<?php } ?>			