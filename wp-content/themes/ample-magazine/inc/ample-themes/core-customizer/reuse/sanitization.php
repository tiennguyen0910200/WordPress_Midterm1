<?php
/**
 * Define sanitize functions for customizer fields
 *
 * @package ample themes
 * @subpackage ample_magazine
 * @since 1.0.0
 */

/**
 * Sanitize number
 *
 * @since ample_magazine 1.0.0
 *
 * @param $ample_magazine_input
 * @param $ample_magazine_setting
 * @return int || float || numeric value
 */
if ( !function_exists( 'ample_magazine_sanitize_number' ) ) :
	function ample_magazine_sanitize_number( $input ) {
		$output = intval($input);
		return $output;
	}
endif;

/**
 * Sanitize checkbox field
 *
 * @since ample_magazine 1.0.0
 *
 * @param $checked
 * @return Boolean
 */
if ( !function_exists('ample_magazine_sanitize_checkbox') ) :
	function ample_magazine_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}
endif;


/**
 * Sanitize the page/post
 *
 * @since ample_magazine 1.0.0
 *
 * @param $page_id
 * @return sanitized output as $input
 */
if ( !function_exists( 'ample_magazine_sanitize_dropdown_pages' ) ) :
	function ample_magazine_sanitize_dropdown_pages( $page_id, $setting ) {
		$page_id = absint($page_id );
		// If $page_id is an ID of a published page, return it; otherwise, return the default.
		return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}
endif;

/**
 * Sanitizing the select callback example
 *
 * @since ample_magazine 1.0.0
 *
 * @see sanitize_key()               https://developer.wordpress.org/reference/functions/sanitize_key/
 * @see $wp_customize->get_control() https://developer.wordpress.org/reference/classes/wp_customize_manager/get_control/
 *
 * @param $input
 * @param $setting
 * @return sanitized output
 */
if ( !function_exists('ample_magazine_sanitize_select') ) :
	function ample_magazine_sanitize_select( $input, $setting ) {

		// Ensure input is a slug.
		$input = sanitize_text_field( $input );

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
endif;



/**
 * Sanitize Multiple Category
 * =====================================
 */

if ( !function_exists('ample_magazine_sanitize_multiple_category') ) :

    function ample_magazine_sanitize_multiple_category( $values )
    {

        $multi_values = !is_array( $values ) ? explode( ',', $values ) : $values;

        return !empty( $multi_values ) ? array_map( 'sanitize_text_field', $multi_values ) : array();
    }

endif;
