(function($) {
    $.fn.hiddenText = function(options) {
        var settings = $.extend({
            'maxHeight' : 100,
            'marginBottom' : 25,
            'animateTime' : 500,
            'linkClass' : 'hidden-text-link',
            'moreText' : 'Подробнее...',
            'hideText' : 'Скрыть',
            'openClass' : 'open'
        }, options);

        return this.each(function() {
            var $this = $(this),
                realHeight = parseInt($this.css("height"));

            if (realHeight > settings.maxHeight) {
                 $this.css({
                    overflow : "hidden",
                    height : (settings.maxHeight + "px"),
                    marginBottom : (settings.marginBottom + "px"),
                 })
                 .after('<a style="display: inline-block; margin-bottom: ' + settings.marginBottom + 'px;" class="' + settings.linkClass + '" href="javascript:;">' + settings.moreText + '</a>');

                $('.' + settings.linkClass).on('click', function(event) {

                    var $link = $(this),
                        linkText,
                        animateHeight;

                    $this.toggleClass(settings.openClass);

                    if ($this.hasClass(settings.openClass)) {
                        linkText = settings.hideText;
                        animateHeight = (realHeight + "px");
                    } else {
                        linkText = settings.moreText;
                        animateHeight = (settings.maxHeight + "px");
                    }                    

                    $this.stop().animate({
                        height : animateHeight
                    }, settings.animateTime);

                    $link.text(linkText);
                    event.preventDefault();
                    event.stopPropagation();
                });
            }
        });
    };
})(jQuery);