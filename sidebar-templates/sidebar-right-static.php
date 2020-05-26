<?php
/**
 * The right sidebar containing the main widget area
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


?>

<div class="col-lg-3">

    <?php
    

    $parent = $post->ID;

    if ($post->post_parent)	{
        $ancestors = get_post_ancestors($parent);
        $parent = $ancestors[count($ancestors) - 1];
    }

    $query = [
        'child_of' => $parent,
        'sort_column' => 'menu_order',
        'title_li' => ''
    ];

    $has_siblings = count(get_pages($query)) > 0;

    ?>
    <?php if( is_page() && $has_siblings ): ?>

        <div class="widget widget-like-this">
            <h4 class="widget-title">
                Pages like this
            </h4>
            <ul class="widget-body">
                <?php 

                ?>
                <li <?= $post->ID == $parent ? 'class="current_page_item"' : '' ?> >
                    <a href="<?= get_the_permalink($parent) ?>"><?= get_the_title($parent); ?></a>
                    <ul>
                        <?php 
                        wp_list_pages($query);
                        ?>
                    </ul>
                </li>
            </ul>
        </div>
    <?php endif; ?>

    

    <?php if($post->page_template === 'page-templates/page-section.php'): ?>

        <div class="widget widget-join-<?= $post->post_name ?> mb-3">
            <h4 class="widget-title">
                Join <?= $post->post_title ?> today
            </h4>
            <div class="widget-body">
                <p>
                    When you join <?= $post->post_title ?>, you’ll be introduced to lots of new activities, people and things.
                </p>
                <a href="<?= site_url() ?>/join?section=<?= $post->post_name ?>" class="btn btn-outline-dark btn-block">Join Today</a>
            </div>
        </div>
    <?php else: ?>
    
        <div class="widget widget-get-involved">

            <h4 class="widget-title">
                Get Involved
            </h4>
            <ul class="widget-body">
                <p>Aged 6+ and want to join Scouts, get started in just a few clicks.</p>
                <a href="<?= site_url() ?>/join" class="btn btn-outline-dark btn-block">Join Today</a>
            </ul>

        </div>

    <?php endif; ?>

    <?php if( is_single() || is_archive() ): ?>

        <div class="widget monthly-archive">

            <h4 class="widget-title">
                Monthly Archives
            </h4>
            <ul class="widget-body">
                <?php wp_get_archives(); ?>
            </ul>

        </div>

    <?php else: ?>

    <?php endif; ?>

    

    <div class="widget latest-news">
        <h4 class="widget-title">Latest Updates</h4>
        <?php
        $recent_posts = wp_get_recent_posts(['numberposts' => 2], 'OBJECT');
        foreach($recent_posts as $recent): ?>
            <a class="widget-body" href="<?php echo get_the_permalink($recent); ?>">
                <small><?php echo get_the_date('', $recent); ?></small>
                <h6><?php echo get_the_title($recent); ?></h6>
                <small>Read more&hellip;</small>
            </a>
        <?php endforeach; ?>
    </div>


    <div class="d-none block news teal">
        <h4>Latest news</h4>

        <a href="https://www.cheshirescouts.org.uk/news/article/cheshire-scouts-newsletter-3-may-2020">

            <span class="date">3rd May 2020</span>
            <p>Cheshire Scouts Newsletter – 3 May 2020</p>
            <span class="link white">Read more</span>

        </a>
    </div>
        
</div>
