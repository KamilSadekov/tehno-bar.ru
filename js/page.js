$(function(){
	$('.styler').styler();
});

$(function() {
	$(".images-item").click(function(e) {
	  e.preventDefault();
	  $(".images-item").removeClass('active-image');
	  $(this).addClass('active-image');
	});
  });


