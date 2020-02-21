<?php

/**
 * @link              https://espressoplugins.com
 * @since             1.0.0
 * @package           Espresso__Wordpress_Diagnostics
 *
 * @wordpress-plugin
 * Plugin Name:       Espresso Wordpress Diagnostics
 * Plugin URI:        https://espressoplugins.com
 * Description:       Plugin that extracts data on WP installation, installed themes, installed plugins and server info for diagnostic purposes
 * Version:           1.0.0
 * Author:            Giacomo P. Camerano
 * Author URI:        https://espressoplugins.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       espresso-wordpress-diagnostics
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
define( 'ESPRESSO__WORDPRESS_DIAGNOSTICS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-espresso-wordpress-diagnostics-activator.php
 */
function activate_espresso__wordpress_diagnostics() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-espresso-wordpress-diagnostics-activator.php';
	Espresso__Wordpress_Diagnostics_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-espresso-wordpress-diagnostics-deactivator.php
 */
function deactivate_espresso__wordpress_diagnostics() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-espresso-wordpress-diagnostics-deactivator.php';
	Espresso__Wordpress_Diagnostics_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_espresso__wordpress_diagnostics' );
register_deactivation_hook( __FILE__, 'deactivate_espresso__wordpress_diagnostics' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-espresso-wordpress-diagnostics.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_espresso__wordpress_diagnostics() {

	$plugin = new Espresso__Wordpress_Diagnostics();
	$plugin->run();

}
run_espresso__wordpress_diagnostics();
