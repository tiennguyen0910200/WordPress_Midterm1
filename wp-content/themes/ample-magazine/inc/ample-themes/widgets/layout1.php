<?php
if (!class_exists('Ample_Magazine_Layout1_Widget')) {
    class Ample_Magazine_Layout1_Widget extends WP_Widget
    {

        private function defaults()
        {

            $defaults = array(
                'title' => esc_html__('Political', 'ample-magazine'),
                'cat_id' => array(),
                'post_number' => 5,

            );
            return $defaults;
        }


        public function __construct()
        {
            parent::__construct(
                'ample-magazine-layout1-widget',
                esc_html__('AT: Layout 1', 'ample-magazine'),
                array('description' => esc_html__('choose category Widget', 'ample-magazine'))
            );
        }
        public function form($instance)
        {

            $instance = wp_parse_args((array )$instance, $this->defaults());
            $title = esc_attr($instance['title']);
            $catid = absint($instance['cat_id']);
            $post_number = absint($instance['post_number']);

            ?>
            <p>
                <label
                    for="<?php echo esc_attr($this->get_field_id('title')); ?>"><strong><?php esc_html_e('Title:', 'ample-magazine'); ?></strong></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                       value="<?php echo $title; ?>"/>
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Layout', 'ample-magazine' ); ?></label>
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/ample-themes/widgets/images/featured-column.jpg" class="layout-img">
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('post_number')); ?>"><strong><?php esc_html_e('Number of Posts:', 'ample-magazine'); ?></strong></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('post_number')); ?>" name="<?php echo esc_attr($this->get_field_name('post_number')); ?>" type="number" value="<?php echo $post_number; ?>" min="1"/>
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('cat_id')); ?>">
                    <?php esc_html_e('Select Category', 'ample-magazine'); ?>
                </label><br/>
                <?php
                $ample_con_dropown_cat = array(
                    'show_option_none' => esc_html__('From Recent Posts', 'ample-magazine'),
                    'orderby' => 'name',
                    'order' => 'asc',
                    'show_count' => 1,
                    'hide_empty' => 1,
                    'echo' => 1,
                    'selected' => $catid,
                    'hierarchical' => 1,
                    'name' => esc_attr($this->get_field_name('cat_id')),
                    'id' => esc_attr($this->get_field_name('cat_id')),
                    'class' => 'widefat',
                    'taxonomy' => 'category',
                    'hide_if_empty' => false,
                );
                wp_dropdown_categories($ample_con_dropown_cat);
                ?>
            </p>
            <hr>


            <?php

        }

        public function update($new_instance, $old_instance)
        {
            $instance = $old_instance;
            $instance['cat_id'] = (isset($new_instance['cat_id'])) ? absint($new_instance['cat_id']) : '';
            $instance['title'] = sanitize_text_field($new_instance['title']);
            $instance['post_number'] = absint( $new_instance['post_number'] );

            return $instance;
        }
        public function widget($args, $instance)
        {

            $instance = wp_parse_args((array)$instance, $this->defaults());

            if (!empty($instance)) {

                $title = apply_filters('widget_title', !empty($instance['title']) ? esc_html($instance['title']) : '', $instance, $this->id_base);

                $catid = absint($instance['cat_id']);

                $post_number = absint($instance['post_number']);

                echo $args['before_widget'];
                ?>


                <div class="block-tab">
                    <?php if (!empty($title)) { ?>
                        <h3 class="head-title"><span>
                            
                            <?php echo esc_html($title);

                            ?></span></h3>
                    <?php } ?>


                    <div class="click-content">
                        <?php
                        $i = 1;
                        $sticky = get_option('sticky_posts');
                        if ($catid != -1) {
                            $ample_magazine_two_column_section = array(
                                'ignore_sticky_posts' => true,
                                'post__not_in' => $sticky,
                                'cat' => $catid,
                                'posts_per_page' => $post_number,
                                'order' => 'DESC'
                            );
                        } else {
                            $ample_magazine_two_column_section = array(
                                'ignore_sticky_posts' => true,
                                'post__not_in' => $sticky,
                                'post_type' => 'post',
                                'posts_per_page' => $post_number,
                                'order' => 'DESC'
                            );
                        }


                        ?>

                        <div class="layout1">


                            <div class="row">


                                <?php

                                $ample_magazine_two_column_section_query = new WP_Query($ample_magazine_two_column_section);

                                if ($ample_magazine_two_column_section_query->have_posts()) {
                                    while ($ample_magazine_two_column_section_query->have_posts()) {
                                        $ample_magazine_two_column_section_query->the_post();
                                        if ($i == 1) {
                                            ?>

                                            <div class="col-md-6 col-sm-6">
                                                <div class="ample-block-style clearfix">
                                                    <div class="img-post">
                                                        <?php
                                                        if (has_post_thumbnail()) {
                                                            $image_id = get_post_thumbnail_id();
                                                            $image_url = wp_get_attachment_image_src($image_id, 'large', true);
                                                            ?>

                                                            <a href="<?php the_permalink(); ?>"><img class="img-responsive"
                                                                                                     src="<?php echo esc_url($image_url[0]); ?>"

                                                                                                     alt="<?php the_title_attribute();?>"/></a>

                                                        <?php }
                                                        ?>

                                                    </div>
                                                    <?php
                                                    if (has_post_thumbnail()) {
                                                        ample_magazine_post_formats(get_the_ID()); ?>
                                                        <div class="post-cat"><?php ample_magazine_get_category(get_the_ID()); ?></div>
                                                    <?php } ?>
                                                    <div class="ample-content">
                                                        <h2 class="post-title">
                                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                        </h2>
                                                        <div class="post-meta">
                                                            <span class="post-date black"> <?php ample_magazine_posted_on_theme(); ?> </span>                                                        </div>
                                                        <p><?php echo esc_html(wp_trim_words(get_the_content(), 25)); ?></p>
                                                    </div><!-- Post content end -->
                                                </div><!-- Post Block style end -->
                                            </div><!-- Col end -->
                                        <?php } else { ?>

                                            <div class="col-md-6 col-sm-6">
                                                <div class="list-post-block">
                                                    <ul class="list-post">
                                                        <li class="clearfix">
                                                            <div class="ample-block-style  post-float clearfix">
                                                                <div class="img-post">
                                                                    <?php
                                                                    if (has_post_thumbnail()) {
                                                                        ample_magazine_post_formats(get_the_ID());
                                                                        $image_id = get_post_thumbnail_id();
                                                                        $image_url = wp_get_attachment_image_src($image_id, 'samll', true);
                                                                        ?>

                                                                        <a href="<?php the_permalink(); ?>"><img
                                                                                class="img-responsive"
                                                                                src="<?php echo esc_url($image_url[0]); ?>"

                                                                                alt="<?php the_title_attribute();?>"/></a>

                                                                    <?php }
                                                                    ?>
                                                                </div><!-- Post thumb end -->

                                                                <div class="ample-content ">
                                                        <span class="post-date">
                                                                 <div class="small-cat "><?php ample_magazine_get_category(get_the_ID()); ?></div>
                                                        </span>
                                                                    <h2 class="post-title title-small">
                                                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                                    </h2>

                                                                    <div class="post-meta">

                                                                        <span class="post-date black"> <?php ample_magazine_posted_on_theme(); ?> </span>
                                                                    </div>

                                                                </div><!-- Post content end -->
                                                            </div><!-- Post block style end -->
                                                        </li><!-- Li 1 end -->

                                                    </ul><!-- List post end -->
                                                </div><!-- List post block end -->
                                            </div><!-- List post Col end -->
                                        <?php } ?>





                                        <?php
                                        $i++;
                                    }
                                    wp_reset_postdata();
                                } ?>

                            </div><!-- Tab pane Row 1 end -->
                        </div><!-- Tab pane 1 end -->


                    </div><!-- tab content -->
                </div><!-- Technology Tab end -->






                <?php
                echo $args['after_widget'];
            }
        }

        
    }
}

add_action('widgets_init', 'ample_magazine_layout1_widget');
function ample_magazine_layout1_widget()
{
    register_widget('Ample_Magazine_Layout1_Widget');

}















