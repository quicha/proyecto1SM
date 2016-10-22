<?php

if ( ! function_exists( 'ghostpool_toggle_box' ) ) {

	function ghostpool_toggle_box( $atts, $content = null ) {
	
		extract( shortcode_atts( array( 
			'title'      => '',
		 ), $atts ) );

		wp_enqueue_script( 'gp-toggle-init' );
	
		$gp_output_string = '';
		$gp_output_string .= '<h3 class="toggle"><i class="fa fa-plus-square"></i><a href="#">' . esc_attr( $title ) . '</a></h3>';
		$gp_output_string .= '<div class="toggle-box" style="display: none;"><p>';
		$gp_output_string .= do_shortcode( $content );
		$gp_output_string .= '</p></div>';

		return $gp_output_string;
	
	}
	
}

add_shortcode( 'toggle', 'ghostpool_toggle_box' );

?>