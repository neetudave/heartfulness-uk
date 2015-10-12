<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Emphasize
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="error-404 not-found" role="main">
      <div class="container">
          <div class="row">
            
            <div class="col-md-4">
              <img id="logo" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/error-image.png" alt="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>">
              </div>
            
            <div class="col-md-8">
              <div class="error-content">
                <h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'emphasize' ); ?></h1>            
                <p class="error-message"><?php _e( 'Unfortunately, the page you were hoping to find is not here. It may be a deleted page or an error on our part. Please try searching again, or use the main menu at the top to go to another part of our website.', 'emphasize' ); ?></p>             
                <?php get_search_form(); ?>                       
                </div>           
              </div>
            
          </div>
      </div>
    </main><!-- #main -->
</div><!-- #primary --> 

<?php get_footer(); ?>
