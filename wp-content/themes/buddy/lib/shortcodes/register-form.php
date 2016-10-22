<?php

if ( ! function_exists( 'ghostpool_register_form' ) ) {

	function ghostpool_register_form( $atts, $content = null ) {
	
		extract( shortcode_atts( array( 
			'username' => esc_html__( 'Username', 'buddy' ),
			'email' => esc_html__( 'Email', 'buddy' ),
			'redirect' => 'wp-login.php?action=register'
		 ), $atts ) );

		global $user_ID, $user_identity, $user_level;
	
		if ( ! is_user_logged_in() ) {

			return
		
			'<form id="registerform" action="' . esc_url( site_url( $redirect, 'login_post' ) ).'" method="post">
				<p class="login-username"><label>' . esc_attr( $username ) . '</label><input type="text" name="user_login" id="user_register" class="input" value="' . esc_attr( stripslashes( $user_login ) ) . '" size="22" /></p>
				<p class="login-email"><label>' . esc_attr( $email ) . '</label><input type="text" name="user_email" id="user_email" class="input" value="' . esc_attr( stripslashes( $user_email ) ) . '" size="22" /></p>			
				' . do_action( 'register_form' ) . '
				<p>' . esc_html__( 'A password will be emailed to you', 'buddy' ) . '</p>
				<p><input type="submit" name="wp-submit" id="wp-register" value="' . esc_html__( 'Register', 'buddy' ) . '" tabindex="100" /></p>
			</form>';	
	
		}

	}
	
}

add_shortcode( 'register', 'ghostpool_register_form' );

?>