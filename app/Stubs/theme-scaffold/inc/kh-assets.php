<?php 
// don't load directly
if ( !defined('ABSPATH') ) die('-1');

/**
* this is class made by Krafthaus_ contain use for init site load up, like call script, and other settings
* keterangan :
* file ini ditujukan untuk men-load file-file asset yang penting seperti js dan css atau jika ingin meload
* file yang dikhususkan untuk page tertentu bisa di tentukan disini
*/
class KH_assets
{
	// dont use this function php 7 not support custructor anymore
	public function __construct()
	{
		add_action('wp_enqueue_scripts', [ $this, 'load_styles' ] );
		add_action('wp_enqueue_scripts', [ $this, 'load_scripts' ] );
		// ADD MORE REGISTER FUNCTION HERE ...
		
	}

	public function load_styles() {
	    // Load the main stylesheet
	    wp_enqueue_style( 'core', get_stylesheet_uri() );
		wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/assets/css/main-style.min.css'  );

		// ADD MORE STYLE HERE ...
		
	} // end - load_style()

	public function load_scripts() {
        // global $post;

		// default variable js on frontend usefull
        $global_var = array(
            'BASE_URL'       => get_site_url(),
            'TEMPLATE_URL'   => get_template_directory_uri(),
            'STYLESHEET_URL' => get_stylesheet_directory_uri(),
            'AJAX_URL'       => admin_url('admin-ajax.php'),
            // 'POST_ID'        => $post->ID,
            'IS_LOGGED_IN'   => is_user_logged_in()
        );

        wp_localize_script( 'global_variable', 'global', $global_var );
        wp_enqueue_script( 'global_variable' );

	    // Load the main script with dependeces jquery provided by wordpress ('name', 'path', 'dependency', 'show version', 'put in footer')
		wp_enqueue_script( 'engine', get_stylesheet_directory_uri() . '/assets/js/engine.min.js', array( 'jquery' ), false, true );

		// ADD MORE SCRIPT HERE ...

	} // end - load_script()

	// ADD MORE FUNCTION HERE ...

}