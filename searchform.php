<?php
/**
 * The template for displaying search forms
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="header-search main-search p-0 m-0">
	<form class="d-flex align-items-center py-4" method="GET" id="part_searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	
		<input aria-label="Search..." name="s" <?php if(is_search()): ?> value="<?= the_search_query() ?>" <?php endif; ?> placeholder="I'm searching for..." type="text" class="flex-grow px-4 py-4 border-transparent form-control form-control-lg bg-white">
		<button type="submit" aria-label="Submit search" class="btn btn-submit">
			<i class="fa fa-search"></i>
		</button>
	</form>
</div>
