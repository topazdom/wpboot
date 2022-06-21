<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

/**
 * THIS FILE CALL ON SETTING ON CONFIG OF CS FRAMEWORK SO DONT NEED TO INCLUDE IT TO FUNCIONS.PHP
 * keterangan : 
 * kelas ini berisi shortcode yang akan di tulis di editor
 * sedangkan untuk penerjemahan shortcode disediakan di kelas functions
 */

class KH_shortcode
{
	
	function __construct()
	{
	}

	/**
	 * [fields_option description]
	 * setting untuk field apa yang akan di tampilkan dalam setting 
	 * @return [type] [description]
	 */
	public function fields_option()
	{
		// reset shortcodes
		$shortcodes        = array();
		// $shortcodes[]     = array(
		// 	'name'          => 'kh_sample',
		// 	'title'         => 'KH Sample #1',
		// 	'shortcodes'    => array(

		// 		array(
		// 			'name'      => 'kh_slider',
		// 			'title'     => 'Kh Slider',
		// 			'fields'    => array(
		// 				array(
		// 					'id'    => 'title',
		// 					'type'  => 'text',
		// 					'title' => 'Title',
		// 					'help'  => 'Reference site about Lorem Ipsum.',
		// 					),
		// 				array(
		// 					'id'    => 'content',
		// 					'type'  => 'textarea',
		// 					'title' => 'Content',
		// 					)
		// 				),
		// 			),

		// 		)
		// 	);
		
		// ADD MORE OPTION HERE ...
		// $shortcodes[] = array('id' => 'test' , bla);

		return $shortcodes;
	}
}