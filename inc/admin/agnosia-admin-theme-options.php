<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file handles the visualization of the Agnosia Options page.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */



function agnosia_theme_manager_admin_options_scripts( $hook ) {

	if ( 'appearance_page_agnosia-theme-options' == $hook ) :

		wp_enqueue_script( 'agnosia-admin-theme-options' , agnosia_get_uri( '/js/agnosia-admin-theme-options.js' ) , array( 'jquery' ) , '1.0' );

	endif;

}


/* Init theme options */
function agnosia_theme_options_init() {
	register_setting( 'agnosia_options', 'agnosia_theme_options', '' );
}



/* Load up the menu page */
function agnosia_theme_options_add_page() {
	
	add_theme_page( 
		__( 'Agnosia Options', 'agnosia' ) , 
		__( 'Agnosia Options', 'agnosia' ) , 
		'edit_theme_options' , 
		'agnosia-theme-options' , 
		'agnosia_theme_options_do_page' 
	);

}



/* Create options page */
function agnosia_theme_options_do_page() {

	/* Update values */
	if ( $_POST ) : 
		agnosia_process( $_POST ); 
		agnosia_update_advanced_post_and_pages_capabilities();
	endif;

?>

	<div class="wrap">

		<form method="post" action="themes.php?page=agnosia-theme-options">

			<section id="agnosia_options">

				<?php screen_icon(); ?> 

				<h2 id="agnosia_options_navigation" class="nav-tab-wrapper">

					<a href="#agnosia_general_options" class="nav-tab nav-tab-active"><?php _e( 'General' , 'agnosia' ); ?></a>
					<a href="#agnosia_header_options" class="nav-tab"><?php _e( 'Header' , 'agnosia' ); ?></a>
					<a href="#agnosia_content_options" class="nav-tab"><?php _e( 'Content' , 'agnosia' ); ?></a>
					
					<?php if ( current_theme_supports( 'agnosia-left-sidebar' ) 
						or current_theme_supports( 'agnosia-right-sidebar' ) ) : 
					?>

						<a href="#agnosia_sidebar_options" class="nav-tab"><?php _e( 'Sidebar' , 'agnosia' ); ?></a>
					
					<?php endif; ?>

					<a href="#agnosia_footer_options" class="nav-tab"><?php _e( 'Footer' , 'agnosia' ); ?></a>

					<small><?php echo sprintf( __( 'Agnosia is built with %1$sBootstrap%2$s.' , 'agnosia' ) , '<a href="http://twitter.github.com/bootstrap/">', '</a>' ); ?></small>

				</h2>

				<section id="agnosia_options_container">

					<?php if ( isset( $_POST ) and !empty($_POST) ) : ?>

						<div class="updated fade">
							<p>
								<strong><?php _e( 'Options saved', 'agnosia' ); ?></strong>
							</p>
						</div>

					<?php endif; ?>

					<fieldset id="agnosia_general_options" style="display:block;">

						<h3 class="hndle"><?php _e( 'General Options' , 'agnosia' ); ?></h3>

						<div class="inside">

							<?php echo agnosia_get_form_options_by_category( 'general' ); ?>

						</div>

					</fieldset>

					<fieldset id="agnosia_header_options" style="">

						<h3 class="hndle"><?php _e( 'Header Options' , 'agnosia' ); ?></h3>

						<div class="inside">

							<?php echo agnosia_get_form_options_by_category( 'header' ); ?>

						</div>

					</fieldset>

					<fieldset id="agnosia_content_options" style="">

						<h3 class="hndle"><?php _e( 'Content Options' , 'agnosia' ); ?></h3>

						<div class="inside">

							<?php echo agnosia_get_form_options_by_category( 'content' ); ?>

						</div>

					</fieldset>

					<?php if ( current_theme_supports( 'agnosia-left-sidebar' ) 
						or current_theme_supports( 'agnosia-right-sidebar' ) ) : 
					?>

						<fieldset id="agnosia_sidebar_options" style="">

							<h3 class="hndle"><?php _e( 'Sidebar Options' , 'agnosia' ); ?></h3>

							<div class="inside">

								<?php echo agnosia_get_form_options_by_category( 'sidebar' ); ?>

							</div>

						</fieldset>

					<?php endif; ?>

					<fieldset id="agnosia_footer_options" style="">

						<h3 class="hndle"><?php _e( 'Footer Options' , 'agnosia' ); ?></h3>

						<div class="inside">

							<?php echo agnosia_get_form_options_by_category( 'footer' ); ?>

						</div>

					</fieldset>

				</section>

				<section id="context_options">

					<p class="submit">
						<input type="submit" class="button button-primary button-large" value="<?php _e( 'Update' , 'agnosia' ); ?>" /> 
						<a href="themes.php?page=agnosia-theme-options&reset=defaults"><?php _e( 'Reset to default settings' , 'agnosia' ); ?></a>
					</p>

				</section>

			</section>

		</form>

	</div>

	<?php

}




/* Add action hooks. */

add_action( 'admin_init', 'agnosia_theme_options_init' );
add_action( 'admin_menu', 'agnosia_theme_options_add_page' );
add_action( 'admin_enqueue_scripts' , 'wp_enqueue_media' );
add_action( 'admin_enqueue_scripts' , 'agnosia_theme_manager_admin_options_scripts' );


?>
