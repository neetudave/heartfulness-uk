<?php
/**
 * Quote Post Format
 * @package Emphasize
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="" itemtype="http://schema.org/Article">

    <div class="entry-content">
        <header class="entry-header">
            <?php the_title( '<h1 class="entry-title" itemprop="name">', '</h1>' ); ?>
        </header>
        
        <?php the_content(); ?>
    
    	<footer class="entry-footer">
			<?php get_template_part( 'template-parts/post-footer' ); ?> 
        </footer> 
                  
    </div>
    
</article>