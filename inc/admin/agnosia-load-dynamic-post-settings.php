<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles the dynamic visualization of post settings by post formats into post editor.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

/* If post format types are enabled, 
** the pages with alternative format types will be treated as posts */

function agnosia_load_dynamic_post_settings() {

	if ( isset($_POST) and !empty($_POST) ) :

		$meta_value = get_post_meta( $_POST['post_ID'], 'agnosia_post_meta' , true ) ;
	 	$post_format = '';
		if ( $_POST['post_format'] and ( 'standard' != $_POST['post_format'] ) ) : $post_format = '_' . $_POST['post_format']; endif;

		$post_type = 'post';
		if ( 'page' == $_POST['post_type'] and '' == $post_format ) : $post_type = 'page' ; endif;

		agnosia_override_show( 
			$evaluated = agnosia_evaluate( 'show_header' , 'header' ) , 
			$show = array( 'key' => 'show_header' ,	'value' => isset( $meta_value['show_header'] ) ? $meta_value['show_header'] : '' , 'text' => __( 'Show site header' , 'agnosia' ) ) , 
			$hide = array( 'key' => 'hide_header' , 'value' => isset( $meta_value['hide_header'] ) ? $meta_value['hide_header'] : '' , 'text' => __( 'Hide site header' , 'agnosia' ) )
		);

		if ( 'page' == $_POST['post_type'] ) :

			agnosia_override_show(
				$evaluated = agnosia_evaluate( 'content_show_page_hierarchy' , 'content' ) , 
				$show = array( 'key' => 'content_show_page_hierarchy' ,	'value' => isset( $meta_value['content_show_page_hierarchy'] ) ? $meta_value['content_show_page_hierarchy'] : '' , 'text' => __( 'Show page hierarchy' , 'agnosia' ) ) , 
				$hide = array( 'key' => 'content_hide_page_hierarchy' , 'value' => isset( $meta_value['content_hide_page_hierarchy'] ) ? $meta_value['content_hide_page_hierarchy'] : '' , 'text' => __( 'Hide page hierarchy' , 'agnosia' ) )
			);

		endif;

		if ( 'status' == $_POST['post_format'] ) :

			agnosia_override_show( 
				$evaluated = agnosia_evaluate( 'content_show_' . $post_type . $post_format . '_thumbnail' , 'content' ) , 
				$show = array( 'key' => 'content_show_' . $post_type . $post_format . '_status_thumbnail' ,	'value' => isset( $meta_value['content_show_' . $post_type . $post_format . '_status_thumbnail'] ) ? $meta_value['content_show_' . $post_type . $post_format . '_status_thumbnail'] : '' , 'text' => __( 'Show Gravatar thumbnail' , 'agnosia' ) ) , 
				$hide = array( 'key' => 'content_hide_' . $post_type . $post_format . '_status_thumbnail' , 'value' => isset( $meta_value['content_hide_' . $post_type . $post_format . '_status_thumbnail'] ) ? $meta_value['content_hide_' . $post_type . $post_format . '_status_thumbnail'] : '' , 'text' => __( 'Hide Gravatar thumbnail' , 'agnosia' ) )
			);

			agnosia_override_show( 
				$evaluated = agnosia_evaluate( 'content_show_' . $post_type . $post_format . '_author_name' , 'content' ) , 
				$show = array( 'key' => 'content_show_' . $post_type . $post_format . '_status_author_name' ,	'value' => isset( $meta_value['content_show_' . $post_type . $post_format . '_status_author_name'] ) ? $meta_value['content_show_' . $post_type . $post_format . '_status_author_name'] : '' , 'text' => __( 'Show author name' , 'agnosia' ) ) , 
				$hide = array( 'key' => 'content_hide_' . $post_type . $post_format . '_status_author_name' , 'value' => isset( $meta_value['content_hide_' . $post_type . $post_format . '_status_author_name'] ) ? $meta_value['content_hide_' . $post_type . $post_format . '_status_author_name'] : '' , 'text' => __( 'Hide author name' , 'agnosia' ) )
			);

		endif;

		if ( 'quote' == $_POST['post_format'] ) :
			agnosia_override_show( 
				$evaluated = agnosia_evaluate( 'content_show_' . $post_type . $post_format . '_source' , 'content' ) , 
				$show = array( 'key' => 'content_show_' . $post_type . $post_format . '_source' ,	'value' => isset( $meta_value['content_show_' . $post_type . $post_format . '_source'] ) ? $meta_value['content_show_' . $post_type . $post_format . '_' . $post_type . $post_format . '_source'] : '' , 'text' => __( 'Show source' , 'agnosia' ) ) , 
				$hide = array( 'key' => 'content_hide_' . $post_type . $post_format . '_source' , 'value' => isset( $meta_value['content_hide_' . $post_type . $post_format . '_source'] ) ? $meta_value['content_hide_' . $post_type . $post_format . '_' . $post_type . $post_format . '_source'] : '' , 'text' => __( 'Hide source' , 'agnosia' ) )
			);

		endif;

		agnosia_override_show( 
			$evaluated = agnosia_evaluate( 'content_show_' . $post_type . $post_format . '_breadcrumb' , 'content' ) , 
			$show = array( 'key' => 'content_show_' . $post_type . $post_format . '_breadcrumb' ,	'value' => isset( $meta_value['content_show_' . $post_type . $post_format . '_breadcrumb'] ) ? $meta_value['content_show_' . $post_type . $post_format . '_breadcrumb'] : '' , 'text' => __( 'Show breadcrumb' , 'agnosia' ) ) , 
			$hide = array( 'key' => 'content_hide_' . $post_type . $post_format . '_breadcrumb' , 'value' => isset( $meta_value['content_hide_' . $post_type . $post_format . '_breadcrumb'] ) ? $meta_value['content_hide_' . $post_type . $post_format . '_breadcrumb'] : '' , 'text' => __( 'Hide breadcrumb' , 'agnosia' ) )
		);

		agnosia_override_show( 
			$evaluated = agnosia_evaluate( 'content_show_' . $post_type . $post_format . '_header' , 'content' ) , 
			$show = array( 'key' => 'content_show_' . $post_type . $post_format . '_header' ,	'value' => isset( $meta_value['content_show_' . $post_type . $post_format . '_header'] ) ? $meta_value['content_show_' . $post_type . $post_format . '_header'] : '' , 'text' => sprintf( __( 'Show %s header' , 'agnosia' ) , $_POST['post_type'] ) ) , 
			$hide = array( 'key' => 'content_hide_' . $post_type . $post_format . '_header' , 'value' => isset( $meta_value['content_hide_' . $post_type . $post_format . '_header'] ) ? $meta_value['content_hide_' . $post_type . $post_format . '_header'] : '' , 'text' => sprintf( __( 'Hide %s header' , 'agnosia' ) , $_POST['post_type'] ) ) ,
			$dependent = '#show_header_dependent' 
		);

		?>
		<div class="dependent" id="show_header_dependent">
		
			<?php

				agnosia_override_show(
					$evaluated = agnosia_evaluate( 'content_show_' . $post_type . $post_format . '_title' , 'content' ) , 
					$show = array( 'key' => 'content_show_' . $post_type . $post_format . '_title' ,	'value' => isset( $meta_value['content_show_' . $post_type . $post_format . '_title'] ) ? $meta_value['content_show_' . $post_type . $post_format . '_title'] : '' , 'text' => __( 'Show title' , 'agnosia' ) ) , 
					$hide = array( 'key' => 'content_hide_' . $post_type . $post_format . '_title' , 'value' => isset( $meta_value['content_hide_' . $post_type . $post_format . '_title'] ) ? $meta_value['content_hide_' . $post_type . $post_format . '_title'] : '' , 'text' => __( 'Hide title' , 'agnosia' ) )
				);

				agnosia_override_show(
					$evaluated = agnosia_evaluate( 'content_show_' . $post_type . $post_format . '_author' , 'content' ) , 
					$show = array( 'key' => 'content_show_' . $post_type . $post_format . '_author' ,	'value' => isset( $meta_value['content_show_' . $post_type . $post_format . '_author'] ) ? $meta_value['content_show_' . $post_type . $post_format . '_author'] : '' , 'text' => __( 'Show author' , 'agnosia' ) ) , 
					$hide = array( 'key' => 'content_hide_' . $post_type . $post_format . '_author' , 'value' => isset( $meta_value['content_hide_' . $post_type . $post_format . '_author'] ) ? $meta_value['content_hide_' . $post_type . $post_format . '_author'] : '' , 'text' => __( 'Hide author' , 'agnosia' ) )
				);

				agnosia_override_show(
					$evaluated = agnosia_evaluate( 'content_show_' . $post_type . $post_format . '_author_gravatar' , 'content' ) , 
					$show = array( 'key' => 'content_show_' . $post_type . $post_format . '_author_gravatar' ,	'value' => isset( $meta_value['content_show_' . $post_type . $post_format . '_author_gravatar'] ) ? $meta_value['content_show_' . $post_type . $post_format . '_author_gravatar'] : '' , 'text' => __( 'Show author avatar' , 'agnosia' ) ) , 
					$hide = array( 'key' => 'content_hide_' . $post_type . $post_format . '_author_gravatar' , 'value' => isset( $meta_value['content_hide_' . $post_type . $post_format . '_author_gravatar'] ) ? $meta_value['content_hide_' . $post_type . $post_format . '_author_gravatar'] : '' , 'text' => __( 'Hide author avatar' , 'agnosia' ) )
				);

				agnosia_override_show(
					$evaluated = agnosia_evaluate( 'content_show_' . $post_type . $post_format . '_meta' , 'content' ) , 
					$show = array( 'key' => 'content_show_' . $post_type . $post_format . '_meta' ,	'value' => isset( $meta_value['content_show_' . $post_type . $post_format . '_meta'] ) ? $meta_value['content_show_' . $post_type . $post_format . '_meta'] : '' , 'text' => __( 'Show meta data' , 'agnosia' ) ) , 
					$hide = array( 'key' => 'content_hide_' . $post_type . $post_format . '_meta' , 'value' => isset( $meta_value['content_hide_' . $post_type . $post_format . '_meta'] ) ? $meta_value['content_hide_' . $post_type . $post_format . '_meta'] : '' , 'text' => __( 'Hide meta data' , 'agnosia' ) ) ,
					$dependent = '#show_meta_dependent'
				);			

			?>
				
				<div class="dependent" id="show_meta_dependent">
				
					<?php

						if ( 'page' != $_POST['post_type'] ) :

							agnosia_override_show(
								$evaluated = agnosia_evaluate( 'content_show_' . $post_type . $post_format . '_date_top' , 'content' ) , 
								$show = array( 'key' => 'content_show_' . $post_type . $post_format . '_date_top' ,	'value' => isset( $meta_value['content_show_' . $post_type . $post_format . '_date_top'] ) ? $meta_value['content_show_' . $post_type . $post_format . '_date_top'] : '' , 'text' => __( 'Show date' , 'agnosia' ) ) , 
								$hide = array( 'key' => 'content_hide_' . $post_type . $post_format . '_date_top' , 'value' => isset( $meta_value['content_hide_' . $post_type . $post_format . '_date_top'] ) ? $meta_value['content_hide_' . $post_type . $post_format . '_date_top'] : '' , 'text' => __( 'Hide date' , 'agnosia' ) )					
							);
							
							agnosia_override_show(
								$evaluated = agnosia_evaluate( 'content_show_' . $post_type . $post_format . '_categories_top' , 'content' ) , 
								$show = array( 'key' => 'content_show_' . $post_type . $post_format . '_categories_top' ,	'value' => isset( $meta_value['content_show_' . $post_type . $post_format . '_categories_top'] ) ? $meta_value['content_show_' . $post_type . $post_format . '_categories_top'] : '' , 'text' => __( 'Show categories' , 'agnosia' ) ) , 
								$hide = array( 'key' => 'content_hide_' . $post_type . $post_format . '_categories_top' , 'value' => isset( $meta_value['content_hide_' . $post_type . $post_format . '_categories_top'] ) ? $meta_value['content_hide_' . $post_type . $post_format . '_categories_top'] : '' , 'text' => __( 'Hide categories' , 'agnosia' ) )					
							);
							
							agnosia_override_show(
								$evaluated = agnosia_evaluate( 'content_show_' . $post_type . $post_format . '_tags_top' , 'content' ) , 
								$show = array( 'key' => 'content_show_' . $post_type . $post_format . '_tags_top' ,	'value' => isset( $meta_value['content_show_' . $post_type . $post_format . '_tags_top'] ) ? $meta_value['content_show_' . $post_type . $post_format . '_tags_top'] : '' , 'text' => __( 'Show tags' , 'agnosia' ) ) , 
								$hide = array( 'key' => 'content_hide_' . $post_type . $post_format . '_tags_top' , 'value' => isset( $meta_value['content_hide_' . $post_type . $post_format . '_tags_top'] ) ? $meta_value['content_hide_' . $post_type . $post_format . '_tags_top'] : '' , 'text' => __( 'Hide tags' , 'agnosia' ) )					
							);

						endif;
						
						agnosia_override_show(
							$evaluated = agnosia_evaluate( 'content_show_' . $post_type . $post_format . '_comments_top' , 'content' ) , 
							$show = array( 'key' => 'content_show_' . $post_type . $post_format . '_comments_top' ,	'value' => isset( $meta_value['content_show_' . $post_type . $post_format . '_comments_top'] ) ? $meta_value['content_show_' . $post_type . $post_format . '_comments_top'] : '' , 'text' => __( 'Show # of comments' , 'agnosia' ) ) , 
							$hide = array( 'key' => 'content_hide_' . $post_type . $post_format . '_comments_top' , 'value' => isset( $meta_value['content_hide_' . $post_type . $post_format . '_comments_top'] ) ? $meta_value['content_hide_' . $post_type . $post_format . '_comments_top'] : '' , 'text' => __( 'Hide # of comments' , 'agnosia' ) )					
						);
		
						agnosia_override_show(
							$evaluated = agnosia_evaluate( 'content_show_' . $post_type . $post_format . '_permalinks_top' , 'content' ) , 
							$show = array( 'key' => 'content_show_' . $post_type . $post_format . '_permalinks_top' ,	'value' => isset( $meta_value['content_show_' . $post_type . $post_format . '_permalinks_top'] ) ? $meta_value['content_show_' . $post_type . $post_format . '_permalinks_top'] : '' , 'text' => __( 'Show permalink' , 'agnosia' ) ) , 
							$hide = array( 'key' => 'content_hide_' . $post_type . $post_format . '_permalinks_top' , 'value' => isset( $meta_value['content_hide_' . $post_type . $post_format . '_permalinks_top'] ) ? $meta_value['content_hide_' . $post_type . $post_format . '_permalinks_top'] : '' , 'text' => __( 'Hide permalink' , 'agnosia' ) )					
						);

					?>

				</div>
		
		</div>

		<?php

		agnosia_override_show(
			$evaluated = agnosia_evaluate( 'content_show_' . $post_type . $post_format . '_footer' , 'content' ) , 
			$show = array( 'key' => 'content_show_' . $post_type . $post_format . '_footer' ,	'value' => isset( $meta_value['content_show_' . $post_type . $post_format . '_footer'] ) ? $meta_value['content_show_' . $post_type . $post_format . '_footer'] : '' , 'text' => sprintf ( __( 'Show %s footer' , 'agnosia' ) , $_POST['post_type'] ) ) , 
			$hide = array( 'key' => 'content_hide_' . $post_type . $post_format . '_footer' , 'value' => isset( $meta_value['content_hide_' . $post_type . $post_format . '_footer'] ) ? $meta_value['content_hide_' . $post_type . $post_format . '_footer'] : '' , 'text' => sprintf ( __( 'Hide %s footer' , 'agnosia' ) , $_POST['post_type'] ) ) ,
			$dependent = '#show_footer_dependent'
		);

		?>

		<div class="dependent" id="show_footer_dependent">

		<?php

			if ( 'video' == $_POST['post_format'] ) : ?>

				<?php

					agnosia_override_show(
						$evaluated = agnosia_evaluate( 'content_show_' . $post_type . $post_format . '_title_bottom' , 'content' ) , 
						$show = array( 'key' => 'content_show_' . $post_type . $post_format . '_title_bottom' ,	'value' => isset( $meta_value['content_show_' . $post_type . $post_format . '_title_bottom'] ) ? $meta_value['content_show_' . $post_type . $post_format . '_title_bottom'] : '' , 'text' => __( 'Show title' , 'agnosia' ) ) , 
						$hide = array( 'key' => 'content_hide_' . $post_type . $post_format . '_title_bottom' , 'value' => isset( $meta_value['content_hide_' . $post_type . $post_format . '_title_bottom'] ) ? $meta_value['content_hide_' . $post_type . $post_format . '_title_bottom'] : '' , 'text' => __( 'Hide title' , 'agnosia' ) )
					);

			endif;

			agnosia_override_show(
				$evaluated = agnosia_evaluate( 'content_show_' . $post_type . $post_format . '_metadata' , 'content' ) ,
				$show = array( 'key' => 'content_show_' . $post_type . $post_format . '_metadata' ,	'value' => isset( $meta_value['content_show_' . $post_type . $post_format . '_metadata'] ) ? $meta_value['content_show_' . $post_type . $post_format . '_metadata'] : '' , 'text' => __( 'Show meta data' , 'agnosia' ) ) , 
				$hide = array( 'key' => 'content_hide_' . $post_type . $post_format . '_metadata' , 'value' => isset( $meta_value['content_hide_' . $post_type . $post_format . '_metadata'] ) ? $meta_value['content_hide_' . $post_type . $post_format . '_metadata'] : '' , 'text' => __( 'Hide meta data' , 'agnosia' ) ) ,
				$dependent = '#show_footer_metadata_dependent'
			);

			?>

			<div class="dependent" id="show_footer_metadata_dependent">
				
				<?php

					agnosia_override_show(
						$evaluated = agnosia_evaluate( 'content_show_' . $post_type . $post_format . '_author_bottom' , 'content' ) , 
						$show = array( 'key' => 'content_show_' . $post_type . $post_format . '_author_bottom' ,	'value' => isset( $meta_value['content_show_' . $post_type . $post_format . '_author_bottom'] ) ? $meta_value['content_show_' . $post_type . $post_format . '_author_bottom'] : '' , 'text' => __( 'Show author' , 'agnosia' ) ) , 
						$hide = array( 'key' => 'content_hide_' . $post_type . $post_format . '_author_bottom' , 'value' => isset( $meta_value['content_hide_' . $post_type . $post_format . '_author_bottom'] ) ? $meta_value['content_hide_' . $post_type . $post_format . '_author_bottom'] : '' , 'text' => __( 'Hide author' , 'agnosia' ) )
					);

					if ( 'page' != $_POST['post_type'] ) :

						agnosia_override_show(
							$evaluated = agnosia_evaluate( 'content_show_' . $post_type . $post_format . '_date_bottom' , 'content' ) , 
							$show = array( 'key' => 'content_show_' . $post_type . $post_format . '_date_bottom' ,	'value' => isset( $meta_value['content_show_' . $post_type . $post_format . '_date_bottom'] ) ? $meta_value['content_show_' . $post_type . $post_format . '_date_bottom'] : '' , 'text' => __( 'Show date' , 'agnosia' ) ) , 
							$hide = array( 'key' => 'content_hide_' . $post_type . $post_format . '_date_bottom' , 'value' => isset( $meta_value['content_hide_' . $post_type . $post_format . '_date_bottom'] ) ? $meta_value['content_hide_' . $post_type . $post_format . '_date_bottom'] : '' , 'text' => __( 'Hide date' , 'agnosia' ) )
						);

						agnosia_override_show(
							$evaluated = agnosia_evaluate( 'content_show_' . $post_type . $post_format . '_categories_bottom' , 'content' ) , 
							$show = array( 'key' => 'content_show_' . $post_type . $post_format . '_categories_bottom' ,	'value' => isset( $meta_value['content_show_' . $post_type . $post_format . '_categories_bottom'] ) ? $meta_value['content_show_' . $post_type . $post_format . '_categories_bottom'] : '' , 'text' => __( 'Show categories' , 'agnosia' ) ) , 
							$hide = array( 'key' => 'content_hide_' . $post_type . $post_format . '_categories_bottom' , 'value' => isset( $meta_value['content_hide_' . $post_type . $post_format . '_categories_bottom'] ) ? $meta_value['content_hide_' . $post_type . $post_format . '_categories_bottom'] : '' , 'text' => __( 'Hide categories' , 'agnosia' ) )
						);

						agnosia_override_show(
							$evaluated = agnosia_evaluate( 'content_show_' . $post_type . $post_format . '_tags_bottom' , 'content' ) , 
							$show = array( 'key' => 'content_show_' . $post_type . $post_format . '_tags_bottom' ,	'value' => isset( $meta_value['content_show_' . $post_type . $post_format . '_tags_bottom'] ) ? $meta_value['content_show_' . $post_type . $post_format . '_tags_bottom'] : '' , 'text' => __( 'Show tags' , 'agnosia' ) ) , 
							$hide = array( 'key' => 'content_hide_' . $post_type . $post_format . '_tags_bottom' , 'value' => isset( $meta_value['content_hide_' . $post_type . $post_format . '_tags_bottom'] ) ? $meta_value['content_hide_' . $post_type . $post_format . '_tags_bottom'] : '' , 'text' => __( 'Hide tags' , 'agnosia' ) )
						);

					endif;

					agnosia_override_show(
						$evaluated = agnosia_evaluate( 'content_show_' . $post_type . $post_format . '_comments_bottom' , 'content' ) , 
						$show = array( 'key' => 'content_show_' . $post_type . $post_format . '_comments_bottom' ,	'value' => isset( $meta_value['content_show_' . $post_type . $post_format . '_comments_bottom'] ) ? $meta_value['content_show_' . $post_type . $post_format . '_comments_bottom'] : '' , 'text' => __( 'Show # of comments' , 'agnosia' ) ) , 
						$hide = array( 'key' => 'content_hide_' . $post_type . $post_format . '_comments_bottom' , 'value' => isset( $meta_value['content_hide_' . $post_type . $post_format . '_comments_bottom'] ) ? $meta_value['content_hide_' . $post_type . $post_format . '_comments_bottom'] : '' , 'text' => __( 'Hide # of comments' , 'agnosia' ) )
					);

					agnosia_override_show(
						$evaluated = agnosia_evaluate( 'content_show_' . $post_type . $post_format . '_permalinks_bottom' , 'content' ) , 
						$show = array( 'key' => 'content_show_' . $post_type . $post_format . '_permalinks_bottom' ,	'value' => isset( $meta_value['content_show_' . $post_type . $post_format . '_permalinks_bottom'] ) ? $meta_value['content_show_' . $post_type . $post_format . '_permalinks_bottom'] : '' , 'text' => __( 'Show permalink' , 'agnosia' ) ) , 
						$hide = array( 'key' => 'content_hide_' . $post_type . $post_format . '_permalinks_bottom' , 'value' => isset( $meta_value['content_hide_' . $post_type . $post_format . '_permalinks_bottom'] ) ? $meta_value['content_hide_' . $post_type . $post_format . '_permalinks_bottom'] : '' , 'text' => __( 'Hide permalink' , 'agnosia' ) )
					);

				?>

			</div>

			<?php

			if ( 'page' != $_POST['post_type'] ) :

				agnosia_override_show(
					$evaluated = agnosia_evaluate( 'content_show_' . $post_type . $post_format . '_navigation' , 'content' ) , 
					$show = array( 'key' => 'content_show_' . $post_type . $post_format . '_navigation' ,	'value' => isset( $meta_value['content_show_' . $post_type . $post_format . '_navigation'] ) ? $meta_value['content_show_' . $post_type . $post_format . '_navigation'] : '' , 'text' => __( 'Show posts navigation' , 'agnosia' ) ) , 
					$hide = array( 'key' => 'content_hide_' . $post_type . $post_format . '_navigation' , 'value' => isset( $meta_value['content_hide_' . $post_type . $post_format . '_navigation'] ) ? $meta_value['content_hide_' . $post_type . $post_format . '_navigation'] : '' , 'text' => __( 'Hide posts navigation' , 'agnosia' ) )					
				);
			
			endif;

			?>

			<?php

			agnosia_override_show(
				$evaluated = isset( $meta_value['content_show_' . $post_type . $post_format . '_author_box'] ) ? $meta_value['content_show_' . $post_type . $post_format . '_author_box'] : agnosia_evaluate( 'content_show_' . $post_type . $post_format . '_author_box' , 'content' ) , 
				$show = array( 'key' => 'content_show_' . $post_type . $post_format . '_author_box' ,	'value' => isset( $meta_value['content_show_' . $post_type . $post_format . '_author_box'] ) ? $meta_value['content_show_' . $post_type . $post_format . '_author_box'] : '' , 'text' => __( 'Show author information' , 'agnosia' ) ) , 
				$hide = array( 'key' => 'content_hide_' . $post_type . $post_format . '_author_box' , 'value' => isset( $meta_value['content_hide_' . $post_type . $post_format . '_author_box'] ) ? $meta_value['content_hide_' . $post_type . $post_format . '_author_box'] : '' , 'text' => __( 'Hide author information' , 'agnosia' ) ) ,
				$dependent = '#show_author_box_dependent'
			);

			?>
		
			<div id="show_author_box_dependent" class="dependent">

				<?php

				agnosia_override_show(
					$evaluated = agnosia_evaluate( 'content_show_' . $post_type . $post_format . '_author_box_gravatar' , 'content' ) , 
					$show = array( 'key' => 'content_show_' . $post_type . $post_format . '_author_box_gravatar' ,	'value' => isset( $meta_value['content_show_' . $post_type . $post_format . '_author_box_gravatar'] ) ? $meta_value['content_show_' . $post_type . $post_format . '_author_box_gravatar'] : '' , 'text' => __( 'Show author avatar' , 'agnosia' ) ) , 
					$hide = array( 'key' => 'content_hide_' . $post_type . $post_format . '_author_box_gravatar' , 'value' => isset( $meta_value['content_hide_' . $post_type . $post_format . '_author_box_gravatar'] ) ? $meta_value['content_hide_' . $post_type . $post_format . '_author_box_gravatar'] : '' , 'text' => __( 'Hide author avatar' , 'agnosia' ) )
				);

				?>

			</div>
		
		</div>

		<?php

		if ( current_theme_supports( 'agnosia-left-sidebar' ) ) :

			agnosia_override_show(
				$evaluated = agnosia_evaluate( 'show_left_sidebar' , 'sidebar' ) , 
				$show = array( 'key' => 'show_left_sidebar' ,	'value' => isset( $meta_value['show_left_sidebar'] ) ? $meta_value['show_left_sidebar'] : '' , 'text' => __( 'Show left sidebar' , 'agnosia' ) ) , 
				$hide = array( 'key' => 'hide_left_sidebar' , 'value' => isset( $meta_value['hide_left_sidebar'] ) ? $meta_value['hide_left_sidebar'] : '' , 'text' => __( 'Hide left sidebar' , 'agnosia' ) )
			);

		endif;

		if ( current_theme_supports( 'agnosia-right-sidebar' ) ) :
		
			agnosia_override_show(
				$evaluated = agnosia_evaluate( 'show_right_sidebar' , 'sidebar' ) , 
				$show = array( 'key' => 'show_right_sidebar' ,	'value' => isset( $meta_value['show_right_sidebar'] ) ? $meta_value['show_right_sidebar'] : '' , 'text' => __( 'Show right sidebar' , 'agnosia' ) ) , 
				$hide = array( 'key' => 'hide_right_sidebar' , 'value' => isset( $meta_value['hide_right_sidebar'] ) ? $meta_value['hide_right_sidebar'] : '' , 'text' => __( 'Hide right sidebar' , 'agnosia' ) )
			);

		endif;

		agnosia_override_show( 
			$evaluated = agnosia_evaluate( 'show_footer' , 'footer' ) , 
			$show = array( 'key' => 'show_footer' ,	'value' => isset( $meta_value['show_footer'] ) ? $meta_value['show_footer'] : '' , 'text' => __( 'Show site footer' , 'agnosia' ) ) , 
			$hide = array( 'key' => 'hide_footer' , 'value' => isset( $meta_value['hide_footer'] ) ? $meta_value['hide_footer'] : '' , 'text' => __( 'Hide site footer' , 'agnosia' ) )
		);

	endif;

	die();

}

add_action( 'wp_ajax_agnosia_load_dynamic_post_settings', 'agnosia_load_dynamic_post_settings');

?>