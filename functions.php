<?php
/**
 * The Leader functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package The_Leader
 */

if ( ! function_exists( 'the_leader_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function the_leader_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on The Leader, use a find and replace
	 * to change 'the_leader' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'the_leader', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This First nav menu would be the primary menu in the header of every page.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'the_leader' ),
	) );

	// Second nav menu for footer of the web pages.
	register_nav_menus( array(
		'menu-2' => esc_html__( 'Footer Menu', 'the_leader' ),
	) );

	/*
	 * Theme support for post formats.
	 */
	add_theme_support( 'post-formats', array('gallery','link','quote' ,'video') );

	/*
	 * Theme support for custom logo.
	 */
	add_theme_support( 'custom-logo', array(
		'width'       => '120',
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ) 
	));

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
      ) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'the_leader_custom_background_args', array(
      'default-color' => 'ffffff',
      'default-image' => '',
      ) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Adding theme support for different image sizes.

		if ( function_exists('add_image_size' ) ) {

			add_image_size('the_leader_background_large', 1920);
			add_image_size('the_leader_background', 1680);
			add_image_size('the_leader_background_small', 1240);
			add_image_size('the_leader_single', 860);
			add_image_size('the_leader_opengraph', 680);
			add_image_size('the_leader_column', 500);
			add_image_size('the_leader_sidebar', 400);
			add_image_size('the_leader_thumbnail', 200);
			add_image_size('the_leader_thumbnail_small', 50);
			add_image_size('the_leader_thumbnail_tiny', 20);
	}
}
endif;
add_action( 'after_setup_theme', 'the_leader_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function the_leader_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'the_leader_content_width', 640 );
}
add_action( 'after_setup_theme', 'the_leader_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function the_leader_widgets_init() {
	register_sidebar( array(
	    'name'          => esc_html__( 'Sidebar', 'the_leader' ),
	    'id'            => 'sidebar-1',
	    'description'   => esc_html__( 'Add widgets here.', 'the_leader' ),
	    'before_widget' => '<section id="%1$s" class="widget %2$s">',
	    'after_widget'  => '</section>',
	    'before_title'  => '<h2 class="widget-title">',
	    'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'the_leader_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function the_leader_scripts() {

	wp_enqueue_style( 'the_leader-style', get_stylesheet_uri() );

	wp_enqueue_script( 'the_leader-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'the_leader-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	wp_enqueue_script( 'the_leader-all-Scripts', get_template_directory_uri() . '/assets/js/scripts.min.js', array('jquery'), '20171215', true );
	/**
	 * Adding script for live reload for styling purposes.
	 * @todo This script should be removed when shipping out the theme
	 **/
	wp_register_script('livereload', 'http://localhost:35729/livereload.js?snipver=1', null, false, true);

	wp_enqueue_script('livereload');


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'the_leader_scripts' );

function the_leader_user_contactmethods($contact){
	$contact['twitter'] = 'Twitter URL';
	$contact['twitter_handle'] = 'Twitter Screename/ID (Excluding @)';
	$contact['facebook'] = 'Facebook URL';
	$contact['github'] = 'GitHub URL';
	$contact['youtube'] = 'Youtube URL';
	$contact['dribbble'] = 'Dribbble URL';
	$contact['google-plus'] = 'Google Plus URL';
	$contact['instagram'] = 'Instagram URL';
	$contact['linkedin'] = 'LinkedIn URL';
	$contact['pinterest'] = 'Pinterest URL';
	$contact['skype'] = 'Skype URL';
	$contact['tumblr'] = 'Tumblr URL';
	$contact['flickr'] = 'Flickr URL';
	$contact['reddit'] = 'Reddit URL';
	$contact['stack-overflow'] = 'Stack Overflow URL';
	$contact['twitch'] = 'Twitch URL';
	$contact['vine'] = 'Vine URL';
	$contact['vk'] = 'VK URL';
	$contact['vimeo'] = 'Vimeo URL';
	$contact['weibo'] = 'Weibo URL';
	$contact['soundcloud'] = 'Soundcloud URL';
	$contact['slideshare'] = 'SlideShare URL';
	return $contact;
}
add_filter('user_contactmethods', 'the_leader_user_contactmethods', 10, 1);

add_action( 'after_setup_theme', 'woocommerce_support' );

function woocommerce_support() {
	add_theme_support( 'woocommerce' ); 
}

/**
 * Load Portfolio custom post type file.
 */
require get_template_directory() . '/inc/class-portfolio.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Author Custom Profile Image File.
 */
require get_template_directory() . '/inc/inject-framework.php';

/**
 * Load Author Custom Profile Image File.
 */
require get_template_directory() . '/inc/class-author-image.php';

new Author_Image_Class;

new Leader_Portfolio;
