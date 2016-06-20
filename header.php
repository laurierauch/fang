<?php
/**
 * The header for our theme.
 *
 * @package fang
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php 
	// add all links to stylesheets, javascript files, extra functions in the theme setup hooked into wp_head
	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'codediva' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<?php if ( has_nav_menu( 'social' ) ) {
				wp_nav_menu(
					array(
						'theme_location'  => 'social',
						'container'       => 'div',
						'container_id'    => 'menu-social',
						'container_class' => 'menu',
						'menu_id'         => 'menu-social-items',
						'menu_class'      => 'menu-items',
						'depth'           => 1,
						'link_before'     => '<span class="screen-reader-text">',
						'link_after'      => '</span>',
						'fallback_cb'     => '',
					)
				);			
			} ?>
			<button class="menu-toggle" aria-controls="menu-main" aria-expanded="false"><?php esc_html_e( 'Menu', 'codediva' ); ?></button>
			<?php wp_nav_menu( array(
				'theme_location'  => 'primary',
				'container'       => 'div',
				'container_id'    => 'menu-main',
				'container_class' => 'menu',
				'menu_id'         => 'menu-main-items',
				'menu_class'      => 'menu-items',
			) ); ?>			
		</nav><!-- #site-navigation -->
		<div class="site-branding container">
        	<?php if (get_header_image() != '') { ?>
				<img src="<?php echo header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php get_bloginfo('name'); ?>" />
            <?php } else { ?>
            	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
            <?php } ?>
		</div><!-- .site-branding -->
	</header><!-- #masthead -->

<div id="content" class="site-content container">