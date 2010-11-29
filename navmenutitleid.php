<?php
/*
Plugin Name: Navigation Menu Title to ID
Plugin URI: http://www.digitalys.com/cms/wordpress/plugin-title-to-id
Description: Use the title attribut of wp nav menu as an ID for css convenience
Version: 0.1
Author: Pascaline Chotard
Author URI: http://www.digitalys.com/
*/

/*  
    Copyright 2010  Pascaline Chotard

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/


class TitleToId{

	function add_id($item_output, $item)	{
		if (! empty( $item->attr_title )) {
			$id_attribute  = ' id="menu-link-'  . sanitize_title( $item->attr_title ) .'"';	// set the id attribute for the a tag
			$item_output = str_replace(' title=', $id_attribute . ' title=', $item_output); // ad the id attribute before the title
		}		
		return $item_output;	// return the a tag to be concatened with the output variable (by default apply_filter function with no filter to apply returns the 1st arg)
	}
}


add_filter('walker_nav_menu_start_el',  array('TitleToId','add_id'), 10, 2);