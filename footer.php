<footer class="footer">

    <div class="container">
        <div class="footer-form-wrapper">
            <h3 class="footer-form-title">Подпишитесь на нашу рассылку</h3>
            <form class="footer-form" action="https://app.getresponse.com/add_subscriber.html" accept-charset="utf-8" method="post">
                <input required type="text" name="email" placeholder="email"/>
                <!-- Токен списка -->
                <!-- Получить API ID на: https://app.getresponse.com/campaign_list.html -->
                <input type="hidden" name="campaign_token" value="BHZ1S" />
                <input type="hidden" name="thankyou_url" value="<?php ?>" />
                <!-- Добавить подписчика в цикл на определенный день (по желанию) -->
                <input type="hidden" name="start_day" value="0" />
                <!-- Кнопка подписаться -->
                <button type="submit">Подписаться</button>
            </form>
        </div>
            <?php

        if ( ! is_active_sidebar( 'sidebar-footer' ) ) {
            return;
        }
        ?>
        <!-- Подключаем верхний сайдбар -->
        <div class="footer-menu-bar">
            <?php dynamic_sidebar('sidebar-footer'); ?>
        </div>
        <!-- #sidebar -->
        <!-- ./footer-menu-bar -->
        
        <div class="footer-info">
            <?php 
                if( has_custom_logo() ){
                    echo '<div class="logo">' . get_custom_logo() . '</div>';
                    } else {
                    } 
                wp_nav_menu( [
                    'theme_location'  => 'footer_menu',
                    'container'       => 'nav', 
                    'container_id'    => '',
                    'container_class' => 'footer-nav-wrapper', 
                    'menu_class'      => 'footer-nav', 
                    'echo'            => true,
                ] );
                $instance = array(
                    'title' => null,
                    'facebook' => 'https://www.figma.com',
                    'instagram' => 'https://www.figma.com',
                    'twitter' => 'https://www.figma.com',
                    'youtube' => '',
                    'vk' => '',
                );
                $args = array(
                    'before_widget' => '<div class="footer-social">',
                    'after_widget' => '</div>',
                );
        the_widget( 'Social_Widget', $instance, $args )?>
        </div>
        <!-- /.footer-info -->
        
        <div class="footer-text-wrapper">
        <?php dynamic_sidebar('sidebar-footer-text'); ?>
            <span class="footer-copyright"
                ><?php echo date('Y') . ' &copy ' . get_bloginfo('name');?></span
            >
            <!-- /.footer-copyright -->
        </div>
        <!-- /.footer-text-wrapper -->
    </div>
    <!-- /.container -->
</footer>
<!-- /.footer -->



<?php wp_footer() ?>
</body>
</html>