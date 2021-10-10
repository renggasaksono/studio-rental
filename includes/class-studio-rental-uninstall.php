<?php

/**
 * Fired during plugin uninstall
 *
 * @link       https://masrengga.com
 * @since      1.0.0
 *
 * @package    Studio_Rental
 * @subpackage Studio_Rental/includes
 */

/**
 * Fired during plugin uninstall.
 *
 * This class defines all code necessary to run during the plugin's uninstall.
 *
 * @since      1.0.0
 * @package    Studio_Rental
 * @subpackage Studio_Rental/includes
 * @author     Rengga Saksono <rengga.saksono@gmail.com>
 */
class Studio_Rental_Uninstaller {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function uninstall() {
		global $wpdb;

		// Drop db tables
		$wpdb->query( "DROP TABLE {$wpdb->prefix}mr_studio_reservations" );
	}

}
