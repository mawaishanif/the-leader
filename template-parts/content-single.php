<?php
/**
 * Template part for displaying posts for single pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_Leader
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="post-header">
	<?php
			the_title( '<h1 class="post-title">', '</h1>' );
	?>
	</header><!-- .post-header -->

	<div class="post-content">
		<?php
			if (is_single()) {
				the_post_thumbnail('the_leader_single');
			}else{
				the_post_thumbnail('the_leader_column');
			}
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'the_leader' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .post-content -->

	<footer class="post-footer">
	<?php
		if ( 'post' === get_post_type() ) : 
			the_leader_posted_on(); 
		endif; 
	?>
	</footer><!-- .post-footer -->
</article><!-- #post-## -->
