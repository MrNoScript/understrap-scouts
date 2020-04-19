<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
} 
?>
<div class="bg-teal p-5 mb-3 text-light">
    <div class="container px-5 d-flex flex-column justify-content-center align-items-center flex-md-row">
        <div class="flex-shrink-0 m-3">
            <h2 class="h4">
                Find your local Group
            </h2>
            <span title="http://scouts.org.uk">This will take you to The Scouts website</span>
        </div>
        <form class="flex-shrink-0 d-flex bg-white m-3" action="https://scouts.org.uk/groups/" method="GET" target="_blank">
            <div class="form-group m-0">
                <label for="input_location" class="sr-only">Location</label>
                <input id="input_location" type="text" placeholder="Postcode or location" name="loc" size="25" autocomplete="off" class="form-control border-0 bg-white h-100">
            </div>
            <button type="submit" class="btn btn-lg btn-teal border-white">
                Go
            </button>
        </form>
    </div>
</div>