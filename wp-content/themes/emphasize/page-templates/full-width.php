<?php
/**
 * Template Name: Full Width Page 
 * @package Emphasize
 */

get_header(); ?>
              
              
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
                        
            <?php get_template_part( 'loop' ); ?> 
            
          </div>
        </div>
      </div>
    
    </main>
</div>
    
<?php
get_footer();
