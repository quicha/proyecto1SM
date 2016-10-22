<?php

/*
 * Class MP_Profit_Customizer
 *
 * add actions for default widgets if footer
 */
require get_template_directory() . '/inc/admin/customise-classes.php';

class MP_Profit_Customizer {

	private $prefix;

	public function __construct() {
		$this->prefix = 'mp_profit';
		//Handles the theme's theme customizer functionality.
		add_action( 'customize_register', array( $this, 'customize_register' ) );
		add_action( 'after_setup_theme', array( $this, 'custom_header_setup' ), 11 );
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'customize_control_js' ) );
		add_action( 'customize_preview_init', array( $this, 'customize_preview_js' ) );
	}

	/**
	 * Get prefix.
	 *
	 * @access public
	 * @return sting
	 */
	private function getPrefix() {
		return $this->prefix . '_';
	}

	/**
	 * Set up the WordPress core custom header arguments and settings.
	 *
	 * @uses add_theme_support() to register support for 3.4 and up.
	 * @uses
	 * mp_profit_header_style() to style front-end.
	 *
	 * @since Profit 1.0
	 */
	function custom_header_setup() {
		$mp_profit_color_scheme = $this->get_color_scheme();
		$mp_profit_args         = array(
			// Text color and image (empty to use none).
			'default-text-color'     => $mp_profit_color_scheme[1],
			'wp-head-callback'       => $this->getPrefix() . 'header_style',
			'admin-head-callback'    => $this->getPrefix() . 'header_style',
			'admin-preview-callback' => $this->getPrefix() . 'header_style',
		);

		add_theme_support( 'custom-header', $mp_profit_args );
	}

	/**
	 * Sets up the theme customizer sections, controls, and settings.
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @param  object $wp_customize
	 *
	 * @return void
	 */
	function customize_register( $wp_customize ) {

		/* Enable live preview for WordPress theme features. */
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
		$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';

		$wp_customize->remove_section( "header_image" );
		$mp_profit_color_scheme = $this->get_color_scheme();

		/*
		 * Add 'gemeral' section
		 */
		$wp_customize->add_section(
			$this->getPrefix() . 'general_section', array(
				'title'      => esc_html__( 'General', 'profit-lite' ),
				'priority'   => 20,
				'capability' => 'edit_theme_options'
			)
		);
		/*
		 *  Add the 'Show sticky menu' setting.
		 */
		$wp_customize->add_setting( $this->getPrefix() . 'show_sticky_menu', array(
			'default'           => 1,
			'sanitize_callback' => array( $this, 'sanitize_checkbox' ),
		) );
		/*
		 * Add the upload control for the 'Show sticky menu' setting.
		 */
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize, $this->getPrefix() . 'show_sticky_menu', array(
				'label'    => esc_html__( 'Sticky menu on scroll', 'profit-lite' ),
				'section'  => $this->getPrefix() . 'general_section',
				'settings' => $this->getPrefix() . 'show_sticky_menu',
				'type'     => 'checkbox',
				'priority' => 1
			) )
		);
		/*
		 * Add the 'copyright ' setting.
		 */
		
		/*
		 *  Add color scheme setting and control.
		 */
		$wp_customize->add_setting( $this->getPrefix() . 'color_scheme', array(
			'sanitize_callback' => array( $this, 'sanitize_color_scheme' ),
			'default'           => 'default',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( $this->getPrefix() . 'color_scheme', array(
			'label'    => __( 'Base Color Scheme', 'profit-lite' ),
			'section'  => 'colors',
			'type'     => 'select',
			'choices'  => $this->get_color_scheme_choices(),
			'priority' => 1,
		) );

// Brand Color
		$wp_customize->add_setting( $this->getPrefix() . 'color_text', array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => MP_PROFIT_THEME_TEXT_COLOR,
			'type'              => 'option',
			'capability'        => 'edit_theme_options'
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $this->getPrefix() . 'color_text', array(
			'label'    => __( 'Text Color', 'profit-lite' ),
			'section'  => 'colors',
			'settings' => $this->getPrefix() . 'color_text',
		) ) );
		$wp_customize->add_setting( $this->getPrefix() . 'color_primary', array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => $mp_profit_color_scheme[0],
			'type'              => 'option',
			'capability'        => 'edit_theme_options'
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $this->getPrefix() . 'color_primary', array(
			'label'    => __( 'Accent Color', 'profit-lite' ),
			'section'  => 'colors',
			'settings' => $this->getPrefix() . 'color_primary'
		) ) );
		/*
		 * Add 'logo' section
		 */
		//$mp_profit_logo_section_title = esc_html__( 'Logo', 'profit-lite' );

		// $wp_customize->add_section(
			// $this->getPrefix() . 'logo_section', array(
				// 'title'      => $mp_profit_logo_section_title,
				// 'priority'   => 30,
				// 'capability' => 'edit_theme_options'
			// )
		// );

		// /*
		 // * Add the 'logo' upload setting.
		 // */
		// $wp_customize->add_setting(
			// $this->getPrefix() . 'logo', array(
				// 'sanitize_callback' => 'esc_url_raw',
				// 'default'           => false,
				// 'capability'        => 'edit_theme_options',
			// )
		// );

		/*
		 * Add the upload control for the $this->getPrefix().'logo' setting.
		 */
		// $wp_customize->add_control(
			// new WP_Customize_Image_Control(
				// $wp_customize, $this->getPrefix() . 'logo', array(
					// 'label'    => esc_html__( 'Logo', 'profit-lite' ),
					// 'section'  => $this->getPrefix() . 'logo_section',
					// 'settings' => $this->getPrefix() . 'logo',
				// )
			// )
		// );

		/* Add 'header_socials' section */
		$wp_customize->add_section(
			$this->getPrefix() . 'header_socials', array(
				'title'      => esc_html__( 'Social Links', 'profit-lite' ),
				'priority'   => 78,
				'capability' => 'edit_theme_options'
			)
		);
		/* Add the 'facebook link' setting. */
		$wp_customize->add_setting(
			$this->getPrefix() . 'facebook_link', array(
				'sanitize_callback' => array( $this, 'sanitize_text' ),
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'transport'         => 'postMessage',
			)
		);

		/* Add the upload control for the 'facebook link' setting. */
		$wp_customize->add_control(
			$this->getPrefix() . 'facebook_link', array(
				'label'    => esc_html__( 'Facebook link', 'profit-lite' ),
				'section'  => $this->getPrefix() . 'header_socials',
				'settings' => $this->getPrefix() . 'facebook_link',
			)
		);
		/* Add the 'twitter link' setting. */
		$wp_customize->add_setting(
			$this->getPrefix() . 'twitter_link', array(
				'sanitize_callback' => 'esc_url_raw',
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'transport'         => 'postMessage',
			)
		);

		/* Add the upload control for the 'twitter link' setting. */
		$wp_customize->add_control(
			$this->getPrefix() . 'twitter_link', array(
				'label'    => esc_html__( 'Twitter link', 'profit-lite' ),
				'section'  => $this->getPrefix() . 'header_socials',
				'settings' => $this->getPrefix() . 'twitter_link',
			)
		);

		/* Add the 'linkedin link' setting. */
		$wp_customize->add_setting(
			$this->getPrefix() . 'linkedin_link', array(
				'sanitize_callback' => 'esc_url_raw',
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'transport'         => 'postMessage',
			)
		);

		/* Add the upload control for the 'linkedin link' setting. */
		$wp_customize->add_control(
			$this->getPrefix() . 'linkedin_link', array(
				'label'    => esc_html__( 'LinkedIn link', 'profit-lite' ),
				'section'  => $this->getPrefix() . 'header_socials',
				'settings' => $this->getPrefix() . 'linkedin_link',
			)
		);
		/* Add the 'google plus link' setting. */
		$wp_customize->add_setting(
			$this->getPrefix() . 'google_plus_link', array(
				'sanitize_callback' => 'esc_url_raw',
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'transport'         => 'postMessage',
			)
		);

		/* Add the upload control for the 'google plus link' setting. */
		$wp_customize->add_control(
			$this->getPrefix() . 'google_plus_link', array(
				'label'    => esc_html__( 'Google+ link', 'profit-lite' ),
				'section'  => $this->getPrefix() . 'header_socials',
				'settings' => $this->getPrefix() . 'google_plus_link',
			)
		);
		/* Add the 'Instagram link' setting. */
		$wp_customize->add_setting(
			$this->getPrefix() . 'instagram_link', array(
				'sanitize_callback' => 'esc_url_raw',
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'transport'         => 'postMessage',
			)
		);

		/* Add the upload control for the 'Instagram link' setting. */
		$wp_customize->add_control(
			$this->getPrefix() . 'instagram_link', array(
				'label'    => esc_html__( 'Instagram link', 'profit-lite' ),
				'section'  => $this->getPrefix() . 'header_socials',
				'settings' => $this->getPrefix() . 'instagram_link',
			)
		);

		/* Add the 'pinterest link' setting. */
		$wp_customize->add_setting(
			$this->getPrefix() . 'pinterest_link', array(
				'sanitize_callback' => 'esc_url_raw',
				'capability'        => 'edit_theme_options',
				'transport'         => 'postMessage',
			)
		);
		/* Add the upload control for the 'pinterest link' setting. */
		$wp_customize->add_control(
			$this->getPrefix() . 'pinterest_link', array(
				'label'    => esc_html__( 'Pinterest link', 'profit-lite' ),
				'section'  => $this->getPrefix() . 'header_socials',
				'settings' => $this->getPrefix() . 'pinterest_link',
			)
		);
		 /* Add the 'tumblrlink' setting. */
		$wp_customize->add_setting(
			$this->getPrefix() . 'tumblr_link', array(
				'sanitize_callback' => 'esc_url_raw',
				'capability'        => 'edit_theme_options',
				'transport'         => 'postMessage',
			)
		);
		/* Add the upload control for the 'tumblr link' setting. */
		$wp_customize->add_control(
			$this->getPrefix() . 'tumblr_link', array(
				'label'    => esc_html__( 'Tumblr link', 'profit-lite' ),
				'section'  => $this->getPrefix() . 'header_socials',
				'settings' => $this->getPrefix() . 'tumblr_link',
			)
		);
		/* Add the 'youtube link' setting. */
		$wp_customize->add_setting(
			$this->getPrefix() . 'youtube_link', array(
				'sanitize_callback' => 'esc_url_raw',
				'capability'        => 'edit_theme_options',
				'transport'         => 'postMessage',
			)
		);
		/* Add the upload control for the 'google plus link' setting. */
		$wp_customize->add_control(
			$this->getPrefix() . 'youtube_link', array(
				'label'    => esc_html__( 'Youtube link', 'profit-lite' ),
				'section'  => $this->getPrefix() . 'header_socials',
				'settings' => $this->getPrefix() . 'youtube_link',
			)
		);
		/* Add the 'google plus link' setting. */
		$wp_customize->add_setting(
			$this->getPrefix() . 'rss_link', array(
				'sanitize_callback' => 'esc_url_raw',
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'transport'         => 'postMessage',
			)
		);

		/* Add the upload control for the 'google plus link' setting. */
		$wp_customize->add_control(
			$this->getPrefix() . 'rss_link', array(
				'label'    => esc_html__( 'Rss link', 'profit-lite' ),
				'section'  => $this->getPrefix() . 'header_socials',
				'settings' => $this->getPrefix() . 'rss_link',
			)
		);

		/* Add 'header_socials' section */
		$wp_customize->add_section(
			$this->getPrefix() . 'posts_settings', array(
				'title'      => esc_html__( 'Posts Settings', 'profit-lite' ),
				'priority'   => 100,
				'capability' => 'edit_theme_options'
			)
		);
		/*
		 *  Add blog type.
		 */
		$wp_customize->add_setting( $this->getPrefix() . 'blog_style', array(
			'default'           => 'masonry',
			'sanitize_callback' => array( $this, 'sanitize_text' ),
		) );

		$wp_customize->add_control( $this->getPrefix() . 'blog_style', array(
			'label'   => __( 'Blog Layout', 'profit-lite' ),
			'section' => $this->getPrefix() . 'posts_settings',
			'type'    => 'select',
			'choices' => $this->blog_list()
		) );
		/* Add the 'Show meta' setting. */
		$wp_customize->add_setting( $this->getPrefix() . 'show_meta', array(
			'sanitize_callback' => array( $this, 'sanitize_checkbox' ),
			'default'           => '1',
		) );
		/* Add the upload control for the 'Show meta' setting. */
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize, $this->getPrefix() . 'show_meta', array(
				'label'    => esc_html__( 'Show Meta', 'profit-lite' ),
				'section'  => $this->getPrefix() . 'posts_settings',
				'settings' => $this->getPrefix() . 'show_meta',
				'type'     => 'checkbox',
			) )
		);
		/* Add the 'Show Categories' setting. */
		$wp_customize->add_setting( $this->getPrefix() . 'show_categories', array(
			'default'           => '1',
			'sanitize_callback' => array( $this, 'sanitize_checkbox' ),
		) );
		/* Add the upload control for the 'Show Categories'setting. */
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize, $this->getPrefix() . 'show_categories', array(
				'label'    => esc_html__( 'Show Categories', 'profit-lite' ),
				'section'  => $this->getPrefix() . 'posts_settings',
				'settings' => $this->getPrefix() . 'show_categories',
				'type'     => 'checkbox',
			) )
		);
		/* Add the 'Show Tags' setting. */
		$wp_customize->add_setting( $this->getPrefix() . 'show_tags', array(
			'default'           => '1',
			'sanitize_callback' => array( $this, 'sanitize_checkbox' ),
		) );
		/* Add the upload control for the 'Show Tags' setting. */
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize, $this->getPrefix() . 'show_tags', array(
				'label'    => esc_html__( 'Show Tags', 'profit-lite' ),
				'section'  => $this->getPrefix() . 'posts_settings',
				'settings' => $this->getPrefix() . 'show_tags',
				'type'     => 'checkbox',
			) )
		);

		/*
		 * Add the 'second to call action section'.
		 */
		$wp_customize->add_section(
			$this->getPrefix() . 'second_action_section', array(
				'title'      => __( 'Second to Call Action Section', 'profit-lite' ),
				'priority'   => 83,
				'capability' => 'edit_theme_options'
			)
		);

		/*
		 * Add the 'Hide second_action section?' setting.
		 */
		$wp_customize->add_setting( $this->getPrefix() . 'second_action_show', array(
			'default'           => 0,
			'sanitize_callback' => array( $this, 'sanitize_checkbox' ),
		) );
		/*
		 *  Add the upload control for the 'Hide second_action section?' setting.
		 */
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize, $this->getPrefix() . 'second_action_show', array(
				'label'    => esc_html__( 'Hide this section', 'profit-lite' ),
				'section'  => $this->getPrefix() . 'second_action_section',
				'settings' => $this->getPrefix() . 'second_action_show',
				'type'     => 'checkbox',
				'priority' => 1,
			) )
		);
		/*
		 * Add the 'second to call action' setting.
		 */
		$wp_customize->add_setting( $this->getPrefix() . 'second_action_title', array(
			'default'           => __( 'Boost your business right now', 'profit-lite' ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => array( $this, 'sanitize_text' ),
			'transport'         => 'postMessage'
		) );
		/*
		 * Add the upload control for the 'second to call action' setting.
		 */
		$wp_customize->add_control( $this->getPrefix() . 'second_action_title', array(
			'label'    => __( 'Title', 'profit-lite' ),
			'section'  => $this->getPrefix() . 'second_action_section',
			'settings' => $this->getPrefix() . 'second_action_title',
			'priority' => 2
		) );
		/*
		 * Add the 'second to call action' setting.
		 */
		$wp_customize->add_setting( $this->getPrefix() . 'second_action_subtitle', array(
			'default'           => __( 'Focus on your business and leave all money questions to us.', 'profit-lite' ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => array( $this, 'sanitize_text' ),
			'transport'         => 'postMessage'
		) );
		/*
		 * Add the upload control for the 'second to call action' setting.
		 */
		$wp_customize->add_control( $this->getPrefix() . 'second_action_subtitle', array(
			'label'    => __( 'Sub Title', 'profit-lite' ),
			'section'  => $this->getPrefix() . 'second_action_section',
			'settings' => $this->getPrefix() . 'second_action_subtitle',
			'priority' => 2
		) );
		/*
		 * Add the 'second to call action' setting.
		 */
		$wp_customize->add_setting( $this->getPrefix() . 'second_action_description', array(
			'sanitize_callback' => array( $this, 'sanitize_text' ),
			'default'           => __( 'Our company has more than 20 years of experience in trading market and knows what exactly our customers and partners need to succeed in business. Just give us a try and we&rsquo;ll provide you with high level service and professional solutions.', 'profit-lite' ),
			'capability'        => 'edit_theme_options',
			'transport'         => 'postMessage'
		) );
		/*
		 * Add the upload control for the 'second to call action' setting.
		 */
		$wp_customize->add_control( new MP_Profit_Customize_Textarea_Control( $wp_customize, $this->getPrefix() . 'second_action_description', array(
			'label'    => __( 'Description', 'profit-lite' ),
			'section'  => $this->getPrefix() . 'second_action_section',
			'settings' => $this->getPrefix() . 'second_action_description',
			'priority' => 3
		) ) );
		/*
		 * Add the 'second to call actionsecond_action brand button label' setting.
		 */
		$wp_customize->add_setting( $this->getPrefix() . 'second_action_brandbutton_label', array(
			'sanitize_callback' => array( $this, 'sanitize_text' ),
			'default'           => __( 'Know More', 'profit-lite' ),
			'capability'        => 'edit_theme_options',
			'transport'         => 'postMessage'
		) );
		/*
		 * Add the upload control for the 'second to call action brand button label' setting.
		 */
		$wp_customize->add_control( $this->getPrefix() . 'second_action_brandbutton_label', array(
			'label'    => __( 'Button label', 'profit-lite' ),
			'section'  => $this->getPrefix() . 'second_action_section',
			'settings' => $this->getPrefix() . 'second_action_brandbutton_label',
			'priority' => 4
		) );
		/*
		 * Add the 'second to call action brand button url' setting.
		 */
		$wp_customize->add_setting( $this->getPrefix() . 'second_action_brandbutton_url', array(
			'sanitize_callback' => array( $this, 'sanitize_text' ),
			'default'           => '#',
			'capability'        => 'edit_theme_options',
			'transport'         => 'postMessage'
		) );
		/*
		 * Add the upload control for the 'second to call action brand button url' setting.
		 */
		$wp_customize->add_control( $this->getPrefix() . 'second_action_brandbutton_url', array(
			'label'    => __( 'Button url', 'profit-lite' ),
			'section'  => $this->getPrefix() . 'second_action_section',
			'settings' => $this->getPrefix() . 'second_action_brandbutton_url',
			'priority' => 5
		) );
		/*
		* Add the 'second to call action  position' setting.
		*/
		$wp_customize->add_setting( $this->getPrefix() . 'second_action_position', array(
			'default'           => 70,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => array( $this, 'sanitize_position' )
		) );
		/*
		 * Add the upload control for the  'second to call action  position' setting.
		 */
		$wp_customize->add_control( $this->getPrefix() . 'second_action_position', array(
			'label'    => __( 'Section position', 'profit-lite' ),
			'section'  => $this->getPrefix() . 'second_action_section',
			'settings' => $this->getPrefix() . 'second_action_position',
			'priority' => 30
		) );
		/*
		 * Add the 'news section'.
		 */
		$wp_customize->add_section(
			$this->getPrefix() . 'news_section', array(
				'title'       => __( 'News Section', 'profit-lite' ),
				'priority'    => 86,
				'capability'  => 'edit_theme_options',
				'description' => __( '<i>Automatically filled by your latest posts.</i><hr/>', 'profit-lite' )
			)
		);

		/*
		 * Add the 'Hide news section?' setting.
		 */
		$wp_customize->add_setting( $this->getPrefix() . 'news_show', array(
			'default'           => 0,
			'sanitize_callback' => array( $this, 'sanitize_checkbox' ),
		) );
		/*
		 *  Add the upload control for the 'news title section?' setting.
		 */
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize, $this->getPrefix() . 'news_show', array(
				'label'    => esc_html__( 'Hide this section', 'profit-lite' ),
				'section'  => $this->getPrefix() . 'news_section',
				'settings' => $this->getPrefix() . 'news_show',
				'type'     => 'checkbox',
				'priority' => 1,
			) )
		);
		/*
		 * Add the 'news' setting.
		 */
		$wp_customize->add_setting( $this->getPrefix() . 'news_title', array(
			'sanitize_callback' => array( $this, 'sanitize_text' ),
			'default'           => __( 'Financial news', 'profit-lite' ),
			'capability'        => 'edit_theme_options',
			'transport'         => 'postMessage'
		) );
		/*
		 * Add the upload control for the 'news' setting.
		 */
		$wp_customize->add_control( $this->getPrefix() . 'news_title', array(
			'label'    => __( 'Title', 'profit-lite' ),
			'section'  => $this->getPrefix() . 'news_section',
			'settings' => $this->getPrefix() . 'news_title',
			'priority' => 2
		) );

		/*
		 * Add the 'news' setting.
		 */
		$wp_customize->add_setting( $this->getPrefix() . 'news_subtitle', array(
			'sanitize_callback' => array( $this, 'sanitize_text' ),
			'default'           => __( 'All the latest financial news', 'profit-lite' ),
			'capability'        => 'edit_theme_options',
			'transport'         => 'postMessage'
		) );
		/*
		 * Add the upload control for the 'news' setting.
		 */
		$wp_customize->add_control( new MP_Profit_Customize_Textarea_Control( $wp_customize, $this->getPrefix() . 'news_subtitle', array(
			'label'    => __( 'Sub Title', 'profit-lite' ),
			'section'  => $this->getPrefix() . 'news_section',
			'settings' => $this->getPrefix() . 'news_subtitle',
			'priority' => 3
		) ) );
		/*
		 * Add the 'install brand button label' setting.
		 */
		$wp_customize->add_setting( $this->getPrefix() . 'news_button_label', array(
			'sanitize_callback' => array( $this, 'sanitize_text' ),
			'default'           => __( 'Read all news', 'profit-lite' ),
			'capability'        => 'edit_theme_options',
			'transport'         => 'postMessage'
		) );
		/*
		 * Add the upload control for the 'last news button label' setting.
		 */
		$wp_customize->add_control( $this->getPrefix() . 'news_button_label', array(
			'label'    => __( 'Button label', 'profit-lite' ),
			'section'  => $this->getPrefix() . 'news_section',
			'settings' => $this->getPrefix() . 'news_button_label',
			'priority' => 4
		) );
		/*
		 * Add the 'last news button url' setting.
		 */
		$wp_customize->add_setting( $this->getPrefix() . 'news_button_url', array(
			'sanitize_callback' => array( $this, 'sanitize_text' ),
			'default'           => '#',
			'capability'        => 'edit_theme_options',
			'transport'         => 'postMessage'
		) );
		/*
		 * Add the upload control for the 'last news button url' setting.
		 */
		$wp_customize->add_control( $this->getPrefix() . 'news_button_url', array(
			'label'    => __( 'Button url', 'profit-lite' ),
			'section'  => $this->getPrefix() . 'news_section',
			'settings' => $this->getPrefix() . 'news_button_url',
			'priority' => 5
		) );
		/*
		* Add the 'news  position' setting.
		*/
		$wp_customize->add_setting( $this->getPrefix() . 'news_position', array(
			'default'           => 100,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => array( $this, 'sanitize_position' )
		) );
		/*
		 * Add the upload control for the  'news  position' setting.
		 */
		$wp_customize->add_control( $this->getPrefix() . 'news_position', array(
			'label'    => __( 'Section position', 'profit-lite' ),
			'section'  => $this->getPrefix() . 'news_section',
			'settings' => $this->getPrefix() . 'news_position',
			'priority' => 30
		) );

		/*
		 * Add the 'newsletter section'.
		 */
		$wp_customize->add_section(
			$this->getPrefix() . 'newsletter_section', array(
				'title'       => __( 'Newsletter Form Section', 'profit-lite' ),
				'priority'    => 88,
				'capability'  => 'edit_theme_options',
				'description' => __( '<i>Fill in this section by adding widgets to "Customize > Widgets > Newsletter Form section"</i><hr/>', 'profit-lite' )
			)
		);
		/*
		 * Add the 'Hide faetures section?' setting.
		 */
		$wp_customize->add_setting( $this->getPrefix() . 'newsletter_show', array(
			'default'           => 0,
			'sanitize_callback' => array( $this, 'sanitize_checkbox' ),
		) );
		/*
		 *  Add the upload control for the 'newsletter title section?' setting.
		 */
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize, $this->getPrefix() . 'newsletter_show', array(
				'label'    => esc_html__( 'Hide this section', 'profit-lite' ),
				'section'  => $this->getPrefix() . 'newsletter_section',
				'settings' => $this->getPrefix() . 'newsletter_show',
				'type'     => 'checkbox',
				'priority' => 1,
			) )
		);
		/*
		 * Add the 'newsletter' setting.
		 */
		$wp_customize->add_setting( $this->getPrefix() . 'newsletter_title', array(
			'sanitize_callback' => array( $this, 'sanitize_text' ),
			'default'           => __( 'Subscribe for news and deals', 'profit-lite' ),
			'capability'        => 'edit_theme_options',
			'transport'         => 'postMessage'
		) );
		/*
		 * Add the upload control for the 'newsletter' setting.
		 */
		$wp_customize->add_control( $this->getPrefix() . 'newsletter_title', array(
			'label'    => __( 'Title', 'profit-lite' ),
			'section'  => $this->getPrefix() . 'newsletter_section',
			'settings' => $this->getPrefix() . 'newsletter_title',
			'priority' => 2
		) );
		/*
		 * Add the 'newsletter' setting.
		 */
		$wp_customize->add_setting( $this->getPrefix() . 'newsletter_subtitle', array(
			'sanitize_callback' => array( $this, 'sanitize_text' ),
			'default'           => __( 'Integrates with MailChimp service', 'profit-lite' ),
			'capability'        => 'edit_theme_options',
			'transport'         => 'postMessage'
		) );
		/*
		 * Add the upload control for the 'newsletter' setting.
		 */
		$wp_customize->add_control( new MP_Profit_Customize_Textarea_Control( $wp_customize, $this->getPrefix() . 'newsletter_subtitle', array(
			'label'    => __( 'Description', 'profit-lite' ),
			'section'  => $this->getPrefix() . 'newsletter_section',
			'settings' => $this->getPrefix() . 'newsletter_subtitle',
			'priority' => 3
		) ) );

		/* Add the 'newsletter bg' upload setting. */
		$wp_customize->add_setting(
			$this->getPrefix() . 'newsletter_bg', array(
				'default'           => get_template_directory_uri() . '/images/newsletter-bg.jpg',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		/* Add the upload control for the 'newsletter bg' setting. */
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize, $this->getPrefix() . 'newsletter_bg', array(
					'label'    => esc_html__( 'Background', 'profit-lite' ),
					'section'  => $this->getPrefix() . 'newsletter_section',
					'settings' => $this->getPrefix() . 'newsletter_bg',
					'priority' => 6
				)
			)
		);
		/*
		* Add the 'newsletter  position' setting.
		*/
		$wp_customize->add_setting( $this->getPrefix() . 'newsletter_position', array(
			'default'           => 120,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => array( $this, 'sanitize_position' )
		) );
		/*
		 * Add the upload control for the  'newsletter  position' setting.
		 */
		$wp_customize->add_control( $this->getPrefix() . 'newsletter_position', array(
			'label'    => __( 'Section position', 'profit-lite' ),
			'section'  => $this->getPrefix() . 'newsletter_section',
			'settings' => $this->getPrefix() . 'newsletter_position',
			'priority' => 30
		) );

		/*
		 * Add the 'Service section'.
		 */
		$wp_customize->add_section(
			$this->getPrefix() . 'service_section', array(
				'title'      => __( 'Service Section', 'profit-lite' ),
				'priority'   => 89,
				'capability' => 'edit_theme_options'
			)
		);

		/*
		 * Add the 'Hide service section?' setting.
		 */
		$wp_customize->add_setting( $this->getPrefix() . 'service_show', array(
			'default'           => 0,
			'sanitize_callback' => array( $this, 'sanitize_checkbox' ),
		) );
		/*
		 *  Add the upload control for the 'Hide service section?' setting.
		 */
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize, $this->getPrefix() . 'service_show', array(
				'label'    => esc_html__( 'Hide this section', 'profit-lite' ),
				'section'  => $this->getPrefix() . 'service_section',
				'settings' => $this->getPrefix() . 'service_show',
				'type'     => 'checkbox',
				'priority' => 1,
			) )
		);
		/*
		 * Add the 'Service' setting.
		 */
		$wp_customize->add_setting( $this->getPrefix() . 'service_title', array(
			'sanitize_callback' => array( $this, 'sanitize_text' ),
			'default'           => __( 'Professional financial guidance', 'profit-lite' ),
			'capability'        => 'edit_theme_options',
			'transport'         => 'postMessage'
		) );
		/*
		 * Add the upload control for the 'Service title' setting.
		 */
		$wp_customize->add_control( $this->getPrefix() . 'service_title', array(
			'label'    => __( 'Title', 'profit-lite' ),
			'section'  => $this->getPrefix() . 'service_section',
			'settings' => $this->getPrefix() . 'service_title',
			'priority' => 2,
		) );
		/*
		 * Add the 'Service' setting.
		 */
		$wp_customize->add_setting( $this->getPrefix() . 'service_subtitle', array(
			'sanitize_callback' => array( $this, 'sanitize_text' ),
			'default'           => __( 'Offering ideas that raise your business above the expected', 'profit-lite' ),
			'capability'        => 'edit_theme_options',
			'transport'         => 'postMessage'
		) );
		/*
		 * Add the upload control for the 'Service title' setting.
		 */
		$wp_customize->add_control( $this->getPrefix() . 'service_subtitle', array(
			'label'    => __( 'Sub Title', 'profit-lite' ),
			'section'  => $this->getPrefix() . 'service_section',
			'settings' => $this->getPrefix() . 'service_subtitle',
			'priority' => 2,
		) );
		/*
		 * Add the 'Service description' setting.
		 */
		$wp_customize->add_setting( $this->getPrefix() . 'service_description', array(
			'sanitize_callback' => array( $this, 'sanitize_text' ),
			'default'           => __( 'Stay informed with all up to date market insights, trade ideas, financial researches and latest business news.', 'profit-lite' ),
			'capability'        => 'edit_theme_options',
			'transport'         => 'postMessage'
		) );
		/*
		 * Add the upload control for the 'Service description' setting.
		 */
		$wp_customize->add_control( new MP_Profit_Customize_Textarea_Control( $wp_customize, $this->getPrefix() . 'service_description', array(
			'label'    => __( 'Description', 'profit-lite' ),
			'section'  => $this->getPrefix() . 'service_section',
			'settings' => $this->getPrefix() . 'service_description',
			'priority' => 3
		) ) );

		/*
		 * Add the 'service button label' setting.
		 */
		$wp_customize->add_setting( $this->getPrefix() . 'service_button_label', array(
			'sanitize_callback' => array( $this, 'sanitize_text' ),
			'default'           => __( 'Know More', 'profit-lite' ),
			'capability'        => 'edit_theme_options',
			'transport'         => 'postMessage'
		) );

		/*
		 * Add the upload control for the 'Service button label' setting.
		 */
		$wp_customize->add_control( $this->getPrefix() . 'service_button_label', array(
			'label'    => __( 'Button label', 'profit-lite' ),
			'section'  => $this->getPrefix() . 'service_section',
			'settings' => $this->getPrefix() . 'service_button_label',
			'priority' => 4
		) );
		/*
		 * Add the 'Service button url' setting.
		 */
		$wp_customize->add_setting( $this->getPrefix() . 'service_button_url', array(
			'default'           => '#',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => array( $this, 'sanitize_text' ),
			'transport'         => 'postMessage'
		) );
		/*
		 * Add the upload control for the 'Service button url' setting.
		 */
		$wp_customize->add_control( $this->getPrefix() . 'service_button_url', array(
			'label'    => __( 'Button url', 'profit-lite' ),
			'section'  => $this->getPrefix() . 'service_section',
			'settings' => $this->getPrefix() . 'service_button_url',
			'priority' => 5
		) );
		/*
		 * Add the 'service image' upload setting.
		 */
		$wp_customize->add_setting(
			$this->getPrefix() . 'service_image', array(
				'sanitize_callback' => 'esc_url_raw',
				'default'           => get_template_directory_uri() . '/images/service-image.png',
				'capability'        => 'edit_theme_options',
			)
		);

		/*
		 * Add the upload control for the 'service image' setting.
		 */
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize, $this->getPrefix() . 'service_image', array(
					'label'    => esc_html__( 'Image', 'profit-lite' ),
					'section'  => $this->getPrefix() . 'service_section',
					'settings' => $this->getPrefix() . 'service_image',
					'priority' => 6
				)
			)
		);
		/*
		* Add the 'service  position' setting.
		*/
		$wp_customize->add_setting( $this->getPrefix() . 'service_position', array(
			'default'           => 130,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => array( $this, 'sanitize_position' )
		) );
		/*
		 * Add the upload control for the  'service  position' setting.
		 */
		$wp_customize->add_control( $this->getPrefix() . 'service_position', array(
			'label'    => __( 'Section position', 'profit-lite' ),
			'section'  => $this->getPrefix() . 'service_section',
			'settings' => $this->getPrefix() . 'service_position',
			'priority' => 30
		) );
	}

	/**
	 * Sanitize text
	 *
	 * @since  1.0.1
	 * @access public
	 * @return sanitized output
	 */
	function sanitize_text( $txt ) {
		return wp_kses_post( force_balance_tags( $txt ) );
	}

	/**
	 * Sanitize checkbox
	 *
	 * @since  1.0.1
	 * @access public
	 * @return sanitized output
	 */
	function sanitize_checkbox( $input ) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return '';
		}
	}

	/**
	 * Enqueue Javascript postMessage handlers for the Customizer.
	 *
	 * Binds JavaScript handlers to make the Customizer preview
	 * reload changes asynchronously.
	 *
	 * @since Profit 1.0
	 */
	function customize_preview_js() {
		wp_enqueue_script( $this->getPrefix() . 'customizer', get_template_directory_uri() . '/js/theme-customizer.min.js', array( 'customize-preview' ), mp_profit_get_theme_version(), true );
	}

	/**
	 * Binds JS listener to make Customizer color_scheme control.
	 *
	 * Passes color scheme data as colorScheme global.
	 *
	 * @since Profit 1.0
	 */
	function customize_control_js() {
		wp_enqueue_script( $this->getPrefix() . 'color-scheme-control', get_template_directory_uri() . '/js/color-scheme-control.min.js', array(
			'customize-controls',
			'iris',
			'underscore',
			'wp-util'
		), '20141216', true );
		wp_localize_script( $this->getPrefix() . 'color-scheme-control', 'colorScheme', $this->get_color_schemes() );
	}

	/**
	 * Register color schemes for Profit.
	 *
	 * Can be filtered with {@see $this->getPrefix().'color_schemes'}.
	 *
	 * The order of colors in a colors array:
	 * 1. Main Background Color.
	 * 2. Sidebar Background Color.
	 * 3. Box Background Color.
	 * 4. Main Text and Link Color.
	 * 5. Sidebar Text and Link Color.
	 * 6. Meta Box Background Color.
	 *
	 * @since Profit 1.0
	 *
	 * @return array An associative array of color scheme options.
	 */
	function get_color_schemes() {
		return apply_filters( $this->getPrefix() . 'color_schemes', array(
			'default' => array(
				'label'  => __( 'Blue', 'profit-lite' ),
				'colors' => array(
					MP_PROFIT_THEME_BRAND_COLOR,
					'657883'
				),
			),
			'blue'    => array(
				'label'  => __( 'Turquoise', 'profit-lite' ),
				'colors' => array(
					'#2bc4ca',
					'657883',
				),
			),
			'red'     => array(
				'label'  => __( 'Sea Green', 'profit-lite' ),
				'colors' => array(
					'#84afa6',
					'657883',
				),
			),
			'orange'  => array(
				'label'  => __( 'Green', 'profit-lite' ),
				'colors' => array(
					'#51af5b',
					'657883',
				),
			)
		) );
	}

	/**
	 * Get the current Profit color scheme.
	 *
	 * @since Profit 1.0
	 *
	 * @return array An associative array of either the current or default color scheme hex values.
	 */
	function get_color_scheme() {
		$mp_profit_color_scheme_option = esc_html( get_theme_mod( $this->getPrefix() . 'color_scheme', 'default' ) );
		$mp_profit_color_schemes       = $this->get_color_schemes();

		if ( array_key_exists( $mp_profit_color_scheme_option, $mp_profit_color_schemes ) ) {
			return $mp_profit_color_schemes[ $mp_profit_color_scheme_option ]['colors'];
		}

		return $mp_profit_color_schemes['default']['colors'];
	}

	/**
	 * Returns an array of color scheme choices registered for Profit.
	 *
	 * @since Profit 1.0
	 *
	 * @return array Array of color schemes.
	 */
	function get_color_scheme_choices() {
		$mp_profit_color_schemes                = $this->get_color_schemes();
		$mp_profit_color_scheme_control_options = array();

		foreach ( $mp_profit_color_schemes as $mp_profit_color_scheme => $value ) {
			$mp_profit_color_scheme_control_options[ $mp_profit_color_scheme ] = $value['label'];
		}

		return $mp_profit_color_scheme_control_options;
	}

	/**
	 * Sanitization callback for color schemes.
	 *
	 * @since Profit 1.0
	 *
	 * @param string $value Color scheme name value.
	 *
	 * @return string Color scheme name.
	 */
	function sanitize_color_scheme( $value ) {
		$mp_profit_color_schemes = $this->get_color_scheme_choices();

		if ( ! array_key_exists( $value, $mp_profit_color_schemes ) ) {
			$value = 'default';
		}

		return $value;
	}

	/**
	 * Returns an array of blog style registered for Profit.
	 *
	 * @since Profit
	 *
	 * @return array Array of blog style.
	 */
	function blog_list() {
		$blog_list = array(
			'default'    => __( 'With Sidebar', 'profit-lite' ),
			'masonry'    => __( 'Masonry', 'profit-lite' ),
			'full-width' => __( 'Full Width', 'profit-lite' )
		);

		return $blog_list;
	}
	/**
	 * Sanitize position
	 *
	 * @since Profit
	 * @access public
	 * @return sanitized output
	 */
	function sanitize_position( $str ) {
		if ( $this->is_positive_integer( $str ) ) {
			return intval( $str );
		}
	}
	/**
	 * Sanitize is positive integer
	 *
	 * @since Profit
	 * @access public
	 * @return sanitized output
	 */
	function is_positive_integer( $str ) {
		return ( is_numeric( $str ) && $str > 0 && $str == round( $str ) );
	}

}

new MP_Profit_Customizer();
