<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_Leader
 */

?>

</div><!-- #content -->    

<footer id="colophon" class="site-footer bg-secondary color-white" role="contentinfo">
	<div class="row with-gutter middle-sm middle-md middle-lg align-c-xs align-c-sm align-c-md">
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 last-xs first-sm first-md first-lg">
			<div class="site-info small f-left">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'the_leader' ) ); ?>" class="display-inlineBlock"><?php printf( esc_html__( 'Proudly powered by %s', 'the_leader' ), 'WordPress' ); ?></a>
				&nbsp; &bull; &nbsp; 
				<?php printf( esc_html__( '"%1$s" by %2$s', 'the_leader' ), 'The Leader - Arena of creativity for authors', '<a href="https://injectthemes.com/" rel="designer" class="display-inlineBlock">Inject Themes</a>' ); ?>
			</div>
		</div><!-- .site-info -->
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<div class="site-socials">
				<section class="widget social f-right">
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
				</section>
			</div>
		</div><!-- .footer-widgets -->
	</div><!-- .row -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
