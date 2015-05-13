<?php
/**
 * The template for displaying comments.
 *
 * @package fang
 */

if ( post_password_required() ) {
	return;
	//don't display the comments section if the post is password protected and the visitor hasn't entered the password.
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf(
					_nx( 'One comment on %2$s', '%1$s comments on %2$s', get_comments_number(), 'comments title', 'codediva' ),
					number_format_i18n( get_comments_number() ),
					'<span>' . get_the_title() . '</span>'
				);
			?>
		</h2>

		<?php 
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : 
			// if there are comments, show the comments 
		?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text">
				<?php esc_html_e( 'Comment navigation', 'codediva' ); ?>
			</h2>
			<div class="nav-links">
				<div class="nav-previous">
					<?php previous_comments_link( __( 'Older Comments', 'codediva' ) ); ?>
				</div>
				<div class="nav-next">
					<?php next_comments_link( __( 'Newer Comments', 'codediva' ) ); ?>
				</div>
			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array( 'callback' => 'cd_comment' ) );
				// Show the list of comments. Replace the default comment template with the template created in the cd_comment function.
			?>
		</ol><!-- .comment-list -->

		<?php 
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : 
			// if there are comments, show the comments  
		?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'codediva' ); ?></h2>
			<div class="nav-links">
				<div class="nav-previous"><?php previous_comments_link( __( 'Older Comments', 'codediva' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments', 'codediva' ) ); ?></div>
			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'codediva' ); ?></p>
	<?php endif; ?>

	<?php 
		//comment_form();
		//Use comments_args to modify the default comment form.
		$comments_args = array(
		  'id_form'           => 'commentform',
		  'id_submit'         => 'submit',
		  'class_submit'      => 'submit',
		  'name_submit'       => 'submit',
		  'title_reply'       => __( 'Leave a Reply' ),
		  'title_reply_to'    => __( 'Leave a Reply to %s' ),
		  'cancel_reply_link' => __( 'Cancel Reply' ),
		  'label_submit'      => __( 'Have Your Say' ),
		  'format'            => 'xhtml',
		);
		comment_form($comments_args);		
	?>

</div><!-- #comments -->