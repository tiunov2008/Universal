
<?php

if ( ! is_active_sidebar( 'main-sidebar' ) ) {
    return;
}
?>
<!-- Подключаем верхний сайдбар -->
<aside id="secondary" class="sidebar-front-page">
    <?php dynamic_sidebar('main-sidebar'); ?>
</aside>
<!-- #sidebar -->
