<?php
namespace Jim\WPNonce\Tests;

use Jim\WPNonce\Classes\WPNonce;
use PHPUnit\Framework\TestCase;

/**
 * Tests for class WPNonce.
 */
class WPNonceTest extends TestCase
{
	/**
	* Test action.
	*
	* @var string $test_action The default test action value.
 	*/
	private $test_action;
	
	/**
	* Test nonce.
	*
	* @var string $test_action The default test nonce value.
 	*/
	private $test_nonce;

	/**
	* Test validator.
	*
	* @var object $test_gen The default test generator object.
 	*/
	private $test_gen;

	/**
 	* Setting up the test environment.
 	*/
	protected function setUp(): void {

 		$this->test_action = 'my_action';
 		$this->test_name = 'my_name';

 		$this->test_gen1 = new WPNonce( $this->test_action );
 		$this->test_gen2 = new WPNonce( $this->test_action, $this->test_name );
 		
 		// Create nonce value.
 		$this->test_nonce = \Jim\WPNonce\Classes\wp_create_nonce( $this->test_action );
 	}

	/**
 	* Test the object instance.
 	*/
	public function test_instance() {

		$this->assertInstanceOf( WPNonce::class, $this->test_gen2 );
		$this->assertInstanceOf( WPNonce::class, $this->test_gen1 );
	}


	 /**
     * Test the getter and setter for the action property.
     */
    public function test_get_set_action() {
        $ng = $this->test_gen2;
        // Check the getter.
        $this->assertSame( $this->test_action, $ng->get_action() );
        // Check the setter.
        $action = $ng->set_action( 'new_action' );
        $this->assertSame( $ng->get_action(), $action );
    }

    /**
     * Test the getter and setter for the name property.
     */
    public function test_get_set_name() {
        $ng = $this->test_gen2;
        // Check the getter.
        $this->assertSame( $this->test_name, $ng->get_name() );
        // Check the setter.
        $name = $ng->set_name( 'new_name' );
        $this->assertSame( $ng->get_name(), $name );
    }

    /**
     * Test the getter and setter for the name property when default value in the constructor is used.
     */
    public function test_default_name() {
        $ng = new WPNonce( 'another_action' );

        // Check the action property getter.
        $this->assertSame( 'another_action', $ng->get_action() );

        // Check the name property getter: the name value now is the default one.
        $this->assertSame( '_wpnonce', $ng->get_name() );
    }

    /**
     * Test the create_nonce method used for the straight generation of the nonce.
     */
    public function test_create_nonce() {
        $ng = $this->test_gen1;
        // Checking null value.
        $this->assertNull( $ng->get_nonce() );
        // Generating the nonce.
        $nonce_generated = $ng->create_nonce();
        // Check the nonce.
        $this->assertSame( $nonce_generated, $this->test_nonce );
    }

    public function test_get_set_nonce() {

        $nonce_generated = $this->test_gen1->create_nonce();

        $this->test_gen1->set_nonce( 'get_set_new_nonce' );
        $this->assertNotEquals( $nonce_generated, $this->test_gen1->get_nonce() );
        $this->assertSame( 'get_set_new_nonce', $this->test_gen1->get_nonce() );
    }


    /**
     * Test the nonce field
     */
    public function test_nonce_field(){

        $nfg = $this->test_gen1;
        $field_results = $nfg->nonce_field( false, false );
        $field_expected = '<input type="hidden" id="_wpnonce" name="_wpnonce" value="' . $this->test_nonce . '" />';
        // result.
        $this->assertSame( $field_results, $field_expected);
    }

    /**
     * Test the generate nonce field referrer
     */
    public function test_nonce_field_referer(){

        $nfg = $this->test_gen1;
        // Generating the form fields.
        $field_results = $nfg->nonce_field( true, false );
        // Building the expected form fields.
        $field_expected = '<input type="hidden" id="_wpnonce" name="_wpnonce" value="' . $this->test_nonce . '" /><input type="hidden" name="_wp_http_referer" value="my-url" />';
        // Checking result.
        
        $this->assertSame( $field_results, $field_expected);
    }

    /**
     * Test the nonce_field method by a nonce parameter to send via POST.
     */
    public function test_nonce_field_echo(){

        $nfg = $this->test_gen1;
        // Building the expected form field.
        $field_expected = '<input type="hidden" id="_wpnonce" name="_wpnonce" value="' . $this->test_nonce . '" />';
        // Check that the result is printed.
        $this->expectOutputString($field_expected);
        // Generating the form fields. The second parameter defaults to true.
        $field_results = $nfg->nonce_field( false );
        // Checking result.
        
        $this->assertSame( $field_results, $field_expected);
    }

    /**
     * Test the nonce_field method by a nonce parameter to send via POST. 
     */
    public function test_nonce_field_referer_echo(){

        $nfg = $this->test_gen1;
        // Building the expected form fields.
        $field_expected = '<input type="hidden" id="_wpnonce" name="_wpnonce" value="' . $this->test_nonce . '" /><input type="hidden" name="_wp_http_referer" value="my-url" />';

        // Check that the result is printed.
        $this->expectOutputString($field_expected);

        // Generating the form fields. Both parameters defaults to true.
        $field_results = $nfg->nonce_field();
        // Checking result.
        
        $this->assertSame( $field_results, $field_expected);
    }


}



