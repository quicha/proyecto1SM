<?php

if ( ! function_exists( 'ghostpool_accordion' ) ) {
	function ghostpool_accordion( $atts, $content = null, $code ) {
		extract( shortcode_atts( array( 
			'title' => '',
		 ), $atts ) );

		wp_enqueue_script( 'jquery-ui-accordion' );
		wp_enqueue_script( 'gp-accordion-init' );
		
		if ( $code == 'accordion' ) {
			return '<div class="accordion">' . do_shortcode( $content ) . '</div>';
		} elseif ( $code == 'panel' ) {
			return '<div class="panel"><h3 class="accordion-title"><i class="fa fa-arrow-circle-down"></i><a href="#">' . esc_attr( $title ) . '</a></h3><div class="panel-content">' . do_shortcode( $content ) . '</div></div>';
		}

	}
	
}

add_shortcode( 'accordion', 'ghostpool_accordion' );
add_shortcode( 'panel', 'ghostpool_accordion' );

?>