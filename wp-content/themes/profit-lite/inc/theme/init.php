<?php
define( 'MP_PROFIT_THEME_TEXT_COLOR', '#6c7485' );
define( 'MP_PROFIT_THEME_BRAND_COLOR', '#337ab7' );
define( 'MP_PROFIT_THEME_HEADERCOLOR', '#657883' );

/*
 * Set up the content width value based on the theme's design.
 *
 */
if ( ! isset( $content_width ) ) {
	$content_width = 770;
}

/**
 * Add support for a custom header image.
 */
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/admin/customize.php';


/*
 * profit only works in WordPress 3.6 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '3.6-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

/**
 * profit setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * profit supports.
 *
 * @since profit 1.0
 */
function mp_profit_setup() {
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style();
	/*
	 * Makes profit available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on profit, use a find and
	 * replace to change profit to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain('profit-lite', get_template_directory() . '/languages' );
	$locale      = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";

	if ( is_readable( $locale_file ) ) {
		require_once( $locale_file );
	}
	/*
	 *  Adds RSS feed links to <head> for posts and comments.
	 */
	add_theme_support( 'automatic-feed-links' );
	/*
	 * Supporting title tag via add_theme_support (since WordPress 4.1)
	 */
	add_theme_support( 'title-tag' );
	/*
	 * This theme supports a variety of post formats.
	 */
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'image', 'video', 'quote', 'audio', 'link' ) );
	/*
	 *  This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'profit-lite' )
		) );

	/*
	 * This theme uses its own gallery styles.
	 */
	add_filter( 'use_default_gallery_style', '__return_false' );

	/*
	 * Add theme support post thumbnails.
	 */

	if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 870, 480, true );
	}
	add_image_size( 'mp-profit-thumb-medium-column', 570, 265, true );
	add_image_size( 'mp-profit-thumb-medium-masonry', 570, 9999, false );
	add_image_size( 'mp-profit-thumb-large', 1170, 483, true );
	add_image_size( 'mp-profit-thumb-related', 370, 192, true );


	add_image_size( 'mp-profit-thumb-slide-medium', 1024, 623, true );
	add_image_size( 'mp-profit-thumb-slide-small', 768, 623, true );
	
	add_theme_support( 'custom-logo', array(
		'header-text' => array( 'header-logo'),
	));
}

add_action( 'after_setup_theme', 'mp_profit_setup' );
/*
 * Profit admin js.
 *
 * Add js for customizer.
 *
 * @since profit 1.1.0
 */

function mp_profit_enqueue() {
	if ( is_callable( 'is_customize_preview' ) && is_customize_preview() ) {
		wp_enqueue_script( 'mp-profit-sections', get_template_directory_uri() . '/js/theme-sections.min.js', '', mp_profit_get_theme_version(), true );
	}
}

add_action( 'admin_enqueue_scripts', 'mp_profit_enqueue' );

/**
 * Profit page menu.
 *
 * Show pages of site.
 *
 * @since profit 1.0
 */
function mp_profit_wp_page_menu() {
	echo '<ul class="sf-menu">';
	wp_list_pages( array( 'title_li' => '', 'depth' => 1 ) );
	echo '</ul>';
}

/**
 * Profit page top menu.
 *
 * Show pages of site.
 *
 * @since profit 1.0
 */
function mp_profit_wp_page_short_menu() {
	echo '<ul id="menu-bottom-menu" class="menu">';
	$pages = wp_list_pages( array( 'title_li' => '', 'depth' => 1, 'echo' => 0 ) );
	$pages = explode( "</li>", $pages );
	$count = 0;
	foreach ( $pages as $page ) {
		$count ++;
		echo $page;
		if ( $count == 5 ) {
			break;
		}
	}
	echo '</ul>';
}

/**
 * Profit Mobile Menu
 *
 *  Show menu or pages of site.
 *
 * @since profit 1.0
 */
require get_template_directory() . '/inc/theme/nav-menu-dropdown.php';

function mp_profit_mobile_menu() {
	if ( has_nav_menu( 'primary' ) ) :
		wp_nav_menu( array(
			'theme_location' => 'primary',
			'walker'         => new MP_Profit_Walker_Nav_Menu_Dropdown(),
			'items_wrap'     => '<div class="mobile-menu "><form name="menu-form" id="menu-form" action="#" method="" get"><div class="select-wrapper"><select onchange="if (this.value) window.location.href=this.value">%3$s</select></div></form></div>',
		) );
	else:
		echo '<div class="mobile-menu "><div class="select-wrapper"><select name="page-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;"> ';
		echo '<option value="">';
		echo esc_attr( __( 'Select page', 'profit-lite' ) );
		echo '</option>';
		$pages = get_pages();
		global $post;
		foreach ( $pages as $page ) {
			$option = '<option ';
			if ( $page->ID === $post->ID ):
				$option .= 'selected ';
			endif;
			$option .= 'value="' . get_page_link( $page->ID ) . '">';
			$option .= $page->post_title;
			$option .= '</option>';
			echo $option;
		}
		echo '</select></div></div>';
	endif;
}

function mp_profit_before_header() {
	do_action( 'mp_profit_before_header' );
}

add_action( 'mp_profit_before_header', 'be_mobile_menu' );


/* Return the Google font stylesheet URL, if available.
 *
 * The use of Open Sans by default is localized. 
 *
 * @since  1.0.0
 * @access public
 * @return void
 */

function mp_profit_load_google_fonts() {
	wp_register_style( 'googleLato', 'https://fonts.googleapis.com/css?family=Lato:400,300,700,300italic,400italic,700italic' );
	wp_enqueue_style( 'googleLato' );
}

add_action( 'wp_enqueue_scripts', 'mp_profit_load_google_fonts' );

/**
 * Enqueue scripts and styles for the front end.
 */
function mp_profit_scripts_styles() {
	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	/*
	 *  Scripts for template masonry blog
	 */
	$mp_profit_blog_type = esc_html( get_theme_mod( 'mp_profit_blog_style', 'masonry' ) );
	if ( is_home() && $mp_profit_blog_type === 'masonry' ) :
		wp_enqueue_script( 'jquery-masonry' );
		wp_enqueue_script( 'jquery.infinitescroll', get_template_directory_uri() . '/js/jquery.infinitescroll.min.js', array( 'jquery' ), '2.1.0', true );

	endif;
	wp_enqueue_script( 'superfish.min', get_template_directory_uri() . '/js/superfish.min.js', array(
		'jquery',
		'hoverIntent'
	), '1.7.5', true );
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array(
		'jquery',
		'hoverIntent'
	), '2.5.0', true );
	wp_enqueue_script( 'mp-profit-script', get_template_directory_uri() . '/js/profit.min.js', array(
		'jquery',
		'superfish.min',
		'flexslider'
	), mp_profit_get_theme_version(), true );

	$data_array = array(
		'url'             => get_template_directory_uri(),
		'menu_smooth_scroll' => apply_filters('mp_profit_menu_smooth_scroll_enabled', true),
		'invest_result'   => __( 'Results Summary', 'profit-lite' ),
		'invest_start'    => __( 'Starting amount', 'profit-lite' ),
		'invest_years'    => __( 'Years to invest', 'profit-lite' ),
		'invest_rate'     => __( 'Hypothetical annual rate of return', 'profit-lite' ),
		'invest_total'    => __( 'Total amount invested', 'profit-lite' ),
		'invest_ending'   => __( 'Ending investment balance', 'profit-lite' ),
		'invest_year'     => __( 'Year', 'profit-lite' ),
		'invest_earnings' => __( 'Earnings', 'profit-lite' ),
		'invest_balance'  => __( 'Balance', 'profit-lite' ),
	);
	wp_localize_script( 'mp-profit-script', 'mp_profit_script_data', $data_array );

	/*
	 * Loads Profit Styles
	 */
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.5', 'all' );

	wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.min.css', array( 'bootstrap' ), '2.5.0', 'all' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array( 'bootstrap' ), '4.3.0', 'all' );

	wp_enqueue_style( 'mp-profit-main', get_template_directory_uri() . '/css/profit-style.min.css', array(
		'bootstrap',
		'font-awesome'
	), mp_profit_get_theme_version(), 'all' );

	if ( is_plugin_active( 'motopress-content-editor/motopress-content-editor.php' ) || is_plugin_active( 'motopress-content-editor-lite/motopress-content-editor.php' ) ) {
		wp_enqueue_style( 'mp-profit-motopress', get_template_directory_uri() . '/css/profit-motopress.min.css', array(
			'bootstrap',
			'font-awesome',
			'mp-profit-main'
		), mp_profit_get_theme_version(), 'all' );
	}

	if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
		wp_enqueue_style( 'mp-profit-woocommerce', get_template_directory_uri() . '/css/profit-woocommerce.min.css', array(
			'bootstrap',
			'font-awesome',
			'mp-profit-main'
		), mp_profit_get_theme_version(), 'all' );
	}

	if ( is_plugin_active( 'bbpress/bbpress.php' ) ) {
		wp_enqueue_style( 'mp-profit-bbpress', get_template_directory_uri() . '/css/profit-bbpress.min.css', array(
			'bootstrap',
			'font-awesome',
			'mp-profit-main'
		), mp_profit_get_theme_version(), 'all' );
	}
	if ( is_plugin_active( 'buddypress/bp-loader.php' ) ) {
		wp_enqueue_style( 'mp-profit-buddypress', get_template_directory_uri() . '/css/profit-buddypress.min.css', array(
			'bootstrap',
			'font-awesome',
			'mp-profit-main'
		), mp_profit_get_theme_version(), 'all' );
	}

	if ( is_rtl() ) {
		wp_enqueue_style( 'mp-profit-rtl', get_template_directory_uri() . '/css/profit-rtl.min.css', array(
			'bootstrap',
			'font-awesome',
			'mp-profit-main'
		), mp_profit_get_theme_version(), 'all' );
	}

	/*
	 *  Loads our main stylesheet.
	 */
	wp_enqueue_style( 'mp-profit-style', get_stylesheet_uri(), array(), mp_profit_get_theme_version() );
}

add_action( 'wp_enqueue_scripts', 'mp_profit_scripts_styles' );


/**
 * Title Tag backwards compatibility for older versions
 *
 */
if ( ! function_exists( '_wp_render_title_tag' ) ) {

	function mp_profit_slug_render_title() {
		?>
		<?php wp_title( '|', true, 'right' ); ?>
		<?php
	}

	add_action( 'wp_head', 'mp_profit_slug_render_title' );
}

/**
 * Register widget areas.
 *
 * @since profit 1.0
 * @access public
 * @return void
 */
function mp_profit_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Main Widget Area', 'profit-lite' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Appears on posts and pages in the sidebar.', 'profit-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'profit-lite' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears in the footer section of the site.', 'profit-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'profit-lite' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears in the footer section of the site.', 'profit-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'profit-lite' ),
		'id'            => 'sidebar-4',
		'description'   => __( 'Appears in the footer section of the site.', 'profit-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 3', 'profit-lite' ),
		'id'            => 'sidebar-4',
		'description'   => __( 'Appears in the footer section of the site.', 'profit-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 4', 'profit-lite' ),
		'id'            => 'sidebar-5',
		'description'   => __( 'Appears in the footer section of the site.', 'profit-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( '404 Widget Area', 'profit-lite' ),
		'id'            => 'sidebar-404',
		'description'   => __( 'Appears on 404 page in the sidebar.', 'profit-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s col-xs-12 col-sm-4 col-md-4 col-lg-4">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Features Section', 'profit-lite' ),
		'id'            => 'sidebar-features',
		'description'   => __( 'Appears on front page.', 'profit-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s col-xs-12 col-sm-12 col-md-12 col-lg-12">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => __( 'Records Section', 'profit-lite' ),
		'id'            => 'sidebar-records',
		'description'   => __( 'Appears on front page.', 'profit-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s col-xs-12 col-sm-12 col-md-12 col-lg-12">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => __( 'Team Section', 'profit-lite' ),
		'id'            => 'sidebar-team',
		'description'   => __( 'Appears on front page.', 'profit-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s col-xs-12 col-sm-12 col-md-12 col-lg-12">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => __( 'Pricing Section', 'profit-lite' ),
		'id'            => 'sidebar-pricing',
		'description'   => __( 'Appears on front page.', 'profit-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s col-xs-12 col-sm-12 col-md-12 col-lg-12">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => __( 'Newsletter Section', 'profit-lite' ),
		'id'            => 'sidebar-newsletter',
		'description'   => __( 'Appears on front page.', 'profit-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => __( 'Testimonials Section', 'profit-lite' ),
		'id'            => 'sidebar-testimonials',
		'description'   => __( 'Appears on front page.', 'profit-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s col-xs-12 col-sm-12 col-md-12 col-lg-12">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => __( 'Location Section', 'profit-lite' ),
		'id'            => 'sidebar-location',
		'description'   => __( 'Appears on front page.', 'profit-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => __( 'Stock Ticker Section', 'profit-lite' ),
		'id'            => 'sidebar-stock-ticker',
		'description'   => __( 'Appears on front page.', 'profit-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="section-title">',
		'after_title'   => '</h2>',
	) );
}

add_action( 'widgets_init', 'mp_profit_widgets_init' );

/*
 * Post comments
 */

function mp_profit_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	extract( $args, EXTR_SKIP );

	if ( 'div' == $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}
	?>
	<<?php echo $tag ?><?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		<div class="comment-description">
	<?php endif; ?>
	<div class="comment-author vcard">
		<?php if ( $args['avatar_size'] != 0 ) {
			echo get_avatar( $comment, $args['avatar_size'] );
		} ?>
	</div>
	<div class="comment-content">
	<?php printf( '<h4 class="fn">%s</h4>', get_comment_author_link() ); ?>
	<?php if ( $comment->comment_approved == '0' ) : ?>
		<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'profit-lite' ); ?></em>
		<br/>
	<?php endif; ?>
	<div class="comment-meta commentmetadata date-post h6">
		<?php
		printf( __( '%1$s <span>at %2$s</span>', 'profit-lite' ), get_comment_date( 'F j, Y' ), get_comment_time() );
		?>
		<?php edit_comment_link( __( '(Edit)', 'profit-lite' ), '  ', '' ); ?>
	</div>
	<?php comment_text(); ?>

	<div class="reply">
		<?php comment_reply_link( array_merge( $args, array(
			'add_below' => $add_below,
			'depth'     => $depth,
			'max_depth' => $args['max_depth']
		) ) ); ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
		</div>
		</div>
		</div>
	<?php endif; ?>

	<?php
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ...
 * and a Continue reading link.
 *
 * @since Profit
 *
 * @param string $more Default Read More excerpt link.
 *
 * @return string Filtered Read More excerpt link.
 */
function mp_profit_excerpt_more( $more ) {
	return '[...]';
}

add_filter( 'excerpt_more', 'mp_profit_excerpt_more' );

/*
 * The experts length 
 */

function mp_profit_excerpt_length( $length ) {
	return 15;
}

add_filter( 'excerpt_length', 'mp_profit_excerpt_length', 999 );

/*
 * Profit breadcrumbs
 */
require get_template_directory() . '/inc/theme/breadcrumbs.php';

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
/*
 * Declare WooCommerce support
 */
add_action( 'after_setup_theme', 'mp_profit_woocommerce_support' );

function mp_profit_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}

/*
 * Init woocommerce
 */

if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
	require get_template_directory() . '/inc/woocommerce/woo-init.php';
}

/*
 * Init motopress
 */
if ( is_plugin_active( 'motopress-content-editor/motopress-content-editor.php' ) || is_plugin_active( 'motopress-content-editor-lite/motopress-content-editor.php' ) ) {
	require get_template_directory() . '/inc/motopress/motopress-init.php';
}

/*
 * Init  mp-restaurant-menu
 */

if ( is_plugin_active( 'mp-restaurant-menu/restaurant-menu.php' ) ) {
	require get_template_directory() . '/inc/mp-restaurant-menu/mp-restaurant-menu-init.php';
}
/*
 * Init  mp-timetable
 */

if ( is_plugin_active( 'mp-timetable/mp-timetable.php' ) ) {
	require get_template_directory() . '/inc/mp-timetable/mp-timetable-init.php';
}

function mp_profit_get_first_embed_media( $post_id ) {
	$post    = get_post( $post_id );
	$content = do_shortcode( apply_filters( 'the_content', $post->post_content ) );
	$embeds  = get_media_embedded_in_content( $content );
	if ( ! empty( $embeds ) ) {
		//return first embed
		return '<div class="entry-video">' . $embeds[0] . '</div>';
	} else {
		//No embeds found
		return false;
	}
}

/*
 * Cart count product in header
 */

function mp_profit_get_cart() {
	if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
		if ( WC()->cart->cart_contents_count > 0 ) {
			?>
			<a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>"
			   title="<?php _e( 'Cart', 'profit-lite' ); ?>"><i class="fa fa-shopping-cart"></i> <span
					class="qty-cart count "><?php echo WC()->cart->cart_contents_count; ?></span></a>
			<?php
		} else {
			?>
			<a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>"
			   title="<?php _e( 'Cart', 'profit-lite' ); ?>"><i class="fa fa-shopping-cart"></i></a>

			<?php
		}
	}
}

add_filter( 'woocommerce_add_to_cart_fragments', 'mp_profit_woocommerce_header_add_to_cart_fragment' );

function mp_profit_woocommerce_header_add_to_cart_fragment( $fragments ) {
	ob_start();
	if ( WC()->cart->cart_contents_count > 0 ) {
		?>
		<a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>"
		   title="<?php _e( 'Cart', 'profit-lite' ); ?>"><i class="fa fa-shopping-cart"></i> <span
				class="qty-cart count "><?php echo WC()->cart->cart_contents_count; ?></span></a>
		<?php
	} else {
		?>
		<a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>"
		   title="<?php _e( 'Cart', 'profit-lite' ); ?>"><i class="fa fa-shopping-cart"></i></a>

		<?php
	}
	?>
	<?php
	$fragments['a.cart-contents'] = ob_get_clean();

	return $fragments;
}

/*
 * hook sections of front page
 */
require get_template_directory() . '/inc/theme/sections-functions.php';
require get_template_directory() . '/inc/theme/sections-hooks.php';

function mp_profit_get_content_theme( $contentLength, $addP ) {

	$content = apply_filters( 'the_content', get_the_content() );
	$content = preg_replace( '/<(script|style)(.*?)>(.*?)<\/(script|style)>/is', '', $content );
	if ( $addP ) {
		$content = strip_tags( $content, '<p>' );
		$content = wp_kses( $content, array( 'p' => array() ) );
	} else {
		$content = strip_tags( $content );
		$content = wp_kses( $content, array() );
	}
	if ( strlen( $content ) > $contentLength ) {
		$content = extension_loaded( 'mbstring' ) ? mb_substr( $content, 0, $contentLength ) . apply_filters('excerpt_more', '...') : substr( $content, 0, $contentLength ) . apply_filters('excerpt_more', '...');
	}

	$content = apply_filters('mp_profit_get_content_theme', $content);
	echo $content;
}

if ( current_user_can( 'install_plugins' ) ) {
	require get_template_directory() . '/inc/theme/tgm-init.php';
}

function mp_profit_get_post_image() {
	global $post, $posts;
	$first_img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches );
	if ( $output === 0 ) {
		return $first_img;
	}
	$first_img = $matches[1][0];
	if ( empty( $first_img ) ) {
		$first_img = "";
	}

	return $first_img;
}

/*
 * Post meta
 */

function mp_profit_post_meta( $post ) {
	?>
	<?php if ( get_theme_mod( 'mp_profit_show_meta', '1' ) === '1' || get_theme_mod( 'mp_profit_show_meta' ) || get_theme_mod( 'mp_profit_show_tags', '1' ) === '1' || get_theme_mod( 'mp_profit_show_tags' ) || get_theme_mod( 'mp_profit_show_categories', '1' ) === '1' || get_theme_mod( 'mp_profit_show_categories' ) ): ?>
		<footer class="entry-footer">
			<?php if ( get_theme_mod( 'mp_profit_show_meta', '1' ) === '1' || get_theme_mod( 'mp_profit_show_meta' ) ): ?>
				<div class="meta">
					<span class="author"><?php _e( 'Posted by', 'profit-lite' ); ?> </span><?php the_author_posts_link(); ?>
					<span class="delimiter">/</span>
					<span class="date-post "><?php the_time( 'F j, Y' ); ?></span>
					<?php if ( comments_open() ) : ?>
						<span class="delimiter">/</span>
						<a class="blog-icon underline"
						   href="<?php if ( ! is_single() ): the_permalink(); endif; ?>#comments"><span><?php comments_number( '0', '1', '%' ); ?><?php _e( 'Comments', 'profit-lite' ); ?></span></a>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'mp_profit_show_tags', '1' ) === '1' || get_theme_mod( 'mp_profit_show_tags' ) ): ?>
						<?php the_tags( '<span class="delimiter">/</span> <span>' . __( 'Tagged with', 'profit-lite' ) . '</span> ', '<span>,</span> ', '' ); ?>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'mp_profit_show_categories', '1' ) === '1' || get_theme_mod( 'mp_profit_show_categories' ) ): ?>
						<?php $categories = get_the_category_list( '<span>,</span> ', 'multiple', $post->ID ); ?>
						<?php if ( ! empty( $categories ) ) : ?>
							<span class="delimiter">/</span>
							<span><?php _e( 'Posted in', 'profit-lite' ); ?></span>
							<?php echo $categories; ?>
						<?php endif; ?>
					<?php endif; ?>
					<?php edit_post_link( __( 'Edit', 'profit-lite' ), '<span class="delimiter">/</span> ', '' ); ?>
				</div>
			<?php endif; ?>
		</footer>
		<?php
	endif;
}

/*
 * Post thumbnail
 */

function mp_profit_post_thumbnail( $post, $mpProfitPageTemplate ) {
	?>
	<?php if ( has_post_thumbnail() && ! post_password_required() && ! is_attachment() ) : ?>
		<div class="entry-thumbnail">
			<?php if ( $mpProfitPageTemplate == 'full-width' ): ?>
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'mp-profit-thumb-large' ); ?></a>
			<?php else: ?>
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
			<?php endif; ?>
		</div>
		<?php
	endif;
}

/*
 * Activate theme
 */
require get_template_directory() . '/classes/theme/class-theme-install.php';

/*
 * Theme Wizard admin notice
 */

function mp_profit_wizard_admin_notice() {
	$currentScreen = get_current_screen();
	if ( $currentScreen->id != "themes" ) {
		return;
	}
	mp_profit_wizard_dismiss();
	$isThemeActivation = apply_filters( 'mp_profit_activation', true );
	if ( $isThemeActivation && ! get_user_meta( get_current_user_id(), 'mp_profit_wizard_dismiss', true ) ) {
		?>
		<div class="notice notice-success is-dismissible">
			<p>
				<strong><?php _e( 'You&#8217;ve installed Profit theme. Click &#34;Run Theme Wizard&#34; to view a quick guided tour of theme functionality and complete the installation.', 'profit-lite' ); ?></strong></p>
			<p><a class="button button-primary"
			      href="<?php echo esc_url( admin_url( 'themes.php?page=theme-setup&mp-profit-wizard-dismiss=dismiss_admin_notices' ) ); ?>"><strong><?php _e( 'Run Theme Wizard', 'profit-lite' ); ?></strong></a> <a class="button"
			                                                                  href="<?php echo esc_url( admin_url( 'themes.php?mp-profit-wizard-dismiss=dismiss_admin_notices' ) ); ?>"
			                                                                  class="dismiss-notice"
			                                                                  target="_parent"><strong><?php _e( 'Skip', 'profit-lite' ); ?></strong></a></p>
		</div>
		<?php
	}
}

if ( current_user_can( 'edit_theme_options' ) ) {
	add_action( 'admin_notices', 'mp_profit_wizard_admin_notice' );
}
/*
 * Dismiss Theme Wizard admin notice 
 */

function mp_profit_wizard_dismiss() {
	if ( isset( $_GET['mp-profit-wizard-dismiss'] ) ) {
		update_user_meta( get_current_user_id(), 'mp_profit_wizard_dismiss', 1 );
	}
}



/**
 * Get theme vertion.
 *
 * @since Profit 1.3.8
 * @access public
 * @return string
 */
function mp_profit_get_theme_version() {
	$theme_info = wp_get_theme( get_template() );

	return $theme_info->get( 'Version' );
}