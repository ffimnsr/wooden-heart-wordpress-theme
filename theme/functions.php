<?php
/**
 * WoodenHeart functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WoodenHeart
 */

if ( ! defined( 'WOODENHEART_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'WOODENHEART_VERSION', '1.1.3' );
}

if ( ! function_exists( 'woodenheart_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function woodenheart_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on WoodenHeart, use a find and replace
		 * to change 'wooden-heart' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'wooden-heart', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'wooden-heart' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'woodenheart_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		/**
		 * Add responsive embeds and block editor styles.
		 */
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'editor-styles' );
		add_editor_style( 'style-editor.css' );
	}
endif;
add_action( 'after_setup_theme', 'woodenheart_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function woodenheart_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'woodenheart_content_width', 640 );
}
add_action( 'after_setup_theme', 'woodenheart_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function woodenheart_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'wooden-heart' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'wooden-heart' ),
			'before_widget' => '<section id="%1$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Right-Hand Ads Sidebar', 'wooden-heart' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'wooden-heart' ),
			'before_widget' => '<section id="%1$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'In-Page Ads Sidebar', 'wooden-heart' ),
			'id'            => 'sidebar-3',
			'description'   => esc_html__( 'Add widgets here.', 'wooden-heart' ),
			'before_widget' => '<section id="%1$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'woodenheart_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function woodenheart_scripts() {
	wp_enqueue_style( 'woodenheart-style', get_stylesheet_uri(), array(), WOODENHEART_VERSION );
	wp_enqueue_script( 'woodenheart-alpine', get_template_directory_uri() . '/js/alpine.js', array(), '3.5.2', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'woodenheart_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom functionalities.
 */
function wpb_disable_comment_url($fields) {
	unset( $fields['url']);
	return $fields;
}

add_filter( 'comment_form_default_fields', 'wpb_disable_comment_url' );

function only_authorised_rest_access( $result ) {
    if( ! is_user_logged_in() ) {
        return new WP_Error(
			'rest_unauthorised',
			__( 'Only authenticated users can access the REST API.', 'rest_unauthorised' ),
			array( 'status' => rest_authorization_required_code() )
		);
    }

    return $result;
}

add_filter( 'rest_authentication_errors', 'only_authorised_rest_access' );

