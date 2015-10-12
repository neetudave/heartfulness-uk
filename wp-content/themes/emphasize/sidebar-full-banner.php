<?php
/**
 * Sidebar for the full width banner area 
 * @package Emphasize
 *  
 */

if ( ! is_active_sidebar( 'full-banner' ) ) {
	return;
}
?>

<aside id="full-banner" role="complementary">
    <?php dynamic_sidebar( 'full-banner' ); ?> 
</aside>

<?php if( get_theme_mod( 'hide_shadow' ) == '') { ?>
	<div id="shadow"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/shadow.png" alt="shadow"/></div>
<?php } ?>