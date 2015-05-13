<?php
/**
 * Custom functions that add extra functionality to the theme
 *
 * @package fang
 */

/**
 * Adds custom classes body tag.
 *
 */
function fang_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'fang_body_classes' );

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 */
	function fang_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( __( 'Page %s', 'codediva' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'fang_wp_title', 10, 2 );

	/**
	 * Title fix for sites using a version of WordPress older than 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 */
	function fang_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'fang_render_title' );
endif;

/**
 * Highlights search terms in titles, excerpts, and content
 */
 
function search_excerpt_highlight() {
	$excerpt = get_the_excerpt();
	$keys = implode('|', explode(' ', get_search_query()));
	$excerpt = preg_replace('/(' . $keys .')/iu', '<strong class="search-highlight">\0</strong>', $excerpt);
	
	echo '<p>' . $excerpt . '</p>';
}

function search_title_highlight() {
	$title = get_the_title();
	$keys = implode('|', explode(' ', get_search_query()));
	$title = preg_replace('/(' . $keys .')/iu', '<strong class="search-highlight">\0</strong>', $title);
	
	echo $title;
}

/**
 * Add a link to click through to the full post on the excerpt
 */

function cd_excerpt_more( $more ) {
	return '... <a class="tiplink" href="' . get_permalink() . '">' . __( 'Continue Reading', 'codediva' ) . '</a> &raquo;';
}
add_filter('excerpt_more', 'cd_excerpt_more');

/**
 * Change the read more link
 */
 
function cd_more_link( $more_link, $more_link_text ) {
    return str_replace( $more_link_text, __('Read the full article &rarr;','codediva'), $more_link ) . '';
}

add_filter( 'the_content_more_link', 'cd_more_link', 10, 2 );

/**
 * Make video embeds responsive
 */
 
 function cd_embed_html( $html ) {
    return '<div class="video-wrapper">' . $html . '</div>';
}
 
add_filter( 'embed_oembed_html', 'cd_embed_html', 10, 3 );
add_filter( 'video_embed_html', 'cd_embed_html' ); // Jetpack
 