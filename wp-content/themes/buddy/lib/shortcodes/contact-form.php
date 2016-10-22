<?php

if ( ! function_exists( 'ghostpool_contact_form' ) ) {
	function ghostpool_contact_form( $atts, $content = null ) {
		extract( shortcode_atts( array( 
			'email' => ''
		 ), $atts ) );

		wp_enqueue_script( 'gp-contact-init' );	
	
		global $post;
	
		// Form Submitted
		if ( isset( $_POST['submittedContact'] ) ) {
			require( ghostpool_inc . "/contact.php" );
		}
	
		$out = '';
		
		if ( isset( $emailSent ) && $emailSent == true ) {
		
			$out .= '<a id="contact_"></a>';
			$out .= '<div class="contact-form notify notify-success">'. esc_html__( 'Thanks', 'buddy' ).' '.$gp_name.'. '. esc_html__( 'Your message was successfully sent.', 'buddy' ).'</div>';
		
		} else {
		
			if ( isset( $captchaError ) ) {
				$out .= '<a id="contact_"></a>';
				$out .= '<div class="contact-form notify notify-error">'. esc_html__( 'There was an error submitting this message.', 'buddy' ).'</div>';
			}
				
			// Name
			$out .= '<a id="contact_"></a>';
			$out .= '<form action="' .get_permalink( $post->ID ). '#contact_" id="contact-form" method="post">';
			$out .= '<p><label class="textfield_label" for="contactName">'. esc_html__( 'Name', 'buddy' ).' <span class="required">*</span></label><input type="text" name="contactName" id="contactName" placeholder="'. esc_html__( 'Name', 'buddy' ).'" value="';
		
			if ( isset( $_POST['contactName'] ) ) {
				$out .= $_POST['contactName'];
			}
			$out .= '"';
			$out .= ' class="requiredFieldContact textfield';
		
			if ( isset( $gp_nameError ) ) {
				$out .= ' input-error';
			}
			$out .= '"';
			$out .= ' size="22" /></p>';

		
			// Email
			$out .= '<p><label class="textfield_label" for="contactEmail">'. esc_html__( 'Email', 'buddy' ).' <span class="required">*</span></label><input type="text" name="contactEmail" id="contactEmail" placeholder="'. esc_html__( 'Email', 'buddy' ).'" value="';
		
			if ( isset( $_POST['contactEmail'] ) ) {
				$out .= $_POST['contactEmail'];
			}
			$out .= '"';
			$out .= ' class="requiredFieldContact email textfield';
		
			if ( isset( $emailError ) ) {
				$out .= ' input-error';
			}
			$out .= '"';
			$out .= ' size="22" /></p>';

		
			// Comments
			$out .= '<p><label class="textfield_label" for="contactComment">'. esc_html__( 'Comment', 'buddy' ).' <span class="required">*</span></label><textarea name="comments" id="commentsText" rows="5" cols="40" placeholder="'. esc_html__( 'Comment', 'buddy' ).'" class="requiredFieldContact textarea';
		
			if ( isset( $commentError ) ) {
				$out .= ' input-error';
			}
			$out .= '">';
		
			if ( isset( $_POST['comments'] ) ) { 
				if ( function_exists( 'stripslashes' ) ) { 
					$out .= stripslashes( $_POST['comments'] ); 
					} else { 
						$out .= $_POST['comments']; 
					} 
				}
			$out .= '</textarea></p>';
		
			$out .= '<div class="contact-verify"><label for="verify" accesskey=V>3 + 1 = </label><input name="verify" type="text" id="verify" value="';

		
			// Verify
			if ( isset( $_POST['verify'] ) ) {
				$out .= $_POST['verify'];
			}
			$out .= '"';
			$out .= ' class="requiredFieldContact verify';
		
			if ( isset( $verifyError ) ) {
				$out .= ' input-error';
			}
			$out .= '"';
			$out .= ' size="2" /></div>';
		
		
			// Submit
			$out .= '<input name="submittedContact" id="submittedContact" class="contact-submit" value="'. esc_html__( 'Send', 'buddy' ).'" type="submit" />';
			$out .= '<p class="loader"></p>';

			$out .= '<input id="submitUrl" type="hidden" name="submitUrl" value="'. ghostpool_inc . 'contact.php" />';
			$out .= '<input id="emailAddress" type="hidden" name="emailAddress" value="' .$email. '" />';
	
			$out .= '</form>';

		}
		return $out;
	}
}
add_shortcode( "contact", "ghostpool_contact_form" );

?>