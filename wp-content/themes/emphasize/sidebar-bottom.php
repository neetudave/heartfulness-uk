<?php
/**
 * Bottom sidebar. 
 * @package Emphasize
 * 
 */


if (   ! is_active_sidebar( 'bottom1'  )
	&& ! is_active_sidebar( 'bottom2' )
	&& ! is_active_sidebar( 'bottom3'  )
	&& ! is_active_sidebar( 'bottom4'  )		
		
	)

		return;
	// If we get this far, we have widgets. Let do this.
?>

<div id="bottom-group" style="background-color: <?php echo esc_attr(get_theme_mod( 'bottom_group_bg', '#709096' )); ?>; color: <?php echo esc_attr(get_theme_mod( 'bottom_group_text', '#c8e1e6' )); ?> ;">

  <div class="container">
  <div class="row">
       
        <aside class="widget-area" role="complementary">
               
			<?php if ( is_active_sidebar( 'bottom1' ) ) : ?>
                <div id="bottom1" <?php emphasize_bottomgroup(); ?> role="complementary">
                    <?php dynamic_sidebar( 'bottom1' ); ?>
                </div>
            <?php endif; ?>
            
            <?php if ( is_active_sidebar( 'bottom2' ) ) : ?>      
                <div id="bottom2" <?php emphasize_bottomgroup(); ?> role="complementary">
                    <?php dynamic_sidebar( 'bottom2' ); ?>
                </div>         
            <?php endif; ?>
            
            <?php if ( is_active_sidebar( 'bottom3' ) ) : ?>        
                <div id="bottom3" <?php emphasize_bottomgroup(); ?> role="complementary">
                    <?php dynamic_sidebar( 'bottom3' ); ?>
                </div>
            <?php endif; ?>
            
            <?php if ( is_active_sidebar( 'bottom4' ) ) : ?>     
                <div id="bottom4" <?php emphasize_bottomgroup(); ?> role="complementary">
                    <?php dynamic_sidebar( 'bottom4' ); ?>
                </div>
             <?php endif; ?>
           </aside>         
    
      </div>
</div>    
</div>