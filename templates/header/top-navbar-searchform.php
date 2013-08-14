<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows the top navigation menu searchform.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

?>

<form action="<?php agnosia_home_url(); ?>" method="get" class="navbar-search">
	<input type="text" id="s" name="s" value="" class="search-query" placeholder="<?php _e( 'Search' , 'agnosia' ); ?>">
</form>