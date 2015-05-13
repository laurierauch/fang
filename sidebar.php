<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package fang
 */

if ( is_single() || is_archive() || is_home() || is_search() ) {
	if ( is_active_sidebar( 'blog' ) ) { ?>
		<div id="secondary" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'blog' ); ?>
		</div><!-- #secondary -->
	<?php }
} else {
	if ( is_active_sidebar( 'page' ) ) { ?>
		<div id="secondary" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'page' ); ?>
		</div><!-- #secondary -->
	<?php }
} ?>