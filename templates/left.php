<div class="body__item-left">
    <div class="body__advertising">
        <?php echo do_shortcode('[adinserter block="9"]'); ?>
    </div>
    <div class="body__become">
        <h2 class="body__subTitel">Случайная статья</h2>

        <div class='random-post-wrap'>

        </div>
        <!-- <h3 class="body__subTitelTwo">Носки с ИИ предупредят об опасном дистрессе у пациентов</h3>
        <p class="body__text">В целом, конечно, современная методология разработки способствует
            повышению качества анализа существующих паттернов поведения...</p> -->
        <div class="body__btn">
            <button type="submit" class="btn refresh-random-post">Обновить</button>
        </div>
        <script>
            const refreshBtn = document.querySelector('.refresh-random-post');
            const randomPostWrap = document.querySelector('.random-post-wrap');

            if (refreshBtn) {
                GetRandomPost();
                refreshBtn.addEventListener('click', () => {
                    GetRandomPost();
                })

                function GetRandomPost() {
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', '<?php echo admin_url('admin-ajax.php'); ?>?action=get_random_post', true);
                    xhr.onload = () => {
                        if (xhr.status >= 200 && xhr.status != 400) {
                            randomPostWrap.innerHTML = xhr.responseText;
                        } else {
                            console.log('Ошибка!');
                        }
                    }
                    xhr.onerror = () => {
                        console.log('Ещё раз ошибка');
                    }
                    xhr.send();
                }
            }
        </script>
    </div>
    <div class="body__advertisingTwo">
    <?php echo do_shortcode('[adinserter block="10"]'); ?>
    </div>
    <form action="#" class="body__form form">
        <h2 class="form__titel">Опрос</h2>
        <p class="form__text">1.В целом, конечно, современная методология разработки?</p>
        <div class="form__block">
            <input type="radio" id="reading" name="choice" value="option1" checked>
            <label for="reading">Да, я читаю все, что публикуется</label>
        </div>
        <div class="form__block">
            <input type="radio" id="forum" name="choice" value="option2">
            <label for="forum">Я читаю статьи только на форуме</label>
        </div>
        <div class="form__block">
            <input type="radio" id="No" name="choice" value="option3">
            <label for="No">Нет, интересного мало</label>
        </div>
        <div class="form__btn">
            <button type="submit" class="btn">Отправить</button>
        </div>
    </form>
</div>