<?php 
/**
 * Template Name: Portfolio template
 * 
 * @package Wordpress
 * @subpackage The_Leader
 * @since 1.0
 **/
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		$loop = new WP_Query(array('post_type' => 'portfolio','post_per_page' => 12));
		if($loop->have_posts()):

			while ( $loop->have_posts() ) : $loop->the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
		endif;
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();