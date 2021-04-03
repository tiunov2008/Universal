<?php
/*
Template Name: Страница контакты
Template Post Type:  page
*/

// … остальной код шаблона
get_header()
?>
<section class="section-dark">
    <div class="container">
        <h1 class="page-title"><?php the_title() ?></h1>
        <div class="contacts-wrapper">
            <div class="left">
                <h2 class="contacts-title">Через форму обратной связи</h2>
                <p>Заполните форму обратной связи</p>
                <!--<form action="form.php" class="contacts-form" method="POST">
                    <input name="contact_name" type="text" class="input contacts-input" placeholder="Ваше имя">
                    <input name="contact_email" type="email" class="input contacts-input" placeholder="Ваш Email">
                    <textarea name="contact_comment" id="" class="textarea contacts-textarea" placeholder="Ваш вопрос"></textarea>
                    <button type="submit" class="button more">Отправить</button>
                </form>-->
                <?php do_shortcode( '[contact-form-7 id="151" title="contact_form"]' );?>
            </div>
            <!-- /.left -->
            <div class="right">
                <h2 class="contacts-title">Или по этим контактам</h2>
                <?php 
                    $email = get_post_meta(get_the_ID(), 'email', true); 
                    if ($email) {
                    echo '<a href="mailto:' . $email . '">' . $email . '</a>';
                    };
                    $address = get_post_meta(get_the_ID(), 'address', true); 
                    if ($address) {
                    echo '<address>' . $address . '</address>';
                    };
                    $phone = get_post_meta(get_the_ID(), 'phone', true); 
                    if ($phone) {
                    echo '<a href="tel:' . $phone . '">' . $phone . '</a>';
                    };

                    the_field('date');
                ?>
                <a href="tel:+2 800 089 45-34">+2 800 089 45-34</a>
            </div>
        <!-- /.right -->
        </div>
        <!-- /.contacts-wrapper -->
    </div>
    <!-- /.container -->
</section>
<!-- /.section-dark -->
<?php
get_footer()
?>