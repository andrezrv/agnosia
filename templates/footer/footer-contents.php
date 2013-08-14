<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows the footer contents.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

?>

<?php if ( function_exists( 'agnosia_ac_post_additional_html' ) ) : ?>
	<?php agnosia_load_template( 'after-container' , 'content' ); ?>
<?php endif; ?>

<?php global $sidebar_templates ; ?>

<?php if ( agnosia_show_footer() ) : ?>

	<?php $sidebars = agnosia_get( 'footer_columns_number' , 'footer' ) ; ?>

	<footer id="footer">

		<section id="footer-content" class="<?php agnosia_wrapper_style(); ?>">

			<nav id="footer-sidebar" class="row-fluid">

				<?php $counter = 1; while ( $counter <= $sidebars ) : ?>

					<div class="span<?php echo (12/$sidebars); ?> sidebar-<?php echo $sidebars; ?>">

						<?php if ( dynamic_sidebar( __( 'Footer' , 'agnosia' ) . ' #' . $counter ) ) : ?>

							<?php /* Sidebar is printed */ ?>

						<?php else : ?>

							<div class="extra widget">

								<?php agnosia_load_template( $sidebar_templates[ $counter ] , 'sidebar' ); ?>
								
							</div>

						<?php endif; ?>

					</div>

				<?php $counter++; endwhile; ?>

			</nav>

		</section>

	</footer>

	<?php agnosia_load_template( 'footer-credits'  , 'footer' ); ?>

<?php endif; ?>