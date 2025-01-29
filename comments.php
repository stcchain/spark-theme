<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 */
if ( post_password_required() ) {
	return;
}
?>


<div id="comments" class="comments-area">
	<?php if( have_comments() ) : ?>

		<h3 class="comments-title">
			<?php
				$comments_number = get_comments_number();
				if ( 1 === $comments_number ) {
					/* translators: %s: post title */
					printf( _x( 'One response on <i>&ldquo;%s&rdquo;</i>', 'comments title', 'spark-theme' ), get_the_title() );
				} else {
					printf(
						/* translators: 1: number of comments, 2: post title */
						_nx(
							'%1$s response on <i>&ldquo;%2$s&rdquo;</i>',
							'%1$s responses on <i>&ldquo;%2$s&rdquo;</i>',
							$comments_number,
							'comments title',
							'spark-theme'
						),
						number_format_i18n( $comments_number ),
						get_the_title()
					);
				}
			?>
		</h3>

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 42,
					'callback'	=> 'spark_comments_list'
				) );
			?>
		</ol><!-- .comment-list -->

	<?php endif; // check for the have comments  ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'spark-theme' ); ?></p>
	<?php endif; ?>

	<?php
		comment_form( array(
			'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
			'title_reply_after'  => '</h2>',
		) );
	?>
</div>