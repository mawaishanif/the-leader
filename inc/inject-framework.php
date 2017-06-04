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
	'date_modifed' => esc_html( get_the_modified_date('c') ),
	'posted_time' => esc_html( get_the_time()),
	'author_name' => esc_html( get_the_author() ),
	'author_image' => get_avatar(get_the_author_meta('ID'))
	];
}

function new_excerpt_more( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'your-text-domain') . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );



function trimmed_excerpt( $post_excerpt, $post){
	return $post_excerpt . '<p>Lets see</p>';
}
apply_filters( 'get_the_excerpt', 'trimmed_excerpt', 5 );