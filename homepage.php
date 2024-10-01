<?php
/*
Template Name: Главная страница
Template Post Type: page
*/
?>

<?php get_header(); ?>

<!-- ========================================== -->
<main class="page">

    <section class="gpt">
        <div class="gpt__container _container">
            <div class="gpt__container-block">
                <div class="gpt__slider swiper-slider">
                    <div class="gpt__wrapper swiper-wrapper">

                        <?php $mainSlider = CFS()->get('slider_loop');
                        if (isset($mainSlider)) {
                            foreach ($mainSlider as $item) {
                                ?>
                                <div style="background-image: url(<?php echo $item['slide_img']; ?>);"
                                    class="gpt__slide slide-one swiper-slide">
                                    <h2 class="gpt__titel" data-swiper-parallax="-300%"> <?php echo $item['slide_title']; ?>
                                    </h2>
                                    <div class="gpt__mobil-item">
                                        <h2 class="gpt__mobil-titel" data-swiper-parallax="-300%">
                                            <?php echo $item['slide_title']; ?>
                                        </h2>
                                        <p class="gpt__mobil-text" data-swiper-parallax="-100%">
                                            <?php echo $item['slide_text']; ?>
                                        </p>
                                    </div>
                                </div>

                                <?php
                            }
                        }
                        ?>

                        <!-- <div class="gpt__slide slide-one swiper-slide">
                            <h2 class="gpt__titel" data-swiper-parallax="-300%">Мы любим животных <br>стараемся
                                поддерживать </h2>
                            <div class="gpt__mobil-item">
                                <h2 class="gpt__mobil-titel" data-swiper-parallax="-300%">Мы любим животных стараемся
                                    поддерживать </h2>
                                <p class="gpt__mobil-text" data-swiper-parallax="-100%">Мы любим животных и стараемся
                                    поддерживать тех из них, кому не посчастливилось иметь ласковых хозяев и тёплый
                                    кров. Один из проверенных способов это сделать — помочь благотворительному </p>
                            </div>
                        </div> -->

                        <!-- <div class="gpt__slide slide-two swiper-slide">
                            <h2 class="gpt__titel" data-swiper-parallax="-300%">Cистемы обучения кадров</h2>
                            <div class="gpt__mobil-item">
                                <h2 class="gpt__mobil-titel" data-swiper-parallax="-300%">Cистемы обучения кадров</h2>
                                <p class="gpt__mobil-text" data-swiper-parallax="-100%">Равным образом, понимание сути
                                    ресурсосберегающих технологий влечет за собой процесс внедрения и модернизации
                                    системы обучения кадров, соответствующей насущным потребностям.</p>
                            </div>
                        </div>
                        <div class="gpt__slide slide-tri swiper-slide">
                            <h2 class="gpt__titel" data-swiper-parallax="-300%">Формированию позиции,<br>в своём
                                классическом</h2>
                            <div class="gpt__mobil-item">
                                <h2 class="gpt__mobil-titel" data-swiper-parallax="-300%">Формированию позиции, в своём
                                    классическом</h2>
                                <p class="gpt__mobil-text" data-swiper-parallax="-100%">Значимость этих проблем
                                    настолько очевидна, что начало повседневной работы по формированию позиции, в своём
                                    классическом представлении, допускает внедрение благоприятных перспектив.</p>
                            </div>
                        </div> -->
                    </div>

                </div>
                <div class="gpt__block">
                    <div class="gpt__block-Arrow">
                        <button type="button" class="gpt__left"><img
                                src="<?php echo get_template_directory_uri() . '/'; ?>img/Arrow 1.svg"
                                alt="arrow"></button>
                        <button type="button" class="gpt__rigth"><img
                                src="<?php echo get_template_directory_uri() . '/'; ?>img/Arrow 1.svg"
                                alt="arrow"></button>
                    </div>
                    <div class="gpt__scrollBar">
                        <div class="swiper-scrollbar"></div>
                    </div>
                    <div class="gpt__grid">
                        <?php $mainSlider = CFS()->get('slider_loop');
                        if (isset($mainSlider)) {
                            foreach ($mainSlider as $item) {
                                ?>
                                <div class="gpt__item">
                                    <h3 class="gpt__subtitel"><?php echo $item['slide_title']; ?></h3>
                                    <p class="gpt__subText"><?php echo $item['slide_text']; ?></p>
                                </div>

                                <?php
                            }
                        }
                        ?>

                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="advertising ">
        <div class="advertising__container _containerSub">
            <!-- margin -->
            <div class="advertising__block">
                <?php echo do_shortcode('[adinserter block="1"]'); ?>
            </div>
        </div>
    </section>

    <section class="top-neural">
        <div class="top-neural__container _container">
            <h2 class="top-neural__titel titel">Топ-10 нейросетей</h2>
            <div class="top-neural__grid">
                <?php
                $args = array(
                    'cat' => 15, // ID рубрики
                    'posts_per_page' => 10, // Количество записей
                    'orderby' => 'date', // Сортировка по дате
                    'order' => 'DESC' // По убыванию (последние записи)
                );

                $query = new WP_Query($args);

                if ($query->have_posts()):
                    while ($query->have_posts()):
                        $query->the_post(); ?>
                        <div class="top-neural__item">
                            <img src="<?php echo CFS()->get('post_image'); ?>" alt="slide">
                            <h3 class="top-neural__subtitel"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p class="top-neural__text"><?php echo wp_trim_words(get_the_excerpt(), 16) . ''; ?></p>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                else:
                    ?>
                    <div class="top-neural__item">
                        <h3 class="top-neural__subtitel">На данный момент записи недоступны или ещё не созданы</h3>
                        <!-- <p class="top-neural__text"><?php echo wp_trim_words(get_the_excerpt(), 5) . ''; ?></p> -->
                    </div>

                    <?php
                endif;
                ?>
            </div>
        </div>
    </section>

    <section class="new">
        <div class="new__container _container">
            <h2 class="new__titel titel">Новое на сайте</h2>
            <div class="new__grid">
                <?php
                $args = array(
                    'post_type' => 'post', // Тип записи (посты)
                    'posts_per_page' => 6, // Количество записей
                    'category__not_in' => array(get_cat_ID('Uncategorized')), // Исключаем категорию "Uncategorized"
                    'orderby' => 'date', // Сортировка по дате
                    'order' => 'DESC' // По убыванию (последние записи)
                );

                $query = new WP_Query($args);

                if ($query->have_posts()):
                    while ($query->have_posts()):
                        $query->the_post(); ?>
                        <div class="new__item">
                            <h3 class="new__subtitel"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p class="new__text"><?php echo wp_trim_words(get_the_excerpt(), 10) . ''; ?></p>
                            <p class="new__data"><?php echo get_the_date(); ?></p>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                else:
                    echo 'Нет записей.';
                endif;
                ?>



            </div>
        </div>
    </section>

    <section class="marketer">
        <div class="marketer__container _container">
            <div class="marketer__block">
                <div class="marketer__img">
                    <img src="<?php echo cfs()->get('avtor'); ?>">
                </div>
                <div class="marketer__item">
                    <h3 class="marketer__titel"><?php echo cfs()->get('name_avtor'); ?></h3>
                    <h4 class="marketer__subtitel"><?php echo cfs()->get('title'); ?></h4>
                    <p class="marketer__text"><?php echo cfs()->get('text'); ?></p>

                    <!-- <h3 class="marketer__titel">Марк Кондрашов</h3>
                    <h4 class="marketer__subtitel">Интернет-маркетолог, специалист по SEO,<br> работал в топовых
                        IT-компаниях России.</h4>
                    <p class="marketer__text">Значимость этих проблем настолько очевидна, что начало повседневной работы
                        по формированию позиции, в своём классическом представлении, допускает внедрение благоприятных
                        перспектив. Значимость этих проблем настолько очевидна, что начало повседневной работы по
                        формированию позиции, в своём классическом представлении, допускает внедрение благоприятных
                        перспектив.</p> -->
                </div>
            </div>
            <div class="marketer__subBlock">
                <p class="marketer__subText"><?php echo cfs()->get('text_article'); ?></p>
                <!-- <p class="marketer__subText">Уже сегодня вы можете серьёзно облегчить вашу жизнь при помощи нейросетей.
                    Приведу конкретные примеры. Например, если вы пишете научную работу по определённой теме, хороший
                    чат-бот может составить вам список литературы по ней. Если вы SEO-специалист и составляете список
                    ключевых слов, то нейросеть может предоставить вам список похожих слов или фраз, генерируя за вас
                    идеи. Если, допустим, вам нужно сделать миниатюру для YouTube в Canva, нейросеть составит для вас
                    список действий и объяснит, как это сделать. Если вы написали какой-то текст, она может составить
                    его критику, причём и от лица профессионала, и от лица обывателя. А может и переписать текст таким
                    образом, чтобы он звучал более профессионально.
                </p>
                <p class="marketer__subText">Есть нейросети, которые ищут музыку, похожую на ту, которая вам нравится.
                    Есть нейросети, которые вкратце пересказывают большие статьи, книги или содержание видео. Есть
                    нейросети, которые исправляют грамматические и орфографические ошибки. Некоторые из них могут
                    написать за вас текст письма таким образом, чтобы оно звучало вежливо и корректно. Некоторые могут
                    порекомендовать модели электроники, исходя из ваших требований и бюджета. Некоторые обеспечивают
                    очень качественный перевод текста на другой язык.
                </p>
                <p class="marketer__subText">Всё вышесказанное представляет собой лишь небольшое количество примеров
                    того, как нейросети начинают повышать качество нашей производительности и удобство нашей жизни. Наш
                    сайт помогает вам найти такие примеры и конкретные нейросети к ним.
                </p> -->
            </div>
        </div>
    </section>

    <section class="types-neural">
        <div class="types-neural__container _container">
            <h2 class="types-neural__titel titel">Виды нейросетей</h2>
            <div class="types-neural__grid">

                <div class="types-neural__item">
                    <a href="">ResNet²</a>
                </div>
                <div class="types-neural__item">
                    <a href="">ResNet²</a>
                </div>
                <div class="types-neural__item">
                    <a href="">ResNet²</a>
                </div>
                <div class="types-neural__item">
                    <a href="">ResNet²</a>
                </div>
                <div class="types-neural__item">
                    <a href="">ResNet²</a>
                </div>
                <div class="types-neural__item">
                    <a href="">ResNet²</a>
                </div>

                <div class="types-neural__item">
                    <a href="">ResNet²</a>
                </div>
                <div class="types-neural__item">
                    <a href="">ResNet²</a>
                </div>
                <div class="types-neural__item">
                    <a href="">ResNet²</a>
                </div>
                <div class="types-neural__item">
                    <a href="">ResNet²</a>
                </div>
                <div class="types-neural__item">
                    <a href="">ResNet²</a>
                </div>
                <div class="types-neural__item">
                    <a href="">ResNet²</a>
                </div>

                <div class="types-neural__item">
                    <a href="">ResNet²</a>
                </div>
                <div class="types-neural__item">
                    <a href="">ResNet²</a>
                </div>
                <div class="types-neural__item">
                    <a href="">ResNet²</a>
                </div>
                <div class="types-neural__item">
                    <a href="">ResNet²</a>
                </div>
                <div class="types-neural__item">
                    <a href="">ResNet²</a>
                </div>
                <div class="types-neural__item">
                    <a href="">ResNet²</a>
                </div>

                <div class="types-neural__item">
                    <a href="">ResNet²</a>
                </div>
                <div class="types-neural__item">
                    <a href="">ResNet²</a>
                </div>
            </div>
        </div>
    </section>
    <section class="advertising">
        <div class="advertising__container _containerSub">
            <div class="advertising__block"> <!-- margin-footer -->
                <?php echo do_shortcode('[adinserter block="2"]'); ?>
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