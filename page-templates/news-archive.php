<?php
/**
 * Template Name: News Archive
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$archive_query = new WP_Query('post_type=post');

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="page-wrapper">

    <?php while( have_posts() ): the_post(); ?>

        <div class="text-left bg-light text-dark p-5 mb-3">
            <div class="<?php echo esc_attr( $container ); ?>">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </div>
        </div>

        <div class="<?php echo esc_attr( $container ); ?>" id="content">

            <div class="row">

                <main class="site-main col-lg" id="main">
                    <?php /* loop query */ ?>
                    <?php while( $archive_query->have_posts() ): $archive_query->the_post(); ?>

                        <?php get_template_part('loop-templates/content', 'archive' ); ?>

                    <?php endwhile; ?>
                    <?php
                    // reset post data
                    wp_reset_postdata();
                    ?>

                </main><!-- #main -->

                <!-- Do the right sidebar check -->
                <?php get_template_part( 'sidebar-templates/sidebar', 'right-static' ); ?>

            </div>

        </div><!-- #content -->

	<?php endwhile; ?>

</div><!-- #page-wrapper -->

<?php get_footer();
