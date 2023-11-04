(function($) {
  'use strict';

    $( document ).ready(function() {
		if ( $('.slider-wrapper').hasClass("section-18") ) {
            var section18 = tns({
                container: '.main-slider',
                ltr: $("html").attr("dir") == 'ltr' ? true : false,
                items: 1,
                controlsContainer: "#customize-controls",
                navContainer: "#customize-thumbnails",
                navAsThumbnails: true,
                loop: true,
                mouseDrag: true,
                rewind: false,
                swipeAngle: false,
                autoHeight: true,
                lazyload: true,
                lazyloadSelector: ".tns-lazy",
                speed: 1000,
                autoplay: true,
                autoplayButtonOutput: false,
                autoplayTimeout: 9000,
            });
        }
    });

}(jQuery));