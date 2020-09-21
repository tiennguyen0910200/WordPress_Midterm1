<?php
/**
* Better Health default theme options.
*
* @package ample themes
* @subpackage Ample Magazine
*/

if ( !function_exists('ample_magazine_get_default_theme_options' ) ) :

/**
* Get default theme options.
*
* @since 1.0.0
*
* @return array Default theme options.
*/
function ample_magazine_get_default_theme_options()
{

$default = array();
    $default['ample_magazine_front_page_hide_option']='show';
    $default['ample_magazine_header_social_option']='hide';
    $default['ample_magazine_facebook_url']='';
    $default['ample_magazine_twitter_url']='';
    $default['ample_magazine_Google+_url']='';
    $default['ample_magazine_linkedin_url']='';


    $default['ample_magazine_header_layout_option']='layout1';


	$default['ample_magazine_breaking_news_option']='show';

    $default['ample_magazine_homepage_slider_option']='hide';
    $default['ample_magazine_slider_cat_id']=-1;
    $default['ample_magazine_no_of_slider']=5;

    $default['ample_magazine_feature_cat_id']=-1;

// breaking News

   $default['ample_magazine_breaking_title']      = esc_html__( 'Breaking News', 'ample-magazine' );
    $default['ample_magazine_breaking_category_id']      = -1;
   $default['ample_magazine_breaking_post_number']     = 5;

    $default['ample_magazine_trending_title']      = esc_html__( 'Trending News', 'ample-magazine' );
    $default['ample_magazine_trending_category_id']      = -1;
    $default['ample_magazine_trending_post_number']     = 5;
    $default['ample_magazine_trending_news_option']='hide';


    /*for feature section*/
    $default['ample_magazine_feature_cat_id']=-1;
    $default['ample_magazine_homepage_feature_option']='hide';



    /*footer section*/
    $default['ample_magazine_copyright']=esc_html__('Copy Right Text', 'ample-magazine');





    // Blog.
    $default['ample_magazine_sidebar_layout_option'] = 'right-sidebar';
    $default['ample_magazine_blog_title_option'] = esc_html__('Latest Blog', 'ample-magazine');
    $default['ample_magazine_blog_excerpt_option'] = 'content';
    $default['ample_magazine_description_length_option'] = 35;
    $default['ample_magazine_show_feature_image_single_option']='show' ;


    $default['ample_magazine_breadcrumb_setting_option']='enable';
    $default['ample_magazine_latest_blog_option']=1;


    //color code
    $default['ample-magazine-category-primary-color']='#1e88e5';
    $default['ample_magazine_top_header_background_color']='#000';
    $default['ample_magazine_primary_color']='#bb1919';
    $default['ample_magazine_top_footer_background_color']='#444';
    $default['ample_magazine_bottom_footer_background_color']='#000';
    $default['ample_magazine_banner_layout_option']='layout1';
    $default['ample_magazine_design_layout_option']='container';
    $default['ample_magazine_site_layout_options']='full-width';
    $default['ample_magazine_date_format_option']='theme-default';
    $default['ample_magazine_meta_date_options']='date-author';
    $default['ample_magazine_Popular_tag_option']='hide';
    $default['ample_magazine_popular_tag_title']=esc_html__('Popular Tag', 'ample-magazine');
    $default['ample_magazine_popular_tag_post_number']=8;
// Pass through filter.
$default = apply_filters( 'ample_magazine_get_default_theme_options', $default );
return $default;
}
endif;
