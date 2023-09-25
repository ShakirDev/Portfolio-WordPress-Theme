<?php

/**
 * webmanit functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package webmanit
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

//filter flag
if (!defined('FILTER_FLAG_SCHEME_REQUIRED')) {
	define('FILTER_FLAG_SCHEME_REQUIRED', 0);
}
if (!defined('FILTER_FLAG_HOST_REQUIRED')) {
	define('FILTER_FLAG_HOST_REQUIRED', 0);
}


function webmanit_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on webmanit, use a find and replace
		* to change 'webmanit' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('webmanit', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'webmanit'),
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
			'webmanit_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

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
}
add_action('after_setup_theme', 'webmanit_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function webmanit_content_width()
{
	$GLOBALS['content_width'] = apply_filters('webmanit_content_width', 640);
}
add_action('after_setup_theme', 'webmanit_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function webmanit_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'webmanit'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'webmanit'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'webmanit_widgets_init');

/**
 * Enqueue scripts and styles.
 */
/**
 * Enqueue scripts and styles.
 */
function webmanit_scripts()
{
	wp_enqueue_style('webmanit-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('webmanit-style', 'rtl', 'replace');

	// Enqueue Google Fonts
	wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Work+Sans:wght@400;600&display=swap', false);
	//Font awesome
	wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', array(), '5.15.3', 'all');
	// Enqueue Bootstrap CSS and JS
	wp_enqueue_style('webmanit-bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '5.1.3');
	wp_enqueue_style('webmanit-custom-responsive', get_template_directory_uri() . '/css/custom-responsive.css', array(), '1.0.0');
	wp_enqueue_style('webmanit-custom', get_template_directory_uri() . '/css/custom.css', array(), '1.0.0');
	wp_enqueue_script('webmanit-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array('jquery'), '5.1.3', true);

	wp_enqueue_script('webmanit-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
	wp_enqueue_script('webmanit-custom-script', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0.0', true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'webmanit_scripts');


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
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Require custom navwalker class for Bootstrap navigation
require get_template_directory() . '/class-wp-bootstrap-navwalker.php';


// Include the custom post type registration code from custom-post.php
require_once get_template_directory() . '/inc/custom-post.php';


//Portfolio Shortcode

require_once get_template_directory() . '/inc/shortcodes.php';

//custom_portfolio_rewrite_rule
function custom_flush_rewrite_rules()
{
	flush_rewrite_rules();
}
add_action('after_switch_theme', 'custom_flush_rewrite_rules');
