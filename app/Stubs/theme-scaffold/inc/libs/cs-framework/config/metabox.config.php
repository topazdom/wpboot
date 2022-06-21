<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

require get_template_directory() . '/inc/kh-metabox.php';

$obj = new KH_metabox();
$options  = $obj->options();

CSFramework_Metabox::instance( $options );
