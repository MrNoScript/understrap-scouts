<?php
/**
 * Template Name: Section Page
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="page-wrapper">

    <?php while( have_posts() ): the_post(); ?>

        <header class="entry-header mb-5">

            <?php
            if(has_post_thumbnail()){
                $img = get_the_post_thumbnail_url();
            } else {
                $slug = $post->post_name;

                $img = get_stylesheet_directory_uri() . '/images/' . $slug . '.jpg';
            }
            ?>
            

            <div class="featured-image text-light">

                <img src="<?php echo $img; ?>">
                
                <div class="article">

                    <div class="container">

                        <h1 class="entry-title"><?php the_title(); ?></h1>
                        <p class="lead"><?php the_field('subtitle') ?></p>

                    </div>
                </div>

            </div>
            <div class=" d-none text-left bg-light text-dark p-5 mb-3">
                <div class="<?php echo esc_attr( $container ); ?>">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <h2 class="text-muted"><?php the_field('subtitle') ?></h2>
                </div>
            </div>
        </header>

        <div class="<?php echo esc_attr( $container ); ?>" id="content">

            <div class="row">

                <main class="site-main col-lg" id="main">

                   <?php get_template_part('loop-templates/content', 'page' ); ?>

                </main><!-- #main -->

                <!-- Do the right sidebar check -->
                <?php get_template_part( 'sidebar-templates/sidebar', 'right-static' ); ?>

            </div>

        </div><!-- #content -->

    <?php endwhile; ?>
</div>

<?php
get_footer();
?>