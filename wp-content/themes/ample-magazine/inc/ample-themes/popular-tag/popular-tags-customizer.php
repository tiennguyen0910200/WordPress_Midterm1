<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 6/22/2020
 * Time: 10:07 AM
 */

// Trending News.
$wp_customize->add_section( 'ample_magazine_section_Popular_tag',
    array(
        'title'      => esc_html__( 'Popular Tags Options', 'ample-magazine' ),
        'priority'   => 1,
        'panel'      => 'ample_magazine_homepage_setting_panel',
    )
);
/**
 * Show/Hide option
 *
 */

$wp_customize->add_setting(
    'ample_magazine_Popular_tag_option',
    array(
        'default' => $default['ample_magazine_Popular_tag_option'],
        'sanitize_callback' => 'ample_magazine_sanitize_select',
    )
);
$hide_show_option = ample_magazine_popular_tag_option();
$wp_customize->add_control(
    'ample_magazine_Popular_tag_option',
    array(
        'type' => 'radio',
        'label' => esc_html__('Papular Tags Option', 'ample-magazine'),
        'description' => esc_html__('Show/hide option for this Section.', 'ample-magazine'),
        'section' => 'ample_magazine_section_Popular_tag',
        'choices' => $hide_show_option,
        'priority' => 7
    )
);


// Setting ample_magazine_popular_tag_title.
$wp_customize->add_setting( 'ample_magazine_popular_tag_title',
    array(
        'default'           => $default['ample_magazine_popular_tag_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'ample_magazine_popular_tag_title',
    array(
        'label'    			=> esc_html__( 'Title', 'ample-magazine' ),
        'section'  			=> 'ample_magazine_section_Popular_tag',
        'type'     			=> 'text',
        'priority' 			=> 100,

    )
);




// Setting ample_magazine_popular_tag_post_number.
$wp_customize->add_setting( 'ample_magazine_popular_tag_post_number',
    array(
        'default'           => $default['ample_magazine_popular_tag_post_number'],
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control( 'ample_magazine_popular_tag_post_number',
    array(
        'label'           => esc_html__( 'Number of Tag', 'ample-magazine' ),
        'section'         => 'ample_magazine_section_Popular_tag',
        'type'            => 'number',
        'priority'        => 100,
        'input_attrs'     => array( 'min' => 1, 'max' => 15,),
    )
);