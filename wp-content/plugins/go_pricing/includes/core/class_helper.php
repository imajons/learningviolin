<?php
/**
 * Helper class
 */


// Prevent direct call
if ( !defined( 'WPINC' ) ) die;
if ( !class_exists( 'GW_GoPricing' ) ) die;	

// Class
class GW_GoPricing_Helper {
		

	/**
	 * Clean input fields
	 *
	 * @return array
	 */
	 
	public static function clean_input( $data = array(), $format = 'filtered', $exclude_html_keys = array(), $exclude_all_keys = array() ) {
		
		foreach ( (array)$data as $key => $value ) {
			
			if ( is_array( $value ) ) { 
				$data[$key] = self::clean_input( $value, $format, $exclude_html_keys, $exclude_all_keys );	
			} else {
				if ( $format == 'html' || in_array( $key, (array)$exclude_html_keys, true  ) ) {
					$data[$key] = stripslashes( trim( $value ) );
				} elseif ( $format == 'raw' || in_array( $key, (array)$exclude_all_keys, true ) ) {
					$data[$key] = stripslashes( $value );
				} elseif ( $format == 'no_html' || in_array( $key, (array)$exclude_all_keys, true ) ) {
					$data[$key] = stripslashes( strip_tags( trim( $value ) ) );
				} else {
					$data[$key] = stripslashes( sanitize_text_field( $value ) );
				}
			}
			
		}
		
		return $data;
				
	}
	
	
	/**
	 * Remove input (remove private inputs)
	 *
	 * @return array
	 */	
	
	public static function remove_input( $data = array(), $keys = array(), $clean_private = true ) {
		
		foreach ( (array)$data as $key => $value ) {

			if ( is_array( $value ) ) { 			
				if ( in_array ( $key, (array)$keys, true ) || ( $clean_private === true && preg_match( '/^(_.*)+/' , $key ) == 1 ) ) {
					unset( $data[$key] );
				} else {
					$data[$key] = self::remove_input( $value, $keys, $clean_private );
				}
			} else {
				if ( in_array ( $key, (array)$keys, true ) || ( $clean_private === true && preg_match( '/^(_.*)+/' , $key ) == 1 ) ) unset( $data[$key] );										
			}
			
		}
		
		return $data;		
				
	}
	
	
	/**
	 * Parset data (remove private inputs)
	 *
	 * @return array
	 */	
	
	public static function parse_data( $data ) {
		
		if ( !is_string( $data ) || $data == '' ) return;
		
		parse_str( $data, $data );
		
		if ( function_exists( 'get_magic_quotes_gpc' ) && get_magic_quotes_gpc() ) $data = stripslashes_deep( $data );
		
		return $data;		
				
	}
	
	
	/**
	 * Escape % char in (s)printf arg
	 *
	 * @return string
	 */	
	 	
	
	public static function esc_sprint( $string ) {
		
		if ( empty( $string ) ) return $string;
				
		return preg_replace( '/[%]/', '%%', $string );
		
	}
	
	
	/**
	 * Clean escaped % char in (s)printf 
	 *
	 * @return string
	 */	
	 	
	
	public static function clean_esc_sprint( $string ) {
		
		if ( empty( $string ) ) return $string;
				
		return preg_replace( '/%%/', '%', $string );
		
	}
	
	
	/**
	 * Remove single & double quotes from shortcodes
	 *
	 * @return string
	 */	
	 	
	
	public static function parse_shortcodes( $html ) {
		
		if ( empty( $html ) ) return $html;
		
		$html = preg_replace_callback( '/(=("|\'))((?:(?!\2)[^<>]*?\[+[^\[\]]+(?:[^\[\]])?\]))\2/', 'self::parse_shortcode_in_attr', $html ); // Shortcodes in quoted attribute value
		$html = preg_replace_callback( '/=(([^"\'=><` ]+)?\[+[^\[\]]+(?:[^\[\]])?\])+/', 'self::parse_shortcode_in_attr', $html ); // Shortcodes in unquoted attribute value (just to make sure)
		$html = preg_replace_callback( '/\[+[^\[\]]+(?:[^\[\]])?\]/', 'self::do_shortcode', $html ); // Shortcode in the content
				
		return $html; 

	}		


	/**
	 * Function parse shortcode in attributes
	 *
	 * @return string
	 */	

	public static function parse_shortcode_in_attr( $matches ) {
		
		return preg_replace_callback( '/\[+[^\[\]]+(?:[^\[\]])?\]/', 'self::do_shortcode_escape', $matches[0] );		
	}
	
	
	/**
	 * Callback function escape and do shortcode
	 *
	 * @return string
	 */	
	 	
	public static function do_shortcode_escape( $matches ) {
		
		if ( preg_match( '/=(&#039;)(.*)\1/', $matches[0] ) ) {
			return esc_attr( do_shortcode( preg_replace('/&#039;/', '\'', $matches[0] ) ) );
		} elseif ( preg_match( '/=(&quot;)(.*)\1/', $matches[0] ) ) {
			return esc_attr( do_shortcode( preg_replace('/&quot;/', '"', $matches[0] ) ) );			
		} else {
			return esc_attr (do_shortcode( $matches[0] ) );
		}

	}
	
	
	/**
	 * Callback function to do shortcode
	 *
	 * @return string
	 */	
	
	public static function do_shortcode( $matches ) {

		return do_shortcode ( $matches[0] );

	}	

}
 
?>