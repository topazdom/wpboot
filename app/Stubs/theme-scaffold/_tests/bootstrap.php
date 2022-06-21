<?php

$_tests_dir = getenv( 'WP_TESTS_DIR' );
if ( ! $_tests_dir ) {
    $_tests_dir = '';
}

require_once $_tests_dir . '_test_includes/functions.php';

function _manually_load_plugin() {
	switch_theme('wp-theme-scaffold');
    // require dirname( dirname( __FILE__ ) ) . '/functions.php';
}
tests_add_filter( 'muplugins_loaded', '_manually_load_plugin' );

require $_tests_dir . '_test_includes/bootstrap.php';