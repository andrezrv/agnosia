<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows a post author box.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

?>

<?php 

	if ( 
		( is_page() and agnosia_show_page_author_information() )
		or ( is_single() and agnosia_show_post_author_information() )
	) : 

?>

		<div id="authorarea">

			<?php 

				if ( 
					( is_page() and agnosia_show_page_author_avatar() )
					or ( is_single() and agnosia_show_post_author_avatar() )
				) :
				
					agnosia_load_template( 'author-box-gravatar'  , 'content' );

				endif;

			?>

			<div class="authorinfo">

				<h3><?php the_author_posts_link(); ?></h3>

				<p><?php the_author_meta( 'description' ); ?></p>

			</div>
			
		</div>

<?php 

	endif; 

?>