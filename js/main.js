"use strict";
$(function() {
	function e() {
		$("body").css("overflow", "auto"), 
		$("body").css("overflow-x", "hidden"), 
		$(".overflow").removeClass("show"),
		$(".overflow-colors").removeClass("show"),
		$(".cart-popup").removeClass("show"), 
		$(".cart-popup-colors").removeClass("show"), 
		$(".catalog__left").removeClass("show")
	}
		$(".catalog__actions_filter").click(function(e) {
			e.preventDefault(), 
			$(".overflow").addClass("show"), 
			$(".catalog__left").addClass("show"), 
			$("body").css("overflow", "hidden")
		}), 
		$(".catalog__left_clear").click(function(t) {
			t.preventDefault(), e()
		}), 
		$(".js-open-cart").click(function(e) {
			e.preventDefault(), 
			$(".overflow").addClass("show"), 
			$(".cart-popup").addClass("show"), 
			$("body").css("overflow", "hidden")
		}),
		$(".js-open-cart-colors").click(function(e) {
			e.preventDefault(), 
			$(".overflow-colors").addClass("show"), 
			$(".cart-popup-colors").addClass("show"), 
			$("body").css("overflow", "hidden")
		}), 

		$(".overflow, .overflow-colors, .cart-popup__close, .close-button, .js-filter-close").click(function(t) {
			t.preventDefault(), e()
		}), 
		$(".cart-popup__subtitle").click(function(e) {
			e.preventDefault(), $(this).toggleClass("active").next(".cart-popup__wrapper").toggleClass("active"), $(this).parents(".cart-popup__tabs").siblings().find(".cart-popup__subtitle, .cart-popup__wrapper").removeClass("active")
		}), 
		$(".cart__tabs_link").click(function(e) {

			e.preventDefault();

			if ($(window).width() > 767) {
				$(this).addClass("active").siblings().removeClass("active");
			} else {
				$(this).toggleClass("active");
			}

		}), $(".header__nav_item").hover(function() {
			$(this).find("ul").length > 0 && $(".menu-bg").show()
		}, function() {
			$(".menu-bg").hide()
		}), $(".lead__slider .owl-carousel").owlCarousel({
			margin: 10,
			nav: !0,
			items: 1
		}), $(".slider .owl-carousel").owlCarousel({
			margin: 90,
			nav: !0,
			responsive: {
				0: {
					margin: 30,
					items: 1
				},
				525: {
					margin: 40,
					items: 2
				},
				840: {
					margin: 60,
					items: 3
				},
				1100: {
					items: 4
				},
				1500: {
					items: 5
				}
			}
		}), $(".prod-partners__list").owlCarousel({
			margin: 50,
			nav: !0,
			responsive: {
				0: {
					margin: 30,
					items: 2
				},
				525: {
					margin: 40,
					items: 3
				},
				840: {
					margin: 60,
					items: 5
				},
				1100: {
					items: 6
				},
				1500: {
					items: 7
				}
			}
		}), $(".header__top_toggle").on("click", function(e) {
			return e.preventDefault(), $(".mobile").toggleClass("active"), $("body").toggleClass("body-lock"), $(".mobile").css("top", $(".header").outerHeight()), !1
		}), $(".catalog__show").on("click", function(e) {
			e.preventDefault(), $(this).toggleClass("active"), $(".catalog__filter").stop().slideToggle()
		}), $(".filter__toggle").on("click", function(e) {
			e.preventDefault(), $(this).toggleClass("active"), $(this).next(".filter__item").stop().slideToggle()
		}), $(document).mouseup(function(e) {
			var t = $(".mobile");
			t.is(e.target) || 0 !== t.has(e.target).length || $(".header__top_toggle").is(e.target) || ($(".mobile").removeClass("active"), $("body").removeClass("body-lock"))
		}), $(".clikable").click(function(e) {
			e.preventDefault(), $(this).parent().toggleClass("active").siblings("").removeClass("active"), $(this).siblings(".hidden_child").slideToggle()
		}),
		function() {
			function e(e) {
				var t = e.item.count - 1,
					o = Math.round(e.item.index - e.item.count / 2 - .5);
				console.log(t, o), o < 0 && (o = t, console.log("current < 0")), o > t && (o = 0, console.log("current > count")), i.find(".owl-item").removeClass("current").eq(o).addClass("current");
				var l = i.find(".owl-item.active").length - 1,
					a = i.find(".owl-item.active").first().index();
				o > i.find(".owl-item.active").last().index() && i.data("owl.carousel").to(o, 100, !0), o < a && i.data("owl.carousel").to(o - l, 100, !0)
			}

			function t(e) {
				if(l) {
					var t = e.item.index;
					o.data("owl.carousel").to(t, 100, !0)
				}
			}
			var o = $(".cart__gallery-big"),
				i = $(".cart__gallery-thumb"),
				l = !0;
			o.owlCarousel({
				items: 1,
				slideSpeed: 2e3,
				nav: !0,
				autoplay: !1,
				dots: !1,
				loop: !0,
				responsiveRefreshRate: 200,
				navText: ['<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 43.22 124.96"><path d="M2.12 1.32l38.16 61.16-38.16 61.15" fill="none" stroke="#000" stroke-width="5" stroke-miterlimit="10"/></svg>', '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 43.22 124.96"><path d="M2.12 1.32l38.16 61.16-38.16 61.15" fill="none" stroke="#000" stroke-width="5" stroke-miterlimit="10"/></svg>']
			}).on("changed.owl.carousel", e), i.on("initialized.owl.carousel", function() {
				i.find(".owl-item").eq(0).addClass("current")
			}).owlCarousel({
				items: 3,
				dots: !1,
				nav: !1,
				margin: 12,
				smartSpeed: 200,
				slideSpeed: 500,
				slideBy: 5,
				responsiveRefreshRate: 100
			}).on("changed.owl.carousel", t), i.on("click", ".owl-item", function(e) {
				e.preventDefault();
				var t = $(this).index();
				o.data("owl.carousel").to(t, 300, !0)
			})
		}()
		






		/*$(".js-gallery-item").magnificPopup({
			delegate: ".js-gallery-img",
			type: "image",
			closeOnContentClick: !1,
			closeBtnInside: !1,
			mainClass: "mfp-with-zoom mfp-img-mobile",
			image: {
				verticalFit: !0,
				titleSrc: function(e) {
					return e.el.attr("title")
				}
			},
			gallery: {
				enabled: !0
			},
			zoom: {
				enabled: !0,
				duration: 300,
				opener: function(e) {
					return e.find("img")
				}
			}
		}), $(".js-gallery .owl-item a").each(function() {
			$(this).magnificPopup({
				//delegate: $(".owl-item:not(.cloned) a"),
				type: "image",
				closeOnContentClick: !1,
				closeBtnInside: !1,
				mainClass: "mfp-with-zoom mfp-img-mobile",
				image: {
					verticalFit: !0,
					titleSrc: function(e) {
						return e.el.attr("title")
					}
				},
				gallery: {
					enabled: !0
				},
				zoom: {
					enabled: !0,
					duration: 300,
					opener: function(e) {
						return e.find("img")
					}
				}
			})
		})*/






	});	

$(function(){
	$('.styler').styler();
});
