document.addEventListener("DOMContentLoaded",function(){
	"use strict";
	console.clear();

	// fade out when clicks on external link - smooth animation :)
	$('a.external').click(function(e) {
		e.preventDefault();
		var link = $(this).attr('href');
		$('body').fadeOut('50', function() {
			window.location.href = link; 
		});
	});

});
