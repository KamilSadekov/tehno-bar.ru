var SiteSettings = function() {
    this.AddToBasketPath = '/bitrix/templates/tb/ajax/add_to_basket.php';
    this.CompredListPath = '/bitrix/templates/tb/ajax/compred_list.php';
    this.AddToCompare = '/bitrix/templates/tb/ajax/compare_add.php';
    this.CompareLink = '/bitrix/templates/tb/ajax/compare_header_link.php';
}

SiteSettings.prototype.Bitrix24Show = function(){
    $('a.b24-widget-button-callback .b24-widget-button-social-tooltip').click();
}

SiteSettings.prototype.Bitrix24Request = function(){
    $('a.b24-widget-button-openline_livechat .b24-widget-button-social-tooltip').click();
}

function ShowWait() {
    var preloader = '\
        <div class="l-wrapper" id="preloader">\
            <svg viewBox="0 0 120 120" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">\
                <symbol id="s--circle"><circle r="10" cx="20" cy="20"></circle></symbol>\
                <g class="g-circles g-circles--v1">\
                    <g class="g--circle"><use xlink:href="#s--circle" class="u--circle"/></g>\
                    <g class="g--circle"><use xlink:href="#s--circle" class="u--circle"/></g>\
                    <g class="g--circle"><use xlink:href="#s--circle" class="u--circle"/></g>\
                    <g class="g--circle"><use xlink:href="#s--circle" class="u--circle"/></g>\
                    <g class="g--circle"><use xlink:href="#s--circle" class="u--circle"/></g>\
                    <g class="g--circle"><use xlink:href="#s--circle" class="u--circle"/></g>\
                    <g class="g--circle"><use xlink:href="#s--circle" class="u--circle"/></g>\
                    <g class="g--circle"><use xlink:href="#s--circle" class="u--circle"/></g>\
                    <g class="g--circle"><use xlink:href="#s--circle" class="u--circle"/></g>\
                    <g class="g--circle"><use xlink:href="#s--circle" class="u--circle"/></g>\
                    <g class="g--circle"><use xlink:href="#s--circle" class="u--circle"/></g>\
                    <g class="g--circle"><use xlink:href="#s--circle" class="u--circle"/></g>\
                </g>\
            </svg>\
        </div>';
    $('body').append(preloader);    
}

function CloseWait() {
    $('#preloader').remove();
}

$(function(){
    $(".js-hidden-text").hiddenText();
});

function setCurrentHeight() {
    var windowMaxHeight;
    var setHeight;
    var elemHeight;
    elemHeight = $('.js-height-meter').height();
    windowMaxHeight = $(window).height() - 100;
    if (windowMaxHeight > elemHeight) {
        setHeight = elemHeight;
    } else {
        setHeight = windowMaxHeight;
    }
    $('.js-catalog-filter-wrapper').css('max-height', setHeight);
}

function unsetCurrentHeight() {    
    $('.js-catalog-filter-wrapper').css('max-height', 'unset');
}

$(function(){

    var Technobar = new SiteSettings();

    $('#ajax-result').on('click', '.js-next-page', function(e){
        
        var $this = $(this),
            pagination = $this.closest('.js-pagination'),
            link = $(this).attr('href');
        
        if ($this.hasClass('active'))
            return;
        
        $this.addClass('active');
        $.get(link, {ajax_action : 'Y', pagination : 'Y'}, function(data){
            pagination.remove();
            $(data).appendTo('#ajax-result');
            if (!!(window.history && history.pushState))
                history.pushState(null, null, link);        
        });
        e.preventDefault();
    });

    $('#ajax-result').on('click', '.js-sort', function(e){
        var $this = $(this),
            link = $(this).attr('href');
        ShowWait();
        
        $this.addClass('active').siblings('a').removeClass('active');
        $.get(link, {ajax_action : 'Y'}, function(data){
            $('#ajax-result').html(data);
            if (!!(window.history && history.pushState))
                history.pushState(null, null, link); 
            CloseWait();    
        });   
        e.preventDefault();
    });

    $('#ajax-result').on('change', '.js-mobile-sort', function(e){
        var $this = $(this),
            link = $(this).val();
            console.log(link);
        ShowWait();
        
        $.get(link, {ajax_action : 'Y'}, function(data){
            $('#ajax-result').html(data);
            if (!!(window.history && history.pushState))
                history.pushState(null, null, link); 
            CloseWait();    
        });   
        e.preventDefault();
    });

    $('body').on('click', '.js-to-basket', function(){        
        var serialize = {};
        serialize.parentid = $(this).data('parent');
        serialize.id = $(this).attr('data-id');
        serialize.button = $(this).data('button');
        if ($("input").is(".js-counter-item")) {
            serialize.quantity = $('.js-counter-item').val();   
        } else {
            serialize.quantity = 1; 
        }
        if (!(serialize.id > 0 && serialize.parentid > 0)) {
            alert('Ой... Что-то пошло не так. Лучше позвоните по телефону, указанному в шапке сайта');
            return;
        }
        if ($('.js-input-colors-second:checked')) {
            serialize.colorItems = {};
            $('.js-input-colors-second:checked').each(function(index){
                serialize.colorItems[index] = $(this).val();
            });
        }
        if ($('.js-input-colors:checked')) {
            serialize.obivkaItems = {};
            $('.js-input-colors:checked').each(function(index){
                serialize.obivkaItems[index] = $(this).val();
            });
        }
        $.post(Technobar.AddToBasketPath, serialize, function(data){
            $.fancybox.open(data, {padding: 0});
            $('.js-refresh-cart').click();
        });
        return false;
    });

    $('body').on('click', '.js-compare', function(){
        var serialize = {};
        serialize.id = $(this).data('id');
        if (!(serialize.id > 0)) {
            alert('Ой... Что-то пошло не так. Лучше позвоните по телефону, указанному в шапке сайта');
            return;         
        }
        
        $(this).addClass('active').text($(this).data('text'));
        
        ShowWait();
        $.post(Technobar.AddToCompare, serialize, function(data) {
            $.fancybox.open(data, {padding: 0});
            CloseWait();
            $.post(Technobar.CompareLink, {}, function(data) {
                $('#compare-link').html(data);
            });
        });
    });

    $('.ajax-form').on('submit', function(e){
        e.preventDefault();
        var $form = $(this),
        serialize = $form.serialize(),
        url = $form.attr('action');
        ShowWait();
        
        $.ajax({
            url: url,
            type: 'POST',
            data: serialize,
            success: function(data){
                data = JSON.parse(data);
                
                $.fancybox.open('<div><div class="modal-wrapper center"><div class="h2">' + data.message + '</div></div></div>');
                CloseWait();
                
                if (data.status == 1) {
                    var obCat = $form.data('category');
                    var obAct = $form.data('action');
                    if (typeof obCat !== 'undefined' && typeof obAct !== 'undefined') {
                        SendAnalyticsGoal(obCat, obAct);
                    }                   
                    $form[0].reset();                   
                }
                
                if (data.comment == '1') {
                    $form.find('textarea').val('');
                    $form.find('input[type="text"]').val('');
                    $form.find('input[type="email"]').val('');
                }
            }
        });
    });

    $(document).mouseup(function (e){ // событие клика по веб-документу
        var div = $(".js-hidden-prop-value.active"); 
        if (!div.is(e.target) // если клик был не по нашему блоку
            && div.has(e.target).length === 0 // и не по его дочерним элементам
            && !$('.js-change-size').is(e.target) //И не по элементам открытия
            ) { 
            div.removeClass('active'); // скрываем его
        }
    });

    if ($('.js-hidden-prop-value.active')) {
        $('body').on('click', function(){
           //$('.js-hidden-prop-value.active').removeClass('active');
        });
    }

    $(".js-open-cart-clear").click(function(e){
        e.preventDefault(),
        $(".overflow").addClass("show"),
        $(".cart-popup").addClass("show"),
        $('.cart-popup__checkbox_input').prop('checked', false);
    });

    $('.js-change-size').on('click', function(){
        $('.js-hidden-prop-value').toggleClass('active');
        $(this).toggleClass('active');
    });

    $('body').on('click', '.js-hidden-prop-value .cart__view', function(){ 
        $('.cart__view.current-view').removeClass('current-view');
        $(this).addClass('current-view');
        $('.js-hidden-prop-value').toggleClass('active');
        $('.js-change-size').toggleClass('active');
        var serialize = {};
        serialize.id = $(this).data('id');
        serialize.price = $(this).data('price');
        $('.cart__price span.main-price').text(serialize.price + '*');
        if ($(this).data('oldprice')) {
            serialize.oldprice = $(this).data('oldprice');
            $('.cart__price span.old-price').text(serialize.oldprice + '*');
        }
        serialize.props = {};

        $(this).find('span').each(function(index){
            serialize.props[index] = $(this).text();
        });

        $('.js-main-view span').each(function(index){
            $(this).text(serialize.props[index]);
        });

        $('.js-to-basket').attr('data-id', serialize.id);
    });

    $('.b24').on('click', function(e){
        Technobar.Bitrix24Show();
        e.preventDefault();
    });
    
    $('.b24-request').on('click', function(e){
        Technobar.Bitrix24Request();
    }); 

});

Share = {
    vkontakte: function(purl, ptitle, pimg, text) {
        url  = 'http://vkontakte.ru/share.php?';
        url += 'url='          + encodeURIComponent(purl);
        url += '&title='       + encodeURIComponent(ptitle);
        url += '&description=' + encodeURIComponent(text);
        url += '&image='       + encodeURIComponent(pimg);
        url += '&noparse=true';
        Share.popup(url);
    },
    facebook: function(purl, ptitle, pimg, text) {
        url  = 'http://www.facebook.com/sharer.php?s=100';
        url += '&p[title]='     + encodeURIComponent(ptitle);
        url += '&p[summary]='   + encodeURIComponent(text);
        url += '&p[url]='       + encodeURIComponent(purl);
        url += '&p[images][0]=' + encodeURIComponent(pimg);
        Share.popup(url);
    },

    popup: function(url) {
        window.open(url,'','toolbar=0,status=0,width=626,height=436');
    }
};

$(function(){
    $('.js-linkPinIt').click(function(){
        var url = $(this).attr('href');
        var media = $(this).attr('data-image');
        var desc = $(this).attr('data-desc');
        window.open("//www.pinterest.com/pin/create/button/"+
        "?url="+url+
        "&media="+media+
        "&description="+desc,"_blank","top=0,right=0,width=750,height=320");
        return false; 
    });
});

$(document).ready(function(){
    $('.js-btn-number').click(function(e){
        // получаем значение атрибута data-type
        var type = $(this).attr('data-type');
        // получаем значение атрибута data-field
        var field = $(this).attr('data-field');
        // по значению атрибута data-field находим связанное текстовое поле
        var input = $('input[name ='+ field +']');
        // получаем атрибут со значением минимума
        var min = input.attr('min');
        // получаем атрибут со значением максимума
        var max = input.attr('max');
        // принимаем строку в качестве аргумента и возвращает целое число
        min =parseInt(min);
        max =parseInt(max);
        var currentVal;
        // получаем значение текстового поля
        var value = input.val();
        // если нажимаем на минус
        if(type == 'minus') {
        // пока значение больше минимума
            if(value > min) {
        // уменьшаем на 1
                currentVal = parseInt(value) - 1;
        // вызываем событие изменения текстового поля
                input.val(currentVal).change();
            }
        }
        // если нажимаем на плюс
        if(type == 'plus') {
        // пока значение меньше максимума
            if(value < max) {
        // увеличиваем на 1
                currentVal = parseInt(value) + 1;
        // вызываем событие изменения текстового поля
                input.val(currentVal).change();
            }
        }
    });

    $('.js-counter-item').change(function(){
        var min = $(this).attr('min');
        var max = $(this).attr('max');
        var val = $(this).val();
        var name = $('.js-counter-item').attr('name');
        // если достигли минимума, отключаем кнопку минуса
        if(val == min) {
             $(".js-btn-number[data-type='minus'][data-field='"+name+"']").attr('disabled','true');
        }
        else {
            $(".js-btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled');
        }
        // если достигли максимума, отключаем кнопку плюса
        if(val == max) {
            $(".js-btn-number[data-type='plus'][data-field='"+name+"']").attr('disabled','true');
        } else $(".js-btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled');
    })

    $(".js-filter-sections-show").on("click", function(e) {
        e.preventDefault();
        $(this).toggleClass("active");
        $(".js-under-filter-sections").stop().slideToggle();
    });

    setCurrentHeight();
    $(".js-catalog-filter-wrapper").mCustomScrollbar({
        theme:"minimal-dark",
    });
    $(window).resize(function() {
        unsetCurrentHeight();
        setTimeout(setCurrentHeight, 405);
    });

    $('.js-catalog-filter-wrapper').on('click', function() {
        unsetCurrentHeight();
        setTimeout(setCurrentHeight, 405);
    });

    //Подменяем выбранную обивку в карточке товара
    $('.js-input-colors').on('change', function(){
        var defaultImg, defaultName;
        defaultName = $('.js-ob-name').attr('data-name');
        defaultImg = $('.js-ob-color').attr('data-style');
        var img = Array();
        var name = Array();
        var i = 0;
        $('.js-input-colors').each(function() {
            if ($(this).is(':checked')) {
                name[i] = $(this).val();
                img[i] = '--background-image: url(' + $(this).attr('data-small-picture') + ');';
                i++;
            }
        });

        if (name[0]) {            
            var longName;
            longName = name.join(', ');
            $('.js-ob-name').text(longName);         
        } else {
            $('.js-ob-name').text(defaultName);
        }

        if (img[0]) {
            if (img[0] !== defaultImg || img[0] !== $('.js-ob-color').attr('style')) {
               $('.js-ob-color').attr('style', img[0]); 
            }            
        } else {
            $('.js-ob-color').attr('style', defaultImg); 
        }
    });

    //Подменяем выбранный цвет в карточке товара
    $('.js-input-colors-second').on('change', function(){
        var defaultImg, defaultName;
        defaultName = $('.js-ob-name-second').attr('data-name');
        defaultImg = $('.js-ob-color-second').attr('data-style');
        var img = Array();
        var name = Array();
        var i = 0;
        $('.js-input-colors-second').each(function() {
            if ($(this).is(':checked')) {
                name[i] = $(this).val();
                img[i] = '--background-image: url(' + $(this).attr('data-small-picture') + ');';
                i++;
            }
        });

        if (name[0]) {
            var longName;
            longName = name.join(', ');
           $('.js-ob-name-second').text(longName);       
        } else {
            $('.js-ob-name-second').text(defaultName);
        }

        if (img[0]) {
            if (img[0] !== defaultImg || img[0] !== $('.js-ob-color').attr('style')) {
               $('.js-ob-color-second').attr('style', img[0]); 
            }            
        } else {
            $('.js-ob-color-second').attr('style', defaultImg); 
        }
    });

});
