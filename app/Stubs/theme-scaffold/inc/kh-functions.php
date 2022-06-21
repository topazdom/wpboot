<?php 
// don't load directly
if ( !defined('ABSPATH') ) die('-1');

/**
* this is class made by Krafthaus_ contain function use for development
* keterangan :
* file ini dibuat untuk memembuat fungsi-fungsi yang berhubungan dengan data seperti 
* ajax function, pengiriman email, insert post dan lain sebagainya
*/
class KH_functions
{
	// dont use this function php 7 not support custructor anymore
	public function __construct()
	{
		// ADD MORE REGISTER FUNCTION HERE ...
		
	}

	// ADD MORE FUNCTION HERE ...

	public function create_post()
	{
		$post_information = array(
			'post_title'  => wp_strip_all_tags( $_POST['title'] ),
			'post_type'   => 'post',
			'post_status' => 'pending',
	    );

	 	if (isset($_POST['id'])) {
			$pid                    = $_POST['id'];
			$post_information['ID'] = $pid;

	    	wp_update_post( $post_information );
	    } else {
			$pid        = wp_insert_post( $post_information );
	    }

	    return json_encode(['status' => true]);
	}
}