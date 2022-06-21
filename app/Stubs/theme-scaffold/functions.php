<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

if ( ! isset( $content_width ) ) {
	$content_width = 860;
}

/**
 * Call class use for spesific functions group
 */
/**
 *load library for codestar framwordk handling custom field
 */
define( 'CS_ACTIVE_FRAMEWORK',  true ); // default true
define( 'CS_ACTIVE_METABOX',    true ); // default true
define( 'CS_ACTIVE_TAXONOMY',   true ); // default true
define( 'CS_ACTIVE_SHORTCODE',  true ); // default true
define( 'CS_ACTIVE_CUSTOMIZE',  true ); // default true
require_once get_template_directory() .'/inc/libs/cs-framework/cs-framework.php';
require get_template_directory() . '/inc/kh-assets.php';
require get_template_directory() . '/inc/kh-posttype.php';
require get_template_directory() . '/inc/kh-functions.php';


$init      = new KH_assets();
$posttype  = new KH_posttype();
$functions = new KH_functions();

