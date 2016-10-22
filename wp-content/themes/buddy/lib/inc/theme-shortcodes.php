<?php

// Accordions
require_once( ghostpool_shortcodes . 'accordions.php' );

// Activity
require_once( ghostpool_shortcodes . 'activity-stream.php' );

// Author Info
require_once( ghostpool_shortcodes . 'author-info.php' );

// Blockquotes
require_once( ghostpool_shortcodes . 'blockquotes.php' );

// Buttons
require_once( ghostpool_shortcodes . 'buttons.php' );

// Columns
require_once( ghostpool_shortcodes . 'columns.php' );

// Contact Form - deprectaed since v2.0
require_once( ghostpool_shortcodes . 'contact-form.php' );

// Dividers
require_once( ghostpool_shortcodes . 'dividers.php' );

// Dropcaps
require_once( ghostpool_shortcodes . 'dropcaps.php' );

// Images
require_once( ghostpool_shortcodes . 'images.php' );

// Lists
require_once( ghostpool_shortcodes . 'lists.php' );

// Logged In
require_once( ghostpool_shortcodes . 'logged-in.php' );

// Logged Out
require_once( ghostpool_shortcodes . 'logged-out.php' );

// Login Form
require_once( ghostpool_shortcodes . 'login-form.php' );

// Notifications
require_once( ghostpool_shortcodes . 'notifications.php' );

// Posts
require_once( ghostpool_shortcodes . 'posts.php' );

// Register Form
require_once( ghostpool_shortcodes . 'register-form.php' );

// Related Posts
require_once( ghostpool_shortcodes . 'related-posts.php' );

// Sidebars
require_once( ghostpool_shortcodes . 'sidebars.php' );

// Slider
require_once( ghostpool_shortcodes . 'slider.php' );

// Tabs
require_once( ghostpool_shortcodes . 'tabs.php' );

// Text Boxes
require_once( ghostpool_shortcodes . 'text-boxes.php' );

// Toggle Boxes
require_once( ghostpool_shortcodes . 'toggle-boxes.php' );

// Videos
if ( get_option( $dirname . '_old_video_shortcode' ) == '0' ) {
	require_once( ghostpool_shortcodes . 'videos.php' );
}

?>