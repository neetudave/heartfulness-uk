<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Emphasize
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div class="comment_holder clearfix" id="comments">
    <div class="comment_number">
        <div class="comment_number_inner">
        	<h3><?php comments_number( esc_html__('No Comments','emphasize'), '1'. esc_html__(' Comment ','emphasize'), '% '. esc_html__(' Comments ','emphasize')); ?></h3>
        </div>
    </div>
    
    <div class="comments">
		<?php if ( post_password_required() ) : ?>
        <p class="nopassword"><?php esc_html_e( 'This post is password protected. Enter the password to view any comments.', 'emphasize' ); ?></p>
    </div>
</div>

<?php	
	return;
	endif;
?>

<?php if ( have_comments() ) : ?>
	<ul class="comment-list">
		<?php wp_list_comments(array( 'callback' => 'emphasize_comment')); ?>
	</ul>
	<?php // End Comments ?>

 	<?php else : // this is displayed if there are no comments so far 

	if ( ! comments_open() ) :
?>
		<!-- If comments are open, but there are no comments. -->	 
		<!-- If comments are closed. -->
        
		<p><?php esc_html_e('Sorry, the comment form is closed at this time.', 'emphasize'); ?></p>

	<?php endif; ?>
<?php endif; ?>
</div>
</div>

<?php
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

$args = array(
	'id_form' => 'commentform',
	'id_submit' => 'submit_comment',
	'title_reply'=>'<h4>'. __( 'Post a Comment','emphasize' ) .'</h4>',
	'title_reply_to' => __( 'Post a Reply to %s','emphasize' ),
	'cancel_reply_link' => __( 'Cancel Reply','emphasize' ),
	'label_submit' => __( 'Submit','emphasize' ),
	'comment_field' => '<textarea id="comment" placeholder="'. esc_html__( 'Write your comment here...','emphasize' ).'" name="comment" cols="45" rows="8" aria-required="true"></textarea>',
	'comment_notes_before' => '',
	'comment_notes_after' => '',
	'fields' => apply_filters( 'comment_form_default_fields', array(
		'author' => '<div class="three_columns clearfix"><div class="column1"><div class="column_inner"><input id="author" name="author" placeholder="'.  esc_html__( 'Your full name','emphasize' ) .'" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' /></div></div>',
		'url' => '<div class="column2"><div class="column_inner"><input id="email" name="email" placeholder="'.  esc_html__( 'E-mail address','emphasize' ) .'" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"' . $aria_req . ' /></div></div>',
		'email' => '<div class="column3"><div class="column_inner"><input id="url" name="url" type="text" placeholder="'.  esc_html__( 'Website','emphasize' ) .'" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div></div></div>'
		 ) ) );
 ?>
 
 <div class="comment_pager">
	<p><?php paginate_comments_links(); ?></p>
 </div>
 
 <div class="comment_form">
	<?php comment_form($args); ?>
</div>
						
								
							
