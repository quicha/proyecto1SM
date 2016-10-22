<?php

if ( ! function_exists( 'ghostpool_default_divider' ) ) {
	function ghostpool_default_divider( $atts, $content = null ) {
		return '<div class="sc-divider"></div>';
	}
}
add_shortcode( 'divider', 'ghostpool_default_divider' );

if ( ! function_exists( 'ghostpool_top_divider' ) ) {
	function ghostpool_top_divider( $atts, $content = null ) {
		return '<div class="sc-divider top"><a href="#">'. esc_html__( 'Back To Top', 'buddy' ).'</a></div>';
	}
}
add_shortcode( 'top_divider', 'ghostpool_top_divider' );

if ( ! function_exists( 'ghostpool_small_divider' ) ) {
	function ghostpool_small_divider( $atts, $content = null ) {
		return '<div class="sc-divider small"></div>';
	}
}
add_shortcode( 'small_divider', 'ghostpool_small_divider' );

if ( ! function_exists( 'ghostpool_clear_divider' ) ) {
	function ghostpool_clear_divider( $atts, $content = null ) {
		return '<div class="sc-divider clear"></div>';
	}
}
add_shortcode( 'clear', 'ghostpool_clear_divider' );

if ( ! function_exists( 'ghostpool_small_clear_divider' ) ) {
	function ghostpool_small_clear_divider( $atts, $content = null ) {
		return '<div class="sc-divider clear small"></div>';
	}
}
add_shortcode( 'small_clear', 'ghostpool_small_clear_divider' );

?>