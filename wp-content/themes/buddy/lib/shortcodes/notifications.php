<?php

if ( ! function_exists( 'ghostpool_notification_box' ) ) {

	function ghostpool_notification_box( $atts, $content = null, $code ) {
	
		extract( shortcode_atts( array( 
			'type' => 'default',
		 ), $atts ) );
	
		if ( $type == 'warning' ) {
			$type = 'notify-warning';
		} elseif ( $type == 'error' ) {
			$type = 'notify-error';    
		} elseif ( $type == 'help' ) {
			$type = 'notify-help';
		} elseif ( $type == 'success' ) {
			$type = 'notify-success';
		} else {
			$type = 'notify-default';
		}
	
	   return '<div class="notify ' . esc_attr( $type ) . '">' . do_shortcode( $content ) . '</div>';
	   
	}  
	 
}

add_shortcode( 'notification', 'ghostpool_notification_box' );

?>