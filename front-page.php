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
                ]);

                if( $myposts ){
                    foreach( $myposts as $post ){
                        setup_postdata( $post );
                        ?>                        
                <img src="<?php the_post_thumbnail_url() ?>" alt="" class="post-thumb" />
                <?php $author_id = get_the_author_meta('ID') ?>
                <a href="<?php echo get_author_posts_url( $author_id ) ?>" class="author">
                    <img src="<?php echo get_avatar_url($author_id)?>" alt="" class="avatar" />
                    <div class="author-bio">
                        <span class="author-name"><?php the_author() ?></span>
                        <span class="author-rank">Разработчик</span>
                    </div>
                </a>
                <div class="post-text">
                    <?php //the_category() 
                    foreach(get_the_category() as $category){
                            printf(
                                '<a href="%s" class="category-link %s">%s </a>',
                                esc_url(get_category_link( $category )) ,
                                esc_html($category -> slug),
                                esc_html($category -> name)
                            );
                    }
                    ?>
                    <h2 class="post-title">
                        <?php echo mb_strimwidth(get_the_title(), 0 , 60, "...")  ?>
                    </h2>
                    <a href="<?php echo get_the_permalink() ?>" class="more">Читать далее</a>
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
                    <?php
                    global $post;

                    $myposts = get_posts([ 
                        'numberposts' => 5,
                        'offset' => 1,
                        'category_name' => 'javascript , css ,html, web-design',
                    ]);

                    if( $myposts ){
                        foreach( $myposts as $post ){
                            setup_postdata( $post );
                            ?>
                            
                    <!-- Выводим записи -->
                    <li class="post">
                        <?php                     foreach(get_the_category() as $category){
                            printf(
                                '<a href="%s" class="category-link %s">%s</a>',
                                esc_url(get_category_link( $category )) ,
                                esc_html($category -> slug),
                                esc_html($category -> name)
                            );
                    } ?>
                        <a class="post-permalink" href="#">
                            <a href="<?php echo get_the_permalink() ?>" class="post-permalink">
                            <h4 class="post-title">
                            <?php echo mb_strimwidth(get_the_title(), 0 , 60, "...")  ?> 
                            </h4>
                            </a>
                        </a>
                    </li>
                    <!-- Выводим записи -->
                    <?php 
                            }
                        } else {
                            ?> <p>Постов не найдено</p> <?php 
                            // Постов не найдено
                        }
                        wp_reset_postdata(); // Сбрасываем $post
                    ?>
                </ul>
            </div>
            <!-- /.right -->
        </div>
        <!-- /.hero -->
    </div>
    <!-- /.container -->
</main>
<div class="container">
    <ul class="article-list">

        <?php
        global $post;

        $myposts = get_posts([ 
            'numberposts' => 4,
            'category_name' => 'articles',
        ]);

        if( $myposts ){
            foreach( $myposts as $post ){
                setup_postdata( $post );
        ?>
                <li class="article-item">
                    <a class="article-permalink" href="<?php echo get_the_permalink() ?>">
                        <h4 class="article-title"><?php echo mb_strimwidth(get_the_title(), 0 , 50, "...")  ?></h4>
                    </a>
                    <img width="65" height="65" src="<?php echo get_the_post_thumbnail_url( null, 'thumbnail' )?>" alt="">
                </li>
        <?php 
                }
            } else {
                ?> <p>Постов не найдено</p> <?php 
                // Постов не найдено
            }
            wp_reset_postdata(); // Сбрасываем $post
        ?>
    </ul>



<div class="main-grid">
    <!-- Выводим записи -->
    <ul class="article-grid">
        <?php		
            global $post;
            //запрос в базу данных
            $query = new WP_Query( [
                'posts_per_page' => 7,
                'category__not_in' => 20,
            ] );

            if ( $query->have_posts() ) {
                $cnt = 0;
                while ( $query->have_posts() ) {
                    $query->the_post();
                    $cnt++;
                    switch ($cnt) {
                        case '1':
                            ?>
                            <li class="article-grid-item article-grid-item-1">
                                <a href="<?php the_permalink()?>" class="article-grid-permalink">
                                    <span class="category-name"><?php $category = get_the_category();
                                    echo $category[0]->name;?></span>
                                    <h4 class="article-grid-title">
                                        <?php echo mb_strimwidth(get_the_title(), 0 , 50, "...")  ?>
                                    </h4>
                                    <p class="article-grid-excerpt"><?php echo mb_strimwidth(get_the_excerpt(), 0 , 150, "...")?></p>
                                    <div class="article-grid-info">
                                        <div class="author">
                                            <?php $author_id = get_the_author_meta('ID'); ?>
                                            <img src="<?php echo get_avatar_url($author_id);?>" alt="" class="author-avatar" />
                                            <span class="author-name"
                                                ><strong><?php the_author();?></strong> : <?php the_author_meta('description');?>
                                            </span>
                                        </div>
                                        <div class="comments">
                                            <img src="<?php echo get_template_directory_uri() . './assets/img/comment.svg';?>" alt="">
                                            <span class="comments-counter"><?php comments_number('0', '1','%');?></span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <?php
                            break;
                        case '2':
                            ?>
                            <li class="article-grid-item article-grid-item-2">
                                <img src="<?php echo get_the_post_thumbnail_url( null, 'thumbnail' )?>" alt="" class="article-grid-thumb" />
                                <a href="<?php the_permalink()?>" class="article-grid-permalink">
                                    <span class="tag"><?php $posttags = get_the_tags();
                                    if( $posttags ){
                                        echo $posttags[0]->name . ' ';
                                    }?>
                                    </span>
                                    <span class="category-name"><?php $category = get_the_category();
                                    echo $category[0]->name;?></span>
                                    <h4 class="article-grid-title"><?php echo mb_strimwidth(get_the_title(), 0 , 50, "...")  ?></h4>
                                    <div class="article-grid-info">
                                        <div class="author">
                                            <?php $author_id = get_the_author_meta('ID'); ?>
                                            <img src="<?php echo get_avatar_url($author_id);?>" alt="" class="author-avatar" />
                                            <div class="author-info">
                                                <span class="author-name"
                                                    ><strong><?php the_author();?></strong></span
                                                >
                                                <span class="date"><?php the_time( 'j F' )?></span>
                                                <div class="comments">
                                                    <img src="<?php echo get_template_directory_uri() . './assets/img/comment-white.svg';?>" alt="">
                                                    <span class="likes-counter"><?php comments_number('0', '1','%');?></span>
                                                </div>
                                                <div class="likes">
                                                    <img src="<?php echo get_template_directory_uri() . './assets/img/heart-white.svg';?>" alt="">
                                                    <span class="likes-counter"><?php comments_number('0', '1','%');?></span>
                                                </div>
                                            </div>
                                            <!-- /.author-info -->
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <?php
                            break;
                        case '3':
                            ?>
                            <li class="article-grid-item article-grid-item-3">
                                <a href="<?php the_permalink()?>" class="article-grid-permalink">
                                    <img src="<?php echo get_the_post_thumbnail_url()?>" alt="" class="article-thumb" />
                                    <h4 class="article-grid-title">
                                        <?php echo mb_strimwidth(get_the_title(), 0 , 50, "...")  ?>
                                    </h4>
                                </a>
                            </li>
                            <?php
                            break;
                        default:
                            ?>
                            <li class="article-grid-item article-grid-item-default">
                                <a href="<?php the_permalink()?>" class="article-grid-permalink">
                                    <h4 class="article-grid-title">
                                        <?php echo mb_strimwidth(get_the_title(), 0 , 20, "...")?>
                                    </h4>
                                    <p class="article-grid-excerpt">
                                        <?php echo mb_strimwidth(get_the_excerpt(), 0 , 125, "...")?>
                                    </p>
                                    <span class="article-date"><?php the_time( 'j F' )?></span>
                                </a>
                            </li>
                            <?php
                            break;
                    }
                    ?>
                    <!-- Вывода постов, функции цикла: the_title() и т.д. -->
                    <?php 
                }
            } else {
                // Постов не найдено
            }

            wp_reset_postdata(); // Сбрасываем $post
            ?>
    </ul>
    <!-- /.article-grid -->
        <?php get_sidebar('home-top')?>
    </div>
</div>
<?php		
global $post;

$query = new WP_Query( [
	'posts_per_page' => 1,
	'category_name' => 'investigation',
] );

if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
		?>
		<section class="investigation" style="background: linear-gradient(0deg, rgba(64, 48, 61, 0.45), rgba(64, 48, 61, 0.45)), url(<?php echo get_the_post_thumbnail_url() ?>) no-repeat center center">
            <div class="container">
                <h2 class="investigation-title"><?php the_title();?></h2>
                <a href="<?php echo get_the_permalink()?>" class="more">Читать статью</a>
            </div>
        </section>
		<?php 
	}
} else {
	// Постов не найдено
}

wp_reset_postdata(); // Сбрасываем $post
?>
<div class="container">
    <div class="posts-wrapper">
            <div class="digest-wrapper">
            <ul class="digest">
        <?php		
        global $post;

        $query = new WP_Query( [
            'posts_per_page' => 6,
        ] );

        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post();
                ?>
                <li class="digest-item">
                <a href="<?php the_permalink()?>" class="digest-item-permalink">
                    <img src="<?php
                        //должно находится внутри цикла
                        if( has_post_thumbnail() ) {
                            echo get_the_post_thumbnail_url();
                        }
                        else {
                            echo get_template_directory_uri().'/assets/img/img-default.jpg';
                        }
                        ?>" class="digest-thumb">
                </a>
                <div class="digest-info">
                    <button class="bookmark">
                    <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5 1H15C16.1046 1 17 1.89543 17 3V19L10.0949 14L3 19V3C3 1.89543 3.89543 1 5 1Z" />
                    </svg>

                    </button>
                        <?php                     foreach(get_the_category() as $category){
                                printf(
                                    '<a href="%s" class="category-link %s">%s </a>',
                                    esc_url(get_category_link( $category )) ,
                                    esc_html($category -> slug),
                                    esc_html($category -> name)
                                );
                        } ?>
                            <?php //$category = get_the_category();
                            //echo $category[0]->name;?></a>
                        <a href="#" class="digest-item-permalink">
                            <h3 class="digest-title"><?php echo mb_strimwidth(get_the_title(), 0 , 50, "...")?></h3>
                        </a>
                        <p class="digest-excerpt"><?php echo mb_strimwidth(get_the_excerpt(), 0 , 150, "...")?></p>
                        <div class="digest-footer">
                            <span class="digest-date"><?php the_time( 'j F' )?></span>
                            <div class="comments digest-comments">
                                <img src="<?php echo get_template_directory_uri() . './assets/img/comment.svg';?>" alt="">
                                <span class="comments-counter"><?php comments_number('0', '1','%');?></span>
                            </div>
                            <div class="likes digest-likes">
                                <img src="<?php echo get_template_directory_uri() . './assets/img/heart.svg';?>" alt="">
                                <span class="comments-counter"><?php comments_number('0', '1','%');?></span>
                            </div>
                        </div>
                        <!-- /.digest-footer -->
                    </div>
                <!-- /.digest-info -->
                </li>
                <?php 
        }} else {
            // Постов не найдено
        }

        wp_reset_postdata(); // Сбрасываем $post
        ?>

                
        </div>
        <!-- /.digest-wrapper -->
        <?php get_sidebar('home-bottom')?>
    </div>

</div>
<div class="special">
    <div class="container">
        <div class="special-grid">
            <?php		
                global $post;

                $query = new WP_Query( [
                    'posts_per_page' => 1,
                    'category_name' => 'photo-gallery',
                ] ); 
                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                        $query->the_post();
                        ?>
                <div class="photo-report">
                    <div class="swiper-container photo-report-slider">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <?php $images = get_attached_media('image');
                                foreach ($images as $image) {
                                    echo '<div class="swiper-slide"><img src="';
                                    print_r($image -> guid);
                                    echo '"></div>';
                                }
                            ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <div class="photo-report-content">
                        <?php                     
                        foreach(get_the_category() as $category){
                            printf(
                                '<a href="%s" class="category-link %s">%s </a>',
                                esc_url(get_category_link( $category )) ,
                                esc_html($category -> slug),
                                esc_html($category -> name)
                            );
                        } ?>
                        <img src="<?php the_post_thumbnail_url() ?>" alt="" class="post-thumb" />
                        <?php $author_id = get_the_author_meta('ID') ?>
                        <a href="<?php echo get_author_posts_url( $author_id ) ?>" class="author">
                            <img src="<?php echo get_avatar_url($author_id)?>" alt="" class="author-avatar" />
                            <div class="author-bio">
                                <span class="author-name"><?php the_author() ?></span>
                                <span class="author-rank">Разработчик</span>
                            </div>
                        </a>
                        <h3 class="photo-report-title"><?php the_title()?></h3>
                        <a href="<?php echo get_the_permalink()?>" class="button photo-report-button">
                            <svg width="19px" height="15px" class="photo-report-icon">
                                <use xlink:href="<?php echo get_template_directory_uri()?>/assets/img/sprite.svg#images"></use>
                            </svg>
                            Смотреть фото
                            <span class="photo-report-counter">26</span>
                        </a>
                    </div>
                </div>

            <!-- /.photo-report-content -->
            <?php 
                }} else {
            // Постов не найдено
            }

            wp_reset_postdata(); // Сбрасываем $post
            ?>

            <div class="other">
            <?php		
                global $post;

                $query = new WP_Query( [
                    'posts_per_page' => 1,
                    'category_name' => 'career'
                ] );

                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                        $query->the_post();
                        ?>
                        <div class="career-post" style="background: #E5E5E5  url(<?php echo get_template_directory_uri() . "/assets/img/career.png" ?> ) no-repeat right top / cover">
                            <a href="<?php echo get_the_permalink()?>" class="category-link">Карьера</a>
                                <h3 class="career-post-title"><?php the_title()?></h3>
                                <p class="career-post-excerpt">
                                <?php echo mb_strimwidth(get_the_excerpt(), 0 , 150, "...")?>
                                </p>
                            <a href="#" class="more">Читать далее</a>
                        </div>
                <?php 
                }} else {
                    // Постов не найдено
                }

                wp_reset_postdata(); // Сбрасываем $post
                ?>
                <!-- /.career-post -->
                <div class="other-posts">
                    <?php		
                        global $post;

                        $query = new WP_Query( [
                            'posts_per_page' => 2,
                            'category__not_in' => 24,
                        ] );

                        if ( $query->have_posts() ) {
                            while ( $query->have_posts() ) {
                                $query->the_post();
                                ?>
                            <a href="#" class="other-post other-post-default">
                                <h4 class="other-post-title"><?php the_title()?></h4>
                                <p class="other-post-excerpt"><?php echo mb_strimwidth(get_the_excerpt(), 0 , 50, "...")?></p>
                                <span class="other-post-date"><?php the_time( 'j F' )?></span>
                            </a>
                    <?php 
                        }} else {
                            // Постов не найдено
                        }

                        wp_reset_postdata(); // Сбрасываем $post
                    ?>
                </div>
                <!-- /.other-posts -->
            </div>
        </div>
        <!-- /.special-grid -->
    </div>
</div>
<!-- /.special -->

<?php
wp_footer();
