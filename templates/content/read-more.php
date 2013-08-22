<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows a "read more" link.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

?>

<a href="<?php the_permalink(); ?>" class="more-link btn btn-primary"><?php _e( 'Read more' , 'agnosia' ); ?></a>