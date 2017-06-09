<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_Leader
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<a class="for-screen-readers-text hidden" href="#content"><?php esc_html_e( 'Skip header area and jump to content', 'the_leader' ); ?></a>







		<div id="searchbar" class="full-width position-abs">
			<form action="/" method="get" class="full-width " accept-charset="utf-8">
				<label class="textfield full-width row">
					<input type="search" class="search_input col-lg-10 col-md-10 col-sm-10 col-xs-12 " name="searchbar" value="" placeholder="What are you looking for?">
					<div class="hide-mobile-flex submitBtn col-lg-2 col-md-2 col-sm-2 col-xs-2">
						<button>Submit</button>
					</div>
				</label>
			</form>
			<span class="close_search"><span class="icon ti-close"></span></span>
		</div>
		<div class="drawer">
			<div class="drawer-overlay"></div>
			<div class="main_drawer position-fix">
				<span class="icon closedrawer position-abs ti-close"></span>
				<section class="widget blog_info">
					<a href=""><h3><?php bloginfo( 'name' ); ?></h3></a>
					<?php 
					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
					<hr>
					<p class="site-description"><?php echo $description;  ?></p>
					<?php
					endif; ?>
				</section>
				<?php get_sidebar(); ?>
				<section class="widget navigation">
					<h5>Navigation</h5>
					<hr>
					<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu', 'depth' => 3 ) ); ?>
				</section>
				<section class="widget latestposts">
					<article class="post">
						<div class="top">
							<a href="" class="thumbnail">
								<i class="ti-link"></i>
								<span style="background-image:url('img/avatars/female/065f.jpg');"></span>
							</a>
							<div class="info">
								<a href="" class="button rounded grayoutline tiny category">System Administration</a>
								<h4 class="title">
									<a href="">Install Tinc and VPN Setup on Debian &amp; Ubuntu</a>
								</h4>
								<section class="meta">
									<span class="posted">Posted </span>
									<span class="author"><span>by</span> <a href="http://cedar-wp.ecko.me/author/harveys/"><img src="img/avatars/male/055m.jpg" class="avatar-small" alt="" data-no-retina="true"> Harvey Specter</a></span>
									<span class="date"><span>on</span> <a href=""><i class="fa fa-clock-o"></i> <time datetime="2015-01-17">17th January 2015</time></a></span>
								</section>
							</div>
						</div>
						<p class="excerpt">In this tutorial, we will go over how to use Tinc, an open source Virtual Private Network (VPN) daemon, to create a secure VPN...</p>
					</article>
					<article class="post">
						<div class="top">
							<a href="" class="thumbnail">
								<i class="ti-link"></i>
								<span style="background-image:url('img/avatars/female/065f.jpg');"></span>
							</a>
							<div class="info">
								<a href="" class="button rounded grayoutline tiny category">Frontend Development</a>
								<h4 class="title">
									<a href="">Responsive &amp; Mobile Design</a>
								</h4>
								<section class="meta">
									<span class="posted">Posted </span>
									<span class="author"><span>by</span> <a href="http://cedar-wp.ecko.me/author/miker/"><img src="img/avatars/male/055m.jpg" class="avatar-small" alt="" data-no-retina="true"> Mike Ross</a></span>
									<span class="date"><span>on</span> <a href=""><i class="fa fa-clock-o"></i> <time datetime="2015-01-03">3rd January 2015</time></a></span>
								</section>
							</div>
						</div>
						<p class="excerpt">RWD allows&nbsp;easy reading and navigation with a minimum of resizing, panning, and scrolling—across a wide range of devices (from...</p>
					</article>
					<article class="post">
						<div class="top">
							<a href="" class="thumbnail">
								<i class="ti-link"></i>
								<span style="background-image:url('img/avatars/female/065f.jpg');"></span>
							</a>
							<div class="info">
								<a href="" class="button rounded grayoutline tiny category">System Administration</a>
								<h4 class="title">
									<a href="">Initial Server Configuration &amp; Setup on Debia...</a>
								</h4>
								<section class="meta">
									<span class="posted">Posted </span>
									<span class="author"><span>by</span> <a href="http://cedar-wp.ecko.me/author/harveys/"><img src="img/avatars/male/055m.jpg" class="avatar-small" alt="" data-no-retina="true"> Harvey Specter</a></span>
									<span class="date"><span>on</span> <a href=""><i class="fa fa-clock-o"></i> <time datetime="2014-10-28">28th October 2014</time></a></span>
								</section>
							</div>
						</div>
						<p class="excerpt">Step One — Root Login To log into your server initially, you will need to know your server’s public IP address and...</p>
					</article>
				</section>
				<section class="widget socialshare">
					<h3 class="widget-title">Share</h3>
					<div class="options">
						<a href="" onclick="window.open(this.href, 'twitter-share', 'width=550,height=235');return false;" class="sharebutton twitter">
							<i class="icon ti-twitter-alt"></i>
							<span>Twitter</span>
						</a>                        
						<a href="" onclick="window.open(this.href, 'facebook-share','width=580,height=296');return false;" class="sharebutton facebook">
							<i class="icon ti-facebook"></i>
							<span>Facebook</span>
						</a>                        
						<a href="" onclick="window.open(this.href, 'google-plus-share', 'width=490,height=530');return false;" class="sharebutton google">
							<i class="icon ti-google-plus"></i>
							<span>Google+</span>
						</a>                        
						<a href="" onclick="window.open(this.href, 'reddit-share', 'width=490,height=530');return false;" class="sharebutton reddit">
							<i class="icon ti-reddit"></i>
							<span>Reddit</span>
						</a>                        
						<a href="" onclick="window.open(this.href, 'pinterest-share', 'width=490,height=530');return false;" class="sharebutton pinterest">
							<i class="icon ti-pinterest"></i>
							<span>Pinterest</span>
						</a>                        
						<a href="http://ww" onclick="window.open(this.href, 'linkedin-share', 'width=490,height=530');return false;" class="sharebutton linkedin">
							<i class="icon ti-linkedin"></i>
							<span>LinkedIn</span>
						</a>                    
					</div>
				</section>
				<section class="widget twitter">
					<div class="tweet">
						<p class="text">"Astro for WordPress has been updated to version 4.2.0. More info @ https://t.co/OIe3GXZ3Ur"</p>
						<div class="info">
							<a href="http://twitter.com/Perfections" class="author"><i class="icon ti-twitter-alt"></i> @Perfections</a>
							<a href="http://twitter.com/Perfections" class="date">14 hours ago</a>
						</div>
					</div>
					<div class="tweet">
						<p class="text">"This is going to be soo much fun! More info @ https://t.co/KbJX4F5qXF"</p>
						<div class="info">
							<a href="http://twitter.com/Perfections" class="author"><i class="icon ti-twitter-alt"></i> @Perfections</a>
							<a href="http://twitter.com/Perfections" class="date">2 weeks ago</a>
						</div>
					</div>
				</section>
				<section class="widget social">
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
				<section class="widget copyright">
					<p class="main">
						Copyright © <a href="">MHC Group</a>. 2017 • All rights reserved.
					</p>
					<p class="alt">
						<span class="mhc-tag"><a target="_blank" href="">Awesomlyy Wordpress Theme</a> by <a target="_blank" href="">MHC Group</a>.</span>
						<span class="wordpress">Proudly powered with <a target="_blank" href="http://wordpress.org">WordPress</a>.</span>
					</p>
				</section>
			</div>
		</div>
		<?php 
		if (is_single()) { ?>
		<header class="blog-info full-width single-page-header">
		<?php }  else{ ?>
		<header class="blog-info full-width">
		<?php 
		}
		?>
		
			<div class="title">
				<?php 
				if (has_custom_logo()) {
					the_custom_logo();
				}else{
					?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<h5 class="site-title"><?php bloginfo( 'name' ); ?></h5>
					</a>
					<?php 
				}
				?>
			</div>
			<nav role="navigation" class="main">
				<div class="menu-main-container">
					<ul class="primary_nav hide-mobile">
						<li> <a href="#" title="Home">Home</a> </li>
						<li> <a href="#" title="About">About</a> </li>
						<li> <a href="#" title="Contact">Contact</a> </li>
					</ul>
				</div>
				<ul class="secondary-nav">
					<li class="option searchnav">
						<a href="#0" class="showsearch"><span class="icon ti-search"></span></a>
					</li>
					<li class="option drawernav">
						<a href="#0" class="showdrawer"><span class="icon ti-menu"></span></a>
					</li>
				</ul>
			</nav>
		</header>







		<?php 
		if (is_single()) {
			get_template_part( 'layouts/covers/cover', 'single' );
		} elseif(is_archive()){
			get_template_part( 'layouts/covers/cover', 'archive' );
		} elseif(is_404()){
			get_template_part( 'layouts/covers/cover', '404' );
		}else{
			get_template_part( 'layouts/covers/cover', 'blog' );
		}

		?>
		



		<div id="content" class="site-content">
