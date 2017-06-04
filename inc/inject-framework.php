<?php 

/**
 * Custom functions for theme.
 *
 * These functions will be used in different files. And add functinality to the theme.
 * Added to avoid bulk in functions.php file.
 *
 */


/**
 * Gets the post meta related data
 * @param none
 * @return array
 */
function post_data(){
	return [
	'date_published' =>  esc_html( get_the_date( 'c' ) ),
	'date_modifed' => esc_html( get_the_modified_date() ),
	'posted_time' => esc_html( get_the_time()),
	'author_name' => esc_html( get_the_author() ),
	'author_image' => get_avatar(get_the_author_meta('ID'))
	];
}
