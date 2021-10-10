<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://masrengga.com
 * @since      1.0.0
 *
 * @package    Studio_Rental
 * @subpackage Studio_Rental/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Studio_Rental
 * @subpackage Studio_Rental/public
 * @author     Rengga Saksono <rengga.saksono@gmail.com>
 */
class Studio_Rental_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/studio-rental-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css', array(), '5.1.3', 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/studio-rental-public.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', array( 'jquery' ), '5.3.1', false );

	}

	/**
	 * Filter archive view to use custom template included in the plugin.
	 *
	 * @since    1.0.0
	 */
	public function load_studio_services_archive_template( $archive_template ) {
		global $post;
   
		if ( is_post_type_archive ( 'mr_studio_services' ) ) {
			$archive_template = plugin_dir_path( dirname( __FILE__ ) ) . 'public/template/studio-services-archive.php';
		}
		return $archive_template;
   }

   /**
	 * Filter single view to use custom template included in the plugin.
	 *
	 * @since    1.0.0
	 */
	public function load_studio_services_single_template( $template ) {

		if ( is_singular( 'mr_studio_services' ) ) {
			$template = plugin_dir_path( dirname( __FILE__ ) ) . 'public/template/studio-services-single.php';
		}
		
		return $template;
	}

}
