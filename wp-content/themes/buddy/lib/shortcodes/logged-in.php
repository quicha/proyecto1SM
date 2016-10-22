<?php

if ( ! function_exists( 'ghostpool_logged_in' ) ) {
	function ghostpool_logged_in( $atts, $content = null ) {
		if ( is_user_logged_in() ) {
			return do_shortcode( $content );
		}
	}
}
add_shortcode( 'logged_in', 'ghostpool_logged_in' );

?>