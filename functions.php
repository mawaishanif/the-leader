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
		add_theme_support( 'post-formats', array( 'gallery', 'link', 'quote', 'video' ) );

		/*
		 * Theme support for custom logo.
		 */
		add_theme_support( 'custom-logo', array(
			'width'       => '120',
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		));

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'the_leader_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Adding theme support for different image sizes.
		if ( function_exists( 'add_image_size' ) ) {

			add_image_size( 'the_leader_background_large', 1920 );
			add_image_size( 'the_leader_background', 1680 );
			add_image_size( 'the_leader_background_small', 1240 );
			add_image_size( 'the_leader_single', 860 );
			add_image_size( 'the_leader_opengraph', 680 );
			add_image_size( 'the_leader_column', 500 );
			add_image_size( 'the_leader_sidebar', 400 );
			add_image_size( 'the_leader_thumbnail', 200 );
			add_image_size( 'the_leader_thumbnail_small', 50 );
			add_image_size( 'the_leader_thumbnail_tiny', 20 );
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
	register_sidebar(
		array(
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

	wp_enqueue_script( 'the_leader-all-Scripts', get_template_directory_uri() . '/assets/js/scripts.min.js', array( 'jquery' ), '20171215', true );
	/**
	 * Adding script for live reload for styling purposes.
	 *
	 * @todo This script should be removed when shipping out the theme
	 */
	wp_register_script( 'livereload', 'http://localhost:35729/livereload.js?snipver=1', null, false, true );

	wp_enqueue_script( 'livereload' );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'the_leader_scripts' );
/**
 * Function to increase user profiles found in user profile section in admin pages.
 *
 * @param  array $contact Already present user contact methods.
 * @return array          Returns the contact array with new ways added.
 */
function the_leader_user_contactmethods( $contact ) {
	$contact['twitter'] 		= 'Twitter URL';
	$contact['twitter_handle'] 	= 'Twitter Screename/ID (Excluding @)';
	$contact['facebook'] 		= 'Facebook URL';
	$contact['github'] 		= 'GitHub URL';
	$contact['youtube'] 		= 'Youtube URL';
	$contact['dribbble'] 		= 'Dribbble URL';
	$contact['google-plus'] 		= 'Google Plus URL';
	$contact['instagram'] 		= 'Instagram URL';
	$contact['linkedin'] 		= 'LinkedIn URL';
	$contact['pinterest'] 		= 'Pinterest URL';
	$contact['skype'] 			= 'Skype URL';
	$contact['tumblr'] 		= 'Tumblr URL';
	$contact['flickr'] 			= 'Flickr URL';
	$contact['reddit'] 			= 'Reddit URL';
	$contact['stack-overflow'] 	= 'Stack Overflow URL';
	$contact['twitch']			 = 'Twitch URL';
	$contact['vine'] 			= 'Vine URL';
	$contact['vk'] 			= 'VK URL';
	$contact['vimeo'] 			= 'Vimeo URL';
	$contact['weibo'] 			= 'Weibo URL';
	$contact['soundcloud'] 		= 'Soundcloud URL';
	$contact['slideshare'] 		= 'SlideShare URL';
	return $contact;
}
add_filter( 'user_contactmethods', 'the_leader_user_contactmethods', 10, 1 );

add_action( 'after_setup_theme', 'woocommerce_support' );

/**
 * Added theme support for woocommerce plugin in the-leader theme.
 *
 * @return void
 */
function woocommerce_support() {
	add_theme_support( 'woocommerce' );
}

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
/**
 * Function modifies the comment list template for the-leader theme.
 *
 * @param  string $comment 	Comment Text.
 * @param  array  $args    	Array of data specifed by user to change data.
 * @param  int    $depth   	Depth of comment nest.
 * @return void
 */
function leader_comments( $comment, $args, $depth ) {
	$tag = $args['style'];
	?>

	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">

    <?php if ( 'div' != $args['style'] ) : ?>

    	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">

    <?php endif; ?>
    <div class="comment-author vcard">
        <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
        <?php printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() ); ?>
    </div>
    <?php if ( $comment->comment_approved == '0' ) : ?>
         <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
          <br />
    <?php endif; ?>

    <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
        <?php

        printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
        ?>
    </div>

    <?php comment_text(); ?>

    <div class="reply">
        <?php comment_reply_link( array_merge( $args, array( 'add_below' => 'comment', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
    <?php
}
/**
 * Customizing the comments form data for custom leader comments markup.
 */

function leader_comment_form()
{
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$post_id = get_the_ID();
	$user = wp_get_current_user();
	$user_identity = $user->exists() ? $user->display_name : '';
	$required_text = sprintf( ' ' . __('Required fields are marked %s'), '<span class="req">*</span>' );
	$fields = array(
		'author' => '<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4"><div class="form-item input-name">' . '<label for="author">' . __( 'Name' )  . ( $req ? '<span class="req">*</span> </label>' : '</label>' ) .
        '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div></div>',

    	'email'  => '<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4"><div class="form-item input-email"><label for="email">' . __( 'Email' )  . ( $req ? '<span class="req">*</span> </label>' : '</label>' ) .
        '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div></div>',

    	'url'    => '<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4"><div class="form-item input-url"><label for="url">' . __( 'Website' ) . '</label>' .
        '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div></div>'

	);
	$comments_args = array(

		'fields'               => $fields,
		'comment_field'        => '
    <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12"><div class="form-item input-comment"><label for="comment">' . _x( 'Your Comment', 'noun' ) . '<span class="req">*</span></label> <textarea id="comment" name="comment" cols="45" rows="6" maxlength="65525" aria-required="true" required="required"></textarea></div></div>',
		/** This filter is documented in wp-includes/link-template.php */
		'must_log_in'          => '<p class="must-log-in">' . sprintf(
		                              /* translators: %s: login URL */
		                              __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
		                              wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) )
		                          ) . '</p>',
		/** This filter is documented in wp-includes/link-template.php */
		'logged_in_as'         => '<p class="logged-in-as">' . sprintf(
		                              /* translators: 1: edit user link, 2: accessibility text, 3: user name, 4: logout URL */
		                              __( '<a href="%1$s" aria-label="%2$s">Logged in as %3$s</a>. <a href="%4$s">Log out?</a>' ),
		                              get_edit_user_link(),
		                              /* translators: %s: user name */
		                              esc_attr( sprintf( __( 'Logged in as %s. Edit your profile.' ), $user_identity ) ),
		                              $user_identity,
		                              wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) )
		                          ) . '</p>',
		'comment_notes_before' => '<fieldset><legend>LEAVE A REPLY BELOW</legend><div class="row with-gutter"><p class="full-width comment-notes align-left small"><span id="email-notes">' . __( 'Your email address will not be published.' ) . '</span><br>'. ( $req ? $required_text : '' ) . '</p>',
		'comment_notes_after'  => '',
		'action'               => site_url( '/wp-comments-post.php' ),
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'class_form'           => 'comment-form form',
		'class_submit'         => 'submit',
		'name_submit'          => 'submit',
		'title_reply'          => __( '' ),
		'title_reply_to'       => __( '' ),
		'title_reply_before'   => '',
		'title_reply_after'    => '',
		'cancel_reply_before'  => ' <small>',
		'cancel_reply_after'   => '</small>',
		'cancel_reply_link'    => __( 'Cancel reply' ),
		'label_submit'         => __( 'Post Comment' ),
		'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s medium-btn" value="%4$s" />',
		'submit_field'         => '<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12"><div class="form-item  submit-btn">%1$s %2$s</div></div></fieldset>',
		'format'               => 'xhtml',
	);

	comment_form($comments_args);
}
/*
*
* ===========================================================
*  			THE LEADER ADMIN PAGE
* ===========================================================
 */

/** 
 * Adds the leader theme options page to wordpress admin menu.
 *
 * @return void
 */
function the_leader_admin_page() {
	add_menu_page(
		__( 'The Leader Theme Options', 'the-leader' ), 'Leader Options', 'manage_options', 'leader-theme-options', 'leader_render_admin_theme_page', 'dashicons-admin-customizer', 61
	);
}
add_action( 'admin_menu', 'the_leader_admin_page' );

function leader_render_admin_theme_page() {
	get_template_part( 'template-parts/admin/theme-options');	
}

function leader_theme_options_files($hook) {
    if ( 'toplevel_page_leader-theme-options' != $hook ) {
        return;
    }


    wp_enqueue_script( 'leader_theme_options_script', get_template_directory_uri() . '/assets/js/theme-options-script.js', '1.0', true );

    wp_enqueue_style( 'leader_theme_options_styles', get_template_directory_uri() . '/assets/css/theme-options-styles.css', array(), '1.0', 'all' );
}
add_action( 'admin_enqueue_scripts', 'leader_theme_options_files' );