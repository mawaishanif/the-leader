<?php
/**
 *
 * Cover of SINGLE POST - Template
 *
 */
$image_data_Large = wp_get_attachment_image_src(get_post_thumbnail_id(), 'the_leader_background_small');
$featuredImageURL = $image_data_Large[0];
$featuredImage_width = $image_data_Large[1];
$featuredImage_height = $image_data_Large[2];

$image_data_Small = wp_get_attachment_image_src(get_post_thumbnail_id(), 'the_leader_thumbnail_tiny');
$blurryImageURL = $image_data_Small[0];

?>
<section class="single align-center post-cover">
	<?php 
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'the_leader' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link button">',
			'</span>'
		);
	 ?>
	<div class="post-category">
		<span class="display-block icon cat-icon ti-bookmark"></span>
		<?php the_category('&bull;'); ?>
	</div>
	<?php
	the_title( '<h1 class="post-title">', '</h1>' );
	?>	
	<div class="post-time">
		<time pubdate itemprop="datePublished" datetime="<?php echo $post_meta["date_published"]; ?>" content="<?php echo $post_meta["date_published"]; ?>">
			<?php echo esc_html( human_time_diff(get_the_time('U'), current_time('timestamp') ) ); ?> ago
			&nbsp; &bull; &nbsp;
			<i><?php echo leader_calculate_reading_time(get_the_ID()); ?></i>

		</time>
	</div>
	<div class="post-thumbnail">
		<div class="aspectRatioPlaceholder">
			<div class="aspectRatioPlaceholder-fill"></div>
			<div class="progressiveMedia" data-width="<?php echo $featuredImage_width; ?>" data-height="<?php echo $featuredImage_height; ?>">
				<img class="progressiveMedia-thumbnail" src="<?php echo $blurryImageURL; ?>" />
				<canvas class="progressiveMedia-canvas"></canvas>
				<div class="progressiveMedia-image cover-image" data-src="<?php echo $featuredImageURL; ?>"></div>
			</div>
		</div>
	</div>
	
</section>