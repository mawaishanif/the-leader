/**
 * Pilpil v1.0.0 - Progressive Image Loading
 * @link https://zafree.github.io/pilpil
 * @copyright 2015-2016 Zafree
 * @license MIT
 */
 ;(function() {
 	'use strict';
 	

	// set progressive image loading
	var progressiveMedias = document.querySelectorAll('.progressiveMedia');
	for (var i = 0; i < progressiveMedias.length; i++) {
		loadImage(progressiveMedias[i]);
	}

	// global function
	function loadImage(progressiveMedia) {

		// calculate aspect ratio
		// for the aspectRatioPlaceholder-fill
		// that helps to set a fixed fill for loading images
		var width = progressiveMedia.dataset.width,
		height = progressiveMedia.dataset.height,
		fill = height / width * 100,
		placeholderFill = progressiveMedia.previousElementSibling;

		placeholderFill.setAttribute('style', 'padding-bottom:'+fill+'%;');



		// get thumbnail height wight
		// make canvas fun part
		var thumbnail = progressiveMedia.querySelector('.progressiveMedia-thumbnail'),
		smImageWidth = thumbnail.width,
		smImageheight = thumbnail.height,

		canvas = progressiveMedia.querySelector('.progressiveMedia-canvas'),
		context = canvas.getContext('2d');

		canvas.height = smImageheight;
		canvas.width = smImageWidth;

		var img = new Image();
		img.src = thumbnail.src;

		img.onload = function () {
			// context.drawImage(img, 0, 0);
			// draw canvas
			var canvasImage = new CanvasImage(canvas, img);
			canvasImage.blur(2);

			// load canvas visible
			progressiveMedia.classList.add('is-canvasLoaded');
		};
	}

	//Show images when in viewpoint
	jQuery(window).on('load',function(){
		//Window width & height
		var viewpointWidth = jQuery(window).width(),
		viewpointHeight = jQuery(window).height(),
		//Document Top pos & Left pos
		documentScrollTop = jQuery(document).scrollTop(),
		documentScrollLeft = jQuery(document).scrollLeft(),
		//Document Positions
		minTop = documentScrollTop,
		maxTop = documentScrollTop + viewpointHeight,
		minLeft = documentScrollLeft,
		maxLeft = documentScrollLeft + viewpointWidth;

		// grab data-src from original image
		// from progressiveMedia-image
		//Loop for each image
		var all_images = jQuery(".progressiveMedia-image");
		all_images.each(function(index){
			var $self = jQuery(this),
			$selfOffset = $self.offset(),
			$imageSrc = $self.data("src"),
			$imageSrc_inCSS = 'url("'+ $imageSrc +'")',
			$notAlreadyLoaded;

			if ($self.css('backgroundImage') == $imageSrc_inCSS) {
				$notAlreadyLoaded = true;
			}else{
				$notAlreadyLoaded = false;
			}

			if (!$imageSrc=="") {
				function elementScrolled(elem){
					var docViewTop = jQuery(window).scrollTop();
					var docViewBottom = docViewTop + jQuery(window).height();
					var elemTop = jQuery(elem).offset().top;
					return ((elemTop <= docViewBottom) && (elemTop >= docViewTop));
				}
				jQuery(window).scroll(function(){
    					// This is then function used to detect if the element is scrolled into view
    					if(elementScrolled($self)) {
    						$notAlreadyLoaded = ($self.css('backgroundImage') == $imageSrc_inCSS);
    						if (!$notAlreadyLoaded) {
    							$self.css({"background-image":'url("'+ $imageSrc +'")'})
    							$self.parent().addClass('is-imageLoaded');
    						}
    					}
    				});
			}
		});
	});

})();


// canvas blur function
CanvasImage = function (e, t) {
	this.image = t;
	this.element = e;
	e.width = t.width;
	e.height = t.height;
	this.context = e.getContext('2d');
	this.context.drawImage(t, 0, 0);
};

CanvasImage.prototype = {
	blur:function(e) {
		this.context.globalAlpha = 0.5;
		for(var t = -e; t <= e; t += 2) {
			for(var n = -e; n <= e; n += 2) {
				this.context.drawImage(this.element, n, t);
				var blob = n >= 0 && t >= 0 && this.context.drawImage(this.element, -(n -1), -(t-1));
			}
		}
	}
}