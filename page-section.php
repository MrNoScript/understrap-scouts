<?php
/**
 * Template Name: Section Template
 * Section page template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<?php while( have_posts() ): the_post(); ?>

<?php
    $page_type = $post->post_name;

    $image_url = has_post_thumbnail() ? get_the_post_thumbnail_url() : get_template_directory_uri() . '/images/' . $page_type . '.jpg'; 
    $height = has_post_thumbnail() ? '300px' : '300px';
?>

<div class="wrapper beavers" id="page-wrapper">

    <header class="entry-header">

        <div class="entry-header-image pt-6 pb-3 mb-3" style="min-height: <?= $height; ?>; background: url(<?= $image_url ?>) center center / cover;">

            <div class="<?=  $container ?> cover-text pt-6">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <?php the_title( '<h1 class="d-block entry-title">', '</h1>' ); ?>
                        <?php if( get_field('sub-heading') ): ?>
                            <p class="lead"><?php the_field('sub-heading'); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>

    </header>

    <div class="<?= $container ?>">

        <div class="row">

            <div class="col-lg">
                <?php get_template_part( 'loop-templates/content', 'page' ); ?>
            </div> <!-- .col -->
            <div class="col-lg-4"> <!-- Section Side bar -->
                <?php the_widget('Group_Finder_Widget'); ?>

                <div class="widget bg-navy p-3 mb-3 text-light">
                    <h5>Uniform and badge placement</h5>
                    <p>
                        You don't need a uniform to join <?= $post->post_title ?>. 
                        But once you've settled in, you'll start speedily earning badges, and you'll need to know where to put them.
                    </p>
                    <p>
                        <a class="btn btn-outline-light" href="https://www.scouts.org.uk/<?= $page_type ?>/<?= $page_type ?>-uniform-and-badge-placement/">What to wear at <?= $post->post_title ?></a>
                    </p>
                </div>

                <?php dynamic_sidebar('section-sidebar'); ?>
            </div> <!-- .col -->

        </div> <!-- .row -->
        
    </div>
</div>
<?php endwhile; ?>

<?php get_footer() ?>