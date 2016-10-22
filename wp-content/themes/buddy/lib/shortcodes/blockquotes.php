<?php

if ( ! function_exists( 'ghostpool_left_blockquote' ) ) {
	function ghostpool_left_blockquote( $atts, $content = null ) {
		return '<div class="blockquote-left">' . do_shortcode( $content ) . '</div>';
	}
}
add_shortcode( 'bq_left', 'ghostpool_left_blockquote' );

if ( ! function_exists( 'ghostpool_right_blockquote' ) ) {
	function ghostpool_right_blockquote( $atts, $content = null ) {
		return '<div class="blockquote-right">' . do_shortcode( $content ) . '</div>';
	}
}
add_shortcode( 'bq_right', 'ghostpool_right_blockquote' );

?>