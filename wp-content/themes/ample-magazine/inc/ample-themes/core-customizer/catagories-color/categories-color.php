<?php

/**
 *  Ample Magazine Category Color Option
 *
 * @since Ample Magazine 1.0.0
 *
 */
/*Category Color Options*/
$wp_customize->add_section('ample_magazine_category_color_setting', array(
    'priority'      => 40,
    'title'         => __('Category Color', 'ample-magazine'),
    'description'   => __('You can select the different color for each category.', 'ample-magazine'),
    'panel'      => 'ample_magazine_homepage_setting_panel',
));




$i = 1;
$args = array(
    'orderby' => 'id',
    'hide_empty' => 0
);
$categories = get_categories( $args );
$wp_category_list = array();
foreach ($categories as $category_list ) {
    $wp_category_list[$category_list->cat_ID] = $category_list->cat_name;

    $wp_customize->add_setting('ample_magazine_options[cat-'.esc_attr(get_cat_ID($wp_category_list[$category_list->cat_ID])).']', array(
        'default'           => $default['ample-magazine-category-primary-color'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'ample_magazine_options[cat-'.esc_attr(get_cat_ID($wp_category_list[$category_list->cat_ID])).']',
            array(
                'label'     => sprintf(__('"%s" Color', 'ample-magazine'),esc_html($wp_category_list[$category_list->cat_ID])  ),
                'section'   => 'ample_magazine_category_color_setting',
                'settings'  => 'ample_magazine_options[cat-'.esc_attr(get_cat_ID($wp_category_list[$category_list->cat_ID])).']',
                'priority'  => $i,
            )
        )
    );
    $i++;
}