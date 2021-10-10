<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://masrengga.com
 * @since      1.0.0
 *
 * @package    Studio_Rental
 * @subpackage Studio_Rental/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Studio_Rental
 * @subpackage Studio_Rental/includes
 * @author     Rengga Saksono <rengga.saksono@gmail.com>
 */
class Studio_Rental_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'studio-rental',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
