<?php // Meta Options ( WPShout.com )

require( ghostpool_inc . 'options.php' );

add_action( 'admin_menu', 'ghostpool_create_meta_box' );
add_action( 'save_post', 'ghostpool_save_meta_data' );

function ghostpool_create_meta_box() {
	add_meta_box( 'gp-theme-options', esc_html__( 'Post Settings', 'buddy' ), 'ghostpool_meta_boxes', 'post', 'normal', 'core' );
	add_meta_box( 'gp-theme-options', esc_html__( 'Page Settings', 'buddy' ), 'ghostpool_meta_boxes', 'page', 'normal', 'core' );
	add_meta_box( 'gp-theme-options', esc_html__( 'Slide Settings', 'buddy' ), 'ghostpool_meta_boxes', 'slide', 'normal', 'core' );	
}


/////////////////////////////////////// Post Settings ///////////////////////////////////////


function ghostpool_post_meta_boxes() {
	
	global $dirname;
	
	$meta_boxes = array( 

	'thumbnail_settings' => array( 'name' => 'thumbnail_settings', 'type' => 'open', 'desc' => esc_html__( 'Controls the thumbnails used on category, archive, tag and search result pages.', 'buddy' ), 'title' => esc_html__( 'Thumbnail Settings', 'buddy' ) ),
	
		'_' . $dirname . '_thumbnail_width' => array( 'name' => '_' . $dirname . '_thumbnail_width', 'title' => esc_html__( 'Thumbnail Width', 'buddy' ), 'desc' => esc_html__( 'The width to crop the thumbnail to (set to 0 to have a proportionate width).', 'buddy' ), 'type' => 'text', 'size' => 'small', 'details' => 'px' ),	
				
		'_' . $dirname . '_thumbnail_height' => array( 'name' => '_' . $dirname . '_thumbnail_height', 'title' => esc_html__( 'Thumbnail Height', 'buddy' ), 'desc' => esc_html__( 'The height to crop the thumbnail to (set to 0 to have a proportionate height).', 'buddy' ), 'type' => 'text', 'size' => 'small', 'details' => 'px' ),	

	array( 'type' => 'separator' ),		
	array( 'type' => 'close' ),

	'image_settings' => array( 'name' => 'image_settings', 'type' => 'open', 'desc' => esc_html__( 'Controls the featured image displayed within this page.', 'buddy' ), 'title' => esc_html__( 'Image Settings', 'buddy' ) ),

		'_' . $dirname . '_show_image' => array( 'name' => '_' . $dirname . '_show_image', 'title' => esc_html__( 'Featured Image', 'buddy' ), 'desc' => esc_html__( 'Choose whether to display the featured image within your page.', 'buddy' ), 'options' => array( 'Default' => esc_html__( 'Default', 'buddy' ), 'Show' => esc_html__( 'Show', 'buddy' ), 'Hide' => esc_html__( 'Hide', 'buddy' ) ), 'std' => 'Default', 'type' => 'select' ),	
		
		'_' . $dirname . '_image_width' => array( 'name' => '_' . $dirname . '_image_width', 'title' => esc_html__( 'Image Width', 'buddy' ), 'desc' => esc_html__( 'The width to crop the image to (set to 0 to have a proportionate width).', 'buddy' ), 'type' => 'text', 'size' => 'small', 'details' => 'px' ),
				
		'_' . $dirname . '_image_height' => array( 'name' => '_' . $dirname . '_image_height', 'title' => esc_html__( 'Image Height', 'buddy' ), 'desc' => esc_html__( 'The height to crop the image to (set to 0 to have a proportionate height).', 'buddy' ), 'type' => 'text', 'size' => 'small', 'details' => 'px' ),

		'_' . $dirname . '_image_wrap' => array( 'name' => '_' . $dirname . '_image_wrap', 'title' => esc_html__( 'Image Wrap', 'buddy' ), 'desc' => esc_html__( 'Choose whether the page content wraps around the featured image.', 'buddy' ), 'options' => array( 'Default' => esc_html__( 'Default', 'buddy' ), 'Enable' => esc_html__( 'Enable', 'buddy' ), 'Disable' => esc_html__( 'Disable', 'buddy' ) ), 'std' => 'Default', 'type' => 'select' ),	
		
		array( 'type' => 'divider', 'name' => '' ),	
		
		'_' . $dirname . '_hard_crop' => array( 'name' => '_' . $dirname . '_hard_crop', 'title' => esc_html__( 'Hard Crop', 'buddy' ), 'desc' => esc_html__( 'Choose whether the image is hard cropped.', 'buddy' ), 'options' => array( 'Default' => esc_html__( 'Default', 'buddy' ), 'Enable' => esc_html__( 'Enable', 'buddy' ), 'Disable' => esc_html__( 'Disable', 'buddy' ) ), 'std' => 'Default', 'type' => 'select' ),	
						
	array( 'type' => 'separator' ),		
	array( 'type' => 'close' ),
		
	'portfolio_settings' => array( 'name' => 'portfolio_settings', 'type' => 'open', 'desc' => esc_html__( 'Can be used when your posts are displayed in [posts] shortcodes.', 'buddy' ), 'title' => esc_html__( 'Portfolio Settings', 'buddy' ) ),
		
		'_' . $dirname . '_link_type' => array( 'name' => '_' . $dirname . '_link_type', 'title' => esc_html__( 'Link Type', 'buddy' ), 'desc' => esc_html__( 'Choose how your portfolio link opens.', 'buddy' ), 'options' => array( 'Page' => esc_html__( 'Page', 'buddy' ), 'Lightbox Image' => esc_html__( 'Lightbox Image', 'buddy' ), 'Lightbox Video' => esc_html__( 'Lightbox Video', 'buddy' ), 'None' => esc_html__( 'None', 'buddy' ) ), 'std' => 'Page', 'type' => 'select' ),
	
		'_' . $dirname . '_custom_url' => array( 'name' => '_' . $dirname . '_custom_url', 'title' => esc_html__( 'Custom URL', 'buddy' ), 'desc' => esc_html__( 'A custom URL which your image links to ( overrides the default post URL ).', 'buddy' ), 'type' => 'text' ),
		
		'_' . $dirname . '_lightbox_content' => array( 'name' => '_' . $dirname . '_lightbox_content', 'title' => esc_html__( 'Lightbox Content', 'buddy' ), 'desc' => esc_html__( 'Upload images/audio/videos that will be opened in the lightbox.', 'buddy' ), 'type' => 'gallery' ),
		
		array( 'type' => 'separator' ),		
		array( 'type' => 'close' ),
		
	'format_settings' => array( 'name' => 'format_settings', 'type' => 'open', 'desc' => esc_html__( 'General formatting settings.', 'buddy' ), 'title' => esc_html__( 'Format Settings', 'buddy' ) ),
				
		'_' . $dirname . '_sidebar_left' => array( 'name' => '_' . $dirname . '_sidebar_left', 'title' => esc_html__( 'Left Sidebar', 'buddy' ), 'desc' => esc_html__( 'Choose which sidebar area to display on this page.', 'buddy' ), 'std' => 'Default', 'type' => 'select_sidebar' ),

		'_' . $dirname . '_sidebar_right' => array( 'name' => '_' . $dirname . '_sidebar_right', 'title' => esc_html__( 'Right Sidebar', 'buddy' ), 'desc' => esc_html__( 'Choose which sidebar area to display on this page.', 'buddy' ), 'std' => 'Default', 'type' => 'select_sidebar' ),

		'_' . $dirname . '_layout' => array( 'name' => '_' . $dirname . '_layout', 'title' => esc_html__( 'Layout', 'buddy' ), 'desc' => esc_html__( 'Choose the layout for this page.', 'buddy' ), 'options' => array( 'Default' => esc_html__( 'Default', 'buddy' ), 'sb-left' => esc_html__( 'Sidebar Left', 'buddy' ), 'sb-right' => esc_html__( 'Sidebar Right', 'buddy' ), 'sb-both' => esc_html__( 'Sidebar Left & Right', 'buddy' ), 'fullwidth' => esc_html__( 'Fullwidth', 'buddy' ) ), 'std' => 'Default', 'type' => 'select' ),
						
		'_' . $dirname . '_title' => array( 'name' => '_' . $dirname . '_title', 'title' => esc_html__( 'Title', 'buddy' ), 'desc' => esc_html__( 'Choose whether to display the title on this page.', 'buddy' ), 'options' => array( 'Default' => esc_html__( 'Default', 'buddy' ), 'Show' => esc_html__( 'Show', 'buddy' ), 'Hide' => esc_html__( 'Hide', 'buddy' ) ), 'std' => 'Default', 'type' => 'select' ),

		array( 'type' => 'divider' ),
				
		'_' . $dirname . '_custom_stylesheet' => array( 'name' => '_' . $dirname . '_custom_stylesheet', 'title' => esc_html__( 'Custom Stylesheet URL', 'buddy' ), 'desc' => esc_html__( 'Enter the relative URL to your custom stylesheet e.g. lib/css/custom-style.css', 'buddy' ), 'type' => 'text' ),
		
	array( 'type' => 'close' ),	
	array( 'type' => 'clear' ),
	
	 );

	return apply_filters( '_' . $dirname . '_post_meta_boxes', $meta_boxes );
}


/////////////////////////////////////// Page Settings ///////////////////////////////////////


function ghostpool_page_meta_boxes() {
	
	global $dirname;

	$meta_boxes = array( 
	
	'thumbnail_settings' => array( 'name' => 'thumbnail_settings', 'type' => 'open', 'desc' => esc_html__( 'Controls the thumbnails used on category, archive, tag and search result pages.', 'buddy' ), 'title' => esc_html__( 'Thumbnail Settings', 'buddy' ) ),
		
		'_' . $dirname . '_thumbnail_width' => array( 'name' => '_' . $dirname . '_thumbnail_width', 'title' => esc_html__( 'Thumbnail Width', 'buddy' ), 'desc' => esc_html__( 'The width to crop the thumbnail to (set to 0 to have a proportionate width ).', 'buddy' ), 'type' => 'text', 'size' => 'small', 'details' => 'px' ),	
				
		'_' . $dirname . '_thumbnail_height' => array( 'name' => '_' . $dirname . '_thumbnail_height', 'title' => esc_html__( 'Thumbnail Height', 'buddy' ), 'desc' => esc_html__( 'The height to crop the thumbnail to (set to 0 to have a proportionate height).', 'buddy' ), 'type' => 'text', 'size' => 'small', 'details' => 'px' ),	

	array( 'type' => 'separator' ),		
	array( 'type' => 'close' ),

	'image_settings' => array( 'name' => 'image_settings', 'type' => 'open', 'desc' => esc_html__( 'Controls the featured image displayed within this page.', 'buddy' ), 'title' => esc_html__( 'Image Settings', 'buddy' ) ),

		'_' . $dirname . '_show_image' => array( 'name' => '_' . $dirname . '_show_image', 'title' => esc_html__( 'Featured Image', 'buddy' ), 'desc' => esc_html__( 'Choose whether to display the featured image within your page.', 'buddy' ), 'options' => array( 'Default' => esc_html__( 'Default', 'buddy' ), 'Show' => esc_html__( 'Show', 'buddy' ), 'Hide' => esc_html__( 'Hide', 'buddy' ) ), 'std' => 'Default', 'type' => 'select' ),	
		
		'_' . $dirname . '_image_width' => array( 'name' => '_' . $dirname . '_image_width', 'title' => esc_html__( 'Image Width', 'buddy' ), 'desc' => esc_html__( 'The width to crop the image to (set to 0 to have a proportionate width ).', 'buddy' ), 'type' => 'text', 'size' => 'small', 'details' => 'px' ),
				
		'_' . $dirname . '_image_height' => array( 'name' => '_' . $dirname . '_image_height', 'title' => esc_html__( 'Image Height', 'buddy' ), 'desc' => esc_html__( 'The height to crop the image to (set to 0 to have a proportionate height).', 'buddy' ), 'type' => 'text', 'size' => 'small', 'details' => 'px' ),

		'_' . $dirname . '_image_wrap' => array( 'name' => '_' . $dirname . '_image_wrap', 'title' => esc_html__( 'Image Wrap', 'buddy' ), 'desc' => esc_html__( 'Choose whether the page content wraps around the featured image.', 'buddy' ), 'options' => array( 'Default' => esc_html__( 'Default', 'buddy' ), 'Enable' => esc_html__( 'Enable', 'buddy' ), 'Disable' => esc_html__( 'Disable', 'buddy' ) ), 'std' => 'Default', 'type' => 'select' ),	
		
		array( 'type' => 'divider', 'name' => '' ),	
		
		'_' . $dirname . '_hard_crop' => array( 'name' => '_' . $dirname . '_hard_crop', 'title' => esc_html__( 'Hard Crop', 'buddy' ), 'desc' => esc_html__( 'Choose whether the image is hard cropped.', 'buddy' ), 'options' => array( 'Default' => esc_html__( 'Default', 'buddy' ), 'Enable' => esc_html__( 'Enable', 'buddy' ), 'Disable' => esc_html__( 'Disable', 'buddy' ) ), 'std' => 'Default', 'type' => 'select' ),	
					
	array( 'type' => 'separator' ),		
	array( 'type' => 'close' ),
		
	'format_settings' => array( 'name' => 'format_settings', 'type' => 'open', 'desc' => esc_html__( 'General formatting settings.', 'buddy' ), 'title' => esc_html__( 'Format Settings', 'buddy' ) ),

		'_' . $dirname . '_sidebar_left' => array( 'name' => '_' . $dirname . '_sidebar_left', 'title' => esc_html__( 'Left Sidebar', 'buddy' ), 'desc' => esc_html__( 'Choose which sidebar area to display on this page.', 'buddy' ), 'std' => 'Default', 'type' => 'select_sidebar' ),

		'_' . $dirname . '_sidebar_right' => array( 'name' => '_' . $dirname . '_sidebar_right', 'title' => esc_html__( 'Right Sidebar', 'buddy' ), 'desc' => esc_html__( 'Choose which sidebar area to display on this page.', 'buddy' ), 'std' => 'Default', 'type' => 'select_sidebar' ),

		'_' . $dirname . '_layout' => array( 'name' => '_' . $dirname . '_layout', 'title' => esc_html__( 'Layout', 'buddy' ), 'desc' => esc_html__( 'Choose the layout for this page.', 'buddy' ), 'options' => array( 'Default' => esc_html__( 'Default', 'buddy' ), 'sb-left' => esc_html__( 'Sidebar Left', 'buddy' ), 'sb-right' => esc_html__( 'Sidebar Right', 'buddy' ), 'sb-both' => esc_html__( 'Sidebar Left & Right', 'buddy' ), 'fullwidth' => esc_html__( 'Fullwidth', 'buddy' ) ), 'std' => 'Default', 'type' => 'select' ),
				
		'_' . $dirname . '_title' => array( 'name' => '_' . $dirname . '_title', 'title' => esc_html__( 'Title', 'buddy' ), 'desc' => esc_html__( 'Choose whether to display the title on this page.', 'buddy' ), 'options' => array( 'Default' => esc_html__( 'Default', 'buddy' ), 'Show' => esc_html__( 'Show', 'buddy' ), 'Hide' => esc_html__( 'Hide', 'buddy' ) ), 'std' => 'Default', 'type' => 'select' ),
		
		array( 'type' => 'divider' ),
		
		'_' . $dirname . '_custom_stylesheet' => array( 'name' => '_' . $dirname . '_custom_stylesheet', 'title' => esc_html__( 'Custom Stylesheet URL', 'buddy' ), 'desc' => esc_html__( 'Enter the relative URL to your custom stylesheet e.g. lib/css/custom-style.css', 'buddy' ), 'type' => 'text' ),
	
	array( 'type' => 'close' ),	
	array( 'type' => 'clear' ),
	
	 );

	return apply_filters( '_' . $dirname . '_page_meta_boxes', $meta_boxes );
}


/////////////////////////////////////// Slide Settings ///////////////////////////////////////

	 
function ghostpool_slide_meta_boxes() {
	
	global $dirname;
	
	$meta_boxes = array( 

	'general_settings' => array( 'name' => 'general_settings', 'type' => 'open', 'desc' => esc_html__( 'General slide settings.', 'buddy' ), 'title' => esc_html__( 'Format Settings', 'buddy' ) ),
		
		'_' . $dirname . '_custom_url' => array( 'name' => '_' . $dirname . '_custom_url', 'title' => esc_html__( 'Slide URL', 'buddy' ), 'desc' => esc_html__( 'Enter the URL you want your slide to link to.', 'buddy' ), 'type' => 'text' ),

		'_' . $dirname . '_link_type' => array( 'name' => '_' . $dirname . '_link_type', 'title' => esc_html__( 'Link Type', 'buddy' ), 'desc' => esc_html__( 'Choose how your slide links to the URL you provided to the left.', 'buddy' ), 'options' => array( 'Page' => esc_html__( 'Page', 'buddy' ), 'Lightbox Image' => esc_html__( 'Lightbox Image', 'buddy' ), 'Lightbox Video' => esc_html__( 'Lightbox Video', 'buddy' ), 'None' => esc_html__( 'None', 'buddy' ) ), 'std' => 'Page', 'type' => 'select' ),
		
	array( 'type' => 'separator' ),		
	array( 'type' => 'close' ),
	
	'video_settings' => array( 'name' => 'video_settings', 'type' => 'open', 'desc' => esc_html__( 'The settings for a video used in this slide.', 'buddy' ), 'title' => esc_html__( 'Video Settings', 'buddy' ) ),
	
		'_' . $dirname . '_slide_video' => array( 'name' => '_' . $dirname . '_slide_video', 'title' => esc_html__( 'Video URL', 'buddy' ), 'desc' => esc_html__( 'The URL of your video or audio file ( YouTube/Vimeo/FLV/MP4/M4V/MP3 ).', 'buddy' ), 'type' => 'upload' ),

		'_' . $dirname . '_webm_mp4_slide_video' => array( 'name' => '_' . $dirname . '_webm_mp4_slide_video', 'title' => esc_html__( 'HTML5 Video URL ( Safari/Chrome )', 'buddy' ), 'desc' => esc_html__( 'Enter your HTML5 video URL for Safari/Chrome ( WEBM/MP4 ).', 'buddy' ), 'type' => 'upload' ),

		'_' . $dirname . '_ogg_slide_video' => array( 'name' => '_' . $dirname . '_ogg_slide_video', 'title' => esc_html__( 'HTML5 Video URL ( FireFox/Opera )', 'buddy' ), 'desc' => esc_html__( 'Enter your HTML5 video URL for FireFox/Opera ( OGG/OGV ).', 'buddy' ), 'type' => 'upload' ),
				
		'_' . $dirname . '_slide_autostart_video' => array( 'name' => '_' . $dirname . '_slide_autostart_video', 'title' => esc_html__( 'Autostart Video', 'buddy' ), 'desc' => esc_html__( 'Plays the video automatically when the slide comes into view ( works in the first slide only ).', 'buddy' ), 'type' => 'checkbox' ),

		array( 'type' => 'divider' ),
		
		'_' . $dirname . '_slide_video_priority' => array( 'name' => '_' . $dirname . '_slide_video_priority', 'title' => esc_html__( 'Video Priority', 'buddy' ), 'desc' => esc_html__( 'If you have provided both flash and HTML5 videos, select which one will take priority if the browser can play both.', 'buddy' ), 'options' => array( 'Flash' => esc_html__( 'Flash', 'buddy' ), 'HTML5' => esc_html__( 'HTML5', 'buddy' ) ), 'std' => 'Flash', 'type' => 'select' ),
		
		'_' . $dirname . '_slide_video_controls' => array( 'name' => '_' . $dirname . '_slide_video_controls', 'title' => esc_html__( 'Video Controls', 'buddy' ), 'desc' => esc_html__( 'Choose how to display the video controls ( does not apply to YouTube and Vimeo videos ).', 'buddy' ), 'options' => array( 'None' => esc_html__( 'None', 'buddy' ), 'Bottom' => esc_html__( 'Bottom', 'buddy' ), 'Over' => esc_html__( 'Over', 'buddy' ) ), 'std' => 'None', 'type' => 'select' ),
		
	array( 'type' => 'separator' ),		
	array( 'type' => 'close' ),
	
	'caption_settings' => array( 'name' => 'caption_settings', 'type' => 'open', 'desc' => esc_html__( 'The settings for a caption in this slide.', 'buddy' ),  'title' => esc_html__( 'Caption Settings', 'buddy' ) ),
		
		'_' . $dirname . '_slide_title' => array( 'name' => '_' . $dirname . '_slide_title', 'title' => esc_html__( 'Hide Slide Caption Title', 'buddy' ), 'desc' => esc_html__( 'Hide the slide caption title.', 'buddy' ), 'type' => 'checkbox' ),

		'_' . $dirname . '_slide_caption_position' => array( 'name' => '_' . $dirname . '_slide_caption_position', 'title' => esc_html__( 'Caption Position', 'buddy' ), 'desc' => esc_html__( 'Choose the caption position.', 'buddy' ), 'options' => array( 'caption-topleft' => esc_html__( 'Top Left', 'buddy' ), 'caption-topright' => esc_html__( 'Top Right', 'buddy' ), 'caption-bottomleft' => esc_html__( 'Bottom Left', 'buddy' ), 'caption-bottomright' => esc_html__( 'Bottom Right', 'buddy' ) ), 'type' => 'select', 'std' => 'caption-bottomright' ),
							
	array( 'type' => 'close' ),
	array( 'type' => 'clear' ),	
	
	 );

	return apply_filters( '_' . $dirname . '_slide_meta_boxes', $meta_boxes );
}


/////////////////////////////////////// Meta Fields ///////////////////////////////////////

function ghostpool_meta_boxes() {
	global $post;
	
	if ( get_post_type() == 'post' ) {
		$meta_boxes = ghostpool_post_meta_boxes();	
	} elseif ( get_post_type() == 'slide' ) {
		$meta_boxes = ghostpool_slide_meta_boxes();		
	} else {
		$meta_boxes = ghostpool_page_meta_boxes();
	}
	
	foreach( $meta_boxes as $meta ) :
	if ( isset( $meta['name'] ) ) { $value = get_post_meta( $post->ID, $meta['name'], true ); }
	if ( $meta['type'] == 'text' )
		get_meta_text( $meta, $value );	
	elseif ( $meta['type'] == 'upload' )
		get_meta_upload( $meta, $value );				
	elseif ( $meta['type'] == 'textarea' )
		get_meta_textarea( $meta, $value );
	elseif ( $meta['type'] == 'select' )
		get_meta_select( $meta, $value );
	elseif ( $meta['type'] == 'select_sidebar' )
		get_meta_select_sidebar( $meta, $value );			
	elseif ( $meta['type'] == 'checkbox' )
		get_meta_checkbox( $meta, $value );			
	elseif ( $meta['type'] == 'open' )
		get_meta_open( $meta, $value );		
	elseif ( $meta['type'] == 'close' )
		get_meta_close( $meta, $value );
	elseif ( $meta['type'] == 'divider' )
		get_meta_divider( $meta, $value );	
	elseif ( $meta['type'] == 'separator' )
		get_meta_separator( $meta, $value );					
	elseif ( $meta['type'] == 'clear' )
		get_meta_clear( $meta, $value );
	elseif ( $meta['type'] == 'gallery' )
		get_meta_gallery( $meta, $value );
	elseif ( $meta['type'] == 'colorpicker' )
		get_meta_colorpicker( $meta, $value );				
	endforeach;
		
} function get_meta_open( $args = array(), $value = false, $title = false ) {
extract( $args ); ?>
	
	<div class="meta-settings" id="<?php echo sanitize_html_class( $name ); ?>">
	
		<div class="gp-meta-section-title"><?php echo $title; ?></div>
		<div class="clear"></div>
	
		<?php if ( $desc ) { ?><div class="meta-settings-desc"><?php echo $desc; ?></div><div class="clear"></div><?php } ?>
	
		<input type="hidden" name="<?php echo sanitize_html_class( $name ); ?>_noncename" id="<?php echo sanitize_html_class( $name ); ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />		
	
	
<?php } function get_meta_close( $args = array(), $value = false ) {
extract( $args ); ?>
	
	</div><div class="clear"></div>
	
	<input type="hidden" name="_noncename" id="_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />		
	
	
<?php } function get_meta_divider( $args = array(), $value = false ) {
extract( $args ); ?>

	<div class="clear"></div>
	<div class="divider"></div>
	<input type="hidden" name="_noncename" id="_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />		


<?php } function get_meta_separator( $args = array(), $value = false ) {
extract( $args ); ?>
	
	<div class="clear"></div>
	<div class="separator"></div>
	<input type="hidden" name="_noncename" id="_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />		
	
	
<?php } function get_meta_clear( $args = array(), $value = false ) {
extract( $args ); ?>
	
	<div class="clear"></div>
	<input type="hidden" name="_noncename" id="_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />		
	
	
<?php } function get_meta_text( $args = array(), $value = false, $desc = false, $details = false, $size = '', $std = '', $title = false ) {
extract( $args ); global $post; ?>

	<div id="meta-box-<?php echo sanitize_html_class( $name ); ?>" class="meta-box<?php if ( $size == "small" ) { ?> text-small<?php } ?>">
		<?php if ( $title ) { ?><strong><?php echo $title; ?></strong><br/><?php } ?>
		<input type="text" name="<?php echo sanitize_html_class( $name ); ?>" id="<?php echo sanitize_html_class( $name ); ?>" value="<?php if ( $value != '' ) { echo esc_html( $value, 1 ); } else { echo $std; } ?>" size="<?php if ( $size == "small" ) { ?>3<?php } else { ?>30<?php } ?>" /><?php if ( $details ) { ?> <span><?php echo $details; ?></span><?php } ?>
		<?php if ( $desc ) { ?><div class="meta-box-desc"><?php echo $desc; ?></div><?php } ?>
		<input type="hidden" name="<?php echo sanitize_html_class( $name ); ?>_noncename" id="<?php echo sanitize_html_class( $name ); ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
	</div>


<?php } function get_meta_upload( $args = array(), $value = false, $desc = false, $std = '', $title = false ) {
extract( $args ); global $post; ?>

	<div id="meta-box-<?php echo sanitize_html_class( $name ); ?>" class="meta-box uploader">
		<?php if ( $title ) { ?><strong><?php echo $title; ?></strong><br/><?php } ?>
		<input type="text" name="<?php echo sanitize_html_class( $name ); ?>" id="<?php echo sanitize_html_class( $name ); ?>" class="upload" value="<?php if ( $value != '' ) { echo esc_html( $value, 1 ); } else { echo $std; } ?>" size="30" />
		<input type="button" id="<?php echo sanitize_html_class( $name ); ?>_button" class="upload-image-button button" value="<?php esc_html_e( 'Upload', 'buddy' ); ?>" />
		<?php if ( $desc ) { ?><div class="meta-box-desc"><?php echo $desc; ?></div><?php } ?>
		<input type="hidden" name="<?php echo sanitize_html_class( $name ); ?>_noncename" id="<?php echo sanitize_html_class( $name ); ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
	</div>
	
	
<?php } function get_meta_select( $args = array(), $value = false, $desc = false, $std = '', $title = false  ) {
extract( $args ); ?>
	
	<div id="meta-box-<?php echo sanitize_html_class( $name ); ?>" class="meta-box">
		<?php if ( $title ) { ?><strong><?php echo $title; ?></strong><br/><?php } ?>
		<select name="<?php echo sanitize_html_class( $name ); ?>" id="<?php echo sanitize_html_class( $name ); ?>">
		<?php foreach( $options as $key=>$option ) : ?>
			<?php if ( $value != '' ) { ?>
				<option value="<?php echo $key; ?>" <?php if ( htmlentities( $value, ENT_QUOTES ) == $key ) echo ' selected="selected"'; ?>><?php echo $option; ?></option>
			<?php } else { ?>
				<option value="<?php echo $key; ?>" <?php if ( $std == $key ) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
			<?php } ?>	
		<?php endforeach; ?>
		</select>
		<?php if ( $desc ) { ?><div class="meta-box-desc"><?php echo $desc; ?></div><?php } ?>
		<input type="hidden" name="<?php echo sanitize_html_class( $name ); ?>_noncename" id="<?php echo sanitize_html_class( $name ); ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
	</div>


<?php } function get_meta_select_sidebar( $args = array(), $value = false, $desc = false, $std = '', $title = false ) {
extract( $args ); global $post, $wp_registered_sidebars; ?>

	<div id="meta-box-<?php echo sanitize_html_class( $name ); ?>" class="meta-box">
		<?php if ( $title ) { ?><strong><?php echo $title; ?></strong><br/><?php } ?>
		<select name="<?php echo sanitize_html_class( $name ); ?>" id="<?php echo sanitize_html_class( $name ); ?>">
			<option value="Default" <?php if ( htmlentities( $value, ENT_QUOTES ) == 'Default' ) echo ' selected="selected"'; ?>><?php esc_html_e( 'Default', 'buddy' ); ?></option>
			<?php $sidebars = $wp_registered_sidebars;
			if ( is_array( $sidebars ) && !empty( $sidebars ) ) { foreach( $sidebars as $sidebar ) { if ( $value != '' ) { ?>
				<option value="<?php echo $sidebar['id']; ?>"<?php if ( $value == $sidebar['id'] ) { echo ' selected="selected"'; } ?>><?php echo $sidebar['name']; ?></option>
			<?php } else { ?>
				<option value="<?php echo $sidebar['id']; ?>"<?php if ( $std == $sidebar['id'] ) { echo ' selected="selected"'; } ?>><?php echo $sidebar['name']; ?></option>
			<?php }}} ?>
		</select>
		<?php if ( $desc ) { ?><div class="meta-box-desc"><?php echo $desc; ?></div><?php } ?>
		<input type="hidden" name="<?php echo sanitize_html_class( $name ); ?>_noncename" id="<?php echo sanitize_html_class( $name ); ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
	</div>
	
		
<?php } function get_meta_textarea( $args = array(), $value = false, $desc = false, $size = '', $std = '', $title = false ) {
extract( $args ); ?>

	<div id="meta-box-<?php echo sanitize_html_class( $name ); ?>" class="meta-box<?php if ( $size == "large" ) { ?> text-large<?php } ?>">	
		<?php if ( $title ) { ?><strong><?php echo $title; ?></strong><br/><?php } ?>
		<textarea name="<?php echo sanitize_html_class( $name ); ?>" id="<?php echo sanitize_html_class( $name ); ?>" cols="60" rows="4" tabindex="30"><?php if ( $value != '' ) { echo esc_html( $value, 1 ); } else { echo $std; } ?></textarea>
		<?php if ( $desc ) { ?><div class="meta-box-desc"><?php echo $desc; ?></div><?php } ?>
		<input type="hidden" name="<?php echo sanitize_html_class( $name ); ?>_noncename" id="<?php echo sanitize_html_class( $name ); ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
	</div>


<?php } function get_meta_checkbox( $args = array(), $value = false, $desc = false, $std = '', $title = false ) {
extract( $args ); ?>

	<div id="meta-box-<?php echo sanitize_html_class( $name ); ?>" class="meta-box">
		<?php if ( $title ) { ?><strong><?php echo $title; ?></strong><?php } ?>
		<?php if ( esc_html( $value, 1 ) ) { $checked = 'checked="checked"'; } else { if ( $std === 'true' ) { $checked = 'checked="checked"'; } else { $checked = ''; } } ?>
		<input type="checkbox" name="<?php echo sanitize_html_class( $name ); ?>" id="<?php echo sanitize_html_class( $name ); ?>" value='false' <?php echo $checked; ?> />
		<?php if ( $desc ) { ?><div class="meta-box-desc"><?php echo $desc; ?></div><?php } ?>
		<input type="hidden" name="<?php echo sanitize_html_class( $name ); ?>_noncename" id="<?php echo sanitize_html_class( $name ); ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />		
	</div>
	

<?php } function get_meta_gallery( $args = array(), $value = false, $desc = false, $title = false ) {
extract( $args ); global $post; ?>

	<div id="meta-box-<?php echo sanitize_html_class( $name ); ?>" class="meta-box">
	
		<?php if ( $title ) { ?><strong><?php echo $title; ?></strong><?php } ?>
		<div class="clear"></div>
			
		<div id="wp-content-media-buttons" class="wp-media-buttons" style="margin-top: 5px;">
			<a href="#" class="button insert-media add_media" data-editor="content" title="<?php esc_html_e( 'Add Media', 'buddy' ); ?>"><span class="wp-media-buttons-icon"></span> <?php esc_html_e( 'Add Media', 'buddy' ); ?></a>
		</div>
		
		<div class="clear"></div>
		
		<?php if ( $desc ) { ?><div class="meta-box-desc"><?php echo $desc; ?></div><?php } ?>
		
		<?php $gp_image_url = site_url().'/wp-includes/images/crystal/video.png';
		$args = array( 'post_type' => 'attachment', 'post_parent' => $post->ID, 'numberposts' => -1, 'orderby' => 'date', 'order' => 'desc', 'post__not_in' => array( get_post_thumbnail_id() ) ); $attachments = get_children( $args ); ?>		
		<?php if ( $attachments ) { foreach ( $attachments as $attachment ) { ?>
			<?php if ( $attachment->post_mime_type == 'image/jpeg' OR $attachment->post_mime_type == 'image/jpg' OR $attachment->post_mime_type == 'image/png' OR $attachment->post_mime_type == 'image/gif' ) { $gp_image = aq_resize( wp_get_attachment_url( $attachment->ID ), 100, 100, true, true, true ); } else { $gp_image = site_url().'/wp-includes/images/crystal/video.png'; } ?>
			<img src="<?php echo $gp_image; ?>" width="50" height="50" alt="" style="margin-top: 5px;" />
		<?php }} ?>		
		<input type="hidden" name="<?php echo sanitize_html_class( $name ); ?>_noncename" id="<?php echo sanitize_html_class( $name ); ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
	
	</div>
	

<?php } function get_meta_colorpicker( $args = array(), $value = false, $desc = false, $std = '', $title = false ) {
extract( $args ); ?>

	<div id="meta-box-<?php echo sanitize_html_class( $name ); ?>" class="meta-box">
		<script type="text/javascript">
			jQuery( document ).ready( function( $ ){  
				$( "#<?php echo sanitize_html_class( $name ); ?>" ).wpColorPicker();
			} );
		</script>
		<?php if ( $title ) { ?><strong><?php echo $title; ?></strong><br/><?php } ?>
		<input type="text" name="<?php echo sanitize_html_class( $name ); ?>" id="<?php echo sanitize_html_class( $name ); ?>" value="<?php if ( $value != '' ) { echo $value; } else { echo $std; } ?>" />
		<?php if ( $desc ) { ?><div class="meta-box-desc"><?php echo $desc; ?></div><?php } ?>
		<input type="hidden" name="<?php echo sanitize_html_class( $name ); ?>_noncename" id="<?php echo sanitize_html_class( $name ); ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
	</div>


<?php }

if ( $pagenow == "post.php" OR $pagenow == "post-new.php" ) {	
	function ghostpool_admin_scripts() {	
		wp_enqueue_style( 'gp-admin-css', ghostpool_css_uri . 'admin.css' );
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );
		if ( !has_action( 'admin_footer', 'wp_print_media_templates' ) ) wp_enqueue_media();
		wp_enqueue_script( 'gp-uploader', ghostpool_scripts_uri . 'uploader.js' );
	}	
	add_action( 'admin_enqueue_scripts', 'ghostpool_admin_scripts' );
}

function ghostpool_save_meta_data( $post_id ) {
	global $post;

	if ( isset( $_POST['post_type'] ) && 'post' == $_POST['post_type'] )
		$meta_boxes = array_merge( ghostpool_post_meta_boxes() );
	elseif ( isset( $_POST['post_type'] ) && 'slide' == $_POST['post_type'] )
		$meta_boxes = array_merge( ghostpool_slide_meta_boxes() );	
	else
		$meta_boxes = array_merge( ghostpool_page_meta_boxes() );
				
	foreach ( $meta_boxes as $meta_box ) :
		
		if ( isset( $meta_box['name'] ) ) {
			if ( ! isset( $_POST[$meta_box['name'] . '_noncename'] ) OR ! wp_verify_nonce( $_POST[$meta_box['name'] . '_noncename'], plugin_basename( __FILE__ ) ) )
				return $post_id;
		}
		
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
			return $post_id;
      
		if ( !current_user_can( 'edit_post', $post_id ) )
			return $post_id;
					
		$data = sanitize_text_field( $_POST[$meta_box['name']] );

		if ( isset( $meta_box['name'] ) ) {

			if ( get_post_meta( $post_id, $meta_box['name'] ) == '' )
				add_post_meta( $post_id, $meta_box['name'], $data, true );

			elseif ( $data != get_post_meta( $post_id, $meta_box['name'], true ) )
				update_post_meta( $post_id, $meta_box['name'], $data );

			elseif ( $data == '' )
				delete_post_meta( $post_id, $meta_box['name'], get_post_meta( $post_id, $meta_box['name'], true ) );
				
		}
		
	endforeach;
}

?>