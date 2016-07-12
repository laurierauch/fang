<?php
/**
 * Fang functions and definitions
 *
 * @package fang
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 750; /* pixels */
}

if ( ! function_exists( 'fang_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Hooks into the after_setup_theme hook, which runs before the init hook to 
 * ensure everything is in place at setup.
 *
 * Can be replaced in a child theme by creating a new fang_setup function.
 *
 */

function fang_setup() {
	// Make theme available for translation
	load_theme_textdomain( 'codediva', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Lets WordPress manage each page's title
	add_theme_support( 'title-tag' );

	// Enables Post Thumbnails
	add_theme_support( 'post-thumbnails' );

	// Registers two menu areas
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'codediva' ),
		'social' => __( 'Social Menu', 'codediva' ),
	) );

	// Changes default code to output valid HTML5
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	// Enables Post Formats
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'video', 'quote', 'audio' ) );

	// Sets up the custom background feature
	add_theme_support( 'custom-background', apply_filters( 'cd_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	// Sets up the custom header feature
	add_theme_support( 'custom-header', apply_filters( 'cd_custom_header_args', array(
		'default-image'          => '',
		'random-default'         => false,
		'flex-height'            => true,
		'flex-width'             => true,
		'default-text-color'     => '',
		'header-text'            => false,
		'uploads'                => true,
	) ) );
	
}
endif; // fang_setup

add_action( 'after_setup_theme', 'fang_setup' );

// Enqueue scripts and styles.

function fang_scripts() {
	wp_enqueue_style( 'fang-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'fang-fonts', 'http://fonts.googleapis.com/css?family=Oswald:300' );
	
	wp_enqueue_style('font-awesome', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');

	wp_enqueue_script( 'fang-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'fang-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	
	wp_enqueue_script( 'fang-sticky', get_template_directory_uri() . '/js/jquery.sticky.js', array('jquery'), '1.0.2', true );
	
	wp_enqueue_script( 'fang-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fang_scripts' );

// Call the file that includes the Custom Header feature
require get_template_directory() . '/inc/custom-header.php';

// Call the file that includes the theme's template tags
require get_template_directory() . '/inc/template-tags.php';

// Call the file that includes the custom widgets
require get_template_directory() . '/inc/widgets.php';

// Call the file that includes any extra functionality in the theme.
require get_template_directory() . '/inc/extras.php';

// Call the file that allows the user to use the Theme Customizer
require get_template_directory() . '/inc/customizer.php';

// Call the file that makes the theme compatible with Jetpack
require get_template_directory() . '/inc/jetpack.php';

// Call the file that we use for playing in CCT460
//require get_template_directory() . '/inc/children.php';