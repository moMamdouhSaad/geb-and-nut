<?php
	/**
	 * Travelfic separator sanitization
	 * return nunll
	 */
    if ( ! function_exists( 'travelfic_separator_sanitize' ) ) {
        function travelfic_separator_sanitize() {
            $travelfic_separator = null;
            return $travelfic_separator;
        }
    }

	/**
	 * Travelfic boolean sanitization
	 * return nunll
	 */

    if ( ! function_exists( 'travelfic_boolean_sanitize' ) ) {
        function travelfic_boolean_sanitize($input) {
            $travelfic_boolean = is_bool($input) ? $input : false;
            return $travelfic_boolean;
        }
    }
    

    if ( ! function_exists( 'travelfic_checkbox_sanitize' ) ) {
        function travelfic_checkbox_sanitize($input) {
            $travelfic_checkbox = $input ? true : false;
            return $travelfic_checkbox;
        }
    }
    if ( ! function_exists( 'travelfic_float_sanitize' ) ) {
        function travelfic_float_sanitize($input) {
            return floatval($input);
        }
    }