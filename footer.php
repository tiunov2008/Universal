<footer class="footer">
    <div class="container">
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
                wp_nav_menu( [
                    'theme_location'  => 'footer_menu',
                    'container'       => 'nav', 
                    'container_id'    => '',
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