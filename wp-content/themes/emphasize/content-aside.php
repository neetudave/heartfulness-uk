<?php
/**
 * Aside Post Format
 * @package Emphasize
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">

        <header class="entry-header">
            <h1 class="entry-title"><?php echo get_the_author(); ?><small><?php echo get_the_date(); ?></small></h1>
        </header>   
    
		<?php the_content(); ?>
       
    	<footer class="entry-footer">
			<?php get_template_part( 'template-parts/post-footer' ); ?> 
        </footer>   
        
    </div>
	
</article>