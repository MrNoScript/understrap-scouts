<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
} 
$container = get_theme_mod( 'understrap_container_type' );

$links = [
    'beavers' => '/sections/beavers',
    'cubs' => '/sections/cubs',
    'scouts' => '/sections/scouts',
    'explorers' => '/sections/explorers',
    'network' => '/sections/network'
];

if(function_exists('get_field')){
    foreach($links as $key => &$link){
        $link = get_field('age_block_' . $key . '_link');
    }
}

?>
<div class="<?= $container?> mt-0 py-3">
    <div class="section-blocks clearfix">
        <a href="<?= $links['beavers'] ?>" class="section grow fade-in">
            <div class="head">
                <div class="inner">
                    <img width="115" height="35" src="<?= get_stylesheet_directory_uri() ?>/images/logos/svg/logo-beavers.svg"><br>
                    <span>6 to 8</span>
                </div>
            </div>
            <div class="more">
                    <span class="link">Have fun &amp; make friends</span>
            </div>
        </a>
        <a href="<?= $links['cubs'] ?>" class="section grow fade-in">
            <div class="head">
                <div class="inner">
                    <img width="87" height="35" src="<?= get_stylesheet_directory_uri() ?>/images/logos/svg/logo-cubs.svg"><br>
                    <span>8 to 10&frac12;</span>
                </div>
            </div>
            <div class="more">
                <span class="link">Learn skills &amp; have new adventures</span>
            </div>
        </a>
        <a href="<?= $links['scouts'] ?>" class="section grow fade-in">
            <div class="head">
                <div class="inner">
                    <img width="124" height="35" src="<?= get_stylesheet_directory_uri() ?>/images/logos/svg/logo-scouts.svg"><br>
                    <span>10&frac12; to 14</span>
                </div>
            </div>
            <div class="more">
                <span class="link">Build confidence &amp; a sense of adventure!</span>
            </div>
        </a>
        <a href="<?= $links['explorers'] ?>" class="section grow fade-in">
            <div class="head">
                <div class="inner">
                    <img width="176" height="35" src="<?= get_stylesheet_directory_uri() ?>/images/logos/svg/logo-explorers.svg"><br>
                    <span>14 to 18</span>
                </div>
            </div>
            <div class="more">
                <span class="link">Take the lead &amp; embrace new experiences</span>
            </div>
        </a>
        <a href="<?= $links['network'] ?>" class="section grow fade-in">
            <div class="head">
                <div class="inner">
                    <img width="114" height="35" src="<?= get_stylesheet_directory_uri() ?>/images/logos/svg/logo-network.svg"><br>
                    <span>18 to 25</span>
                </div>
            </div>
            <div class="more">
                <span class="link">Hone emplyability &amp; acheive top awards</span>
            </div>
        </a>
    </div>
</div>