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
			echo the_post_thumbnail_url( 'the_leader_column' );

			// the_excerpt( sprintf(
			// 	/* translators: %s: Name of current post. */
			// 	wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'the_leader' ), array( 'span' => array( 'class' => array() ) ) ),
			// 	the_title( '<span class="screen-reader-text">"', '"</span>', false )
			// ) );
			echo '<p>This is before displaying excerpt function</p>';
			echo get_the_excerpt();
			echo '<p>This is after displaying excerpt function</p>';

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
	</a><!-- Main anchor tag ending here -->
</article><!-- #post-## -->
