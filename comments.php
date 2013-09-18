<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles views for WordPress comments.
 * You can add or remove functionality via child themes.
 * 
 * @since 1.0
 * @author andrezrv
 * 
 * @package Agnosia
 */

?>

<?php if ( is_single() or ( is_page() and comments_open() ) ) : ?>

	<section id="comments-container">

		<?php if ( !empty( $_SERVER['SCRIPT_FILENAME'] ) and basename( $_SERVER['SCRIPT_FILENAME'] ) == 'comments.php' ) : ?>
			<?php die( __( 'Please do not load this page directly. Thanks!' , 'agnosia' ) ); ?>
		<?php endif; ?>

		<?php if ( post_password_required() ) : ?>

			<?php _e( 'This post is password protected. Enter the password to view comments.' , 'agnosia' ); ?>

		<?php else : ?>

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
					<?php agnosia_comment_form(); ?>				
				</section>

			<?php elseif ( !is_page() ) : // comments are closed ?>

				<div id="comments-closed">
					<p><em><?php _e( 'Comments are closed.' , 'agnosia' )?></em></p>
				</div>

			<?php endif; ?>

		<?php endif; ?>

	</section>

<?php endif; ?>
