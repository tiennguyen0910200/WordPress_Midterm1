<?php
if (!class_exists('Ample_Magazine_Latest_Post_Widget')) {
    class Ample_Magazine_Latest_Post_Widget extends WP_Widget
    {

        private function defaults()
        {

            $defaults = array(
                'cat_id' => 0,
                'title' => esc_html__('Popular News', 'ample-magazine'),

            );
            return $defaults;
        }

        public function __construct()
        {
            parent::__construct(
                'ample-magazine-latest-widget',
                esc_html__('AT: Popular Sidebar Widget', 'ample-magazine'),
                array('description' => esc_html__('Popular Post Section', 'ample-magazine'))
            );
        }

        public function form($instance)
        {
            $instance = wp_parse_args((array )$instance, $this->defaults());
            $catid = absint($instance['cat_id']);
            $title = esc_attr($instance['title']);


            ?>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                    <?php esc_html_e('Title', 'ample-magazine'); ?>
                </label><br/>
                <input type="text" name="<?php echo esc_attr($this->get_field_name('title')); ?>" class="widefat"
                       id="<?php echo esc_attr($this->get_field_id('title')); ?>" value="<?php echo $title; ?>">
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

            return $instance;

        }

        public function widget($args, $instance)
        {
            echo $args['before_widget'];
            if (!empty($instance)) {
                $instance = wp_parse_args((array )$instance, $this->defaults());


                $catid = absint($instance['cat_id']);
                $title = apply_filters('widget_title', !empty($instance['title']) ? esc_html($instance['title']) : '', $instance, $this->id_base);


                ?>



                <div class="widget color-default">
                    <?php if (!empty($title)) { ?>
                        <h3 class="head-title"><span>
                         
                                <?php echo esc_html($title);

                                ?></span></h3>
                    <?php } ?>


                    <div class="list-post-block">
                        <ul class="list-post review-post-list">

                <?php
                $i = 0;
                $sticky = get_option('sticky_posts');
                if ($catid != -1) {
                    $home_two_column_section = array(
                        'ignore_sticky_posts' => true,
                        'post__not_in' => $sticky,
                        'cat' => $catid,
                        'posts_per_page' => 100,
                        'order' => 'DESC'
                    );
                } else {
                    $home_two_column_section = array(
                        'ignore_sticky_posts' => true,
                        'post__not_in' => $sticky,
                        'post_type' => 'post',
                        'posts_per_page' => 100,
                        'order' => 'DESC'
                    );
                }

                $home_two_column_section_query = new WP_Query($home_two_column_section);

                if ($home_two_column_section_query->have_posts()) {
                    while ($home_two_column_section_query->have_posts()) {
                        $home_two_column_section_query->the_post(); ?>


                        <li class="clearfix">
                                <div class="ample-block-style post-float clearfix">
                                    <div class="img-post">
                                        <?php
                                        if (has_post_thumbnail()) {
                                            $image_id = get_post_thumbnail_id();
                                            $image_url = wp_get_attachment_image_src($image_id, 'medium', true);
                                            ?>
                                            <a href="<?php the_permalink(); ?>"><img class="img-responsive"
                                                                                     src="<?php echo esc_url($image_url[0]); ?>"
                                                                                     alt="<?php the_title_attribute();?>"/></a>

                                        <?php }
                                        ?>
                                    </div><!-- Post thumb end -->

                                    <div class="ample-content">
                                        <span class="post-date">
                                            <div class="small-cat "><?php ample_magazine_get_category(get_the_ID()); ?></div>
                                        </span>
                                        <h2 class="post-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h2>
                                        <span class="post-date black">
                                            <?php ample_magazine_posted_on_theme(); ?>

                                        </span>

                                    </div><!-- Post content end -->
                                </div><!-- Post block style end -->
                            </li><!-- Li 1 end -->



                        <?php
                        $i++;
                    }
                    wp_reset_postdata();
                } ?>


                        </ul><!-- List post end -->
                    </div><!-- List post block end -->
                </div>




                <?php
                echo $args['after_widget'];
            }
        }

    }
}

add_action('widgets_init', 'Ample_Magazine_Latest_Post_widget');
function Ample_Magazine_Latest_Post_widget()
{
    register_widget('ample_magazine_latest_post_widget');

}
