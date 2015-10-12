<?php
/**
 * Various loops for this theme.
 * @package Emphasize
 */
?>


<?php if ( is_home() ) : ?>

	<?php 
        if ( have_posts() ) :     
        /* Start the Loop */ 
        while ( have_posts() ) : the_post();
    
        /* Include the Post-Format-specific template for the content.
         * If you want to override this in a child theme, then include a file
         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
         */
        get_template_part( 'content', get_post_format() );
    
        endwhile; 
            emphasize_paging_nav();
        else : 
            get_template_part( 'content', 'none' ); 
        endif; 
    ?>

<?php elseif (is_single()) : ?>

		<?php while ( have_posts() ) : the_post(); ?>
        
        <?php get_template_part( 'content', 'single' ); ?>
                        
        <?php if( get_theme_mod( 'hide_post_footer_nav' ) == '') { ?>
            <?php emphasize_post_nav(); ?>
        <?php } ?>            
        
        <?php
            // If comments are open or we have at least one comment, load up the comment template
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
        ?>
        
        <?php endwhile; ?>

<?php elseif (is_author()) : ?>


<?php  global $query_string;
         query_posts( $query_string . '&posts_per_page=10' );
         while (have_posts()) : the_post(); ?>
             <li><a href="<?php the_permalink() ?>" itemprop="url"><?php the_title(); ?></a>......
              <?php the_time( get_option( 'date_format' ) ); ?> <?php esc_html_e( 'in', ' emphasize' ); ?> <?php the_category(' &amp; ');?>
              </li>
<?php endwhile; ?>
      

<?php elseif (is_archive()) : ?>

		<?php if ( have_posts() ) : ?>

            <?php while ( have_posts() ) : the_post(); ?>

                <?php
                    /* Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
                    get_template_part( 'content', get_post_format() );
                ?>

            <?php endwhile; ?>

            <?php emphasize_paging_nav(); ?>

        <?php else : ?>

            <?php get_template_part( 'content', 'none' ); ?>

        <?php endif; ?>
                
<?php elseif (is_search()) : ?>

		<?php if ( have_posts() ) : ?>
        
            <header class="page-header">
                <h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'emphasize' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
            </header>
        
            <?php while ( have_posts() ) : the_post(); ?>
        
                <?php
                    /**
                     * Run the loop for the search to output the results.
                     * If you want to overload this in a child theme then include a file
                     * called content-search.php and that will be used instead.
                     */
                    get_template_part( 'content', 'search' );
                    ?>
        
            <?php endwhile; ?>
        
            <?php emphasize_paging_nav(); ?>
        
        <?php else : ?>
        
            <?php get_template_part( 'content', 'none' ); ?>
        
        <?php endif; ?>
        

<?php elseif (is_page()) : ?>

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				endwhile;
			?>
            
            
<?php endif; ?>
