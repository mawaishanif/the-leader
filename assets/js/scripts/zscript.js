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

	function menuController() {
		if(jQuery(window).width() <= 768){
			jQuery('.has-submenu').addClass('on-js');
		}else{
			jQuery('.has-submenu').removeClass('on-js');
		}
	}
	setInterval(menuController, 100);
	jQuery('.showsearch').click(function() {
		jQuery('#searchbar').toggleClass('display_search');
	});

	jQuery('.close_search').click(function() {
		jQuery('#searchbar').toggleClass('display_search');
	});

	jQuery('#menu-trigger').on("click",function(e){
		e.preventDefault();
		jQuery(this).find("span.icon" ).toggleClass("ti-close");
		jQuery(this).siblings('.navigation').slideToggle();
	});

	jQuery('.has-submenu.on-js').on("click",function(e){
		e.preventDefault();
		jQuery(this).find("span.icon" ).toggleClass("ti-angle-down");
		jQuery(this).find("span.icon" ).toggleClass("ti-angle-up");
		jQuery(this).children('.submenu').slideToggle();
	});
});
