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
		if ( is_single() ) :
			the_title( '<h1 class="post-title">', '</h1>' );
		else :
			the_title( '<h2 class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
	?>
	</header><!-- .post-header -->

	<div class="post-content">
		<?php
			if (is_single()) {
				the_post_thumbnail('the_leader_single');
			}else{
				the_post_thumbnail('the_leader_column');
			}
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'the_leader' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			// wp_link_pages( array(
			// 	'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'the_leader' ),
			// 	'after'  => '</div>',
			// ) );
			wp_link_pages();
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
