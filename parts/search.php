<div id="searchcollapse" <?php if(!is_search()): ?>style="display: none;"<?php endif; ?> aria-labelledby="searchHeading" role="tabpanel" class="header-search bg-light">
    <div class="container">
		<form class="d-flex align-items-center py-4" method="GET" id="header_searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		
            <input aria-label="Search..." name="s" <?php if(is_search()): ?> value="<?= the_search_query() ?>" <?php endif; ?> placeholder="I'm searching for..." type="text" class="flex-grow px-4 py-4 border-transparent form-control form-control-lg bg-white">
            <button type="reset" class="btn btn-cancel" <?php if(!is_search()): ?>style="display: none;"<?php endif; ?>>
				<i class="fa fa-times"></i>
            </button>
            <button type="submit" aria-label="Submit search" class="btn btn-submit">
				<i class="fa fa-search"></i>
            </button>
        </form>
    </div>
</div>