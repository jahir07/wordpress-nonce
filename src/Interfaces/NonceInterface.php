<?php
namespace Jim\WPNonce\Interfaces;

/**
*  Nonce Interface
*  Interface Class
*/
interface NonceInterface {

    /**
     * Get name property.
     *
     * @return string $name The nonce name value.
     */
    public function get_name();
    
    /**
     * Set name property.
     *
     * @param string $param_name
     * @return string $name
     */
    public function set_name( $param_name );
    
    /**
     * Get action property.
     **
     * @return string $action
     */
    public function get_action();
    
    /**
     * Set action property.
     *
     * @param string $param_action
     * @return string $action
     */
    public function set_action( $param_action );
    
    /**
     * Get nonce property.
     *
     * @return string $nonce
     */
    public function get_nonce();
   
    /**
     * Set nonce property.
     *
     * @param string $param_nonce
     * @return string $nonce
     */
    public function set_nonce( $param_nonce );

}