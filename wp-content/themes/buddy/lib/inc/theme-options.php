<?php

$page_handle = $dirname . '-options';
$options = array( 

array( 	"name" => esc_html__( 'General', 'buddy' ),
      	"type" => "title" ),

		array( 	"type" => "open",
      	"id" => $dirname . "_general_settings" ),
 
		array( 
		"name" => esc_html__( 'General', 'buddy' ),
		"type" => "header",
      	"id" => $dirname . "_general_header",
      	"desc" => esc_html__( 'This section controls the general settings for the theme.', 'buddy' )
      	 ),

  		array( "type" => "divider" ),
  		
		array(  
			'name' => esc_html__( 'Fixed Header', 'buddy' ),
			'desc' => esc_html__( 'The header stays at the top of the screen as you scroll down the page.', 'buddy' ),
			'type' => 'radio',
			'id' => $dirname . '_fixed_header',
			'options' => array( 
				'gp-fixed-header' => esc_html__( 'Enabled', 'buddy' ),
				'gp-relative-header' => esc_html__( 'Disabled', 'buddy' )
			 ),
			'std' => 'gp-fixed-header',
        ),
                		
		array( 'type' => 'divider' ),
				
		array( 
		"name" => esc_html__( 'Logo ', 'buddy' ),
        "desc" => esc_html__( 'Upload your own logo.', 'buddy' ),
        "id" => $dirname . "_logo",
        "type" => "upload" ),

		array( 
		"name" => esc_html__( 'Logo Width', 'buddy' ),
        "desc" => esc_html__( 'Enter the logo width (set to half the original logo width for retina displays).', 'buddy' ),
        "id" => $dirname . "_logo_width",
        "type" => "text",
		"size" => "small",
		"details" => "px" ),

		array( 
		"name" => esc_html__( 'Logo Height', 'buddy' ),
        "desc" => esc_html__( 'Enter the logo height (set to half the original logo height for retina displays).', 'buddy' ),
        "id" => $dirname . "_logo_height",
        "type" => "text",
		"size" => "small",
		"details" => "px" ),
					
		array( 
		"name" => esc_html__( 'Logo Top Margin', 'buddy' ),
        "desc" => esc_html__( 'Enter the top margin of your logo.', 'buddy' ),
        "id" => $dirname . "_logo_top",
        "type" => "text",
		"size" => "small",
		"details" => "px" ),

		array( 
		"name" => esc_html__( 'Logo Right Margin', 'buddy' ),
        "desc" => esc_html__( 'Enter the right margin of your logo.', 'buddy' ),
        "id" => $dirname . "_logo_right",
        "type" => "text",
		"size" => "small",
		"details" => "px" ),
				
		array( 
		"name" => esc_html__( 'Logo Bottom Margin', 'buddy' ),
        "desc" => esc_html__( 'Enter the bottom margin of your logo.', 'buddy' ),
        "id" => $dirname . "_logo_bottom",
        "type" => "text",
		"size" => "small",
		"details" => "px" ),

		array( 
		"name" => esc_html__( 'Logo Left Margin', 'buddy' ),
        "desc" => esc_html__( 'Enter the left margin of your logo.', 'buddy' ),
        "id" => $dirname . "_logo_left",
        "type" => "text",
		"size" => "small",
		"details" => "px" ),
		
		array( "type" => "divider" ),

		array(  
		"name" => esc_html__( 'Responsive', 'buddy' ),
        "desc" => esc_html__( 'Choose whether the theme responds to the width of the browser window.', 'buddy' ),
        "id" => $dirname . "_responsive",
        "std" => '0',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        "type" => "radio" ),
 		
		array( "type" => "divider" ),
		   				
		array(  
		"name" => esc_html__( 'Retina Images', 'buddy' ),
        "desc" => esc_html__( 'Choose whether to crop images at double the size on retina displays (newer iPhones/iPads, Macbook Pro etc.).', 'buddy' ),
        "id" => $dirname . "_retina",
        "std" => '0',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        "type" => "radio" ),
                		
		array( "type" => "divider" ),

		array(  
			'name' => esc_html__( 'Back To Top Button', 'buddy' ),
			'desc' => esc_html__( 'Add a button to the bottom right corner of the page that takes you back to the top of the page.', 'buddy' ),
			'type' => 'radio',
			'id' => $dirname . '_back_to_top',
			'options' => array( 
				'gp-back-to-top' => esc_html__( 'Enabled', 'buddy' ),
				'gp-no-back-to-top' => esc_html__( 'Disabled', 'buddy' )
			 ),
			'std' => 'gp-back-to-top',
        ),
                		
		array( 'type' => 'divider' ),

		array(  
			'name' => esc_html__( 'Lightbox', 'buddy' ),
			'desc' => esc_html__( 'Choose how images open in the lightbox (pop-up window).', 'buddy' ),
			'type' => 'radio',
			'id' => $dirname . '_lightbox',
			'options' => array( 
				'gp-lightbox-group' => esc_html__( 'All images on page show as gallery within lightbox window', 'buddy' ),
				'gp-lightbox-separate' => esc_html__( 'Images are not grouped', 'buddy' ),
				'gp-lightbox-disabled' => esc_html__( 'Disabled', 'buddy' ),
			 ),
			'std' => 'gp-lightbox-group',
        ),
                		
		array( 'type' => 'divider' ),
  		   		
		array(  
		"name" => esc_html__( 'Login/Register Links', 'buddy' ),
        "desc" => esc_html__( 'Choose whether to display the login and register links in the header.', 'buddy' ),
        "id" => $dirname . "_bp_buttons",
        "std" => '0',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        "type" => "radio" ),

		array( 
		"name" => esc_html__( 'Login URL', 'buddy' ),
        "desc" => esc_html__( 'Enter the URL you have assigned the Login page template to.', 'buddy' ),
        "id" => $dirname ."_login_url",
        "type" => "text" ),

		array( 
		"name" => esc_html__( 'Register URL', 'buddy' ),
        "desc" => esc_html__( 'Enter the URL you have assigned the Register page template to.', 'buddy' ),
        "id" => $dirname . "_register_url",
        "type" => "text" ),
 
 		array(  
			'name' => esc_html__( 'Profile Button', 'buddy' ) . ' <span class="gp-new-option">New</span>',
			'desc' => esc_html__( 'Add a profile button to the header.', 'buddy' ),
			'type' => 'radio',
			'id' => $dirname . '_profile_button',
			'options' => array( 
				'gp-profile-all' => esc_html__( 'Show on all devices', 'buddy' ),
				'gp-profile-desktop' => esc_html__( 'Only hide on mobile devices', 'buddy' ),
				'gp-profile-mobile' => esc_html__( 'Only show on mobile devices', 'buddy' ),
				'gp-profile-disabled' => esc_html__( 'Disabled', 'buddy' ),
			 ),
			'std' => 'gp-profile-all',
        ),
               
   		array( "type" => "divider" ),
   						
 		array( 
		"name" => esc_html__( 'Footer Content', 'buddy' ),
        "desc" => esc_html__( 'Enter the content you want to display in your footer.', 'buddy' ),
        "id" => $dirname . "_footer_content",
        "type" => "textarea" ),
        
		array( "type" => "divider" ), 
				
		array( 
		"name" => esc_html__( 'Scripts', 'buddy' ),
        "desc" => esc_html__( 'Enter any scripts that need to be embedded into your theme (e.g. Google Analytics)', 'buddy' ),
        "id" => $dirname . "_scripts",
        "type" => "textarea" ),
 
 		array( "type" => "divider" ),
				
		array(  
		"name" => esc_html__( 'JW Player For YouTube Videos', 'buddy' ),
        "desc" => esc_html__( 'Use the JW Player for YouTube videos (not recommended!).', 'buddy' ),
        "id" => $dirname . "_jwplayer",
        "std" => '1',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        "type" => "radio" ),

		array(  
		"name" => esc_html__( 'Old Video Shortcode', 'buddy' ),
        "desc" => wp_kses( __( 'WordPress now has it\'s own native <code>[video]</code> shortcode. Choose this option to use the old video shortcode instead.', 'buddy' ), array( 'code' => array() ) ),
        "id" => $dirname . "_old_video_shortcode",
        "std" => '1',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        "type" => "radio" ),
                       
		array( "type" => "divider" ),

	 	array( 
		"name" => esc_html__( 'Preload Effect', 'buddy' ),
        "desc" => wp_kses( __( 'Choose whether to use the preload effect on content in category, archive, tag pages etc (this can be specified individually from shortcodes using <code>preload="true"</code>).', 'buddy' ), array( 'code' => array() ) ),
        "id" => $dirname . "_preload",
        "std" => '1',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        "type" => "radio" ),
        
		array( "type" => "close" ),	
		
array( 	"name" => esc_html__( 'Categories', 'buddy' ),
		"type" => "title" ),

		array( 	"type" => "open",
      	"id" => $dirname . "_categories_settings" ),

		array( 
		"name" => esc_html__( 'Categories', 'buddy' ),
		"type" => "header",
      	"id" => $dirname . "_cat_header",
      	"desc" => esc_html__( 'This section controls the global settings for all category, archive, tag and search result pages.', 'buddy' )
      	 ),
 
  		array( "type" => "divider" ),
  		      	
        array( 
		"name" => esc_html__( 'Thumbnail Width', 'buddy' ),
        "desc" => esc_html__( 'The width to crop the thumbnail to (can be overridden on individual posts, set to 0 to have a proportionate width).', 'buddy' ),
        "id" => $dirname . "_cat_thumbnail_width",
        "std" => "900",
        "type" => "text",
		"size" => "small",
		"details" => "px" ), 

  		array( 
		"name" => esc_html__( 'Thumbnail Height', 'buddy' ),
        "desc" => esc_html__( 'The height to crop the thumbnail to (can be overridden on individual posts, set to 0 to have a proportionate height).', 'buddy' ),
        "id" => $dirname . "_cat_thumbnail_height",
        "std" => "350",
        "type" => "text",
		"size" => "small",
		"details" => "px" ), 

		array( 
		"name" => esc_html__( 'Image Wrap', 'buddy' ),
        "desc" => esc_html__( 'Choose whether the page content wraps around the featured image.', 'buddy' ),
        "id" => $dirname . "_cat_image_wrap",
		"std" => 'Enable',
		"options" => array( 'Enable' => esc_html__( 'Enable', 'buddy' ), 'Disable' => esc_html__( 'Disable', 'buddy' ) ),
        "type" => "select" ),

		array( 
		"name" => esc_html__( 'Hard Crop', 'buddy' ),
        "desc" => esc_html__( 'Choose whether the image is hard cropped.', 'buddy' ),
        "id" => $dirname . "_cat_hard_crop",
        "std" => 'Enable',
		"options" => array( 'Enable' => esc_html__( 'Enable', 'buddy' ), 'Disable' => esc_html__( 'Disable', 'buddy' ) ),
        "type" => "select" ),
                
  		array( "type" => "divider" ),
   		  		
 		array( 
		"name" => esc_html__( 'Left Sidebar', 'buddy' ),
        "desc" => esc_html__( 'Choose which sidebar area to display.', 'buddy' ),
        "id" => $dirname . "_cat_sidebar_left",
        "std" => "gp-default-left",
        "type" => "select_sidebar" ),

 		array( 
		"name" => esc_html__( 'Right Sidebar', 'buddy' ),
        "desc" => esc_html__( 'Choose which sidebar area to display.', 'buddy' ),
        "id" => $dirname . "_cat_sidebar_right",
        "std" => "gp-default-right",
        "type" => "select_sidebar" ),

   		array( "type" => "divider" ),

		array( 
		"name" => esc_html__( 'Layout', 'buddy' ),
        "desc" => esc_html__( 'Choose the page layout.', 'buddy' ),
        "id" => $dirname . "_cat_layout",
        "std" => 'sb-both',
		"options" => array( 'sb-left' => esc_html__( 'Sidebar Left', 'buddy' ), 'sb-right' => esc_html__( 'Sidebar Right', 'buddy' ), 'sb-both' => esc_html__( 'Sidebar Left & Right', 'buddy' ), 'fullwidth' => esc_html__( 'Fullwidth', 'buddy' ) ),
        "type" => "select" ),

        array( "type" => "divider" ), 
           		
  		array( 
		"name" => esc_html__( 'Title', 'buddy' ),
        "desc" => esc_html__( 'Choose whether to display the page title.', 'buddy' ),
        "id" => $dirname . "_cat_title",
        "std" => 'Show',
		"options" => array( 'Show' => esc_html__( 'Show', 'buddy' ), 'Hide' => esc_html__( 'Hide', 'buddy' ) ),
        "type" => "select" ),

   		array( "type" => "divider" ),
  		 		
		array( 
		"name" => esc_html__( 'Content Display', 'buddy' ),
        "desc" => esc_html__( 'Choose whether to display the full post content or an excerpt.', 'buddy' ),
        "id" => $dirname . "_cat_content_display",
        "std" => '0',
		"options" => array( esc_html__( 'Excerpt', 'buddy' ), esc_html__( 'Full Content', 'buddy' ) ),
        "type" => "radio" ),
        
		array( "type" => "divider" ),
		
        array( 
		"name" => esc_html__( 'Excerpt Length', 'buddy' ),
        "desc" => esc_html__( 'The number of characters in excerpts.', 'buddy' ),
        "id" => $dirname . "_cat_excerpt_length",
        "std" => "400",
        "type" => "text",
		"size" => "small" ),
 
  		array( "type" => "divider" ),
		
		array(  
		"name" => esc_html__( 'Read More Link', 'buddy' ),
        "desc" => esc_html__( 'Choose whether to display the read more links.', 'buddy' ),
        "id" => $dirname . "_cat_read_more",
        "std" => '0',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        "type" => "radio" ),
 
  		array( "type" => "divider" ),
  		
		array(  
		"name" => esc_html__( 'Post Date', 'buddy' ),
        "desc" => esc_html__( 'Choose whether to display the post date.', 'buddy' ),
        "id" => $dirname . "_cat_date",
        "std" => '0',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        "type" => "radio" ),

		array(  
		"name" => esc_html__( 'Post Author', 'buddy' ),
        "desc" => esc_html__( 'Choose whether to display the post author.', 'buddy' ),
        "id" => $dirname . "_cat_author",
        "std" => '0',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        "type" => "radio" ),

		array(  
		"name" => esc_html__( 'Post Categories', 'buddy' ),
        "desc" => esc_html__( 'Choose whether to display the post categories.', 'buddy' ),
        "id" => $dirname . "_cat_cats",
        "std" => '1',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        "type" => "radio" ),
        
		array(  
		"name" => esc_html__( 'Post Comments', 'buddy' ),
        "desc" => esc_html__( 'Choose whether to display the post comments.', 'buddy' ),
        "id" => $dirname . "_cat_comments",
        "std" => '0',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        "type" => "radio" ),
 
		array(  
		"name" => esc_html__( 'Post Tags', 'buddy' ),
        "desc" => esc_html__( 'Choose whether to display the post tags.', 'buddy' ),
        "id" => $dirname . "_cat_tags",
        "std" => '1',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        "type" => "radio" ),
                       
		array( "type" => "close" ),

array( 	"name" => esc_html__( 'Posts', 'buddy' ),
		"type" => "title" ),

		array( 	"type" => "open",
      	"id" => $dirname . "_post_settings" ),

		array( 
		"name" => esc_html__( 'Posts', 'buddy' ),
		"type" => "header",
      	"id" => $dirname . "_post_header",
      	"desc" => esc_html__( 'This section controls the global settings for all posts, but most settings can be overridden on individual posts.', 'buddy' )
      	 ),

  		array( "type" => "divider" ),
  		      	        
		array(  
		"name" => esc_html__( 'Featured Image', 'buddy' ),
        "desc" => esc_html__( 'Choose whether to display the featured image (can be overridden on individual posts).', 'buddy' ),
        "id" => $dirname . "_show_post_image",
        "std" => 'Show',
		"options" => array( 'Show' => esc_html__( 'Show', 'buddy' ), 'Hide' => esc_html__( 'Hide', 'buddy' ) ),
        "type" => "select" ),
        
        array( 
		"name" => esc_html__( 'Image Width', 'buddy' ),
        "desc" => esc_html__( 'The width to crop the image to (can be overridden on individual posts, set to 0 to have a proportionate width).', 'buddy' ),
        "id" => $dirname . "_post_image_width",
        "std" => "1003",
        "type" => "text",
		"size" => "small",
		"details" => "px" ), 

  		array( 
		"name" => esc_html__( 'Image Height', 'buddy' ),
        "desc" => esc_html__( 'The height to crop the image to (can be overridden on individual posts, set to 0 to have a proportionate height).', 'buddy' ),
        "id" => $dirname . "_post_image_height",
        "std" => "380",
        "type" => "text",
		"size" => "small",
		"details" => "px" ), 

		array( 
		"name" => esc_html__( 'Image Wrap', 'buddy' ),
        "desc" => esc_html__( 'Choose whether the page content wraps around the featured image.', 'buddy' ),
        "id" => $dirname . "_post_image_wrap",
		"style" => 'Disable',
		"options" => array( 'Enable' => esc_html__( 'Enable', 'buddy' ), 'Disable' => esc_html__( 'Disable', 'buddy' ) ),
        "type" => "select" ),
        
		array( 
		"name" => esc_html__( 'Hard Crop', 'buddy' ),
        "desc" => esc_html__( 'Choose whether the image is hard cropped (can be overridden on individual posts).', 'buddy' ),
        "id" => $dirname . "_post_hard_crop",
        "std" => 'Enable',
		"options" => array( 'Enable' => esc_html__( 'Enable', 'buddy' ), 'Disable' => esc_html__( 'Disable', 'buddy' ) ),
        "type" => "select" ),
                      		        
  		array( "type" => "divider" ),
   		
 		array( 
		"name" => esc_html__( 'Left Sidebar', 'buddy' ),
        "desc" => esc_html__( 'Choose which sidebar area to display (can be overridden on individual posts).', 'buddy' ),
        "id" => $dirname . "_post_sidebar_left",
        "std" => "gp-default-left",
        "type" => "select_sidebar" ),

 		array( 
		"name" => esc_html__( 'Right Sidebar', 'buddy' ),
        "desc" => esc_html__( 'Choose which sidebar area to display (can be overridden on individual posts).', 'buddy' ),
        "id" => $dirname . "_post_sidebar_right",
        "std" => "gp-default-right",
        "type" => "select_sidebar" ),
   		
   		array( "type" => "divider" ),

		array( 
		"name" => esc_html__( 'Layout', 'buddy' ),
        "desc" => esc_html__( 'Choose the page layout (can be overridden on individual posts).', 'buddy' ),
        "id" => $dirname . "_post_layout",
        "std" => 'sb-both',
		"options" => array( 'sb-left' => esc_html__( 'Sidebar Left', 'buddy' ), 'sb-right' => esc_html__( 'Sidebar Right', 'buddy' ), 'sb-both' => esc_html__( 'Sidebar Left & Right', 'buddy' ), 'fullwidth' => esc_html__( 'Fullwidth', 'buddy' ) ),
        "type" => "select" ),

        array( "type" => "divider" ), 
           		
  		array( 
		"name" => esc_html__( 'Title', 'buddy' ),
        "desc" => esc_html__( 'Choose whether to display the page title (can be overridden on individual posts).', 'buddy' ),
        "id" => $dirname . "_post_title",
        "std" => 'Show',
		"options" => array( 'Show' => esc_html__( 'Show', 'buddy' ), 'Hide' => esc_html__( 'Hide', 'buddy' ) ),
        "type" => "select" ),

  		array( "type" => "divider" ),
  		
		array(  
		"name" => esc_html__( 'Post Author', 'buddy' ),
        "desc" => esc_html__( 'Choose whether to display the post author.', 'buddy' ),
        "id" => $dirname . "_post_author",
        "std" => '0',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        "type" => "radio" ),
	
		array(  
		"name" => esc_html__( 'Post Date', 'buddy' ),
        "desc" => esc_html__( 'Choose whether to display the post date.', 'buddy' ),
        "id" => $dirname . "_post_date",
        "std" => '0',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        "type" => "radio" ),
        
		array(  
		"name" => esc_html__( 'Post Categories', 'buddy' ),
        "desc" => esc_html__( 'Choose whether to display the post categories.', 'buddy' ),
        "id" => $dirname . "_post_cats",
        "std" => '0',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        "type" => "radio" ),
        
		array(  
		"name" => esc_html__( 'Post Comment Number', 'buddy' ),
        "desc" => esc_html__( 'Choose whether to display the number of post comments.', 'buddy' ),
        "id" => $dirname . "_post_comments",
        "std" => '0',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        "type" => "radio" ),
 
 		array(  
		"name" => esc_html__( 'Post Tags', 'buddy' ),
        "desc" => esc_html__( 'Choose whether to display the post tags.', 'buddy' ),
        "id" => $dirname . "_post_tags",
        "std" => '0',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        "type" => "radio" ),
        
  		array( "type" => "divider" ),
  		
         array( 
		"name" => esc_html__( 'Author Info Panel', 'buddy' ),
        "desc" => wp_kses( __( 'Choose whether to display the author info panel ( can also be inserted in individual posts using the <code>[author]</code> shortcode).', 'buddy' ), array( 'code' => array() ) ),
        "id" => $dirname . "_post_author_info",
       "std" => '0',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        "type" => "radio" ),
        
  		array( "type" => "divider" ),
		
		array( 
		"name" => esc_html__( 'Related Items', 'buddy' ),
        "desc" => wp_kses( __( 'Choose whether to display a related items section ( can also be inserted in individual posts using the <code>[related_posts]</code> shortcode).', 'buddy' ), array( 'code' => array() ) ), 
        "id" => $dirname . "_post_related_items",
        "std" => '0',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        "type" => "radio" ),

        array( 
		"name" => esc_html__( 'Image Width', 'buddy' ),
        "desc" => esc_html__( 'The width to crop the image to ( set to 0 to have a proportionate width).', 'buddy' ),
        "id" => $dirname . "_post_related_image_width",
        "std" => "340",
        "type" => "text",
		"size" => "small",
		"details" => "px" ), 

  		array( 
		"name" => esc_html__( 'Image Height', 'buddy' ),
        "desc" => esc_html__( 'The height to crop the image to ( set to 0 to have a proportionate height).', 'buddy' ),
        "id" => $dirname . "_post_related_image_height",
        "std" => "290",
        "type" => "text",
		"size" => "small",
		"details" => "px" ), 
         
		array( "type" => "close" ),

array( 	"name" => esc_html__( 'Pages', 'buddy' ),
		"type" => "title" ),

		array( 	"type" => "open",
      	"id" => $dirname . "_page_settings" ),
   		
		array( 
		"name" => esc_html__( 'Pages', 'buddy' ),
		"type" => "header",
      	"id" => $dirname . "_page_header",
      	"desc" => esc_html__( 'This section controls the global settings for all pages, but most settings can be overridden on individual pages.', 'buddy' )
      	 ),

  		array( "type" => "divider" ),
  		  		      	   		
		array(  
		"name" => esc_html__( 'Featured Image', 'buddy' ),
        "desc" => esc_html__( 'Choose whether to display the featured image (can be overridden on individual posts).', 'buddy' ),
        "id" => $dirname . "_show_page_image",
        "std" => 'Show',
		"options" => array( 'Show' => esc_html__( 'Show', 'buddy' ), 'Hide' => esc_html__( 'Hide', 'buddy' ) ),
        "type" => "select" ),
        
        array( 
		"name" => esc_html__( 'Image Width', 'buddy' ),
        "desc" => esc_html__( 'The width to crop the image to (can be overridden on individual pages, set to 0 to have a proportionate width).', 'buddy' ),
        "id" => $dirname . "_page_image_width",
        "std" => "1003",
        "type" => "text",
		"size" => "small",
		"details" => "px" ), 

  		array( 
		"name" => esc_html__( 'Image Height', 'buddy' ),
        "desc" => esc_html__( 'The height to crop the image to (can be overridden on individual pages, set to 0 to have a proportionate height).', 'buddy' ),
        "id" => $dirname . "_page_image_height",
        "std" => "380",
        "type" => "text",
		"size" => "small",
		"details" => "px" ),
 
		array( 
		"name" => esc_html__( 'Image Wrap', 'buddy' ),
        "desc" => esc_html__( 'Choose whether the page content wraps around the featured image.', 'buddy' ),
        "id" => $dirname . "_page_image_wrap",
		"style" => 'Disable',
		"options" => array( 'Enable' => esc_html__( 'Enable', 'buddy' ), 'Disable' => esc_html__( 'Disable', 'buddy' ) ),
        "type" => "select" ),
 
		array( 
		"name" => esc_html__( 'Hard Crop', 'buddy' ),
        "desc" => esc_html__( 'Choose whether the image is hard cropped (can be overridden on individual pages).', 'buddy' ),
        "id" => $dirname . "_page_hard_crop",
        "std" => 'Enable',
		"options" => array( 'Enable' => esc_html__( 'Enable', 'buddy' ), 'Disable' => esc_html__( 'Disable', 'buddy' ) ),
        "type" => "select" ),                     
                                               
   		array( "type" => "divider" ),
   		
 		array( 
		"name" => esc_html__( 'Left Sidebar', 'buddy' ),
        "desc" => esc_html__( 'Choose which sidebar area to display (can be overridden on individual pages).', 'buddy' ),
        "id" => $dirname . "_page_sidebar_left",
        "std" => "gp-default-left",
        "type" => "select_sidebar" ),

 		array( 
		"name" => esc_html__( 'Right Sidebar', 'buddy' ),
        "desc" => esc_html__( 'Choose which sidebar area to display (can be overridden on individual pages).', 'buddy' ),
        "id" => $dirname . "_page_sidebar_right",
        "std" => "gp-default-right",
        "type" => "select_sidebar" ),
        
   		array( "type" => "divider" ),

		array( 
		"name" => esc_html__( 'Layout', 'buddy' ),
        "desc" => esc_html__( 'Choose the page layout (can be overridden on individual pages).', 'buddy' ),
        "id" => $dirname . "_page_layout",
        "std" => 'sb-both',
		"options" => array( 'sb-left' => esc_html__( 'Sidebar Left', 'buddy' ), 'sb-right' => esc_html__( 'Sidebar Right', 'buddy' ), 'sb-both' => esc_html__( 'Sidebar Left & Right', 'buddy' ), 'fullwidth' => esc_html__( 'Fullwidth', 'buddy' ) ),
        "type" => "select" ),

        array( "type" => "divider" ), 
           		
  		array( 
		"name" => esc_html__( 'Title', 'buddy' ),
        "desc" => esc_html__( 'Choose whether to display the page title (can be overridden on individual pages).', 'buddy' ),
        "id" => $dirname . "_page_title",
        "std" => 'Show',
		"options" => array( 'Show' => esc_html__( 'Show', 'buddy' ), 'Hide' => esc_html__( 'Hide', 'buddy' ) ),
        "type" => "select" ),

   		array( "type" => "divider" ),
  		
		array(  
		"name" => esc_html__( 'Page Author', 'buddy' ),
        "desc" => esc_html__( 'Choose whether to display the page author.', 'buddy' ),
        "id" => $dirname . "_page_author",
        "std" => '1',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        "type" => "radio" ),
   		
		array(  
		"name" => esc_html__( 'Page Date', 'buddy' ),
        "desc" => esc_html__( 'Choose whether to display the page date.', 'buddy' ),
        "id" => $dirname . "_page_date",
        "std" => '1',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        "type" => "radio" ),
        
		array(  
		"name" => esc_html__( 'Page Comment Number', 'buddy' ),
        "desc" => esc_html__( 'Choose whether to display the number of page comments.', 'buddy' ),
        "id" => $dirname . "_page_comments",
        "std" => '1',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        "type" => "radio" ),

   		array( "type" => "divider" ),
   		
		array(  
		"name" => esc_html__( 'Author Info Panel', 'buddy' ),
        "desc" => esc_html__( 'Choose whether to display an author info panel.', 'buddy' ),
        "id" => $dirname . "_page_author_info",
        "std" => '1',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        "type" => "radio" ),
        
		array( "type" => "close" ),

array( 	"name" => esc_html__( 'BuddyPress', 'buddy' ),
		"type" => "title" ),

		array( 	"type" => "open",
      	"id" => $dirname . "_bp_settings" ),

		array( 
		"name" => esc_html__( 'BuddyPress', 'buddy' ),
		"type" => "header",
      	"id" => $dirname . "_bp_header",
      	"desc" => esc_html__( 'This section controls the BuddyPress pages created by the plugin.', 'buddy' )
      	 ),

  		array( "type" => "divider" ),
   		
 		array( 
		"name" => esc_html__( 'Left Sidebar', 'buddy' ),
        "desc" => esc_html__( 'Choose which sidebar area to display (can be overridden on individual pages).', 'buddy' ),
        "id" => $dirname . "_bp_sidebar_left",
        "std" => "gp-default-left",
        "type" => "select_sidebar" ),

 		array( 
		"name" => esc_html__( 'Right Sidebar', 'buddy' ),
        "desc" => esc_html__( 'Choose which sidebar area to display (can be overridden on individual pages).', 'buddy' ),
        "id" => $dirname . "_bp_sidebar_right",
        "std" => "gp-default-right",
        "type" => "select_sidebar" ),
        
        array( "type" => "divider" ), 
        
		array( 
		"name" => esc_html__( 'Layout', 'buddy' ),
        "desc" => esc_html__( 'Choose the page layout (can be overridden on individual pages).', 'buddy' ),
        "id" => $dirname . "_bp_layout",
        "std" => 'sb-both',
		"options" => array( 'sb-left' => esc_html__( 'Sidebar Left', 'buddy' ), 'sb-right' => esc_html__( 'Sidebar Right', 'buddy' ), 'sb-both' => esc_html__( 'Sidebar Left & Right', 'buddy' ), 'fullwidth' => esc_html__( 'Fullwidth', 'buddy' ) ),
        "type" => "select" ),

        array( "type" => "divider" ), 
           		
  		array( 
		"name" => esc_html__( 'Title', 'buddy' ),
        "desc" => esc_html__( 'Choose whether to display the page title (can be overridden on individual pages).', 'buddy' ),
        "id" => $dirname . "_bp_title",
        "std" => 'Show',
		"options" => array( 'Show' => esc_html__( 'Show', 'buddy' ), 'Hide' => esc_html__( 'Hide', 'buddy' ) ),
        "type" => "select" ),
                  				
		array( "type" => "close" ),	

array( 	"name" => esc_html__( 'bbPress', 'buddy' ),
		"type" => "title" ),

		array( 	"type" => "open",
      	"id" => $dirname . "_bbp_settings" ),

		array( 
		"name" => esc_html__( 'bbPress', 'buddy' ),
		"type" => "header",
      	"id" => $dirname . "_bbp_header",
      	"desc" => esc_html__( 'This section controls the bbPress pages created by the plugin.', 'buddy' )
      	 ),

  		array( "type" => "divider" ),
   		
 		array( 
		"name" => esc_html__( 'Left Sidebar', 'buddy' ),
        "desc" => esc_html__( 'Choose which sidebar area to display (can be overridden on individual pages).', 'buddy' ),
        "id" => $dirname . "_bbp_sidebar_left",
        "std" => "gp-default-left",
        "type" => "select_sidebar" ),

 		array( 
		"name" => esc_html__( 'Right Sidebar', 'buddy' ),
        "desc" => esc_html__( 'Choose which sidebar area to display (can be overridden on individual pages).', 'buddy' ),
        "id" => $dirname . "_bbp_sidebar_right",
        "std" => "gp-default-right",
        "type" => "select_sidebar" ),
        
        array( "type" => "divider" ), 
        
		array( 
		"name" => esc_html__( 'Layout', 'buddy' ),
        "desc" => esc_html__( 'Choose the page layout (can be overridden on individual pages).', 'buddy' ),
        "id" => $dirname . "_bbp_layout",
        "std" => 'sb-right',
		"options" => array( 'sb-left' => esc_html__( 'Sidebar Left', 'buddy' ), 'sb-right' => esc_html__( 'Sidebar Right', 'buddy' ), 'sb-both' => esc_html__( 'Sidebar Left & Right', 'buddy' ), 'fullwidth' => esc_html__( 'Fullwidth', 'buddy' ) ),
        "type" => "select" ),

        array( "type" => "divider" ), 
           		
  		array( 
		"name" => esc_html__( 'Title', 'buddy' ),
        "desc" => esc_html__( 'Choose whether to display the page title (can be overridden on individual pages).', 'buddy' ),
        "id" => $dirname . "_bbp_title",
        "std" => 'Show',
		"options" => array( 'Show' => esc_html__( 'Show', 'buddy' ), 'Hide' => esc_html__( 'Hide', 'buddy' ) ),
        "type" => "select" ),
           				
		array( "type" => "close" ),	
				
array( 	"name" => esc_html__( 'Styling', 'buddy' ),
		"type" => "title" ),

		array( 	"type" => "open",
      	"id" => $dirname . "_styling_settings" ),
	
		array( 
		"name" => esc_html__( 'Styling', 'buddy' ),
		"type" => "header",
      	"id" => $dirname . "_style_header",
      	"desc" => esc_html__( 'This section provides you with some basic settings to change the look of the theme. If you want to customize the design of the theme further you can add your own CSS styling in "CSS" tab.', 'buddy' )
      	 ),
  		
  		array( "type" => "divider" ),
  			
 		array( 
		"name" => esc_html__( 'Primary Font', 'buddy' ),
        "desc" => wp_kses( __( 'Enter the name of the font you want to use for the primary text ( e.g. Times New Roman, Arial, Oswald ). To use <a href="http://www.google.com/webfonts" target="_blank">Google Web Fonts</a> get the "Standard" code provided by Google and add this to "Scripts" box in the "General" tab.', 'buddy' ), array( 'a' => array( 'href' => array(), 'target' => array() ) ) ),
        "id" => $dirname . "_primary_font",
        "type" => "text" ), 

 		array( 
		"name" => esc_html__( 'Primary Text Size', 'buddy' ),
        "desc" => esc_html__( 'The text size used for the primary text.', 'buddy' ),
        "id" => $dirname . "_primary_size",
        "type" => "text",
		"size" => "small",
		"details" => "px" ), 
				   		
 		array( 
		"name" => esc_html__( 'Primary Text Color', 'buddy' ),
        "desc" => esc_html__( 'The text color used for the primary text.', 'buddy' ),
        "id" => $dirname . "_primary_text_color",
        "type" => "colorpicker" ),
   		         
 		array( 
		"name" => esc_html__( 'Primary Link Color', 'buddy' ),
        "desc" => esc_html__( 'The link color used for the primary text.', 'buddy' ),
        "id" => $dirname . "_primary_link_color",
        "type" => "colorpicker" ), 

 		array( 
		"name" => esc_html__( 'Primary Link Hover Color', 'buddy' ),
        "desc" => esc_html__( 'The link hover color used for the primary text.', 'buddy' ),
        "id" => $dirname . "_primary_link_hover_color",
        "type" => "colorpicker" ), 

   		  
		array( 
		"name" => esc_html__( 'Primary Background Color', 'buddy' ),
        "desc" => esc_html__( 'The backgroud color used for the primary content.', 'buddy' ),
        "id" => $dirname . "_primary_bg_color",
        "type" => "colorpicker" ), 

		array( 
		"name" => esc_html__( 'Primary Border Color', 'buddy' ),
        "desc" => esc_html__( 'The border color used for the primary content.', 'buddy' ),
        "id" => $dirname . "_primary_border_color",
        "type" => "colorpicker" ), 

   		array( "type" => "divider" ),

		array( 
		"name" => esc_html__( 'Secondary Background Color', 'buddy' ),
        "desc" => esc_html__( 'The background color used for the secondary content.', 'buddy' ),
        "id" => $dirname . "_secondary_bg_color",
        "type" => "colorpicker" ), 

		array( 
		"name" => esc_html__( 'Secondary Background Hover Color', 'buddy' ),
        "desc" => esc_html__( 'The background hover color used for the secondary content.', 'buddy' ),
        "id" => $dirname . "_secondary_bg_hover_color",
        "type" => "colorpicker" ), 

   		array( "type" => "divider" ),

 		array( 
		"name" => esc_html__( 'Heading Font', 'buddy' ),
        "desc" => wp_kses( __( 'Enter the name of the font you want to use for the headings ( e.g. Times New Roman, Arial, Oswald ). To use <a href="http://www.google.com/webfonts" target="_blank">Google Web Fonts</a> get the "Standard" code provided by Google and add this to "Scripts" box in the "General" tab.', 'buddy' ), array( 'a' => array( 'href' => array(), 'target' => array() ) ) ),
        "id" => $dirname . "_heading_font",
        "type" => "text" ), 

 		array( 
		"name" => esc_html__( 'Heading 1 Text Size', 'buddy' ),
        "desc" => esc_html__( 'The text size used in &lt;h1&gt; headings.', 'buddy' ),
        "id" => $dirname . "_heading1_size",
        "type" => "text",
		"size" => "small",
		"details" => "px" ),

 		array( 
		"name" => esc_html__( 'Heading 2 Text Size', 'buddy' ),
        "desc" => esc_html__( 'The text size used in &lt;h2&gt; headings.', 'buddy' ),
        "id" => $dirname . "_heading2_size",
        "type" => "text",
		"size" => "small",
		"details" => "px" ),
		
 		array( 
		"name" => esc_html__( 'Heading 3 Text Size', 'buddy' ),
        "desc" => esc_html__( 'The text size used in &lt;h3&gt; headings.', 'buddy' ),
        "id" => $dirname . "_heading3_size",
        "type" => "text",
		"size" => "small",
		"details" => "px" ),
						           		
 		array( 
		"name" => esc_html__( 'Heading Text Color', 'buddy' ),
        "desc" => esc_html__( 'The text colour used in headings.', 'buddy' ),
        "id" => $dirname . "_heading_text_color",
        "type" => "colorpicker" ), 

 		array( 
		"name" => esc_html__( 'Heading Link Color', 'buddy' ),
        "desc" => esc_html__( 'The link colour used in headings.', 'buddy' ),
        "id" => $dirname . "_heading_link_color",
        "type" => "colorpicker" ), 
        
 		array( 
		"name" => esc_html__( 'Heading Link Hover Color', 'buddy' ),
        "desc" => esc_html__( 'The link hover colour used in headings.', 'buddy' ),
        "id" => $dirname . "_heading_link_hover_color",
        "type" => "colorpicker" ), 

   		array( "type" => "divider" ),

		array( 
		"name" => esc_html__( 'Header Background Color', 'buddy' ),
        "desc" => esc_html__( 'The background color of the header at the top of the page.', 'buddy' ),
        "id" => $dirname . "_header_bg_color",
        "type" => "colorpicker" ), 

 		array( 
		"name" => esc_html__( 'Header Link Color', 'buddy' ),
        "desc" => esc_html__( 'The link color of the navigation text in the header at the top of the page.', 'buddy' ),
        "id" => $dirname . "_header_link_color",
        "type" => "colorpicker" ), 

		array( 
		"name" => esc_html__( 'Navigation Dropdown Background Color', 'buddy' ),
        "desc" => esc_html__( 'The background color of the dropdown navigation.', 'buddy' ),
        "id" => $dirname . "_dropdown_bg_color",
        "type" => "colorpicker" ), 
                
   		array( "type" => "divider" ),
   		
 		array( 
		"name" => esc_html__( 'Primary Button Text Color', 'buddy' ),
        "desc" => esc_html__( 'The text color used for the primary buttons.', 'buddy' ),
        "id" => $dirname . "_primary_button_text_color",
        "type" => "colorpicker" ),  

 		array( 
		"name" => esc_html__( 'Primary Button Background Color', 'buddy' ),
        "desc" => esc_html__( 'The background color used for the primary buttons.', 'buddy' ),
        "id" => $dirname . "_primary_button_bg_color",
        "type" => "colorpicker" ),      

 		array( 
		"name" => esc_html__( 'Primary Button Background Hover Color', 'buddy' ),
        "desc" => esc_html__( 'The background hover color used for the primary buttons.', 'buddy' ),
        "id" => $dirname . "_primary_button_bg_hover_color",
        "type" => "colorpicker" ),      
        
   		array( "type" => "divider" ),    

		array( 
		"name" => esc_html__( 'Secondary Button Text Color', 'buddy' ),
        "desc" => esc_html__( 'The text color used for the secondary buttons.', 'buddy' ),
        "id" => $dirname . "_secondary_button_text_color",
        "type" => "colorpicker" ),  

 		array( 
		"name" => esc_html__( 'Secondary Button Background Color', 'buddy' ),
        "desc" => esc_html__( 'The background color used for the secondary buttons.', 'buddy' ),
        "id" => $dirname . "_secondary_button_bg_color",
        "type" => "colorpicker" ),      

 		array( 
		"name" => esc_html__( 'Secondary Button Background Hover Color', 'buddy' ),
        "desc" => esc_html__( 'The background hover color used for the secondary buttons.', 'buddy' ),
        "id" => $dirname . "_secondary_button_bg_hover_color",
        "type" => "colorpicker" ),      
        
   		array( "type" => "divider" ),     
   		       		           		                                 
		array( 
		'name' => esc_html__( 'Desktop Page Width', 'buddy' ),
		'id' => $dirname . '_desktop_page_width',
		'std' => '1200',
		'type' => 'text',
		'size' => 'small',
		'details' => 'px',
		 ),
					
		array( 
		'name' => esc_html__( 'Desktop Content Width (with one sidebar)', 'buddy' ),
		'id' => $dirname . '_desktop_content_width_1',
		'std' => '935',
		'type' => 'text',
		'size' => 'small',
		'details' => 'px',
		'desc' => esc_html__( 'Page Width - Single Sidebar Width - 20', 'buddy' ),
		 ),	

		array( 
		'name' => esc_html__( 'Desktop Content Width ( with two sidebars )', 'buddy' ),
		'id' => $dirname . '_desktop_content_width_2',
		'std' => '670',
		'type' => 'text',
		'size' => 'small',
		'details' => 'px',
		'desc' => esc_html__( 'Page Width - Double Sidebar Width - Double Sidebar Width - 40', 'buddy' ),
		 ),

		array( 
		'name' => esc_html__( 'Desktop Single Sidebar Width', 'buddy' ),
		'id' => $dirname . '_desktop_single_sidebar_width',
		'std' => '245',
		'type' => 'text',
		'size' => 'small',
		'details' => 'px',
		 ),	
				
		array( 
		'name' => esc_html__( 'Desktop Double Sidebar Width', 'buddy' ),
		'id' => $dirname . '_desktop_double_sidebar_width',
		'std' => '245',
		'type' => 'text',
		'size' => 'small',
		'details' => 'px',
		 ),
				
		array( "type" => "divider" ),   

		array( 
		'name' => esc_html__( 'Tablet (Landscape) Page Width', 'buddy' ),
		'id' => $dirname . '_tablet_l_page_width',
		'std' => '1000',
		'type' => 'text',
		'size' => 'small',
		'details' => 'px',
		 ),
					
		array( 
		'name' => esc_html__( 'Tablet (Landscape) Content Width (with one sidebar)', 'buddy' ),
		'id' => $dirname . '_tablet_l_content_width_1',
		'std' => '775',
		'type' => 'text',
		'size' => 'small',
		'details' => 'px',
		'desc' => esc_html__( 'Page Width - Single Sidebar Width - 20', 'buddy' ),
		 ),	

		array( 
		'name' => esc_html__( 'Tablet (Landscape) Content Width (with two sidebars)', 'buddy' ),
		'id' => $dirname . '_tablet_l_content_width_2',
		'std' => '550',
		'type' => 'text',
		'size' => 'small',
		'details' => 'px',
		'desc' => esc_html__( 'Page Width - Double Sidebar Width - Double Sidebar Width - 40', 'buddy' ),
		 ),

		array( 
		'name' => esc_html__( 'Tablet (Landscape) Single Sidebar Width', 'buddy' ),
		'id' => $dirname . '_tablet_l_single_sidebar_width',
		'std' => '205',
		'type' => 'text',
		'size' => 'small',
		'details' => 'px',
		 ),	
				
		array( 
		'name' => esc_html__( 'Tablet (Landscape) Double Sidebar Width', 'buddy' ),
		'id' => $dirname . '_tablet_l_double_sidebar_width',
		'std' => '205',
		'type' => 'text',
		'size' => 'small',
		'details' => 'px',
		 ),
													 
		array( 'type' => 'close' ),
		
				      			
array( 	"name" => esc_html__( 'CSS', 'buddy' ),
		"type" => "title" ),

		array( 	"type" => "open",
      	"id" => $dirname . "_css_settings" ),
		
		array( 
		"name" => esc_html__( 'CSS', 'buddy' ),
		"type" => "header",
      	"id" => $dirname . "_css_header",
      	"desc" => esc_html__( 'You can add your own CSS below to style the theme. This CSS will not be lost if you update the theme. For more information on how to find the names of the elements you want to style  click', 'buddy' ) . ' <a href="http://ghostpool.com/help/' . $dirname . '/help.html#customizing-design" target="_blank">'. esc_html__( 'here', 'buddy' ) . '</a>.'
      	),

  		array( "type" => "divider" ),
      	
        array( 
		"name" => esc_html__( 'Custom Stylesheet', 'buddy' ),
		"desc" => wp_kses( __( 'Enter the relative URL to your custom stylesheet e.g. <code>lib/css/custom-style.css</code> (can be overridden on individual posts/pages).', 'buddy' ), array( 'code' => array() ) ),
        "id" => $dirname . "_custom_stylesheet",
        "type" => "text"
        ),
        
		array( "type" => "divider" ), 
		  		      	        		
		array( 
		"name" => esc_html__( 'CSS Code', 'buddy' ),
        "desc" => '',
        "id" => $dirname . "_custom_css",
        "type" => "textarea",
        "size" => "large" ),

		array( "type" => "close" ),
	
 );

function ghostpool_add_admin() {

    global $dirname, $options;
			
    if ( isset( $_GET['page'] ) && $_GET['page'] == basename( __FILE__ ) ) {

        if ( isset( $_REQUEST['action'] ) && 'save' == $_REQUEST['action'] ) {

			foreach( $options as $value ) {
				if ( isset( $value['id'] ) ) {
					update_option( $value['id'], $_REQUEST[ $value['id']] );
				} else {
					if ( isset( $value['id'] ) ) { delete_option( $value['id'] ); }
				}
			}

			header( "Location: admin.php?page=theme-options.php&saved=true" );
			die;

        } elseif ( isset( $_REQUEST['action'] ) && 'reset' == $_REQUEST['action'] ) {

            foreach( $options as $value ) {
                delete_option( $value['id'] );
            }
            
            update_option( $dirname . '_theme_setup_status', '0' );

            header( "Location: admin.php?page=theme-options.php&reset=true" );
            die;

        }

		elseif ( isset( $_REQUEST['action'] ) && 'export' == $_REQUEST['action'] ) export_settings();
		elseif ( isset( $_REQUEST['action'] ) && 'import' == $_REQUEST['action'] ) import_settings();

    }

    add_menu_page( esc_html__( 'Theme Options', 'buddy' ), esc_html__( 'Theme Options', 'buddy' ), 'manage_options', basename( __FILE__ ), 'ghostpool_admin' );

}

function ghostpool_admin() {

    global $dirname, $options;

    if ( isset( $_REQUEST['saved'] ) && $_REQUEST['saved'] ) echo '<div id="message" class="updated"><p><strong>'. esc_html__( 'Options Saved', 'buddy').'</strong></p></div>';
    if ( isset( $_REQUEST['reset'] ) && $_REQUEST['reset'] ) echo '<div id="message" class="updated"><p><strong>'. esc_html__( 'Options Reset', 'buddy').'</strong></p></div>';

?>


<!-- BEGIN THEME WRAPPER -->

<div id="gp-theme-options" class="wrap">

	<h2><?php esc_html_e( 'Theme Options', 'buddy' ); ?></h2>
		
	<p><h3><a href="http://ghostpool.com/help/<?php echo $dirname; ?>/help.html" target="_blank"><?php esc_html_e( 'Help File', 'buddy' ); ?></a> | <a href="http://ghostpool.com/help/<?php echo $dirname; ?>/changelog.html" target="_blank"><?php esc_html_e( 'Changelog', 'buddy' ); ?></a> | <a href="http://ghostpool.ticksy.com" target="_blank"><?php esc_html_e( 'Support', 'buddy' ); ?></a> | <a href="http://www.ourwebmedia.com/ghostpool.php?aff=002" target="_blank"><?php esc_html_e( 'Premium Services', 'buddy' ); ?></a></h3></p>
	
	<div id="import_export" class="hide-if-js">
	
		<h3><?php esc_html_e( 'Import Theme Options', 'buddy' ); ?></h3>
		<div class="option-desc"><?php esc_html_e( 'If you have a back up of your theme options you can import them below.', 'buddy' ); ?></div>
		
		<form method="post" enctype="multipart/form-data">
			<p class="submit"><input type="file" name="file" id="file" />
			<input type="submit" name="import" class="button" value="<?php esc_html_e( 'Upload', 'buddy' ); ?>" /></p>
			<input type="hidden" name="action" value="import" />
		</form>

		<div class="divider"></div>
		
		<h3><?php esc_html_e( 'Export Theme Options', 'buddy' ); ?></h3>
		<div class="option-desc"><?php esc_html_e( 'If you want to create a back up of all your theme options click the Export button below ( will only back up your theme options and not your post/page/images data).', 'buddy' ); ?></div>
		
		<form method="post">
			<p class="submit"><input name="export" type="submit" class="button" value="<?php esc_html_e( 'Export Theme Options', 'buddy' ); ?>" /></p>
			<input type="hidden" name="action" value="export" />
		</form>	
	
	</div>

	
	<form method="post">
		
		<div class="submit">	
		
			<a href="#TB_inline?height=300&amp;width=500&amp;inlineId=import_export" onclick="return false;" class="thickbox"><input type="button" class="button" value="<?php esc_html_e( 'Import/Export Theme Options' ,'buddy' ); ?>"></a>
		
			<input name="save" type="submit" class="button-primary right" value="<?php esc_html_e( 'Save Changes', 'buddy' ); ?>" />
			<input type="hidden" name="action" value="save" />
			
		</div>
		
		<div id="panels">


<?php foreach( $options as $value ) {
switch( $value['type'] ) {
case "open":
?>

<?php break;
case "title":
?>

<div class="panel" id="<?php echo $value['name']; ?>">


<?php break;
case "header":
?>

	<div class="option option-header">
		<?php if ( isset( $value['name'] ) ) { ?><h2><?php echo $value['name']; ?></h2><?php } ?>
		<?php if ( ( $value['desc'] ) ) { ?><div class="option-desc"><?php echo $value['desc']; ?></div><?php } ?>
	</div>
	
	
<?php break;
case "close":
?>

</div>
<!-- END PANEL -->


<?php break;
case "divider":
?>

<div class="divider"></div>


<?php break;
case "clear":
?>

<div class="clear"></div>
	
	
<?php break;
case 'text':
?>
	
	<?php if ( isset( $value['name'] ) ) { ?><h3><?php echo $value['name']; ?></h3><?php } ?>
	<div class="option"<?php if ( isset( $value['style'] ) ) { ?> style="<?php echo $value['style']; ?>"<?php } ?><?php if ( isset( $value['style'] ) ) { ?> style="<?php echo $value['style']; ?>"<?php } ?>>
		<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != '' ) { echo get_option( $value['id'] ); } else { if ( isset( $value['std'] ) ) { echo $value['std']; } } ?>" size="<?php if ( isset( $value['size'] ) && $value['size'] == 'small' ) { ?>4<?php } else { ?>40<?php } ?>" /><?php if ( isset( $value['details'] ) ) { ?> <span><?php echo $value['details']; ?></span>&nbsp;<?php } ?>
		<?php if ( isset( $value['desc'] ) ) { ?><div class="option-desc"><?php echo $value['desc']; ?></div><?php } ?>
	</div>


<?php break;
case 'upload':
?>

	<?php if ( isset( $value['name'] ) ) { ?><h3><?php echo $value['name']; ?></h3><?php } ?>
	<div class="option uploader"<?php if ( isset( $value['style'] ) ) { ?> style="<?php echo $value['style']; ?>"<?php } ?>>
		<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" size="40" class="upload" value="<?php echo get_option( $value['id'] ); ?>" />
		<input type="button" id="<?php echo $value['id']; ?>_button" class="upload-image-button button" value="<?php esc_html_e( 'Upload', 'buddy' ); ?>" />
		<?php if ( ( $value['desc'] ) ) { ?><div class="option-desc"><?php echo $value['desc']; ?></div><?php } ?>
	</div>


<?php
break;

case 'textarea':
?>

	<?php if ( isset( $value['name'] ) ) { ?><h3><?php echo $value['name']; ?></h3><?php } ?>
	<div class="option"<?php if ( isset( $value['style'] ) ) { ?> style="<?php echo $value['style']; ?>"<?php } ?>>
		<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="70" rows="<?php if ( isset( $value['size'] ) && $value['size'] == 'large' ) { ?>50<?php } else { ?>10<?php } ?>"><?php if ( get_option( $value['id'] ) != '' ) { echo stripslashes( get_option( $value['id'] ) ); } else { if ( isset( $value['std'] ) ) { echo $value['std']; } } ?></textarea>
		<?php if ( ( $value['desc'] ) ) { ?><div class="option-desc"><?php echo $value['desc']; ?></div><?php } ?>
	</div>


<?php
break;
case 'select':
?>
	
	<?php if ( isset( $value['name'] ) ) { ?><h3><?php echo $value['name']; ?></h3><?php } ?>
	<div class="option"<?php if ( isset( $value['style'] ) ) { ?> style="<?php echo $value['style']; ?>"<?php } ?>>
		<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
			<?php foreach( $value['options'] as $key=>$option ) { ?>
					<?php if ( get_option( $value['id'] ) != '' ) { ?>
						<option value="<?php echo $key; ?>" <?php if ( get_option( $value['id'] ) == $key ) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
					<?php } else { ?>
						<option value="<?php echo $key; ?>" <?php if ( $value['std'] == $key ) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
					<?php } ?>
			<?php } ?>
		</select>
		<?php if ( ( $value['desc'] ) ) { ?><div class="option-desc"><?php echo $value['desc']; ?></div><?php } ?>
	</div>


<?php
break;
case 'select_taxonomy':
?>
		
	<?php if ( isset( $value['name'] ) ) { ?><h3><?php echo $value['name']; ?></h3><?php } ?>
	<div class="option"<?php if ( isset( $value['style'] ) ) { ?> style="<?php echo $value['style']; ?>"<?php } ?>>
		<?php $terms = get_terms( $value['cats'], 'hide_empty=0' ); ?>
		<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><option value=''><?php esc_html_e( 'None', 'buddy' ); ?></option><?php foreach( $terms as $term ): ?><option value="<?php echo $term->slug; ?>" <?php if ( get_option( $value['id'] )==  $term->slug ) { echo ' selected="selected"'; } ?>><?php echo $term->name; ?></option><?php endforeach; ?></select>
		<?php if ( ( $value['desc'] ) ) { ?><div class="option-desc"><?php echo $value['desc']; ?></div><?php } ?>
	</div>	


<?php
break;
case 'select_sidebar':
global $post, $wp_registered_sidebars;
?>
		
	<?php if ( isset( $value['name'] ) ) { ?><h3><?php echo $value['name']; ?></h3><?php } ?>
	<div class="option"<?php if ( isset( $value['style'] ) ) { ?> style="<?php echo $value['style']; ?>"<?php } ?>>
		<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
		<?php $sidebars = $wp_registered_sidebars; 
		if ( is_array( $sidebars ) && !empty( $sidebars ) ) { 
			foreach( $sidebars as $sidebar ) { 
				if ( get_option( $value['id'] ) != '' ) { ?>
					<option value="<?php echo $sidebar['id']; ?>"<?php if ( get_option( $value['id'] ) == $sidebar['id'] ) { echo ' selected="selected"'; } ?>><?php echo $sidebar['name']; ?></option>
				<?php } else { ?>				
					<option value="<?php echo $sidebar['id']; ?>"<?php if ( $value['std'] == $sidebar['id'] ) { echo ' selected="selected"'; } ?>><?php echo $sidebar['name']; ?></option>				
		<?php }}} ?>	
		</select>
		<?php if ( ( $value['desc'] ) ) { ?><div class="option-desc"><?php echo $value['desc']; ?></div><?php } ?>
	</div>

	
<?php
break;
case "checkbox":
?>
   
   
   	<?php if ( isset( $value['name'] ) ) { ?><h3><?php echo $value['name']; ?></h3><?php } ?>
	<div class="option<?php if ( $value['extras'] == "multi" ) { ?> multi-checkbox<?php } ?>">
		<?php if ( get_option( $value['id'] ) ) { $checked = 'checked="checked"'; } else { $checked = ''; } ?><input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value='true' <?php echo $checked; ?> />
		<?php if ( ( $value['desc'] ) ) { ?><div class="option-desc"><?php echo $value['desc']; ?></div><?php } ?>
	</div>


<?php        
break;
case "radio":
?>

	<?php if ( isset( $value['name'] ) ) { ?><h3><?php echo $value['name']; ?></h3><?php } ?>
	<div class="option"<?php if ( isset( $value['style'] ) ) { ?> style="<?php echo $value['style']; ?>"<?php } ?>>
		<?php foreach( $value['options'] as $key=>$option ) {	
			$radio_setting = get_option( $value['id'] );
			if ( $radio_setting != '' ) {
				if ( $key == get_option( $value['id'] ) ) {
					$checked = 'checked="checked"';
				} else {
					$checked = '';
				}
			} else {
				if ( $key == $value['std'] ) {
					$checked = 'checked="checked"';
				} else {
					$checked = '';
				}
			} ?>
			<div class="radio-buttons">
				<input type="radio" name="<?php echo $value['id']; ?>" id="<?php echo $value['id'] . $key; ?>" value="<?php echo $key; ?>" <?php echo $checked; ?> /><label for="<?php echo $value['id'] . $key; ?>"><?php echo $option; ?></label>
			</div>	
		<?php } ?>
		<div class="clear"></div>
		<?php if ( ( $value['desc'] ) ) { ?><div class="option-desc"><?php echo $value['desc']; ?></div><?php } ?>
	</div>


<?php        
break;
case "colorpicker":
?>

	<?php if ( isset( $value['name'] ) ) { ?><h3><?php echo $value['name']; ?></h3><?php } ?>
	<div class="option"<?php if ( isset( $value['style'] ) ) { ?> style="<?php echo $value['style']; ?>"<?php } ?>>
		<script type="text/javascript">
			jQuery( document ).ready( function( $ ) {  
				$( "#<?php echo $value['id']; ?>" ).wpColorPicker();
			});
		</script>
		<input type="text" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="<?php if ( get_option( $value['id'] ) != '' ) { echo get_option( $value['id'] ); } else { if ( isset( $value['std'] ) ) { if ( isset( $value['std'] ) ) { echo $value['std']; } } } ?>" />
		<?php if ( ( $value['desc'] ) ) { ?><div class="option-desc"><?php echo $value['desc']; ?></div><?php } ?>
	</div>


<?php        
break;
}}
?>

	</div>
	
	<div class="submit">

			<input name="save" type="submit" class="button-primary right" value="<?php esc_html_e( 'Save Changes', 'buddy' ); ?>" />
			<input type="hidden" name="action" value="save" />

		</form>
	
		<form method="post" onSubmit="if ( confirm( '<?php esc_html_e( 'Are you sure you want to reset all the theme options&#63;', 'buddy' ); ?>' ) ) return true; else return false;">	
			<input name="reset" type="submit" class="button right" style="margin-right: 10px;" value="<?php esc_html_e( 'Reset', 'buddy' ); ?>" />
			<input type="hidden" name="action" value="reset" />			
		</form>
		
		<div class="clear"></div>
	
	</div>

</div>

<!-- END THEME WRAPPER -->


<?php } 

if ( $pagenow == "admin.php" ) {
	function ghostpool_admin_scripts() {
		wp_enqueue_style( 'thickbox' );
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_style( 'gp-admin-css', ghostpool_css_uri . 'admin.css' );
		wp_enqueue_script( 'jquery-ui-core' );
		wp_enqueue_script( 'jquery-ui-sortable' );
		wp_enqueue_script( 'thickbox' );
		wp_enqueue_media();
		wp_enqueue_script( 'gp-tabs', ghostpool_scripts_uri . 'jquery.tabs.js', array( 'jquery' ) );
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'gp-uploader', ghostpool_scripts_uri . 'uploader.js' );
	}
	add_action( 'admin_enqueue_scripts', 'ghostpool_admin_scripts' );
}

add_action( 'admin_menu', 'ghostpool_add_admin' ); 


// Export Theme Options
function export_settings() {
	global $options;
	header( "Cache-Control: public, must-revalidate" );
	header( "Pragma: hack" );
	header( "Content-Type: text/plain" );
	header( 'Content-Disposition: attachment; filename="theme-options-'.date( "dMy").'.dat"' );
	foreach( $options as $value ) $theme_settings[$value['id']] = get_option( $value['id'] );	
	echo serialize( $theme_settings );
}

// Import Theme Options
function import_settings() {
	global $options;
	if ( $_FILES["file"]["error"] > 0 ) {
		echo "Error: " . $_FILES["file"]["error"] . "<br />";
	} else {
		$rawdata = file_get_contents( $_FILES["file"]["tmp_name"] );		
		$theme_settings = unserialize( $rawdata );		
		foreach( $options as $value ) {
			if ( $theme_settings[$value['id']] ) {
				update_option( $value['id'], $theme_settings[$value['id']] );
				$$value['id'] = $theme_settings[$value['id']];
			} else {
				if ( $value['type'] == 'checkbox_multiple' )$$value['id'] = array();
				else $$value['id'] = $value['std'];
			}
		}
		
	}
	if ( in_array( 'cacheStyles', get_option( 'theme_misc' ) ) ) cache_settings();
	wp_redirect( $_SERVER['PHP_SELF'].'?page=theme-options.php' );
}

// Help Tab
if ( is_admin() && $pagenow == "admin.php" ) {
	function theme_help_tab() {
		global $dirname;
		$screen = get_current_screen();
		$screen->add_help_tab( array( 
			'id' => 'help', 'title' => 'Help', 'content' => '<p><a href="http://ghostpool.com/help/' . $dirname . '/help.html" target="_blank">' . esc_html__( 'Help File', 'buddy' ) . '</a></p><p><a href="http://ghostpool.com/help/' . $dirname . '/changelog.html" target="_blank">' . esc_html__( 'Changelog', 'buddy').'</a></p><p><a href="http://ghostpool.ticksy.com" target="_blank">' . esc_html__( 'Support', 'buddy' ) . '</a></p><p><a href="http://www.ourwebmedia.com/ghostpool.php?aff=002" target="_blank">' . esc_html__( 'Premium Services', 'buddy' ) . '</a></p>'
		 ) );	
	}
	add_action( 'admin_head', 'theme_help_tab' );
}


/////////////////////////////////////// Save Default Theme Options ///////////////////////////////////////

function ghostpool_theme_options_setup() {

	global $dirname;
	
	if ( get_option( $dirname . '_theme_setup_status' ) !== '1' ) {
	
		$core_settings = array( 
		
			/* General */
			$dirname . '_fixed_header' => 'gp-fixed-header',
			$dirname . '_responsive' => '0',
			$dirname . '_retina' => '0',	
			$dirname . '_back_to_top' => 'gp-back-to-top',
			$dirname . '_lightbox' => 'gp-lightbox-group',
			$dirname . '_profile_button' => 'gp-profile-all',
			$dirname . '_jwplayer' => '1',			
			$dirname . '_old_video_shortcode' => '1',		
			$dirname . '_preload' => '1',
					
			/* Post Categories */
			$dirname . '_cat_thumbnail_width' => '200',
			$dirname . '_cat_thumbnail_height' => '150',
			$dirname . '_cat_image_wrap' => 'Enable',		
			$dirname . '_cat_hard_crop' => 'Enable',
			$dirname . '_cat_sidebar_left' => 'gp-default-left',
			$dirname . '_cat_sidebar_right' => 'gp-default-right',	
			$dirname . '_cat_layout' => 'sb-both',					
			$dirname . '_cat_title' => 'Show',						
			$dirname . '_cat_content_display' => '0',
			$dirname . '_cat_excerpt_length' => '400',
			$dirname . '_cat_read_more' => '0',
			$dirname . '_cat_date' => '0',
			$dirname . '_cat_author' => '0',
			$dirname . '_cat_cats' => '0',
			$dirname . '_cat_comments' => '0',
			$dirname . '_cat_tags' => '1',
			
			/* Posts */
			$dirname . '_show_post_image' => 'Show',
			$dirname . '_post_image_width' => '1003',
			$dirname . '_post_image_height' => '380',
			$dirname . '_post_image_wrap' => 'Disable',
			$dirname . '_post_hard_crop' => 'Enable',
			$dirname . '_post_sidebar_left' => 'gp-default-left',
			$dirname . '_post_sidebar_right' => 'gp-default-right',	
			$dirname . '_post_layout' => 'sb-both',	
			$dirname . '_post_title' => 'Show',	
			$dirname . '_post_date' => '0',
			$dirname . '_post_author' => '0',
			$dirname . '_post_cats' => '0',
			$dirname . '_post_comments' => '0',
			$dirname . '_post_tags' => '1',	
			$dirname . '_post_author_info' => '0',	
			$dirname . '_post_related_items' => '0',	
			$dirname . '_post_related_image_width' => '340',	
			$dirname . '_post_related_image_height' => '290',			
			
			/* Pages */
			$dirname . '_show_page_image' => 'Show',
			$dirname . '_page_image_width' => '1003',
			$dirname . '_page_image_height' => '380',
			$dirname . '_page_image_wrap' => 'Disable',
			$dirname . '_page_hard_crop' => 'Enable',
			$dirname . '_page_sidebar_left' => 'gp-default-left',
			$dirname . '_page_sidebar_right' => 'gp-default-right',	
			$dirname . '_page_layout' => 'sb-both',	
			$dirname . '_page_title' => 'Show',					
			$dirname . '_page_date' => '1',
			$dirname . '_page_author' => '1',
			$dirname . '_page_comments' => '1',	
			$dirname . '_page_author_info' => '1',
			
			/* BuddyPress */
			$dirname . '_bp_buttons' => '0',
			$dirname . '_login_url' => esc_url( home_url( '/login' ) ),
			$dirname . '_bp_sidebar_left' => 'gp-default-left',
			$dirname . '_bp_sidebar_right' => 'gp-default-right',	
			$dirname . '_bp_layout' => 'sb-both',	
			$dirname . '_bp_title' => 'Show',

			/* bbPress */
			$dirname . '_bbp_sidebar_left' => 'gp-default-left',
			$dirname . '_bbp_sidebar_right' => 'gp-default-right',	
			$dirname . '_bbp_layout' => 'sb-right',	
			$dirname . '_bbp_title' => 'Show',
			
			/* Theme Widths */
			$dirname . '_desktop_page_width' => '1200',		
			$dirname . '_desktop_content_width_1' => '935',		
			$dirname . '_desktop_content_width_2' => '670',		
			$dirname . '_desktop_single_sidebar_width' => '245',		
			$dirname . '_desktop_double_sidebar_width' => '245',		
			$dirname . '_tablet_l_page_width' => '1000',		
			$dirname . '_tablet_l_content_width_1' => '775',		
			$dirname . '_tablet_l_content_width_2' => '550',		
			$dirname . '_tablet_l_single_sidebar_width' => '205',		
			$dirname . '_tablet_l_double_sidebar_width' => '205',		
																									
		 );
		foreach( $core_settings as $k => $v ) {
			update_option( $k, $v );
		}

		update_option( $dirname . '_theme_setup_status', '1' );

	}		

}
add_action( 'after_setup_theme', 'ghostpool_theme_options_setup' );

?>