<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows the title of a post, page, index entries or archive entries.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

?>

<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>