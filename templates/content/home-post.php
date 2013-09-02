<article <?php post_class( agnosia_get_post_format() ) ?> id="post-<?php the_ID(); ?>">

	<?php if ( agnosia_index_show_thumbnail_before_header() ) : ?>

		<section class="post-thumbnail <?php agnosia_post_class(); ?> <?php agnosia_post_format(); ?>">

			<?php agnosia_post_thumbnail_img(); ?>

		</section>

	<?php endif; ?>

	<?php if ( agnosia_show_post_header() ) : ?>

		<header class="post-header <?php agnosia_post_class(); ?> <?php agnosia_post_format(); ?>">

			<?php if ( agnosia_show_post_author_gravatar() ) : ?>

				<?php agnosia_load_template( 'author-gravatar'  , 'content' ); ?>

			<?php endif; ?>

			<?php if ( agnosia_show_post_title() ) : ?>

				<?php agnosia_load_template( 'the-title'  , 'content' ); ?>

			<?php endif; ?>

			<?php if ( agnosia_index_show_thumbnail_after_title() ) : ?>

				<section class="post-thumbnail <?php agnosia_post_class(); ?> <?php agnosia_post_format(); ?>">

					<?php agnosia_post_thumbnail_img(); ?>

				</section>

			<?php endif; ?>
			
			<?php agnosia_load_template( 'posts-meta-before'  , 'content' ); ?>

		</header>

	<?php endif; ?>

	<?php if ( agnosia_index_show_thumbnail_after_meta() ) : ?>

		<section class="post-thumbnail <?php agnosia_post_class(); ?> <?php agnosia_post_format(); ?>">

			<?php agnosia_post_thumbnail_img(); ?>

		</section>

	<?php endif; ?>

	<section class="entry <?php agnosia_post_class(); ?> <?php agnosia_post_format(); ?>">

		<?php agnosia_load_template( 'the-content'  , 'content' ); ?>
		
	</section>

	<?php if ( agnosia_show_post_footer() ) : ?>

		<footer class="post-footer <?php agnosia_post_class(); ?>">

			<?php if ( agnosia_show_post_metadata() ) : ?>
					
				<?php agnosia_load_template( 'posts-meta-after'  , 'content' ); ?>

			<?php endif; ?>

			<?php agnosia_load_template( 'post-edit'  , 'content' ); ?>	
	
		</footer>

	<?php endif; ?>

</article>

<?php agnosia_load_template( 'separator'  , 'content' ); ?>