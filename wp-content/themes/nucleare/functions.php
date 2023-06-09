<?php
/**
 * nucleare functions and definitions
 *
 * @package nucleare
 */

if ( ! function_exists( 'nucleare_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function nucleare_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on nucleare, use a find and replace
	 * to change 'nucleare' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'nucleare', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'nucleare-normal-post' , 809, 9999);
	
	// Set the default content width.
	$GLOBALS['content_width'] = 650;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'nucleare' ),
		'footer' => esc_html__('Footer Menu', 'nucleare'),
	) );
	
	/* Support for wide images on Gutenberg */
	add_theme_support( 'align-wide' );
	
	// Adds support for editor font sizes.
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name'      => __( 'Small', 'nucleare' ),
			'shortName' => __( 'S', 'nucleare' ),
			'size'      => 14,
			'slug'      => 'small'
		),
		array(
			'name'      => __( 'Regular', 'nucleare' ),
			'shortName' => __( 'M', 'nucleare' ),
			'size'      => 16,
			'slug'      => 'regular'
		),
		array(
			'name'      => __( 'Large', 'nucleare' ),
			'shortName' => __( 'L', 'nucleare' ),
			'size'      => 20,
			'slug'      => 'large'
		),
		array(
			'name'      => __( 'Larger', 'nucleare' ),
			'shortName' => __( 'XL', 'nucleare' ),
			'size'      => 24,
			'slug'      => 'larger'
		)
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'script', 'style',
	) );
	
	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		 'video', 'audio', 'quote', 'link', 'gallery'
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'nucleare_custom_background_args', array(
		'default-color' => 'f2f2f2',
		'default-image' => '',
	) ) );
}
endif; // nucleare_setup
add_action( 'after_setup_theme', 'nucleare_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function nucleare_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'nucleare' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title"><h2><span>',
		'after_title'   => '</span></h2></div>',
	) );
}
add_action( 'widgets_init', 'nucleare_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function nucleare_scripts() {
	wp_enqueue_style( 'nucleare-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version') );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/css/font-awesome.min.css',array(), '4.7.0');
	$font_families = array(
		'Playfair+Display:wght@400',
		'Archivo+Narrow:wght@400;700'
	);
	$query_args = array(
		'family' => implode( '&family=', $font_families ),
		'display' => 'swap'
	);

	$googleFontsLocal = get_theme_mod('nucleare_theme_options_googlefontslocal', '');
	if ($googleFontsLocal == 1) {
		require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );
		wp_enqueue_style( 'nucleare-googlefonts', wptt_get_webfont_url(add_query_arg( $query_args, 'https://fonts.googleapis.com/css2' ) ), array(), null );
	} else {
		wp_enqueue_style( 'nucleare-googlefonts', add_query_arg( $query_args, "//fonts.googleapis.com/css2" ), array(), null );
	}

	wp_enqueue_script( 'nucleare-custom', get_template_directory_uri() . '/js/jquery.nucleare.min.js', array('jquery'), wp_get_theme()->get('Version'), true );
	wp_enqueue_script( 'nucleare-navigation', get_template_directory_uri() . '/js/navigation.min.js', array(), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nucleare_scripts' );

function nucleare_gutenberg_scripts() {
	wp_enqueue_style( 'nucleare-gutenberg-css', get_theme_file_uri( '/css/gutenberg-editor-style.css' ), array(), wp_get_theme()->get('Version') );
}
add_action( 'enqueue_block_editor_assets', 'nucleare_gutenberg_scripts' );

/**
 * Register all Elementor locations
 */
function nucleare_register_elementor_locations( $elementor_theme_manager ) {
	$elementor_theme_manager->register_all_core_location();
}
add_action( 'elementor/theme/register_locations', 'nucleare_register_elementor_locations' );

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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load Nucleare Dynamic.
 */
require get_template_directory() . '/inc/nucleare-dynamic.php';

/* Calling in the admin area for the Welcome Page */
if ( is_admin() ) {
	require get_template_directory() . '/inc/admin/nucleare-admin-page.php';
}

/**
 * Load PRO Button in the customizer
 */
require get_template_directory() . '/inc/pro-button/class-customize.php';