<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ample_magazine
 */

?>

<?php
$column_count = 0;
for ( $i = 0; $i <= 4; $i++ ) {

	if ( is_active_sidebar( 'footer'.$i ) ) {

		$column_count++;

	}
}


?>

<?php if($column_count>0) { ?>
	<footer id="footer" class="footer" itemscope itemtype="http://schema.org/WPFooter">


		<div class="footer-main">
			<div class="container">
				<div class="row">
					<?php

					for ( $i = 0; $i <= 4 ; $i++ ) {

						if (is_active_sidebar('footer'.$i)) {

							if ($column_count == '1') {
								$size = '12';
							} elseif ($column_count == '2') {
								$size = '6';
							} elseif ($column_count == '3') {
								$size = '4';
							} else {
								$size = '3';
							}
							?>
							<div class="col-sm-<?php echo esc_attr($size); ?> footer-widget">

								<?php dynamic_sidebar('footer'.$i); ?>

							</div><!-- Col end -->
						<?php } } ?>


				</div><!-- Row end -->
			</div><!-- Container end -->
		</div><!-- Footer main end -->


	</footer><!-- Footer end -->
	<?php
}?>

<div class="copyright">
	<div class="container">
		<div class="row">

			<div class="col-sm-12 col-md-6">
				<div class="copyright-info">
					<div class="site-info">
						<?php $copyright = ample_magazine_get_option('ample_magazine_copyright');
						?>
						<p><?php echo wp_kses_post($copyright); ?> |
							<a href="<?php echo esc_url( __( 'https://www.amplethemes.com/', 'ample-magazine' ) ); ?>"
							><?php
								/* translators: %s: CMS name, i.e. WordPress. */
								printf( esc_html__( ' Design & develop by AmpleThemes %s', 'ample-magazine' ), '' );
								?></a>	</p>

					</div><!-- .site-info -->

				</div>
			</div>

			<div class="col-sm-12 col-md-6">
				<div class="footer-menu">

					<?php
					if ( has_nav_menu( 'buttom-menu' ) ) {
						wp_nav_menu(array(
							'theme_location' => 'buttom-menu',
							'menu_class' => 'menu-design ',
							'container' => 'ul',
						));
					}
					?>

				</div>
			</div>
		</div><!-- Row end -->



	</div><!-- Container end -->
</div><!-- Copyright end -->

</div>

</div>
</div>
<?php wp_footer(); ?>


</body>
</html>
