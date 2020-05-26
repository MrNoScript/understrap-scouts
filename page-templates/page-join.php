<?php
/**
 * Template Name: Join Page
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="page-wrapper">

	<?php while( have_posts() ): the_post(); ?>

		<header class="entry-header">

			<?php if(has_post_thumbnail()): ?>
				<div class="entry-header-image p-6 mb-3" style="background: url(<?= get_the_post_thumbnail_url() ?>) center center / cover;">
					<div class="<?php echo esc_attr( $container ); ?> cover-text">
						<?php the_title( '<h1 class="d-none d-md-block entry-title">', '</h1>' ); ?>
					</div>
				</div>

			<?php else: ?>

				<div class="text-left bg-light text-dark p-5 mb-3">
					<div class="<?php echo esc_attr( $container ); ?>">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</div>
				</div>

			<?php endif; ?>

		</header><!-- .entry-header -->

		<main class="<?php echo esc_attr( $container ); ?>" id="main">

			<div class="row">
				
				<article <?php post_class(['col-md']); ?> id="post-<?php the_ID(); ?>">

					<?php get_template_part( 'loop-templates/content', 'page' ); ?>

				</article>

				<!-- Do the right sidebar check -->
				<?php get_template_part( 'sidebar-templates/sidebar', 'right-static' ); ?>

		</main><!-- #main -->
				
	<?php endwhile; ?>

</div><!-- #page-wrapper -->

<?php get_footer();
