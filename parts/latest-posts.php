<?php
defined('ABSPATH') or exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="<?= $container ?>">

<div class="card-columns news-cards">

    <?php while(have_posts()): the_post(); ?>

    <div class="card border-none bg-light" data-category_id="" id="post-<?php the_ID(); ?>">
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

</div>
</div>