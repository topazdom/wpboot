<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

/**
 * keterangan : 
 * file ini digunakan untuk membuat post-type atau taxonomy dikarenakan cs-framework 
 * tidak menyediakan fungsi untuk membuat post-type dan dan taxonomy
 * untuk membuat post type tambahkan option pada function post_type_options
 * untuk membuat taxonomy tambahkan option pada function taxonomy_options
 */

class KH_posttype
{
	
	function __construct()
	{
		add_action( 'init', [ $this, 'register_post_type' ] );
		add_action( 'init', [ $this, 'register_taxonomy' ] );

	}

	/**
	 * [fields_option description]
	 * setting untuk field apa yang akan di tampilkan dalam setting 
	 * @return [type] [description]
	 */
	private function post_type_options()
	{
		// reset options
		$options   = array();
		$options[] = array(
						'slug' => 'movie',
						'data' => array(
							'labels'            => array(
								'name'                => __( 'Movies', 'kh-project-name' ),
								'singular_name'       => __( 'Movie', 'kh-project-name' ),
								'all_items'           => __( 'All Movies', 'kh-project-name' ),
								'new_item'            => __( 'New Movie', 'kh-project-name' ),
								'add_new'             => __( 'Add New', 'kh-project-name' ),
								'add_new_item'        => __( 'Add New Movie', 'kh-project-name' ),
								'edit_item'           => __( 'Edit Movie', 'kh-project-name' ),
								'view_item'           => __( 'View Movie', 'kh-project-name' ),
								'search_items'        => __( 'Search Movies', 'kh-project-name' ),
								'not_found'           => __( 'No Movies found', 'kh-project-name' ),
								'not_found_in_trash'  => __( 'No Movies found in trash', 'kh-project-name' ),
								'parent_item_colon'   => __( 'Parent Movie', 'kh-project-name' ),
								'menu_name'           => __( 'Movies  KH Sample', 'kh-project-name' ),
							),
							'public'                => true,
							'hierarchical'          => false,
							'show_ui'               => true,
							'show_in_nav_menus'     => true,
							'supports'              => array( 'title', 'editor' ),
							'has_archive'           => true,
							'rewrite'               => true,
							'query_var'             => true,
							'menu_icon'             => 'dashicons-format-video',
							'show_in_rest'          => true,
							'rest_base'             => 'movie',
							'rest_controller_class' => 'WP_REST_Posts_Controller',
						)
					);

		// ADD MORE POST TYPE HERE OR MODIFY SAMPLE ABOVE ...
		// $options[] = array()...
		
		return $options;
	}

	/**
	 * [register_post_type description]
	 * function to register all setting as we fill on function post_type_options, DON'T MODIFY THIS FUNCTION
	 * @return [type] [description]
	 */
	public function register_post_type()
	{
		$options = $this->post_type_options();

		foreach ($options as $key => $option) {
			register_post_type( $option['slug'], $option['data'] );
		}
	}

	/**
	 * [taxonomy_options description]
	 * function content option to create taxonomy 
	 * @return [type] [description]
	 */
	private function taxonomy_options()
	{
		$options   = array();
		$options[] = array(
				'slug'      => 'movie-cat',
				'post_type' => 'movie',
				'data'      => array(
						// Hierarchical taxonomy (like categories)
						'hierarchical' => true,
						// This array of options controls the labels displayed in the WordPress Admin UI
						'labels'       => array(
							'name'              => _x( 'Movie Category', 'taxonomy general name' ),
							'singular_name'     => _x( 'Movie Category', 'taxonomy singular name' ),
							'search_items'      =>  __( 'Search Movie Category' ),
							'all_items'         => __( 'All Movie Category' ),
							'parent_item'       => __( 'Parent Movie Category' ),
							'parent_item_colon' => __( 'Parent Movie Category:' ),
							'edit_item'         => __( 'Edit Movie Category' ),
							'update_item'       => __( 'Update Movie Category' ),
							'add_new_item'      => __( 'Add New Location' ),
							'new_item_name'     => __( 'New Movie Category Name' ),
							'menu_name'         => __( 'Movie Category' ),
							),
						// Control the slugs used for this taxonomy
						'rewrite' => array(
							'slug'         => 'movie-cat', // This controls the base slug that will display before each term
							'with_front'   => false, // Don't display the category base before "/Movie Categorys/"
							'hierarchical' => true // This will allow URL's like "/Movie Categorys/boston/cambridge/"
						),
					)
			);

		// ADD MORE OPTIONS HERE OR MODIFY OPTION ABOVE ...
		// $options[] = array()...

		return $options;
	}

	/**
	 * [register_taxonomy description]
	 * register all option on function taxonomy_options, DONT MODIFY THIS FUNCTION 
	 * @return [type] [description]
	 */
	public function register_taxonomy()
	{
		$options = $this->taxonomy_options();

		foreach ($options as $key => $option) {
			register_taxonomy( $option['slug'], $option['post_type'], $option['data'] );
		}
	}
}
