<?php
/**
 * Blog layout structure
 * This establishes the type of blog layout
 * @package Emphasize
 */



 $blogstyle = get_theme_mod( 'blog_style', 'standardright' );
            
        switch ($blogstyle) {
            
            // Standard Right Sidebar
            case "standardright" :
                echo '<div class="container"><div class="row"><div class="col-md-8">';
					get_template_part( 'template-parts/page-header' );
                    get_template_part( 'loop' );
                echo '</div><div class="col-md-4">';
                    get_sidebar( 'right' );
                echo '</div></div></div>';
            break;		
    
            // Standard Left Sidebar
            case "standardleft" :		
                echo '<div class="container"><div class="row"><div class="col-md-8 col-md-push-4">';
                    get_template_part( 'template-parts/page-header' );
					get_template_part( 'loop' );
                echo '</div><div class="col-md-4 col-md-pull-8">';
                    get_sidebar( 'left' );
                echo '</div></div></div>';		
            break;							
                    
            // Standard Centered - no sidebars
            case "standardcentered" :		
                echo '<div class="container"><div class="row"><div class="col-md-12">';
                    get_template_part( 'template-parts/page-header' );
					get_template_part( 'loop' );
                echo '</div></div></div>';		
            break;           			
			
            // Left Featured Image - no sidebars
            case "leftfeatured" :		
                echo '<div class="container"><div class="row"><div class="col-md-12">';
                    get_template_part( 'template-parts/page-header' );
					get_template_part( 'loop' );
                echo '</div></div></div>';		
            break;					
                            
        } 
    ?>			
