<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @subpackage Profit
 * @since Profit 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'profit' ); ?> >
<div
	class="wrapper <?php if ( is_plugin_active( 'motopress-content-editor-lite/motopress-content-editor.php' ) ): echo 'wrapper-mce-lite';endif; ?>">
	<?php if ( get_page_template_slug() != 'template-landing-page.php' || is_search() ):
		
		$mp_profit_show_sticky_menu = get_theme_mod( 'mp_profit_show_sticky_menu', true ) === true || get_theme_mod( 'mp_profit_show_sticky_menu', true ) === 1;
		if (isset($_GET['motopress-ce']) && $_GET['motopress-ce'] === '1')
			$mp_profit_show_sticky_menu = false;
		?>
		<header id="header"
		        class="main-header <?php if ($mp_profit_show_sticky_menu) : ?>fixed<?php endif; ?>"
		        data-sticky-menu="<?php if ($mp_profit_show_sticky_menu) : ?>on<?php else: echo 'off'; endif; ?>">
			<?php
			$menuClass = '';
			if ( is_front_page() ) :
				if ( get_option( 'show_on_front' ) != 'page' ):
					if ( get_theme_mod( 'mp_profit_custom_page_show', false ) === false ):
						$menuClass = 'home-menu';
					elseif ( get_theme_mod( 'mp_profit_custom_page_show' ) === 1 ):
						$menuClass = 'home-menu';
					endif;
				endif;
			endif;
			?>
			<div class="site-header">
				<div class="container">
					<div class="site-logo">
						<div class="header-logo">
						<?php
							if ( function_exists( 'the_custom_logo' ) ) {
								the_custom_logo();
							}
						?>
						</div>
						<?php if ( get_bloginfo( 'description' ) || get_bloginfo( 'name', 'display' ) != "" ) : ?>
							<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>"
							   title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
								<div class="site-description">
									<h1 class="site-title <?php if ( ! get_bloginfo( 'description' ) ) : ?>empty-tagline<?php endif; ?>"><?php bloginfo( 'name' ); ?></h1>
									<?php if ( get_bloginfo( 'description' ) ) : ?>
										<p class="site-tagline"><?php bloginfo( 'description' ); ?></p>
									<?php endif; ?>
								</div>
							</a>
						<?php endif ?>
					</div>
					<div class="wrapper-icons site-header-cart">
						<?php
						mp_profit_get_cart();
						?>

						<a href="#" class="search-icon"><i class="fa fa-search"></i></a>

					</div>
					<div id="navbar" class="navbar">
						<nav id="site-navigation" class="main-navigation">

							<?php
							$defaults = array(
								'theme_location' => 'primary',
								'menu_class'     => 'sf-menu ' . $menuClass,
								'menu_id'        => 'main-menu',
								'fallback_cb'    => 'mp_profit_wp_page_menu',
								'link_before'    => '<span>',
								'link_after'     => '</span>'
							);
							wp_nav_menu( $defaults );
							mp_profit_mobile_menu();
							?>
						</nav>
					</div>
					<div class="modal-search-modal">
						<a href="#" class="close-search-modal"><i class="fa fa-close"></i></a>
						<form method="get" class="search-form" action="<?php echo esc_url( home_url('/') ); ?>">
							<input type="text" class="search-field" autofocus
							       placeholder="<?php echo esc_attr_x( 'To search start typing...', 'placeholder','profit-lite' ) ?>" value="<?php echo get_search_query() ?>"
							       name="s"
							       title="<?php echo esc_attr_x( 'Search for:', 'label','profit-lite' ) ?>"/>
							<button type="submit" class="search-submit">search</button>
						</form>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</header>
	<?php endif ?>
	<div id="main" class="site-main">

