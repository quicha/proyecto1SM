<?php

if ( ! function_exists( 'ghostpool_login_form' ) ) {

	function ghostpool_login_form( $atts, $content = null ) {
	
		extract( shortcode_atts( array( 
			'username' => esc_html__( 'Username', 'buddy' ),
			'password' => esc_html__( 'Password', 'buddy' ),
			'redirect' => site_url( $_SERVER['REQUEST_URI'] ),
		 ), $atts ) );
	
		if ( $redirect == '' ) {
			$redirect = site_url( $_SERVER['REQUEST_URI'] );
		}

		$gp_args = array( 
			'redirect' => esc_url( $redirect ),
			'label_username' => esc_attr( $username ),
			'label_password' => esc_attr( $password ),
			'remember' => true
		 );
	
		ob_start(); ?>
	 
		<?php if ( ! is_user_logged_in() ) {
	
			wp_login_form( $gp_args );
	
		}

		$gp_output_string = ob_get_contents();
		ob_end_clean(); 
		return $gp_output_string;
		
	}
	
}

add_shortcode( 'login', 'ghostpool_login_form' );

?>