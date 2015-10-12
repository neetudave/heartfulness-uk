<?php
/**
 * Template for the Single Post view
 * @package Emphasize
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="" itemtype="http://schema.org/Article">

<?php if( get_theme_mod( 'hide_featured_image' ) == '') { ?>
	<?php
        // Post thumbnail.
        emphasize_featured_image();
    ?>
<?php } ?>
    
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title" itemprop="name">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php emphasize_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' .  esc_html__( 'Pages:', 'emphasize' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
    <?php if( get_theme_mod( 'hide_post_footer_info' ) == '') { ?>
		<?php emphasize_entry_footer(); ?>
    <?php } ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
