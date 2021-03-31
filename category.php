<?php get_header() ?>
<div class="container">
    <h1 class="category-title">
    <?php single_cat_title() ?>
    </h1>
    <div class="post-list">
        <?php if ( have_posts() ){ while ( have_posts() ){ the_post(); ?>
            <div class="post-card">
                <a href="<?php the_permalink()?>" class="post-card-link">
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="post-card-thumb">
                    <div class="post-card-text">
                        <h2 class="post-card-title"><?php echo mb_strimwidth(get_the_title(), 0 , 20, "..."); ?></h2>
                        <?php echo mb_strimwidth(get_the_excerpt(), 0 , 100, "...")?>
                        <div class="author">
                            <?php $author_id = get_the_author_meta('ID'); ?>
                            <img src="<?php echo get_avatar_url($author_id);?>" alt="" class="author-avatar" />
                            <div class="author-info">
                                <span class="author-name"
                                    ><strong><?php the_author();?></strong></span
                                >
                                <span class="date"><?php the_time( 'j F' )?></span>
                                <div class="comments">
                                    <svg width="19px" height="15px">
                                        <use xlink:href="<?php echo get_template_directory_uri()?>/assets/img/sprite.svg#comment"></use>
                                    </svg>
                                    <span class="likes-counter"><?php comments_number('0', '1','%');?></span>
                                </div>
                                <div class="likes">
                                    <svg width="19px" height="15px">
                                        <use xlink:href="<?php echo get_template_directory_uri()?>/assets/img/sprite.svg#like"></use>
                                    </svg>
                                    <span class="likes-counter"><?php comments_number('0', '1','%');?></span>
                                </div>
                            </div>
                            <!-- /.author-info -->
                        </div>
                    </div>
                
                </a>
            </div>
        <?php } } else { ?>
            Записей нет.
        <?php } ?>
    </div>
    <?php 
        $args = array(
            'prev_text'    => "&larr; Назад",
            'next_text'    => "Вперед &rarr;",
            'screen_reader_text' => '',
        );
        
        the_posts_pagination($args);
    ?>
</div>
<?php get_footer() ?>