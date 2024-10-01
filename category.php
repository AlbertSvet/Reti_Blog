<?php
/*
Template Name: Категория - страница
Template Post Type: page
*/
?>


<?php get_header(); ?>
<!-- ========================================== -->
<main class="page">
    <section class="advertising">
        <div class="advertising__container _containerSub">
            <!-- margin -->
            <div class="advertising__block">
                <?php echo do_shortcode('[adinserter block="5"]'); ?>
            </div>
        </div>
    </section>
    <section class="body">
        <div class="body__container _containerSub">
            <div class="body__grid">
                <?php get_template_part('templates/left'); ?>

                <div class="body__item-right">
                    <div class="block-header">
                        <h1 class="block-header__titel">Виды нейросетей</h1>
                        <div class="block-header__grid">
                            <?php
                            $term_id = get_queried_object_id(); // Получаем ID текущей категории
                            display_custom_neural_networks($term_id); // Выводим данные о нейросетях для текущей категории
                            ?>
                        </div>
                    </div>
                    <div class="block-body">
                        <div class="block-body__grid">

                            <?php
                            $args = array(
                                'cat' => $term_id,
                                'post_type' => 'post',
                                'posts_per_page' => -1, // Показывать все записи, можно указать конкретное количество
                                'category__not_in' => array(get_cat_ID('Uncategorized'))
                            );

                            $query = new WP_Query($args);

                            if ($query->have_posts()):
                                while ($query->have_posts()):
                                    $query->the_post();
                                    ?>
                                    <?php $postId = get_the_ID(); ?>
                                    <div class="block-body__item <?php if (has_tag('top')) { echo 'block-body__item--icon'; } ?>">
                                        <div class="block-body__img">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php $postThumbnailUrl = get_the_post_thumbnail_url(); ?>
                                                <img src="<?php if (isset($postThumbnailUrl)) {
                                                    echo $postThumbnailUrl;
                                                } else {
                                                    echo CFS()->get('post_image');
                                                } ?>" alt="GPT"></a>
                                        </div>

                                        <h2 class="block-body__titel"><?php the_title(); ?></h2>
                                        <p class="block-body__text"><?php echo wp_trim_words(get_the_excerpt(), 10); ?></p>
                                        <div class="block-body__link">
                                            <?php
                                            $tags = CFS()->get('tags_loop', $postId);

                                            if (isset($tags)) {
                                                foreach ($tags as $item) {
                                                }
                                                ?>
                                                <a href="<?php echo $item['tag_link'] ?>"><?php echo $item['tag_name']; ?></a>

                                                <?php
                                            } else {
                                                ?>
                                                <a href="<?php the_permalink(); ?>"><?php _e('Читать далее', 'textdomain'); ?></a>

                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                endwhile;
                            endif;
                            wp_reset_postdata();
                            ?>


                        </div>
                    </div>
                    <div class="advertising">
                        <div class="advertising__container">
                            <!-- margin-category -->
                            <div class="advertising__block border">
                            <?php echo do_shortcode('[adinserter block="6"]'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <button type="button" class="scroll-btn">
        <img class="scroll-btn__Pk" src="<?php echo get_template_directory_uri() . '/'; ?>img/arrow-scroll.svg"
            alt="arrow-scroll">
        <img class="scroll-btn__Mob" src="<?php echo get_template_directory_uri() . '/'; ?>img/arrow-scrollMob.svg"
            alt="arrow-scroll">
    </button>
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