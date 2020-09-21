<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ample_magazine
 */

get_header();
do_action('ample_magazine_breadcrumb_type');
?>
	<div id="content">
		<section class="block-wrapper">
			<div class="container">
				<div class="row">

					<div id="primary" class="col-lg-8 col-md-12">

						<main id="main" class="site-main">


							<header class="page-header">
								<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'ample-magazine' ); ?></h1>
							</header><!-- .page-header -->

							<div class="page-content">
								<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'ample-magazine' ); ?></p>

								<?php
								get_search_form();


								?>


								<?php

								/* translators: %1$s: smiley */
								$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'ample-magazine' ), convert_smilies( ':)' ) ) . '</p>';
								the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );


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
