<?php
/*
Plugin Name: Toolbar Remixed - Free
Plugin URI: http://siteguru.biz/toolbar-remixed
Description: Control and Enhance the WordPress Toolbar.
Version: 1.2.6
Author: Jacob Schweitzer
Author URI: http://ijas.me/
License: GPL2
*/

add_filter( 'show_admin_bar', '__return_true' , 1000 );
// Load Options Page
add_action('admin_menu', 'toolbar_remixed_actions');
function toolbar_remixed_actions() {
	add_options_page("Toolbar Remixed Free", "Toolbar Remixed Free", 'manage_options', "ToolbarRemixedFree", "toolbar_remixed_free_admin");
}

		
	
// Options Page Function 	
function toolbar_remixed_free_admin() {
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
$tr_options = get_option("toolbar_remixed_option");
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jquery-ui-core');
	wp_enqueue_script( 'jquery-ui-button');
	wp_register_style('tr_admin_options_style', plugins_url('toolbar-remixed-free/css/divtoolbar_remixed_admin_options/jquery-ui-1.10.1.custom.min.css')  );
	wp_enqueue_style('tr_admin_options_style');
?>
<script type="text/javascript">
		jQuery(document).ready( function($) {
			$("#tr_on").button();
			$("#btn-group-wp").buttonset();
			$("#btn-group-bp").buttonset();
			$("#btn-group-colors").buttonset();
			$("#btn-group-tr-size").buttonset();
			$("#tr_role_hider").buttonset();

			$("form#toolbar_remixed_options_form input#make_colors_black").click( function() {
				$('div.tr_color_box').hide();
				$("input#tr_theme").val('black');
				return false;
			});
			
			
			$("form#toolbar_remixed_options_form input#make_colors_blue").click( function() {
				$('div.tr_color_box').hide();
				$("input#tr_theme").val('blue');	
				return false;
			});

			$("form#toolbar_remixed_options_form input#make_colors_grey").click( function() {
				$('div.tr_color_box').hide();
				$("input#tr_theme").val('grey');	
				return false;
			});

			$('div.tr_color_box').hide();
			$("form#toolbar_remixed_options_form input#tr_on").click( function() {
				var tr_is_on = $(this).attr('checked');
				if ( tr_is_on === undefined )  {
					$(this).prev('label').html('OFF');
				}
				if ( tr_is_on === 'checked' )  {
					$(this).prev('label').html('ON');
				}				
			});

			$("form#toolbar_remixed_options_form input#make_size_normal").click( function() {
				$("input#tr_size").val('28');
			});

			$("form#toolbar_remixed_options_form input#make_size_big").click( function() {
				$("input#tr_size").val('38');
			});

		});
    </script>
<style type="text/css">
.ui-icon { 
	display:inline-block !important;
}
#toolbar_remixed_admin_options label {
	padding: 6px; 
}
#toolbar_remixed_upgrade {
  width: 40%;
  /*margin: 10px;*/
  float:left;
}
 
#toolbar_remixed_upgrade ol {
  color: #ccc;
  list-style-type: none;
}
 
#toolbar_remixed_upgrade ol li {
  position: relative;
  font: bold italic 45px/1.5 Helvetica, Verdana, sans-serif;
  margin-bottom: 20px;
}
 
#toolbar_remixed_upgrade li p {
  font: 12px/1.5 Helvetica, sans-serif;
  padding-left: 60px;
  color: #555;
}
 
#toolbar_remixed_upgrade span {
  position: absolute;
}
<?php 
echo <<<EOD
</style><div class="wrap">
EOD;
	echo '<div id="toolbar_remixed_admin_options">';
	echo '<h1 style="color:#006A9A;text-shadow: #0081BC 1px -1px 1px;">Toolbar Remixed - Free</h1>';
	echo "<img src='http://s-plugins.wordpress.org/toolbar-remixed-free/assets/banner-772x250.png?rev=702921' style='float:left;width:40%;margin-right:20px;' />";
	echo '		<div id="toolbar_remixed_upgrade">
	 <h2><a href="http://siteguru.biz/downloads/toolbar-remixed/">Toolbar Remixed Pro</a> includes:</h2>
	 <ul>
		<li><span class="ui-icon ui-icon-pencil" style="position:relative;"></span>Custom Colors</li>
		<li><span class="ui-icon ui-icon-gear" style="position:relative;"></span>Custom Menu Integration</li>
		<li><span class="ui-icon ui-icon-unlocked" style="position:relative;"></span>Custom Icons for Menus and Menu Items Integrated via Toolbar Remixed</li>
		<li><span class="ui-icon ui-icon-scissors" style="position:relative;"></span>Hide plugin menus in the toolbar</li>
	</ul>
	</div>';
	echo "<div style='clear:both;' / >";
	echo '<form id="toolbar_remixed_options_form" class="toolbar_remixed_options_form_class">';
	echo '<div style="float:left;margin-right:30px;"><h3>Toolbar Styles</h3>';

	
	
	if ( $tr_options['tr_on'] == "on" ) {
		echo '<label for="tr_on">ON</label>';
		echo '<input type="checkbox" name="tr_on" id="tr_on" ';
		echo 'checked="checked"';
		echo "/>";
	}
	else {
		echo '<label for="tr_on">OFF</label>';
		echo '<input type="checkbox" name="tr_on" id="tr_on" />';
	}

echo "<br/><br/><span class='tr-feature-note'>Turn ON to use the color options to the right</span></div>";
echo '<div style="float:left;margin-right:30px;"><h3>Toolbar Color</h3><div id="btn-group-colors">';
echo '<input type="radio" id="make_colors_black" name="make_colors" class="button-secondary"';
if ( $tr_options['tr_theme'] == 'black' ) {
	echo 'checked="checked"';
}
echo '/><label for="make_colors_black">Black</label>';


echo '<input type="radio" id="make_colors_blue" name="make_colors" class="button-secondary"';
if ( $tr_options['tr_theme'] == 'blue' ) {
	echo 'checked="checked"';
}
echo '/><label for="make_colors_blue">Blue</label>';


echo '<input type="radio" id="make_colors_grey" name="make_colors" class="button-secondary"';
if ( $tr_options['tr_theme'] == 'grey' ) {
	echo 'checked="checked"';
}
echo '/><label for="make_colors_grey">Grey</label>';
echo '</div>';
echo '<input type="hidden" id="tr_theme" name="tr_theme" value="'.$tr_options["tr_theme"].'" /> ';
echo '<br/>	';
?>
</div>

<div style="float:left;">
<h3>Toolbar Size</h3>
<div id="btn-group-tr-size">
<input type="radio" id="make_size_normal" name="tr_size" class="button-secondary"
<?php
if ( $tr_options['tr_size'] == '28' ) {
	echo 'checked="checked"';
}
?>
/><label for="make_size_normal">28px</label><input type="radio" id="make_size_big" name="tr_size" class="button-secondary"
<?php
if ( $tr_options['tr_size'] == '38' ) {
	echo 'checked="checked"';
}
?>
/><label for="make_size_big">38px</label>

<input type="hidden" id="tr_size" name="tr_size" value="<?php echo $tr_options["tr_size"]; ?>" />
</div>
<br/><span class='tr-feature-note'>WordPress default size is 28 pixels (28px)</span>
</div>





<div style="clear:both;" />
<hr/>
<h3>Hide The WordPress Toolbar For Logged Out Users</h3>

<?php
echo '<div id="tr_role_hider">';
echo '<label for="tr_role_hide_loggedout">Hide</label>';
echo '<input type="checkbox" name="tr_role_hide_loggedout" id="tr_role_hide_loggedout" ';
		if ( isset($tr_options['tr_role_hide_loggedout']) && $tr_options['tr_role_hide_loggedout'] == "on" ) {
			echo 'checked="checked"';
		}
		echo ' />';
?>


</div>




<div style="clear:both;" />
<hr/>


<h3>Wordpress Defaults (Click to Hide)</h3>
<div id="btn-group-wp">
<?php
	$menu_array = array('my-sites','wp-logo','comments','new-content','edit','updates','search','site-name');	
	foreach ( $menu_array as $one_menu ) {
		$menu_nice_name = str_replace( '-', ' ', $one_menu );
		$menu_nice_name = ucwords( $menu_nice_name );
		echo <<<EOD
<label for="trwp_$one_menu">$menu_nice_name</label><input type="checkbox" name="trwp_$one_menu" id="trwp_$one_menu" 
EOD;
		if ( $tr_options['trwp_'.$one_menu] == "on" ) {
			echo 'checked="checked"';
		}
		echo '/ >';
	}

echo '</div><br/><hr/>';	
	if ( is_plugin_active('buddypress/bp-loader.php') ) {
	echo "<h4>BuddyPress (Click to Hide)</h4><div id='btn-group-bp'>";
	
		$bp_components= array('activity','blogs','friends','groups','messages','settings','xprofile');
		
		foreach ( $bp_components as $bp_component ) { 
		echo '<label for="hide_my-account-'.$bp_component.'">'.ucfirst($bp_component).'</label>';
		echo '<input type="checkbox" name="hide_my-account-'.$bp_component.'" id="hide_my-account-'.$bp_component.'"';
		if ( $tr_options['hide_my-account-'.$bp_component] == "on" ) {
			echo 'checked="checked"';
		}
		echo '/>';
		}
		echo '</div><br/><hr/>';
	}
	
	echo'</div>';
	
	echo '<h3>Change Howdy, UserName to Whatever You Want</h3>';
	echo '<label for="howdy">Howdy Text</label><input type="text" name="howdy" id="howdy" value="'.$tr_options["howdy"].'" />';
	echo '<p>Note: If you still want to put in the username, type   <b>##username##</b>  wherever you want it to appear. To go back to the WordPress default ( Howdy, ##username## ), leave this option blank.';
	echo '<p><span style="text-decoration:underline;">Example Howdy Text:</span>    <b>Yo, ##username## </b> </p>';
echo <<<EOD
	<hr/>
	<input type="hidden" id="action" name="action" value="toolbar_remixed_ajax_save">
	<input type="submit" value="Save Options + Refresh" id="submit" class="button-primary">		
	</form>
	<div id="toolbar_remixed_change_result">
		<span></span>
	</div>
	<br/>
	
	<br/>
	<script type="text/javascript">		
		jQuery(document).ready(function($) {
			$("#toolbar_remixed_options_form").submit(function(){
				$("#submit").hide()
				$("div#toolbar_remixed_change_result span").replaceWith("<h3>Saving Options and Refreshing the Page.....</h3>");
				var data = $(this).serialize();
				/*alert(data);*/
				$.post(ajaxurl, data, function(response) {
					$("#toolbar_remixed_change_result span").replaceWith("<span>"+response+"</span>");
					$("#toolbar_remixed_change_result span").contents().fadeOut(5000);
					 window.location.reload();
				 });	
			return false;
			}); 
		});
	</script>

	</div>
EOD;

}
// end of toolbar_remixed_admin

// AJAX Function to Save Options
add_action('wp_ajax_toolbar_remixed_ajax_save', 'toolbar_remixed_ajax_save');
function toolbar_remixed_ajax_save() {
	$data = $_POST;
	unset($data['action']);
	update_option("toolbar_remixed_option", $data);
	die();
}

// Main Loader for scripts and styles
add_action('admin_bar_init','toolbar_remixed_loader',100);
function toolbar_remixed_loader() {

	$tr_options = get_option("toolbar_remixed_option");

	if ( !is_user_logged_in() && isset($tr_options['tr_role_hide_loggedout']) && $tr_options['tr_role_hide_loggedout'] == "on" ) {
		$hide_the_toolbar = 1;
		tr_hide_the_toolbar();
	}


if ( $tr_options['tr_on'] == 'on'  && !isset($hide_the_toolbar) ) {
	
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	if ( is_plugin_active('blue-admin-bar/blue-admin-bar.php') ) {
		wp_dequeue_style('blue-admin-bar');
	}
	if ( is_plugin_active('buddypress/bp-loader.php') ) {
		wp_dequeue_style('bp-admin-bar');
	}
	// Load the admin bar in the header 
	remove_action( 'wp_footer', 'wp_admin_bar_render', 1000 );
	remove_action( 'admin_footer', 'wp_admin_bar_render', 1000 );
	add_action( 'wp_head', 'wp_admin_bar_render', 1000 );
	add_action( 'admin_head', 'wp_admin_bar_render', 1000 );
	
}
}




add_action('wp_head','toolbar_onclick');
add_action('admin_head','toolbar_onclick');
function toolbar_onclick() {

	$tr_options = get_option("toolbar_remixed_option");
	if ( !is_user_logged_in() && isset($tr_options['tr_role_hide_loggedout']) && $tr_options['tr_role_hide_loggedout'] == "on" ) {
		$hide_the_toolbar = 1;
	
	}

	if ( $tr_options['tr_on'] == 'on' && !isset($hide_the_toolbar) ) {
		$menu_interaction_type = 'mouseenter';
		
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'jquery-ui-core' );
		
		if ( $tr_options['tr_theme'] == 'blue' ) {
			wp_register_style('tr_style_blue',plugins_url('/toolbar-remixed-free').'/css/Toolbar-Remixed-Blue-3.6.css');
			wp_enqueue_style('tr_style_blue');
			$style = "blue";
		}
		
		if ( $tr_options['tr_theme'] == 'black' ) {
			wp_register_style('tr_style_black',plugins_url('/toolbar-remixed-free').'/css/Toolbar-Remixed-Black-3.6.css');
			wp_enqueue_style('tr_style_black');
			$style = "black";
		}
		if ( $tr_options['tr_theme'] == 'grey' ) {
			wp_register_style('tr_style_grey',plugins_url('/toolbar-remixed-free').'/css/Toolbar-Remixed-Grey-3.6.css');
			wp_enqueue_style('tr_style_grey');
			$style = "black";
		}
		if ( $tr_options['tr_size'] == '38' ) {
			wp_register_style('tr_style_38px',plugins_url('/toolbar-remixed-free').'/css/Toolbar-Remixed-38px.css');
			wp_enqueue_style('tr_style_38px');
			remove_action('wp_head', '_admin_bar_bump_cb');
			add_action('wp_head','admin_bar_bump_38');
		}
	} // end of it tr_on is on

}





add_action( 'wp_before_admin_bar_render', 'tr_load_menus',900 );
function tr_load_menus()
{
	global $wp_admin_bar;
	$tr_options = get_option("toolbar_remixed_option");
	if ( $tr_options != '' ) {
		$menu_array = array();
		foreach ($tr_options as $k => $v) {
			$first_five = substr($k, 0, 5);	
			if ( $first_five == "trwp_" ) {
				if ( $v == "on" ) {
					$menu_title = substr($k,5);
					$wp_admin_bar->remove_menu($menu_title);
				}
			}
			if ( $first_five == "hide_" ) {
				$plugin_to_hide = substr($k,5);
				$wp_admin_bar->remove_menu($plugin_to_hide);
			}
		}
	}
	
	if ( $tr_options['howdy'] != ''  ) {
		$user_id      = get_current_user_id();
		if ( $user_id ) {
			$current_user = wp_get_current_user();
			$profile_url  = get_edit_profile_url( $user_id );
			
			$avatar = get_avatar( $user_id, 16 );
			//$howdy  = $current_user->display_name;
			
			$howdy = $tr_options['howdy'];
			
			$howdy = str_replace('##username##',$current_user->display_name,$howdy);
			$class  = empty( $avatar ) ? '' : 'with-avatar';
			
			$wp_admin_bar->add_menu( array(
					'id'        => 'my-account',
					'parent'    => 'top-secondary',
					'title'     => $howdy . $avatar,
					'href'      => $profile_url,
					'meta'      => array(
							'class'     => $class,
							'title'     => __('My Account'),
					),
			) );
		}
	}
	
} // END of function tr_load_menus


function admin_bar_bump_38() {
	?>
		<style type="text/css" media="screen">
			html { margin-top: 38px !important; }
			* html body { margin-top: 38px !important; }
		</style>
	<?php
}
function tr_hide_the_toolbar() {
	
	$wp_scripts = new WP_Scripts();
	wp_deregister_script( 'admin-bar' );

	$wp_styles = new WP_Styles();

	wp_deregister_style( 'admin-bar' );
	remove_action( 'init', 'wp_admin_bar_init' );
	remove_filter( 'init', 'wp_admin_bar_init' );
	remove_action( 'wp_head', 'wp_admin_bar' );
	remove_filter( 'wp_head', 'wp_admin_bar' );
	remove_action( 'wp_footer', 'wp_admin_bar' );
	remove_filter( 'wp_footer', 'wp_admin_bar' );
	remove_action( 'admin_head', 'wp_admin_bar' );
	remove_filter( 'admin_head', 'wp_admin_bar' );
	remove_action( 'admin_footer', 'wp_admin_bar' );
	remove_filter( 'admin_footer', 'wp_admin_bar' );
	remove_action( 'wp_head', 'wp_admin_bar_class' );
	remove_filter( 'wp_head', 'wp_admin_bar_class' );
	remove_action( 'wp_footer', 'wp_admin_bar_class' );
	remove_filter( 'wp_footer', 'wp_admin_bar_class' );
	remove_action( 'admin_head', 'wp_admin_bar_class' );
	remove_filter( 'admin_head', 'wp_admin_bar_class' );
	remove_action( 'admin_footer', 'wp_admin_bar_class' );
	remove_filter( 'admin_footer', 'wp_admin_bar_class' );
	remove_action( 'wp_head', 'wp_admin_bar_css' );
	remove_filter( 'wp_head', 'wp_admin_bar_css' );
	remove_action( 'wp_head', 'wp_admin_bar_dev_css' );
	remove_filter( 'wp_head', 'wp_admin_bar_dev_css' );
	remove_action( 'wp_head', 'wp_admin_bar_rtl_css' );
	remove_filter( 'wp_head', 'wp_admin_bar_rtl_css' );
	remove_action( 'wp_head', 'wp_admin_bar_rtl_dev_css' );
	remove_filter( 'wp_head', 'wp_admin_bar_rtl_dev_css' );
	remove_action( 'admin_head', 'wp_admin_bar_css' );
	remove_filter( 'admin_head', 'wp_admin_bar_css' );
	remove_action( 'admin_head', 'wp_admin_bar_dev_css' );
	remove_filter( 'admin_head', 'wp_admin_bar_dev_css' );
	remove_action( 'admin_head', 'wp_admin_bar_rtl_css' );
	remove_filter( 'admin_head', 'wp_admin_bar_rtl_css' );
	remove_action( 'admin_head', 'wp_admin_bar_rtl_dev_css' );
	remove_filter( 'admin_head', 'wp_admin_bar_rtl_dev_css' );
	remove_action( 'wp_footer', 'wp_admin_bar_js' );
	remove_filter( 'wp_footer', 'wp_admin_bar_js' );
	remove_action( 'wp_footer', 'wp_admin_bar_dev_js' );
	remove_filter( 'wp_footer', 'wp_admin_bar_dev_js' );
	remove_action( 'admin_footer', 'wp_admin_bar_js' );
	remove_filter( 'admin_footer', 'wp_admin_bar_js' );
	remove_action( 'admin_footer', 'wp_admin_bar_dev_js' );
	remove_filter( 'admin_footer', 'wp_admin_bar_dev_js' );
	remove_action( 'locale', 'wp_admin_bar_lang' );
	remove_filter( 'locale', 'wp_admin_bar_lang' );
	remove_action( 'wp_head', 'wp_admin_bar_render', 1000 );
	remove_filter( 'wp_head', 'wp_admin_bar_render', 1000 );
	remove_action( 'wp_footer', 'wp_admin_bar_render', 1000 );
	remove_filter( 'wp_footer', 'wp_admin_bar_render', 1000 );
	remove_action( 'admin_head', 'wp_admin_bar_render', 1000 );
	remove_filter( 'admin_head', 'wp_admin_bar_render', 1000 );
	remove_action( 'admin_footer', 'wp_admin_bar_render', 1000 );
	remove_filter( 'admin_footer', 'wp_admin_bar_render', 1000 );
	remove_action( 'admin_footer', 'wp_admin_bar_render' );
	remove_filter( 'admin_footer', 'wp_admin_bar_render' );
	remove_action( 'wp_ajax_adminbar_render', 'wp_admin_bar_ajax_render', 1000 );
	remove_filter( 'wp_ajax_adminbar_render', 'wp_admin_bar_ajax_render', 1000 );
	remove_action( 'wp_ajax_adminbar_render', 'wp_admin_bar_ajax_render' );
	remove_filter( 'wp_ajax_adminbar_render', 'wp_admin_bar_ajax_render' );
	remove_action('wp_head', '_admin_bar_bump_cb');
}