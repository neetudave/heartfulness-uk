<?php
/**
 * The template for displaying image attachments 
 * @package Emphasize
 */

// Retrieve attachment metadata.
$metadata = wp_get_attachment_metadata();

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            
            <?php while ( have_posts() ) : the_post();	?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
              
              <div class="entry-attachment">						
                <?php emphasize_the_attached_image(); ?>						
              </div>
              
              <header class="entry-header">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
              </header>    
              
              <?php if ( has_excerpt() ) : ?>
              <div class="entry-caption">
                <?php the_excerpt(); ?>
              </div>
              <?php endif; ?>
              
              <div class="entry-content">   
                <?php
                            the_content();
                            
                            wp_link_pages( array(
                                'before'      => '<div class="page-links"><span class="page-links-title">' .  esc_html__( 'Pages:', 'emphasize' ) . '</span>',
                                'after'       => '</div>',
                                'link_before' => '<span>',
                                'link_after'  => '</span>',
                            ) );
                        ?>
              </div>
              
            </article>
            
            <nav class="image-navigation">                        
              <?php emphasize_attachment_nav(); ?>                      
            </nav>
            
            <?php endwhile; // end of the loop. ?>
          </div>
        </div>
      </div>

    </main>
</div>
    
<?php
get_footer();
