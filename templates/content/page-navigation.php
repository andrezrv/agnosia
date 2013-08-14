<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows the internal navigation links of a page.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

?>

<nav id="page-navigation">

	<ul class="pager">

	    <li class="previous">
	    	<?php next_posts_link ( __( '&larr; Older Entries' , 'agnosia' ) ); ?>
	    </li>

	    <li class="next">
	    	<?php previous_posts_link ( __( 'Newer Entries &rarr;' , 'agnosia' ) ); ?>
	    </li>

    </ul>

</nav>