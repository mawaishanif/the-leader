<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package The_Leader
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<div class="page-content">
					<h5 class="align-center"><?php _e( 'It looks like nothing was found in this location. Why don\'t you try a search?', 'the_leader' ); ?></h5>

					<?php
						get_search_form();
					?>
					<hr>
					<h5 class="large align-center"><?php _e( 'Here are some recent posts, maybe you find something similar to what you are looking for.', 'the_leader' ); ?></h5>
						
					<?php
						the_widget( 'WP_Widget_Recent_Posts' );
					?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
