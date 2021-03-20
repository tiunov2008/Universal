<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header <?php echo get_post_type() ?>-header" style="background: linear-gradient(0deg, rgba(38, 45, 51, 0.75), rgba(38, 45, 51, 0.75)), url(
        <?php echo get_the_post_thumbnail_url(); ?>)">
		<div class="container">
			<div class="post-header-nav">
				<?php
				foreach(get_the_category() as $category){
					printf(
						'<a href="%s" class="category-link %s">%s </a>',
						esc_url(get_category_link( $category )) ,
						esc_html($category -> slug),
						esc_html($category -> name)
					);
				} 

				?>
				<a class="home-link" href="<?php echo get_home_url() ?>">
					<svg width="18" height="17" class="icon">
						<use xlink:href="<?php echo get_template_directory_uri() . "/assets/img/sprite.svg#home"?>"></use>
					</svg>На главную</a>
				<?php
				
				the_post_navigation(
					array(
						'prev_text' => '<span class="post-nav-prev">
						<svg width="15" height="7" class="prev-icon">
							<use xlink:href="'. get_template_directory_uri() .'/assets/img/sprite.svg#left-arrow"></use>
						</svg>' . esc_html__( 'Назад', 'universal' ) . '</span>',
						'next_text' => '<span class="post-nav-next">					
						' . esc_html__( 'Вперёд', 'universal' ) . '<svg width="15" height="7" class="next-icon">
							<use xlink:href="'. get_template_directory_uri() .'/assets/img/sprite.svg#right-arrow"></use>
						</svg>' . '</span>',
					)
				);
				?>
			</div>
			<?php
				if( is_singular() ) :
					the_title( '<h1 class="post-header-title">' , '</h1>'  );
				else :
					the_title( '<h1 class="post-header-title"><a href="' . esc_url( get_the_permalink( )) .'" rel="bookmark">' ,'</h1>'  );
				endif;
		?>
		
		<?php
		
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'universal' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Страницы:', 'universal' ),
				'after'  => '</div>',
			)
		);
		?>
		<div class="post-header-info">
			<span class="post-header-date"><?php the_time( 'j F' )?></span>
			<div class="comments post-header-comments">
				<img src="<?php echo get_template_directory_uri() . './assets/img/comment.svg';?>" alt="">
				<span class="comments-counter"><?php comments_number('0', '1','%');?></span>
			</div>
			<div class="likes post-header-likes">
				<img src="<?php echo get_template_directory_uri() . './assets/img/heart.svg';?>" alt="">
				<span class="comments-counter"><?php comments_number('0', '1','%');?></span>
			</div>
	</div>
		</div>
		

	</header><!-- .entry-header -->

	<div class="entry-content">

	</div><!-- .entry-content -->


	<!-- /.post-header-footer -->
</article>
