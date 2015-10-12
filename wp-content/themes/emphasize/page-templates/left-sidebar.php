<?php
/**
 * Template Name: Left Sidebar
 *
 * @package Emphasize
 *
 */

get_header(); ?>


<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="container">
            <div class="row">
            
                <div class="col-md-8 col-md-push-4">           
                <?php get_template_part( 'loop' ); ?>            
                </div>
                  
                <div class="col-md-4 col-md-pull-8">        
                <?php get_sidebar( 'left' ); ?>       
                </div>
            
            </div>
        </div>
    </main>
</div>
    
<?php get_footer(); ?>    