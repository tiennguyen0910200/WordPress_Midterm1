<?php

class Ample_Magazine_Social_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'social-widget',
            __( 'AT: Social widgets', 'ample-magazine' ),
            array( 'description' => __( 'Best displayed in Sidebar.', 'ample-magazine' ) )
        );
    }

    public function form($instance ){
        ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e( 'Title', 'ample-magazine' ); ?></label><br />
            <input type="text" name="<?php echo esc_attr( $this->get_field_name('title')); ?>" id="<?php echo esc_attr($this->get_field_id('title')); ?>" value="<?php
            if (isset($instance['title']) && $instance['title'] != '' ) :
                echo esc_attr($instance['title']);
            endif;

            ?>" class="widefat" />
        </p>


        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('facebook') ); ?>"><?php _e( 'Facebook', 'ample-magazine' ); ?></label><br />
            <input type="text" name="<?php echo esc_attr( $this->get_field_name('facebook') ); ?>" id="<?php echo esc_attr( $this->get_field_id('facebook')); ?>" value="<?php
            if (isset($instance['facebook']) && $instance['facebook'] != '' ) :
                echo esc_attr($instance['facebook']);
            endif;

            ?>" class="widefat" />
        </p>

        <p
            <label for="<?php echo esc_attr( $this->get_field_id('twitter') ); ?>"><?php _e( 'Twitter', 'ample-magazine' ); ?></label><br />
            <input type="text" name="<?php echo esc_attr( $this->get_field_name('twitter') ); ?>" id="<?php echo esc_attr( $this->get_field_id('twitter')); ?>" value="<?php
            if (isset($instance['twitter']) && $instance['twitter'] != '' ) :
                echo esc_attr($instance['twitter']);
            endif;

            ?>" class="widefat" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('googleplus') ); ?>"><?php _e( 'Instagram', 'ample-magazine' ); ?></label><br />
            <input type="text" name="<?php echo esc_attr( $this->get_field_name('googleplus') ); ?>" id="<?php echo esc_attr( $this->get_field_id('googleplus')); ?>" value="<?php
            if (isset($instance['googleplus']) && $instance['googleplus'] != '' ) :
                echo esc_attr($instance['googleplus']);
            endif;

            ?>" class="widefat" />
        </p>



        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('linkedin') ); ?>"><?php _e( 'Linkedin', 'ample-magazine' ); ?></label><br />
            <input type="text" name="<?php echo esc_attr( $this->get_field_name('linkedin') ); ?>" id="<?php echo esc_attr( $this->get_field_id('linkedin')); ?>" value="<?php
            if (isset($instance['linkedin']) && $instance['linkedin'] != '' ) :
                echo esc_attr($instance['linkedin']);
            endif;

            ?>" class="widefat" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('youtube') ); ?>"><?php _e( 'Youtube', 'ample-magazine' ); ?></label><br />
            <input type="text" name="<?php echo esc_attr( $this->get_field_name('youtube') ); ?>" id="<?php echo esc_attr( $this->get_field_id('youtube')); ?>" value="<?php
            if (isset($instance['youtube']) && $instance['youtube'] != '' ) :
                echo esc_attr($instance['youtube']);
            endif;

            ?>" class="widefat" />
        </p>
        <?php
    }


    public function update( $new_instance, $old_instance ){
        $instance                = $old_instance;
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['facebook']    = esc_url_raw( $new_instance['facebook'] );
        $instance['twitter']     = esc_url_raw( $new_instance['twitter'] );
        $instance['googleplus']  = esc_url_raw( $new_instance['googleplus'] );
        $instance['linkedin']    = esc_url_raw( $new_instance['linkedin'] );
        $instance['youtube']     = esc_url_raw( $new_instance['youtube'] );
        return $instance;
    }

    public function widget( $args, $instance )
    {
        extract( $args );
        if(!empty($instance))
        {
            $title = apply_filters('widget_title', !empty($instance['title']) ? esc_html($instance['title']) : '', $instance, $this->id_base);
            $facebook=$instance['facebook'];
            $twitter=$instance['twitter'];
            $googleplus=$instance['googleplus'];
            $linkedin=$instance['linkedin'];
            $youtube=$instance['youtube'];

            ?>

            <div class="widget">
                <?php
                if ($title) {
                echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
                } ?>

               
                <ul class="ample-layout styled">
            <?php
            if ( !empty( $facebook ) ) { ?>

                    <li class="facebook">
                        <a target="_blank" href="<?php echo esc_url( $facebook ); ?>"><i class="fab fa-facebook-f"></i>
                            <span class="ample-title-title"><?php echo esc_html('Facebook','ample-magazine');?></span>
                            <span class="ample-title-desc"><?php echo esc_html('Like us on Facebook','ample-magazine');?></span></a>
                    </li>
            <?php }
            if ( !empty( $twitter ) ) { ?>
                    <li  class="twitter">
                        <a target="_blank" href="<?php echo esc_url( $twitter ); ?>"><i class="fab fa-twitter"></i>
                            <span class="ample-title-title"><?php echo esc_html('Twitter','ample-magazine');?></span>
                            <span class="ample-title-desc"><?php echo esc_html('Follow us on Twitter','ample-magazine');?></span></a>
                    </li>

            <?php }
            if ( !empty( $linkedin ) ) {
                ?>

                    <li class="linkdin">
                        <a target="_blank" href="<?php echo esc_url( $linkedin ); ?>"><i class="fab fa-linkedin-in"></i>
                            <span class="ample-title-title"><?php echo esc_html('Linkdin','ample-magazine');?></span>
                            <span class="ample-title-desc"><?php echo esc_html('Connect us on Linkdin','ample-magazine');?></span></a>
                    </li>
                <?php
            }

            if ( !empty( $youtube ) ) { ?>
                    <li class="youtube">
                        <a  target="_blank" href="<?php echo esc_url( $youtube ); ?>"><i class="fab fa-youtube"></i>
                                <span class="ample-title-title"><?php echo esc_html('Youtube','ample-magazine');?></span>
                                <span class="ample-title-desc"><?php echo esc_html('Subscribe US','ample-magazine');?></span></a>
                    </li>
             <?php   }
                if ( !empty( $googleplus ) ) {
                ?>
                <li class="gplus">
                    <a href="<?php echo esc_url($googleplus); ?>"><i class="fab fa-instagram"></i>
                        <span class="ample-title-title"><?php echo esc_html('Instagram','ample-magazine');?></span>
                        <span class="ample-title-desc"><?php echo esc_html('Follow us on Instagram','ample-magazine');?></span></a>
                </li>
                    <?php } ?>

                </ul>
            </div><!-- Widget Social end -->




            <?php
        }
    }
}


add_action( 'widgets_init', 'ample_magazine_social_widget' );
function ample_magazine_social_widget(){
    register_widget( 'Ample_Magazine_Social_Widget' );

}






