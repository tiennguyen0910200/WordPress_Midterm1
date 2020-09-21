<?php
/**
 * Breadcrumb  display option options
 * @param null
 * @return array $ample_magazine_show_breadcrumb_option
 *
 */
if (!function_exists('ample_magazine_show_breadcrumb_option')) :
    function ample_magazine_show_breadcrumb_option()
    {
        $ample_magazine_show_breadcrumb_option = array(
            'enable' => esc_html__('Enable', 'ample-magazine'),
            'disable' => esc_html__('Disable', 'ample-magazine')
        );
        return apply_filters('ample_magazine_show_breadcrumb_option', $ample_magazine_show_breadcrumb_option);
    }
endif;


/**
 * latest blog display option options
 * @param null
 * @return array $ample_magazine_show_breadcrumb_option
 *
 */
if (!function_exists('ample_magazine_show_latest_blog_option')) :
    function ample_magazine_show_latest_blog_option()
    {
        $ample_magazine_show_latest_blog_option = array(
            'enable' => esc_html__('Enable', 'ample-magazine'),
            'disable' => esc_html__('Disable', 'ample-magazine')
        );
        return apply_filters('ample_magazine_show_latest__blog_option', $ample_magazine_show_latest_blog_option);
    }
endif;





/**
 * Sanitize Multiple Category
 * =====================================
 */

if ( !function_exists('ample_magazine_sanitize_multiple_category') ) :

    function ample_magazine_sanitize_multiple_category( $values )
    {

        $multi_values = !is_array( $values ) ? explode( ',', $values ) : $values;

        return !empty( $multi_values ) ? array_map( 'sanitize_text_field', $multi_values ) : array();
    }

endif;
