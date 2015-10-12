<?php
/**
 * Emphasize functions and definitions
 *
 * @package Emphasize
 */



if ( ! function_exists( 'emphasize_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function emphasize_setup() {
	
	
/**
 * Set the content width based on the theme's design and stylesheet.
 * This theme gives you up to 1140 pixels of content width.
 */
	global $content_width;
	if ( ! isset( $content_width ) )
		$content_width = 740;
	
	function emphasize_content_width() {
		if ( is_page_template( 'full-width.php' ) || is_attachment() ) {
			global $content_width;
			$content_width = 1140;
		}
	}
	add_action( 'template_redirect', 'emphasize_content_width' );	

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Emphasize, use a find and replace
	 * to change 'emphasize' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'emphasize', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Add shortcode support to the text widget.
	add_filter('widget_text', 'do_shortcode');
	
	/**
	 * Add callback for custom TinyMCE editor stylesheets. (editor-style.css)
	 * @see http://codex.wordpress.org/Function_Reference/add_editor_style
	 */
	add_editor_style();
	
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'emphasize' ),
		'footer'  => esc_html__( 'Footer Menu', 'emphasize' ),
		'social'  => esc_html__( 'Social Menu', 'emphasize' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'quote', 'status',
	) );

	/*
	 * Set up the WordPress core custom background feature.
	 * See https://codex.wordpress.org/Custom_Backgrounds
	 */
	
	add_theme_support( 'custom-background', apply_filters( 'emphasize_custom_background_args', array(
		'default-color' => '000000',
		'default-image' => '',
	) ) );
}
endif; // emphasize_setup
add_action( 'after_setup_theme', 'emphasize_setup' );


/**
 * Register Google fonts.
 * @return string Google fonts URL for the theme.
 */

if ( ! function_exists( 'emphasize_fonts_url' ) ) :
function emphasize_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';
	
	/*
	 * Translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== esc_html_x( 'on', 'Open Sans font: on or off', 'emphasize' ) ) {
		$fonts[] = 'Open Sans:300,400,600,700';
	}	

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Enqueue scripts and styles.
 */
function emphasize_scripts() {

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'emphasize-fonts', emphasize_fonts_url(), array(), null );
	
	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/fonts/genericons.css', array(), '3.3' );
	
	// Load our responsive stylesheet based on Bootstrap
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array( ), '3.2.1' );
	// Add Animation to page elements
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.min.css', array(), '2015' );
	// Load in our theme stylesheet
	wp_enqueue_style( 'emphasize-style', get_stylesheet_uri() );
	
	// Load scripts
	wp_enqueue_script( 'emphasize-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'emphasize-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	
	// Lets load the WordPress comment reply script
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'emphasize_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Theme sidebars.
 */
require get_template_directory() . '/inc/sidebars.php';
