<?php
/**
 * Custom functions for theme.
 *
 * These functions will be used in different files. And add functinality to the theme.
 * Added to avoid bulk in functions.php file.
 *
 * @package the-leader
 */



/**
 * Retrive the data for image used in wordpress loop
 *
 * @param int    $image_id Image ID for which will be data searched.
 * @param string $image_thumb_name Name of the thumbnail.
 * @return array
 */
function image_data( $image_id, $image_thumb_name ) {
	return wp_get_attachment_image_src( $image_id, $image_thumb_name );
}



/**
 * Returns the post meta data in form of array
 *
 * @return array Data for post meta.
 */
function post_data() {

	return [
	'date_published' => esc_html( get_the_date( 'c' ) ),
	'date_modifed' => esc_html( get_the_modified_date( 'c' ) ),
	'posted_time' => esc_html( get_the_time() ),
	'author_name' => esc_html( get_the_author() ),
	'author_image' => get_avatar( get_the_author_meta( 'ID' ) ),
	];
}



/**
 * Appends at the end of excerpt
 *
 * @param string $more More deault parameter for function to work.
 * @return string
 */
function the_leader_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'the_leader_excerpt_more' );



/**
 * Adds a length limit to excerpt
 *
 * @param int $length Takes the length to which cut the excerpt.
 * @return int
 */
function the_leader_custom_excerpt_length( $length ) {
	return 22;
}
add_filter( 'excerpt_length', 'the_leader_custom_excerpt_length', 999 );



/**
 * Checks weather a template part file is being used on a page or not
 *
 * @param string $url Takes the name of the file as an argument.
 * @return bool
 */
function check_template_part( $url ) {

	$all_templates_used = get_included_files();

	$directory_path = str_replace( '/', '\\', get_template_directory() );

	$url = '\\' . str_replace( '/', '\\', $url ) . '.php';

	$is_template = array_search( $directory_path . $url, $all_templates_used );

	if ( $is_template ) {
		return true;
	} else {
		return false;
	}
}



/**
 * Leader function to calculate reading time for a post.
 *
 * @param int $post_id Takes the post id as an agument.
 * @return int
 */
function leader_calculate_reading_time( $post_id ) {

	$post_content = get_post( $post_id )->post_content;

	$stripped_content = strip_shortcodes( $post_content );

	$stripped_tags_content = strip_tags( $stripped_content );

	$word_count = str_word_count( $stripped_tags_content );

	$reading_time = ceil( $word_count / 300 );

	if ( $reading_time > 1 ) {
		return $reading_time . ' mins read';
	} else {
		return $reading_time . ' min read';
	}
}


/**
 * Count the number of posts for a taxonomy or archive page.
 *
 * @return int Number of posts that taxonomy or archive have.
 */
function post_count() {
	return $GLOBALS['wp_query']->post_count;
}


/**
 * Function which returns the page pagination links for default post types
 *
 * @return list of pages with links
 */
function page_links() {
	$args = array(
		'type' => 'list',
		'total' => max( 1, get_query_var( 'paged' ) ) + 3,
		'prev_text' => __( 'Previous Posts Page', 'the-leader' ),
		'next_text' => __( 'Next Posts Page', 'the-leader' ),
	);
	return paginate_links( $args );
}
