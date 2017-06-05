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


		//Show images when in viewpoint
		jQuery(window).on('scroll load resize',function(){
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
			jQuery(".progressiveMedia-image").each(function(){
				var $self = jQuery(this),
				$selfOffset = $self.offset(),
				$notLoadedYet = $self.data("src");
				if (!$notLoadedYet=="") {
					// onload image visible
					if(($selfOffset.top > minTop && $selfOffset.top < maxTop) && ($selfOffset.left > minLeft &&$selfOffset.left < maxLeft)) {
						// onload image visible
						setTimeout(function(){
							$self.attr('src',$self.attr('data-src'));
							setTimeout(function(){
								$self.parent().addClass('is-imageLoaded');
							}, 100);
						},100);
					}
				}
			});
		});
	}

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