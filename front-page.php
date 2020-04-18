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
<?php get_template_part('parts/age-blocks'); ?>
<?php get_template_part('parts/find-a-group'); ?>
<?php get_template_part('parts/latest-posts'); ?>
<?php get_footer(); ?>