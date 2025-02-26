<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
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

<section class="post-comments">
        <div class="row">
            <div class="col-md-12">
                <div id="comments" class="comments-area">


		            <?php if ( have_comments() ) : ?>
                        <h2 class="comments-title post-sub-heading">
				            <?php
				            printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'angel' ),
					            number_format_i18n( get_comments_number() ), get_the_title() );
				            ?>
                        </h2>


                        <ul class="comment-list media-list comments-list m-bot-50 clearlist">
				            <?php
				            wp_list_comments( array(
					            'style'       => 'ul',
					            'short_ping'  => true,
					            'avatar_size' => 70,
				            ) );
				            ?>
                        </ul><!-- .comment-list -->


		            <?php endif; // have_comments() ?>

		            <?php
		            // If comments are closed and there are comments, let's leave a little note, shall we?
		            if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
			            ?>
                        <p class="no-comments"><?php _e( 'Comments are closed.', 'angel' ); ?></p>
		            <?php endif; ?>

		            <?php comment_form(); ?>

                </div><!-- .comments-area -->

            </div>
        </div>
</section>


