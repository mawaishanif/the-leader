document.addEventListener("DOMContentLoaded",function(){
	"use strict";
	console.clear();


	function disableBodyScroll(){
		var $html = jQuery('html');
		var windowWidth = window.innerWidth;

		if (!windowWidth)
		{
			var documentElementRect = document.documentElement.getBoundingClientRect();
			windowWidth = documentElementRect.right - Math.abs(documentElementRect.left);
		}

		var isOverflowing = document.body.clientWidth < windowWidth;


    	// measuring Scrollbar
    	var $body = jQuery('body');
    	var scrollDiv = document.createElement('div');
    	scrollDiv.className = 'scrollbar-measure';

    	$body.append(scrollDiv);
    	var scrollbarWidth = scrollDiv.offsetWidth - scrollDiv.clientWidth;
    	$body[0].removeChild(scrollDiv);


	// disabling BodyScroll
	$html.css('overflow', 'hidden');
	$body.css('overflow', 'hidden');
	if (isOverflowing) {$html.css('padding-right', scrollbarWidth);$body.css('padding-right', scrollbarWidth);}
}



function enableBodyScroll() {
	// enabling BodyScroll
	jQuery('html').css({ 'overflow': '', 'padding-right': '' });
	jQuery('body').css({ 'overflow': '', 'padding-right': '' });
}


	// fade out when clicks on external link - smooth animation :)
	jQuery('a.external-link').click(function(e) {
		e.preventDefault();
		var link = jQuery(this).attr('href');
		jQuery('body').fadeOut('50', function() {
			window.location.href = link; 
		});
	});








/*

	jQuery('.menu-item-has-children').click(function(e) {
		e.preventDefault();
	});
	jQuery('.sub-menu').addClass('align-center');
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


	*/









	jQuery('.menu-item-has-children').children('a').append('<span class="icon ti-angle-down">')

	jQuery('.showsearch').click(function(e) {
		e.preventDefault();
		jQuery('#searchbar').toggleClass('display_search');
	});

	jQuery('.close_search').click(function(e) {
		e.preventDefault();
		jQuery('#searchbar').toggleClass('display_search');
	});

	jQuery('.showdrawer').click(function(e) { 
		e.preventDefault();
		disableBodyScroll();
		jQuery('.main_drawer').toggleClass('show');
		jQuery('.drawer-overlay').toggleClass('show');
	});

	jQuery('.closedrawer').click(function(e) {
		e.preventDefault();
		enableBodyScroll();
		jQuery('.main_drawer').toggleClass('show');
		jQuery('.drawer-overlay').toggleClass('show');
	});
	jQuery(document).on('keyup', function(e) {
		if (e.keyCode === 27) {
			enableBodyScroll();
			jQuery('.drawer-overlay').removeClass('show');
			jQuery('.main_drawer').removeClass('show');
			$(document).off('keyup');
			$(".drawer").off('click');
		}
	});

	jQuery(".drawer-overlay").click(function() {
		enableBodyScroll();
		jQuery('.drawer-overlay').toggleClass('show');
		jQuery('.main_drawer').toggleClass('show');
	});

	jQuery(".drawer li.menu-item-has-children > a").on("click",function(e){
		e.preventDefault();
		var triggerer = jQuery(this).parent();
		jQuery("a .icon", triggerer ).toggleClass("ti-angle-down");
		jQuery("a .icon", triggerer ).toggleClass("ti-angle-up");
		jQuery(".sub-menu", triggerer ).slideToggle();
	});
});
