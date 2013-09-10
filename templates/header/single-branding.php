<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows the single brand section.
 * You can add or remove functionality via child themes.
 * 
 * agnosia_single_branding_contents() uses agnosia_get_template( 'single-branding-text' , 'header' ) 
 * or agnosia_get_template( 'single-branding-image' , 'header' ), depending on the result of
 * agnosia_header_branding_has_logo().
 * 
 * @since 1.0
 * @author andrezrv
 * 
 * @package Agnosia
 */

?>

<div id="single-branding-container" class="<?php agnosia_single_branding_container_class(); ?>">
	<?php agnosia_single_branding_contents(); ?>
</div>