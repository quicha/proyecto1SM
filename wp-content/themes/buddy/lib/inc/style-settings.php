<?php

/*--------------------------------------------------------------
Custom Classes
--------------------------------------------------------------*/

if ( ! function_exists( 'ghostpool_body_classes' ) ) {
	function ghostpool_body_classes( $gp_classes ) {
		global $dirname, $gp_settings;
		
		$gp_classes[] = 'gp-theme';
		$gp_classes[] = $gp_settings['layout'];
		$gp_classes[] = get_option( $dirname . '_fixed_header' );
		$gp_classes[] = get_option( $dirname . '_back_to_top' );
		$gp_classes[] = get_option( $dirname . '_lightbox' );
		$gp_classes[] = get_option( $dirname . '_profile_button' );
		if ( $gp_settings['title'] == 'Show' ) {
			$gp_classes[] = 'gp-has-title';
		} else {
			$gp_classes[] = 'gp-no-title';		
		}
		
		if ( get_option( $dirname . '_responsive' ) == '0' ) {
			$gp_classes[] = 'gp-responsive';
		}
				
		if ( get_option( $dirname . '_retina' ) == '0' ) {
			$gp_classes[] = 'gp-retina';
		}
		
		return $gp_classes;
	}
}
add_filter( 'body_class', 'ghostpool_body_classes' );


/*--------------------------------------------------------------
Inline Styling
--------------------------------------------------------------*/

// Convert hex codes to rgb
if ( !function_exists( 'hex2rgb' ) ) {
	function hex2rgb( $hex ) {
		$hex = str_replace( "#", '', $hex );	
		if ( strlen( $hex ) == 3 ) {
			$r = hexdec( substr( $hex,0,1 ).substr( $hex,0,1 ) );
			$g = hexdec( substr( $hex,1,1 ).substr( $hex,1,1 ) );
			$b = hexdec( substr( $hex,2,1 ).substr( $hex,2,1 ) );
			$rgb = array( $r, $g, $b );
			return implode( ",", $rgb );
		} elseif ( strlen( $hex ) > 3 ) {
			$r = hexdec( substr( $hex,0,2 ) );
			$g = hexdec( substr( $hex,2,2 ) );
			$b = hexdec( substr( $hex,4,2 ) );
			$rgb = array( $r, $g, $b );
			return implode( ",", $rgb );
		} else {}
	}
}


// Custom CSS
global $dirname;

$custom_css = '';

// Primary
if ( get_option( $dirname . '_primary_font' ) ) {		
	$custom_css .= 'body, input, textarea, select, #sidebar .menu li .menu-subtitle {font-family: "' . get_option( $dirname . '_primary_font' ) . '";}';
}

if ( get_option( $dirname . '_primary_size' ) ) {
	$custom_css .= 'body, input, textarea, select, #sidebar .menu li .menu-subtitle {font-size: ' . get_option( $dirname . '_primary_size' ) . 'px;}';
}

if ( get_option( $dirname . '_primary_text_color' ) ) {
	$custom_css .= 'body, input, textarea, select, #sidebar .menu li .menu-subtitle {color: ' . get_option( $dirname . '_primary_text_color' ) . ';}';
}
	
if ( get_option( $dirname . '_primary_link_color' ) ) {
	$custom_css .= 'a, .ui-tabs .ui-tabs-nav li.ui-tabs-active a, .ui-tabs .ui-tabs-nav li.ui-state-disabled a, .ui-tabs .ui-tabs-nav li.ui-state-processing a, .ui-tabs .ui-tabs-nav li.ui-state-hover a {color: ' . get_option( $dirname . '_primary_link_color' ) . ';}';
}

if ( get_option( $dirname . '_primary_link_hover_color' ) ) {
	$custom_css .= 'a:hover {color: ' . get_option( $dirname . '_primary_link_hover_color' ) . ';}';
}

if ( get_option( $dirname . '_primary_bg_color' ) ) {
	$custom_css .= ' . padder, .widget, #footer, body.activity-permalink .activity-list {background-color: ' . get_option( $dirname . '_primary_bg_color' ) . ';}';
}	

if ( get_option( $dirname . '_primary_border_color' ) ) {
	$custom_css .= ' . widget .widgettitle, .sc-divider, .author-info, .separate > div, .joint > div {border-color:' . get_option( $dirname . '_primary_border_color' ) . ';}';
}	

// Secondary
if ( get_option( $dirname . '_secondary_bg_color' ) ) {
	$custom_css .= 'input, textarea, input[type="password"], .ui-tabs .ui-tabs-nav li.ui-tabs-active, .sc-tab-panel, #content .widget[class*="widget_bp_"] h3 {background-color: ' . get_option( $dirname . '_secondary_bg_color' ) . '; border-color: ' . get_option( $dirname . '_secondary_bg_color' ) . ';}';
}

if ( get_option( $dirname . '_secondary_bg_hover_color' ) ) {
	$custom_css .= 'input:focus, textarea:focus, input[type="password"]:focus {background-color: ' . get_option( $dirname . '_secondary_bg_hover_color' ) . '; border-color: ' . get_option( $dirname . '_secondary_bg_hover_color' ) . ';}';
}	


// Headings
if ( get_option( $dirname . '_heading_font' ) ) {		
	$custom_css .= 'h1, h2, h3, h4, h5, h6, .widget .widgettitle {font-family: "' . get_option( $dirname . '_heading_font' ) . '";}';
}

if ( get_option( $dirname . '_heading_text_color' ) ) {
	$custom_css .= 'h1, h2, h3, h4, h5, h6, .widget .widgettitle {color: ' . get_option( $dirname . '_heading_text_color' ) . ';}';
}	

if ( get_option( $dirname . '_heading1_size' ) ) {
	$custom_css .= 'h1 {font-size: ' . get_option( $dirname . '_heading1_size' ) . 'px;}';
}	

if ( get_option( $dirname . '_heading2_size' ) ) {
	$custom_css .= 'h2 {font-size: ' . get_option( $dirname . '_heading2_size' ) . 'px;}';
}
	
if ( get_option( $dirname . '_heading3_size' ) ) {
	$custom_css .= 'h3 {font-size: ' . get_option( $dirname . '_heading3_size' ) . 'px;}';
}
	
if ( get_option( $dirname . '_heading_link_color' ) ) {				
	$custom_css .= 'h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, #sidebar .menu li a {color: ' . get_option( $dirname . '_heading_link_color' ) . ';}';
}

if ( get_option( $dirname . '_heading_link_hover_color' ) ) {
	$custom_css .= 'h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover, #sidebar .menu li a:hover {color: ' . get_option( $dirname . '_heading_link_hover_color' ) . ';}';
}	


// Header
if ( get_option( $dirname . '_header_bg_color' ) ) {
	$custom_css .= '#header {background-color: ' . get_option( $dirname . '_header_bg_color' ) . ';}';
}	

if ( get_option( $dirname . '_header_link_color' ) ) {
	$custom_css .= '#nav .menu li a, #nav .menu li a:hover, #nav .menu li:hover > a, #mobile-nav .menu li a, #mobile-nav .menu li a:hover {color: ' . get_option( $dirname . '_header_link_color' ) . ';}';
	$custom_css .= '#nav .menu .sub-menu li a {color: rgb( ' . hex2rgb( get_option( $dirname . '_header_link_color' ) ) . ' ); color: rgba( ' . hex2rgb( get_option( $dirname . '_header_link_color' ) ) . ',0.8 );}';
	$custom_css .= '#nav .menu .sub-menu li a:hover {color: rgb( ' . hex2rgb( get_option( $dirname . '_header_link_color' ) ) . ' ); color: rgba( ' . hex2rgb( get_option( $dirname . '_header_link_color' ) ) . ',1 );}'; 
}

if ( get_option( $dirname . '_dropdown_bg_color' ) ) {
	$custom_css .= '#nav .menu li a:hover, #nav .menu .sub-menu, #nav .menu li:hover > a, #mobile-nav .menu li a:hover {background-color: ' . get_option( $dirname . '_dropdown_bg_color' ) . ';}';
}	

// Primary Buttons
if ( get_option( $dirname . '_primary_button_text_color' ) ) {
	$custom_css .= 'input[type="button"], input[type="submit"], input[type="reset"], button, .button,.gp-theme #buddypress .comment-reply-link,.gp-theme #buddypress a.button,.gp-theme #buddypress button,.gp-theme #buddypress div.generic-button a,.gp-theme #buddypress input[type=button],.gp-theme #buddypress input[type=reset],.gp-theme #buddypress input[type=submit],.gp-theme #buddypress ul.button-nav li a{color: ' . get_option( $dirname . '_primary_button_text_color' ) . ';}';
}	
		
if ( get_option( $dirname . '_primary_button_bg_color' ) ) {		
	$custom_css .= 'input[type="button"], input[type="submit"], input[type="reset"], button, .button,.gp-theme #buddypress .comment-reply-link,.gp-theme #buddypress a.button,.gp-theme #buddypress button,.gp-theme #buddypress div.generic-button a,.gp-theme #buddypress input[type=button],.gp-theme #buddypress input[type=reset],.gp-theme #buddypress input[type=submit],.gp-theme #buddypress ul.button-nav li a{background-color: ' . get_option( $dirname . '_primary_button_bg_color' ) . '; border-color: ' . get_option( $dirname . '_primary_button_bg_color' ) . ';}';
}	

if ( get_option( $dirname . '_primary_button_bg_hover_color' ) ) {
	$custom_css .= 'input[type="button"]:hover, input[type="submit"]:hover, input[type="reset"]:hover, button:hover, .button:hover,.gp-theme #buddypress .comment-reply-link:hover,.gp-theme #buddypress a.button:hover,.gp-theme #buddypress button:hover,.gp-theme #buddypress div.generic-button a:hover,.gp-theme #buddypress input[type=button]:hover,.gp-theme #buddypress input[type=reset]:hover,.gp-theme #buddypress input[type=submit]:hover,.gp-theme #buddypress ul.button-nav li a:hover,a.bp-title-button:hover{background-color: ' . get_option( $dirname . '_primary_button_bg_hover_color' ) . '; border-color: ' . get_option( $dirname . '_primary_button_bg_hover_color' ) . '; color: ' . get_option( $dirname . '_primary_button_text_color' ) . ';}';
}	


// Secondary Buttons
if ( get_option( $dirname . '_secondary_button_text_color' ) ) {
	$custom_css .= '.login-button,#mobile-nav-button,.gp-theme .widget.buddypress div.item-options a,.gp-theme #buddypress div.activity-meta a.button,.gp-theme #buddypress .activity .acomment-options a{color: ' . get_option( $dirname . '_secondary_button_text_color' ) . ';}';
}	
		
if ( get_option( $dirname . '_secondary_button_bg_color' ) ) {		
	$custom_css .= '.login-button,.gp-theme .widget.buddypress div.item-options a,.gp-theme #buddypress div.activity-meta a.button,.gp-theme #buddypress .activity .acomment-options a{background-color: ' . get_option( $dirname . '_secondary_button_bg_color' ) . '; border-color: ' . get_option( $dirname . '_secondary_button_bg_color' ) . ';}';
}	

if ( get_option( $dirname . '_secondary_button_bg_hover_color' ) ) {
	$custom_css .= '.login-button:hover, #mobile-nav-button:hover,.gp-theme .widget.buddypress div.item-options a.selected,.gp-theme .widget.buddypress div.item-options a:hover,.gp-theme #buddypress div.activity-meta a.button:hover,.gp-theme #buddypress .activity .acomment-options a:hover{background-color: ' . get_option( $dirname . '_secondary_button_bg_hover_color' ) . '; border-color: ' . get_option( $dirname . '_secondary_button_bg_hover_color' ) . '; color: ' . get_option( $dirname . '_secondary_button_text_color' ) . ';}';
}
	
	
/*--------------------------------------------------------------
Theme Widths
--------------------------------------------------------------*/

// Desktops - 1024 - 1199px
if ( get_option( $dirname . '_desktop_page_width' ) != "1200" OR get_option( $dirname . '_desktop_content_width_1' ) != "935" OR get_option( $dirname . '_desktop_content_width_2' ) != "670" OR get_option( $dirname . '_desktop_single_sidebar_width' ) != "245" OR get_option( $dirname . '_desktop_double_sidebar_width' ) != "245" ) {
	$custom_css .= '@media only screen and (min-width: 1083px) {';
		if ( get_option( $dirname . '_desktop_page_width' ) != "1200" ) {
			$custom_css .= '.gp-responsive #page-wrapper, .gp-responsive.gp-scrolling.gp-fixed-header #header, .gp-responsive #footer-widgets {width: ' . get_option( $dirname . '_desktop_page_width' ) . 'px;}';
		}	
		if ( get_option( $dirname . '_desktop_content_width_1' ) != "935" ) {
			$custom_css .= '.gp-responsive #content, .gp-responsive #container, .gp-responsive #left-content-wrapper {width: ' . get_option( $dirname . '_desktop_content_width_1' ) . 'px;}';
		}	
		if ( get_option( $dirname . '_desktop_content_width_2' ) != "670" ) {
			$custom_css .= '.gp-responsive.sb-both #content, .gp-responsive.sb-both #container {width: ' . get_option( $dirname . '_desktop_content_width_2' ) . 'px;}.gp-responsive.sb-both #left-content-wrapper {width: ' . ( get_option( $dirname . '_desktop_content_width_2' ) + get_option( $dirname . '_desktop_double_sidebar_width' ) + 20 ) . 'px;}';
		}			
		if ( get_option( $dirname . '_desktop_single_sidebar_width' ) != "245" ) {
			$custom_css .= '.gp-responsive .sidebar {width: ' . get_option( $dirname . '_desktop_single_sidebar_width' ) . 'px;}';
		}	
		if ( get_option( $dirname . '_desktop_double_sidebar_width' ) != "245" ) {
			$custom_css .= '.gp-responsive.sb-both .sidebar {width: ' . get_option( $dirname . '_desktop_double_sidebar_width' ) . 'px;}';
		}		
	$custom_css .= '}';
}	

// Tablet (landscape)
if ( get_option( $dirname . '_tablet_l_page_width' ) != "1000" OR get_option( $dirname . '_tablet_l_content_width_1' ) != "775" OR get_option( $dirname . '_tablet_l_content_width_2' ) != "550" OR get_option( $dirname . '_tablet_l_single_sidebar_width' ) != "205" OR get_option( $dirname . '_tablet_l_double_sidebar_width' ) != "205" ) {
	$custom_css .= '@media only screen and (max-width: 1082px) {';
		if ( get_option( $dirname . '_tablet_l_page_width' ) != "1000" ) {
			$custom_css .= '.gp-responsive #page-wrapper, .gp-responsive #footer-widgets {width: ' . get_option( $dirname . '_tablet_l_page_width' ) . 'px;}';
		}	
		if ( get_option( $dirname . '_tablet_l_content_width_1' ) != "775" ) {
			$custom_css .= '.gp-responsive #content, .gp-responsive #container, .gp-responsive #left-content-wrapper {width: ' . get_option( $dirname . '_tablet_l_content_width_1' ) . 'px;}';
		}	
		if ( get_option( $dirname . '_tablet_l_content_width_2' ) != "550" ) {
			$custom_css .= '.gp-responsive.sb-both #content, .gp-responsive.sb-both #container {width: ' . get_option( $dirname . '_tablet_l_content_width_2' ) . 'px;}.gp-responsive.sb-both #left-content-wrapper {width: ' . ( get_option( $dirname . '_tablet_l_content_width_2' ) + get_option( $dirname . '_tablet_l_double_sidebar_width' ) + 20 ) . 'px;}';
		}			
		if ( get_option( $dirname . '_tablet_l_single_sidebar_width' ) != "205" ) {
			$custom_css .= '.gp-responsive .sidebar {width: ' . get_option( $dirname . '_tablet_l_single_sidebar_width' ) . 'px;}';
		}	
		if ( get_option( $dirname . '_tablet_l_double_sidebar_width' ) != "205" ) {
			$custom_css .= '.gp-responsive.sb-both .sidebar {width: ' . get_option( $dirname . '_tablet_l_double_sidebar_width' ) . 'px;}';
		}		
	$custom_css .= '}';
}		

// Tablet (portrait)
/*if ( get_option( $dirname . '_sm_desktop_page_width' ) != "900" OR get_option( $dirname . '_sm_desktop_content_width_1' ) != "635" OR get_option( $dirname . '_sm_desktop_single_sidebar_width' ) != "245" ) {
	$custom_css .= '@media only screen and (max-width: 1023px) {';
		if ( get_option( $dirname . '_sm_desktop_page_width' ) != "900" ) {
			$custom_css .= '.gp-responsive #page-wrapper {width: ' . get_option( $dirname . '_sm_desktop_page_width' ) . 'px;}';
		}	
		if ( get_option( $dirname . '_sm_desktop_content_width_1' ) != "635" ) {
			$custom_css .= '.gp-responsive #content, .gp-responsive.sb-both #content, .gp-responsive #container, .gp-responsive.sb-both #container {width: ' . get_option( $dirname . '_sm_desktop_content_width_1' ) . 'px;}';
		}			
		if ( get_option( $dirname . '_sm_desktop_single_sidebar_width' ) != "245" ) {
			$custom_css .= '.gp-responsive .sidebar {width: ' . get_option( $dirname . '_sm_desktop_single_sidebar_width' ) . 'px;}';
		}		
	$custom_css .= '}';
}*/	

// Tablet - 768 - 959px
/*if ( get_option( $dirname . '_tablet_p_page_width' ) != "748" OR get_option( $dirname . '_tablet_p_content_width_1' ) != "503" OR get_option( $dirname . '_tablet_p_single_sidebar_width' ) != "225" ) {
	$custom_css .= '@media only screen and (max-width: 959px) {';
		if ( get_option( $dirname . '_tablet_p_page_width' ) != "748" ) {
			$custom_css .= '.gp-responsive #page-wrapper {width: ' . get_option( $dirname . '_tablet_p_page_width' ) . 'px;}';
		}	
		if ( get_option( $dirname . '_tablet_p_content_width_1' ) != "503" ) {
			$custom_css .= '.gp-responsive #content, .gp-responsive.sb-both #content, .gp-responsive #container, .sb-both #container {width: ' . get_option( $dirname . '_tablet_p_content_width_1' ) . 'px;}';
		}			
		if ( get_option( $dirname . '_tablet_p_single_sidebar_width' ) != "225" ) {
			$custom_css .= '.gp-responsive .sidebar {width: ' . get_option( $dirname . '_tablet_p_single_sidebar_width' ) . 'px;}';
		}		
	$custom_css .= '}';
}*/	


/*--------------------------------------------------------------
Custom CSS
--------------------------------------------------------------*/

if ( get_option( $dirname . '_custom_css' ) ) {
	$custom_css .= stripslashes( get_option( $dirname . '_custom_css' ) );
}

if ( ! empty( $custom_css ) ) { echo '<style>' . $custom_css . '</style>'; }

?>