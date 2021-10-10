<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://masrengga.com
 * @since      1.0.0
 *
 * @package    Studio_Rental
 * @subpackage Studio_Rental/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Studio_Rental
 * @subpackage Studio_Rental/admin
 * @author     Rengga Saksono <rengga.saksono@gmail.com>
 */
class Studio_Rental_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Studio_Rental_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Studio_Rental_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/studio-rental-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Studio_Rental_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Studio_Rental_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/studio-rental-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register studio service custom post type
	 */
	public function register_studio_services() {

		// Set UI labels for Custom Post Type
		$labels = array(
				'name'                => _x( 'Studio Services', 'Post Type General Name', 'studio-rental'),
				'singular_name'       => _x( 'Studio Service', 'Post Type Singular Name', 'studio-rental' ),
				'menu_name'           => __( 'Studio Services', 'studio-rental' ),
				'parent_item_colon'   => __( 'Parent Studio Service', 'studio-rental' ),
				'all_items'           => __( 'All Studio Services', 'studio-rental' ),
				'view_item'           => __( 'View Studio Service', 'studio-rental' ),
				'add_new_item'        => __( 'Add New Studio Service', 'studio-rental' ),
				'add_new'             => __( 'Add New', 'studio-rental' ),
				'edit_item'           => __( 'Edit Studio Service', 'studio-rental' ),
				'update_item'         => __( 'Update Studio Service', 'studio-rental' ),
				'search_items'        => __( 'Search Studio Service', 'studio-rental' ),
				'not_found'           => __( 'Not Found', 'studio-rental' ),
				'not_found_in_trash'  => __( 'Not found in Trash', 'studio-rental' ),
		);

		// Set other options for Custom Post Type
		$args = array(
				'label'               => __( 'Studio Services', 'studio-rental' ),
				'description'         => __( 'Studio Services', 'studio-rental' ),
				'labels'              => $labels,
				'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields' ),
				'rewrite'             => array( 'slug' => 'studio-services' ),
				'hierarchical'        => false,
				'public'              => true,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'show_in_nav_menus'   => true,
				'show_in_admin_bar'   => true,
				'query_var'			  => true,
				'menu_position'       => 5,
				'can_export'          => true,
				'has_archive'         => true,
				'exclude_from_search' => false,
				'publicly_queryable'  => true,
				'capability_type'     => 'post',
				'show_in_rest' 		  => true,
		);

		// Registering your Custom Post Type
		register_post_type( 'mr_studio_services', $args );
	}

}
