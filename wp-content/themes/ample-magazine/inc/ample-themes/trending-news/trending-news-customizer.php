<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 6/22/2020
 * Time: 10:07 AM
 */

// Trending News.
$wp_customize->add_section( 'ample_magazine_section_trending_news',
    array(
        'title'      => esc_html__( 'Trending News Options', 'ample-magazine' ),
        'priority'   => 1,
        'panel'      => 'ample_magazine_homepage_setting_panel',
    )
);
/**
 * Show/Hide option
 *
 */

$wp_customize->add_setting(
    'ample_magazine_trending_news_option',
    array(
        'default' => $default['ample_magazine_trending_news_option'],
        'sanitize_callback' => 'ample_magazine_sanitize_select',
    )
);
$hide_show_option = ample_magazine_trending_news_option();
$wp_customize->add_control(
    'ample_magazine_trending_news_option',
    array(
        'type' => 'radio',
        'label' => esc_html__('Trending News Option', 'ample-magazine'),
        'description' => esc_html__('Show/hide option for this Section.', 'ample-magazine'),
        'section' => 'ample_magazine_section_trending_news',
        'choices' => $hide_show_option,
        'priority' => 7
    )
);


// Setting ample_magazine_trending_title.
$wp_customize->add_setting( 'ample_magazine_trending_title',
    array(
        'default'           => $default['ample_magazine_trending_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'ample_magazine_trending_title',
    array(
        'label'    			=> esc_html__( 'Title', 'ample-magazine' ),
        'section'  			=> 'ample_magazine_section_trending_news',
        'type'     			=> 'text',
        'priority' 			=> 100,

    )
);

// Setting ample_magazine_trending_category_id.
$wp_customize->add_setting( 'ample_magazine_trending_category_id',
    array(
        'default'           => $default['ample_magazine_trending_category_id'],
        'sanitize_callback' => 'absint',
    )
);

$wp_customize->add_control(
    new Ample_Magazine_Customize_Category_Control( $wp_customize, 'ample_magazine_trending_category_id',
        array(
            'label'           => esc_html__( 'Select Category', 'ample-magazine' ),
            'section'         => 'ample_magazine_section_trending_news',
            'priority'        => 100,

        )
    )
);


// Setting ample_magazine_trending_post_number.
$wp_customize->add_setting( 'ample_magazine_trending_post_number',
    array(
        'default'           => $default['ample_magazine_trending_post_number'],
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control( 'ample_magazine_trending_post_number',
    array(
        'label'           => esc_html__( 'Number of Posts', 'ample-magazine' ),
        'section'         => 'ample_magazine_section_trending_news',
        'type'            => 'number',
        'priority'        => 100,
        'input_attrs'     => array( 'min' => 1, 'max' => 15,),
    )
);