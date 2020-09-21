<?php

// Add Homepage General Setting Panel.
$wp_customize->add_panel( 'ample_magazine_homepage_setting_panel',
	array(
		'title'      => esc_html__( 'Homepage General Setting', 'ample-magazine' ),
		'priority'   => 21,
	)
);




/*Site Layout Options*/
$wp_customize->add_section( 'ample_magazine_design_options', array(
	'priority'       => 1,
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
	'title'          => __( 'Site Layout', 'ample-magazine' ),
	'panel'          => 'ample_magazine_homepage_setting_panel',
) );


/**
 * Site layout Option
 */
$wp_customize->add_setting(
	'ample_magazine_site_layout_options',
	array(
		'default' => $default['ample_magazine_site_layout_options'],
		'sanitize_callback' => 'ample_magazine_sanitize_select',
	)
);


$site_layout = ample_magazine_layout_design();
$wp_customize->add_control('ample_magazine_site_layout_options',
	array(
		'label' => esc_html__('Site Layout', 'ample-magazine'),
		'description' => esc_html__('Choose layout', 'ample-magazine'),
		'section' => 'ample_magazine_design_options',
		'type' => 'select',
		'choices' => $site_layout,
		'priority' => 10
	)
);


// Breaking News.
$wp_customize->add_section( 'section_breaking_news',
	array(
		'title'      => esc_html__( 'Breaking News Options', 'ample-magazine' ),
		'priority'   => 1,
		'panel'      => 'ample_magazine_homepage_setting_panel',
	)
);
/**
 * Show/Hide option
 *
 */

$wp_customize->add_setting(
	'ample_magazine_breaking_news_option',
	array(
		'default' => $default['ample_magazine_breaking_news_option'],
		'sanitize_callback' => 'ample_magazine_sanitize_select',
	)
);
$hide_show_option = ample_magazine_breaking_news_option();
$wp_customize->add_control(
	'ample_magazine_breaking_news_option',
	array(
		'type' => 'radio',
		'label' => esc_html__('Breaking News Option', 'ample-magazine'),
		'description' => esc_html__('Show/hide option for this Section.', 'ample-magazine'),
		'section' => 'section_breaking_news',
		'choices' => $hide_show_option,
		'priority' => 7
	)
);


// Setting ample_magazine_breaking_title.
$wp_customize->add_setting( 'ample_magazine_breaking_title',
	array(
		'default'           => $default['ample_magazine_breaking_title'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'ample_magazine_breaking_title',
	array(
		'label'    			=> esc_html__( 'Title', 'ample-magazine' ),
		'section'  			=> 'section_breaking_news',
		'type'     			=> 'text',
		'priority' 			=> 100,

	)
);

// Setting ample_magazine_breaking_category_id.
$wp_customize->add_setting( 'ample_magazine_breaking_category_id',
	array(
		'default'           => $default['ample_magazine_breaking_category_id'],
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new Ample_Magazine_Customize_Category_Control( $wp_customize, 'ample_magazine_breaking_category_id',
		array(
			'label'           => esc_html__( 'Select Category', 'ample-magazine' ),
			'section'         => 'section_breaking_news',
			'priority'        => 100,

		)
	)
);


// Setting ample_magazine_breaking_post_number.
$wp_customize->add_setting( 'ample_magazine_breaking_post_number',
	array(
		'default'           => $default['ample_magazine_breaking_post_number'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control( 'ample_magazine_breaking_post_number',
	array(
		'label'           => esc_html__( 'Number of Posts', 'ample-magazine' ),
		'section'         => 'section_breaking_news',
		'type'            => 'number',
		'priority'        => 100,
		'input_attrs'     => array( 'min' => 1, 'max' => 15,),
	)
);


/*================= social sharing option ======================================*/


// social sharing section
$wp_customize->add_section( 'ample_magazine_section_social_sharing',
	array(
		'title'      => esc_html__( 'header Social Sharing', 'ample-magazine' ),
		'priority'   => 1,
		'panel'      => 'ample_magazine_homepage_setting_panel',
	)
);


$wp_customize->add_setting(
	'ample_magazine_header_social_option',
	array(
		'default' => $default['ample_magazine_header_social_option'],
		'sanitize_callback' => 'ample_magazine_sanitize_select',
	)
);
$hide_show_option = ample_magazine_breaking_news_option();
$wp_customize->add_control(
	'ample_magazine_header_social_option',
	array(
		'type' => 'radio',
		'label' => esc_html__('Header Social Option', 'ample-magazine'),
		'description' => esc_html__('Show/hide option for this Section.', 'ample-magazine'),
		'section' => 'ample_magazine_section_social_sharing',
		'choices' => $hide_show_option,
		'priority' => 7
	)
);




/**
 * Field for Get Started facebook Link
 *
 */
$wp_customize->add_setting(
	'ample_magazine_facebook_url',
	array(
		'default' => $default['ample_magazine_facebook_url'],
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	'ample_magazine_facebook_url',
	array(
		'type' => 'url',
		'label' => esc_html__('Facebook Url Link', 'ample-magazine'),
		'description' => esc_html__('Use full url link', 'ample-magazine'),
		'section' => 'ample_magazine_section_social_sharing',
		'priority' => 9
	)
);


$wp_customize->add_setting(
	'ample_magazine_twitter_url',
	array(
		'default' => $default['ample_magazine_twitter_url'],
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	'ample_magazine_twitter_url',
	array(
		'type' => 'url',
		'label' => esc_html__('twitter Url Link', 'ample-magazine'),
		'description' => esc_html__('Use full url link', 'ample-magazine'),
		'section' => 'ample_magazine_section_social_sharing',
		'priority' => 14
	)
);


$wp_customize->add_setting(
	'ample_magazine_Google+_url',
	array(
		'default' => $default['ample_magazine_Google+_url'],
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	'ample_magazine_Google+_url',
	array(
		'type' => 'url',
		'label' => esc_html__('Instagram Url Link', 'ample-magazine'),
		'description' => esc_html__('Use full url link', 'ample-magazine'),
		'section' => 'ample_magazine_section_social_sharing',
		'priority' => 12
	)
);

$wp_customize->add_setting(
	'ample_magazine_linkedin_url',
	array(
		'default' => $default['ample_magazine_linkedin_url'],
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	'ample_magazine_linkedin_url',
	array(
		'type' => 'url',
		'label' => esc_html__('linkedin Url Link', 'ample-magazine'),
		'description' => esc_html__('Use full url link', 'ample-magazine'),
		'section' => 'ample_magazine_section_social_sharing',
		'priority' => 13
	)
);







/*-------------------------------------------------------------------------------------------*/
/**
 * header layout Options
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
	'ample_magazine_header_layout_option',
	array(
		'title' => esc_html__('Header Layout Options', 'ample-magazine'),
		'panel' => 'ample_magazine_homepage_setting_panel',
		'priority' => 6,
	)
);

/**
 * header Option
 */
$wp_customize->add_setting(
	'ample_magazine_header_layout_option',
	array(
		'default' => $default['ample_magazine_header_layout_option'],
		'sanitize_callback' => 'ample_magazine_sanitize_select',

	)
);
$hide_header_layout_option = ample_magazine_header_layout_option();
$wp_customize->add_control('ample_magazine_header_layout_option',
	array(
		'label' => esc_html__('Header Layout Options', 'ample-magazine'),
		'section' => 'ample_magazine_header_layout_option',
		'choices' => $hide_header_layout_option,
		'type' => 'select',
		'priority' => 10
	)
);











/**==================================feature slider============================================*/
/*-------------------------------------------------------------------------------------------------*/
/**
 * Slider Section
 *
 */
$wp_customize->add_section(
    'ample_magazine_slider_section',
    array(
        'title' => esc_html__('Main Banner Section', 'ample-magazine'),
        'panel' => 'ample_magazine_homepage_setting_panel',
        'priority' => 2,
    )
);

/**
 * Show/Hide option for Homepage Slider Section
 *
 */

$wp_customize->add_setting(
    'ample_magazine_homepage_slider_option',
    array(
        'default' => $default['ample_magazine_homepage_slider_option'],
        'sanitize_callback' => 'ample_magazine_sanitize_select',
    )
);
$hide_show_option = ample_magazine_slider_option();
$wp_customize->add_control(
    'ample_magazine_homepage_slider_option',
    array(
        'type' => 'radio',
        'label' => esc_html__('Slider Option', 'ample-magazine'),
        'description' => esc_html__('Show/hide option for homepage Slider Section.', 'ample-magazine'),
        'section' => 'ample_magazine_slider_section',
        'choices' => $hide_show_option,
        'priority' => 1
    )
);


/**
 * Design lyaout Option
 */
$wp_customize->add_setting(
	'ample_magazine_design_layout_option',
	array(
		'default' => $default['ample_magazine_design_layout_option'],
		'sanitize_callback' => 'ample_magazine_sanitize_select',

	)
);
$hide_banner_layout_option = ample_magazine_banner_design_layout_option();
$wp_customize->add_control('ample_magazine_design_layout_option',
	array(
		'label' => esc_html__('banner Design Layout Options', 'ample-magazine'),
		'section' => 'ample_magazine_slider_section',
		'choices' => $hide_banner_layout_option,
		'type' => 'select',
		'priority' => 2
	)
);

/**
 * banner Layout Option
 */
$wp_customize->add_setting(
	'ample_magazine_banner_layout_option',
	array(
		'default' => $default['ample_magazine_banner_layout_option'],
		'sanitize_callback' => 'ample_magazine_sanitize_select',

	)
);
$hide_banner_layout_option = ample_magazine_banner_layout_option();
$wp_customize->add_control('ample_magazine_banner_layout_option',
	array(
		'label' => esc_html__('banner Layout Options', 'ample-magazine'),
		'section' => 'ample_magazine_slider_section',
		'choices' => $hide_banner_layout_option,
		'type' => 'select',
		'priority' => 2
	)
);
/**
 * Dropdown available category for homepage slider
 *
 */


$wp_customize->add_setting(
    'ample_magazine_slider_cat_id',
    array(
        'default' => $default['ample_magazine_slider_cat_id'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint'
    )
);
$wp_customize->add_control(new Ample_Magazine_Customize_Category_Control(
        $wp_customize,
        'ample_magazine_slider_cat_id',
        array(
            'label' => esc_html__('Slider Category', 'ample-magazine'),
            'description' => esc_html__('Select Category for Homepage Slider Section', 'ample-magazine'),
            'section' => 'ample_magazine_slider_section',
            'priority' => 2,

        )
    )
);
/**
 * Field for no of posts to display..
 *
 */
$wp_customize->add_setting(
    'ample_magazine_no_of_slider',
    array(
        'default' => $default['ample_magazine_no_of_slider'],
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'ample_magazine_no_of_slider',
    array(
        'type' => 'number',
        'label' => esc_html__('No of Slider', 'ample-magazine'),
        'section' => 'ample_magazine_slider_section',
        'priority' => 3
    )
);


/*----------------------------------------------------------------------------------------------*/

/**==================================feature section============================================*/
/*-------------------------------------------------------------------------------------------------*/


/**
 * Show/Hide option for Homepage feature Section
 *
 */

$wp_customize->add_setting(
    'ample_magazine_homepage_feature_option',
    array(
        'default' => $default['ample_magazine_homepage_feature_option'],
        'sanitize_callback' => 'ample_magazine_sanitize_select',
    )
);
$hide_show_option = ample_magazine_slider_option();
$wp_customize->add_control(
    'ample_magazine_homepage_feature_option',
    array(
        'type' => 'radio',
        'label' => esc_html__('Feature Option', 'ample-magazine'),
        'description' => esc_html__('Show/hide option for homepage Feature Section.', 'ample-magazine'),
        'section' => 'ample_magazine_slider_section',
        'choices' => $hide_show_option,
        'priority' => 4
    )
);





/**
 * Dropdown available category for Feature
 *
 */


$wp_customize->add_setting(
    'ample_magazine_feature_cat_id',
    array(
        'default' => $default['ample_magazine_feature_cat_id'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint'
    )
);
$wp_customize->add_control(new Ample_Magazine_Customize_Category_Control(
        $wp_customize,
        'ample_magazine_feature_cat_id',
        array(
            'label' => esc_html__('Feature Category', 'ample-magazine'),
            'description' => esc_html__('Select Category For  Feature Section', 'ample-magazine'),
            'section' => 'ample_magazine_slider_section',
            'priority' => 5,

        )
    )
);


/*----------------------------------------------------------------------------------------------
  -------------------    footer option -----------------------------------------------------*/
$wp_customize->add_section(
	'ample_magazine_copyright_info_section',
	array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__('Footer Option', 'ample-magazine'),
		'panel'      => 'ample_magazine_homepage_setting_panel',
	)
);






$wp_customize->add_setting(
	'ample_magazine_copyright',
	array(
		'default' => $default['ample_magazine_copyright'],
		'sanitize_callback' => 'wp_kses_post',
	)
);
$wp_customize->add_control(
	'ample_magazine_copyright',
	array(
		'type' => 'text',
		'label' => esc_html__('Copyright', 'ample-magazine'),
		'section' => 'ample_magazine_copyright_info_section',
		'priority' => 8
	)
);





/*date format  Options*/


$wp_customize->add_section( 'ample_magazine_date_options', array(
	'priority'       => 100,
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
	'title'          => __( 'Date Format Option', 'ample-magazine' ),
	'panel'          => 'ample_magazine_homepage_setting_panel',
) );

/**
 * date format Option
 */
$wp_customize->add_setting(
	'ample_magazine_date_format_option',
	array(
		'default' => $default['ample_magazine_date_format_option'],
		'sanitize_callback' => 'ample_magazine_sanitize_select',

	)
);
$ample_magazine_date_format_option = ample_magazine_date_format_option();
$wp_customize->add_control('ample_magazine_date_format_option',
	array(
		'label' => esc_html__('Date Format Options', 'ample-magazine'),
		'section' => 'ample_magazine_date_options',
		'choices' => $ample_magazine_date_format_option,
		'type' => 'select',
		'priority' => 10
	)
);


/*============== meta option =================*/

/*Meta  Options*/


$wp_customize->add_section( 'ample_magazine_meta_options', array(
	'priority'       => 101,
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
	'title'          => __( 'Meta Option On front ', 'ample-magazine' ),
	'panel'          => 'ample_magazine_homepage_setting_panel',
) );


$wp_customize->add_setting(
	'ample_magazine_meta_date_options',
	array(
		'default' => $default['ample_magazine_meta_date_options'],
		'sanitize_callback' => 'ample_magazine_sanitize_select',

	)
);
$date_meta_option = ample_magazine_meta_option();
$wp_customize->add_control('ample_magazine_meta_date_options',
	array(
		'label' => esc_html__('Display Meta Option', 'ample-magazine'),
		'section' => 'ample_magazine_meta_options',
		'choices' => $date_meta_option,
		'type' => 'select',
		'priority' => 100
	)
);
