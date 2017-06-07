<? 
/**
 *
 * Cover of SINGLE POST - Template
 *
 */
?>

<section class="cover  max-full-width" data-height="90">
	<div class="background" style="background-image: url('<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'the_leader_single')[0]; ?>'); background-position-x: 50%;"></div>
	<div class="introduction">
		<h1>
			<?php
				the_title( '<h1 itemprop="headline" class="post-title">', '</h1>' );
				
			?>	
		</h1>
		<?php 
		$description = get_bloginfo( 'description', 'display' );
		if ( $description || is_customize_preview() ) : ?>
		<p class="site-description"><?php echo $description;  ?></p>
		<?php
		endif; ?>
	</div>
</section>	

