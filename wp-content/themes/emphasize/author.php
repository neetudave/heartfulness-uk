<?php
/**
 * The template for displaying author info and posts.
 *
 * @package Emphasize
 */
 
 get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

		<div class="author-information" itemscope="" itemtype="http://schema.org/Person">
          <div class="container">
              <div class="row">
                
                <div class="col-md-2">		
                  <div class="user-thumbnail">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 180 ); ?>		
                    </div>
                  </div>
                
                <div class="col-md-10">
                  
                  <div class="author-page-header">
                    <?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
                    <h2><span class="contact-name" itemprop="name"><?php echo $curauth->display_name; ?></span></h2>					
                    </div>
                  
                  <div class="author-description">
                    <p class="author-bio"><?php echo $curauth->user_description; ?></p>	
                    </div>
                  
                  <div class="author-website">
                    <a href="<?php echo $curauth->user_url; ?>" target="_blank" itemprop="url"><?php echo $curauth->user_url; ?></a>
                    </div>
                  
                  <div class="author-posts">
                    <h2><?php esc_html_e( 'Articles Written by', 'emphasize' ); ?> <?php echo $curauth->display_name; ?></h2>
                    
                    <ol><!-- The Loop -->
                      
                      <?php get_template_part( 'loop' ); ?>
                      
                      </ol><!-- End Loop -->
                    </div>
                  
                  </div>		
              </div>
          </div>
		</div>  

    </main><!-- #main -->
</div><!-- #primary --> 
    
<?php
get_footer();