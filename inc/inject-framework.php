<?php 

/**
 * Custom functions for theme.
 *
 * These functions will be used in different files. And add functinality to the theme.
 * Added to avoid bulk in functions.php file.
 *
 */

/**
 * Retrive the data for image used in wordpress loop
 * @param int $image_id 
 * @param string $image_thumb_name 
 * @return array
 */
function image_data($image_id, $image_thumb_name){
	return wp_get_attachment_image_src( $image_id, $image_thumb_name );
}


/**
 * Returns the post meta data in form of array
 * @return array
 */
function post_data(){

	return [
	'date_published' =>  esc_html( get_the_date( 'c' ) ),
	'date_modifed' => esc_html( get_the_modified_date('c') ),
	'posted_time' => esc_html( get_the_time()),
	'author_name' => esc_html( get_the_author() ),
	'author_image' => get_avatar(get_the_author_meta('ID')), 
	];
}

/**
 * Appends at the end of excerpt
 * @param string $more 
 * @return string
 */
function the_leader_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'the_leader_excerpt_more' );

/**
 * Adds a length limit to excerpt
 * @param int $length 
 * @return int
 */
function the_leader_custom_excerpt_length( $length ) {
	return 22;
}
add_filter( 'excerpt_length', 'the_leader_custom_excerpt_length', 999 );

/**
 * Checks weather a template part file is being used on a page or not
 * @param string $url 
 * @return bool
 */
function check_template_part( $url ){

	$all_templates_used = get_included_files();

	$directory_path = str_replace('/', '\\', get_template_directory());

	$url = '\\' . str_replace('/', '\\', $url) . '.php';

	$is_template =  array_search($directory_path . $url, $all_templates_used);

	if ($is_template) {
		return True;
	}
	else {
		return False;
	}
}

/**
 * Leader function to calculate reading time for a post.
 * @param string $post_content 
 * @return int
 */
function leader_calculate_reading_time($post_id) {
	
	$post_content = get_post($post_id)->post_content;

	$stripped_content = strip_shortcodes($post_content);

	$stripped_tags_content = strip_tags($stripped_content);

	$wordCount = str_word_count($stripped_tags_content);

	$readingTime = ceil($wordCount / 300);

	if( $readingTime > 1 ){
		return $readingTime . ' mins read';
	}else {
		return $readingTime . ' min read';
	}
}