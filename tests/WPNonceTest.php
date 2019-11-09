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
 		$this->test_nonce = \Jim\WPNonce\Tests\wp_create_nonce( $this->test_action );
 	}

	/**
 	* Test the object instance.
 	*/
	public function test_instance() {

		$this->assertInstanceOf( WPNonce::class, $this->test_gen2 );
		$this->assertInstanceOf( WPNonce::class, $this->test_gen1 );
	}



}



