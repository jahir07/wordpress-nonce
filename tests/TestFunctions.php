<?php
namespace Jim\WPNonce\Classes;


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

/**
 * wp_referer_field() fake function.
 *
 * @param boolean $b Boolean value set to false.
 * @return string $field The referer form field.
 */
function wp_referer_field( $b ) {
    return '<input type="hidden" name="_wp_http_referer" value="my-url" />';
}

/**
 * wp_nonce_field() fake funtion
 * 
 * @return string
 */
function wp_nonce_field($action = -1, $name = "_wpnonce", $referer = true , $echo = true ) {
    $name = esc_attr( $name );
    $nonce_field = '<input type="hidden" id="' . $name . '" name="' . $name . '" value="' . wp_create_nonce( $action ) . '" />';

    if ( $referer )
        $nonce_field .= wp_referer_field( false );

    if ( $echo )
        echo $nonce_field;

    return $nonce_field;
}

/**
 * wp_verify_nonce() fake function for varify.
 *
 * @param string $nonce Nonce value.
 * @param string $action Optional. Action value. Default value -1.
 * @return boolean $is_valid true if the nonces is valid, false otherwise.
 */
function wp_verify_nonce( $nonce, $action = -1) {

    $nonce_calc = substr( md5( $action ), -12, 10 );

    if ( $nonce == $nonce_calc ) {
        return true;
    } else {
        return false;
    }
}

