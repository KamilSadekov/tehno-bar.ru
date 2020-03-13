<footer class="footer">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-6 col-md-6 order-md-1">
                <div class="subscribe">
                    <div class="subscribe__text">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include", 
                            ".default", 
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "COMPONENT_TEMPLATE" => ".default",
                                "PATH" => TB_TEMPLATE_PATH . "/inc/subscribe.php"
                            ),
                            false
                        );?>
                    </div>
                    <?$APPLICATION->IncludeComponent(
                      "bitrix:main.include", 
                      ".default", 
                      array(
                          "AREA_FILE_SHOW" => "file",
                          "COMPONENT_TEMPLATE" => ".default",
                          "PATH" => TB_TEMPLATE_PATH . "/inc/footer-subscribe-form.php"
                      ),
                      false
                    );?> 
                    <div class="subscribe__desc">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include", 
                            ".default", 
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "COMPONENT_TEMPLATE" => ".default",
                                "PATH" => TB_TEMPLATE_PATH . "/inc/offer.php"
                            ),
                            false
                        );?>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-6">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include", 
                    ".default", 
                    array(
                        "AREA_FILE_SHOW" => "file",
                        "COMPONENT_TEMPLATE" => ".default",
                        "PATH" => TB_TEMPLATE_PATH . "/inc/text.php"
                    ),
                    false
                );?>
            </div>
        
        </div>
        
        <hr class="footer__hr">
        
        <div class="row">
            <div class="col-lg-4">
                <div class="footer__middle">
                    <div class="row align-items-lg-end align-items-center justify-content-center">
                        <div class="col-lg-6 col-md-3 col-6 mb-30">
                            <a href="#" class="footer__logo">
                                <img src="<?=SITE_TEMPLATE_PATH?>/svg/logo.svg" alt="logo" width="120">
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-3 col-6 mb-30">
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:main.include", 
                                ".default", 
                                array(
                                    "AREA_FILE_SHOW" => "file",
                                    "COMPONENT_TEMPLATE" => ".default",
                                    "PATH" => TB_TEMPLATE_PATH . "/inc/footer_phone.php"
                                ),
                                false
                            );?>            
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:main.include", 
                                ".default", 
                                array(
                                    "AREA_FILE_SHOW" => "file",
                                    "COMPONENT_TEMPLATE" => ".default",
                                    "PATH" => TB_TEMPLATE_PATH . "/inc/footer_mail.php"
                                ),
                                false
                            );?>
                        </div>
                        <div class="col-lg-12 col-md-3 col-7 mb-10">
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:main.include", 
                                ".default", 
                                array(
                                    "AREA_FILE_SHOW" => "file",
                                    "COMPONENT_TEMPLATE" => ".default",
                                    "PATH" => TB_TEMPLATE_PATH . "/inc/address.php"
                                ),
                                false
                            );?>
                        </div>
                        <div class="col-lg-12 col-md-3 col-7">
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:main.include", 
                                ".default", 
                                array(
                                    "AREA_FILE_SHOW" => "file",
                                    "COMPONENT_TEMPLATE" => ".default",
                                    "PATH" => TB_TEMPLATE_PATH . "/inc/works.php"
                                ),
                                false
                            );?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-6">
                <div class="footer__title">Наш ассортимент</div>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu", 
                        "bottom", 
                        array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "catalog",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "1",
                            "MENU_CACHE_GET_VARS" => array(
                            ),
                            "MENU_CACHE_TIME" => "36000000",
                            "MENU_CACHE_TYPE" => "A",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "ROOT_MENU_TYPE" => "bottom0",
                            "USE_EXT" => "Y",
                            "COMPONENT_TEMPLATE" => "bottom",
                            "COMPOSITE_FRAME_MODE" => "A",
                            "COMPOSITE_FRAME_TYPE" => "AUTO"
                        ),
                        false
                    );?>
            </div>
            <div class="col-lg-2 col-md-3 col-6">
                <div class="footer__title">Как приобрести</div>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:menu", 
                    "bottom", 
                    array(
                        "ALLOW_MULTI_SELECT" => "N",
                        "CHILD_MENU_TYPE" => "bottom1",
                        "DELAY" => "N",
                        "MAX_LEVEL" => "1",
                        "MENU_CACHE_GET_VARS" => array(
                        ),
                        "MENU_CACHE_TIME" => "36000000",
                        "MENU_CACHE_TYPE" => "A",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "ROOT_MENU_TYPE" => "bottom1",
                        "USE_EXT" => "Y",
                        "COMPONENT_TEMPLATE" => "bottom"
                    ),
                    false
                );?>
            </div>
            <div class="col-lg-2 col-md-3 col-6">
                <div class="footer__title">Tehno-bar</div>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:menu", 
                    "bottom", 
                    array(
                        "ALLOW_MULTI_SELECT" => "N",
                        "CHILD_MENU_TYPE" => "bottom2",
                        "DELAY" => "N",
                        "MAX_LEVEL" => "1",
                        "MENU_CACHE_GET_VARS" => array(
                        ),
                        "MENU_CACHE_TIME" => "36000000",
                        "MENU_CACHE_TYPE" => "A",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "ROOT_MENU_TYPE" => "bottom2",
                        "USE_EXT" => "Y",
                        "COMPONENT_TEMPLATE" => "bottom"
                    ),
                    false
                );?>
            </div>
            <div class="col-lg-2 col-md-3 col-6">
                <div class="footer__title">Работа с нами</div>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:menu", 
                    "bottom", 
                    array(
                        "ALLOW_MULTI_SELECT" => "N",
                        "CHILD_MENU_TYPE" => "bottom3",
                        "DELAY" => "N",
                        "MAX_LEVEL" => "1",
                        "MENU_CACHE_GET_VARS" => array(
                        ),
                        "MENU_CACHE_TIME" => "36000000",
                        "MENU_CACHE_TYPE" => "A",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "ROOT_MENU_TYPE" => "bottom3",
                        "USE_EXT" => "Y",
                        "COMPONENT_TEMPLATE" => "bottom"
                    ),
                    false
                );?>
            </div>
        </div>
    </div>
</footer>

</div>

<?if ($_SESSION['catalog_sort_type']['sort']):?>
    <script>
        if ($('.js-<?=$_SESSION['catalog_sort_type']['sort']?>-sort').hasClass('active') === false) {
            $('.js-<?=$_SESSION['catalog_sort_type']['sort']?>-sort').click();
        }
    </script>
<?endif;?>

<script>
    (function(w,d,u,b){
        s=d.createElement('script');r=(Date.now()/1000|0);s.async=1;s.src=u+'?'+r;
        h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
    })(window,document,'https://cdn.bitrix24.ru/b2046829/crm/site_button/loader_2_r2qbd3.js');
</script>

    <div class="hide-elements"></div>
</body>
</html>
