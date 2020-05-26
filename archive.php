<?php
/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="archive-wrapper">
	

	<div class="text-left bg-light text-dark p-5 mb-3">
	
		<div class="container">

			<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>

		</div>

	</div>

	<div class="<?= $container ?>">

		<div class="row">

			<main class="site-main col-lg" id="main">

					<header class="page-header">
					</header><!-- .page-header -->

					<?php /* Start the Loop */ ?>

					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part('loop-templates/content', 'archive' ); ?>

						<?php endwhile; ?>

					<?php else : ?>

						<?php get_template_part( 'loop-templates/content', 'none' ); ?>

					<?php endif; ?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'sidebar-templates/sidebar', 'right-static' ); ?>

		</div>
	</div>

</div>

<?php get_footer();
