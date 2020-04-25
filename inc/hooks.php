<?php
/**
 * Custom hooks
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'understrap_site_info' ) ) {
	/**
	 * Add site info hook to WP hook library.
	 */
	function understrap_site_info() {
		do_action( 'understrap_site_info' );
	}
}

add_action( 'understrap_site_info', 'understrap_add_site_info' );
if ( ! function_exists( 'understrap_add_site_info' ) ) {
	/**
	 * Add site info content.
	 */
	function understrap_add_site_info() {
		$the_theme = wp_get_theme();
		/*
Proudly powered by /WordPress/ | Theme: UnderStrap Scouts by Tom Roberts andy.
		*/

		$site_info = sprintf(
			'<a href="%1$s">%2$s</a> <span class="sep"> | </span>%4$s (%5$s)<br> %3$s',
			esc_url( __( 'http://wordpress.org/', 'understrap' ) ),
			sprintf(
				/* translators:*/
				esc_html__( 'Proudly powered by %s', 'understrap' ),
				'WordPress'
			),
			sprintf(
				esc_html__( 'Made with %s', 'understrap'),
				'<span title="Love">&#x2764</span>, <span title="Coffee">&#x2615</span>, and <span title="' . count(get_option('active_plugins')) . ' plugins to be precice">a few plugins</span>.'
			),
			sprintf( // WPCS: XSS ok.
				/* translators:*/
				esc_html__( 'Theme: %1$s by %2$s and %3$s', 'understrap' ),
				$the_theme->get( 'Name' ),
				'<a href="' . esc_url( __( 'https://tomroberts.dev', 'understrap' ) ) . '">' . $the_theme->get( 'Author' ) . '</a>',
				'<a href="' . esc_url( __( 'http://understrap.com', 'understrap' ) ) . '">understrap.com</a>'
			),
			sprintf( // WPCS: XSS ok.
				/* translators:*/
				esc_html__( 'Version: %1$s', 'understrap' ),
				$the_theme->get( 'Version' )
			)
		);

		echo apply_filters( 'understrap_site_info_content', $site_info ); // WPCS: XSS ok.
	}
}
