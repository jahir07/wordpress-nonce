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


     /**
     * Create nonce url string
     *
     * @return string
     */
    public function nonce_url($param_actionurl ) : string {
        $this->create_nonce();

        $name   = $this->get_name();
        $action  = $this->get_action();
        $actionurl = str_replace( '&amp;', '&', $param_actionurl );

        return wp_nonce_url( $actionurl, $action, $name );
    }

    /**
     * Validate the nonce.
     *
     * @return    boolean $is_valid False if the nonce is invalid. Otherwise, returns true.
     */
    private function validate() : bool {
        $is_valid = wp_verify_nonce( $this->get_nonce(), $this->get_action() );
        if ( false === $is_valid ) {
            return $is_valid;
        } else {
            return true;
        }
    }


    /**
     * Validate the nonce from the request.
     *
     * @return bool
     */
    public function validate_request() {
        $is_valid = false;
        if ( isset( $_REQUEST[ $this->get_name() ] ) ) {
            $nonce_received = sanitize_text_field( wp_unslash( $_REQUEST[ $this->get_name() ] ) );
            $this->set_nonce( $nonce_received );
            $is_valid = $this->validate();
        }
        return $is_valid;
    }

    /**
     * Validate nonce
     *
     * @param $param_nonce
     * @return bool
     */
    public function validate_nonce($param_nonce ) {
        $is_valid = false;

        $this->set_nonce( $param_nonce );
        $is_valid = $this->validate();
        return $is_valid;
    }


}