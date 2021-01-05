"use strict";
$(document).ready(function(){

	// wow js
	new WOW().init(); 

	//fixed navigation
	var nav = $('nav');
	$(window).scroll(function () {
		if ($(this).scrollTop() > 0) {
			nav.addClass("fixed-nav");
		} else {
			nav.removeClass("fixed-nav");
			// nav.removeClass("container");
		}
	});

	//mobile menu
	$(".menu-button").on('click', function(){
		$(".mobile-menu").toggleClass("active-menu");
	});
	$(".mobile-menu:before").on('click', function(){
		$(".mobile-menu").toggleClass("active-menu");
	});
	$(".close-menu-button").on('click', function(){
		$(".mobile-menu").toggleClass("active-menu");
	});
	$(document.body).on('click', function(e) {
		if (!$(e.target).closest(".active-menu, .menu-button").length) {
			$('.mobile-menu').removeClass("active-menu");
		}
		e.stopPropagation();
	});

	// Input animation on login and sign up forms
	if ($(".mat-input").length > 0) {
		$(".mat-input").on('focus', function(){
			$(this).parent().addClass("is-active is-completed");
		});

		$(".mat-input").focusout(function(){
			if($(this).val() === "")
				$(this).parent().removeClass("is-completed");
			$(this).parent().removeClass("is-active");
		})
	};

	//back to top button
	if ($('#back-to-top').length > 0) {
	    var scrollTrigger = 1080, // px
	        backToTop = function () {
	            var scrollTop = $(window).scrollTop();
	            if (scrollTop > scrollTrigger) {
	                $('#back-to-top').addClass('show');
	            } else {
	                $('#back-to-top').removeClass('show');
	            }
	        };
	    backToTop();
	    $(window).on('scroll', function () {
	        backToTop();
	    });
	};

	//faq
	$(".dropdown-list .drop-content").slideUp(0);
	$(".dropdown-list .drop-title").on('click', function(){
		if( $(this).parent().hasClass("active-drop") ){
			$(".dropdown-list .drop-content").slideUp(300);
			$(".dropdown-list").removeClass("active-drop");
		}else{
			$(this).parent().find(".drop-content").slideDown(300);
			$(this).parent().addClass("active-drop");
		}
		$(".active-drop").not( $(this).parent() ).removeClass("active-drop");
		$(".drop-content").not( $(this).parent().find(".drop-content") ).slideUp(300);	
	});
	$(".dropdown-list.active-drop").on('click', function(){
		$(this).removeClass("active-drop");
		$(this).find(".drop-content").slideUp(300);
	});
	$(document.body).on('click', function(e) {
		if (!$(e.target).closest(".drop-content, .drop-title").length) {
			$(".dropdown-list .drop-content").slideUp(300);
			$(".dropdown-list").removeClass("active-drop");
		}
		e.stopPropagation();
	});
	if ($("#filterOptions").length > 0) {
		$('#filterOptions li a').on('click', function(){
			var ourClass=$(this).attr('class');
			$('#filterOptions li').removeClass('active');
			$(this).parent().addClass('active');
			if(ourClass=='all'){
				$('#ourHolder').children('article.blog-card').show();
			}
			else{
				$('#ourHolder').children('article:not(.'+ourClass+')').hide();
				$('#ourHolder').children('article.'+ourClass).show();
			}
			return false;
		});
	};	
});
//utils for charts
(function(global) {
	var Months = [
		'January',
		'February',
		'March',
		'April',
		'May',
		'June',
		'July',
		'August',
		'September',
		'October',
		'November',
		'December'
	];
	var Samples = global.Samples || (global.Samples = {});
	Samples.utils = {
		srand: function(seed) {
			this._seed = seed;
		},
		rand: function(min, max) {
			var seed = this._seed;
			min = min === undefined ? 0 : min;
			max = max === undefined ? 1 : max;
			this._seed = (seed * 9301 + 49297) % 233280;
			return min + (this._seed / 233280) * (max - min);
		},
		numbers: function(config) {
			var cfg = config || {};
			var min = cfg.min || 0;
			var max = cfg.max || 1;
			var from = cfg.from || [];
			var count = cfg.count || 8;
			var decimals = cfg.decimals || 8;
			var continuity = cfg.continuity || 1;
			var dfactor = Math.pow(10, decimals) || 0;
			var data = [];
			var i, value;
			for (i = 0; i < count; ++i) {
				value = (from[i] || 0) + this.rand(min, max);
				if (this.rand() <= continuity) {
					data.push(Math.round(dfactor * value) / dfactor);
				} else {
					data.push(null);
				}
			}
			return data;
		},
		labels: function(config) {
			var cfg = config || {};
			var min = cfg.min || 0;
			var max = cfg.max || 100;
			var count = cfg.count || 8;
			var step = (max - min) / count;
			var decimals = cfg.decimals || 8;
			var dfactor = Math.pow(10, decimals) || 0;
			var prefix = cfg.prefix || '';
			var values = [];
			var i;
			for (i = min; i < max; i += step) {
				values.push(prefix + Math.round(dfactor * i) / dfactor);
			}
			return values;
		},
		months: function(config) {
			var cfg = config || {};
			var count = cfg.count || 12;
			var section = cfg.section;
			var values = [];
			var i, value;
			for (i = 0; i < count; ++i) {
				value = Months[Math.ceil(i) % 12];
				values.push(value.substring(0, section));
			}
			return values;
		},
	};
}(this));
