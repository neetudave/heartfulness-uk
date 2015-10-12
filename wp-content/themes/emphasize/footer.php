<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Emphasize
 */
?>




</div><!-- #content -->

<?php get_sidebar( 'bottom' ); ?>


	<footer id="site-footer" role="contentinfo" style="background-color:<?php echo esc_attr(get_theme_mod( 'footer_bg', '#282828' )); ?>; color:<?php echo esc_attr(get_theme_mod( 'footer_text', '#a0a0a0' )); ?>;">
		<div class="site-info">        
        
        <?php get_sidebar( 'footer' ); ?>
        
         	<?php if ( has_nav_menu( 'social' ) ) : ?>
                <nav id="social-navigation" class="social-navigation" role="navigation">
                    <?php
                        wp_nav_menu( array(
                            'theme_location' => 'social',
                            'depth'          => 1,
                            'container' => false,
                            'link_before'    => '<span class="screen-reader-text">',
                            'link_after'     => '</span>',
                        ) );
                    ?>
                </nav>
            <?php endif; ?>
        
			<nav id="footer-nav" role="navigation">
            	<?php wp_nav_menu( array( 
						'theme_location' => 'footer', 
						'fallback_cb' => false, 
						'depth' => 1,
						'container' => false, 
						'menu_id' => 'footer-menu', 
					) ); 
				?>
          	</nav> 
  

          <?php _e('Copyright &copy;', 'emphasize'); ?> 
          <?php echo date('Y'); ?> <?php echo esc_html(get_theme_mod( 'copyright', 'Your Name' )); ?>.&nbsp;<?php _e('All rights reserved.', 'emphasize'); ?>
          
		</div>
	</footer>
    
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
