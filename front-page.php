<?php
/**
 * The template for displaying front page.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'global-templates/hero' ); ?>
<?php if(get_theme_mod( 'understrap_age_blocks' )) get_template_part('parts/age-blocks'); ?>
<?php if(get_theme_mod( 'understrap_group_finder' )) get_template_part('parts/find-a-group'); ?>
<?php if(get_theme_mod( 'understrap_blog' )) get_template_part('parts/latest-posts'); ?>
<?php get_footer(); ?>