<?php

if ( ! function_exists( 'ghostpool_logged_out' ) ) {
	function ghostpool_logged_out( $atts, $content = null ) {
		if ( is_user_logged_in() ) {} else {
			return do_shortcode( $content );
		}
	}
}
add_shortcode( 'logged_out', 'ghostpool_logged_out' );

?>