<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://wp.candlefood.com/miscellany
 * @since             1.0.0
 * @package           Miscellany
 *
 * @wordpress-plugin
 * Plugin Name:       Miscellany
 * Plugin URI:        https://wp.candlefood.com/miscellany
 * Description:       This plugin is used to build portfolio
 * Version:           1.0.0
 * Author:            Rahul Kumar
 * Author URI:        https://rahulkumar.website
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       miscellany
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
define( 'MISCELLANY_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-miscellany-activator.php
 */
function activate_miscellany() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-miscellany-activator.php';
	Miscellany_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-miscellany-deactivator.php
 */
function deactivate_miscellany() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-miscellany-deactivator.php';
	Miscellany_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_miscellany' );
register_deactivation_hook( __FILE__, 'deactivate_miscellany' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-miscellany.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_miscellany() {

	$plugin = new Miscellany();
	$plugin->run();

}
run_miscellany();
