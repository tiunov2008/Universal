
<?php

if ( ! is_active_sidebar( 'main-sidebar-bottom' ) ) {
    return;
}
?>
<!-- Подключаем верхний сайдбар -->
<aside id="main-sidebar-bottom" class="sidebar-front-page">
    <?php dynamic_sidebar('main-sidebar-bottom'); ?>
</aside>
<!-- #sidebar -->
