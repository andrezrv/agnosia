<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles permissions over manipulation of certain features into the post editor.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

function agnosia_update_advanced_post_and_pages_capabilities() {

	if ( !function_exists( 'get_editable_roles' ) ) :

		require_once ABSPATH . '/wp-admin/includes/user.php';

	endif;

	$roles = get_editable_roles();

	$capabilities = array( 
		'content_enable_additional_html' , 
		'content_enable_custom_stylesheet' ,
		'content_enable_featured_image_position' ,
		'content_enable_override_default_settings'
	);

	foreach ( $roles as $key => $value ) :

		foreach ( $capabilities as $capability ) :

			if ( agnosia_evaluate( $capability . '_for_' . $key ) ) :

				if ( !current_user_can( $capability ) ) : 

					$role = get_role( $key );
					$role->add_cap( $capability );

				endif;

			else :

				if ( current_user_can( $capability ) ) : 

					$role = get_role( $key );
					$role->remove_cap( $capability );

				endif;

			endif;
			
		endforeach;

		
	endforeach;

}

?>