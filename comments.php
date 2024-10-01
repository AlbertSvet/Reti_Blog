<?php

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments">



    <?php
        $current_user = wp_get_current_user();

        $post_id = get_the_ID();
        $html5 = true;
    // You can start editing here -- including this comment!
    if (have_comments()):
        ?>
        <div class="comments__blockTitel">
            <h2 class="comments__titel">Все комментарии</h2>
        </div>

        <?php the_comments_navigation(); ?>

        <ol class="comments__body">
            <?php
            wp_list_comments(
                array(
                    'walker' => new Bootstrap_Walker_Comment(),
                    'max_depth' => '3',
                    'style' => 'ol',
                    'callback' => null,
                    'end-callback' => null,
                    'type' => 'all',
                    'reply_text' => ('Ответить'),
                    'page' => '',
                    'per_page' => '30',
                    'avatar_size' => 38,
                    'format' => 'html5', // или xhtml, если HTML5 не поддерживается темой
                    'short_ping' => false,    // С версии 3.6,
                    'echo' => true,     // true или false
                )
            );
            ?>
        </ol><!-- .comment-list -->

        <?php
        the_comments_navigation();

        // If comments are closed and there are comments, let's leave a little note, shall we?
        if (!comments_open()):
            ?>
            <p class="no-comments"><?php esc_html_e('Comments are closed.', 'comment'); ?></p>
            <?php
        endif;

    endif; // Check for have_comments().
    $defaults = [
        'fields' => [
            'author' => '<div class="form__input">
                <input data-in placeholder="Ваше имя" id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . ( isset($aria_req) ? $aria_req : '' ) . ( isset($html_req) ? $html_req : '' ) . ' />
            </div>',
            'email' => '<div class="form__input">
                <input data-in placeholder="Email" id="email" name="email" type="email" ' . ($html5 ? 'type="email"' : 'type="text"') . ' value="' . esc_attr($commenter['comment_author_email']) . '" size="30" aria-describedby="email-notes" />
            </div>',
            'image' => '<div class="form__file">
                <label class="form__label" for="comment_image">Нажмите чтобы добавить файлы к сообщению. 
                <span class="form__span">Можно добавить файлы с разрешением jpg, jpeg, bmp, gif, png </span>
                </label>
                <input type="file" name="comment_image" id="comment_image">
            </div>',
            'block' => '<div class="form_previe" id="BlockPrevie"></div>',


        ],
        'comment_field' => '<div class="form__blockText">
            <textarea data-in placeholder="Оставьте комментарий" id="comment" name="comment" cols="45" rows="8"  aria-required="true" required="required"></textarea>
        </div>',

        'must_log_in' => '<p class="must-log-in">' .
            sprintf(__('Вам нужно <a href="%s">Войти</a> чтобы оставить комментарий.'), wp_login_url(apply_filters('the_permalink', get_permalink($post_id)))) . '
         </p>',
        'logged_in_as' => '<p class="logged-in-as">' .
            sprintf(__('<a href="%1$s" aria-label="Вы вошли как %2$s.">Вы вошли как %2$s</a>. <a href="%3$s">Выйти?</a>'), get_edit_user_link(), $user_identity, wp_logout_url(apply_filters('the_permalink', get_permalink($post_id)))) . '
         </p>' . 
         '<input class="hidden" name="author" value="' . $current_user->display_name . '"/>' .
         '<input class="hidden" name="email" value="'. $current_user->user_email.'"/>'

        ,
        'comment_notes_after' => '',
        'id_form' => 'commentform',
        'id_submit' => 'submit',
        'class_container' => 'comment-respond',
        'class_form' => 'comment-form',
        'class_submit' => 'form__btn',
        'name_submit' => 'submit',
        'title_reply' => __('Ответить на комментарий'),
        'title_reply_to' => __('Ответить%s'),
        'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title">',
        'title_reply_after' => '</h3>',
        'cancel_reply_before' => ' <small>',
        'cancel_reply_after' => '</small>',
        'cancel_reply_link' => __('Отменить отправку'),
        'label_submit' => __('Отправить комментарий'),
        'submit_button' => '<button type="submit" class="btn">Отправить</button>',
        'submit_field' => '<div class="form__btnTwo">%1$s %2$s</div>',
        'format' => 'html5',
    ];

    comment_form($defaults);
    ?>

</div><!-- #comments -->



<!-- <div class="body__comments comments">
    <div class="comments__blockTitel">
        <h2 class="comments__titel">Все комментарии</h2>
    </div>
    <div class="comments__body">
        <div class="comments__item">
            <div class="comments__blockAutor">
                <div class="comments__icon">
                    <img src="<?php echo get_template_directory_uri() . '/'; ?>img/icon-comments.svg" alt="icon-comments">
                </div>
                <p class="comments__name">Autor</p>
                <p class="comments__lastTime">11 часов назад</p>
            </div>
            <p class="comments__commentsText">В наши времена хороший врач на вес золота. Я с коленкой два года мучился,
                все хирургии города Воронежа проехал, ни где не ставили точный диагноз.</p>
            <button class="comments__btn">Ответить <span>(1)</span></button>
        </div>
        <div class="comments__item comments__item--answer">
            <div class="comments__blockAutor">
                <div class="comments__icon">
                    <img src="<?php echo get_template_directory_uri() . '/'; ?>img/icon-comments.svg" alt="icon-comments">
                </div>
                <p class="comments__name">Autor</p>
                <p class="comments__lastTime">11 часов назад</p>
            </div>
            <p class="comments__commentsText">В наши времена хороший врач на вес золота. Я с коленкой два года мучился,
                все хирургии города Воронежа проехал, ни где не ставили точный диагноз.</p>
            <button class="comments__btn">Ответить <span>(1)</span></button>
        </div>
        <div class="comments__item">
            <div class="comments__blockAutor">
                <div class="comments__icon">
                    <img src="<?php echo get_template_directory_uri() . '/'; ?>img/icon-comments.svg" alt="icon-comments">
                </div>
                <p class="comments__name">Autor</p>
                <p class="comments__lastTime">11 часов назад</p>
            </div>
            <p class="comments__commentsText">В наши времена хороший врач на вес золота. Я с коленкой два года мучился,
                все хирургии города Воронежа проехал, ни где не ставили точный диагноз.</p>
            <button class="comments__btn">Ответить <span>(1)</span></button>
        </div>
        <div class="comments__item">
            <div class="comments__blockAutor">
                <div class="comments__icon">
                    <img src="<?php echo get_template_directory_uri() . '/'; ?>img/icon-comments.svg" alt="icon-comments">
                </div>
                <p class="comments__name">Autor</p>
                <p class="comments__lastTime">11 часов назад</p>
            </div>
            <p class="comments__commentsText">В наши времена хороший врач на вес золота. Я с коленкой два года мучился,
                все хирургии города Воронежа проехал, ни где не ставили точный диагноз.</p>
            <button class="comments__btn">Ответить <span>(1)</span></button>
        </div>
    </div>

</div> -->