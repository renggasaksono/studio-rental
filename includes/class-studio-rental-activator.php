<?php

/**
 * Fired during plugin activation
 *
 * @link       https://masrengga.com
 * @since      1.0.0
 *
 * @package    Studio_Rental
 * @subpackage Studio_Rental/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Studio_Rental
 * @subpackage Studio_Rental/includes
 * @author     Rengga Saksono <rengga.saksono@gmail.com>
 */
class Studio_Rental_Activator {

	/**
	 * Create database tables during activation.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		// Create db tables
		$activator = new self;
		$activator->mr_create_studio_reservations_table();
	}
	
	/**
	 * Create reservations table to store bookings
	 */
	function mr_create_studio_reservations_table() {
		global $wpdb;

		require_once ABSPATH . 'wp-admin/includes/upgrade.php';

		$charset    = $wpdb->get_charset_collate();
		$table_name = $wpdb->prefix . 'mr_studio_reservations';
		$query      = "
			CREATE TABLE IF NOT EXISTS {$table_name} (
				ID         			BIGINT(20)   UNSIGNED NOT NULL AUTO_INCREMENT,
				studio_service_ID	BIGINT NOT NULL,
				date				DATE NOT NULL,
				start_time			TIME NOT NULL,
				end_time    		TIME NOT NULL,
				contact_name		VARCHAR(255) NOT NULL,
				contact_phone		VARCHAR(255) NOT NULL,
				contact_email		VARCHAR(255) NOT NULL,
				contact_message 	VARCHAR(255) NULL,
				updated_at 			TIMESTAMP NOT NULL DEFAULT NOW() ON UPDATE NOW(),
				primary key (ID)
			) {$charset};
		";
		
		dbDelta( $query );
	}
}
