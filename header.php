<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!DOCTYPE html>
<html lang="<?= LANGUAGE_ID?>">

<head>
    <meta charset="utf-8">

    <title><?$APPLICATION->ShowTitle()?></title>
    <?use Bitrix\Main\Page\Asset;?>
    <script type="text/javascript" src="<?=CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH . "/js/vendor.js");?>"></script>
    <?$APPLICATION->ShowHead();?>
    <?/*<meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no">
    <meta property="og:image" content="path/to/image.jpg">*/?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?=SITE_TEMPLATE_PATH?>/img/favicon/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?=SITE_TEMPLATE_PATH?>/img/favicon/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?=SITE_TEMPLATE_PATH?>/img/favicon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?=SITE_TEMPLATE_PATH?>/img/favicon/apple-touch-icon-114x114.png">
    <?
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/vendor.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/main.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/jquery.fancybox.min.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/jquery.mCustomScrollbar.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/custom.css");
    Asset::getInstance()->addString('<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,500,700&amp;subset=cyrillic" rel="stylesheet">');
    #Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/vendor.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.hidden.text.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/main.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.fancybox.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.mCustomScrollbar.concat.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/custom.js");
    ?>
</head>
<body class="home">
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<div class="wrapper">
    <header class="header">
    <div class="header__top">
        <div class="container">
            <?$APPLICATION->IncludeComponent(
                "bitrix:menu", 
                "top", 
                array(
                    "ALLOW_MULTI_SELECT" => "N",
                    "CHILD_MENU_TYPE" => "top",
                    "DELAY" => "N",
                    "MAX_LEVEL" => "1",
                    "MENU_CACHE_GET_VARS" => array(
                    ),
                    "MENU_CACHE_TIME" => "36000000",
                    "MENU_CACHE_TYPE" => "A",
                    "MENU_CACHE_USE_GROUPS" => "Y",
                    "ROOT_MENU_TYPE" => "top",
                    "USE_EXT" => "N",
                    "COMPONENT_TEMPLATE" => "top"
                ),
                false
            );?>
            <?Bitrix\Main\Page\Frame::getInstance()->startDynamicWithID("user_login_block");?>
                <div class="user-block">
                    <?if ($USER->IsAuthorized()) {?>
                        <?global $USER;?>
                        <?$APPLICATION->IncludeComponent("bitrix:main.user.link", "user_top_menu", Array(
                            "CACHE_TIME" => "7200", // Время кеширования (сек.)
                                "CACHE_TYPE" => "A",    // Тип кеширования
                                "COMPOSITE_FRAME_MODE" => "A",  // Голосование шаблона компонента по умолчанию
                                "COMPOSITE_FRAME_TYPE" => "AUTO",   // Содержимое компонента
                                "ID" => $USER->GetID(), // Идентификатор пользователя
                                "NAME_TEMPLATE" => "",  // Отображение имени
                                "SHOW_LOGIN" => "Y",    // Показывать логин, если не задано имя
                                "USE_THUMBNAIL_LIST" => "N",    // Отображать личное фото в списке
                            ),
                            false
                        );?>                    
                    <?} else {?>
                        <a href="/auth/" class="header__callback">
                            <span class="header__callback-span">Вход</span>
                            <svg version="1.1"
                                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
                                 x="0px" y="0px" width="23.6px" height="24px" viewBox="0 0 23.6 24" style="overflow:scroll;enable-background:new 0 0 23.6 24;"
                                 xml:space="preserve"
                            
                                 >
                            <defs>
                            </defs>
                            <g id="Layer_57_1_" fill="#e30613">
                                <path d="M23.5,20.3c-0.9-4-3.8-7.3-7.8-8.6c2.9-2.2,3.4-6.3,1.2-9.1s-6.3-3.4-9.1-1.2s-3.4,6.3-1.2,9.1c0.4,0.5,0.8,0.9,1.2,1.2
                                    C3.9,13,1,16.3,0.1,20.3c-0.4,1.6,0.6,3.2,2.2,3.6C2.5,24,2.8,24,3,24h17.5c1.7,0,3-1.3,3-3C23.6,20.8,23.5,20.5,23.5,20.3
                                    L23.5,20.3z"/>
                            </g>
                            </svg>                            
                        </a>
                    <?}?>
                </div>
            <?Bitrix\Main\Page\Frame::getInstance()->finishDynamicWithID("user_login_block", "");?>
            <div style="clear: both;"></div>
        </div>
    </div>
    <div class="container">
        <div class="header__middle">
            <a href="#" class="header__top_toggle"></a>
            <a href="/" class="header__logo">
                <svg version="1.1"
                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
                     x="0px" y="0px" width="728.6px" height="489.8px" viewBox="0 0 728.6 489.8"
                     style="overflow:scroll;enable-background:new 0 0 728.6 489.8;" xml:space="preserve">
                <defs>
                </defs>
                <rect class="st0" fill="#E30613"; width="487.1" height="487.1"/>
                <g>
                    <polygon class="st1" fill="#ffffff" points="17.7,384.5 94.5,384.5 94.5,404.2 67.1,404.2 67.1,466.9 46.4,466.9 46.4,404.2 17.7,404.2     "/>
                    <path class="st1" fill="#ffffff" d="M190.6,427.7c0-13.6-4.1-24.6-12.2-32.9c-8.1-8.3-18.7-12.4-31.6-12.4c-12.2,0-22.4,4.1-30.5,12.4
                        c-8.1,8.3-12.1,18.7-12.1,31.3c0,12.3,4.1,22.5,12.2,30.6c8.1,8.1,18.6,12.2,31.6,12.2c8.3,0,15.5-1.5,21.6-4.4
                        c6.1-3,11.2-7.5,15.6-13.7l-17.4-8.2c-5.6,5.4-12.2,8.1-19.9,8.1c-6.5,0-11.8-1.7-15.9-5.2c-4.2-3.5-6.7-8.1-7.7-14h66.4
                        L190.6,427.7z M125,415.4c2.3-5.1,4.9-8.7,7.6-10.7c4.3-3.2,9.4-4.8,15.2-4.8c5.3,0,10,1.4,14,4.3c4,2.9,6.7,6.6,8.1,11.2H125z"/>
                    <polygon class="st1" fill="#ffffff" points="199.8,384.5 223.8,384.5 240.1,407 256.3,384.5 279.8,384.5 251.9,423.3 283.5,466.9 259.5,466.9 
                        239.9,439.9 220.4,466.9 196.9,466.9 228.1,423.5     "/>
                    <polygon class="st1" fill="#ffffff" points="314.6,414.2 345.5,414.2 345.5,384.5 366.1,384.5 366.1,466.9 345.5,466.9 345.5,432.7 314.6,432.7 
                        314.6,466.9 293.9,466.9 293.9,384.5 314.6,384.5     "/>
                    <path class="st1" fill="#ffffff" d="M463.6,404.1c-3.8-6.7-9.2-11.9-16-15.8c-6.8-3.9-14.1-5.8-21.9-5.8c-10.7,0-20.3,3.7-28.5,11.2
                        c-9.4,8.6-14.1,19.3-14.1,32.2c0,12,4.2,22.2,12.5,30.6c8.3,8.4,18.4,12.6,30.2,12.6c8,0,15.4-1.9,22-5.7
                        c6.7-3.8,11.9-9.1,15.8-15.9c3.9-6.8,5.8-14,5.8-21.8C469.3,417.9,467.4,410.7,463.6,404.1z M442.1,443c-4.3,4.5-9.7,6.7-16.1,6.7
                        c-6.5,0-11.8-2.2-16-6.7s-6.3-10.2-6.3-17.4c0-7,2.1-12.7,6.4-17.1c4.3-4.5,9.6-6.7,16-6.7c6.6,0,12,2.2,16.2,6.6
                        c4.2,4.4,6.3,10.2,6.3,17.2S446.4,438.5,442.1,443z"/>
                </g>
                <path d="M572.9,381.4v14.5c-4.4,0.5-8.6,0.8-12.8,0.8c-7.5,0.1-13.2,0.4-16.9,1c-3.8,0.6-7.1,1.9-10,4c-2.9,2.1-4.9,4.6-6.1,7.3
                    c-1.2,2.8-1.9,6.7-2.2,11.9c4.4-10.6,12-15.9,22.8-15.9c7.9,0,14.8,2.9,20.6,8.7c5.8,5.8,8.7,13.2,8.7,22.4c0,9.4-3.1,17.3-9.3,23.5
                    c-6.2,6.3-13.9,9.4-23,9.4c-7.5,0-14-2.3-19.7-6.9s-9.3-10-10.9-16.3c-1.6-6.3-2.4-13-2.4-20.2c0-9.2,1.1-16.6,3.4-22.4
                    c2.3-5.7,5.3-10.1,9-12.9c3.7-2.9,8-4.8,13-5.8s12.1-1.7,21.6-2.1C565,382.1,569.8,381.8,572.9,381.4z M561.5,436.9
                    c0-5.1-1.5-9.3-4.6-12.7s-7.1-5-12.2-5c-4.8,0-8.8,1.7-12,5.1s-4.7,7.6-4.7,12.6c0,5.3,1.6,9.6,4.7,12.9c3.1,3.3,7.1,4.9,11.9,4.9
                    c4.7,0,8.7-1.6,12-4.9C559.9,446.5,561.5,442.2,561.5,436.9z"/>
                <path d="M634.5,406.3h15.3v61.1h-15.3v-6.5c-3,2.8-6,4.9-9,6.1c-3,1.3-6.3,1.9-9.8,1.9c-7.9,0-14.7-3.1-20.5-9.2
                    c-5.8-6.1-8.6-13.7-8.6-22.8c0-9.4,2.8-17.2,8.4-23.2c5.6-6,12.3-9,20.3-9c3.7,0,7.1,0.7,10.3,2.1c3.2,1.4,6.2,3.5,8.9,6.2V406.3z
                     M618.4,418.9c-4.7,0-8.7,1.7-11.8,5c-3.1,3.4-4.7,7.6-4.7,12.9c0,5.3,1.6,9.6,4.8,13c3.2,3.4,7.1,5.1,11.8,5.1c4.8,0,8.8-1.7,12-5
                    s4.8-7.7,4.8-13.2c0-5.3-1.6-9.6-4.8-12.9S623.3,418.9,618.4,418.9z"/>
                <path d="M680.6,406.3v6.7c2.8-2.8,5.8-4.8,9-6.2c3.2-1.4,6.7-2.1,10.3-2.1c8,0,14.7,3,20.3,9c5.6,6,8.4,13.8,8.4,23.2
                    c0,9.1-2.9,16.7-8.6,22.8c-5.8,6.1-12.6,9.2-20.5,9.2c-3.5,0-6.8-0.6-9.8-1.9c-3-1.3-6-3.3-9-6.1v28.8h-15.2v-83.4H680.6z
                     M696.7,418.9c-4.8,0-8.8,1.6-12,4.9c-3.2,3.3-4.8,7.6-4.8,12.9c0,5.4,1.6,9.8,4.8,13.2c3.2,3.4,7.2,5,12,5c4.7,0,8.6-1.7,11.8-5.1
                    c3.2-3.4,4.8-7.7,4.8-13c0-5.2-1.6-9.5-4.7-12.9C705.5,420.6,701.5,418.9,696.7,418.9z"/>
                </svg>

            </a>
            <div class="header__description">
                <b>Замешаем<br> идеальный коктейль</b><br> для вашего бизнеса
            </div>
            <div class="header__contact">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include", 
                    ".default", 
                    array(
                        "AREA_FILE_SHOW" => "file",
                        "COMPONENT_TEMPLATE" => ".default",
                        "PATH" => TB_TEMPLATE_PATH . "/inc/phone.php"
                    ),
                    false
                );?>
            </div>

             <div class="header__order">
                 <a href="tel:88003337302" class="header__callback b24">Заказать обратный звонок</a>
             </div>

             <div class="header__address">
                 <div class="header__address-line">
                    <a href="/about/contacts/">Шоурум</a>
                    <span class="address-separate">|</span>
                    <span class="address-city">г. Москва,</span>
                    <span class="address-street">1-й Кирпичный переулок, дом 2</span>
                </div>
                 <div class="header__address-line">
                     <a class="header-mail" href="mailto:info@tehno-bar.ru">info@tehno-bar.ru</a>
                 </div>
             </div>

            <?
            // сравнение
            $frame = new \Bitrix\Main\Page\FrameHelper("compare");
            $frame->begin();
            ?><a href="/compare/" class="header__comparison" id="compare-link"><?
            require($_SERVER['DOCUMENT_ROOT'] . TB_TEMPLATE_PATH . '/ajax/compare_header_link.php');
            ?></a><?
            $frame->beginStub();
            ?><a href="/compare/" class="header__comparison" id="compare-link"></a><?
            $frame->end();
            
            ?>
            <?$APPLICATION->IncludeComponent(
                "bitrix:sale.basket.basket.line",
                "count",
                Array(
                    "HIDE_ON_BASKET_PAGES" => "Y",
                    "PATH_TO_AUTHORIZE" => "",
                    "PATH_TO_BASKET" => SITE_DIR."basket/",
                    "PATH_TO_ORDER" => SITE_DIR."personal/order/make/",
                    "PATH_TO_PERSONAL" => SITE_DIR."personal/",
                    "PATH_TO_PROFILE" => SITE_DIR."personal/",
                    "PATH_TO_REGISTER" => SITE_DIR."login/",
                    "POSITION_FIXED" => "N",
                    "SHOW_AUTHOR" => "N",
                    "SHOW_EMPTY_VALUES" => "N",
                    "SHOW_NUM_PRODUCTS" => "Y",
                    "SHOW_PERSONAL_LINK" => "N",
                    "SHOW_PRODUCTS" => "N",
                    "SHOW_TOTAL_PRICE" => "N"
                )
            );?>
        </div>
    </div>
    <nav class="header__nav d-lg-block d-none">
        <div class="container">
            <?$APPLICATION->IncludeComponent("bitrix:menu", 'categories', Array(
                "ALLOW_MULTI_SELECT" => "N",    // Разрешить несколько активных пунктов одновременно
                    "CHILD_MENU_TYPE" => "catalog", // Тип меню для остальных уровней
                    "DELAY" => "N", // Откладывать выполнение шаблона меню
                    "MAX_LEVEL" => 2,   // Уровень вложенности меню
                    "MENU_CACHE_GET_VARS" => array( // Значимые переменные запроса
                        0 => "",
                    ),
                    "MENU_CACHE_TIME" => "360000",  // Время кеширования (сек.)
                    "MENU_CACHE_TYPE" => "A",   // Тип кеширования
                    "MENU_CACHE_USE_GROUPS" => "Y", // Учитывать права доступа
                    "ROOT_MENU_TYPE" => "catalog",  // Тип меню для первого уровня
                    "USE_EXT" => "Y",   // Подключать файлы с именами вида .тип_меню.menu_ext.php
                ),
                false
            );?>
        </div>
    </nav>
</header>
<section class="search">
    <div class="container">
        <form action="/catalog/" class="header__search" method="get">
            <input name="q" type="search" class="header__search_input" placeholder="НАЙТИ ТОВАРЫ" required="">
            <button class="header__search_btn" type="submit"></button>
            <input type="hidden" name="s" value="Y">
        </form>
    </div>
</section>
<?$APPLICATION->IncludeComponent(
    "bitrix:menu", 
    'new_mob_menu_struct', 
    array(
        "ALLOW_MULTI_SELECT" => "N",
        "CHILD_MENU_TYPE" => "catalog",
        "DELAY" => "N",
        "MAX_LEVEL" => "4",
        "MENU_CACHE_GET_VARS" => array(
        ),
        "MENU_CACHE_TIME" => "3600000",
        "MENU_CACHE_TYPE" => "A",
        "MENU_CACHE_USE_GROUPS" => "Y",
        "ROOT_MENU_TYPE" => "catalog",
        "USE_EXT" => "Y",
        "COMPONENT_TEMPLATE" => 'new_mob_menu_struct',
        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO"
    ),
    false
);?>
<div id="main-container"></div>
<div class="menu-bg"></div>
<div class="overflow"></div>
<nav class="nav">
    <div class="container">
        <ul class="nav__list">
            <li class="nav__item">
                <a class="nav__link" href="#"></a>
            </li>
        </ul>
    </div>
</nav>