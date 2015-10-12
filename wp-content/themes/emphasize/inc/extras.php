<?php
/**
 * Custom functions for theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Emphasize
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function emphasize_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'emphasize_body_classes' );


/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
	if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :	
	function emphasize_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( __( 'Page %s', 'emphasize' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'emphasize_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function emphasize_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'emphasize_render_title' );
endif;




/**
 * Special thanks to Justin Tadlock for this quote formatting method
 *
 * @link http://justintadlock.com/archives/2012/08/27/post-formats-quote
 */
add_filter( 'the_content', 'emphasize_quote_content' );
function emphasize_quote_content( $content ) {

	/* Check if we're displaying a 'quote' post. */
	if ( has_post_format( 'quote' ) ) {

		/* Match any <blockquote> elements. */
		preg_match( '/<blockquote.*?>/', $content, $matches );

		/* If no <blockquote> elements were found, wrap the entire content in one. */
		if ( empty( $matches ) )
			$content = "<blockquote>{$content}</blockquote>";
	}

	return $content;
}

/**
 * Move the More Link outside from the contents last summary paragraph tag.
 * 
 */
function emphasize_new_more_link($link) {
		$link = '<p class="read-more">'.$link.'</p>';
		return $link;
	}
add_filter('the_content_more_link', 'emphasize_new_more_link');

/**
 * Adding a customizable Read More link to excerpts outside of the paragraph.
 */
function emphasize_new_excerpt_more( $more ) {
	return ' <p><a class="read-more" href="'. get_permalink( get_the_ID() ) . '" itemprop="url">' .  esc_html__('Read More', 'emphasize') . '</a></p>';
}
add_filter( 'excerpt_more', 'emphasize_new_excerpt_more' );

/**
 * Gives the flexibility to change the excerpt length from the Theme Customizer to the users choice.
 * Thanks to http://bavotasan.com/2009/limiting-the-number-of-words-in-your-excerpt-or-content-in-wordpress/
 */ 
function emphasize_excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}


/* Prevent page scroll after clicking read more to load the full post.
 *
 */
function emphasize_remove_more_link_scroll( $link ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );
	return $link;
}
add_filter( 'the_content_more_link', 'emphasize_remove_more_link_scroll' );




/**
 * Comment layout
 *
 */
 
if (!function_exists('emphasize_comment')) {
function emphasize_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>

<li>                        
	<div class="comment">
		<div class="image"> <?php echo get_avatar($comment, 100); ?> </div>
		<div class="text">
			<div class="comment_info">
				<h4 class="name"><?php echo get_comment_author_link(); ?></h4>
				<span class="comment_date"><?php comment_time(get_option('date_format')); ?> <?php _e('at', 'emphasize'); ?> <?php comment_time(get_option('time_format')); ?></span>
				<?php comment_reply_link( array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']) ) ); ?>
			</div>
			<div class="text_holder" id="comment-<?php echo comment_ID(); ?>">
				<?php comment_text(); ?>
			</div>
		</div>
	</div>                          
                
<?php if ($comment->comment_approved == '0') : ?>
<p><em><?php esc_html_e('Your comment is awaiting moderation.', 'emphasize'); ?></em></p>
<?php endif; ?>
<?php 
}
}



function emphasize_css() {
/**
 * Lets add some custom styles to our page and load them into the <head> area.
 * These styles are determined by the theme customizer settings you make changes to.
 * You should not have to edit these but can be overridden with custom css.
 * If your styles do not change, then use !important;
 */
?>
<style type="text/css">
	a, a:visited {color:<?php echo esc_attr(get_theme_mod( 'link_colour', '#7cb6c2' )); ?>;}	
	a:hover, a:focus, a:active {color:<?php echo esc_attr(get_theme_mod( 'link_hover', '#c78b31' )); ?>;}	
	h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a {color: <?php echo esc_attr(get_theme_mod( 'headings_colour', '#519dad' )); ?>;}
	#bottom-group h4 {color: <?php echo esc_attr(get_theme_mod( 'bottom_group_text', '#c8e1e6' )); ?>;}
	#footer-group h4 {color:<?php echo esc_attr(get_theme_mod( 'footer_text', '#a0a0a0' )); ?>;}
	#bottom-group a, #bottom-group a:visited {color:<?php echo esc_attr(get_theme_mod( 'bottom_group_links', '#c8e1e6' )); ?>;}
	#bottom-group a:hover {color:<?php echo esc_attr(get_theme_mod( 'bottom_group_hover', '#c8e1e6' )); ?>;}
	#bottom-group .tagcloud a {border-color: <?php echo esc_attr(get_theme_mod( 'bottom_group_text', '#dadada' )); ?>;}	
	#bottom-group .widget li {border-color:<?php echo esc_attr(get_theme_mod( 'bottom_group_list', '#87a3a8' )); ?>;}	
	#site-footer a {color: <?php echo esc_attr(get_theme_mod( 'footer_links', '#a0a0a0' )); ?>;}
	#site-footer a:hover {color: <?php echo esc_attr(get_theme_mod( 'footer_hover', '#c7b596' )); ?>;}	
	.social-navigation a {color: <?php echo esc_attr(get_theme_mod( 'socialicons', '#5d636a' )); ?>;}
	.social-navigation a:hover {color: <?php echo esc_attr(get_theme_mod( 'socialicons_hover', '#a9aeb3' )); ?>;}	
	.gallery-caption {background-color: <?php echo esc_attr(get_theme_mod( 'caption_bg', '#ffffff' )); ?>;  color: <?php echo esc_attr(get_theme_mod( 'caption_text', '#747474' )); ?>;}
	.primary-navigation li a, .primary-navigation li li > a, .primary-navigation li.home a {color: <?php echo esc_attr(get_theme_mod( 'nav_links', '#686868' )); ?>;}	
	.primary-navigation ul ul {background-color: <?php echo esc_attr(get_theme_mod( 'submenu_bg', '#ebeced' )); ?>;}	
	.site-navigation li.home a:hover,
	.site-navigation a:hover,
	.site-navigation .current-menu-item > a {color: <?php echo esc_attr(get_theme_mod( 'nav_hover', '#7cb6c2' )); ?>;	}	
	.site-navigation .current-menu-item > a,
	.site-navigation .current-menu-ancestor > a {color: <?php echo esc_attr(get_theme_mod( 'nav_hover', '#7cb6c2' )); ?>;}
	.site-branding img, .site-title {margin: <?php echo esc_attr(get_theme_mod( 'logo_margins', '10px 0 10px 0' )); ?>;}
	.menu-toggle {background-color: <?php echo esc_attr(get_theme_mod( 'mobile_menu_bg', '#282828' )); ?>;  color: <?php echo esc_attr(get_theme_mod( 'mobile_menu_button_text', '#ffffff' )); ?>;}
	.menu-toggle:active,.menu-toggle:focus,.menu-toggle:hover {	background-color: <?php echo esc_attr(get_theme_mod( 'mobile_menu_bghover', '#7cb6c2' )); ?>;}

</style>
<?php
}
add_action( 'wp_head', 'emphasize_css');