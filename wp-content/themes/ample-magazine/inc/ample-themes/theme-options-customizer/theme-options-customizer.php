<?php
/**
 * Theme Option
 *
 * @since 1.0.0
 */
$wp_customize->add_panel(
    'ample_magazine_theme_options',
    array(
        'priority' => 22,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__('Theme Option', 'ample-magazine'),
    )
);


/*----------------------------------------------------------------------------------------------*/


$wp_customize->add_setting(
    'ample_magazine_primary_color',
    array(
        'default' => $default['ample_magazine_primary_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ample_magazine_primary_color', array(
    'label' => esc_html__('Primary Color', 'ample-magazine'),
    'description' => esc_html__('We recommend choose  different  background color but not to choose similar to font color', 'ample-magazine'),
    'section' => 'colors',
    'priority' => 14,

)));

/*-----------------------------------------------------------------------------*/
/**
 * Top Header Background Color
 *
 * @since 1.0.0
 */

$wp_customize-> add_setting(
    'ample_magazine_top_header_background_color',
    array(
        'default' => $default['ample_magazine_top_header_background_color'],
        'sanitize_callback' => 'sanitize_hex_color',

    )
);

$wp_customize-> add_control( new WP_Customize_Color_Control( $wp_customize, 'ample_magazine_top_header_background_color', array(
    'label' => esc_html__('Beaking News Background Color', 'ample-magazine'),
    'description' => esc_html__('We recommend choose  different  background color but not to choose similar to font color', 'ample-magazine'),
    'section' => 'colors',
    'priority' => 14,

)));

/*-----------------------------------------------------------------------------*/
/**
 * Top Footer Background Color
 *
 * @since 1.0.0
 */

$wp_customize->add_setting(
    'ample_magazine_top_footer_background_color',
    array(
        'default' => $default['ample_magazine_top_footer_background_color'],
        'sanitize_callback' => 'sanitize_hex_color',

    )
);

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ample_magazine_top_footer_background_color', array(
    'label' => esc_html__('Top Footer Background Color', 'ample-magazine'),
    'description' => esc_html__('We recommend choose  different  background color but not to choose similar to font color', 'ample-magazine'),
    'section' => 'colors',
    'priority' => 14,

)));

/*-----------------------------------------------------------------------------*/
/**
 * Bottom Footer Background Color
 *
 * @since 1.0.0
 */

$wp_customize->add_setting(
    'ample_magazine_bottom_footer_background_color',
    array(
        'default' => $default['ample_magazine_bottom_footer_background_color'],
        'sanitize_callback' => 'sanitize_hex_color',

    )
);

$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'ample_magazine_bottom_footer_background_color', array(
    'label' => esc_html__('Bottom Footer Background Color', 'ample-magazine'),
    'description' => esc_html__('We recommend choose  different  background color but not to choose similar to font color', 'ample-magazine'),
    'section' => 'colors',
    'priority' => 14,

)));


/*-------------------------------------------------------------------------------------------*/
/**
 * Hide Static page in Home page
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'ample_magazine_front_page_option',
    array(
        'title' => esc_html__('Front Page Options', 'ample-magazine'),
        'panel' => 'ample_magazine_theme_options',
        'priority' => 6,
    )
);

/**
 *   Show/Hide Static page/Posts in Home page
 */
$wp_customize->add_setting(
    'ample_magazine_front_page_hide_option',
    array(
        'default' => $default['ample_magazine_front_page_hide_option'],
        'sanitize_callback' => 'ample_magazine_sanitize_checkbox',
    )
);
$wp_customize->add_control('ample_magazine_front_page_hide_option',
    array(
        'label' => esc_html__('Hide Blog Posts or Static Page on Front Page', 'ample-magazine'),
        'section' => 'ample_magazine_front_page_option',
        'type' => 'checkbox',
        'priority' => 10
    )
);


/*-------------------------------------------------------------------------------------------*/
/**
 * Breadcrumb Options
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'ample_magazine_breadcrumb_option',
    array(
        'title' => esc_html__('Breadcrumb Options', 'ample-magazine'),
        'panel' => 'ample_magazine_theme_options',
        'priority' => 6,
    )
);

/**
 * Breadcrumb Option
 */
$wp_customize->add_setting(
    'ample_magazine_breadcrumb_setting_option',
    array(
        'default' => $default['ample_magazine_breadcrumb_setting_option'],
        'sanitize_callback' => 'ample_magazine_sanitize_select',

    )
);
$hide_show_breadcrumb_option = ample_magazine_show_breadcrumb_option();
$wp_customize->add_control('ample_magazine_breadcrumb_setting_option',
    array(
        'label' => esc_html__('Breadcrumb Options', 'ample-magazine'),
        'section' => 'ample_magazine_breadcrumb_option',
        'choices' => $hide_show_breadcrumb_option,
        'type' => 'select',
        'priority' => 10
    )
);



/*hide latest blog*/

$wp_customize->add_section(
    'ample_magazine_latest_blog_option',
    array(
        'title' => esc_html__('Hide Latest Blog Options', 'ample-magazine'),
        'panel' => 'ample_magazine_theme_options',
        'priority' => 6,
    )
);

/**
 *   Show/Hide Static page/Posts in Home page
 */
$wp_customize->add_setting(
    'ample_magazine_latest_blog_option',
    array(
        'default' => $default['ample_magazine_latest_blog_option'],
        'sanitize_callback' => 'ample_magazine_sanitize_checkbox',
    )
);
$wp_customize->add_control('ample_magazine_latest_blog_option',
    array(
        'label' => esc_html__('Show Latest Blog Section  ', 'ample-magazine'),
        'section' => 'ample_magazine_latest_blog_option',
        'type' => 'checkbox',
        'priority' => 10
    )
);

/*-------------------------------------------------------------------------------------------*/
