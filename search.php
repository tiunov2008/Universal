<?php
get_header();
?>
<div class="container">
    <h3 class="search-title">Результаты поиска по запросу:</h3>
    <div class="favourites">
        <div class="digest-wrapper">
            <ul class="digest">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
                            <?php                     
                            foreach(get_the_category() as $category){
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
                <?php endwhile; else: ?>
                    Записей нет.
                <?php endif; ?>
            </ul>
            <?php 
            $args = array(
                'prev_text'    => "&larr; Назад",
                'next_text'    => "Вперед &rarr;",
                'screen_reader_text' => '',
            );
            
            the_posts_pagination($args);
            ?>
        </div>
        <?php echo get_sidebar("home-bottom") ?>
    </div>
</div>
<?php
get_footer();