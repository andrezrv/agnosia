<?php

/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file is an HTML template that shows the primary brand section.
 * You can add or remove functionality via child themes.
 * 
 * agnosia_primary_brand_content() uses agnosia_get_template( 'primary-brand-text' , 'header' ) 
 * or agnosia_get_template( 'primary-brand-image' , 'header' ), depending on the result of
 * agnosia_header_branding_has_logo() and agnosia_evaluate_show_branding_text().
 * 
 * @since 1.0
 * @author andrezrv
 * 
 * @package Agnosia
 */

?>

<div id="double-branding-primary-brand" class="<?php agnosia_primary_branding_container_class(); ?>">
	<?php agnosia_primary_brand_content(); ?>
</div>