<?php
/**
 * @package Emphasize
 */
 
 
if( get_theme_mod( 'hide_edit' ) == '') { ?>

	 <?php edit_post_link( esc_html__( 'Edit this Post', 'emphasize' ), '<span class="edit-link">', '</span>' ); ?>
     
<?php } ?>