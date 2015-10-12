<?php
/**
 * Emphasize Theme Customizer
 *
 * @package Emphasize
 */

 /* 
  * Lets add some custom buttons ui for our customizer
  * Start with loading scripts and styles.
  */

 function emphasize_registers() {
    	wp_register_script( 'emphasize_jquery_ui', get_template_directory_uri() . '/js/jquery-ui.min.js', array("jquery"), '1.11.4', true  );
	wp_enqueue_script( 'emphasize_jquery_ui' );
	wp_register_style( 'emphasize_jquery_ui_css', get_template_directory_uri() . '/css/jquery-ui.min.css');
	wp_enqueue_style( 'emphasize_jquery_ui_css' );
	wp_register_script( 'emphasize_customizer_script', get_template_directory_uri() . '/js/emphasize_customizer.js', array("jquery","emphasize_jquery_ui"), '20120206', true  );
	wp_enqueue_script( 'emphasize_customizer_script' );
	
	/* label our buttons */
	wp_localize_script( 'emphasize_customizer_script', 'objectL10n', array(
				
		'documentation' => esc_html__( 'Setup Tutorials', 'emphasize' ),
		'review' => esc_html__('Rate this Theme','emphasize'),
		'support' => esc_html__('Support','emphasize'),
		'pro' => esc_html__('View Emphasize Pro version','emphasize'),
		
	) );
}
add_action( 'customize_controls_enqueue_scripts', 'emphasize_registers' ); 
 


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function emphasize_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	// Add custom description to Site Title &amp; Tagline section.
	$wp_customize->get_section( 'title_tagline' )->description = esc_html__( 'I recommend combining your site or business name with the logo.', 'emphasize' );
	// Add custom description to Colour section.
	$wp_customize->get_section( 'colors' )->description = esc_html__( 'You can set the primary colours for most elements in this theme from here.', 'emphasize' );
	// Add custom description to Background section.
	$wp_customize->get_section( 'background_image' )->description = esc_html__( 'Background may only be visible when using the boxed layout or on short pages.', 'emphasize' );			
		
$wp_customize->add_setting('emphasize_settings[logo]', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'           	=> 'option',
		'sanitize_callback' => 'esc_url_raw',
    ));
	
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'emphasize_logo', array(
        'label'    => esc_html__('Your Logo', 'emphasize'),
        'section'  => 'title_tagline',
        'settings' => 'emphasize_settings[logo]',
		'priority' => 1,
    )));		
			
		
// Setting group for logo positioning
	$wp_customize->add_setting( 'logo_margins', array(
		'default'        => '10px 0 10px 0',
		'sanitize_callback' => 'emphasize_sanitize_text',
	) );

	$wp_customize->add_control( 'logo_margins', array(
		'settings' => 'logo_margins',
		'label'    => esc_html__( 'Logo Margins', 'emphasize' ),
		'section'  => 'title_tagline',		
		'type'     => 'text',
		'priority' => 2,
	) );
		
/**
 * This is a section called Basic Settings.
 * For miscellaneous options.
 */

	$wp_customize->add_section( 'basic_settings', array(
		'title'          => esc_html__( 'Basic Settings', 'emphasize' ),
		'priority'       => 25,
	) );

	
// Setting for blog style
	$wp_customize->add_setting( 'blog_style', array(
		'default' => 'standardright',
		'sanitize_callback' => 'emphasize_sanitize_blogstyle',
	) );
// Control for blog layout	
	$wp_customize->add_control( 'blog_style', array(
	'label'   => esc_html__( 'Blog Style', 'emphasize' ),
	'section' => 'basic_settings',
	'priority' => 2,
	'type'    => 'radio',
		'choices' => array(
			'standardright' => esc_html__( 'Standard Right Sidebar', 'emphasize' ),
			'standardleft' 	=> esc_html__( 'Standard Left Sidebar', 'emphasize' ),
			'standardcentered' 	=> esc_html__( 'Centered No Left or Right Sidebar', 'emphasize' ),
			'leftfeatured' 	=> esc_html__( 'Left Featured Image - No Sidebars', 'emphasize' ),
		),
	));

// Setting for content or excerpt
	$wp_customize->add_setting( 'excerpt_content', array(
		'default' => 'content',
		'sanitize_callback' => 'emphasize_sanitize_excerpt',
	) );
// Control for Content or excerpt
	$wp_customize->add_control( 'excerpt_content', array(
    'label'   => esc_html__( 'Content or Excerpt', 'emphasize' ),
    'section' => 'basic_settings',
    'type'    => 'radio',
        'choices' => array(
            'content' => esc_html__( 'Content', 'emphasize' ),
            'excerpt' => esc_html__( 'Excerpt', 'emphasize' ),	
        ),
	'priority'       => 3,
    ));

// Setting for content or excerpt for the image post format
	$wp_customize->add_setting( 'excerpt_content_image', array(
		'default' => 'excerpt',
		'sanitize_callback' => 'emphasize_sanitize_excerpt_image',
	) );
// Control for Content or excerpt
	$wp_customize->add_control( 'excerpt_content_image', array(
    'label'   => esc_html__( 'Content or Excerpt for Image Post Format', 'emphasize' ),
    'section' => 'basic_settings',
    'type'    => 'radio',
        'choices' => array(
            'content' => esc_html__( 'Content', 'emphasize' ),
            'excerpt' => esc_html__( 'Excerpt', 'emphasize' ),	
        ),
	'priority'       => 4,
    ));
    
// Setting group for a excerpt
	$wp_customize->add_setting( 'excerpt_limit', array(
		'default'        => '50',
		'sanitize_callback' => 'emphasize_sanitize_number',
	) );
	$wp_customize->add_control( 'excerpt_limit', array(
		'settings' => 'excerpt_limit',
		'label'    => esc_html__( 'Excerpt Length', 'emphasize' ),
		'section'  => 'basic_settings',
		'type'     => 'text',
		'priority'   => 5,
	) );

// Setting for single layout
	$wp_customize->add_setting( 'single_layout', array(
		'default' => 'singleright',
		'sanitize_callback' => 'emphasize_sanitize_singlelayout',
	) );
// Control for single layout	
	$wp_customize->add_control( 'single_layout', array(
	'label'   => esc_html__( 'Single Layout', 'emphasize' ),
	'section' => 'basic_settings',
	'priority'=> 6,
	'type'    => 'radio',
		'choices' => array(
			'singleright' 	=> esc_html__( 'Single Right Sidebar', 'emphasize' ),
			'singleleft' 	=> esc_html__( 'Single Left Sidebar', 'emphasize' ),
			'singlewide' 	=> esc_html__( 'Single No Sidebars', 'emphasize' ),
		),		
	));
	
		
// Setting group for a Copyright
	$wp_customize->add_setting( 'copyright', array(
		'default'        => 'Your Name',
		'sanitize_callback' => 'emphasize_sanitize_text',
	) );

	$wp_customize->add_control( 'copyright', array(
		'settings' => 'copyright',
		'label'    => esc_html__( 'Your Copyright Name', 'emphasize' ),
		'section'  => 'basic_settings',		
		'type'     => 'text',
		'priority' => 7,
	) );

// hide post edit links
	$wp_customize->add_setting( 'hide_edit', array(
	'sanitize_callback' => 'emphasize_sanitize_checkbox',
	));
	$wp_customize->add_control( 'hide_edit', array(
        'type' => 'checkbox',
        'label'    => esc_html__( 'Hide Edit Links', 'emphasize' ),
        'section' => 'basic_settings',
		'priority' => 8,
    ) );

// hide full post footer info
	$wp_customize->add_setting( 'hide_post_footer_info', array(
	'sanitize_callback' => 'emphasize_sanitize_checkbox',
	));
	$wp_customize->add_control( 'hide_post_footer_info', array(
        'type' => 'checkbox',
        'label'    => esc_html__( 'Hide the Post Footer Info', 'emphasize' ),
        'section' => 'basic_settings',
		'priority' => 9,
    ) );

// hide full post next and previous nav
	$wp_customize->add_setting( 'hide_post_footer_nav', array(
	'sanitize_callback' => 'emphasize_sanitize_checkbox',
	));
	$wp_customize->add_control( 'hide_post_footer_nav', array(
        'type' => 'checkbox',
        'label'    => esc_html__( 'Hide the Post Footer Nav', 'emphasize' ),
        'section' => 'basic_settings',
		'priority' => 10,
    ) );
// hide featured image on single post
	$wp_customize->add_setting( 'hide_featured_image', array(
	'sanitize_callback' => 'emphasize_sanitize_checkbox',
	));
	$wp_customize->add_control( 'hide_featured_image', array(
        'type' => 'checkbox',
        'label'    => esc_html__( 'Hide Featured Image on Single Post', 'emphasize' ),
        'section' => 'basic_settings',
		'priority' => 11,
    ) );
// hide the top banner shadow
	$wp_customize->add_setting( 'hide_shadow', array(
	'sanitize_callback' => 'emphasize_sanitize_checkbox',
	));
	$wp_customize->add_control( 'hide_shadow', array(
        'type' => 'checkbox',
        'label'    => esc_html__( 'Hide the Top Banner Shadow', 'emphasize' ),
        'section' => 'basic_settings',
		'priority' => 12,
    ) );
	
/*
 * Colour Section
 */
 
// Setting group for the header background.
	$wp_customize->add_setting( 'header_bgcolour', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_bgcolour', array(
		'label'   => esc_html__( 'Header Background Colour', 'emphasize' ),
		'section' => 'colors',
		'settings'   => 'header_bgcolour',
		'priority' => 1,			
	) ) ); 

// Setting for the bottom widget group background
	$wp_customize->add_setting( 'bottom_group_bg', array(
		'default'        => '#709096',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottom_group_bg', array(
		'label'   => esc_html__( 'Bottom Widgets Background', 'emphasize' ),
		'section' => 'colors',
		'settings'   => 'bottom_group_bg',
		'priority' => 2,			
	) ) );
	
// Setting group for bottom group text colour.
	$wp_customize->add_setting( 'bottom_group_text', array(
		'default'        => '#c8e1e6',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottom_group_text', array(
		'label'   => esc_html__( 'Bottom Widgets Text', 'emphasize' ),
		'section' => 'colors',
		'settings'   => 'bottom_group_text',
		'priority' => 3,			
	) ) );

// Setting group for bottom group links.
	$wp_customize->add_setting( 'bottom_group_links', array(
		'default'        => '#c8e1e6',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottom_group_links', array(
		'label'   => esc_html__( 'Bottom Widget Links', 'emphasize' ),
		'section' => 'colors',
		'settings'   => 'bottom_group_links',
		'priority' => 4,			
	) ) );	
	
// Setting group for bottom group link hover colour.
	$wp_customize->add_setting( 'bottom_group_hover', array(
		'default'        => '#c8e1e6',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottom_group_hover', array(
		'label'   => esc_html__( 'Bottom Widget Link Hover', 'emphasize' ),
		'section' => 'colors',
		'settings'   => 'bottom_group_hover',
		'priority' => 5,			
	) ) );	
	
// Setting group for bottom group list borders.
	$wp_customize->add_setting( 'bottom_group_list', array(
		'default'        => '#87a3a8',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottom_group_list', array(
		'label'   => esc_html__( 'Bottom Widget List Borders', 'emphasize' ),
		'section' => 'colors',
		'settings'   => 'bottom_group_list',
		'priority' => 6,			
	) ) );	
	

		
// Setting group for the footer copyright area.
	$wp_customize->add_setting( 'footer_bg', array(
		'default'        => '#282828',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bg', array(
		'label'   => esc_html__( 'Footer Background', 'emphasize' ),
		'section' => 'colors',
		'settings'   => 'footer_bg',
		'priority' => 7,			
	) ) );	
	
// Setting group for the footer copyright area text.
	$wp_customize->add_setting( 'footer_text', array(
		'default'        => '#a0a0a0',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_text', array(
		'label'   => esc_html__( 'Footer Text', 'emphasize' ),
		'section' => 'colors',
		'settings'   => 'footer_text',
		'priority' => 8,			
	) ) );		
	
	
// Setting group for footer menu links.
	$wp_customize->add_setting( 'footer_links', array(
		'default'        => '#a0a0a0',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_links', array(
		'label'   => esc_html__( 'Footer Links', 'emphasize' ),
		'section' => 'colors',
		'settings'   => 'footer_links',
		'priority' => 9,			
	) ) );
// Setting group for footer menu links on hover.
	$wp_customize->add_setting( 'footer_hover', array(
		'default'        => '#c7b596',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_hover', array(
		'label'   => esc_html__( 'Footer Link Hover', 'emphasize' ),
		'section' => 'colors',
		'settings'   => 'footer_hover',
		'priority' => 10,			
	) ) );
		
	

// Setting group for Main content text.
	$wp_customize->add_setting( 'main_content_text', array(
		'default'        => '#6F6F6F',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_content_text', array(
		'label'   => esc_html__( 'Main Content Text', 'emphasize' ),
		'section' => 'colors',
		'settings'   => 'main_content_text',
		'priority' => 11,			
	) ) );

// Setting group for headings.
	$wp_customize->add_setting( 'headings_colour', array(
		'default'        => '#519dad',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'headings_colour', array(
		'label'   => esc_html__( 'Headings Colour', 'emphasize' ),
		'section' => 'colors',
		'settings'   => 'headings_colour',
		'priority' => 12,			
	) ) );

// Setting group for links.
	$wp_customize->add_setting( 'link_colour', array(
		'default'        => '#7cb6c2',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_colour', array(
		'label'   => esc_html__( 'Link Colour', 'emphasize' ),
		'section' => 'colors',
		'settings'   => 'link_colour',
		'priority' => 13,			
	) ) );	
// Setting group for links.
	$wp_customize->add_setting( 'link_hover', array(
		'default'        => '#c78b31',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_hover', array(
		'label'   => esc_html__( 'Link Hover Colour', 'emphasize' ),
		'section' => 'colors',
		'settings'   => 'link_hover',
		'priority' => 14,			
	) ) );

// Setting group for social network icons.
	$wp_customize->add_setting( 'socialicons', array(
		'default'        => '#5d636a',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'socialicons', array(
		'label'   => esc_html__( 'Social Network Icons', 'emphasize' ),
		'section' => 'colors',
		'settings'   => 'socialicons',
		'priority' => 15,			
	) ) );
// Setting group for social network icons on hover.
	$wp_customize->add_setting( 'socialicons_hover', array(
		'default'        => '#a9aeb3',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'socialicons_hover', array(
		'label'   => esc_html__( 'Social Network Icons Hover', 'emphasize' ),
		'section' => 'colors',
		'settings'   => 'socialicons_hover',
		'priority' => 16,			
	) ) );
// Setting group for gallery caption background.
	$wp_customize->add_setting( 'caption_bg', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'caption_bg', array(
		'label'   => esc_html__( 'Gallery Caption Background', 'emphasize' ),
		'section' => 'colors',
		'settings'   => 'caption_bg',
		'priority' => 17,			
	) ) );
// Setting group for gallery caption background.
	$wp_customize->add_setting( 'caption_text', array(
		'default'        => '#747474',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'caption_text', array(
		'label'   => esc_html__( 'Gallery Caption Text', 'emphasize' ),
		'section' => 'colors',
		'settings'   => 'caption_text',
		'priority' => 18,			
	) ) );



// Setting group for the main menu link colour.
	$wp_customize->add_setting( 'nav_links', array(
		'default'        => '#686868',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nav_links', array(
		'label'   => esc_html__( 'Main Menu Links', 'emphasize' ),
		'section' => 'colors',
		'settings'   => 'nav_links',
		'priority' => 19,			
	) ) );
// Setting group for the main menu links on hover.
	$wp_customize->add_setting( 'nav_hover', array(
		'default'        => '#7cb6c2',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nav_hover', array(
		'label'   => esc_html__( 'Main Menu Hover &amp; Active', 'emphasize' ),
		'section' => 'colors',
		'settings'   => 'nav_hover',
		'priority' => 20,			
	) ) );
// Setting group for the submenu background.
	$wp_customize->add_setting( 'submenu_bg', array(
		'default'        => '#ebeced',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_bg', array(
		'label'   => esc_html__( 'Submenu Background', 'emphasize' ),
		'section' => 'colors',
		'settings'   => 'submenu_bg',
		'priority' => 21,			
	) ) );
	
// Setting group for the mobile menu button.
	$wp_customize->add_setting( 'mobile_menu_bg', array(
		'default'        => '#282828',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobile_menu_bg', array(
		'label'   => esc_html__( 'Mobile Menu Button', 'emphasize' ),
		'section' => 'colors',
		'settings'   => 'mobile_menu_bg',
		'priority' => 22,			
	) ) );	
// Setting group for the mobile menu button on hover.
	$wp_customize->add_setting( 'mobile_menu_bghover', array(
		'default'        => '#7cb6c2',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobile_menu_bghover', array(
		'label'   => esc_html__( 'Mobile Menu Button Hover', 'emphasize' ),
		'section' => 'colors',
		'settings'   => 'mobile_menu_bghover',
		'priority' => 23,			
	) ) );	
// Setting group for the mobile menu button text.
	$wp_customize->add_setting( 'mobile_menu_button_text', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobile_menu_button_text', array(
		'label'   => esc_html__( 'Mobile Menu Button Text', 'emphasize' ),
		'section' => 'colors',
		'settings'   => 'mobile_menu_button_text',
		'priority' => 24,			
	) ) );	
		
	
	
}
add_action( 'customize_register', 'emphasize_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function emphasize_customize_preview_js() {
	wp_enqueue_script( 'emphasize_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'emphasize_customize_preview_js' );



/**
 * This is our theme sanitization settings.
 * Remember to sanitize any additional theme settings you add to the customizer.
 */	
 
// adds sanitization callback function for numeric data : number
	function emphasize_sanitize_number( $value ) {
		$value = (int) $value; // Force the value into integer type.
		return ( 0 < $value ) ? $value : null;
	}



// adds sanitization callback function : text 
	function emphasize_sanitize_text( $input ) {
		return wp_kses_post( force_balance_tags( $input ) );
	}


// adds sanitization callback function : url
	function emphasize_sanitize_url( $value) {
		$value = esc_url( $value);
		return $value;
	}

// adds sanitization callback function : checkbox
	function emphasize_sanitize_checkbox( $input ) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return '';
		}
	}	 
// adds sanitization callback function for uploading : uploader
	add_filter( 'emphasize_sanitize_image', 'emphasize_sanitize_upload' );
	add_filter( 'emphasize_sanitize_file', 'emphasize_sanitize_upload' );
	
	function emphasize_sanitize_upload( $input ) {        
			$output = '';        
			$filetype = wp_check_filetype($input);       
			if ( $filetype["ext"] ) {        
					$output = $input;        
			}       
			return $output;
	}		

// adds sanitization callback function for the Single Layout : radio
	function emphasize_sanitize_singlelayout( $input ) {
		$valid = array(
			'singleright' 	=> esc_html__( 'Single Right Sidebar', 'emphasize' ),
			'singleleft' 	=> esc_html__( 'Single Left Sidebar', 'emphasize' ),
			'singlewide' 	=> esc_html__( 'Single No Sidebars', 'emphasize' ),
		);
	 
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';
		}
	}

// adds sanitization callback function for the blog layout : radio
	function emphasize_sanitize_blogstyle( $input ) {
		$valid = array(
			'standardright' => esc_html__( 'Standard Right Sidebar', 'emphasize' ),
			'standardleft' 	=> esc_html__( 'Standard Left Sidebar', 'emphasize' ),
			'standardcentered' 	=> esc_html__( 'Centered No Left or Right Sidebar', 'emphasize' ),
			'leftfeatured' 	=> esc_html__( 'Left Featured Image - No Sidebars', 'emphasize' ),
		);
	 
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';
		}
	}	
		
// adds sanitization callback function for the excerpt : radio
	function emphasize_sanitize_excerpt( $input ) {
		$valid = array(
			'content' => esc_html__( 'Content', 'emphasize' ),
			'excerpt' => esc_html__( 'Excerpt', 'emphasize' ),
		);
	 
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';
		}
	}	
// adds sanitization callback function for the excerpt on the image post format : radio
	function emphasize_sanitize_excerpt_image( $input ) {
		$valid = array(
			'content' => esc_html__( 'Content', 'emphasize' ),
			'excerpt' => esc_html__( 'Excerpt', 'emphasize' ),
		);
	 
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';
		}
	}	