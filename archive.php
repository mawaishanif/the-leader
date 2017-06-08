<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_Leader
 */

get_header(); ?>

<div id="primary" class="content-area archive">
	<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>
		<section class="postlist">
			<header class="page-header align-center">

				<?php
				$posts_count = post_count();
				if($posts_count > 1){
					$word = "posts";
				}else{
					$word = "post";
				}
				the_archive_title( '<h5 class="category medium page-title">Found <span class="medium label focus"> '. $posts_count .' </span> '. $word .' in "', '"</h5>' );
				?>
			</header><!-- .page-header -->
			<hr class="posts-count-divider">
			<div class="row">

				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );
			
			endwhile;

				page_links();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
			</div>
		</section>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
