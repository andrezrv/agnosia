<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows the list of post categories of the site.
 * You can add or remove functionality via child themes.
 * 
 * @since 1.0
 * @author andrezrv
 * 
 * @package Agnosia
 */

?>

<h2><?php _e( 'Categories' , 'agnosia' ); ?></h2>

<ul>
	<?php wp_list_categories('show_count=1&title_li='); ?>
</ul>