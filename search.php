<?php get_header(); ?>
<!-- ========================================== -->
<main class="page">
    <div class="advertising">
        <div class="advertising__container _containerSub">
            <!-- margin -->
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
                    <div class="body__article article">
                        <h1 class="article__titel">Результаты поисков</h1>
                        <div class="article__grid">
                            <?php if (have_posts()):
                                while (have_posts()):
                                    the_post(); ?>
                                    <div class="article__item">
                                        <div class="article__img">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('thumbnail'); ?>
                                            </a>
                                        </div>
                                        <div class="article__block">
                                            <h2 class="article__subtitel"><a
                                                    href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                            <p class="article__text"><?php the_excerpt(); ?></p>
                                        </div>
                                    </div>
                                <?php endwhile; else: ?>
                                <p><?php esc_html_e('Извините, ничего не найдено.'); ?></p>
                            <?php endif; ?>
                        </div>

                    </div>

                    <div class="advertising">
                        <div class="advertising__container">
                            <!-- marginArticle -->
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