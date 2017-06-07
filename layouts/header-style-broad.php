
<header class="navigation" role="banner">
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
	<div class="main-menu-container  row between-sm  between-md  between-lg  middle-xs  middle-sm  middle-md  middle-lg  center-xs center-sm center-md center-lg full-width">
		<div class="brand col-xs-4 col-sm-2 col-md-2 col-lg-2">
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
		<nav  id="site-navigation" role="navigation" class="main end-md end-lg col-xs-4 col-sm-9 col-md-9 col-lg-9">
			<div id="menu-trigger"> <a href="#" class="menu-heading">MENU <span class="icon ti-menu"></span></a> </div>
			<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu', 'depth' => 2 ) ); ?>
		</nav>
		<div class="search-menu col-xs-4 col-sm-1 col-md-1 col-lg-1">
			<ul class="align-right search">
				<li><a href="#0" class="close_search">
					<span class="icon ti-search"></span>
				</a></li>
			</ul>
		</div>
	</div>
</header>
