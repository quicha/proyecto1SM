<?php

if ( function_exists( 'bp_is_active' ) ) {

	// Load custom BuddyPress stylesheet
	if ( ! function_exists( 'ghostpool_bp_enqueue_styles' ) ) {	
		function ghostpool_bp_enqueue_styles() {
			//wp_deregister_style( 'bp-legacy-css' );
			wp_enqueue_style( 'gp-bp', ghostpool_css_uri . 'bp.css' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'ghostpool_bp_enqueue_styles' );

	// Body Classes	
	if ( ! function_exists( 'ghostpool_bp_class' ) ) {	
		function ghostpool_bp_class( $gp_classes ) {
			if ( ! bp_is_blog_page() OR ( function_exists( 'is_bbpress' ) && is_bbpress() ) OR is_page_template( 'activity/index.php' ) ) {
				if ( is_rtl() ) {
					$gp_classes[] = 'rtl bp-wrapper';
				} else {
					$gp_classes[] = 'bp-wrapper';
				}
			}
			return $gp_classes;
		}
	}
	add_filter( 'body_class', 'ghostpool_bp_class' );
	
	// Default avatar dimensions	
	define( 'BP_AVATAR_THUMB_WIDTH', 58 );
	define( 'BP_AVATAR_THUMB_HEIGHT', 58 );
	if ( bp_is_groups_component() ) {
		define( 'BP_AVATAR_FULL_WIDTH', 210 );
		define( 'BP_AVATAR_FULL_HEIGHT', 210 );
	} else {
		define( 'BP_AVATAR_FULL_WIDTH', 150 );
		define( 'BP_AVATAR_FULL_HEIGHT', 150 );	
	}

}

?>