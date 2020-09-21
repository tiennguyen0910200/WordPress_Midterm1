<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Acme Themes
 * @subpackage Read More
 */

if ( ! function_exists( 'ample_magazine_posted_on' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time, author, comment and edit.
     */
    function ample_magazine_posted_on( $avatar_size = 60 ) {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf( $time_string,
            esc_attr( get_the_date( 'c' ) ),
            esc_html( get_the_date() ),
            esc_attr( get_the_modified_date( 'c' ) ),
            esc_html( get_the_modified_date() )
        );



        $posted_on = sprintf(
            '%s',
            '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><i class="fa fa-calendar" aria-hidden="true"></i>
' . $time_string . '</a>'
        );
        if( ample_magazine_validate_gravatar (get_the_author_meta( 'user_email' ))){
            $avatar = get_avatar( get_the_author_meta( 'user_email' ), $avatar_size, '' );
            $author_wrap = 'has-avatar';
        }
        else{
            $avatar = '<i class="fa fa-user"></i>';
            $author_wrap = 'no-avatar';
        }
        $byline = sprintf(
            '%s',
            '<span class="author vcard '.$author_wrap.'"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">'. $avatar . "<span class='author-name'>".esc_html( get_the_author() ) . '</span></a></span>'
        );

        echo '<span class="byline"> ' . $byline . '</span><span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

        if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
            echo '<span class="comments-link"><i class="far fa-comment-alt"></i>';
            comments_popup_link( esc_html__( 'Leave a comment', 'ample-magazine' ), esc_html__( '1 Comment', 'ample-magazine' ), esc_html__( '% Comments', 'ample-magazine' ) );
            echo '</span>';
        }

        edit_post_link(
            sprintf(
            /* translators: %s: Name of current post */
                esc_html__( 'Edit %s', 'ample-magazine' ),
                the_title( '<span class="screen-reader-text">"', '"</span>', false )
            ),
            '<span class="edit-link"><i class="fa fa-edit "></i>',
            '</span>'
        );
    }
endif;

if ( ! function_exists( 'ample_magazine_entry_footer' ) ) :
    /**
     * Prints HTML with meta information for tags.
     */
    function ample_magazine_entry_footer() {
        // Hide category and tag text for pages.
        if ( 'post' === get_post_type() ) {
            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list(  );
            if ( $tags_list ) {
                printf( '<span class="tags-links">%1$s</span>', $tags_list ); // WPCS: XSS OK.
            }
        }
    }
endif;

if ( ! function_exists( 'ample_magazine_entry_cats' ) ) :
    /**
     * Prints HTML with meta information for the categories.
     */
    function ample_magazine_entry_cats() {
        // Hide category and tag text for pages.
        if ( 'post' === get_post_type() ) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list( esc_html__( ', ', 'ample-magazine' ) );
            if ( $categories_list && ample_magazine_categorized_blog() ) {
                printf( '<span class="cat-links">%1$s</span>', $categories_list ); // WPCS: XSS OK.
            }
        }
    }
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
if ( ! function_exists( 'ample_magazine_categorized_blog' ) ) :
    function ample_magazine_categorized_blog() {
        if ( false === ( $all_the_cool_cats = get_transient( 'ample_magazine_categories' ) ) ) {
            // Create an array of all the categories that are attached to posts.
            $all_the_cool_cats = get_categories( array(
                'fields'     => 'ids',
                'hide_empty' => 1,

                // We only need to know if there is more than one category.
                'number'     => 2,
            ) );

            // Count the number of categories that are attached to the posts.
            $all_the_cool_cats = count( $all_the_cool_cats );

            set_transient( 'ample_magazine_categories', $all_the_cool_cats );
        }

        if ( $all_the_cool_cats > 1 ) {
            // This blog has more than 1 category so ample_magazine_categorized_blog should return true.
            return true;
        } else {
            // This blog has only 1 category so ample_magazine_categorized_blog should return false.
            return false;
        }
    }
endif;

/*
**
* Prints HTML with meta information for the categories, tags and comments.
 */
function ample_magazine_entry_footer() {
    // Hide category and tag text for pages.
    if ( 'post' === get_post_type() ) {
        /* translators: used between list items, there is a space after the comma */
        $categories_list = get_the_category_list( esc_html__( ',', 'ample-magazine' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            ?>
            <?php
            printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'ample-magazine' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }



    }

}


/**
 * Flush out the transients used in ample_magazine_categorized_blog.
 */
if ( ! function_exists( 'ample_magazine_category_transient_flusher' ) ) :
    function ample_magazine_category_transient_flusher() {
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }
        // Like, beat it. Dig?
        delete_transient( 'ample_magazine_categories' );
    }
endif;


add_action( 'edit_category', 'ample_magazine_category_transient_flusher' );
add_action( 'save_post',     'ample_magazine_category_transient_flusher' );
/**
 * List down the get category
 *
 * @param int $post_id
 * @return string list of category
 *
 * @since Ample Magazine 1.0.0
 *
 */
if (!function_exists('ample_magazine_get_category')) :
    function ample_magazine_get_category($post_id = 0)
    {

        if (0 == $post_id) {
            global $post;
            $post_id = $post->ID;
        }
        $categories = get_the_category($post_id);
        $output = '';
        $separator = ' ';
        if ($categories) {
            $output .= '<span class="cat-links">';
            foreach ($categories as $category) {
                $output .= '<a class="at-cat-name-' . esc_attr($category->term_id) . '" href="' . esc_url(get_category_link($category->term_id)) . '"  rel="category tag">' . esc_html($category->cat_name) . '</a>' . $separator;

            }
            echo $output;
            $output .= '</span>';
            return $output;

        }
    }
endif;





/* for time format  *
 * @since Ample Magazine 1.0.0
 *
 */
if (!function_exists('ample_magazine_posted_on_theme')) :
    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function ample_magazine_posted_on_theme()
    {


        $date_format = ample_magazine_get_option('ample_magazine_date_format_option');

        if ($date_format == 'theme-default') {

            $time_string = human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago', 'ample-magazine');

        } else {

            $time_string = get_the_time(get_option('date_format'));

        }

        $date_show = ample_magazine_get_option('ample_magazine_meta_date_options');
        if($date_show=='date-author') {
            $posted_on = '<a href="' . esc_url(get_permalink()) . '" title="' . the_title_attribute('echo=0') . '"><i class="ample fa fa-clock"></i>' . esc_html($time_string) . '</a> ';


            $byline = '<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '"><i class="ample fa fa-user-circle"></i>' . esc_html(get_the_author()) . '</a> ';

            echo '<div class="date">' .  $posted_on . '</div> <div class="by-author vcard author">' . $byline . '</div>'; // WPCS: XSS OK.
        }elseif($date_show=='date-only'){
            echo get_the_date();
        }
        else{
            return;
        }
    }
endif;