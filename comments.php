<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles views for WordPress comments.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

?>

<?php if ( is_single() or ( is_page() and comments_open() ) ) : ?>

<section id="comments-container">

	<?php
		
		if ( !empty( $_SERVER['SCRIPT_FILENAME'] ) and basename( $_SERVER['SCRIPT_FILENAME'] ) == 'comments.php' ) :

			die( __( 'Please do not load this page directly. Thanks!' , 'agnosia' ) );

		endif;

		if ( post_password_required() ) :

			_e( 'This post is password protected. Enter the password to view comments.' , 'agnosia' );

		?></section><?php

			return false;

		endif;

		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
		$required_text = '';

	?>

	<?php if (  have_comments() and ( !is_page() or ( is_page() and comments_open() ) ) ) : ?>
		
		<h2 id="comments">
			<?php comments_number( __( 'No Responses' , 'agnosia' ) , __( 'One Response' , 'agnosia' ) , __( '% Responses' , 'agnosia' ) ); ?>
		</h2>

		<nav class="navigation">
			<div class="next-posts"><?php previous_comments_link() ?></div>
			<div class="prev-posts"><?php next_comments_link() ?></div>
		</nav>

		<ol class="commentlist">

			<?php wp_list_comments( array( 'avatar_size' => 38 ) ); ?>

		</ol>

		<nav class="navigation">
			<div class="next-posts"><?php previous_comments_link() ?></div>
			<div class="prev-posts"><?php next_comments_link() ?></div>
		</nav>
		
	<?php endif; ?>

	<?php if ( comments_open() ) : ?>

		<section id="respond">
		
			<?php

			$args = array(

				'id_form' => 'commentform' ,
				'id_submit' => 'submit' ,
				'title_reply' => __( 'Leave a Reply' , 'agnosia' ) ,
				'title_reply_to' => __( 'Leave a Reply to %s' , 'agnosia' ) ,
				'cancel_reply_link' => __( 'Cancel Reply' , 'agnosia' ) ,
				'label_submit' => __( 'Post Comment' , 'agnosia' ) ,
				'comment_field' => '<div class="control-group"><div class="controls"><textarea class="control-label" name="comment" id="comment" cols="80" rows="5" tabindex="4"></textarea></div></div>' ,
				'must_log_in' => __( 'You must be' , 'agnosia' ) . '<a href="' . wp_login_url( get_permalink() ) . '"' . __( ' logged in' , 'agnosia' ) . '</a> ' . __( 'to post a comment.' , 'agnosia' ) ,
				'logged_in_as' => __( 'Logged in as' , 'agnosia' ) . ' <a href="' . get_option('siteurl') . '/wp-admin/profile.php">' . $user_identity . '</a>. <a href="'. wp_logout_url( get_permalink() ) . '" title="' . __( 'Log out' , 'agnosia' ) . '">' . __( 'Log out' , 'agnosia' ) . ' &raquo;</a></p>' ,
				'comment_notes_before' => '<p class="comment-notes">' . __( 'Your email address will not be published.' , 'agnosia' ) . ( $req ? $required_text : '' ) . '</p>',
				'comment_notes_after' => '<pre class="form-allowed-tags">' . sprintf( __( 'You may use these HTML tags and attributes: %s', 'agnosia' ), ' <code>' . allowed_tags() . '</code>' ) . '</pre>',
				'fields' => apply_filters( 'comment_form_default_fields', array(
					'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name', 'agnosia' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
					'email' => '<p class="comment-form-email"><label for="email">' . __( 'Email', 'agnosia' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
					'url' => '<p class="comment-form-url"><label for="url">' . __( 'Website', 'agnosia' ) . '</label>' . '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>' ) 
				) 

			);

			?>
		
			<?php agnosia_comment_form( $args ); ?>
			
		</section>

	<?php elseif ( !is_page() ) : // comments are closed ?>

		<p><em><?php _e( 'Comments are closed.' , 'agnosia' )?></em></p>

	<?php endif; ?>

</section>

<?php endif; ?>
