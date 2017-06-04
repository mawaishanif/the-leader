document.addEventListener("DOMContentLoaded",function(){
	"use strict";
	console.clear();

	// fade out when clicks on external link - smooth animation :)
	jQuery('a.external').click(function(e) {
		e.preventDefault();
		var link = jQuery(this).attr('href');
		jQuery('body').fadeOut('50', function() {
			window.location.href = link; 
		});
	});

});
