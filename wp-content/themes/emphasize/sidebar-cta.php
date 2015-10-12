<?php
/**
 * Call to Action Sidebar 
 * @package Emphasize
 * 
 */


if ( ! is_active_sidebar( 'cta' ) ) {
	return;
}
?>
<div id="cta">            
    <aside class="widget-area" role="complementary">		             
        <?php dynamic_sidebar( 'cta' ); ?> 	
    </aside>
</div>
