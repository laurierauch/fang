<?php
/**
 * The template for displaying the footer.
 *
 * @package fang
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
				<?php if ( is_active_sidebar( 'footer-widget-1' ) || is_active_sidebar( 'footer-widget-2' ) || is_active_sidebar( 'footer-widget-3' ) || is_active_sidebar( 'footer-widget-4' ) ) : 
					// don't display the footer widgets section if there aren't any widgets in these widget areas.
				?>
                <div id="footer-widgets" <?php cd_footer_widget_class(); ?>>
                    <?php if ( is_active_sidebar( 'footer-widget-1' ) ) : ?>
                        <aside id="widget-1" class="widget-1">
                            <?php dynamic_sidebar( 'footer-widget-1' ); ?>
                        </aside>
                    <?php endif; ?>
                    <?php if ( is_active_sidebar( 'footer-widget-2' ) ) : ?>
                        <aside id="widget-2" class="widget-2">
                            <?php dynamic_sidebar( 'footer-widget-2' ); ?>
                        </aside>
                    <?php endif; ?>
                    <?php if ( is_active_sidebar( 'footer-widget-3' ) ) : ?>
                        <aside id="widget-3" class="widget-3">
                            <?php dynamic_sidebar( 'footer-widget-3' ); ?>
                        </aside>
                    <?php endif; ?>
                    <?php if ( is_active_sidebar( 'footer-widget-4' ) ) : ?>
                        <aside id="widget-4" class="widget-4">
                            <?php dynamic_sidebar( 'footer-widget-4' ); ?>
                        </aside>
                    <?php endif; ?>
                </div><!-- end #footer-widgets -->
				<?php endif; // end check if any footer widgets are active ?>
				
				<div class="site-info">
					<p class="copyright">&copy; <?php echo date('Y'); ?> <a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>. All Rights Reserved.</p> 
                    <p class="credits"><?php printf( __( 'Theme: %1$s by %2$s.', 'codediva' ), 'Fang', '<a href="http://codediva.com" rel="designer">Code Diva</a>' ); ?></p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>