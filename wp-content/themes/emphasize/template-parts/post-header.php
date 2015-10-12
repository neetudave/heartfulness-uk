<?php
/**
 * Global blog post header
 * @package Emphasize
 */
?>


<?php 	
	if ( is_sticky() ) :
		
		echo '<h2 class="entry-title" itemprop="name">';
		echo '<span class="sticky-label">', esc_html_e('Featured', 'emphasize') . '</span>';
		echo '<a href="' .esc_url( get_permalink() ) .'">'; 
		 
		if(the_title( '', '', false ) !='') the_title(); 
		else  esc_html_e('Untitled', 'emphasize'); 
		echo '</a></h2>';
	else :
		echo '<h2 class="entry-title" itemprop="name"><a href="' . esc_url( get_permalink() ) .'">'; 
		if(the_title( '', '', false ) !='') the_title(); 
		else  esc_html_e('Untitled', 'emphasize'); 
		echo '</a></h2>';				
	endif;
?>

<?php if ( 'post' == get_post_type() ) : ?>
    <div class="entry-meta">
        <?php emphasize_posted_on(); ?>
    </div><!-- .entry-meta -->
<?php endif; ?>