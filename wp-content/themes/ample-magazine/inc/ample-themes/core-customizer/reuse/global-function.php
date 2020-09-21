<?php

/**
 * Functions for get_theme_mod()
 *
 * @package ample themes
 * @subpackage ample_magazine
 */

if (!function_exists('ample_magazine_get_option')) :

    /**
     * Get theme option.
     *
     * @since 1.0.0
     *
     * @param string $key Option key.
     * @return mixed Option value.
     */
    function ample_magazine_get_option($key = '')
    {
        if (empty($key)) {
            return;
        }
        $ample_magazine_default_options = ample_magazine_get_default_theme_options();

        $default = (isset($ample_magazine_default_options[$key])) ? $ample_magazine_default_options[$key] : '';

        $theme_option = get_theme_mod($key, $default);

        return $theme_option;

    }

endif;

/**
 *  Ample Magazine Theme Options and Settings
 *
 * @since Ample Magazine 1.0.0
 *
 * @param null
 * @return array ample_magazine_get_options_value
 *
 */
if ( !function_exists('ample_magazine_get_options_value') ) :
    function ample_magazine_get_options_value() {
        $ample_magazine_default_theme_options_values = ample_magazine_get_default_theme_options();;
        $ample_magazine_get_options_value = get_theme_mod( 'ample_magazine_options');
        if( is_array( $ample_magazine_get_options_value )){
            return array_merge( $ample_magazine_default_theme_options_values, $ample_magazine_get_options_value );
        }
        else{
            return $ample_magazine_default_theme_options_values;
        }
    }
endif;