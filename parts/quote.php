<?php 
defined( 'ABSPATH' ) || exit;

$quotes = [
    ["quote" => "Survival can be summed up in three words – never give up.", "author" => "Bear Grylls, Chief Scout"],
    ["quote" => "Every Scout ought to prepare himself to be a good citizen of his country and of the world.", "author" => "Baden-Powell, Founder"],
    ["quote" => "Life without adventure is deadly dull.", "author" => "Baden-Powell, Founder"]
];

$quote = $quotes[array_rand($quotes)];

?>
<div class="bg-map-blue">
    <div class="container testimonial">
        <h6>&lsquo;<?= $quote['quote'] ?>&rsquo;</h6>
        <div class="text-right author text-yellow font-italic font-weight-bold"><?= $quote['author'] ?></div>
    </div>
</div>