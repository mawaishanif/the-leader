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
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'the_leader' ); ?></a>

				<?php 
				//$description = get_bloginfo( 'description', 'display' );
				//if ( $description || is_customize_preview() ) : ?>
				<!-- <p class="site-description"><?php //echo $description; /* WPCS: xss ok. */ ?></p> -->
				<?php
				//endif; ?>

		<header class="blog-info" role="banner">
			<div class="main-menu-container  row between-sm  between-md  between-lg  middle-xs  middle-sm  middle-md  middle-lg  center-xs center-sm center-md center-lg full-width">
				<div class="brand col-xs-12 col-sm-2 col-md-2 col-lg-2">
					<a href="#0">
						<?php
						if ( function_exists( 'the_custom_logo' ) ) {
							the_custom_logo();
						}else{
							?>
						<h5 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h5>
						<?php
						}
						?>
					</a>
				</div>
				<nav  id="site-navigation" role="navigation" class=" main col-xs-12 col-sm-10 col-md-8 col-lg-8">
					<div id="menu-trigger"> <a href="#" class="menu-heading">MENU <span class="icon ti-menu"></span></a> </div>
					<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
				<!-- <ul class="navigation">
					<li> <a href="#" class="selected" title="Home">Home</a> </li>
					<li> <a href="#" title="About">About</a> </li>
					<li class="has-submenu" > <a href="#" title="Services">Services <span class="icon ti-angle-down"></span></a>
						<ul class="submenu">
							<li> <a href="#" title="Home">Free home delivery</a> </li>
							<li> <a href="#" title="About">89% off - Flat</a> </li>
							<li> <a href="#" title="Sign Up">No extra taxes</a> </li>
							<li> <a href="#" title="Contact">Contact</a> </li>
							<li> <a href="#" title="Careers">Careers</a> </li>
						</ul>
					</li>
					<li> <a href="#" title="Contact">Contact</a> </li>
					<li class="has-submenu"> <a href="#" title="Careers">Careers <span class="icon ti-angle-down"></span></a>
						<ul class="submenu">
							<li> <a href="#" title="Home">Free home delivery</a> </li>
							<li> <a href="#" title="About">89% off - Flat</a> </li>
							<li> <a href="#" title="Sign Up">No extra taxes</a> </li>
							<li> <a href="#" title="Contact">Contact</a> </li>
							<li> <a href="#" title="Careers">Careers</a> </li>
						</ul>
					</li>
				</ul> -->
			</nav>
			<div class="social-menu col-sm-2 col-md-2 col-lg-2">
				<ul class="social hide-mobile">
					<li><a href="#0">
						<span class="icon ti-twitter-alt"></span>
					</a></li>
					<li><a href="#0">
						<span class="icon ti-facebook"></span>
					</a></li>
					<li><a href="#0">
						<span class="icon ti-dribbble"></span>
					</a></li>
				</ul>
			</div>
		</div>
	</header>








	<section class="cover  max-full-width">
		<div class="background" style="background-image: url('img/bg_blue.jpg'); background-position-x: 50%;"></div>
		<div id="searchbar" class="disp-none full-width pos-abs">
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
		<div class="introduction">
			<h1>Headings &amp; Copy</h1>
			<h3>For full width use <i>full-width</i> or <i>max-full-width</i> class</h3>
			<p >
				At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
				praesentium voluptatum deleniti atque corrupti quos.
			</p>
		</div>
	</section>	



































	<div id="content" class="site-content">
