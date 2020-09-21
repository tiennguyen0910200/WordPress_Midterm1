<?php
/**
 * The template for displaying all pages.
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package amplethemes
 * @subpackage ample_magazine
 */


if (!function_exists('ample_magazine_braeking_news')) :

    function ample_magazine_braeking_news($post_id)
    {
        $ample_magazine_title_text = ample_magazine_get_option('ample_magazine_breaking_title');

        $ample_magazine_section_cat_id = absint(ample_magazine_get_option('ample_magazine_breaking_category_id'));

        $no_of_slider = ample_magazine_get_option('breaking_post_number');


        if (!empty($ample_magazine_section_cat_id)) {
            $ample_magazine_breaking_news = array('cat' => $ample_magazine_section_cat_id, 'posts_per_page' => $no_of_slider);

            $breaking_news_query = new WP_Query($ample_magazine_breaking_news);
            $ample_magazine_show_option = ample_magazine_get_option('ample_magazine_breaking_news_option');

            if ($ample_magazine_show_option == 'show') {


                if ($breaking_news_query->have_posts()):


                    ?>
                    <!--breaking slide-->


                    <div class="breaking-bar hidden-xs">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="breaking-title"><?php echo esc_html($ample_magazine_title_text); ?></h3>
                                    <div id="breaking-slide" class="owl-carousel owl-theme breaking-slide">
                                        <?php

                                        while ($breaking_news_query->have_posts()):
                                            $breaking_news_query->the_post();

                                            ?>

                                            <div class="item">
                                                <div class="ample-content">
                                                    <h2 class="post-title title-small">
                                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                    </h2>
                                                </div><!-- Post content end -->
                                            </div><!-- Item 1 end -->

                                            <?php

                                        endwhile;

                                        wp_reset_postdata();

                                        ?>


                                    </div><!-- Carousel end -->
                                </div><!-- Col end -->
                            </div><!--/ Row end -->
                        </div><!--/ Container end -->
                    </div><!--/ breaking end -->

                <?php endif;
            }
        }

    }
endif;

add_action('ample_magazine_braeking_news', 'ample_magazine_braeking_news', 10, 1);


/*=====================================feature slider================================================*/

if (!function_exists('ample_magazine_feature_slider_news')) :

    function ample_magazine_feature_slider_news()
    {
        $ample_magazine_slider_section_option = ample_magazine_get_option('ample_magazine_homepage_slider_option');
        if ($ample_magazine_slider_section_option == 'show') {

            $ample_magazine_slider_section_cat_id = ample_magazine_get_option('ample_magazine_slider_cat_id');


            if (!empty($ample_magazine_slider_section_cat_id)) {
                $no_of_slider = ample_magazine_get_option('ample_magazine_no_of_slider');

                if ( $no_of_slider > 0) {

                    $ample_magazine_feature_section_option = ample_magazine_get_option('ample_magazine_homepage_feature_option');
                    if ($ample_magazine_feature_section_option == 'show') {

                    ?>


                    <div class="col-md-7 col-xs-12 side-right">
                        <?php } else {?>
                            <div class="col-md-12 col-xs-12 side-right">
                           <?php }?>

                        <div id="main-slider" class="owl-carousel owl-theme main-slider">
                            <?php
                            $i = 0;
                            if (!empty($ample_magazine_slider_section_cat_id)) {
                                $ample_magazine_home_slider_section = array('cat' => $ample_magazine_slider_section_cat_id, 'posts_per_page' => $no_of_slider);
                                $ample_magazine_home_slider_section_query = new WP_Query($ample_magazine_home_slider_section);
                                if ($ample_magazine_home_slider_section_query->have_posts()) {
                                    while ($ample_magazine_home_slider_section_query->have_posts()) {
                                        $ample_magazine_home_slider_section_query->the_post();
                                        ?>


                                        <?php ?>


                                            <div class="item"
                                                 style="background-image:url(<?php if (has_post_thumbnail()) {
                                            $image_id = get_post_thumbnail_id();
                                            $image_url = wp_get_attachment_image_src($image_id, 'large', true);
                                            echo esc_url($image_url[0]); ?>)
                                           <?php
                                            }?>
                                            ">


                                                <div class="featured-post">
                                                 <?php ample_magazine_post_formats(get_the_ID()); ?>
                                                    <div class="ample-content">
                                                        <div class="post-cat" ><?php ample_magazine_get_category(get_the_ID()); ?></div>
                                                        <h2 class="post-title title-extra-large">
                                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                        </h2>
                                                     <span class="post-date"> <?php ample_magazine_posted_on_theme(); ?></span>                                                   </div>
                                                </div><!--/ Featured post end -->

                                            </div><!-- Item 1 end -->




                                        <?php
                                        $i++;
                                    }
                                }
                                wp_reset_postdata();
                            }
                            ?>
                        </div><!-- Featured owl carousel end-->
                    </div><!-- Col 7 end -->

                    <?php
                }
            }
        }
    }
endif;

add_action('ample-magazine-feature-slider-news', 'ample_magazine_feature_slider_news', 15, 2);


/*=====================================feature section================================================*/
/*=====================================feature slider2================================================*/

if (!function_exists('ample_magazine_feature_slider_news2')) :

    function ample_magazine_feature_slider_news2()
    {
        $ample_magazine_slider_section_option = ample_magazine_get_option('ample_magazine_homepage_slider_option');
        if ($ample_magazine_slider_section_option == 'show') {

            $ample_magazine_slider_section_cat_id = ample_magazine_get_option('ample_magazine_slider_cat_id');


            if (!empty($ample_magazine_slider_section_cat_id)) {
                $no_of_slider = ample_magazine_get_option('ample_magazine_no_of_slider');

                if ( $no_of_slider > 0) {

                    $ample_magazine_feature_section_option = ample_magazine_get_option('ample_magazine_homepage_feature_option');
                    if ($ample_magazine_feature_section_option == 'show') {

                    ?>

                    <div  class=" col-md-9 col-xs-12 side-right">
                        <?php } else {?>
                            <div class="col-md-12 col-xs-12 side-right">
                           <?php }?>

                        <div id="main-slider" class="owl-carousel owl-theme main-slider">
                            <?php
                            $i = 0;
                            if (!empty($ample_magazine_slider_section_cat_id)) {
                                $ample_magazine_home_slider_section = array('cat' => $ample_magazine_slider_section_cat_id, 'posts_per_page' => $no_of_slider);
                                $ample_magazine_home_slider_section_query = new WP_Query($ample_magazine_home_slider_section);
                                if ($ample_magazine_home_slider_section_query->have_posts()) {
                                    while ($ample_magazine_home_slider_section_query->have_posts()) {
                                        $ample_magazine_home_slider_section_query->the_post();
                                        ?>


                                        <?php if (has_post_thumbnail()) {
                                            $image_id = get_post_thumbnail_id();
                                            $image_url = wp_get_attachment_image_src($image_id, 'large', true); ?>


                                            <div class="item"
                                                 style="background-image:url(<?php echo esc_url($image_url[0]); ?>)">


                                                <div class="featured-post">
                                                 <?php ample_magazine_post_formats(get_the_ID()); ?>
                                                    <div class="ample-content">
                                                        <div class="post-cat" ><?php ample_magazine_get_category(get_the_ID()); ?></div>
                                                        <h2 class="post-title title-extra-large">
                                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                        </h2>
                                                       <span class="post-date"> <?php ample_magazine_posted_on_theme(); ?></span>
                                                    </div>
                                                </div><!--/ Featured post end -->

                                            </div><!-- Item 1 end -->

                                        <?php } ?>


                                        <?php
                                        $i++;
                                    }
                                }
                                wp_reset_postdata();
                            }
                            ?>
                        </div><!-- Featured owl carousel end-->
                    </div><!-- Col 7 end -->

                    <?php
                }
            }
        }
    }
endif;

add_action('ample-magazine-feature-slider-news2', 'ample_magazine_feature_slider_news2', 15, 2);


/*=====================================feature section ================================================*/


if (!function_exists('ample_magazine_feature_news')) :

    function ample_magazine_feature_news()
    {
        $ample_magazine_feature_section_option = ample_magazine_get_option('ample_magazine_homepage_feature_option');
        if ($ample_magazine_feature_section_option == 'show') {
         $ample_magazine_slider_section_option = ample_magazine_get_option('ample_magazine_homepage_slider_option');



            $ample_magazine_feature_section_cat_id = ample_magazine_get_option('ample_magazine_feature_cat_id');
            if ($ample_magazine_slider_section_option == 'hide') {
                                        ?>
                                        <div class="left-margin">
                                           <?php }
            if ($ample_magazine_slider_section_option == 'show') { ?>


                    <div class="col-md-5 col-xs-12 left-side">
                    <?php }else {?>
                     <div class="col-md-12 col-xs-12 left-side">
                  <?php  }

                   ?>
                        <div class="row">
                            <?php
                            $i = 1;
                            if (!empty($ample_magazine_feature_section_cat_id)) {
                                $ample_magazine_home_feature_section = array('cat' => $ample_magazine_feature_section_cat_id, 'posts_per_page' => 4);
                                $ample_magazine_home_feature_section_query = new WP_Query($ample_magazine_home_feature_section);
                                if ($ample_magazine_home_feature_section_query->have_posts()) {
                                    while ($ample_magazine_home_feature_section_query->have_posts()) {
                                        $ample_magazine_home_feature_section_query->the_post();

                                            ?>

                                            <div class="col-sm-6 small-right">
                                         <?php
                                        if ($ample_magazine_slider_section_option == 'hide') {
                                        ?>
                                        <div class="hide-slider">
                                           <?php } ?>
                                                <div class="ample-overaly-style contentTop hot-post-bottom clearfix">
                                                    <div class="img-post">

                                                        <?php if (has_post_thumbnail()) {
                                                            $image_id = get_post_thumbnail_id();
                                                            $image_url = wp_get_attachment_image_src($image_id, 'large', true); ?>

                                                            <a href="<?php the_permalink(); ?>"><img
                                                                        class="img-responsive"
                                                                        src="<?php echo esc_url($image_url[0]); ?>"
                                                                        alt="<?php the_title_attribute();?>"/></a>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="ample-content">
                                                        <div class="post-cat" ><?php ample_magazine_get_category(get_the_ID()); ?></div>
                                                        <h2 class="post-title title-medium">
                                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                        </h2>
                                                       <span class="post-date"> <?php ample_magazine_posted_on_theme(); ?></span>

                                                    </div><!-- Post content end -->
                                                     <?php ample_magazine_post_formats(get_the_ID()); ?>

                                                </div><!-- Post Overaly end -->
                                                  <?php
                                                 if ($ample_magazine_slider_section_option == 'hide') {
                                                                                       ?>
                                                      </div>
                                                   <?php } ?>
                                            </div><!-- Col end -->
                                        <?php
                                        $i++;
                                    }


                                }
                                wp_reset_postdata();
                            }


                            ?>

                        </div>
                    </div><!-- Col 5 end -->
           <?php

                }
               $ample_magazine_slider_section_option = ample_magazine_get_option('ample_magazine_homepage_slider_option');

                if ($ample_magazine_slider_section_option == 'hide') {
                                        ?>
                                        </div>
                                           <?php }


    }

endif;

add_action('ample-magazine-feature-news', 'ample_magazine_feature_news', 20, 3);


/*=====================================feature section-2================================================*/

if (!function_exists('ample_magazine_feature_news2')) :

    function ample_magazine_feature_news2()
    {
        $ample_magazine_feature_section_option = ample_magazine_get_option('ample_magazine_homepage_feature_option');
        if ($ample_magazine_feature_section_option == 'show') {
         $ample_magazine_slider_section_option = ample_magazine_get_option('ample_magazine_homepage_slider_option');



            $ample_magazine_feature_section_cat_id = ample_magazine_get_option('ample_magazine_feature_cat_id');
            if ($ample_magazine_slider_section_option == 'hide') {
                                        ?>
                                        <div class="left-margin">
                                           <?php }
            if ($ample_magazine_slider_section_option == 'show') { ?>


                    <div class="col-md-3 col-xs-12 left-side">
                    <?php }else {?>
                     <div class="col-md-12 col-xs-12 left-side">
                  <?php  }

                   ?>
                        <div class="row">
                         <div class="col-sm-12 two-column small-right">
                            <?php
                            $i = 1;
                            if (!empty($ample_magazine_feature_section_cat_id)) {
                                $ample_magazine_home_feature_section = array('cat' => $ample_magazine_feature_section_cat_id, 'posts_per_page' => 2);
                                $ample_magazine_home_feature_section_query = new WP_Query($ample_magazine_home_feature_section);
                                if ($ample_magazine_home_feature_section_query->have_posts()) {
                                    while ($ample_magazine_home_feature_section_query->have_posts()) {
                                        $ample_magazine_home_feature_section_query->the_post();

                                            ?>


                                         <?php
                                        if ($ample_magazine_slider_section_option == 'hide') {
                                        ?>
                                        <div class="hide-slider">
                                           <?php } ?>
                                                <div class="ample-overaly-style contentTop hot-post-bottom clearfix">
                                                    <div class="img-post">

                                                        <?php if (has_post_thumbnail()) {
                                                            $image_id = get_post_thumbnail_id();
                                                            $image_url = wp_get_attachment_image_src($image_id, 'large', true); ?>

                                                            <a href="<?php the_permalink(); ?>"><img
                                                                        class="img-responsive"
                                                                        src="<?php echo esc_url($image_url[0]); ?>"
                                                                        alt="<?php the_title_attribute();?>"/></a>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="ample-content">
                                                        <div class="post-cat" ><?php ample_magazine_get_category(get_the_ID()); ?></div>
                                                        <h2 class="post-title title-medium">
                                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                        </h2>
                                                     <span class="post-date"> <?php ample_magazine_posted_on_theme(); ?></span>

                                                    </div><!-- Post content end -->
                                                     <?php ample_magazine_post_formats(get_the_ID()); ?>

                                                </div><!-- Post Overaly end -->
                                                  <?php
                                                 if ($ample_magazine_slider_section_option == 'hide') {
                                                                                       ?>
                                                      </div>
                                                   <?php } ?>

                                        <?php
                                        $i++;
                                    }
                                    ?>
                                      </div><!-- Col end -->
                                      <?php


                                }
                                wp_reset_postdata();
                            }


                            ?>

                        </div>
                    </div><!-- Col 5 end -->
           <?php

                }
               $ample_magazine_slider_section_option = ample_magazine_get_option('ample_magazine_homepage_slider_option');

                if ($ample_magazine_slider_section_option == 'hide') {
                                        ?>
                                        </div>
                                           <?php }


    }

endif;

add_action('ample-magazine-feature-news2', 'ample_magazine_feature_news2', 20, 3);





/*=====================================Slider-sidebar widget for layout 3================================================*/

if (!function_exists('ample_magazine_feature_sidebar')) :

    function ample_magazine_feature_sidebar()
    { ?>

       <div id="secondary" class="col-lg-4 col-md-12 side-height left-side">

               <?php dynamic_sidebar('banner-sidebar'); ?>

          </div>
<?php

    }

endif;

add_action('ample_magazine_feature_sidebar', 'ample_magazine_feature_sidebar', 20, 3);



/*=====================================feature slider 7================================================*/

if (!function_exists('ample_magazine_feature_slider_news7')) :

    function ample_magazine_feature_slider_news7()
    {
        $ample_magazine_slider_section_option = ample_magazine_get_option('ample_magazine_homepage_slider_option');
        if ($ample_magazine_slider_section_option == 'show') {

            $ample_magazine_slider_section_cat_id = ample_magazine_get_option('ample_magazine_slider_cat_id');


            if (!empty($ample_magazine_slider_section_cat_id)) {
                $no_of_slider = ample_magazine_get_option('ample_magazine_no_of_slider');

                if ( $no_of_slider > 0) {

                    $ample_magazine_feature_section_option = ample_magazine_get_option('ample_magazine_homepage_feature_option');
                    if ($ample_magazine_feature_section_option == 'show') {


                    ?>


                    <div id='primary' class="col-md-8 col-xs-12 side-right">
                        <?php } else {?>
                            <div class="col-md-12 col-xs-12 side-right">
                           <?php }?>

                        <div id="main-slider" class="owl-carousel owl-theme main-slider">
                            <?php
                            $i = 0;
                            if (!empty($ample_magazine_slider_section_cat_id)) {
                                $ample_magazine_home_slider_section = array('cat' => $ample_magazine_slider_section_cat_id, 'posts_per_page' => $no_of_slider);
                                $ample_magazine_home_slider_section_query = new WP_Query($ample_magazine_home_slider_section);
                                if ($ample_magazine_home_slider_section_query->have_posts()) {
                                    while ($ample_magazine_home_slider_section_query->have_posts()) {
                                        $ample_magazine_home_slider_section_query->the_post();
                                        ?>


                                        <?php if (has_post_thumbnail()) {
                                            $image_id = get_post_thumbnail_id();
                                            $image_url = wp_get_attachment_image_src($image_id, 'large', true); ?>


                                            <div class="item"
                                                 style="background-image:url(<?php echo esc_url($image_url[0]); ?>)">


                                                <div class="featured-post">
                                                 <?php ample_magazine_post_formats(get_the_ID()); ?>
                                                    <div class="ample-content">
                                                        <div class="post-cat" ><?php ample_magazine_get_category(get_the_ID()); ?></div>
                                                        <h2 class="post-title title-extra-large">
                                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                        </h2>
                                                       <span class="post-date"> <?php ample_magazine_posted_on_theme(); ?></span>
                                                    </div>
                                                </div><!--/ Featured post end -->

                                            </div><!-- Item 1 end -->

                                        <?php } ?>


                                        <?php
                                        $i++;
                                    }
                                }
                                wp_reset_postdata();
                            }
                            ?>
                        </div><!-- Featured owl carousel end-->
                    </div><!-- Col 7 end -->

                    <?php
                }
            }
        }
    }
endif;

add_action('ample-magazine-feature-slider-news7', 'ample_magazine_feature_slider_news7', 15, 2);


/**
 * The template for displaying all pages.
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 *
 * @subpackage ample_magazine
 */


if (!function_exists('ample_magazine_trending_news')) :

    function ample_magazine_trending_news($post_id)
    {
        $ample_magazine_title_text = ample_magazine_get_option('ample_magazine_trending_title');

        $ample_magazine_section_cat_id = absint(ample_magazine_get_option('ample_magazine_trending_category_id'));

        $no_of_slider = ample_magazine_get_option('ample_magazine_trending_post_number');


        if (!empty($ample_magazine_section_cat_id)) {
            $ample_magazine_breaking_news = array('cat' => $ample_magazine_section_cat_id, 'posts_per_page' => $no_of_slider);

            $breaking_news_query = new WP_Query($ample_magazine_breaking_news);
            $ample_magazine_show_option = ample_magazine_get_option('ample_magazine_trending_news_option');

            if ($ample_magazine_show_option == 'show') {


                if ($breaking_news_query->have_posts()):


                    ?>
                    <!--breaking slide-->



                    

	                       <div class="content">
		                   <div class="simple-marquee-container">
		                 	<div class="marquee-sibling">
                                    <?php echo esc_html($ample_magazine_title_text); ?>
		                	</div>
		                 	<div class="marquee">
				             <ul class="marquee-content-items">
				             <?php

                                        while ($breaking_news_query->have_posts()):
                                            $breaking_news_query->the_post();
                                              $thumbnail = get_the_post_thumbnail_url();
                                            ?>

				                          	<li>


                                              <div class="ample-magazine-ticker-item">
                                                <a class="ample-magazine-ticker-link" href="<?php the_permalink(); ?>"><span class="ticker-image rounded-circle" style="background-image: url(<?php echo esc_url($thumbnail); ?> );"></span>
                                                <span class="news-ticker-title"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span></a
                                                </div>








                                           </li>
				           	            <?php

                                        endwhile;

                                        wp_reset_postdata();

                                        ?>

				           </ul>
			              </div>
	                     </div>
                    
                      </div>
	                     <div class="ample-40"></div>




                <?php endif;
            }
        }

    }
endif;

add_action('ample_magazine_trending_news', 'ample_magazine_trending_news', 10, 1);
    
    
       
 /* =============================hook for breadcumb ==================================================*/
     
if (!function_exists('ample_magazine_breadcrumb_type')) :

    function ample_magazine_breadcrumb_type($post_id)
    {
       $ample_magazine_breadcrump_option = ample_magazine_get_option('ample_magazine_breadcrumb_setting_option');
if ($ample_magazine_breadcrump_option == "enable") {
    if (function_exists('bcn_display')) {
        ?>

		<div class="page-title">
			<div class="container">


            <?php
            echo "<div class='breadcrumbs'><div id='cwp-breadcrumbs' class='cwp-breadcrumbs'>";
            bcn_display();
            echo "</div></div>";
            ?>
        </div>
        </div>
        <?php
    } else {?>


		<div class="page-title">
			<div class="container">


						<div class="bread">
						     <?php breadcrumb_trail(); ?>
						</div>


			</div><!-- Container end -->
		</div><!-- Page title end -->
<?php } }
    }
endif;

add_action('ample_magazine_breadcrumb_type', 'ample_magazine_breadcrumb_type', 10, 1);



/* =============================hook for popular tag ==================================================*/
     
if (!function_exists('ample_magazine_popular_tag')) {

    function ample_magazine_popular_tag($post_id)
    {
       

    $ample_magazine_hide_popular_tag = ample_magazine_get_option('ample_magazine_Popular_tag_option');
    $ample_magazine_title_popular_tag = ample_magazine_get_option('ample_magazine_popular_tag_title');
    $ample_magazine_no_of_tag = ample_magazine_get_option('ample_magazine_popular_tag_post_number');
   if($ample_magazine_hide_popular_tag=='show'){
            ?>

    <div class=" tag-post row">
      <div class="col-md-12">
        <div class="taglist">

         <ul class="tag-list">
           <li class="trans">
           <div class="tagname">
                <?php echo esc_html($ample_magazine_title_popular_tag);?>
            </div>
            </li>
             <?php
          $tags = get_tags( array('orderby' => 'count', 'order' => 'DESC', 'number'  =>  $ample_magazine_no_of_tag,) );
            foreach ( (array) $tags as $tag ) {

             echo '<div class=tag><li>'.esc_html__('#', 'ample-magazine').' <a href="' . esc_url(get_tag_link ($tag->term_id)) . '" rel="tag">'. esc_html($tag->name) . ' (' .esc_html($tag->count)  . ')  </a></li></div>';
           }
             ?>
             </ul>
      </div>
  </div>
 </div>

<?php
}else{
?>
<div class="ample-40"></div>
    <?php
}
}
}
add_action('ample_magazine_popular_tag', 'ample_magazine_popular_tag', 10, 1);
