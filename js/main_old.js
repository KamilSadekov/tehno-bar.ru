"use strict";$(function(){$(".header__nav_item").hover(function(){$(this).find("ul").length>0&&$(".menu-bg").show()},function(){$(".menu-bg").hide()}),$(".lead__slider .owl-carousel").owlCarousel({margin:10,nav:!0,items:1}),
	$(".slider .owl-carousel").owlCarousel({
		margin: 90,
		nav: !0,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 4
			},
			1700: {
				items: 5
			}
		}})});