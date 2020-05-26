<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

<div class="wrapper" id="index-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">
		<div class="row">

			<!-- Do the left sidebar check and opens the primary div -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main col-lg" id="main">

                <?php if ( have_posts() ) : ?>

                    <?php
                        // latest post as sticky post
                        the_post();

                    ?>
                    <div class="my-3 row bg-purple headline-post">
                        <?php if( has_post_thumbnail() ): ?>

                            <div class="featured-image col-12 text-light overflow-hidden px-0">

                                <img src="<?php echo get_the_post_thumbnail_url( ); ?>">
                                <div class="article">

                                    <h1>
                                        <a class="text-light" href="<?php the_permalink() ?>"><?= the_title() ?></a>
                                    </h1>

                                    <div class="read-more">
                                        <div class="excerpt">
                                            <?= the_excerpt(); ?>
                                        </div>
                                        <p class="lead"><a class="btn btn-outline-light" href="<?= get_the_permalink() ?>">Read more&hellip;</a></p>
                                    </div>

                                </div>

                            </div>

                        <?php else: ?>

                            <div class="col-6 text-light p-5">
                                <h1><a class="text-light" href="<?php the_permalink() ?>"><?= the_title() ?></a></h1>
                            </div>

                            <div class="col-6 text-light p-5">
                                <?= the_excerpt(); ?>
                                <p class="lead"><a class="btn btn-outline-light" href="<?= get_the_permalink() ?>">Read more&hellip;</a></p>
                            </div>

                        <?php endif; ?>
                    </div>

                    <?php /* Start the Loop */ ?>
                    <div class="card-deck">

                        <?php while ( have_posts() ) : the_post(); ?>

                        <?php // display post-cards ?>

                        <div class="card post-card">

                            <a href="<?php the_permalink(); ?>">
                                <div class="card-body">
                                    <p class="text-light"><small><?php the_date(); ?></small></p>

                                    <h5 class="card-title text-light">
                                        <?php the_title(); ?>
                                    </h5>

                                    <p>Read more&hellip;</p>


                                </div>
                            </a>

                        </div>

                        <?php endwhile; ?>

                    </div>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #index-wrapper -->

<?php get_footer();
