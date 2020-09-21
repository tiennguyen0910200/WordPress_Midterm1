<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ample_magazine
 */

get_header();

do_action('ample_magazine_breadcrumb_type'); ?>





	<div id="content">

	<section class="block-wrapper">


		<div class="container">
			<div class="row">
				<div id="primary" class="col-lg-8 col-md-12">
					<div id="" class="ample-inner-banner">

						<div class="entry-title">
							<header class="page-header">
								<?php
								the_archive_title( '<h2 class="page-title">', '</h2>' );
								the_archive_description( '<div class="archive-description">', '</div>' );
								?>

							</header><!-- .page-header -->

						</div>
					</div>

					<main id="main" class="site-main">


						<?php
						if ( have_posts() ) :


							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/*
                                 * Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
								get_template_part( 'template-parts/content', get_post_format() );

							endwhile;
							?>

							<div class='next-page'>
								<?php
								the_posts_pagination();	 ?>
							</div>

							<div class="ample-header-gab"></div>

							
							<?php

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif; ?>

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
	</section>



	</div><!-- #primary -->




<?php

get_footer();

