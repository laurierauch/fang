<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package fang
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function fang_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'fang_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function fang_jetpack_setup
add_action( 'after_setup_theme', 'fang_jetpack_setup' );

function fang_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function fang_infinite_scroll_render