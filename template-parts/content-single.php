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

	<div class="post-content">
		<?php
			the_content();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'the_leader' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .post-content -->

	<footer class="post-footer">
	<div class="row">
		<?php
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			
			$categories_list = get_the_category_list( esc_html__( ', ', 'the_leader' ) );
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'the_leader' ) );



			if (( $categories_list && the_leader_categorized_blog() ) && $tags_list) {?>
				<div class="col-lg-6">  
				<?php
					printf( '<div class="cat-links">' . esc_html__( 'Posted in: %1$s', 'the_leader' ) . '</div>', $categories_list ); // WPCS: XSS OK.
				?>
				</div>
				<div class="col-lg-6"> 
				<?php
					printf( '<div class="tags-links">' . esc_html__( 'Tagged: %1$s', 'the_leader' ) . '</div>', $tags_list ); // WPCS: XSS OK.
				?>
				</div>
			<?php

			
			} elseif (( $categories_list && the_leader_categorized_blog() ) || $tags_list) { ?>
				<div class="col-lg-12">  
					<?php
						if ( $categories_list && the_leader_categorized_blog() ) {
							printf( '<div class="cat-links">' . esc_html__( 'Posted in: %1$s', 'the_leader' ) . '</div>', $categories_list ); // WPCS: XSS OK.
						}

						if ( $tags_list ) {
							printf( '<div class="tags-links">' . esc_html__( 'Tagged: %1$s', 'the_leader' ) . '</div>', $tags_list ); // WPCS: XSS OK.
						}
					?>
				</div>
			<?php

			} 
		} 
		?>
		
	</div>

	<?php
	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<div class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'the_leader' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</div>';
	}
	?>
	</footer><!-- .post-footer -->
</article><!-- #post-## -->
