<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

require get_template_directory() . '/inc/kh-taxonomi.php';

$obj     = new KH_taxonomi();
$options = $obj->fields_option();

CSFramework_Taxonomy::instance( $options );


