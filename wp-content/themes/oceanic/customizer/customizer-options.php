<?php
/**
 * Defines customizer options
 *
 * @package Customizer Library Demo
 */

function customizer_library_oceanic_options() {
	// Theme defaults
	$primary_color = '#01B6AD';
	$secondary_color = '#019289';
    
    $body_font_color = '#4F4F4F';
    $heading_font_color = '#5E5E5E';

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// Favicon
	$section = 'oceanic-favicon';
    
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Favicon', 'oceanic' ),
		'priority' => '10'
	);
	
	$options['oceanic-favicon'] = array(
		'id' => 'oceanic-favicon',
		'label'   => __( 'Favicon', 'oceanic' ),
		'section' => $section,
		'type'    => 'image',
		'default' => '',
	);
    
    
    // Layout Settings
    $section = 'oceanic-layout';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Layout', 'oceanic' ),
        'priority' => '30'
    );
    
    // Upsell Button One
    $options['oceanic-upsell-one'] = array(
    		'id' => 'oceanic-upsell-one',
    		'label'   => __( 'Site Layout', 'oceanic' ),
    		'section' => $section,
    		'type'    => 'upsell',
    );
    
    // Header Settings
    $section = 'oceanic-header';
    
    $sections[] = array(
    		'id' => $section,
    		'title' => __( 'Header', 'oceanic' ),
    		'priority' => '35'
    );
    
    $choices = array(
    		'oceanic-header-layout-standard' => 'Standard',
    		'oceanic-header-layout-centered' => 'Centered'
    );    
    $options['oceanic-header-layout'] = array(
    		'id' => 'oceanic-header-layout',
    		'label'   => __( 'Layout', 'oceanic' ),
    		'section' => $section,
    		'type'    => 'select',
    		'choices' => $choices,
    		'default' => 'oceanic-header-layout-standard'
    );
    
    // Upsell Button Two
    $options['oceanic-upsell-two'] = array(
    		'id' => 'oceanic-upsell-two',
    		'label'   => __( 'Sticky Header', 'oceanic' ),
    		'section' => $section,
    		'type'    => 'upsell',
    );
	
    $options['oceanic-header-info-text'] = array(
    		'id' => 'oceanic-header-info-text',
    		'label'   => __( 'Info Text', 'oceanic' ),
    		'section' => $section,
    		'type'    => 'text',
    		'default' => __( '<em>CALL US</em>: 555-OCEANIC', 'oceanic')
    );
    $options['oceanic-header-shop-links'] = array(
    		'id' => 'oceanic-header-shop-links',
    		'label'   => __( 'Shop Links', 'oceanic' ),
    		'section' => $section,
    		'type'    => 'checkbox',
    		'default' => 1,
			'description' => __( 'Display the My Account and Checkout links when WooCommerce is active.', 'oceanic' )
    );
        
    // Slider Settings
    $section = 'oceanic-slider';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Slider', 'oceanic' ),
        'priority' => '35'
    );
    
    $choices = array(
        'oceanic-slider-default' => 'Default Slider',
        'oceanic-meta-slider' => 'Meta Slider',
        'oceanic-no-slider' => 'None'
    );
    $options['oceanic-slider-type'] = array(
        'id' => 'oceanic-slider-type',
        'label'   => __( 'Choose a Slider', 'oceanic' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'oceanic-slider-default'
    );
    $options['oceanic-slider-cats'] = array(
        'id' => 'oceanic-slider-cats',
        'label'   => __( 'Slider Categories', 'oceanic' ),
        'section' => $section,
        'type'    => 'text',
        'description' => __( 'Enter the names of the Post categories you want to display in the slider e.g. "Slider". Multiple categories must be separated with a comma.', 'oceanic' )
    );
    $options['oceanic-slider-transition-speed'] = array(
    		'id' => 'oceanic-slider-transition-speed',
    		'label'   => __( 'Slide Transition Speed', 'oceanic' ),
    		'section' => $section,
    		'type'    => 'text',
    		'default' => 450,
    		'description' => __( 'The speed it takes to transition between slides in milliseconds. 1000 milliseconds equals 1 second.', 'oceanic' )
    );
    
    // Upsell Button Six
    $options['oceanic-upsell-six'] = array(
    		'id' => 'oceanic-upsell-six',
    		'label'   => __( 'Slideshow', 'oceanic' ),
    		'section' => $section,
    		'type'    => 'upsell',
    );
    
    // Upsell Button Seven
    $options['oceanic-upsell-seven'] = array(
    		'id' => 'oceanic-upsell-seven',
    		'label'   => __( 'Slideshow Speed', 'oceanic' ),
    		'section' => $section,
    		'type'    => 'upsell',
    );
    
    $options['oceanic-meta-slider-shortcode'] = array(
        'id' => 'oceanic-meta-slider-shortcode',
        'label'   => __( 'Meta Slider Shortcode', 'oceanic' ),
        'section' => $section,
        'type'    => 'text',
        'description' => __( 'Enter the shortcode given by Meta Slider.', 'oceanic' )
    );


	// Styling
	$section = 'oceanic-styling';
    $font_choices = customizer_library_get_font_choices();

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Styling', 'oceanic' ),
		'priority' => '38'
	);

	$options['oceanic-main-color'] = array(
		'id' => 'oceanic-main-color',
		'label'   => __( 'Primary Color', 'oceanic' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $primary_color,
	);
	$options['oceanic-main-color-hover'] = array(
		'id' => 'oceanic-main-color-hover',
		'label'   => __( 'Secondary Color', 'oceanic' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $secondary_color,
	);
    
    $options['oceanic-body-font'] = array(
        'id' => 'oceanic-body-font',
        'label'   => __( 'Body Font', 'oceanic' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $font_choices,
        'default' => 'Open Sans'
    );
    $options['oceanic-body-font-color'] = array(
        'id' => 'oceanic-body-font-color',
        'label'   => __( 'Body Font Color', 'oceanic' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $body_font_color,
    );
    $options['oceanic-heading-font'] = array(
        'id' => 'oceanic-heading-font',
        'label'   => __( 'Heading Font', 'oceanic' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $font_choices,
        'default' => 'Raleway'
    );
    $options['oceanic-heading-font-color'] = array(
        'id' => 'oceanic-heading-font-color',
        'label'   => __( 'Heading Font Color', 'oceanic' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $heading_font_color,
    );
    
    // Blog Settings
    $section = 'oceanic-blog';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Blog', 'oceanic' ),
        'priority' => '50'
    );
    
    // Upsell Button Three
    $options['oceanic-upsell-three'] = array(
    		'id' => 'oceanic-upsell-three',
    		'label'   => __( 'Blog Post Layout', 'oceanic' ),
    		'section' => $section,
    		'type'    => 'upsell',
    );
    
    $options['oceanic-blog-title'] = array(
        'id' => 'oceanic-blog-title',
        'label'   => __( 'Blog Page Title', 'oceanic' ),
        'section' => $section,
        'type'    => 'text',
        'default' => 'Blog'
    );
    
    // Upsell Button Eight
    $options['oceanic-upsell-eight'] = array(
    		'id' => 'oceanic-upsell-eight',
    		'label'   => __( 'Single Blog Post Featured Image', 'oceanic' ),
    		'section' => $section,
    		'type'    => 'upsell',
    );
    
    // Social Settings
    $section = 'oceanic-social';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Social Links', 'oceanic' ),
        'priority' => '80'
    );
    
    // Upsell Button Four
    $options['oceanic-upsell-four'] = array(
    		'id' => 'oceanic-upsell-four',
    		'label'   => __( 'Social Links', 'oceanic' ),
    		'section' => $section,
    		'type'    => 'upsell',
    );
    
    // Site Text Settings
    $section = 'oceanic-website';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Website Text', 'oceanic' ),
        'priority' => '50'
    );
    $options['oceanic-website-error-head'] = array(
        'id' => 'oceanic-website-error-head',
        'label'   => __( '404 Page Heading', 'oceanic' ),
        'section' => $section,
        'type'    => 'text',
        'default' => __( 'Oops! <span>404</span>', 'oceanic'),
        'description' => __( 'Enter the heading for the 404 error page', 'oceanic' )
    );
    $options['oceanic-website-error-msg'] = array(
        'id' => 'oceanic-website-error-msg',
        'label'   => __( '404 Page Message', 'oceanic' ),
        'section' => $section,
        'type'    => 'textarea',
        'default' => __( 'It looks like that page does not exist. <br />Return home or try a search', 'oceanic'),
        'description' => __( 'Enter the default text for the 404 error page (Page not found)', 'oceanic' )
    );
    $options['oceanic-website-nosearch-msg'] = array(
        'id' => 'oceanic-website-nosearch-msg',
        'label'   => __( 'No Search Results', 'oceanic' ),
        'section' => $section,
        'type'    => 'textarea',
        'default' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'oceanic'),
        'description' => __( 'Enter the default text for when no search results are found', 'oceanic' )
    );

    // Footer Settings
    $section = 'oceanic-footer';
    
    $sections[] = array(
    		'id' => $section,
    		'title' => __( 'Footer', 'oceanic' ),
    		'priority' => '50'
    );
    
    // Upsell Button Five
    $options['oceanic-upsell-five'] = array(
    		'id' => 'oceanic-upsell-five',
    		'label'   => __( 'Copyright Text', 'oceanic' ),
    		'section' => $section,
    		'type'    => 'upsell',
    );
    
	// Adds the sections to the $options array
	$options['sections'] = $sections;

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

	// To delete custom mods use: customizer_library_remove_theme_mods();

}
add_action( 'init', 'customizer_library_oceanic_options' );
