var Frontend;

;(function(global, document, $, skrollr){

    "use strict";

    Frontend = global.Frontend = global.Frontend || {};

    Frontend.initial_pos = [];

    Frontend.$window = $(window);

	Frontend.sticky_navigation_offset_top = 0;

	Frontend.init = function(){
		//Headings
		$('.section').each(function(i,e){
			Frontend.initial_pos.push({name:e.id,value:$('#'+e.id).offset().top});
			//Frontend.parallax(e);
		});

		//scroll event
		$(window).scroll(function() {
			Frontend.update_menu();
			Frontend.update_nav();
		});

		Frontend.sticky_navigation_offset_top = $('.navbar-default').offset().top;

		Frontend.update_nav();

		Frontend.scrollToLink();

		skrollr.init({
			forceHeight: false,
		});

	};

	Frontend.parallax = function(obj){
		var $scroll = $(obj);

		$(window).scroll(function() {
			var yPos = -(Frontend.$window.scrollTop() / 10);
			var coords = '50% '+ yPos + 'px';
			$scroll.css({ backgroundPosition: coords });
		});
	};

	Frontend.update_menu = function(){
		var scroll_top = $(window).scrollTop();

		var sel = '';
		$.each(this.initial_pos,function(i,e){
			if (scroll_top > e.value-100) { 
				sel = e.name;
			}
		});
		$('.nav a').removeClass('selected');
		if($(".nav a[href=#"+sel+"]").size()){
			$(".nav a[href=#"+sel+"], #"+sel+"-anchor").addClass('selected');
		}
	};

	Frontend.update_nav = function(){
		var scroll_top = Frontend.$window.scrollTop();

		if (scroll_top > Frontend.sticky_navigation_offset_top) { 
			$('.navbar-default').addClass('sticky').css({ 'position': 'fixed', 'top':0, 'left':0 });
		} else {
			$('.navbar-default').removeClass('sticky').css({ 'position': 'relative' }); 
		}   
	};

	Frontend.scrollToLink = function(){
		$('a.scrollToLink').click(function () {
	        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
	            var $target = $(this.hash);
	            $target = $target.length && $target;
	            $('body').click(); // quita el foco del menú.
	            if ($target.length) {
	            	if($('.navbar-header button').is(':visible')) {
					    $('.navbar-header button').click();
					}
	            	var offset = ($(this).hasClass('scrollToLinkSecundaria'))?-100:100;
	                var targetOffset = $target.offset().top + offset;
	                $('html,body').animate({ scrollTop: targetOffset }, 1000); //set scroll speed here
	                return false;
	            }
	        }
	    });
	};

})(window, document,jQuery,skrollr);


$(document).ready(function(){

	Frontend.init();

});

