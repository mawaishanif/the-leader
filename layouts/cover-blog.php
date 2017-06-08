<? 
/**
 *
 * Cover of BLOG - Template
 *
 */

?>

<section class="cover  max-full-width" data-height="90">
	<div class="background" style="background-image: url('<?php header_image(); ?>'); background-position-x: 50%;"></div>
	<div class="introduction">
		<h1><?php bloginfo( 'name' ); ?></h1>
		<!-- <h3>For full width use <i>full-width</i> or <i>max-full-width</i> class</h3> -->
		<?php 
		$description = get_bloginfo( 'description', 'display' );
		if ( $description || is_customize_preview() ) : ?>
		<p class="site-description"><?php echo $description;  ?></p>
		<?php
		endif; ?>
	</div>
</section>	
