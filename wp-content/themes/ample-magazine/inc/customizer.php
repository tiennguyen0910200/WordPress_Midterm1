<?php
/**
 * Ample Magazine Theme Customizer
 *
 * @package ample_magazine
 */

require get_template_directory() . '/inc/customizer-pro/class-customize.php';
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ample_magazine_customize_register( $wp_customize ) {
	$wp_customize->get_setting('blogname')->transport = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';
	$wp_customize->get_setting('custom_logo')->transport = 'refresh';



	/*default variable used in setting*/
	$default = ample_magazine_get_default_theme_options();

	/**
	 * Functions which enhance the theme by loading file
	 */


	require get_template_directory() . '/inc/ample-themes/core-customizer/all-customizer.php';
	require get_template_directory() . '/inc/ample-themes/core-customizer/catagories-color/categories-color.php';
	require get_template_directory() . '/inc/ample-themes/layout-design/layout-customization.php';
	require get_template_directory() . '/inc/ample-themes/theme-options-customizer/theme-options-customizer.php';
	require get_template_directory() . '/inc/ample-themes/popular-tag/popular-tags-customizer.php';
	require get_template_directory() . '/inc/ample-themes/trending-news/trending-news-customizer.php';




	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'ample_magazine_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'ample_magazine_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'ample_magazine_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function ample_magazine_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function ample_magazine_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ample_magazine_customize_preview_js() {
	wp_enqueue_script( 'ample-magazine-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'ample_magazine_customize_preview_js' );
