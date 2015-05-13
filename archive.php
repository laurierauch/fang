<?php
/**
 * The template for displaying archive pages.
 *
 * @package fang
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php 
				while ( have_posts() ) : the_post(); 
				// start the Loop
			?>

				<?php
					get_template_part( 'template-parts/content', 'excerpt' );
				?>

			<?php 
				endwhile; 
				//end the Loop
			?>

			<?php cd_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>