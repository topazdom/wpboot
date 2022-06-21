<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 * THIS FILE CALL ON SETTING ON CONFIG OF CS FRAMEWORK SO DONT NEED TO INCLUDE IT TO FUNCIONS.PHP
 * keterangan : 
 * file ini digunakan untuk membuat sebuah metabox dan custom field, file ini akan sering 
 * digunakan untuk keterangan cara membuat field dapat di lihat di halaman ini
 * http://codestarframework.com/documentation/#metabox-configure 
 */
class KH_metabox
{

	function __construct()
	{
	}

	/**
	 * [box_options description]
	 * containt option variable to make custom field on custom page
	 * @return [array] [array options]
	 */
	private function box_options( $key )
	{
		// reset options
		$options = array();
		$options = array(
						// using template file name
						'basic-template-sample.php' => array(
							[
								/**
								 * 
								 * CREATE YOUR OWN METABOX HERE...
								 */
								'id'            => '_custom_meta_options',
								'title'         => 'Custom Options KH sample',
								'post_type'     => 'page', // or post or CPT or array( 'page', 'post' )
								'context'       => 'normal',
								'priority'      => 'default',
								'sections'      => array(
									/**
									 * 
									 * CREATE YOUR FIELD WITH SECTION HERE...
									 */
						    		// begin section
									array(
										'name'      => 'section_1',
										'title'     => 'Section 1 KH sample',
										'icon'      => 'fa fa-wifi',
										'fields'    => array(

						        			// a field
											array(
												'id'    => 'metabox_option_id',
												'type'  => 'text',
												'title' => 'An Text Option KH sample',
												),

						        			// a field
											array(
												'id'    => 'metabox_option_other_id',
												'type'  => 'textarea',
												'title' => 'An Textarea Option KH sample',
												),

											),
										),

						    		// begin section
									array(
										'name'      => 'section_2',
										'title'     => 'Section 2 KH sample',
										'icon'      => 'fa fa-heart',
										'fields'    => array(

						        			// a field
											array(
												'id'    => 'metabox_option_2_id',
												'type'  => 'text',
												'title' => 'An Text Option KH sample',
												),

											),
										),
								),
							]
						),
						// ADD MORE OPTIONS HERE OR MODIFY OPTION ABOVE ...
						// 'template-file.php' => array options
					);

		return $options[$key];
	}

	/**
	 * [options description]
	 * this function will call on cs-framework, use to filter variable according to page used
	 * @return [type] [description]
	 */
	public function options()
	{
		$ID       = isset( $_GET['post'] ) ? $_GET['post'] : FALSE;
		$template = basename(  get_page_template_slug( $ID ) );
		$box      = $this->box_options( $template );
		
		return $box;
	}
}