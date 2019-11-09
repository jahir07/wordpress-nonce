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