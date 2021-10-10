<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://masrengga.com
 * @since             1.0.0
 * @package           Studio_Rental
 *
 * @wordpress-plugin
 * Plugin Name:       Studio Rental
 * Plugin URI:        https://masrengga.com
 * Description:       Create studio rental items for visitor to make reservations by choosing a date and time duration.
 * Version:           1.0.0
 * Author:            Rengga Saksono
 * Author URI:        https://masrengga.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       studio-rental
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'STUDIO_RENTAL_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-studio-rental-activator.php
 */
function activate_studio_rental() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-studio-rental-activator.php';
	Studio_Rental_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-studio-rental-deactivator.php
 */
function deactivate_studio_rental() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-studio-rental-deactivator.php';
	Studio_Rental_Deactivator::deactivate();
}

/**
 * The code that runs during plugin uninstall.
 * This action is documented in includes/class-studio-rental-uninstall.php
 */
function uninstall_studio_rental() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-studio-rental-uninstall.php';
	Studio_Rental_Uninstaller::uninstall();
}

register_activation_hook( __FILE__, 'activate_studio_rental' );
register_deactivation_hook( __FILE__, 'deactivate_studio_rental' );
register_uninstall_hook( __FILE__, 'uninstall_studio_rental');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-studio-rental.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_studio_rental() {

	$plugin = new Studio_Rental();
	$plugin->run();

}
run_studio_rental();
