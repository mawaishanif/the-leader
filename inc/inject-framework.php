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

function image_data($image_id, $image_thumb_name){
	return wp_get_attachment_image_src( $image_id, $image_thumb_name );
}

function post_data(){

	return [
	'date_published' =>  esc_html( get_the_date( 'c' ) ),
	'date_modifed' => esc_html( get_the_modified_date('c') ),
	'posted_time' => esc_html( get_the_time()),
	'author_name' => esc_html( get_the_author() ),
	'author_image' => get_avatar(get_the_author_meta('ID')), 
	];
}


function the_leader_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'the_leader_excerpt_more' );

function the_leader_custom_excerpt_length( $length ) {
    return 22;
}
add_filter( 'excerpt_length', 'the_leader_custom_excerpt_length', 999 );
