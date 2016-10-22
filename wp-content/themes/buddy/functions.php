<?php

/////////////////////////////////////// Theme Information ///////////////////////////////////////

$themename = get_option( 'current_theme' ); // Theme Name
$dirname = 'buddy'; // Directory Name


/////////////////////////////////////// File directories ///////////////////////////////////////

$ghostpool_template_dir = get_template_directory();
$ghostpool_template_dir_uri = get_template_directory_uri();
define( 'ghostpool', $ghostpool_template_dir . '/' );
define( 'ghostpool_uri', $ghostpool_template_dir_uri . '/' );
define( 'ghostpool_css_uri', $ghostpool_template_dir_uri . '/lib/css/' );
define( 'ghostpool_images', $ghostpool_template_dir_uri . '/lib/images/' );
define( 'ghostpool_inc', $ghostpool_template_dir . '/lib/inc/' );
define( 'ghostpool_plugins', $ghostpool_template_dir . '/lib/plugins/' );
define( 'ghostpool_scripts', $ghostpool_template_dir . '/lib/scripts/' );
define( 'ghostpool_scripts_uri', $ghostpool_template_dir_uri . '/lib/scripts/' );
define( 'ghostpool_widgets', $ghostpool_template_dir . '/lib/widgets/' );
define( 'ghostpool_shortcodes', $ghostpool_template_dir . '/lib/shortcodes/' );
define( 'ghostpool_bp', $ghostpool_template_dir . '/buddypress/' );


/////////////////////////////////////// Localisation ///////////////////////////////////////

load_theme_textdomain( 'buddy', trailingslashit( WP_LANG_DIR ) . 'themes/' );
load_theme_textdomain( 'buddy', get_stylesheet_directory() . '/languages' );
load_theme_textdomain( 'buddy', ghostpool . 'languages' );


/////////////////////////////////////// Theme Setup ///////////////////////////////////////

if ( ! function_exists( 'ghostpool_theme_setup' ) ) {
	function ghostpool_theme_setup() {

		global $content_width;

		// Set the content width based on the theme's design and stylesheet
		if ( !isset( $content_width ) ) {
			$content_width = 670;
		}
		
		// Featured images
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 150, 150, true );

		// Background customizer
		add_theme_support( 'custom-background' );

		// Add shortcode support to Text widget
		add_filter( 'widget_text', 'do_shortcode' );

		// This theme styles the visual editor with editor-style.css to match the theme style
		add_editor_style( 'lib/css/editor-style.css' );

		// Add default posts and comments RSS feed links to <head>
		add_theme_support( 'automatic-feed-links' );

		// WooCommerce Support
		add_theme_support( 'woocommerce' );
		
		// Title support
		add_theme_support( 'title-tag' );
		
	}
}
add_action( 'after_setup_theme', 'ghostpool_theme_setup' );


/////////////////////////////////////// Additional Functions ///////////////////////////////////////

// Image Resizer
require_once( ghostpool_inc . 'aq_resizer.php' );

// Main Theme Options
require_once( ghostpool_inc . 'theme-options.php' );
require( ghostpool_inc . 'options.php' );

// Meta Options
require_once( ghostpool_inc . 'theme-meta-options.php' );

// Other Options
if ( is_admin() ) {
	require_once( ghostpool_inc . 'theme-other-options.php' );
}

// One click demo installer
require ghostpool . 'lib/demo-installer/init.php';

// BuddyPress functions
require_once( ghostpool_inc . 'bp-functions.php' );

// bbPress functions
require_once( ghostpool_inc . 'bbpress-functions.php' );

// Page settings
require_once( ghostpool_inc . 'page-settings.php' );

// Shortcodes
require_once( ghostpool_inc . 'theme-shortcodes.php' );

// TinyMCE
if ( is_admin() ) { 
	require_once ( ghostpool_inc . 'tinymce/tinymce.php' );
}

// WP Show IDs
if ( is_admin() ) { 
	require_once( ghostpool_inc . 'wp-show-ids/wp-show-ids.php' );
}


/////////////////////////////////////// Enqueue Styles ///////////////////////////////////////

if ( ! function_exists( 'ghostpool_enqueue_styles' ) ) {

	function ghostpool_enqueue_styles() { 

		require( ghostpool_inc . 'options.php' ); global $dirname;
		
		wp_enqueue_style( 'gp-style', get_stylesheet_uri() );
		
		wp_enqueue_style( 'gp-font-awesome', ghostpool_uri . 'lib/fonts/font-awesome/css/font-awesome.min.css' );

		if ( get_option( $dirname . '_lightbox' ) != 'gp-lightbox-disabled' ) {		
			wp_enqueue_style( 'gp-prettyphoto', ghostpool_scripts_uri . 'prettyPhoto/css/prettyPhoto.css' );
		}
	
		if ( get_option( $dirname . '_custom_stylesheet' ) ) {
			wp_enqueue_style( 'gp-style-theme-custom', ghostpool_uri() . '/'. get_option( $dirname . '_custom_stylesheet' ) );
		}	
	
		if ( ( is_single() OR is_page() ) && get_post_meta( get_the_ID(), '_' . $dirname . '_custom_stylesheet', true ) ) {
			wp_enqueue_style( 'gp-style-page-custom', ghostpool_uri() . '/' . get_post_meta( get_the_ID(), '_' . $dirname . '_custom_stylesheet', true ) );
		}	

	}
	
}

add_action( 'wp_enqueue_scripts', 'ghostpool_enqueue_styles' );


/////////////////////////////////////// Enqueue Scripts ///////////////////////////////////////

if ( ! function_exists( 'ghostpool_enqueue_scripts' ) ) {

	function ghostpool_enqueue_scripts() { 

		require( ghostpool_inc . 'options.php' ); global $bp, $dirname;

		wp_enqueue_script( 'gp-modernizr', ghostpool_scripts_uri . 'modernizr.js', false, '', true );
				
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
			wp_enqueue_script( 'comment-reply' );
		}
		
		if ( get_option( $dirname . '_jwplayer' ) == '0' ) {
			wp_enqueue_script( 'gp-jwplayer', ghostpool_scripts_uri . 'mediaplayer/jwplayer.js', '', '', false );		
			wp_enqueue_script( 'gp-swfobject', 'https://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js', '', '', true );			
		}

		if ( get_option( $dirname . '_back_to_top' ) == 'gp-back-to-top' ) {
			wp_enqueue_script( 'gp-back-to-top', ghostpool_scripts_uri . 'jquery.ui.totop.min.js', array( 'jquery' ), '', true );
		}
			
		if ( get_option( $dirname . '_lightbox' ) != 'gp-lightbox-disabled' ) {							
			wp_enqueue_script( 'gp-prettyphoto', ghostpool_scripts_uri . 'prettyPhoto/js/jquery.prettyPhoto.js', array( 'jquery' ), '', true );
		}
		
		wp_register_script( 'gp-touchswipe', ghostpool_scripts_uri . 'jquery.touchSwipe.min.js', array( 'jquery' ), '', true );
																					
		wp_register_script( 'gp-flexslider', ghostpool_scripts_uri . 'jquery.flexslider.js', array( 'jquery' ), '', true );

		wp_register_script( 'gp-accordion-init', ghostpool_scripts_uri . 'jquery.accordion.init.js', array( 'jquery-ui-accordion' ), '', true );

		wp_register_script( 'gp-contact-init', ghostpool_scripts_uri . 'jquery.contact.init.js', array( 'jquery' ), '', true );
						
		wp_register_script( 'gp-tabs-init', ghostpool_scripts_uri . 'jquery.tabs.init.js', array( 'jquery-ui-tabs' ), '', true );

		wp_register_script( 'gp-toggle-init', ghostpool_scripts_uri . 'jquery.toggle.init.js', array( 'jquery' ), '', true );

		wp_enqueue_script( 'gp-custom-js', ghostpool_scripts_uri . 'custom.js', array( 'jquery' ), '', true );

		wp_localize_script( 'gp-custom-js', 'ghostpool_script', array( 
			'rootFolder' => ghostpool_uri,
			'emptySearchText' => esc_html__( 'Please enter something in the search box!', 'buddy' ),
		 ) );	
														
	}
	
}

add_action( 'wp_enqueue_scripts', 'ghostpool_enqueue_scripts' );


/////////////////////////////////////// WP Header Hooks ///////////////////////////////////////

if ( ! function_exists( 'ghostpool_wp_header' ) ) {

	function ghostpool_wp_header() {

		require( ghostpool_inc . 'options.php' ); global $dirname;

		// Title fallback for versions earlier than WordPress 4.1
		if ( ! function_exists( '_wp_render_title_tag' ) && ! function_exists( 'ghostpool_render_title' ) ) {
			function ghostpool_render_title() { ?>
				<title><?php wp_title( '|', true, 'right' ); ?></title>
			<?php }
		}

		// Page settings
		ghostpool_page_settings();

		// Style settings
		require_once( ghostpool_inc . 'style-settings.php' );	

		if ( get_option ( $dirname . '_scripts' ) ) {
			echo stripslashes( get_option( $dirname . '_scripts' ) );
		}

	}
	
}

add_action( 'wp_head', 'ghostpool_wp_header' );


/////////////////////////////////////// Navigation Menus ///////////////////////////////////////

if ( ! function_exists( 'ghostpool_register_menus' ) ) {
	function ghostpool_register_menus() {
		register_nav_menus( array( 
			'main-nav' => esc_html__( 'Main Navigation', 'buddy' ),
		 ) );
	}
}
add_action( 'init', 'ghostpool_register_menus' );


/////////////////////////////////////// Navigation User Meta ///////////////////////////////////////

if ( ! function_exists( 'ghostpool_nav_user_meta' ) ) {
	function ghostpool_nav_user_meta( $user_id = NULL ) {

		// These are the metakeys we will need to update
		$meta_key['properties'] = 'managenav-menuscolumnshidden';

		// So this can be used without hooking into user_register
		if ( ! $user_id ) {
			$user_id = get_current_user_id(); 
		}
		
		// Set the default properties if it has not been set yet
		if ( ! get_user_meta( $user_id, $meta_key['properties'], true ) ) {
			$meta_value = array( 'link-target', 'xfn', 'description' );
			update_user_meta( $user_id, $meta_key['properties'], $meta_value );
		}
	
	}	
}
add_action( 'admin_init', 'ghostpool_nav_user_meta' );


/////////////////////////////////////// Insert schema meta data ///////////////////////////////////////

if ( ! function_exists( 'ghostpool_meta_data' ) ) {
	function ghostpool_meta_data( $gp_post_id ) {
	
		require( ghostpool_inc . 'options.php' ); global $dirname, $gp_settings, $post;

		// Meta data
		return '<meta itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" content="' . esc_url( get_permalink( $gp_post_id ) ) . '">
		<meta itemprop="headline" content="' . esc_attr( get_the_title( $gp_post_id ) ) . '">			
		<div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
			<meta itemprop="url" content="' . esc_url( wp_get_attachment_url( get_post_thumbnail_id( $gp_post_id ) ) ) . '">
			<meta itemprop="width" content="' .  absint( $gp_settings['image_width'] ) . '">	
			<meta itemprop="height" content="' . absint( $gp_settings['image_height'] ) . '">		
		</div>
		<meta itemprop="author" content="' . get_the_author_meta( 'display_name', $post->post_author ) . '">			
		<meta itemprop="datePublished" content="' . get_the_time( get_option( 'date_format' ) ) . '">
		<meta itemprop="dateModified" content="' . get_the_modified_date( get_option( 'date_format' ) ) . '">
		<div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
			<div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
				<meta itemprop="url" content="' . esc_url( get_option( $dirname . '_logo' ) ? get_option( $dirname . '_logo' ) :  ghostpool_images . 'logo.png' ) . '">
				<meta itemprop="width" content="' . absint( get_option( $dirname . '_logo_width' ) ? get_option( $dirname . '_logo_width' ) :  108 ) . '">
				<meta itemprop="height" content="' . absint( get_option( $dirname . '_logo_height' ) ? get_option( $dirname . '_logo_height' ) :  25 ) . '">
			</div>
			<meta itemprop="name" content="' . get_bloginfo( 'name' ) . '">
		</div>';

	}
}


/////////////////////////////////////// Sidebars/Widgets ///////////////////////////////////////

// Custom Content Widget
require_once( ghostpool_widgets . 'custom-content.php' );

// Statistics Widget
require_once( ghostpool_widgets . 'statistics.php' );

if ( ! function_exists( 'ghostpool_widgets_init' ) ) {
	function ghostpool_widgets_init() {
		
		register_sidebar( array( 
			'name' 			=> esc_html__( 'Standard Left Sidebar', 'buddy' ),
			'id'			=> 'gp-default-left',
			'description' 	=> esc_html__( 'Displayed on posts, pages and post categories.', 'buddy' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' 	=> '</div>',
			'before_title'	=> '<h3 class="widgettitle">',
			'after_title' 	=> '</h3>',
		 ) );
 
		register_sidebar( array( 
			'name' => esc_html__( 'Standard Right Sidebar', 'buddy' ),
			'id'=> 'gp-default-right',
			'description' 	=> esc_html__( 'Displayed on posts, pages and post categories.', 'buddy' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' 	=> '</div>',
			'before_title'	=> '<h3 class="widgettitle">',
			'after_title' 	=> '</h3>',
		 ) );
	
		register_sidebar( array( 
			'name' 			=> esc_html__( 'Footer 1', 'buddy' ),
			'id' 			=> 'gp-footer-1',
			'description'   => esc_html__( 'Displayed as the first column in the footer.', 'buddy' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',
		 ) );        

		register_sidebar( array( 
			'name' 			=> esc_html__( 'Footer 2', 'buddy' ), 
			'id' 			=> 'gp-footer-2',
			'description'   => esc_html__( 'Displayed as the second column in the footer.', 'buddy' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',
		 ) );   
	
		register_sidebar( array( 
			'name' 			=> esc_html__( 'Footer 3', 'buddy' ),
			'id' 			=> 'gp-footer-3',
			'description'   => esc_html__( 'Displayed as the third column in the footer.', 'buddy' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' 	=> '</div>',
			'before_title'	=> '<h3 class="widgettitle">',
			'after_title' 	=> '</h3>' ) );   
	
		register_sidebar( array( 
			'name' 			=> esc_html__( 'Footer 4', 'buddy' ),
			'id' 			=> 'gp-footer-4',
			'description'   => esc_html__( 'Displayed as the fourth column in the footer.', 'buddy' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'  	=> '</h3>'
		 ) );   
	
		register_sidebar( array( 
			'name' 			=> esc_html__( 'Footer 5', 'buddy' ),
			'id' 			=> 'gp-footer-5',
			'description'   => esc_html__( 'Displayed as the fifth column in the footer.', 'buddy' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<h3 class="widgettitle">',
			'after_title' 	=> '</h3>'
		 ) );   

	}
}
add_action( 'after_setup_theme', 'ghostpool_widgets_init' );


/////////////////////////////////////// Excerpts ///////////////////////////////////////

// Character Length
if ( ! function_exists( 'ghostpool_excerpt_length' ) ) {
	function ghostpool_excerpt_length() {
		if ( function_exists( 'buddyboss_global_search_init' ) && is_search() ) {
			return 50;
		} else {
			return 10000;
		}
	}
}
add_filter( 'excerpt_length', 'ghostpool_excerpt_length' );

// Excerpt Output
if ( ! function_exists( 'ghostpool_excerpt' ) ) {
	function ghostpool_excerpt( $gp_length ) {
		$gp_more_text = '...';	
		$ghostpool_excerpt = get_the_excerpt();					
		$ghostpool_excerpt = strip_tags( $ghostpool_excerpt );
		if ( function_exists( 'mb_strlen' ) && function_exists( 'mb_substr' ) ) { 
			if ( mb_strlen( $ghostpool_excerpt ) > $gp_length ) {
				$ghostpool_excerpt = mb_substr( $ghostpool_excerpt, 0, $gp_length ) . $gp_more_text;
			}
		} else {
			if ( strlen( $ghostpool_excerpt ) > $gp_length ) {
				$ghostpool_excerpt = substr( $ghostpool_excerpt, 0, $gp_length ) . $gp_more_text;
			}	
		}
		return $ghostpool_excerpt;
	}
}


/////////////////////////////////////// Add Excerpt Support To Pages ///////////////////////////////////////

if ( ! function_exists( 'ghostpool_add_excerpts_to_pages' ) ) {
	function ghostpool_add_excerpts_to_pages() {
		 add_post_type_support( 'page', 'excerpt' );
	}
}
add_action( 'init', 'ghostpool_add_excerpts_to_pages' );


/////////////////////////////////////// Change Password Protect Post Text ///////////////////////////////////////	

if ( ! function_exists( 'ghostpool_password_form' ) ) {
	function ghostpool_password_form() {
		global $post;
		$gp_label = 'pwbox-' . ( empty( $post->ID ) ? rand() : $post->ID );
		$gp_o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
		<p>' . esc_html__( 'To view this protected post, enter the password below:', 'buddy' ) . '</p>
		<label for="' . $gp_label . '"><input name="post_password" id="' . $gp_label . '" type="password" size="20" maxlength="20" /></label> <input type="submit" class="pwsubmit" name="Submit" value="' .  esc_attr__( 'Submit', 'buddy' ) . '" />
		</form>
		';
		return $gp_o;
	}
}
add_filter( 'the_password_form', 'ghostpool_password_form' );


/////////////////////////////////////// Title Length ///////////////////////////////////////

if ( ! function_exists( 'ghostpool_title_limit' ) ) {
	function ghostpool_title_limit( $gp_count ) {
		$gp_title = the_title_attribute( 'echo=0' );
		if ( function_exists( 'mb_strlen' ) && function_exists( 'mb_substr' ) ) { 
			if ( mb_strlen( $gp_title ) > $gp_count ) {
				$gp_title = mb_substr( $gp_title, 0, $gp_count ) . '...';
			}
		} else {
			if ( strlen( $gp_title ) > $gp_count ) {
				$gp_title = substr( $gp_title, 0, $gp_count ) . '...';
			}	
		}
		return $gp_title;
	}
}


/////////////////////////////////////// Page Navigation ///////////////////////////////////////

if ( ! function_exists( 'ghostpool_pagination' ) ) {
	function ghostpool_pagination( $gp_query ) {
		$gp_big = 999999999;
		if ( get_query_var( 'paged' ) ) {
			$gp_paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$gp_paged = get_query_var( 'page' );
		} else {
			$gp_paged = 1;
		}
		if ( $gp_query >  1 ) {
			return '<div class="gp-pagination gp-pagination-numbers gp-standard-pagination">' . paginate_links( array( 
				'base'      => str_replace( $gp_big, '%#%', esc_url( get_pagenum_link( $gp_big ) ) ),
				'format'    => '?paged=%#%',
				'current'   => max( 1, $gp_paged ),
				'total'     => $gp_query,
				'type'      => 'list',
				'prev_text' => '',
				'next_text' => '',
			 ) ) . '</div>';
		}
	}
}


/////////////////////////////////////// Remove hentry tag ///////////////////////////////////////	

if ( ! function_exists( 'ghostpool_remove_hentry' ) ) {
	function ghostpool_remove_hentry( $gp_classes ) {
		$gp_classes = array_diff( $gp_classes, array( 'hentry' ) );
		return $gp_classes;
	}
}
add_filter( 'post_class', 'ghostpool_remove_hentry' );


/////////////////////////////////////// Shortcode Empty Paragraph Fix ///////////////////////////////////////

if ( ! function_exists( 'ghostpool_shortcode_empty_paragraph_fix' ) ) {
	function ghostpool_shortcode_empty_paragraph_fix( $content ) {   
		$array = array ( 
			'<p>[' => '[', 
			']</p>' => ']',
			']<br />' => ']'
		 );
		$content = strtr( $content, $array );
		return $content;
	}
}
add_filter( 'the_content', 'ghostpool_shortcode_empty_paragraph_fix' );


/////////////////////////////////////// Change Insert Into Post Text ///////////////////////////////////////	

if ( is_admin() && $pagenow == 'themes.php' ) {
	if ( ! function_exists( 'ghostpool_change_image_button' ) ) {
		add_filter( 'gettext', 'ghostpool_change_image_button', 10, 3 );
		function ghostpool_change_image_button( $gp_translation, $gp_text, $gp_domain ) {
			if ( 'default' == $gp_domain && 'Insert into post' == $gp_text ) {
				remove_filter( 'gettext', 'ghostpool_change_image_button' );
				return esc_html__( 'Use Image', 'buddy' );
			}
			return $gp_translation;
		}
	}
}


/////////////////////////////////////// Tab Title Fix For WordPress 4.0.1+  ///////////////////////////////////////	

if ( ! function_exists( 'ghostpool_shortcode_parse_atts' ) ) {
	function ghostpool_shortcode_parse_atts( $gp_text ) {
		$gp_text = str_replace( array( '&#8221;', '&#8243;', '&#8217;', '&#8242;' ), array( '"', '"', '\'', '\'' ), $gp_text );
		return shortcode_parse_atts( $gp_text ) ;
	}
}


/////////////////////////////////////// Add lightbox class to image links ///////////////////////////////////////	

if ( ! function_exists( 'ghostpool_lightbox_image_link' ) ) {
	function ghostpool_lightbox_image_link( $gp_content ) {	
		global $dirname, $post;
		if ( get_option( $dirname . '_lightbox' ) != 'gp-lightbox-disabled' ) {
			if ( get_option( $dirname . '_lightbox' ) == 'gp-lightbox-group' ) {
				$gp_group = '[image-' . $post->ID . ']';
			} else {
				$gp_group = '';
			}
			$gp_pattern = "/<a(.*?)href=('|\")(.*?).(jpg|jpeg|png|gif|bmp|ico)('|\")(.*?)>/i";
			preg_match_all( $gp_pattern, $gp_content, $gp_matches, PREG_SET_ORDER );
			foreach ( $gp_matches as $gp_val ) {
				$gp_pattern = '<a' . $gp_val[1] . 'href=' . $gp_val[2] . $gp_val[3] . '.' . $gp_val[4] . $gp_val[5] . $gp_val[6] . '>';
				$gp_replacement = '<a' . $gp_val[1] . 'href=' . $gp_val[2] . $gp_val[3] . '.' . $gp_val[4] . $gp_val[5] . ' data-rel="prettyPhoto' . $gp_group . '"' . $gp_val[6] . '><span class="lightbox-hover"></span>';
				$gp_content = str_replace( $gp_pattern, $gp_replacement, $gp_content );			
			}
			return $gp_content;
		} else {
			return $gp_content;
		}
	}	
}
add_filter( 'the_content', 'ghostpool_lightbox_image_link' );	
add_filter( 'wp_get_attachment_link', 'ghostpool_lightbox_image_link' );
add_filter( 'bbp_get_reply_content', 'ghostpool_lightbox_image_link' );


/////////////////////////////////////// TMG Plugin Activation ///////////////////////////////////////	

if ( version_compare( phpversion(), '5.2.4', '>=' ) ) {
	require_once( ghostpool_inc . 'class-tgm-plugin-activation.php' );
} else {
	require_once( ghostpool_inc . 'class-tgm-plugin-activation-2.4.2.php' );
}

if ( ! function_exists( 'ghostpool_register_required_plugins' ) ) {

	function ghostpool_register_required_plugins() {

		$gp_plugins = array( 

			array( 
				'name' => 'Buddy Plugin',
				'slug' => 'buddy-plugin',
				'source' => ghostpool_plugins . 'buddy-plugin.zip',
				'required' => true,
				'force_activation' => true,
				'force_deactivation' => false,
				'version' => '1.4'
			 ),

			array( 
				'name' => 'BuddyPress',
				'slug' => 'buddypress',
				'required' 	=> false,
			 ),

			array( 
				'name' => 'bbPress',
				'slug' => 'bbpress',
				'required' 	=> false,
			 ),
		
			array( 
				'name'      => 'Contact Form 7',
				'slug'      => 'contact-form-7',
				'required' 	=> false,
			 ),

			array( 
				'name'      => 'Yoast SEO',
				'slug'      => 'wordpress-seo',
				'required' 	=> false,
			 ),
												
		 );

		$gp_config = array( 
			'default_path' => '',                      // Default absolute path to pre-packaged plugins.
			'menu'         => 'tgmpa-install-plugins', // Menu slug.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => true,                   // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.
		 );
 
		tgmpa( $gp_plugins, $gp_config );

	}
	
}

add_action( 'tgmpa_register', 'ghostpool_register_required_plugins' );

?>