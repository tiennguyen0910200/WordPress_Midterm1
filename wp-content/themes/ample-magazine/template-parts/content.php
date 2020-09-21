<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ample_magazine
 */

$description_from = ample_magazine_get_option( 'ample_magazine_blog_excerpt_option');
$description_length = ample_magazine_get_option( 'ample_magazine_description_length_option');

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>





	<div class="single-post">


	<div class="item">

    <div class="box-blog">
		<?php
		if (has_post_thumbnail()) { ?>

		<div class="ample-block-style post-float-half clearfix">

				<div class="img-post">
					<?php
					if (has_post_thumbnail()) {
						$image_id = get_post_thumbnail_id();
						$image_url = wp_get_attachment_image_src($image_id, 'large', true);
						?>
						<a href="<?php the_permalink(); ?>"><img class="img-responsive" src="<?php echo esc_url($image_url[0]); ?>" alt="<?php the_title_attribute(); ?>"/></a>

					<?php }
					?>
				</div>
					<?php
					if (has_post_thumbnail()) { ?>
				<div class="post-cat" >
					<?php
					 ample_magazine_get_category(get_the_ID());
					?>
				</div>
				<?php } ?>
				<div class="ample-content">
					<h2 class="post-title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h2>
					<div class="post-meta">
                                          <span class="post-author"><a
												  href="<?php the_permalink(); ?>"><?php the_author(); ?></a></span>
						<span class="post-date"><?php echo get_the_date(); ?></span>

					</div>
					<p class="description">
						<?php

						if($description_from=='content')
						{
							echo esc_html( wp_trim_words(get_the_content(),$description_length) );
						}
						else
						{

							echo esc_html( wp_trim_words(get_the_excerpt(),$description_length) );
						}
						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:','ample-magazine' ),
							'after'  => '</div>',
						) );


						?>
						<div class="'buttom">
						<a href="<?php the_permalink();?>" class="continue-link"><?php esc_html_e('Read More', 'ample-magazine'); ?></a>
					   </div>
					</p>



				</div><!-- Post content end -->
			</div><!-- Post Block style 1 end -->

		<?php } else{
			?>
			<div class="ample-block">

				<?php
				if (has_post_thumbnail()) { ?>
					<?php
					?>
					<div class="post-cat" >
						<?php
						ample_magazine_get_category(get_the_ID());


						?>
					</div>

				<?php } ?>
				<div class="content">
					<h2 class="post-title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h2>
					<div class="post-meta">
						<span class="post-author"><?php ample_magazine_posted_on(); ?></span>

					</div>
					<p class="description">
						<?php

						if($description_from=='content')
						{
							echo esc_html( wp_trim_words(get_the_content(),$description_length) );
						}
						else
						{

							echo esc_html( wp_trim_words(get_the_excerpt(),$description_length) );
						}
						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:','ample-magazine' ),
							'after'  => '</div>',
						) );



						if(!empty($read_more)) {?>
					<div class="'buttom">
						<a href="<?php the_permalink();?>" class="continue-link"><?php echo esc_html($read_more); ?></a>
					</div>
					<?php } ?>

					</p>



				</div><!-- Post content end -->
			</div><!-- Post Block style 1 end -->
		<?php
		}?>

	</div>

		</div><!-- Item 1 end -->




	</div><!-- Single post end -->


</article><!-- #post-<?php the_ID(); ?> -->
