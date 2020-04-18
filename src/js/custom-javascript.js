(function($){
	$("#toggle_search_form").click(function(e){
		e.preventDefault();
		e.stopPropagation();
		$("#searchcollapse").slideToggle(300, function(){
			if($("#header_searchform [name='s']").is(":visible")){
				$("#header_searchform [name='s']").focus();
			}
		});
	})
	$("#header_searchform [name='s']").on('keyup', function(e){
		if($(this).val() !== ""){
			$(this).next().show();
		} else {
			$(this).next().hide();
		}
	})
    $("#header_searchform [type='reset']").click(function(e){
		e.preventDefault();
		e.stopPropagation();
        $("#header_searchform [name='s']").val("");
        $("#header_searchform [name='s']").focus();
    })

	$(".wrapper").click(function(){
		$("#searchcollapse").slideUp(300);
	})

	
	window.cookieconsent.initialise({
		"palette": {
			"popup": {
				"background": "#ffe626"
			},
			"button": {
				"background": "#006cdf"
			}
		},
		"position": "bottom-left",
		"type": "opt-out",
		"content": {
			"message": "This website uses cookies",
			"allow": "Allow",
			"deny": "Deny",
			"href": "/cookies",
		}
	});
	
})(jQuery);