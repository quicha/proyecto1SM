<?php

if ( ! function_exists( 'ghostpool_list' ) ) {

	function ghostpool_list( $atts, $content = null, $code ) {
	
		extract( shortcode_atts( array( 
			'type' => 'fa-caret-right',
		 ), $atts ) );
	
		$gp_output_string = '';
		
		if ( $code == 'list' ) {
			$gp_output_string .= '<ul class="sc-list">' . do_shortcode( $content ) . '</ul>';
		} elseif ( $code == 'li' ) {
			$gp_output_string .= '<li><i class="fa ' . esc_attr( $type ) . '"></i>' . do_shortcode( $content ) . '</li>';
		}
	
		return $gp_output_string;
   
	}
	
}

add_shortcode( 'list', 'ghostpool_list' );
add_shortcode( 'li', 'ghostpool_list' );

?>