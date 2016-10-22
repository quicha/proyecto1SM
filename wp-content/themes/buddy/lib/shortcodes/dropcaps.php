<?php

//////////////////////////////////////// Dropcaps ////////////////////////////////////////

if ( ! function_exists( 'ghostpool_dropcap_1' ) ) {
	function ghostpool_dropcap_1( $atts, $content = null ) {
		extract( shortcode_atts( array( 
			'color' => ''
		 ), $atts ) );

		$gp_output_string = '';
		$gp_output_string .= '<span class="dropcap1" style="color: ' . esc_attr( $color ) . ';">' . do_shortcode( $content ) . '</span>';

	   return $gp_output_string;
	}
}
add_shortcode( 'dropcap_1', 'ghostpool_dropcap_1' );

if ( ! function_exists( 'ghostpool_dropcap_2' ) ) {
	function ghostpool_dropcap_2( $atts, $content = null ) {
		extract( shortcode_atts( array( 
			'color' => '',
		 ), $atts ) );

		$gp_output_string = '';
		$gp_output_string .= '<span class="dropcap2" style="color: ' . esc_attr( $color ) . ';">' . do_shortcode( $content ) . '</span>';

	   return $gp_output_string;
	}
}
add_shortcode( 'dropcap_2', 'ghostpool_dropcap_2' );

if ( ! function_exists( 'ghostpool_dropcap_3' ) ) {
	function ghostpool_dropcap_3( $atts, $content = null ) {
		extract( shortcode_atts( array( 
			'color' => '',
		 ), $atts ) );

		$gp_output_string = '';
		$gp_output_string .= '<span class="dropcap3" style="color: ' . esc_attr( $color ) . ';">' . do_shortcode( $content ) . '</span>';

	   return $gp_output_string;
	}
}
add_shortcode( 'dropcap_3', 'ghostpool_dropcap_3' );

if ( ! function_exists( 'ghostpool_dropcap_4' ) ) {
	function ghostpool_dropcap_4( $atts, $content = null ) {
		extract( shortcode_atts( array( 
			'color' => '',
		 ), $atts ) );

		$gp_output_string = '';
		$gp_output_string .= '<span class="dropcap4" style="color: ' . esc_attr( $color ) . ';">' . do_shortcode( $content ) . '</span>';

	   return $gp_output_string;
	}
}
add_shortcode( 'dropcap_4', 'ghostpool_dropcap_4' );

if ( ! function_exists( 'ghostpool_dropcap_5' ) ) {
	function ghostpool_dropcap_5( $atts, $content = null ) {
		extract( shortcode_atts( array( 
			'color' => '',
		 ), $atts ) );

		$gp_output_string = '';
		$gp_output_string .= '<span class="dropcap5" style="color: ' . esc_attr( $color ) . ';">' . do_shortcode( $content ) . '</span>';

	   return $gp_output_string;
	}
}
add_shortcode( 'dropcap_5', 'ghostpool_dropcap_5' );

?>