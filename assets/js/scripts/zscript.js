document.addEventListener("DOMContentLoaded",function(){
	"use strict";
	console.clear();

	jQuery('.menu-item-has-children').children('a').append('<span class="icon ti-angle-down">')
	jQuery('.menu-item-has-children').click(function(e) {
		e.preventDefault();
	});
	jQuery('.sub-menu').addClass('align-center');

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
			jQuery('.menu-item-has-children').addClass('on-js');
		}else{
			jQuery('.menu-item-has-children').removeClass('on-js');
		}
	}
	menuController();	
	jQuery(window).resize(function () {
		menuController();	
	});
	jQuery('.showsearch').click(function() {
		jQuery('#searchbar').toggleClass('display_search');
	});

	jQuery('.close_search').click(function() {
		jQuery('#searchbar').toggleClass('display_search');
	});

	jQuery('#menu-trigger').on("click",function(e){
		e.preventDefault();
		jQuery(this).find("span.icon" ).toggleClass("ti-close");
		jQuery(this).siblings('.menu-primary-menu-container').children('#primary-menu').slideToggle();
	});

	jQuery('.menu-item-has-children.on-js').on("click",function(e){
		e.preventDefault();
		jQuery(this).find("span.icon" ).toggleClass("ti-angle-down");
		jQuery(this).find("span.icon" ).toggleClass("ti-angle-up");
		jQuery(this).children('.sub-menu').slideToggle();
	});
});
