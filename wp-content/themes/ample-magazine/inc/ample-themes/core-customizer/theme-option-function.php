<?php


/**
 * Slider  options
 * @param null
 * @return array $ample_magazine_breaking_news_option
 *
 */
if (!function_exists('ample_magazine_breaking_news_option')) :
	function ample_magazine_breaking_news_option()
	{
		$ample_magazine_breaking_news_option = array(
			'show' => esc_html__('Show', 'ample-magazine'),
			'hide' => esc_html__('Hide', 'ample-magazine')
		);
		return apply_filters('ample_magazine_breaking_news_option', $ample_magazine_breaking_news_option);
	}
endif;



/**
 * popular Tag options
 * @param null
 * @return array 
 *
 */
if (!function_exists('ample_magazine_popular_tag_option')) :
	function ample_magazine_popular_tag_option()
	{
		$ample_magazine_popular_tag_option = array(
			'show' => esc_html__('Show', 'ample-magazine'),
			'hide' => esc_html__('Hide', 'ample-magazine')
		);
		return apply_filters('ample_magazine_popular_tag_option', $ample_magazine_popular_tag_option);
	}
endif;
/**
 * Slider  options
 * @param null
 * @return array $ample_magazine_slider_option
 *
 */
if (!function_exists('ample_magazine_slider_option')) :
    function ample_magazine_slider_option()
    {
        $ample_magazine_slider_option = array(
            'show' => esc_html__('Show', 'ample-magazine'),
            'hide' => esc_html__('Hide', 'ample-magazine')
        );
        return apply_filters('ample_magazine_slider_option', $ample_magazine_slider_option);
    }
endif;


/**
 * header layout function
 *
 */
if (!function_exists('ample_magazine_header_layout_option')) :
	function ample_magazine_header_layout_option()
	{
		$ample_magazine_header_layout_option = array(
			'layout1' => esc_html__('Layout 1', 'ample-magazine'),
			'layout2' => esc_html__('Layout 2', 'ample-magazine')
		);
		return apply_filters('ample_magazine_header_layout_option', $ample_magazine_header_layout_option);
	}
endif;


/**
 * Slider  options
 * @param null
 * @return array $ample_magazine_breaking_news_option
 *
 */
if (!function_exists('ample_magazine_trending_news_option')) :
	function ample_magazine_trending_news_option()
	{
		$ample_magazine_trending_news_option = array(
			'show' => esc_html__('Show', 'ample-magazine'),
			'hide' => esc_html__('Hide', 'ample-magazine')
		);
		return apply_filters('ample_magazine_trending_news_option', $ample_magazine_trending_news_option);
	}
endif;

/**
 * banner layout function
 *
 */
if (!function_exists('ample_magazine_banner_layout_option')) :
	function ample_magazine_banner_layout_option()
	{
		$ample_magazine_header_banner_option = array(
			'layout1' => esc_html__('Layout 1', 'ample-magazine'),
			'layout2' => esc_html__('Layout 2', 'ample-magazine'),
			'layout3' => esc_html__('Layout 3', 'ample-magazine'),

		);
		return apply_filters('ample_magazine_banner_layout_option',$ample_magazine_header_banner_option);
	}
endif;


/**
 * banner layout function
 *
 */
if (!function_exists('ample_magazine_banner_design_layout_option')) :
	function ample_magazine_banner_design_layout_option()
	{
		$ample_magazine_banner_design_layout_option = array(
			'full-width' => esc_html__('Full Width in slider', 'ample-magazine'),
			'container' => esc_html__('Both Side Space in slider', 'ample-magazine'),

		);
		return apply_filters('ample_magazine_banner_design_layout_option',$ample_magazine_banner_design_layout_option);
	}
endif;



/**
 * Blog/Archive Description Option
 *
 * @since magazine  1.0.0
 *
 *
 *
 * @param null
 * @return array $ample_magazine_blog_excerpt
 *
 */
if (!function_exists('ample_magazine_layout_design')) :
	function ample_magazine_layout_design()
	{
		$ample_magazine_layout_design = array(
			'full-width' => esc_html__('Full Layout', 'ample-magazine'),
			'Boxed' => esc_html__('Box Layout', 'ample-magazine'),

		);
		return apply_filters('ample_magazine_layout_design', $ample_magazine_layout_design);
	}
endif;


/**
 * date layout function
 *
 */
if (!function_exists('ample_magazine_date_format_option')) :
	function ample_magazine_date_format_option()
	{
		$ample_magazine_date_format_option = array(
			'theme-default' => esc_html__('Theme Default Date', 'ample-magazine'),
			'wordpress-default' => esc_html__('WordPress Default Date', 'ample-magazine'),

		);
		return apply_filters('ample_magazine_date_format_option',$ample_magazine_date_format_option);
	}
endif;




/*======================== meta option ====================================*/
if (!function_exists('ample_magazine_meta_option')) :
	function ample_magazine_meta_option()
	{
		$ample_magazine_meta_option = array(
			'date-author' => esc_html__('Display Author and Date', 'ample-magazine'),
			'date-only' => esc_html__('Display Date Only', 'ample-magazine'),
			'none-all' => esc_html__('None', 'ample-magazine'),
		);
		return apply_filters('ample_magazine_meta_option', $ample_magazine_meta_option);
	}
endif;
