<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows contents before main container section.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

?>

<?php

if ( is_page() or is_single() ) :

	ob_start();
	do_action( 'agnosia_ac_before_container_html' );
	$before_container_html = ob_get_contents();
	ob_end_clean();

	$has_large_header = agnosia_page_has_large_header();

	if ( $before_container_html or $has_large_header ) :

	?>

		<div id="before-container-html"<?php agnosia_try_post_thumbnail_bg(); ?> class="extra-content">
			
			<?php echo $before_container_html; ?>

			<?php if ( $has_large_header and agnosia_show_page_header() ) : ?>

				<header class="post-header page-header <?php agnosia_post_class(); ?> <?php agnosia_post_format(); ?>">

					<div class="container">						

						<?php agnosia_load_template( 'the-title'  , 'content' ); ?>

						<?php if ( agnosia_post_show_thumbnail_after_title() ) : ?>

						    <section class="post-thumbnail <?php agnosia_post_class(); ?> <?php agnosia_post_format(); ?>">

						        <?php agnosia_post_thumbnail_img(); ?>

						    </section>

						<?php endif; ?>

						<div class="page-excerpt">
							<?php the_excerpt(); ?>
						</div>

					</div>

				</header>

			<?php endif; ?>

		</div>

	<?php

	endif;

	wp_reset_query();

endif;

?>