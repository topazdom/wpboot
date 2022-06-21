<?php

class main_test extends WP_UnitTestCase {
  // your test code goes here
 

     // test action hooks
    

    function test_Theme() {
    	$this->assertTrue( 'WP Theme Scaffold' == wp_get_theme() );
	}

	function test_jquery_loaded() {
	 
	    do_action( 'wp_enqueue_scripts' );
	    $this->assertTrue( wp_script_is( 'jquery' ) );
	 
	}

	function test_post()
	{
		$_POST['_wpnonce'] = wp_create_nonce( 'initiate-upload' );
		$_POST['title'] = 'lalala';
		$functions = new KH_functions();

		$this->assertInternalType('string', $functions->create_post());


	}
}