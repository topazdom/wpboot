<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

require get_template_directory() . '/inc/kh-setting.php';

$obj = new KH_settings();
$settings = $obj->menu_settings();
$options  = $obj->fields_option();
CSFramework::instance( $settings, $options );