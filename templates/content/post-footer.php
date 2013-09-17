<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows the post footer.
 * You can add or remove functionality via child themes.
 * 
 * @since 1.0
 * @author andrezrv
 * 
 * @package Agnosia
 */

?>

<footer class="post-footer <?php agnosia_post_class(); ?> <?php agnosia_post_format(); ?>">

	<?php if ( agnosia_show_post_metadata() ) : ?>
			
		<?php agnosia_load_template( 'posts-meta-after'  , 'content' ); ?>

	<?php endif; ?>

	<?php agnosia_load_template( 'post-edit'  , 'content' ); ?>	

</footer>