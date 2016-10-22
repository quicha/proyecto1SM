<?php

if ( ! function_exists( 'ghostpool_button' ) ) {

	function ghostpool_button( $atts, $content = null ) {
	
		extract( shortcode_atts( array( 
			'link' => '',
			'color' => 'mediumblue',
			'size' => 'small',
			'target' => '_self'
		 ), $atts ) );

		$gp_output_string = '<a href="' . esc_url( $link ) . '" class="sc-button ' . esc_attr( $color ) . ' ' . esc_attr( $size ) . '" target="' . esc_attr( $target ) . '">' . do_shortcode( $content ) . '</a>';
	
		return $gp_output_string;
		
	}
	
}

add_shortcode( 'button', 'ghostpool_button' );

?>