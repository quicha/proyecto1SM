<?php 
function login_recaptcha_script() {
	wp_register_script("recaptcha_login", "https://www.google.com/recaptcha/api.js");
	wp_enqueue_script("recaptcha_login");


}
add_action("login_enqueue_scripts", "login_recaptcha_script");



if(get_option('lps_login_captcha') == 1){

function display_login_captcha() { ?>
	<div style="margin-bottom:10px;  transform:scale(.94);transform-origin:0 0" class="g-recaptcha" data-theme="dark" data-sitekey="<?php echo get_option('rs_site_key'); ?>"></div>
<?php }
add_action( "login_form", "display_login_captcha" );

function verify_login_captcha($user, $password) {
	if (isset($_POST['g-recaptcha-response'])) {
		$recaptcha_secret = get_option('rs_private_key');
		$response = wp_remote_get("https://www.google.com/recaptcha/api/siteverify?secret=". $recaptcha_secret ."&response=". $_POST['g-recaptcha-response']);
		$response = json_decode($response["body"], true);
		if (true == $response["success"]) {
			return $user;
		} else {
			return new WP_Error("Captcha Invalid", __("<strong>ERROR</strong>: You are a bot"));
		} 
	} else {
		return new WP_Error("Captcha Invalid", __("<strong>ERROR</strong>: You are a bot. If not then enable JavaScript"));
	}   
}
add_filter("wp_authenticate_user", "verify_login_captcha", 10, 2);

}



if(get_option('lps_lost_captcha') == 1){
	function display_lost_captcha() { ?>
	<div style="margin-bottom:5px;  transform:scale(.95);transform-origin:0 0" class="g-recaptcha" data-sitekey="<?php echo get_option('rs_site_key'); ?>"></div>
<?php }
add_action("lostpassword_form", "display_lost_captcha");

function verify_lostpassword_captcha() {
	if (isset($_POST['g-recaptcha-response'])) {
		$recaptcha_secret = get_option('rs_private_key');
		$response = wp_remote_get("https://www.google.com/recaptcha/api/siteverify?secret=". $recaptcha_secret ."&response=". $_POST['g-recaptcha-response']);
		$response = json_decode($response["body"], true);
		if (true == $response["success"]) {
			return;
		} else {
			wp_die(__("<strong>ERROR</strong>: You are a bot"));
		}
	} else {
		wp_die(__("<strong>ERROR</strong>: You are a bot. If not then enable JavaScript"));
	}
	return $errors;    
}
add_action("lostpassword_post", "verify_lostpassword_captcha");
}


?>