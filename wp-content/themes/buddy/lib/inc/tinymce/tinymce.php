<?php

class ghostpool_add_button {
	
	var $pluginname = 'ghostpool_shortcode';
	var $path = '';
	var $internalVersion = 100;
	
	function ghostpool_add_button()  {
		
		// Set path to editor_plugin.js
		$this->path = ghostpool_uri . 'lib/inc/tinymce/';	
		
		// Modify the version when tinyMCE plugins are changed.
		add_filter( 'tiny_mce_version', array ( &$this, 'ghostpool_change_tinymce_version' ) );

		// init process for button control
		add_action( 'init', array ( &$this, 'addbuttons' ) );
	}
	
	function addbuttons() {
		global $page_handle;
	
		// Don't bother doing this stuff if the current user lacks permissions
		if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) 
			return;
		
		// Add only in Rich Editor mode
		if ( get_user_option( 'rich_editing' ) == 'true' ) {		 
			$svr_uri = $_SERVER['REQUEST_URI'];
			if ( strstr( $svr_uri, 'post.php' ) OR strstr( $svr_uri, 'post-new.php' ) OR strstr( $svr_uri, 'page.php' ) OR strstr( $svr_uri, 'page-new.php' ) OR strstr( $svr_uri, $page_handle ) ) {
				add_filter( 'mce_external_plugins', array( &$this, 'ghostpool_add_tinymce_plugin' ), 5 );
				add_filter( 'mce_buttons', array( &$this, 'ghostpool_register_button' ), 5 );
			}
		}
	}
	
	function ghostpool_register_button( $buttons ) {
		array_push( $buttons, 'separator', $this->pluginname );
		return $buttons;
	}
	
	function ghostpool_add_tinymce_plugin( $plugin_array ) {		
		$plugin_array[$this->pluginname] =  $this->path . 'editor_plugin.js';		
		return $plugin_array;
	}
	
	function ghostpool_change_tinymce_version( $version ) {
		$version = $version + $this->internalVersion;
		return $version;
	}
	
}

$tinymce_button = new ghostpool_add_button();

?>