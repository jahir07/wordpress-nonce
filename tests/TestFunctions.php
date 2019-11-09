<?php
namespace Jim\WPNonce\Tests;


/**
 * Fake functions of wp_create_nonce()
 * 
 * @param string $action
 * @return string $nonce
 */
function wp_create_nonce( $action ){
    return substr( md5( $action ), -12, 10 );
}

/**
 * add_query_arg() function.
 *
 * @param string $name Name of the nonce.
 * @param string $nonce Nonce value.
 * @param string $actionurl Url to update with the nonce.
 * @return string $url The new url with the nonce as query arg.
 */
function add_query_arg( $name, $nonce, $actionurl ) {
    return $actionurl . '?'. $name . '='. $nonce;
}

/**
 * esc_html() function.
 *
 * @param string $text.
 * @return string $text.
 */
function esc_html( $text ) {
    return $text;
}

/**
* esc_attr() function.
*
* @param string $text Text value.
* @return string $text The text value in input.
*/
function esc_attr( $text ) {
	return $text;
}



