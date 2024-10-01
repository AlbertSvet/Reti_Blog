<?php
/*
Template Name: Статьи
Template Post Type: page
*/
?>


<?php get_header(); ?>
<!-- ========================================== -->
<main class="page">
    <div class="advertising">
        <div class="advertising__container _containerSub">
                <!-- margin -->
            <div class="advertising__block ">
                <?php echo do_shortcode('[adinserter block="4"]'); ?>
            </div>
        </div>
    </div>
    <section class="body">
        <div class="body__container _containerSub">
            <div class="body__grid">
                <?php get_template_part('templates/left'); ?>
                <div class="body__item-right">
                    <div class="body__article article">
                        <h1 class="article__titel">Категория статей</h1>
                        <div class="article__grid">
                            <?php
                            // Получаем список рубрик, исключая "Uncategorized"
                            $categories = get_categories(
                                array(
                                    'exclude' => get_cat_ID('Uncategorized') // Исключаем категорию "Uncategorized"
                                )
                            );

                            // Перебираем каждую рубрику
                            foreach ($categories as $category) {
                                // Получаем URL для thumbnail (если используется)
                                $current_category_id = $category->term_id;
                                $category_thumbnail_url = get_term_meta($current_category_id, 'category_thumbnail_url', true);
                                // Получаем ссылку на рубрику
                                $category_link = get_category_link($category->term_id);
                                ?>
                                <div class="article__item">
                                    <div class="article__img">
                                        <img src="<?php echo $category_thumbnail_url ?>" alt="изображение категории">
                                    </div>
                                    <div class="article__block">
                                        <h2 class="article__subtitel"><a
                                                href="<?php echo esc_url($category_link); ?>"><?php echo esc_html($category->name); ?></a>
                                        </h2>
                                        <p class="article__text"><?php echo esc_html($category->description); ?></p>
                                        <!-- Если нужно отобразить дату создания рубрики -->
                                        <!-- <time class="article__data" datetime="<?php //echo esc_attr($category->date);  ?>"><?php //echo esc_html($category->date);  ?></time> -->
                                    </div>
                                </div>
                                <?php
                            }
                            ?>

                        </div>
                    </div>

                    <div class="advertising">
                        <div class="advertising__container">
                            <!--marginArticle -->
                            <div class="advertising__block">
                                 <?php echo do_shortcode('[adinserter block="3"]'); ?>
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