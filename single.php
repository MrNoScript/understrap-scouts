<?php
/**
 * The template for displaying all single posts
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="single-wrapper">

	<?php while( have_posts() ): the_post(); ?>

		<header class="entry-header mb-5">

			<?php if(has_post_thumbnail()): ?>

				<div class="featured-image text-light">

					<img src="<?php echo get_the_post_thumbnail_url( ); ?>">
					<div class="article">

						<div class="container">

							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
							<?php understrap_posted_on(); ?>

						</div>
					</div>

				</div>

			<?php else: ?>

				<div class="text-left bg-light text-dark p-5 mb-3">
					<div class="<?php echo esc_attr( $container ); ?>">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						<?php understrap_posted_on(); ?>
					</div>
				</div>

			<?php endif; ?>

		</header><!-- .entry-header -->

		<main class="<?php echo esc_attr( $container ); ?>" id="main">

			<div class="row">
				<!-- Do the left sidebar check -->
				<?php get_template_part( 'sidebar-templates/sidebar', 'left' ); ?>
			
				<article <?php post_class(['col-lg']); ?> id="post-<?php the_ID(); ?>">

					<?php get_template_part( 'loop-templates/content', 'single' ); ?>

				</article>

				<!-- Do the right sidebar check -->
				<?php get_template_part( 'sidebar-templates/sidebar', 'right-static' ); ?>

		</main><!-- #main -->
				
	<?php endwhile; ?>

</div><!-- #single-wrapper -->

<?php get_footer();
