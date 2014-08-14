var Frontend;

;(function(global, document, $, skrollr){

    "use strict";

    Frontend = global.Frontend = global.Frontend || {};

    Frontend.initial_pos = [];

    Frontend.$window = $(window);

	Frontend.sticky_navigation_offset_top = 0;

	Frontend.env = '';

	Frontend.init = function(){
		//Headings
		$('.section').each(function(i,e){
			Frontend.initial_pos.push({name:e.id,value:$('#'+e.id).offset().top});
		});

		//scroll event
		$(window).scroll(function() {
			Frontend.update_menu();
			Frontend.update_nav();
		});

		Frontend.sticky_navigation_offset_top = $('.navbar-default').offset().top;

		Frontend.update_nav();

		Frontend.scrollToLink();

		Frontend.env = this.getBootstrapEnvironment();

		if($.inArray( Frontend.env, ["ExtraSmall", "Small"] ) < 0){
			skrollr.init({
				forceHeight: false,
			});
		} else {
			$('.section').css('background-size','cover');
		}

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

	Frontend.getBootstrapEnvironment = function() {
	    var envs = ["ExtraSmall", "Small", "Medium", "Large"];
	    var envValues = ["xs", "sm", "md", "lg"];

	    var $el = $('<div>');
	    $el.appendTo($('body'));

	    for (var i = envValues.length - 1; i >= 0; i--) {
	        var envVal = envValues[i];
	        $el.addClass('hidden-'+envVal);
	        if ($el.is(':hidden')) {
	            $el.remove();
	            return envs[i]
	        }
	    }
	};

})(window, document,jQuery,skrollr);


$(document).ready(function(){

	Frontend.init();

});

