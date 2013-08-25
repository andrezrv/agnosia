<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles the post editor metaboxes.
 * Find a great amount of information about this topic in @link http://wp.smashingmagazine.com/2011/10/04/create-custom-post-meta-boxes-wordpress/
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */


if ( is_admin() ) :


	/* Meta box setup function. */
	function agnosia_post_meta_boxes_setup() {

		/* Add meta boxes on the 'add_meta_boxes' hook. */
		add_action( 'add_meta_boxes', 'agnosia_add_post_meta_boxes' );

		/* Save post meta on the 'save_post' hook. */
		add_action( 'save_post', 'agnosia_save_post_meta', 10 , 2 );

	}



	/* Create one or more meta boxes to be displayed on the post editor screen. */
	function agnosia_add_post_meta_boxes() {

		global $post;

		$meta_value = get_post_meta( $post->ID, 'agnosia_post_meta' , true ) ;

		add_meta_box(
			'post-excerpt-settings',			// Unique ID
			esc_html( __( 'Excerpt settings', 'agnosia' ) ),		// Title
			'agnosia_post_excerpt_settings_meta_box',		// Callback function
			'',					// Admin page (or post type)
			'side',					// Context
			'default'					// Priority
		);

		if ( current_user_can( 'content_enable_custom_stylesheet' ) 
			and ( !isset( $meta_value['block_custom_stylesheet'] ) 
				or !$meta_value['block_custom_stylesheet'] 
			) 
		) :

			add_meta_box(
				'post-custom-stylesheet',			// Unique ID
				esc_html( __( 'Custom stylesheet', 'agnosia' ) ),		// Title
				'agnosia_post_custom_stylesheet_meta_box',		// Callback function
				'',					// Admin page (or post type)
				'advanced',					// Context
				'default'					// Priority
			);

		endif;

		if ( current_user_can( 'content_enable_featured_image_position' ) 
			and ( !isset( $meta_value['block_featured_image_position'] ) 
				or !$meta_value['block_featured_image_position'] 
			) 
		) :

			add_meta_box(
				'post-featured-image-settings',			// Unique ID
				esc_html( __( 'Featured image position', 'agnosia' ) ),		// Title
				'agnosia_post_featured_image_settings_meta_box',		// Callback function
				'',					// Admin page (or post type)
				'side',					// Context
				'default'					// Priority
			);

		endif;

		if ( current_user_can( 'content_enable_override_default_settings' ) 
			and ( !isset( $meta_value['block_override_default_settings'] ) 
				or !$meta_value['block_override_default_settings'] 
			) 
		) :

			add_meta_box(
				'post-custom-settings',			// Unique ID
				esc_html ( __( 'Override default settings', 'agnosia' ) ),		// Title
				'agnosia_post_settings_meta_box',		// Callback function
				'',					// Admin page (or post type)
				'advanced',					// Context
				'default'					// Priority
			);

		endif;

		if ( current_user_can( 'manage_options' ) ) :

			add_meta_box(
				'post-block-advanced-options',		// Unique ID
				esc_html( __( 'Block advanced options', 'agnosia' ) ),		// Title
				'agnosia_post_block_advanced_options',		// Callback function
				'',					// Admin page (or post type)
				'advanced',					// Context
				'high'					// Priority
			);

		endif;

	}


	/* Display excerpt settings meta box. */
	function agnosia_post_excerpt_settings_meta_box() {

		global $post;

		wp_nonce_field( basename( __FILE__ ) , 'agnosia_post_excerpt_settings_nonce' );

		$meta_value = get_post_meta( $post->ID, 'agnosia_post_meta' , true ) ;

		$value_post = isset( $meta_value['content_show_post_excerpt_in_post'] ) ? $meta_value['content_show_post_excerpt_in_post'] : '' ;
		$value_index = isset( $meta_value['content_show_post_excerpt_in_index'] ) ? $meta_value['content_show_post_excerpt_in_index'] : '' ;

		?>

		<div id="post-excerpt-settings-container" class="settings-container">

			<ul class="category-tabs" id="post-excerpt-tabs">
				<li class="tabs"><a href="#excerpt-into-post"><?php _e( 'Into post' , 'agnosia' ); ?></a></li>
				<li class="hide-if-no-js"><a href="#excerpt-into-index"><?php _e( 'Into index' , 'agnosia' ); ?></a></li>
			</ul>

			<div id="excerpt-into-post" class="tabs-panel">

				<input type="checkbox" name="agnosia_post_meta[content_show_post_excerpt_in_post]" id="content_show_post_excerpt_in_post" value="true" <?php agnosia_is_checked_meta_box_setting( $value_post , 'true' ); ?>>
				<label for="content_show_post_excerpt_in_post"><?php _e( 'Show excerpt before content' , 'agnosia' ) ; ?></label><br />

			</div>

			<div id="excerpt-into-index" class="tabs-panel hidden">

				<input type="radio" name="agnosia_post_meta[content_show_post_excerpt_in_index]" id="content_show_post_excerpt_in_index[0]" value="true" <?php agnosia_is_checked_meta_box_setting( $value_index , 'true' ); agnosia_default_meta_box_setting( $value_index ); ?>>
				<label for="content_show_post_excerpt_in_index[0]"><?php _e( 'Show excerpt' , 'agnosia' ) ; ?></label><br />

				<input type="radio" name="agnosia_post_meta[content_show_post_excerpt_in_index]" id="content_show_post_excerpt_in_index[1]" value="false" <?php agnosia_is_checked_meta_box_setting( $value_index , 'false' ); ?>>
				<label for="content_show_post_excerpt_in_index[1]"><?php _e( 'Show content' , 'agnosia' ) ; ?></label><br />

			</div>

		</div>

		<?php

	}



	/* Display the stylesheet meta box. */
	function agnosia_post_custom_stylesheet_meta_box( $post, $box ) { 

		global $post;

		wp_nonce_field( basename( __FILE__ ) , 'agnosia_post_custom_stylesheet_nonce' );

		$meta_value = get_post_meta( $post->ID, 'agnosia_post_meta' , true ) ;

		$value = isset( $meta_value['custom_stylesheet'] ) ? $meta_value['custom_stylesheet'] : '' ;

		?>

		<p><strong><?php _e( "Use custom CSS file for this entry.", 'agnosia' ); ?></strong></p>

		<div class="agnosia_custom_stylesheet">		

			<input type="text" id="agnosia_post_meta[custom_stylesheet]" name="agnosia_post_meta[custom_stylesheet]" value="<?php echo $value; ?>" style="width:300px;" /><br />
			<small><?php _e( 'Use your own CSS file for adding details and/or overriding the main styles.' , 'agnosia' ) . ' <strong>' . _e( 'It must be a valid URL, and you have to upload the file to your desired location on you own.' , 'agnosia' ) . '</strong>'; ?></small>
		
		</div>

		<?php
		
	}


	/* Displat featured image settings meta box */
	function agnosia_post_featured_image_settings_meta_box( $post , $box ) {

		global $post;

		wp_nonce_field( basename( __FILE__ ) , 'agnosia_post_featured_image_settings_nonce' );

		$meta_value = get_post_meta( $post->ID, 'agnosia_post_meta' , true ) ;

		$value_post = isset( $meta_value['content_featured_image_position_in_post'] ) ? $meta_value['content_featured_image_position_in_post'] : '' ;
		$replace_value_post = isset( $meta_value['content_featured_image_replace_gravatar_in_post'] ) ? $meta_value['content_featured_image_replace_gravatar_in_post'] : '' ;
		$value_index = isset( $meta_value['content_featured_image_position_in_index'] ) ? $meta_value['content_featured_image_position_in_index'] : '' ;
		$replace_value_index = isset( $meta_value['content_featured_image_replace_gravatar_in_index'] ) ? $meta_value['content_featured_image_replace_gravatar_in_index'] : '' ;

		?>

		<div id="featured-image-settings-container" class="settings-container">

			<ul class="category-tabs" id="featured-images-tabs">
				<li class="tabs"><a href="#into-post"><?php _e( 'Into post' , 'agnosia' ); ?></a></li>
				<li class="hide-if-no-js"><a href="#into-index"><?php _e( 'Into index' , 'agnosia' ); ?></a></li>
			</ul>

			<div id="into-post" class="tabs-panel">

				<input type="radio" name="agnosia_post_meta[content_featured_image_position_in_post]" id="content_featured_image_position_in_post[0]" value="after-general-header-img" <?php agnosia_is_checked_meta_box_setting( $value_post , 'after-general-header-img' ); ?>>
				<label for="content_featured_image_position_in_post[0]"><?php _e( 'After site header as <code>img</code>' , 'agnosia' ) ; ?></label><br />

				<input type="radio" name="agnosia_post_meta[content_featured_image_position_in_post]" id="content_featured_image_position_in_post[1]" value="after-general-header-bg" <?php agnosia_is_checked_meta_box_setting( $value_post , 'after-general-header-bg' ); ?>>
				<label for="content_featured_image_position_in_post[1]"><?php _e( 'After site header as background' , 'agnosia' ) ; ?></label><br />

				<input type="radio" name="agnosia_post_meta[content_featured_image_position_in_post]" id="content_featured_image_position_in_post[2]" value="before-post-header"  <?php agnosia_is_checked_meta_box_setting( $value_post , 'before-post-header' ); ?>>
				<label for="content_featured_image_position_in_post[2]"><?php _e( 'Before post header' , 'agnosia' ) ; ?></label><br />

				<input type="radio" name="agnosia_post_meta[content_featured_image_position_in_post]" id="content_featured_image_position_in_post[3]" value="after-post-title"  <?php agnosia_is_checked_meta_box_setting( $value_post , 'after-post-title' ); ?>>
				<label for="content_featured_image_position_in_post[3]"><?php _e( 'After post title' , 'agnosia' ) ; ?></label><br />

				<input type="radio" name="agnosia_post_meta[content_featured_image_position_in_post]" id="content_featured_image_position_in_post[4]" value="after-post-author"  <?php agnosia_is_checked_meta_box_setting( $value_post , 'after-post-author' ); ?>>
				<label for="content_featured_image_position_in_post[4]"><?php _e( 'After post author' , 'agnosia' ) ; ?></label><br />

				<input type="radio" name="agnosia_post_meta[content_featured_image_position_in_post]" id="content_featured_image_position_in_post[5]" value="after-post-meta"  <?php agnosia_is_checked_meta_box_setting( $value_post , 'after-post-meta' ); agnosia_default_meta_box_setting( $value_post ); ?>>
				<label for="content_featured_image_position_in_post[5]"><?php _e( 'After post meta' , 'agnosia' ) ; ?></label><br />

				<input type="radio" name="agnosia_post_meta[content_featured_image_position_in_post]" id="content_featured_image_position_in_post[6]" value="not-show"  <?php agnosia_is_checked_meta_box_setting( $value_post , 'not-show' ); ?>>
				<label for="content_featured_image_position_in_post[7]"><?php _e( 'Not show' , 'agnosia' ) ; ?></label><br />

				<p><input type="checkbox" name="agnosia_post_meta[content_featured_image_replace_gravatar_in_post]" id="content_featured_image_replace_gravatar_in_post" value="true"  <?php agnosia_is_checked_meta_box_setting( $replace_value_post , 'true' ); ?>>
				<label for="content_featured_image_replace_gravatar_in_post"><?php _e( 'Replace Gravatar' , 'agnosia' ) ; ?></label></p>

			</div>

			<div id="into-index" class="tabs-panel hidden">

				<input type="radio" name="agnosia_post_meta[content_featured_image_position_in_index]" id="content_featured_image_position_in_index[0]" value="before-post-header" <?php agnosia_is_checked_meta_box_setting( $value_index , 'before-post-header' ); ?>>
				<label for="content_featured_image_position_in_index[0]"><?php _e( 'Before post header' , 'agnosia' ) ; ?></label><br />

				<input type="radio" name="agnosia_post_meta[content_featured_image_position_in_index]" id="content_featured_image_position_in_index[1]" value="after-post-title" <?php agnosia_is_checked_meta_box_setting( $value_index , 'after-post-title' ); ?>>
				<label for="content_featured_image_position_in_index[1]"><?php _e( 'After post title' , 'agnosia' ) ; ?></label><br />

				<input type="radio" name="agnosia_post_meta[content_featured_image_position_in_index]" id="content_featured_image_position_in_index[2]" value="after-post-author" <?php agnosia_is_checked_meta_box_setting( $value_index , 'after-post-author' ); ?>>
				<label for="content_featured_image_position_in_index[2]"><?php _e( 'After post author' , 'agnosia' ) ; ?></label><br />

				<input type="radio" name="agnosia_post_meta[content_featured_image_position_in_index]" id="content_featured_image_position_in_index[4]" value="after-post-meta" <?php agnosia_is_checked_meta_box_setting( $value_index , 'after-post-meta' ); agnosia_default_meta_box_setting( $value_index ); ?>>
				<label for="content_featured_image_position_in_index[3]"><?php _e( 'After post meta' , 'agnosia' ) ; ?></label><br />

				<input type="radio" name="agnosia_post_meta[content_featured_image_position_in_index]" id="content_featured_image_position_in_index[4]" value="not-show" <?php agnosia_is_checked_meta_box_setting( $value_index , 'not-show' ); ?>>
				<label for="content_featured_image_position_in_index[4]"><?php _e( 'Not show' , 'agnosia' ) ; ?></label><br />
				
				<p><input type="checkbox" name="agnosia_post_meta[content_featured_image_replace_gravatar_in_index]" id="content_featured_image_replace_gravatar_in_index" value="true"  <?php agnosia_is_checked_meta_box_setting( $replace_value_index , 'true' ); ?>>
				<label for="content_featured_image_replace_gravatar_in_index"><?php _e( 'Replace Gravatar' , 'agnosia' ) ; ?></label></p>

			</div>

		</div>

		<?php

	}

	/* Display the settings meta box. */
	function agnosia_post_settings_meta_box( $post , $box ) { 

		global $post;

		wp_nonce_field( basename( __FILE__ ), 'agnosia_post_override_nonce' );

		?>

		<div id="agnosia-settings-container"></div>

		<a id="agnosia-ajax-url" style="display:none;" href="<?php echo agnosia_get_uri( '/inc/admin/agnosia-load-dynamic-post-settings.php' ); ?>"><?php _e( 'Ajax URL' , 'agnosia' ); ?></a>
		<a id="agnosia-home-path" style="display:none;" href="<?php echo get_home_path(); ?>"><?php _e( 'Home path' , 'agnosia' ); ?></a>

		<?php
		
	}


	/* Display additional meta box. */
	function agnosia_post_block_advanced_options( $post, $box ) { 

		global $post;

		wp_nonce_field( basename( __FILE__ ), 'agnosia_post_block_advanced_options_nonce' );

		$meta_value = get_post_meta( $post->ID, 'agnosia_post_meta' , true ) ;

		function is_checked_block_advanced_option( $option , $value ) {
			$checked = ( isset( $value[$option] ) and $value[$option] ) ? 'checked="checked"' : '';
			echo $checked; 
		}

		?>

		<div class="agnosia-post-block-advanced-options">
			
			<p>
				<input type="checkbox" id="agnosia-post-block-options[0]" name="agnosia_post_meta[block_custom_stylesheet]" value="true" <?php is_checked_block_advanced_option( 'block_custom_stylesheet' , $meta_value ); ?> />
				<label for="agnosia-post-block-options[0]"><?php _e( 'Block custom stylesheet option' , 'agnosia' ); ?></label><br />

				<?php if ( function_exists( 'agnosia_ac_post_additional_html' ) ) : ?>
					<input type="checkbox" id="agnosia-post-block-options[1]" name="agnosia_post_meta[block_additional_html]" value="true" <?php is_checked_block_advanced_option( 'block_additional_html' , $meta_value ); ?> />
					<label for="agnosia-post-block-options[1]"><?php _e( 'Block additional HTML option' , 'agnosia' ); ?></label><br />
				<?php endif; ?>

				<input type="checkbox" id="agnosia-post-block-options[2]" name="agnosia_post_meta[block_featured_image_position]" value="true" <?php is_checked_block_advanced_option( 'block_featured_image_position' , $meta_value ); ?> />
				<label for="agnosia-post-block-options[2]"><?php _e( 'Block featured image position option' , 'agnosia' ); ?></label><br />

				<input type="checkbox" id="agnosia-post-block-options[3]" name="agnosia_post_meta[block_override_default_settings]" value="true" <?php is_checked_block_advanced_option( 'block_override_default_settings' , $meta_value ); ?> />
				<label for="agnosia-post-block-options[3]"><?php _e( 'Block override default settings option' , 'agnosia' ); ?></label>
			</p>


		</div>

		<?php
		
	}


	/* Save the meta box's post metadata. */
	function agnosia_save_post_meta( $post_id, $post ) {

		/* Verify the nonces before proceeding. */

		if ( !isset( $_POST['agnosia_post_excerpt_settings_nonce'] ) 
			|| !wp_verify_nonce( $_POST['agnosia_post_excerpt_settings_nonce'] , basename( __FILE__ ) ) 
		) :
		
			return $post_id;
		
		endif;

		if ( function_exists( 'agnosia_ac_post_additional_html' ) ) :
			
			if ( 
				current_user_can( 'content_enable_additional_html' ) 
				and isset( $meta_value['block_additional_html'] ) 
				and '' != $meta_value['block_additional_html'] 
			) :
			
				if ( !isset( $_POST['agnosia_post_additional_html_nonce'] ) 
					|| !wp_verify_nonce( $_POST['agnosia_post_additional_html_nonce'] , basename( __FILE__ ) ) 
				) :
				
					return $post_id;
				
				endif;
			
			endif;

		endif;

		if ( 
			current_user_can( 'content_enable_custom_stylesheet' ) 
			and isset( $meta_value['block_custom_stylesheet'] ) 
			and '' != $meta_value['block_custom_stylesheet'] 
		) :
			
			if ( !isset( $_POST['agnosia_post_custom_stylesheet_nonce'] ) 
				|| !wp_verify_nonce( $_POST['agnosia_post_custom_stylesheet_nonce'] , basename( __FILE__ ) ) 
			) :
			
				return $post_id;
			
			endif;

		endif;

		if ( 
			current_user_can( 'content_enable_featured_image_position' ) 
			and isset( $meta_value['block_featured_image_position'] ) 
			and '' != $meta_value['block_featured_image_position'] 
		) :
		
			if ( !isset( $_POST['agnosia_post_featured_image_settings_nonce'] ) 
				|| !wp_verify_nonce( $_POST['agnosia_post_featured_image_settings_nonce'] , basename( __FILE__ ) ) 
			) :

				return $post_id;

			endif;

		endif;


		if ( 
			current_user_can( 'content_enable_override_default_settings' ) 
			and isset( $meta_value['block_override_default_settings'] ) 
			and '' != $meta_value['block_override_default_settings'] 
		) :

			if ( !isset( $_POST['agnosia_post_override_nonce'] ) 
				|| !wp_verify_nonce( $_POST['agnosia_post_override_nonce'] , basename( __FILE__ ) ) 
			) :

				return $post_id;

			endif;

		endif;

		if ( current_user_can( 'manage_options' ) ) :

			if ( !isset( $_POST['agnosia_post_block_advanced_options_nonce'] ) 
				|| !wp_verify_nonce( $_POST['agnosia_post_block_advanced_options_nonce'] , basename( __FILE__ ) ) 
			) :
			
				return $post_id;
			
			endif;

		endif;

		/* Get the post type object. */
		$post_type = get_post_type_object( $post->post_type );

		/* Check if the current user has permission to edit the post. */
		if ( !current_user_can( $post_type->cap->edit_post, $post_id ) ) :
			return $post_id;
		endif;

		/* Get the posted data and sanitize it for use as an HTML class. */
		$new_meta_value = ( isset( $_POST['agnosia_post_meta'] ) ? $_POST['agnosia_post_meta'] : '' );

		/* Get the meta key. */
		$meta_key = 'agnosia_post_meta';

		/*print_r($_POST['agnosia_post_meta']); die();*/

		/* Get the meta value of the custom field key. */
		$meta_value = get_post_meta( $post_id, $meta_key, true );

		/* If a new meta value was added and there was no previous value, add it. */
		if ( $new_meta_value && '' == $meta_value )
			add_post_meta( $post_id, $meta_key, $new_meta_value, true );

		/* If the new meta value does not match the old value, update it. */
		elseif ( $new_meta_value && $new_meta_value != $meta_value )
			update_post_meta( $post_id, $meta_key, $new_meta_value );

		/* If there is no new meta value but an old value exists, delete it. */
		elseif ( $new_meta_value == '' && $meta_value )
			delete_post_meta( $post_id, $meta_key, $meta_value );

	}



	function agnosia_is_checked_meta_box_setting( $value1 , $value2 ) {
		if ( $value1 == $value2 ) : echo 'checked="checked"' ; endif;
	}

	function agnosia_default_meta_box_setting( $value1 ) {
		if ( !$value1 ) : echo 'checked="checked"' ; endif;
	}
	


	/* Fire our meta box setup function on the post editor screen. */
	add_action( 'load-post.php', 'agnosia_post_meta_boxes_setup' );
	add_action( 'load-post-new.php', 'agnosia_post_meta_boxes_setup' );

endif;



?>