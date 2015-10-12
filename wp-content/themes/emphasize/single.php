<?php
/**
 * The template for displaying all single posts.
 *
 * @package Emphasize
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

		<?php $singlestyle = get_theme_mod( 'single_layout', 'singleright' );
                
            switch ($singlestyle) {
                
                // Single Right Sidebar
                case "singleright" :
                    echo '<div class="container"><div class="row"><div class="col-md-8">';
                        get_template_part( 'loop' );
                    echo '</div><div class="col-md-4">';
                        get_sidebar( 'right' );
                    echo '</div></div></div>';
                break;		
        
                // Single Left Sidebar
                case "singleleft" :		
                    echo '<div class="container"><div class="row"><div class="col-md-8 col-md-push-4">';
                        get_template_part( 'loop' );
                    echo '</div><div class="col-md-4 col-md-pull-8">';
                        get_sidebar( 'left' );
                    echo '</div></div></div>';		
                break;							
                        
                // Single - no sidebars
                case "singlewide" :		
                    echo '<div class="container"><div class="row"><div class="col-md-12">';
                        get_template_part( 'loop' );
                    echo '</div></div></div>';		
                break;           
        
                } 
        ?>

    </main>
</div>

<?php get_footer(); ?>






		