<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

require get_template_directory() . '/inc/kh-shortcode.php';

$obj = new KH_shortcode();
$options  = $obj->fields_option();

CSFramework_Shortcode_Manager::instance( $options );

