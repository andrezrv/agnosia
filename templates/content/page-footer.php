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

<footer class="page-footer <?php agnosia_post_class(); ?> <?php agnosia_post_format(); ?>">

	<?php if ( agnosia_show_page_metadata() ) : ?>
							
		<?php agnosia_load_template( 'pages-meta-after'  , 'content' ); ?>

	<?php endif; ?>

	<?php agnosia_load_template( 'post-edit'  , 'content' ); ?>	

	<?php agnosia_load_template( 'the-author'  , 'content' ); ?>	

</footer>