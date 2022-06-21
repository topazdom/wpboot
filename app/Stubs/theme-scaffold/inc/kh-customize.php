<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

/**
 * THIS FILE CALL ON SETTING ON CONFIG OF CS FRAMEWORK SO DONT NEED TO INCLUDE IT TO FUNCIONS.PHP
 * keterangan :
 * setting untuk men-generate field pada menu customise yang terletak di appereance -> customise
 * untuk keterangan lebih detail tentang cara menambahkan field bisa kunjungi halaman ini
 * http://codestarframework.com/documentation/#customize-configure
 */
class KH_customize
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
		// reset options
		$options        = array();

		$options[]      = array(
			'name'        => 'core_fields',
			'title'       => 'Core Fields',
			'settings'    => array(

				array(
					'name'    => 'text_option',
					'control' => array(
						'label' => 'Text Field',
						'type'  => 'text',
						),
					),

				array(
					'name'    => 'text_option_with_default',
					'default' => 'bla bla bla',
					'control' => array(
						'label' => 'Text Field with Default',
						'type'  => 'text',
						),
					),

				array(
					'name'    => 'textarea_option',
					'transport' => 'postMessage', //Default Transport type for each setting is refresh, however, if you want to create live preview customization you can change it to 'postMessage'. Take a look at the example, we added trasport type to the color picker control.
					'control' => array(
						'label' => 'Textarea Field',
						'type'  => 'textarea',
						),
					),

				)
			);
		
		// ADD MORE OPTIONS HERE OR MODIFY OPTION ABOVE ...
		// $options[] = array()...
		
		return $options;
	}
}