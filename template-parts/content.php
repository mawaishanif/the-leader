<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_Leader
 */

?>

<?php

$post_meta = post_data(); 
$post_meta["date_published"];

$post_meta["date_modifed"];

$post_meta["posted_time"];

$post_meta["author_name"];

$post_meta["author_image"];

$category = get_the_category(); 


$tags_list = get_the_tag_list( '', esc_html__( ', ', 'the_leader' ) );
$tags = strip_tags( $tags_list );


/**
 * This is image data function which need image Id and the image size using the thumb name.
 * First Parameter is thumbnail ID and second if thumb name.
 * And funtions reture the array with index 0 for Image URL, index 1 for width and index 2 for height.
 **/ 
$image_data_Large = image_data( get_post_thumbnail_id(), 'the_leader_single' );
$featuredImage = $image_data_Large[0];
$featuredImage_width = $image_data_Large[1];
$featuredImage_height = $image_data_Large[2];

$image_data_Small = image_data( get_post_thumbnail_id(), 'the_leader_thumbnail_small' );
$blurryImage = $image_data_Small[0];

?>




<article itemscope itemtype="https://schema.org/BlogPosting" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a href="<?php echo esc_url( get_permalink() ); ?>">
		<meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="https://google.com/article"/>
		<header>
			<?php
			the_title( '<h2 itemprop="headline" class="post-title">', '</h2>' );
			?>

			<time pubdate itemprop="datePublished" datetime="<?php echo $post_meta["date_published"]; ?>" content="<?php echo $post_meta["date_published"]; ?>">
				<?php echo esc_html( human_time_diff(get_the_time('U'), current_time('timestamp') ) ); ?> ago
			</time>

			<meta itemprop="dateModified" content="<?php echo $post_meta["date_modifed"]; ?>"/>
		</header>

		<div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
			<div class="aspectRatioPlaceholder">
				<div class="aspectRatioPlaceholder-fill"></div>
				<div class="progressiveMedia" data-width="<?php echo $featuredImage_width; ?>" data-height="<?php echo $featuredImage_height; ?>">
					<img class="progressiveMedia-thumbnail" src="<?php echo $blurryImage; ?>" />
					<canvas class="progressiveMedia-canvas"></canvas>
					<img class="progressiveMedia-image" data-src="<?php echo $featuredImage; ?>" />
				</div>
			</div>

			<meta itemprop="url" content="<?php echo $featuredImage; ?>">
			<meta itemprop="width" content="<?php echo $featuredImage_width; ?>">
			<meta itemprop="height" content="<?php echo $featuredImage_height; ?>">
		</div>

		<div itemprop="text">
			<?php

			the_excerpt( sprintf(
			                     /* translators: %s: Name of current post. */
			                     wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'the_leader' ), array( 'span' => array( 'class' => array() ) ) ),
			                     the_title( '<span class="screen-reader-text">"', '"</span>', false )
			                     ) );

			wp_link_pages( array(
			                     'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'the_leader' ),
			                     'after'  => '</div>',
			                     ) );
			                     ?>
		</div>
          </a>
          <footer>
               	<div class="post-category"><span itemprop="about"><?php echo $category[0]->cat_name; ?></span></div>
               	<div class="display-none"><span itemprop="keywords"><?php echo $tags; ?></span></div>

               	<div itemprop="author" itemscope itemtype="https://schema.org/Person">
               		<?php echo $post_meta["author_image"]; ?>
               		<!-- <img itemprop="image" src="" /> -->
               		<span itemprop="name"><?php echo $post_meta["author_name"]; ?></span>
               	</div>
	</footer>
  </article>