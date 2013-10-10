<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows the permalink of a post or page.
 * You can add or remove functionality via child themes.
 * 
 * @since 1.0
 * @author andrezrv
 * 
 * @package Agnosia
 */

?>

<section class="permalink">
	<span><a href="<?php the_permalink(); ?>" class="permalink"><?php _e( 'Permalink' , 'agnosia' ); ?></a></span>
</section>