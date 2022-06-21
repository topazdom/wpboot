<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

/**
 * THIS FILE CALL ON SETTING ON CONFIG OF CS FRAMEWORK SO DONT NEED TO INCLUDE IT TO FUNCIONS.PHP
 * keterangan :
 * kelas ini digunakan untuk menambahkan field ke taxonomy yang sudah ada sedangkan pembuatan
 * taxonomy baru ada di kelas kh-posttype.php, untuk keterangan lebih lanjut panembahan bisa di lihat di
 * http://codestarframework.com/documentation/#taxonomy-configure
 */
class KH_taxonomi
{
	
	function __construct()
	{
	}

	

	/**
	 * [fields_option description]
	 * this option will render and append on taxonomy as you wish
	 * @return [type] [description]
	 */
	public function fields_option()
	{
		// reset options
		$options        = array();

		// add more field on category
		$options[]    = array(
			'id'        => '_custom_category_options',
			'taxonomy' 	=> 'category', // or array( 'category', 'post_tag' )

			// begin: fields
			'fields'    => array(

				// begin: a field
				array(
					'id'    => 'section_1_text',
					'type'  => 'image',
					'title' => 'Text Field KH Sample',
					),

				// end: a field
				array(
					'id'    => 'section_1_textarea',
					'type'  => 'textarea',
					'title' => 'Textarea Field KH Sample',
					),

			), // end: fields
		);

		// ADD MORE OPTION HERE ...
		// $options[] = array('id' => 'test' , bla);
		
		return $options;
	}


}