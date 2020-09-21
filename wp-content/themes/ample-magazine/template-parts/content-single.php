<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2/20/2020
 * Time: 9:33 AM
 */

$hide_show_feature_image=ample_magazine_get_option( 'ample_magazine_show_feature_image_single_option');

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>





    <div class="single-post">
        <?php

        if (has_post_thumbnail() && $hide_show_feature_image == 'show') { ?>
        <div class="post-media post-featured-image">
            <?php
            if (has_post_thumbnail()) {
                $image_id = get_post_thumbnail_id();
                $image_url = wp_get_attachment_image_src($image_id, 'large', true);
                ?>
                <a href="<?php the_permalink(); ?>"><img class="img-responsive" src="<?php echo esc_url($image_url[0]); ?>" alt="<?php the_title_attribute(); ?>"/></a>

            <?php }
            ?>
        </div>
        <?php } ?>

        <div class="post-title-area">

            <h2 class="post-title">
                <?php
                if ( is_singular() ) :
                the_title( '<h2 class="entry-title">', '</h2>' );
                else :
                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                endif;
                ?>
            </h2>
            <div class="post-meta">
                <?php
                if ( 'post' === get_post_type() ) : ?>
                <div class="entry-meta">
                    <?php ample_magazine_posted_on(); ?>
                </div><!-- .entry-meta -->
                <?php
                endif; ?>
            </div>
        </div><!-- Post title end -->

        <div class="ample-content-area">
            <div class="entry-content">
                <?php
                the_content( sprintf(
                    wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'ample-magazine' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ) );

                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ample-magazine' ),
                    'after'  => '</div>',
                ) );
                ?>
            </div><!-- Share items end -->

            <?php ample_magazine_get_category(get_the_ID());?>

        </div><!-- ample-content end -->
    </div><!-- Single post end -->
    

</article><!-- #post-<?php the_ID(); ?> -->




