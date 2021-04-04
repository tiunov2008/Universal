<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header <?php echo get_post_type() ?>-header" style="background: linear-gradient(0deg, rgba(38, 45, 51, 0.75), rgba(38, 45, 51, 0.75))">
		<div class="container">
			<div class="lesson-header-wrapper">
				<div class="lesson-header-nav">
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
				</div>
				<div class="video">
					<?php 
						function cut_link($link){
							if (explode('video/' , $link)[0] == 'https://player.vimeo.com/') {
								echo  '<iframe src="' . explode('video/' , $link)[0] . 'video/';
								echo end(explode('video/' , $link));
								echo '" width="1140px" height="640px" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>';
							}elseif (explode('?v=' , $link)[0] == 'https://www.youtube.com/watch') {
								echo '<iframe width="1280" height="720" src="' . explode('watch?v=' , $link)[0];
								echo 'embed/' . end(explode('watch?v=' , $link)) ;
								echo '" 
								title="YouTube video player" frameborder="0" 
								allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
								allowfullscreen></iframe>';
							}
						}
						//получаем ссылку
						$video_link = get_field('video_link');
						$video_cut = cut_link($video_link['url']);
					?>
					
				</div>
				
				<?php
					if( is_singular() ) :
						the_title( '<h1 class="post-header-title">' , '</h1>'  );
					else :
						the_title( '<h1 class="post-header-title"><a href="' . esc_url( get_the_permalink( )) .'" rel="bookmark">' ,'</h1>'  );
					endif;
					?>
				<div class="post-header-info">
					<span class="post-header-date"><?php the_time( 'j F' )?></span>
				</div>

			</div>
		</div>
		

	</header><!-- .entry-header -->

	<div class="post-content">
		<div class="container">
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
		</div>
	</div><!-- .entry-content -->
	<footer class="post-footer">
		<div class="container">
			<?php 
			$tags_list = get_the_tag_list('', esc_html_x( '',"list item separator", 'universal' ));
			if($tags_list){
				printf('<span class="tags-links">' . esc_html__( '%1$s', 'universal') . '</span>', $tags_list);
			}
			
			meks_ess_share();
			?>
		</div>
		
	</footer>

	<?php comments_template(); ?>
	<!-- /.post-header-footer -->
</article>
