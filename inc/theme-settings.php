<?php
/**
 * Check and setup theme's default settings
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'understrap_setup_theme_default_settings' ) ) {
	/**
	 * Store default theme settings in database.
	 */
	function understrap_setup_theme_default_settings() {
		$defaults = understrap_get_theme_default_settings();
		$settings = get_theme_mods();
		foreach ( $defaults as $setting_id => $default_value ) {
			// Check if setting is set, if not set it to its default value.
			if ( ! isset( $settings[ $setting_id ] ) ) {
				set_theme_mod( $setting_id, $default_value );
			}
		}
	}
}

if ( ! function_exists( 'understrap_get_theme_default_settings' ) ) {
	/**
	 * Retrieve default theme settings.
	 *
	 * @return array
	 */
	function understrap_get_theme_default_settings() {
		$defaults = array(
			'understrap_posts_index_style' => 'default',   // Latest blog posts style.
			'understrap_sidebar_position'  => 'right',     // Sidebar position.
			'understrap_container_type'    => 'container', // Container width.
			'understrap_age_blocks' 	   => true,
			'understrap_group_finder' 	   => true,
			'understrap_blog'		 	   => true,
		);

		/**
		 * Filters the default theme settings.
		 *
		 * @param array $defaults Array of default theme settings.
		 */
		return apply_filters( 'understrap_theme_default_settings', $defaults );
	}
}

function understrap_custom_login_logo() { 
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	if($custom_logo_id): 
	?>
	
    <style type="text/css">
        #login h1 a {
            background-image: url("<?= get_stylesheet_directory_uri() ?>/images/logos/svg/scouts-black.svg");
			background-size: 176px 50px;
			height: 50px;
			width: auto;
			background-repeat: no-repeat;
        	padding-bottom: 30px;
        }
    </style>
<?php
	endif;
}

add_action( 'login_enqueue_scripts', 'understrap_custom_login_logo' );

function understrap_custom_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'understrap_custom_login_logo_url' );