<?php
/**
 *
 * Cover of ARCHIVE - Template
 *
 */

?>

<section class="archive-cover max-full-width" data-height="90">
	<div class="background" style="background-image: url('<?php header_image(); ?>'); background-position-x: 50%;"></div>
	<div class="introduction">
		<?php 
		if ( is_category() ) {
			the_archive_title( '<h5 class="category-title bg-primary display-inlineBlock">', '</h5>' );
		} elseif ( is_tag() ) {
		?>
			<h5 class="tag-title display-inlineBlock"><?php single_tag_title(); ?></h5>
		<?php 
		}else{
			the_archive_title( '<h5 class="archive-title display-inlineBlock bg-secondary">', '</h5>' );
		}
		the_archive_description( '<div class="archive-description">', '</div>' );
		?>
	</div>
</section>	
