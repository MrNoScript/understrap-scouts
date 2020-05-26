<?php
defined('ABSPATH') or exit;

$container = get_theme_mod( 'understrap_container_type' );

$query = new WP_Query([
    'posts_per_page' => 6
]);
?>

<div class="<?= $container ?> my-3">
    <div class="card-deck">

        <?php while($query->have_posts()): $query->the_post(); ?>

        <div class="col-md-4 card border-none bg-light col-md-4" data-category_id="" id="post-<?php the_ID(); ?>">
            <?php if(has_post_thumbnail()): ?>
                <a href="<?php the_permalink() ?>">
                    <img src="<?= get_the_post_thumbnail_url() ?>" class="card-img-top" alt="">
                </a>
            <?php endif; ?>

            <div class="card-body">

                <a href="<?php the_permalink() ?>" class="h3 d-block text-reset">
                    <?php the_title(); ?>
                </a>
                <?= get_the_excerpt(); ?>&hellip;
            </div>
        </div>

        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>

    </div>
</div>