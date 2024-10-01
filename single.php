
<?php
get_header();
$post = get_post();
$categories = get_the_category($post->ID);
?>
<!-- ========================================== -->
<main class="page">
    <div class="advertising">
        <div class="advertising__container _containerSub">
            <!-- randomArticle -->
            <div class="advertising__block">
                <?php echo do_shortcode('[adinserter block="11"]'); ?>
            </div>
        </div>
    </div>
    <section class="body">
        <div class="body__container _containerSub">
            <div class="body__grid">
                <?php get_template_part('templates/left'); ?>
                <div class="body__item-right">
                    <ul class="bread-crumbs">

                        <li>
                            <a href="<?php echo get_home_url(); ?>">Главная</a>
                        </li>
                        <?php

                        if (!empty($categories) && $categories[0]->name !== 'Uncategorized') {
                            // Получаем первую категорию
                            $first_category = $categories[0];
                            ?>
                            <li>
                                <a
                                    href="<?php echo esc_url(get_category_link($first_category->term_id)); ?>"><?php echo esc_html($first_category->name) ?></a>
                            </li>
                            <?php
                        }
                        ?>

                        <li>
                            <a href="<?php echo get_page_uri(); ?>"><?php echo the_title(); ?></a>
                        </li>
                    </ul>
                    <div class="body__article random-article">
                        <div class="random-article__container">
                            <div class="random-article__headerBlock">
                                <div class="random-article__item">
                                    <h1 class="random-article__titel"><?php echo the_title(); ?></h1>
                                    <?php
                                    $post_content = get_post_field('post_content', get_the_ID());
                                    $post_char_count = mb_strlen(strip_tags($post_content), 'UTF-8');
                                    $reading_speed = 400;
                                    $reading_time = ceil($post_char_count / $reading_speed);

                                    ?>
                                    <p class="random-article__reading">Время на прочтение <?php echo $reading_time; ?>
                                        минут</p>
                                </div>
                                <div class="random-article__item">
                                    <p class="random-article__time">Опубликовано: <time
                                            datetime="<?php get_the_date(); ?>"><?php echo get_the_date(); ?></time>
                                    </p>
                                </div>
                            </div>
                            <?php $introduction = get_post_meta(get_the_ID(), 'custom_introduction', true); ?>

                            <?php if ($introduction != '') {
                                ?>
                                <div class="random-article__content content">
                                    <h2 class="content__titel">Содержание:</h2>
                                    <?php
                                    // Получение содержимого поля "Введение"
                                

                                    // Вывод содержимого "Введения" на странице
                                    if ($introduction) {
                                        $paragraphs = preg_split('/\n+/', $introduction);

                                        // Фильтруем пустые строки
                                        $paragraphs = array_filter($paragraphs);

                                        // Выводим каждый абзац в отдельном элементе списка
                                        echo '<ul class="content__list">';
                                        foreach ($paragraphs as $key => $paragraph) {
                                            // Проверяем, начинается ли строка с '[sub]'
                                            if (strpos($paragraph, '[sub]') === 0) {
                                                // Если да, выводим элемент списка с классом 'padding-right'
                                                echo '<li class="content__li padding-right"><span>' . substr($paragraph, 5) . '</span></li>';
                                            } else {
                                                // Иначе выводим элемент списка с номером и текстом
                                                echo '<li class="content__li">' . ($key + 1) . '.<span>' . $paragraph . '</span></li>';
                                            }
                                        }
                                        echo '</ul>';
                                    }
                                    ?>
                                </div>

                                <?php
                            } ?>

                            <div class="random-article__descriptions descriptions <?php if (!CFS()->get('citate_text') && !CFS()->get('tip_text') & !CFS()->get('danger_text') && !CFS()->get('history_text')) {
                                echo 'none-display';
                            } ?>">
                                <div class="descriptions__grid">
                                    <?php if (CFS()->get('citate_text')) {
                                        ?>
                                        <div class="descriptions__item">
                                            <div class="descriptions__icon">
                                                <img src="<?php echo get_template_directory_uri() . '/'; ?>img/icon1.svg"
                                                    alt="icon">
                                            </div>
                                            <p class="descriptions__text"><?php echo CFS()->get('citate_text'); ?></p>
                                        </div>
                                        <?php
                                    } ?>
                                    <?php if (CFS()->get('tip_text')) {
                                        ?>
                                        <div class="descriptions__item">
                                            <div class="descriptions__icon">
                                                <img src="<?php echo get_template_directory_uri() . '/'; ?>img/icon2.svg"
                                                    alt="icon">
                                            </div>
                                            <p class="descriptions__text"><?php echo CFS()->get('tip_text'); ?></p>
                                        </div>
                                        <?php
                                    } ?>
                                    <?php if (CFS()->get('danger_text')) {
                                        ?>
                                        <div class="descriptions__item">
                                            <div class="descriptions__icon">
                                                <img src="<?php echo get_template_directory_uri() . '/'; ?>img/icon3.svg"
                                                    alt="icon">
                                            </div>
                                            <p class="descriptions__text"><?php echo CFS()->get('danger_text'); ?></p>
                                        </div>
                                        <?php
                                    } ?>
                                    <?php if (CFS()->get('history_text')) {
                                        ?>
                                        <div class="descriptions__item">
                                            <div class="descriptions__icon">
                                                <img src="<?php echo get_template_directory_uri() . '/'; ?>img/icon4.svg"
                                                    alt="icon">
                                            </div>
                                            <p class="descriptions__text"><?php echo CFS()->get('history_text'); ?></p>
                                        </div>
                                        <?php
                                    } ?>

                                </div>

                            </div>
                            <div class="random-article__super-task super-task">
                                <?php the_content(); ?>
                                <?php if (CFS()->get('author_name')) {
                                    ?>
                                    <div class="super-task__block author">

                                        <div class="author__img">
                                            <img src="<?php echo CFS()->get('author_img'); ?>" alt="Author">
                                        </div>
                                        <div class="author__column">
                                            <h3 class="author__subtitel">Автор статьи</h3>
                                            <h2 class="author__titel"><?php echo CFS()->get('author_name'); ?></h2>
                                            <p class="author__text"><?php echo CFS()->get('author_info'); ?></p>
                                        </div>

                                    </div>
                                    <?php
                                } ?>

                            </div>
                            <div class="random-article__favorite favorite">
                                <h2 class="favorite__titel">Избранные записи</h2>
                                <div class="favorite__container">
                                    <div class="favorite__slider swiper-slider">
                                        <div class="favorite__wrapper swiper-wrapper">
                                            <?php
                                            $args = array(
                                                'post_type' => 'post', // Тип записи (посты)
                                                'posts_per_page' => 10, // Количество записей
                                                'category__not_in' => array(get_cat_ID('Uncategorized')), // Исключаем категорию "Uncategorized"
                                                'orderby' => 'date', // Сортировка по дате
                                                'order' => 'DESC' // По убыванию (последние записи)
                                            );

                                            $query = new WP_Query($args);

                                            if ($query->have_posts()):
                                                while ($query->have_posts()):
                                                    $query->the_post(); ?>

                                                    <div class="favorite__slide swiper-slide">

                                                        <div class="favorite__item">
                                                            <div class="favorite__img">
                                                                <a href="<?php the_permalink(); ?>"></a>
                                                                <img src="<?php echo get_the_post_thumbnail_url(); ?>"
                                                                    alt="slide">
                                                            </div>
                                                            <h3 class="favorite__subtitel"><?php the_title(); ?>
                                                            </h3>
                                                            <div class="favorite__quantity">
                                                                <?php echo getPostViews(get_the_ID()); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endwhile;
                                                wp_reset_postdata();
                                            else:
                                                echo 'Нет записей.';
                                            endif;
                                            ?>
                                        </div>
                                    </div>
                                    <button class="favorite__left"><img
                                            src="<?php echo get_template_directory_uri() . '/'; ?>img/arrow-slider.svg"
                                            alt="arrow"></button>
                                    <button class="favorite__right"><img
                                            src="<?php echo get_template_directory_uri() . '/'; ?>img/arrow-slider.svg"
                                            alt="arrow"></button>
                                </div>
                            </div>
                            <?php $gallery = CFS()->get("gallery_imgs"); ?>

                            <?php if (isset($gallery)) {
                                ?>
                                <div class="random-article__gallery gallery">
                                    <div class="gallery__grid">
                                        <?php foreach ($gallery as $item) {
                                            ?>
                                            <div class="gallery__item">
                                                <img src="<?php echo $item['gallery_img']; ?>" alt="gallery-neural">
                                            </div>
                                            <?php
                                        } ?>

                                    </div>
                                </div>
                                <?php
                            } ?>

                        </div>
                        <?php
                        if (comments_open() || get_comments_number()) {
                            // Выводим шаблон комментариев
                            comments_template();
                        }
                        ?>
                       

                    </div>




                    <div class="advertising">
                        <div class="advertising__container">
                            <!-- marginTwo -->
                            <div class="advertising__block">
                            <?php echo do_shortcode('[adinserter block="12"]'); ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <div class="popUp-cookies">
        <div class="popUp-cookies__container">
            <p class="popUp-cookies__text">Мы используем файлы cookie для обеспечения удобства использования нашего
                сайта.</p>
            <div class="popUp-cookies__btn">
                <button class="btn">Отлично</button>
            </div>
        </div>
    </div>
</main>
<!-- ========================================== -->
<?php get_footer(); ?>