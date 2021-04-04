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
                <form action="form.php" class="contacts-form" method="POST">
                    <input name="contact_name" type="text" class="input contacts-input" placeholder="Ваше имя">
                    <input name="contact_email" type="email" class="input contacts-input" placeholder="Ваш Email">
                    <textarea name="contact_comment" id="" class="textarea contacts-textarea" placeholder="Ваш вопрос"></textarea>
                    <button type="submit" class="button more">Отправить</button>
                </form>
                <?php //do_shortcode( '[contact-form-7 id="151" title="contact_form"]' );?>
            </div>
            <!-- /.left -->
            <div class="right">
                <h2 class="contacts-title">Или по этим контактам</h2>
                <?php 
                    /*the_field('date');
                    echo '<br>';
                    echo '<br>';*/
                    //email
                    echo '<a href="mailto:';
                    the_field('email'); 
                    echo '">' ;
                    the_field('email');
                    echo '</a>';
                    //address
                    echo '<address>';
                    the_field('address'); 
                    echo '</address>' ;
                    //phone
                    echo '<a href="tel:';
                    the_field('phone'); 
                    echo '">' ;
                    the_field('phone');
                    echo '</a>';
                    //date
                    echo '<span>';
                    the_field('date'); 
                    echo '</span>';
                ?>
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