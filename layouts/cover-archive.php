<? 
/**
 *
 * Cover of ARCHIVE - Template
 *
 */

?>

<section class="archive-cover max-full-width" data-height="90">
	<div class="background" style="background-image: url('<?php header_image(); ?>'); background-position-x: 50%;"></div>
	<div class="introduction">
			<h1 class="page-title"><?php single_cat_title(); ?> </h1>
		<?php 
			the_archive_description( '<div class="archive-description">', '</div>' );
		?>
	</div>
</section>	
