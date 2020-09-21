<?php
if (!function_exists('ample_magazine_sidebar_layout')) :
    function ample_magazine_sidebar_layout()
    {
        $ample_magazine_sidebar_layout = array(
            'right-sidebar' => esc_html__('Right Sidebar', 'ample-magazine'),
            'left-sidebar' => esc_html__('Left Sidebar', 'ample-magazine'),
            'no-sidebar' => esc_html__('No Sidebar', 'ample-magazine'),
        );
        return apply_filters('ample_magazine_sidebar_layout', $ample_magazine_sidebar_layout);
    }
endif;

/**
 * Blog/Archive Description Option
 *
 * @since magazine agency 1.0.0
 *
 *
 * 
 * @param null
 * @return array $ample_magazine_blog_excerpt
 *
 */
if (!function_exists('ample_magazine_blog_excerpt')) :
    function ample_magazine_blog_excerpt()
    {
        $ample_magazine_blog_excerpt = array(
            'excerpt' => esc_html__('Excerpt', 'ample-magazine'),
            'content' => esc_html__('Content', 'ample-magazine'),

        );
        return apply_filters('ample_magazine_blog_excerpt', $ample_magazine_blog_excerpt);
    }
endif;

/**
 * Show/Hide Feature Image  options
 *
 * @since magazine agency 1.0.0
 *
 * @param null
 * @return array $ample_magazine_show_feature_image_option
 *
 */
if (!function_exists('ample_magazine_show_feature_image_option')) :
    function ample_magazine_show_feature_image_option()
    {
        $ample_magazine_show_feature_image_option = array(
            'show' => esc_html__('Show', 'ample-magazine'),
            'hide' => esc_html__('Hide', 'ample-magazine')
        );
        return apply_filters('ample_magazine_show_feature_image_option', $ample_magazine_show_feature_image_option);
    }
endif;
