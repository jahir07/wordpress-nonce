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
        $this->set_nonce( wp_create_nonce( $this->get_action() ) );
        
        return $this->get_nonce();
    }


     /**
     * wp_nonce_field - the nonce field html markup
     *
     * @param bool $param_referer
     * @param bool $param_echo
     * @return string
     */
    public function nonce_field($param_referer = true, $param_echo = true ) : string {

        $this->create_nonce();
        $name   = $this->get_name();
        $action = $this->get_action();
        $nonce  = $this->get_nonce();
        $name = esc_attr( $name );

        return wp_nonce_field( $action, $name, $param_referer, $param_echo );

    }
  

}