<?php
get_header();
?>

<main class="front-page-header">
    <div class="container">
        <div class="hero">
            <div class="left">
            <?php
                global $post;

                $myposts = get_posts([ 
                    'numberposts' => 1,
                    'category_name'    => 'javascript'
                ]);

                if( $myposts ){
                    foreach( $myposts as $post ){
                        setup_postdata( $post );
                        ?>
                <img src="<?php the_post_thumbnail_url() ?>" alt="" class="post-thumb" />
                <a href="#" class="author">
                    <img src="" alt="" class="avatar" />
                    <div class="author-bio">
                        <span class="author-name"><?php the_author() ?></span>
                        <span class="author-rank">Разработчик</span>
                    </div>
                </a>
                <div class="post-text">
                    <?php the_category() ?>
                    <h2 class="post-title">
                        Самые крутые функции в javascript для новичка
                    </h2>
                    <a href="#" class="more">Читать далее</a>
                </div>
            </div>
            <!-- /.left -->
                <?php 
                    }
                } else {
                    ?> <p>Постов не найдено</p> <?php 
                    // Постов не найдено
                }
                wp_reset_postdata(); // Сбрасываем $post
            ?>
                <!-- Выводим записи -->
                
            <div class="right">
                <h3 class="recommend">Рекомендуем</h3>
                <ul class="posts-list">
                    <!-- Выводим записи -->
                    <li class="post">
                        <a href="#" class="category-link css">CSS</a>
                        <a class="post-permalink" href="#">
                            <h4 class="post-title">
                                Новые возможности языка стилей
                            </h4>
                        </a>
                    </li>
                    <!-- Выводим записи -->
                    <li class="post">
                        <a href="#" class="category-link web-design"
                            >Web Design</a
                        >
                        <a class="post-permalink" href="#">
                            <h4 class="post-title">
                                Где взять реальные проекты для портфолио
                            </h4>
                        </a>
                    </li>
                    <!-- Выводим записи -->
                    <li class="post">
                        <a href="#" class="category-link javascript"
                            >JavaScript</a
                        >
                        <a class="post-permalink" href="#">
                            <h4 class="post-title">
                                20+ инструментов для js-разработчика
                            </h4>
                        </a>
                    </li>
                    <!-- Выводим записи -->
                    <li class="post">
                        <a href="#" class="category-link web-design"
                            >Web Design</a
                        >
                        <a class="post-permalink" href="#">
                            <h4 class="post-title">Удачные референсы</h4>
                        </a>
                    </li>
                    <!-- Выводим записи -->
                    <li class="post">
                        <a href="#" class="category-link javascript"
                            >JavaScript</a
                        >
                        <a class="post-permalink" href="#">
                            <h4 class="post-title">Топ плагинов jQuery</h4>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- /.right -->
        </div>
        <!-- /.hero -->
    </div>
    <!-- /.container -->
</main>

<?php
get_footer();
