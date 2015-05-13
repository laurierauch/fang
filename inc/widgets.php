<?php
/**
 * Custom widgets for this theme.
 *
 * @package fang
 */

/**
 * Register widgetized areas
 */

function cd_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog', 'codediva' ),
		'id'            => 'blog',
		'description'	=> __( 'Sidebar that appears on all blog pages', 'codediva' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Page', 'codediva' ),
		'id'            => 'page',
		'description'	=> __( 'Sidebar that appears on all static pages', 'codediva' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	$widgets = array( '1', '2', '3', '4' );
	foreach ( $widgets as $i ) {
		register_sidebar(array(
			'name' => __( 'Footer Widget ', 'codediva' ) .$i,
			'id' => 'footer-widget-'.$i,
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title"><span>',
			'after_title' => '</span></h3>'
		) );
	} // end foreach
}
add_action( 'widgets_init', 'cd_widgets_init' );

function cd_footer_widget_class() {
    $count = 0;

    if ( is_active_sidebar( 'footer-widget-1' ) )
        $count++;

    if ( is_active_sidebar( 'footer-widget-2' ) )
        $count++;

    if ( is_active_sidebar( 'footer-widget-3' ) )
        $count++;

	if ( is_active_sidebar( 'footer-widget-4' ) )
        $count++;

    $class = '';

    switch ( $count ) {
        case '1':
            $class = 'one';
            break;
        case '2':
            $class = 'two';
            break;
        case '3':
            $class = 'three';
            break;
		case '4':
            $class = 'four';
            break;
    }

    if ( $class )
        echo 'class="' . $class . '"';
}