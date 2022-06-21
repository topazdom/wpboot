<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.


require get_template_directory() . '/inc/kh-customize.php';

$obj = new KH_customize();
$options  = $obj->fields_option();

CSFramework_Customize::instance( $options );
