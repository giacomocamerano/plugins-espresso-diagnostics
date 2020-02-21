<?php

/**
 * @link              https://espressoplugins.com
 * @since             1.0.0
 * @package           Espresso_Diagnostics
 *
 * @wordpress-plugin
 * Plugin Name:       Espresso Diagnostics
 * Plugin URI:        https://espressoplugins.com
 * Description:       Plugin that extracts data on WP installation, installed themes, installed plugins and server info for diagnostic purposes
 * Version:           1.0.0
 * Author:            Espresso Plugins
 * Author URI:        https://espressoplugins.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       espresso-diagnostics
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
define( 'ESPRESSO_DIAGNOSTICS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-espresso-diagnostics-activator.php
 */
function activate_espresso_diagnostics() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-espresso-diagnostics-activator.php';
	Espresso_Diagnostics_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-espresso-diagnostics-deactivator.php
 */
function deactivate_espresso_diagnostics() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-espresso-diagnostics-deactivator.php';
	Espresso_Diagnostics_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_espresso_diagnostics' );
register_deactivation_hook( __FILE__, 'deactivate_espresso_diagnostics' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-espresso-diagnostics.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_espresso_diagnostics() {

	$plugin = new Espresso_Diagnostics();
	$plugin->run();

}
run_espresso_diagnostics();
