(function($){

	"use strict";

	function isMobile(){
		return (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent));
	}

	// Masonry
	if(!isMobile()){
		var $masonryItems = $('.home-list');
		$masonryItems.imagesLoaded( function(){
			$masonryItems.masonry({
				itemSelector: '.item',
				columnWidth: 1
			});
		});
	}

	function jEqualize(elements, columns) {
		var x = columns;
		function equalize(items){
			var h = 0;
			items.height('').each(function(){
				var itemH = $(this).height();
				if (itemH > h) { h = itemH; }
			});
			items.height(h);
		}

		for(var i = 0; i < elements.length; i+=x) {
			console.log('ok');
			equalize(elements.slice(i, i + x));
		}
	};
	// jEqualize($('.item-sobre'), 2);

	// Anchor links
	// $('.anchor-link').on('click', function(e){
	// 	// console.log( $($(this).attr('href')).offset().top );
	// 	$("html, body").animate({ scrollTop: $($(this).attr('href')).offset().top }, 900);
	// 	e.preventDefault();
	// });

	// Menu
	// var body = $('body'),
	// 	menu = body.find('.menu');
	// menu.on('click', function(e) {
	// 	if( e.target === this ){
	// 		body.removeClass('open');
	// 	}
	// })
	// .find('.icon-mobile').on('click',function(){
	// 	body.toggleClass('open');
	// });

	// Fancybox
	$('.fancybox').fancybox({
		padding: 10,
		helpers : {
			title: {
				type: 'inside'
			},
			overlay : {
				locked: false,
				css : {
					'background' : 'rgba(50,50,50,0.7)'
				}
			}
		}
	});

	var portfolioInfo = $('#portfolio-info'),
		fixPortfolioInfo = function(){
			var $window = $(window),
					windowScroll = $window.scrollTop(),
					portfolioInfoPosition = portfolioInfo.offset().top,
					fixingInfo = function(windowPosition){
						if( windowPosition > portfolioInfoPosition && !portfolioInfo.hasClass('is-fixed')){
							portfolioInfo.addClass('is-fixed');
						} else if( windowPosition < portfolioInfoPosition && portfolioInfo.hasClass('is-fixed')) {
							portfolioInfo.removeClass('is-fixed');
						}
					};
			fixingInfo(windowScroll);
			$window.scroll(function(){
				windowScroll = $window.scrollTop();
				// console.log(windowScroll+' P: '+ portfolioInfoPosition);
				fixingInfo(windowScroll);
			});
		};
	if(portfolioInfo.length && !isMobile()){
		fixPortfolioInfo();
	}

})(jQuery);
