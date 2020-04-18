<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
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

		<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

			<div class="row">

				<main class="site-main" id="main">
					
					<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

						<!-- Do the left sidebar check -->
						<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

						<?php get_template_part( 'loop-templates/content', 'page' ); ?>

						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
						?>

						<!-- Do the right sidebar check -->
						<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

					</article>

				</main><!-- #main -->

			</div><!-- .row -->

		</div><!-- #content -->
				
	<?php endwhile; ?>

</div><!-- #page-wrapper -->

<?php get_footer();
