<?php
/**
 * Template part for displaying posts for single pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_Leader
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-post-article'); ?>>

	<div class="post-content">
		<?php
			the_content();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'the_leader' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .post-content -->
	<hr>
	<footer class="post-footer">
	<div class="row align-center">
		<?php
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			
			$categories_list = get_the_category_list( esc_html__( ' ', 'the_leader' ) );
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'the_leader' ) );



			if (( $categories_list && the_leader_categorized_blog() ) && $tags_list) {?>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">  
				<?php
					printf( '<div class="cat-links">' . __( '<span class="display-block heading">Posted in: </span>%1$s', 'the_leader' ) . '</div>', $categories_list ); // WPCS: XSS OK.
				?>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> 
				<?php
					printf( '<div class="tags-links">' . __( '<span class="display-block heading">Tagged in: </span>%1$s ', 'the_leader' ) . '</div>', $tags_list ); // WPCS: XSS OK.
				?>
				</div>
			<?php

			
			} elseif (( $categories_list && the_leader_categorized_blog() ) || $tags_list) { ?>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
					<?php
						if ( $categories_list && the_leader_categorized_blog() ) {
							printf( '<div class="cat-links">' . __( '<span class="display-block heading">Posted in: </span>%1$s', 'the_leader' ) . '</div>', $categories_list ); // WPCS: XSS OK.
						}

						if ( $tags_list ) {
							printf( '<div class="tags-links">' . __( '<span class="display-block heading">Tagged in: </span>%1$s ', 'the_leader' ) . '</div>', $tags_list ); // WPCS: XSS OK.
						}
					?>
				</div>
			<?php

			} 
		} 
		?>
		<nav class="socialdark">
		<ul class="icons unstyled align-right" grid="col md-50 lg-50">
			<li><?php esc_html_e('Share', 'murda'); ?>: </li>
			<li class="twitter">
			<a href="http://twitter.com/share?text=<?php echo urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')); ?>&amp;url=<?php the_permalink(); ?>" onclick="window.open(this.href, 'twitter-share', 'width=550,height=235');return false;"><i class="icon ti-twitter"></i></a>
			</li>
			<li class="facebook">
			<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" onclick="window.open(this.href, 'facebook-share','width=580,height=296');return false;" ><i class="icon ti-facebook"></i></a>
			</li>
			<li class="gplus">
			<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="window.open(this.href, 'google-plus-share', 'width=490,height=530');return false;" ><i class="icon ti-google"></i></a>
			</li>
			<li class="rss">
			<a href="<?php the_permalink(); ?>/feed"><i class="icon ti-rss"></i></a>
			</li>
			<li class="mail">
			<a href="mailto:?body=<?php the_permalink(); ?>"><i class="icon ti-email"></i></a>
			</li>
		</ul>
		</nav>
	</div>
	</footer><!-- .post-footer -->
</article><!-- #post-## -->



<nav class="social">
	<ul>
		<li><a href="http://twitter.com/EckoThemes" target="_blank" title="Twitter" class="socialdark twitter"><i class="ti-twitter-alt"></i></a></li>
		<li><a href="#" target="_blank" title="Facebook" class="socialdark facebook"><i class="ti-facebook"></i></a></li>
		<li><a href="#" target="_blank" title="Github" class="socialdark github"><i class="ti-github"></i></a></li>
		<li><a href="#" target="_blank" title="Youtube" class="socialdark youtube"><i class="ti-youtube"></i></a></li>
		<li><a href="#" target="_blank" title="Dribbble" class="socialdark dribbble"><i class="ti-dribbble"></i></a></li>
		<li><a href="#" target="_blank" title="Instagram" class="socialdark instagram"><i class="ti-instagram"></i></a></li>
		<li><a href="#" target="_blank" title="Linkedin" class="socialdark linkedin"><i class="ti-linkedin"></i></a></li>
		<li><a href="#" target="_blank" title="Pinterest" class="socialdark pinterest"><i class="ti-pinterest"></i></a></li>
		<li><a href="#" target="_blank" title="Flickr" class="socialdark flickr"><i class="ti-flickr"></i></a></li>
		<li><a href="#" target="_blank" title="Vimeo" class="socialdark vimeo"><i class="ti-vimeo"></i></a></li>
	</ul>
</nav>