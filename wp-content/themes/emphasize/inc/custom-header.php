<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * @package Emphasize
 * 
 */

function emphasize_custom_header() {
	$args = array(
		'width'         => 2560,
		'flex-width'    => true,
		'height'        => 300,
		'flex-height'    => true,
		'uploads'       => true,
		'header-text'  	=> false
		
	);
	add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'emphasize_custom_header' );