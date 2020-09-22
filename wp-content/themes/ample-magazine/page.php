<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ample_magazine
 */



get_header();
$hide_show_feature_image = ample_magazine_get_option('ample_magazine_show_feature_image_single_option');
do_action('ample_magazine_breadcrumb_type');
?>

	<div id="content">
		<section class="block-wrapper">
			<div class="container">
				<div class="row">
					<div id="primary"  class="">

						<main id="main" class="site-main">


							<?php
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/content', 'page' );

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

							endwhile; // End of the loop.
							?>
						</main><!-- #main -->

					</div><!-- Content Col end -->

					<div id="secondary" class="col-lg-4 col-md-12">
						<div class="sidebar sidebar-right">
							<?php
							get_sidebar(); ?>

						</div><!-- Sidebar right end -->
					</div><!-- Sidebar Col end -->

				</div><!-- Row end -->
			</div><!-- Container end -->
		</section><!-- First block end -->
	</div>


<?php

get_footer();
