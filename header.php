<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="fav.ico" type="image/x-icon">
    <title><?php echo wp_title('|', false, 'right'); ?></title>

    <?php wp_head(); ?>
</head>

<body>
    <div class="wrapper">
        <header class="header">
            <div class="header__container _containerHead">
                <div class="header__block">
                    <div class="header__Icon-Block Iconblock">
                        <a href="<?php echo get_home_url(); ?>" class="Iconblock__iconLink">
                            <img src="<?php echo get_template_directory_uri() . '/' ?>img/logo.svg" alt="logo">
                        </a>
                        <p class="Iconblock__iconLinkTwo">
                            Портал №1 о нейросетях
                        </p>
                    </div>
                    <div class="header__right-Block">

                        <?php wp_nav_menu(
                            array(
                                'menu' => 'main-menu',              // (string) Название выводимого меню (указывается в админке при создании меню, приоритетнее
                                // чем указанное местоположение theme_location - если указано, то параметр theme_location игнорируется)
                                'menu_class' => 'header__list-One',          // (string) class самого меню (ul тега)
                                'echo' => true,            // (boolean) Выводить на экран или возвращать для обработки
                                'fallback_cb' => 'wp_page_menu',  // (string) Используемая (резервная) функция, если меню не существует (не удалось получить)
                                // (string) Расположение меню в шаблоне. (указывается ключ которым было зарегистрировано меню в функции register_nav_menus)
                            )
                        ); ?>
                        <button type="button" class="icon-menu"><span></span></button>
                        <form class="header__form" action="<?php echo esc_url(home_url('/')); ?>" method="get">
                            <button class="header__btn search-btn-action"><img
                                    src="<?php echo get_template_directory_uri() . '/' ?>img/search.svg"
                                    alt="icon"></button>
                            <input type="search" name="s">
                            <button class="hidden" type='submit'></button>
                        </form>

                    </div>
                </div>

            </div>
            <div class="header__block-Two">
                <div class="header__container _containerSub">
                    <nav class="header__menu">
                        <ul class="header__list-Two">

                            <?php
                            class Custom_Walker_Nav_Menu extends Walker_Nav_Menu
                            {
                                public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
                                {
                                    $classes = empty($item->classes) ? array() : (array) $item->classes;
                                    $classes[] = 'header__item--mob'; // Добавляем нужный класс
                                    $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));

                                    $output .= "<li id='menu-item-$item->ID' class='$class_names'>";
                                    $output .= '<a href="' . $item->url . '">' . $item->title . '</a>';
                                }

                                public function end_el(&$output, $item, $depth = 0, $args = null)
                                {
                                    $output .= "</li>\n";
                                }
                            }

                            ?>

                            <?php
                            wp_nav_menu(
                                array(
                                    'menu' => 'main-menu',
                                    'menu_class' => '',
                                    'container' => false,
                                    'echo' => true,
                                    'fallback_cb' => 'wp_page_menu',
                                    'items_wrap' => '%3$s',
                                    'walker'      => new Custom_Walker_Nav_Menu(),
                                )
                            );

                            ?>
                            <?php wp_nav_menu(
                                array(
                                    'menu' => 'cat-menus',              // (string) Название выводимого меню (указывается в админке при создании меню, приоритетнее
                                    // чем указанное местоположение theme_location - если указано, то параметр theme_location игнорируется)
                                    'menu_class' => 'header__list-Two',          // (string) class самого меню (ul тега)
                                    'echo' => true,            // (boolean) Выводить на экран или возвращать для обработки
                                    'container' => false,
                                    'fallback_cb' => 'wp_page_menu',
                                    'items_wrap' => '%3$s', // (string) Используемая (резервная) функция, если меню не существует (не удалось получить)
                                    // (string) Расположение меню в шаблоне. (указывается ключ которым было зарегистрировано меню в функции register_nav_menus)
                                )
                            ); ?>
                        </ul>



                    </nav>
                </div>
            </div>
        </header>