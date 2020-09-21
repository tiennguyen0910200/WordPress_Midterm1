<?php
/**
 * Dynamic css
 *
 * @package Ample Themes
 * 
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('ample_magazine_dynamic_css') ):
    function ample_magazine_dynamic_css(){

        global $ample_magazine_theme_options;
        $ample_magazine_theme_options = ample_magazine_get_options_value();
        
        $ample_magazine_top_header_color = esc_attr( ample_magazine_get_option('ample_magazine_top_header_background_color') );

        $ample_magazine_top_footer_color = esc_attr( ample_magazine_get_option('ample_magazine_top_footer_background_color') );


        $ample_magazine_primary_color = esc_attr( ample_magazine_get_option('ample_magazine_primary_color') );

        $ample_magazine_bottom_footer_color = esc_attr( ample_magazine_get_option('ample_magazine_bottom_footer_background_color') );

        $ample_magazine_custom_css = '';


       

        
            $args = array(
                'orderby' => 'id',
                'hide_empty' => 0
            );
            $categories = get_categories( $args );
            $wp_category_list = array();
            $i = 1;

            foreach ($categories as $category_list) {
                $wp_category_list[$category_list->cat_ID] = $category_list->cat_name;


                $cat_color = 'cat-' . esc_attr(get_cat_ID($wp_category_list[$category_list->cat_ID]));

                if (array_key_exists($cat_color, $ample_magazine_theme_options)) {

                    $cat_color_code = esc_attr($ample_magazine_theme_options[$cat_color]);
                    $ample_magazine_custom_css .= "
                    
                      a.at-cat-name-{$category_list->cat_ID}{
                    background: {$cat_color_code}!important;
                    }
                    ";


                    $i++;
                }
            }


        



        /*====================Dynamic Css =====================*/
        $ample_magazine_custom_css .= ".breaking-bar{
         background-color: " . $ample_magazine_top_header_color . ";}
    ";

        $ample_magazine_custom_css .= ".footer{
         background-color: " . $ample_magazine_top_footer_color . ";}
    ";


        $ample_magazine_custom_css .= ".top-menu li a:hover, a.continue-link, .ample-block-style .post-title a:hover, .nav-links a, a#search{
    
           color: " . $ample_magazine_primary_color  .'!important'. ";}
    ";


        $ample_magazine_custom_css .= "ul.navbar-nav >li:hover>a:before, ul.navbar-nav >li.active>a:before, .head-title, .head-title > span, .color-orange a.post-cat, .color-blue .head-title > span, .color-blue a.post-cat, nav.breadcrumb-trail.breadcrumbs {
         border-color: " . $ample_magazine_primary_color .'!important'. ";}
    ";


        $ample_magazine_custom_css .= ".head-title > span:after{
         border-color: " . $ample_magazine_primary_color .' rgba(0, 0, 0, 0) rgba(0, 0, 0, 0) rgba(0, 0, 0, 0)!important'. ";}
    ";


        $ample_magazine_custom_css .= ".next-page .navigation li.active a,.next-page .navigation li a:hover
    
 {
    
           background-color: " . $ample_magazine_primary_color . ";}
           
    ";

        $ample_magazine_custom_css .= ".head-title,li.current-menu-item > a
    
   {
    
           border-bottom: ".'2px solid'. $ample_magazine_primary_color .'!important'. ";}
           
    ";


        $ample_magazine_custom_css .= ".main-menu >.container > .row
    
   {
    
          border-top:  ".'3px solid'. $ample_magazine_primary_color .'!important'. ";}
           
    ";

    $ample_magazine_custom_css .= " 
    
     {

       border-top:  ".'5px solid'. $ample_magazine_primary_color .'!important'. ";}
           
    ";

        $ample_magazine_custom_css .= " .tagname:after,h3.breaking-title:after
    
     {

       border-left-color:  ".$ample_magazine_primary_color .'!important'. ";}
           
    ";

        $ample_magazine_custom_css .= "div#cwp-breadcrumbs :before, span.page-numbers.current,.tagname, .ample-post-format, .owl-carousel.owl-theme.breaking-slide .owl-nav > div, .breaking-title,  a.scrollup,  .nav>li>a:focus,.nav>li>a:hover,  .owl-theme.owl-carousel .owl-dots .owl-dot.active span, li.home-buttom.navbar-nav, .simple-marquee-container .marquee-sibling, .main-slider.owl-theme .owl-nav > div:hover, .color-red .owl-carousel.owl-theme .owl-nav > div:hover,.navbar-toggle, .comment-form .submit, h2.entry-title:before, .trending-title,.owl-carousel.owl-theme.trending-slide .owl-nav > div,  input.search-submit, .head-title > span, .color-orange a.post-cat, .color-blue .head-title > span, .color-blue a.post-cat, nav.breadcrumb-trail.breadcrumbs{
           background: " . $ample_magazine_primary_color .'!important'. ";}
           
    ";

        $ample_magazine_custom_css .= ".copyright {
           background: " . $ample_magazine_bottom_footer_color . ";}
           
    ";




        /*------------------------------------------------------------------------------------------------- */

        /*custom css*/


        wp_add_inline_style('ample-magazine-style', $ample_magazine_custom_css);

    }
endif;
add_action('wp_enqueue_scripts', 'ample_magazine_dynamic_css', 99);