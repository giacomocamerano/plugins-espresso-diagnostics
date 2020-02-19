<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://espressoplugins.com
 * @since      1.0.0
 *
 * @package    Espresso_Export_Wordpress_Diagnostics
 * @subpackage Espresso_Export_Wordpress_Diagnostics/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Espresso_Export_Wordpress_Diagnostics
 * @subpackage Espresso_Export_Wordpress_Diagnostics/includes
 * @author     Giacomo P. Camerano <giacomo.camerano@studiocaffeina.it>
 */
class Espresso_Export_Wordpress_Diagnostics_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'espresso-export-wordpress-diagnostics',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
