<?php

if ( ! function_exists( 'ghostpool_tabs' ) ) {

	function ghostpool_tabs( $atts, $content = null, $code ) {
	
		extract( shortcode_atts( array( 
			'title' => '',
		 ), $atts ) );

		wp_enqueue_script( 'jquery-ui-tabs' );
		wp_enqueue_script( 'gp-tabs-init' );

		if ( ! preg_match_all( '/(.?)\[(tab)\b(.*?)(?:(\/))?\](?:(.+?)\[\/tab\])?(.?)/s', $content, $matches ) ) {
		
			return do_shortcode( $content );
		
		} else {

			for ( $i = 0; $i < count( $matches[0] ); $i++ ) {
				$matches[3][$i] = ghostpool_shortcode_parse_atts( $matches[3][$i] );
			}
		
			$gp_output_string = '<ul>';
		
				for ( $i = 0; $i < count( $matches[0] ); $i++ ) {
					$gp_output_string .= '<li><a href="#tab-'.preg_replace( '/[^a-zA-Z0-9]/', '', $matches[3][$i]['title'] ) . '">' . $matches[3][$i]['title'] . '</a></li>';
				}
		
			$gp_output_string .= '</ul>';

			for( $i = 0; $i < count( $matches[0] ); $i++ ) {
				$gp_output_string .= '<div id="tab-'.preg_replace( '/[^a-zA-Z0-9]/', '', $matches[3][$i]['title'] ) . '" class="sc-tab-panel">'.do_shortcode( trim( $matches[5][$i] ) ) . '</div>';
			}
		
			return '<div class="sc-tabs">' . $gp_output_string . '</div>';
			
		}
		
	}
}

add_shortcode( 'tabs', 'ghostpool_tabs' );

?>