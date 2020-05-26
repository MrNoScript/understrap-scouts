<?php
/**
 * The template part for displaying an archive
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>


<div class="card bg-info text-light mb-2">
    
    <div class="card-body">

        <p class="card-text small"><?= get_the_date(); ?></p>
        <h5 class="card-title"><?php the_title(); ?></h5>
        <p class="card-text"><a href="<?php the_permalink(); ?>" class="btn btn-outline-light">Read more &hellip;</a></p>

    </div>

</div>