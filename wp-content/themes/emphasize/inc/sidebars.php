<?php 

/**
 * Theme Widget positions
 * @package Emphasize 
 */

 
/**
 * Registers our main widget area and the front page widget areas.
 */
 
function emphasize_widgets_init() {

	register_sidebar( array(
		'name' => esc_html__( 'Blog Right Sidebar', 'emphasize' ),
		'id' => 'blogright',
		'description' => esc_html__( 'This is the blog right sidebar column.', 'emphasize' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Blog Left Sidebar', 'emphasize' ),
		'id' => 'blogleft',
		'description' => esc_html__( 'This is the blog left sidebar column.', 'emphasize' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Page Right Sidebar', 'emphasize' ),
		'id' => 'pageright',
		'description' => esc_html__( 'This is the page right sidebar column', 'emphasize' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Page Left Sidebar', 'emphasize' ),
		'id' => 'pageleft',
		'description' => esc_html__( 'This is the page left sidebar column', 'emphasize' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Full Width Banner', 'emphasize' ),
		'id' => 'full-banner',
		'description' => esc_html__( 'Full width banner.', 'emphasize' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h1>',
		'after_title' => '</h1>',
	) );	
				
	register_sidebar( array(
		'name' => esc_html__( 'Top 1', 'emphasize' ),
		'id' => 'top1',
		'description' => esc_html__( 'This is the 1st top widget position.', 'emphasize' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Top 2', 'emphasize' ),
		'id' => 'top2',
		'description' => esc_html__( 'This is the 2nd top widget position.', 'emphasize' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Top 3', 'emphasize' ),
		'id' => 'top3',
		'description' => esc_html__( 'This is the 3rd top widget position.', 'emphasize' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Top 4', 'emphasize' ),
		'id' => 'top4',
		'description' => esc_html__( 'This is the 4th top widget position.', 'emphasize' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Bottom 1', 'emphasize' ),
		'id' => 'bottom1',
		'description' => esc_html__( 'This is the first bottom widget position located above the footer.', 'emphasize' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Bottom 2', 'emphasize' ),
		'id' => 'bottom2',
		'description' => esc_html__( 'This is the second featured bottom widget position located above the footer.', 'emphasize' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Bottom 3', 'emphasize' ),
		'id' => 'bottom3',
		'description' => esc_html__( 'This is the third featured bottom widget position located above the footer.', 'emphasize' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Bottom 4', 'emphasize' ),
		'id' => 'bottom4',
		'description' => esc_html__( 'This is the fourth featured bottom widget position located above the footer.', 'emphasize' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Footer', 'emphasize' ),
		'id' => 'footer',
		'description' => esc_html__( 'This is the footer position at the very bottom where the copyright is.', 'emphasize' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );		
	register_sidebar( array(
		'name' => esc_html__( 'Call to Action', 'emphasize' ),
		'id' => 'cta',
		'description' => esc_html__( 'This is a call to action which is normally used to make a message stand out just above the main content.', 'emphasize' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h1 id="cta-heading">',
		'after_title' => '</h1>',
	) );	
		
}
add_action( 'widgets_init', 'emphasize_widgets_init' );

/**
 * Count the number of widgets to enable resizable widgets
 */

// lets setup the top group 
function emphasize_topgroup() {
	$count = 0;
	if ( is_active_sidebar( 'top1' ) )
		$count++;
	if ( is_active_sidebar( 'top2' ) )
		$count++;
	if ( is_active_sidebar( 'top3' ) )
		$count++;		
	if ( is_active_sidebar( 'top4' ) )
		$count++;
	$class = '';
	switch ( $count ) {
		case '1':
			$class = 'col-md-12';
			break;
		case '2':
			$class = 'col-md-6';
			break;
		case '3':
			$class = 'col-md-4';
			break;
		case '4':
			$class = 'col-md-3';
			break;
	}
	if ( $class )
		echo 'class="' . $class . '"';
}

// lets setup the bottom group 
function emphasize_bottomgroup() {
	$count = 0;
	if ( is_active_sidebar( 'bottom1' ) )
		$count++;
	if ( is_active_sidebar( 'bottom2' ) )
		$count++;
	if ( is_active_sidebar( 'bottom3' ) )
		$count++;		
	if ( is_active_sidebar( 'bottom4' ) )
		$count++;
	$class = '';
	switch ( $count ) {
		case '1':
			$class = 'col-md-12';
			break;
		case '2':
			$class = 'col-md-6';
			break;
		case '3':
			$class = 'col-md-4';
			break;
		case '4':
			$class = 'col-md-3';
			break;
	}
	if ( $class )
		echo 'class="' . $class . '"';
}
