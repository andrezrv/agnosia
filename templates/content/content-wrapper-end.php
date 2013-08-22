<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows the end of the content wrapper.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

?>

<?php if ( current_theme_supports( 'agnosia-dynamic-wrapper' ) ) : ?>

								<?php if ( agnosia_header_is_wrapped() ) : ?>

									</div>

								<?php endif; ?>

								<?php agnosia_load_template( 'footer-contents' , 'footer' ); ?>

						<?php if ( agnosia_footer_is_wrapped() ) : ?>

							</div>

						<?php endif; ?>

				<?php if ( agnosia_header_and_footer_are_wrapped() ) : ?>

					</div>

				<?php endif; ?>

<?php else : ?>

	<?php agnosia_load_template( 'footer-contents' , 'footer' ); ?>

<?php endif; ?>