/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file adds HTML to submenus for correct Bootstrap styling.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */

 function set_dropdown_menus() {

	jQuery('#header .sub-menu .sub-menu, footer .sub-menu').removeClass('dropdown-menu');

	var parent = jQuery('#header .dropdown-menu').parent();

	jQuery(parent).addClass('dropdown')
		.children('a:first-child')
		.addClass('dropdown-toggle')
		.append('<b class="caret"></b>')
		.attr('data-toggle','dropdown')
		.attr('data-target','#')
		.click(function() {
		jQuery('.nav-collapse.in.collapse').css('height','auto');
	});

}



jQuery(document).ready(function() {

	set_dropdown_menus();
	
});