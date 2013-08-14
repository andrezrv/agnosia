/**
 * NOTICE: This file is part of the Agnosia framework core.
 * Please don't modify this file unless you know exactly what you're doing.
 * Keep in mind that any modification to this file may be overwritten by future core updates.
 *
 * This file removes .sub-menu classes when they appear in the HTML of the site.
 * You can add or remove functionality via child themes.
 * 
 * @package Agnosia
 */


 function remove_submenus () {

	jQuery('.sub-menu').remove();

}



jQuery(document).ready(function() {
	remove_submenus();
});