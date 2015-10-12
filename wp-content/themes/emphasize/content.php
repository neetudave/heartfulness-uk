<?php
/**
 * Blog summary post styles
 * @package Emphasize
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting">


<?php $blogstyle = get_theme_mod( 'blog_style', 'standardright' );
		
	switch ($blogstyle) {
		
		// Standard summary right sidebar
		case "standardright" :		
			echo '<a href="' . get_permalink() . '">';
			the_post_thumbnail( '', array( 'class' => 'image-hover' ) ) ;
			echo '</a>' ;
			echo '<header class="entry-header text-left style1">';
			get_template_part( 'template-parts/post-header' );
			echo '</header><div class="entry-content text-left">';	
		// Option of content or excerpt
			$excerptcontent = esc_attr(get_theme_mod( 'excerpt_content', 'content' ));
				$excerptsize = esc_attr(get_theme_mod( 'excerpt_limit', '50' ));
					 switch ($excerptcontent) {
						case "content" :
							the_content(esc_html__('Read More', 'emphasize'));
						break;
						case "excerpt" : 
							echo '<p>' . emphasize_excerpt($excerptsize) . '</p>' ;
							echo '<p class="read-more"><a class="more-link" href="' . get_permalink() . '" itemprop="url">' .  esc_html__('Read More', 'emphasize') . '</a>' ;
						break;
				}	
			echo '</div><footer class="entry-footer">';
			get_template_part( 'template-parts/summary-footer' );
			echo '</footer>';
		break;		

		// Standard summary left sidebar
		case "standardleft" :		
			echo '<a href="' . get_permalink() . '">';
			the_post_thumbnail( '', array( 'class' => 'image-hover' ) ) ;
			echo '</a>' ;
			echo '<header class="entry-header style2">';
			get_template_part( 'template-parts/post-header' );
			echo '</header><div class="entry-content">';
		// Option of content or excerpt
			$excerptcontent = esc_attr(get_theme_mod( 'excerpt_content', 'content' ));
				$excerptsize = esc_attr(get_theme_mod( 'excerpt_limit', '50' ));
					 switch ($excerptcontent) {
						case "content" :
							the_content(esc_html__('Read More', 'emphasize'));
						break;
						case "excerpt" : 
							echo '<p>' . emphasize_excerpt($excerptsize) . '</p>' ;
							echo '<p class="read-more"><a class="more-link" href="' . get_permalink() . '" itemprop="url">' .  esc_html__('Read More', 'emphasize') . '</a>' ;
						break;
				}
			echo '</div><footer class="entry-footer">';
			get_template_part( 'template-parts/summary-footer' );
			echo '</footer>';
		break;
		
		
		// Standard summary centered no left or right sidebar
		case "standardcentered" :
			echo '<a href="' . get_permalink() . '">';
			the_post_thumbnail( '', array( 'class' => 'image-hover style3-post-image' ) ) ;
			echo '</a>';	
			echo '<header class="entry-header text-center style3">';
			get_template_part( 'template-parts/post-header' );
			echo '</header><div class="entry-content text-center">';
		// Option of content or excerpt
			$excerptcontent = esc_attr(get_theme_mod( 'excerpt_content', 'content' ));
				$excerptsize = esc_attr(get_theme_mod( 'excerpt_limit', '50' ));
					 switch ($excerptcontent) {
						case "content" :
							the_content(esc_html__('Read More', 'emphasize'));
						break;
						case "excerpt" : 
							echo '<p>' . emphasize_excerpt($excerptsize) . '</p>' ;
							echo '<p class="read-more"><a class="more-link" href="' . get_permalink() . '" itemprop="url">' .  esc_html__('Read More', 'emphasize') . '</a>' ;
						break;
				}
			echo '</div><footer class="entry-footer">';
			get_template_part( 'template-parts/summary-footer' );
			echo '</footer>';
		break;
		
		// Left featured image with no left or right sidebars
		case "leftfeatured" :
			echo '<a href="' . get_permalink() . '">';
			the_post_thumbnail( '', array( 'class' => 'image-hover style6-post-image' ) ) ;
			echo '</a>' ;							
			echo '<header class="entry-header style6">';
			get_template_part( 'template-parts/post-header' );
			echo '</header><div class="entry-content">';
		// Option of content or excerpt
			$excerptcontent = esc_attr(get_theme_mod( 'excerpt_content', 'content' ));
				$excerptsize = esc_attr(get_theme_mod( 'excerpt_limit', '50' ));
					 switch ($excerptcontent) {
						case "content" :
							the_content(esc_html__('Read More', 'emphasize'));
						break;
						case "excerpt" : 
							echo '<p>' . emphasize_excerpt($excerptsize) . '</p>' ;
							echo '<p class="read-more"><a class="more-link" href="' . get_permalink() . '" itemprop="url">' .  esc_html__('Read More', 'emphasize') . '</a>' ;
						break;
				}
			echo '</div><footer class="entry-footer">';
			get_template_part( 'template-parts/summary-footer' );
			echo '</footer>';
		break;
						
	}
?>

   
</article><!-- #post-## -->