<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

/**
 * THIS FILE CALL ON SETTING ON CONFIG OF CS FRAMEWORK SO DONT NEED TO INCLUDE IT TO FUNCIONS.PHP
 * keterangan : 
 * setting ini digunakan untuk pengaturan pada theme kita bisa membuat pengaturan sendiri untuk
 * theme yang kita kembangkan disini untuk penambahan field lainnya dapat mmembaca halaman ini
 * http://codestarframework.com/documentation/#framework-configure
 */
class KH_settings
{
	
	function __construct()
	{
	}

	/**
	 * [create_fields_on_theme_settings description]
	 * jika melihat hasil tempatnya ada di menu bagian bawah, atau yang sering custom post type
	 * @param  [type] $options [description]
	 * @return [type]          [description]
	 */
	public function menu_settings() {

	  	$settings      = array(); // remove old options
	  	$settings           = array(
			'menu_title'      => 'KH Sample Options',
			'menu_type'       => 'menu', // menu, submenu, options, theme, etc.
			'menu_slug'       => 'cs-framework',
			'ajax_save'       => false,
			'show_reset_all'  => false,
			'framework_title' => 'Codestar Framework <small>by Codestar</small>',
		);

		return $settings;
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
		// ----------------------------------------
		// a option section for options overview  -
		// ----------------------------------------
		$options[]      = array(
			'name'        => 'overwiew',
			'title'       => 'Overview',
			'icon'        => 'fa fa-star',

			// begin: fields
			'fields'      => array(

				// begin: a field
				array(
					'id'      => 'text_1',
					'type'    => 'text',
					'title'   => 'Text',
					),
				// end: a field

				array(
					'id'      => 'textarea_1',
					'type'    => 'textarea',
					'title'   => 'Textarea',
					'help'    => 'This option field is useful. You will love it!',
					),

				array(
					'id'      => 'upload_1',
					'type'    => 'upload',
					'title'   => 'Upload',
					'help'    => 'Upload a site logo for your branding.',
					),

				array(
					'id'      => 'switcher_1',
					'type'    => 'switcher',
					'title'   => 'Switcher',
					'label'   => 'You want to update for this framework ?',
					),

				array(
					'id'      => 'color_picker_1',
					'type'    => 'color_picker',
					'title'   => 'Color Picker',
					'default' => '#3498db',
					),

				array(
					'id'      => 'checkbox_1',
					'type'    => 'checkbox',
					'title'   => 'Checkbox',
					'label'   => 'Did you like this framework ?',
					),

				array(
					'id'      => 'radio_1',
					'type'    => 'radio',
					'title'   => 'Radio',
					'options' => array(
						'yes'   => 'Yes, Please.',
						'no'    => 'No, Thank you.',
						),
					'help'    => 'Are you sure for this choice?',
					),

				array(
					'id'             => 'select_1',
					'type'           => 'select',
					'title'          => 'Select',
					'options'        => array(
						'bmw'          => 'BMW',
						'mercedes'     => 'Mercedes',
						'volkswagen'   => 'Volkswagen',
						'other'        => 'Other',
						),
					'default_option' => 'Select your favorite car',
					),

				array(
					'id'      => 'number_1',
					'type'    => 'number',
					'title'   => 'Number',
					'default' => '10',
					'after'   => ' <i class="cs-text-muted">$ (dollars)</i>',
					),

				array(
					'id'        => 'image_select_1',
					'type'      => 'image_select',
					'title'     => 'Image Select',
					'options'   => array(
						'value-1' => 'http://codestarframework.com/assets/images/placeholder/100x80-2ecc71.gif',
						'value-2' => 'http://codestarframework.com/assets/images/placeholder/100x80-e74c3c.gif',
						'value-3' => 'http://codestarframework.com/assets/images/placeholder/100x80-ffbc00.gif',
						'value-4' => 'http://codestarframework.com/assets/images/placeholder/100x80-3498db.gif',
						'value-5' => 'http://codestarframework.com/assets/images/placeholder/100x80-555555.gif',
						),
					),

				array(
					'type'    => 'notice',
					'class'   => 'info',
					'content' => 'This is info notice field for your highlight sentence.',
					),

				array(
					'id'      => 'background_1',
					'type'    => 'background',
					'title'   => 'Background',
					),

				array(
					'type'    => 'notice',
					'class'   => 'warning',
					'content' => 'This is info warning field for your highlight sentence.',
					),

				array(
					'id'      => 'icon_1',
					'type'    => 'icon',
					'title'   => 'Icon',
					'desc'    => 'Some description here for this option field.',
					),

				array(
					'id'      => 'text_2',
					'type'    => 'text',
					'title'   => 'Text',
					'desc'    => 'Some description here for this option field.',
					),

				array(
					'id'        => 'textarea_2',
					'type'      => 'textarea',
					'title'     => 'Textarea',
					'info'      => 'Some information here for this option field.',
					'shortcode' => true,
					),

			), // end: fields
		);

		// ADD MORE OPTION HERE ...
		// $options[] = array('id' => 'test' , bla);
		return $options;
	}
}