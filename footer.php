<footer class="footer">
    <div class="footer__container _containerSub">
        <div class="footer__grid">
            <div class="footer__item">
                <div class="Iconblock">
                    <a href="#" class="Iconblock__iconLink">
                        <img src="<?php echo get_template_directory_uri() . '/'; ?>img/logo.svg" alt="logo">
                    </a>
                    <a href="#" class="Iconblock__iconLinkTwo">
                        Портал №1 о нейросетях
                    </a>
                </div>
                <p class="footer__mail"><?php echo CFS()->get('main_email', 12); ?></p>
            </div>
            <div class="footer__item">
                <div class="footer__block">
                    <h3 class="footer__subtitel">Содержание сайта</h3>
                    <p class="footer__text"><?php echo get_bloginfo('description'); ?>
                    </p>
                </div>
            </div>
            <div class="footer__item">
                <a href="https://beget.com/ru" class="footer__linkBeget"><img
                        src="<?php echo get_template_directory_uri() . '/'; ?>img/logoBeget.svg" alt="logo-beget"></a>
                <div class="footer__block">
                    <p class="footer__text footer__text--margin">Блок размещен</p>
                    <p class="footer__text">Официаьный хостинг-партнер</p>
                </div>

            </div>
        </div>
    </div>

    <?php wp_nav_menu(
        array(
            'menu' => 'footer_sub',      
            'container' => false,        // (string) Название выводимого меню (указывается в админке при создании меню, приоритетнее
            // чем указанное местоположение theme_location - если указано, то параметр theme_location игнорируется)
            'menu_class' => 'footer__list',          // (string) class самого меню (ul тега)
            'echo' => true,            // (boolean) Выводить на экран или возвращать для обработки
            'fallback_cb' => 'wp_page_menu',  // (string) Используемая (резервная) функция, если меню не существует (не удалось получить)
            // (string) Расположение меню в шаблоне. (указывается ключ которым было зарегистрировано меню в функции register_nav_menus)
        )
    ); ?>
    <!-- <ul class="footer__list">
        <li class="footer__li"><a href="" class="footer__link">Политика конфиденциальности</a></li>
        <li class="footer__li"><a href="" class="footer__link">Privacy Policy</a></li>
        <li class="footer__li"><a href="" class="footer__link">Cookie Policy</a></li>
    </ul> -->
</footer>
</div>
</body>
<?php wp_footer(); ?>

</html>