<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Emphasize
 */

get_header(); ?>


<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="container">
            <div class="row">
            
                <div class="col-md-8">            
                    <?php get_template_part( 'loop' ); ?>
                </div>    
                
                <div class="col-md-4">
                	<?php get_sidebar( 'right' ); ?>
                </div> 
                      
            </div>
        </div>
    </main>
</div>
<?php get_footer(); ?>
