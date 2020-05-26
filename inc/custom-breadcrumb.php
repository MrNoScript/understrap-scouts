<?php

if( !function_exists('understrap_custom_breadcrumb') ){

    function understrap_custom_breadcrumb(){
		echo '<div class="bg-light">';
		echo '<nav class="d-print-none container">';
		echo '<ol class="breadcrumb bg-transparent">';

		echo '<li class="breadcrumb-item"><a href="' . home_url() . '">Home</a></li>';

		if(is_home()){
			echo '<li class="breadcrumb-item active"><a href="' . get_permalink( get_option( 'page_for_posts' ) ) . '">Blog</a></li>';
		} elseif (is_category() || is_single()) {
			$categories = get_the_category();

			foreach($categories as $category){
				echo '<li class="breadcrumb-item">';
					echo '<a href="' . get_category_link($category) . '">' . $category->name . '</a>';
				echo '</li>';
			}

			if (is_single()) {
				echo '<li class="breadcrumb-item active"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
			}
		} elseif (is_page()) {
			$ancestors = array_reverse(get_post_ancestors(the_post()));
			foreach($ancestors as $ancestor){
				echo '<li class="breadcrumb-item active"><a href="' . get_the_permalink($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
			}
			
			echo '<li class="breadcrumb-item active"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';

		} elseif (is_search()) {
			echo '<li class="breadcrumb-item active"><a href="#">Search Results for: ';
				echo '<span class="text-dark">';
				the_search_query();
				echo '</span>';
			echo '</a></li>';
		} elseif (is_404()){
			echo '<li class="breadcrumb-item active"><span>Not Found...</span></li>';
		} elseif (is_archive()){
			echo '<li class="breadcrumb-item active">';
			echo get_the_archive_title();
			the_archive_description();
			echo '</li>';
		} elseif (is_author()){
			global $author;

			if ( isset( $_GET['author_name'] ) ) {
				$curauth = get_user_by( 'slug', $author_name );
			} else {
				$curauth = get_userdata( intval( $author ) );
			}

			echo '<li class="breadcrumb-item active"><span>Authors</span></li>';

			if($curauth){
				echo '<li class="breadcrumb-item active"><span>' . esc_html( $curauth->nickname ) . '</span></li>';
			} else {
				echo '<li class="breadcrumb-item active"><span>Not Found...</span></li>';
			}

		}

		echo '</ol>';
		echo '</nav>';
		echo '</div>';
		rewind_posts();
        return;
    }
} // endif ( !function_exists(''))

add_action('template_redirect', 'redirect_single_post');

function redirect_single_post() {
  if (is_search()) {
    global $wp_query;
    if ($wp_query->post_count == 1) {
        wp_redirect( get_permalink( $wp_query->posts['0']->ID ) );
        exit();
    }
  }
}