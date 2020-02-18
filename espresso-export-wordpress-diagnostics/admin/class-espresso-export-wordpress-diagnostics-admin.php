<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://jackcamerano.com
 * @since      1.0.0
 *
 * @package    Espresso_Export_Wordpress_Diagnostics
 * @subpackage Espresso_Export_Wordpress_Diagnostics/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Espresso_Export_Wordpress_Diagnostics
 * @subpackage Espresso_Export_Wordpress_Diagnostics/admin
 * @author     Giacomo P. Camerano <giacomo.camerano@studiocaffeina.it>
 */
class Espresso_Export_Wordpress_Diagnostics_Admin {

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
		 * defined in Espresso_Export_Wordpress_Diagnostics_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Espresso_Export_Wordpress_Diagnostics_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/espresso-export-wordpress-diagnostics-admin.css', array(), $this->version, 'all' );

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
		 * defined in Espresso_Export_Wordpress_Diagnostics_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Espresso_Export_Wordpress_Diagnostics_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/espresso-export-wordpress-diagnostics-admin.js', array( 'jquery' ), $this->version, false );

	}


	/**
	 * This function introduces the theme options into the 'Appearance' menu and into a top-level
	 * 'Espresso WP Segment' menu.
	 */
	public function setup_plugin_options_menu() {
	    
		//Add the menu to the Plugins set of menu items
		add_management_page(
			__('WP Export Diagnostics', 'espresso-export-wordpress-diagnostics'),		// The title to be displayed in the browser window for this page.
			__('WP Export Diagnostics', 'espresso-export-wordpress-diagnostics'),  		// The text to be displayed for this menu item
			'manage_options',					            						// Which type of users can see this menu item
			'espresso-export-wordpress-diagnostics',		        				// The unique ID - that is, the slug - for this menu item
			array( $this, 'render_admin_page_content'),   							// The name of the function to call when rendering this menu's page
			50																		// Position in the submenu
		);

	}

	/**
	 * Renders a simple page to display for the theme menu defined above.
	 */
	public function render_admin_page_content() {
		require_once plugin_dir_path( __FILE__ ). 'partials/espresso-export-wordpress-diagnostics-admin-display.php';//*/
	}

}
