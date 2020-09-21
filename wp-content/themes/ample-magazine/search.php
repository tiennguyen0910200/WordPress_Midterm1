<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ample_magazine
 */

get_header();

$ample_magazine_breadcrump_option = ample_magazine_get_option('ample_magazine_breadcrumb_setting_option');
if ($ample_magazine_breadcrump_option == "enable") {
	?>



	<div class="page-title">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="bread">
						<?php breadcrumb_trail(); ?>
					</div>
				</div><!-- Col end -->
			</div><!-- Row end -->
		</div><!-- Container end -->
	</div><!-- Page title end -->

<?php } ?>





	<div id="content">

		<section class="block-wrapper">



			<div class="container">
				<div class="row">
					<div id="primary" class="col-lg-8 col-md-12">

						<div id="" class="ample-inner-banner">



							<div class="entry-title">
								<header class="page-header">
									<h2 ><?php esc_html_e('Search Result','ample-magazine')?></h2>


								</header><!-- .page-header -->

							</div>
						</div>
						<main id="main" class="site-main">


							<?php
							if ( have_posts() ) : ?>

								<header class="page-header">
									<h1 class="page-title"><?php
										/* translators: %s: search query. */
										printf('<span>' . get_search_query() . '</span>' );
										?></h1>
								</header><!-- .page-header -->

								<?php
								/* Start the Loop */
								while ( have_posts() ) : the_post();

									/**
									 * Run the loop for the search to output the results.
									 * If you want to overload this in a child theme then include a file
									 * called content-search.php and that will be used instead.
									 */
									get_template_part( 'template-parts/content', 'search' );

								endwhile;

								the_posts_navigation();

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
