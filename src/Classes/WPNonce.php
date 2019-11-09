<?php
namespace Jim\WPNonce\Classes;


/**
 *
 * WPNonce Class
 * @author Jahirul Islam mamun 
 */
class WPNonce extends NonceAbstract
{

    /**
     * WPNonce constructor.
     *
     * @param $param_action
     * @param string $param_name
     */
    public function __construct($param_action, $param_name = '_wpnonce' ) {
        parent::__construct( $param_action, $param_name );
    }

    /**
     * Create nonce string
     *
     * @return string
     */
    public function create_nonce() : string {
        return "testing";
    }


   


}