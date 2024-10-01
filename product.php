<?php
/*
Template Name: Продукт
Template Post Type: post
*/
?>


<?php get_header(); ?>
<!-- ========================================== -->
<main class="page">
    <div class="advertising">
        <div class="advertising__container _containerSub">
            <!-- margin -->
            <div class="advertising__block">
                <?php echo do_shortcode('[adinserter block="7"]'); ?>
            </div>
        </div>
    </div>
    <section class="body">
        <?php $pageId = get_the_ID(); ?>
        <div class="body__container _containerSub">
            <div class="body__grid">
                <?php get_template_part('templates/left'); ?>
                <div class="body__item-right">
                    <div class="body__card card">
                        <div class="card__block">
                            <div class="card__img"><img
                                    src="<?php echo get_the_post_thumbnail_url(); ?>"
                                    alt="Chat-GPT"></div>
                            <div class="card__item">
                                <h2 class="card__titel"><?php echo get_the_title(); ?></h2>

                                <?php $links = CFS()->get('tags_loop', $pageId); ?>

                                <?php
                                if (isset($links)) {
                                    ?>

                                    <div class="card__link">
                                        <?php foreach ($links as $link) {
                                            ?>
                                            <a href="<?php echo $link['tag_link'] ?>"><?php echo $link['tag_name'] ?></a>
                                            <?php
                                        } ?>

                                    </div>
                                    <?php
                                }
                                ?>

                                <h3 class="card__subtitel"><?php echo CFS()->get("product_born") ?></h3>
                                <p class="card__text"><?php echo CFS()->get('product_desc'); ?></p>
                                <div class="card__btn">
                                    <a href="<?php echo CFS()->get('product_link'); ?>" class="btn">Перейти на сайт</a>
                                </div>
                            </div>
                        </div>
                        <?php the_content(); ?>
                        <div class="card__similar-neural">
                            <h2 class="card__titelTwo">Похожие нейросети</h2>
                            <div class="card__grid">

                                <?php
                                $args = array(
                                    'cat' => 15, // ID рубрики
                                    'posts_per_page' => 3, // Количество записей
                                    'orderby' => 'date', // Сортировка по дате
                                    'order' => 'DESC' // По убыванию (последние записи)
                                );

                                $query = new WP_Query($args);

                                if ($query->have_posts()):
                                    while ($query->have_posts()):
                                        $query->the_post(); ?>

                                        <div class="card__itemGrid">
                                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="IMG">
                                            <a href="<?php echo the_permalink(); ?>"
                                                class="card__subtitelGrid"><?php echo get_the_title(); ?><span>,
                                                    <?php echo wp_trim_words(get_the_excerpt(), 10) . '...'; ?></span></a>
                                        </div>
                                    <?php endwhile;
                                    wp_reset_postdata();
                                else:
                                    ?>
                                    <div class="top-neural__item">
                                        <h3 class="top-neural__subtitel">На данный момент записи недоступны или ещё не
                                            созданы</h3>
                                        <!-- <p class="top-neural__text"><?php echo wp_trim_words(get_the_excerpt(), 20) . '...'; ?></p> -->
                                    </div>

                                    <?php
                                endif;
                                ?>

                            </div>
                        </div>
                    </div>

                    <div class="advertising">
                        <div class="advertising__container">
                            <!-- marginGptChat -->
                            <div class="advertising__block border">
                            <?php echo do_shortcode('[adinserter block="8"]'); ?>
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