<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_Leader
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<a href="<?php echo esc_url( get_permalink() ); ?>">
	<header class="post-header">
	<?php
		the_title( '<h2 class="post-title">', '</h2>' );
	?>
	</header><!-- .post-header -->
	<div class="post-content">
		<?php
			
			the_post_thumbnail('the_leader_column');
 			/**
 			 * This is image data function which need image Id and the image size using the thumb name.
 			 * First Parameter is thumbnail ID and second if thumb name.
 			 * And funtions reture the array with index 0 for Image URL, index 1 for width and index 2 for height.
 			 **/ 

			$image_data = image_data( get_post_thumbnail_id(), 'the_leader_column' );

			the_excerpt( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'the_leader' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'the_leader' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .post-content -->

	<footer class="post-footer">

			<?php 
			$post_meta = post_data(); 
echo $post_meta["date_published"];
echo "<br>";
echo $post_meta["date_modifed"];
echo "<br>";
echo $post_meta["posted_time"];
echo "<br>";
echo $post_meta["author_name"];
echo "<br>";
echo $post_meta["author_image"];
echo "<br>";
		?>
	</footer><!-- .post-footer -->
	</a><!-- Main anchor tag ending here -->
</article><!-- #post-## -->
