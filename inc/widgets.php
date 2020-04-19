<?php
/**
 * Declaring widgets
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Add filter to the parameters passed to a widget's display callback.
 * The filter is evaluated on both the front and the back end!
 *
 * @link https://developer.wordpress.org/reference/hooks/dynamic_sidebar_params/
 */
add_filter( 'dynamic_sidebar_params', 'understrap_widget_classes' );

if ( ! function_exists( 'understrap_widget_classes' ) ) {
	/**
	 * Count number of visible widgets in a sidebar and add classes to widgets accordingly,
	 * so widgets can be displayed one, two, three or four per row.
	 *
	 * @global array $sidebars_widgets
	 *
	 * @param array $params {
	 *     @type array $args  {
	 *         An array of widget display arguments.
	 *
	 *         @type string $name          Name of the sidebar the widget is assigned to.
	 *         @type string $id            ID of the sidebar the widget is assigned to.
	 *         @type string $description   The sidebar description.
	 *         @type string $class         CSS class applied to the sidebar container.
	 *         @type string $before_widget HTML markup to prepend to each widget in the sidebar.
	 *         @type string $after_widget  HTML markup to append to each widget in the sidebar.
	 *         @type string $before_title  HTML markup to prepend to the widget title when displayed.
	 *         @type string $after_title   HTML markup to append to the widget title when displayed.
	 *         @type string $widget_id     ID of the widget.
	 *         @type string $widget_name   Name of the widget.
	 *     }
	 *     @type array $widget_args {
	 *         An array of multi-widget arguments.
	 *
	 *         @type int $number Number increment used for multiples of the same widget.
	 *     }
	 * }
	 * @return array $params
	 */
	function understrap_widget_classes( $params ) {

		global $sidebars_widgets;

		/*
		 * When the corresponding filter is evaluated on the front end
		 * this takes into account that there might have been made other changes.
		 */
		$sidebars_widgets_count = apply_filters( 'sidebars_widgets', $sidebars_widgets );

		// Only apply changes if sidebar ID is set and the widget's classes depend on the number of widgets in the sidebar.
		if ( isset( $params[0]['id'] ) && strpos( $params[0]['before_widget'], 'dynamic-classes' ) ) {
			$sidebar_id   = $params[0]['id'];
			$widget_count = count( $sidebars_widgets_count[ $sidebar_id ] );

			$widget_classes = 'widget-count-' . $widget_count;
			if ( 0 === $widget_count % 4 || $widget_count > 6 ) {
				// Four widgets per row if there are exactly four or more than six.
				$widget_classes .= ' col-md-3';
			} elseif ( 6 === $widget_count ) {
				// If two widgets are published.
				$widget_classes .= ' col-md-2';
			} elseif ( $widget_count >= 3 ) {
				// Three widgets per row if there's three or more widgets.
				$widget_classes .= ' col-md-4';
			} elseif ( 2 === $widget_count ) {
				// If two widgets are published.
				$widget_classes .= ' col-md-6';
			} elseif ( 1 === $widget_count ) {
				// If just on widget is active.
				$widget_classes .= ' col-md-12';
			}

			// Replace the placeholder class 'dynamic-classes' with the classes stored in $widget_classes.
			$params[0]['before_widget'] = str_replace( 'dynamic-classes', $widget_classes, $params[0]['before_widget'] );
		}

		return $params;

	}
} // endif function_exists( 'understrap_widget_classes' ).

add_action( 'widgets_init', 'understrap_widgets_init' );

if ( ! function_exists( 'understrap_widgets_init' ) ) {
	/**
	 * Initializes themes widgets.
	 */
	function understrap_widgets_init() {

		register_sidebar(
			array(
				'name' 	=> 'Section Sidebar',
				'id'	=> 'section-sidebar',
				'description'	=> 'Section page sidebar widget area',
				'before_widget' => '<div id="%1$s" class="widget mb-3 p-3 text-light bg-teal %2$s">',
				'after_widget'  => '</div>',
				'before_title'	=> '<p class="h5">',
				'after_title' 	=> '</p>'
			)
		);

		register_sidebar(
			array(
				'name'          => __( 'Right Sidebar', 'understrap' ),
				'id'            => 'right-sidebar',
				'description'   => __( 'Right sidebar widget area', 'understrap' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);

		register_sidebar(
			array(
				'name'          => __( 'Left Sidebar', 'understrap' ),
				'id'            => 'left-sidebar',
				'description'   => __( 'Left sidebar widget area', 'understrap' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);

		register_sidebar(
			array(
				'name'          => __( 'Hero Slider', 'understrap' ),
				'id'            => 'hero',
				'description'   => __( 'Hero slider area. Place two or more widgets here and they will slide!', 'understrap' ),
				'before_widget' => '<div class="carousel-item">',
				'after_widget'  => '</div>',
				'before_title'  => '<h5>',
				'after_title'   => '</h5>',
			)
		);

		register_sidebar(
			array(
				'name'          => __( 'Hero Canvas', 'understrap' ),
				'id'            => 'herocanvas',
				'description'   => __( 'Full size canvas hero area for Bootstrap and other custom HTML markup', 'understrap' ),
				'before_widget' => '',
				'after_widget'  => '',
				'before_title'  => '',
				'after_title'   => '',
			)
		);

		register_sidebar(
			array(
				'name'          => __( 'Top Full', 'understrap' ),
				'id'            => 'statichero',
				'description'   => __( 'Full top widget with dynamic grid', 'understrap' ),
				'before_widget' => '<div id="%1$s" class="static-hero-widget %2$s dynamic-classes">',
				'after_widget'  => '</div><!-- .static-hero-widget -->',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);

		register_sidebar(
			array(
				'name'          => __( 'Footer Full', 'understrap' ),
				'id'            => 'footerfull',
				'description'   => __( 'Full sized footer widget with dynamic grid', 'understrap' ),
				'before_widget' => '<div id="%1$s" class="footer-widget %2$s dynamic-classes">',
				'after_widget'  => '</div><!-- .footer-widget -->',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);

	}

} // endif function_exists( 'understrap_widgets_init' ).



add_filter( 'widget_display_callback', 'understrap_widget_override', 10, 3);

if ( ! function_exists( 'understrap_widget_override' ) ) {

	function understrap_widget_override( $instance, $widget_class, $args ) {

		// Only edit for 'hero' sidebar
		if( isset($args['id']) && $args['id'] === 'hero' ){

			// Only allow WP_Widget_Media_Image's in this widget
			if(get_class($widget_class) !== 'WP_Widget_Media_Image'){
				return false;
			}

			// render image
			if($instance['width'] === 0) $instance['width'] = '';
			if($instance['height'] === 0) $instance['height'] = '';

			$image = sprintf(
				'<img class="%1$s" src="%2$s" alt="%3$s" width="%4$s" height="%5$s" />',
				esc_attr( $instance['image_classes'] ),
				esc_url( $instance['url'] ),
				esc_attr( $instance['alt'] ),
				esc_attr( $instance['width'] ),
				esc_attr( $instance['height'] )
			);

			$title = '';

			if( !empty( $instance['title'] ) ) {
				
				if( empty($args['before_title']) ) $args['before_title'] = '<h5>';
				if( empty($args['after_title']) ) $args['after_title'] = '<h5>';

				$title = sprintf('%1$s%2$s%3$s', $args['before_title'], $instance['title'], $args['after_title']);
			}

			$caption = '';

			if( !empty( $instance['caption'] ) ) {
				$caption = sprintf('<p>%1$s</p>', $instance['caption']);
			}

			$link = '';
			if( !empty( $instance['link_url'] ) ){
				$target = '';
				if( $instance['link_target_blank'] ){
					$target = 'target="_blank"';
				}

				$link = sprintf('<p><a class="btn btn-secondary" %3$s href="%1$s">%2$s</a></p>', $instance['link_url'], $instance['image_title'], $target);
			}

			$image_text = '';
			if(!empty($title) || !empty($caption) || !empty($link)){
				$image_text = sprintf('<div class="carousel-caption d-none d-md-block">%1$s%2$s%3$s</div>', $title, $caption, $link);
			}

			echo sprintf(' %1$s %2$s %3$s %4$s',
				$args['before_widget'], // before widget
				$image,
				$image_text,
				$args['after_widget'],	// after widget
			);
			
			return false;
		}
		return $instance;
	}

} // endif function_exists( 'understrap_widget_override' ).

if( !function_exists( 'scoutstrap_register_widgets' ) ){

	function scoutstrap_register_widgets(){

		register_widget('Group_Finder_Widget');
		register_widget('Volunteer_Widget');

	}

	
	add_action( 'widgets_init', 'scoutstrap_register_widgets' );
}

class Volunteer_Widget extends WP_Widget{
	private static $_id = 'volunteer';
	private static $_name = 'Volunteer';
	private static $_description = 'Volunteer widget to get adults involved';

	function __construct(){
		parent::__construct(self::$_id, self::$_name, self::$_description);
	}

	public function widget( $arvs, $instance ){
		global $post;

		$section = get_field('section', $post->ID) ?? 'scouts';
		$section_name = ucfirst($section);
		?>
		<div class="bg-navy p-3 widget text-light mb-3">
			<h5>Volunteer with <?= $instance['group_name'] ?? get_bloginfo('sitename') ?></h5>
			<p>
				All of our leaders are trained volunteers working to make <?= $section_name ?> the best it can be, 
				but we don’t just need swashbuckling adventurers to lead our expeditions. 
				We also need tidy-uppers and tea-makers and great listeners from all walks of life – for as much or as little time as they can spare.
			</p>
			<p>
				<a class="btn btn-outline-light" href="<?= get_permalink($instance['link']) ?? 'https://scouts.org.uk/join' ?>">Learn about Volunteering</a>
			</p>
		</div>
		<?php
		return;
	}

	public function form( $instance ){
		$pages = get_pages();
		?>
		<p>
			<label for="<?= $this->get_field_id('group_name') ?>">Group Name</label>
			<input class="widefat" id="<?= $this->get_field_id( 'group_name' ); ?>" name="<?= $this->get_field_name( 'group_name' ); ?>" type="text" value="<?= $instance['group_name'] ?? get_bloginfo('sitename') ?>" />
		</p>
		<p>
			<label for="<?= $this->get_field_id('link') ?>">Link: </label>
			<select class="widefat" id="<?= $this->get_field_id('link') ?>" name="<?= $this->get_field_name('link') ?>">
			<?php foreach($pages as $page): ?>
				<option <?= (int)$instance['link'] === $page->ID ? 'selected="selected"' : '' ?> value="<?= $page->ID ?>"><?= $page->post_title ?></option>
			<?php endforeach; ?>
			</select>
		</p>

		<?php 
	}

	public function update( $new_instance, $old_instance ){
		return $new_instance;
	}
}

class Group_Finder_Widget extends WP_Widget {

	private static $_id = 'group_finder';
	private static $_name = 'Group Finder Widget';
	private static $_description = 'Simple widget which displays a search for to find your local group.';

	function __construct() {
		parent::__construct(
			// Base ID of your widget
			self::$_id, 
			
			// Widget name will appear in UI
			__(self::$_name, 'scoutstrap'), 
			
			// Widget description
			array( 'description' => __( self::$_description, 'scoutstrap' ), ) 
		);
	}

	public function widget( $args, $instance ) {
		?>
<div class="bg-teal p-3 widget text-light mb-3">
	<h3 class="p-3">Find your local group</h3>
	<form class="flex-shrink-0 d-flex bg-white m-3" action="https://scouts.org.uk/groups/" method="GET" target="_blank">
		<div class="form-group w-100 m-0">
			<label for="input_location" class="sr-only">Location</label>
			<input id="input_location" type="text" placeholder="Postcode or location" name="loc" size="25" autocomplete="off" class="form-control border-0 bg-white h-100">
		</div>
		<button type="submit" class="btn btn-lg btn-teal border-white">
			Go
		</button>
	</form>
</div>
		<?php 
	}

}
