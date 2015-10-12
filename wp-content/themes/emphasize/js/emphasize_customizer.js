// Adding buttons to our customizer

jQuery(document).ready(function() {
	'use strict';

	jQuery( "#sortable" ).sortable();
	
	jQuery( "#sortable" ).disableSelection();
	
	jQuery('.wp-full-overlay-sidebar-content').prepend('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="http://www.shapedpixels.com/emphasize-pro" class="button" target="_blank">{pro}</a>'.replace('{pro}',objectL10n.pro));	
	
	jQuery('.wp-full-overlay-sidebar-content').prepend('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="https://wordpress.org/support/view/theme-reviews/emphasize" class="button" target="_blank">{review}</a>'.replace('{review}',objectL10n.review));
	
	jQuery('.wp-full-overlay-sidebar-content').prepend('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="https://wordpress.org/support/theme/emphasize" class="button" target="_blank">{support}</a>'.replace('{support}',objectL10n.support));
	
	jQuery('.wp-full-overlay-sidebar-content').prepend('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="http://www.shapedpixels.com/setup-emphasize" class="button" target="_blank">{documentation}</a>'.replace('{documentation}',objectL10n.documentation));

		
	jQuery( '.ui-state-default' ).on( 'mousedown', function() {

		jQuery( '#customize-header-actions #save' ).trigger( 'click' );

	});
	
});
