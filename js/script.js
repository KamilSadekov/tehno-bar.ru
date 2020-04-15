$(document).ready(function(){

	$('.owl-carousel_main_subsect-js').owlCarousel({
        nav: true,
        loop: true,
        responsive: true,
        dots: true,
        autoplay: false,
        autoplayTimeout: 3000,
        navText: '',
        autoplay: true,
        navContainerClass: 'owl-nav set_down_slider',
        dotsClass: 'owl-dots set_down_slider',
	        responsive:{
	        0:{
	            items:2
	        },
	        567:{
	            items:3
	        },
	        992:{
	            items:5
	        }
	    }
    });
});

