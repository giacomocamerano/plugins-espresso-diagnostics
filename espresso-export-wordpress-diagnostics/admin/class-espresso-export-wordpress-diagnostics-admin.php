<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://espressoplugins.com
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

		$this->WPDescriptors=[
			'name' => [
				'title' => __('Site title', 'espresso-export-wordpress-diagnostics'),
				'description' => __('Site title (set in Settings > General)', 'espresso-export-wordpress-diagnostics')
			],
			'description' => [
				'title' => __('Site tagline', 'espresso-export-wordpress-diagnostics'),
				'description' => __('Site tagline (set in Settings > General)', 'espresso-export-wordpress-diagnostics')
			],
			'wpurl' => [
				'title' => __('WP Address', 'espresso-export-wordpress-diagnostics'),
			 	'description' => __('The WordPress address (URL) (set in Settings > General)', 'espresso-export-wordpress-diagnostics')
			],
			'url' => [
				'title' => __('Site Address', 'espresso-export-wordpress-diagnostics'),
				'description' => __('The Site address (URL) (set in Settings > General)', 'espresso-export-wordpress-diagnostics')
			],
			'charset' => [
				'title' => __('Charset', 'espresso-export-wordpress-diagnostics'),
				'description' => __('The Encoding for pages and feeds (set in Settings > Reading)', 'espresso-export-wordpress-diagnostics')
			],
			'version' => [
				'title' => __('Version', 'espresso-export-wordpress-diagnostics'),
				'description' => __('The current WordPress version', 'espresso-export-wordpress-diagnostics')
			],
			'html_type' => [
				'title' => __('HTML Type', 'espresso-export-wordpress-diagnostics'),
				'description' => __('The content-type (default: "text/html"). Themes and plugins can override the default value using the \'pre_option_html_type\' filter', 'espresso-export-wordpress-diagnostics')
			],
			'is_rtl' => [
				'title' => __('Text direction', 'espresso-export-wordpress-diagnostics'),
				'description' => __('The text direction determined by the site\'s is_rtl() function', 'espresso-export-wordpress-diagnostics')
			],
			'language' => [
				'title' => __('Language', 'espresso-export-wordpress-diagnostics'),
				'description' => __('Language code for the current site', 'espresso-export-wordpress-diagnostics')
			],
			'stylesheet_url' => [
				'title' => __('Stylesheet URL', 'espresso-export-wordpress-diagnostics'),
				'description' => __('URL to the stylesheet for the active theme. An active child theme will take precedence over this value', 'espresso-export-wordpress-diagnostics')
			],
			'stylesheet_directory' => [
				'title' => __('Stylesheet directory', 'espresso-export-wordpress-diagnostics'),
				'description' => __('Directory path for the active theme. An active child theme will take precedence over this value', 'espresso-export-wordpress-diagnostics')
			],
			'template_url' => [
				'title' => __('Template URL', 'espresso-export-wordpress-diagnostics'),
				'description' => __('URL of the active theme\'s directory. An active child theme will NOT take precedence over this value', 'espresso-export-wordpress-diagnostics')
			],
			'template_directory' => [
				'title' => __('Template Directory', 'espresso-export-wordpress-diagnostics'),
				'description' => __('Dicrectory of the active theme\'s directory. An active child theme will NOT take precedence over this value', 'espresso-export-wordpress-diagnostics')
			],
			'pingback_url' => [
				'title' => __('Pingback URL', 'espresso-export-wordpress-diagnostics'),
				'description' => __('The pingback XML-RPC file URL (xmlrpc.php)', 'espresso-export-wordpress-diagnostics')
			],
			'atom_url' => [
				'title' => __('Atom URL', 'espresso-export-wordpress-diagnostics'),
				'description' => __('The Atom feed URL (/feed/atom)', 'espresso-export-wordpress-diagnostics')
			],
			'rdf_url' => [
				'title' => __('RDF URL', 'espresso-export-wordpress-diagnostics'),
				'description' => __('The RDF/RSS 1.0 feed URL (/feed/rdf)', 'espresso-export-wordpress-diagnostics')
			],
			'rss_url' => [
				'title' => __('RSS URL', 'espresso-export-wordpress-diagnostics'),
				'description' => __('The RSS 0.92 feed URL (/feed/rss)', 'espresso-export-wordpress-diagnostics')
			],
			'rss2_url' => [
				'title' => __('RSS2 URL', 'espresso-export-wordpress-diagnostics'),
				'description' => __('The RSS 2.0 feed URL (/feed)', 'espresso-export-wordpress-diagnostics')
			],
			'comments_atom_url' => [
				'title' => __('Comments Atom URL', 'espresso-export-wordpress-diagnostics'),
				'description' => __('The comments Atom feed URL (/comments/feed)', 'espresso-export-wordpress-diagnostics')
			],
			'comments_rss2_url' => [
				'title' => __('Comments RSS2 URL', 'espresso-export-wordpress-diagnostics'),
				'description' => __('The comments RSS 2.0 feed URL (/comments/feed)', 'espresso-export-wordpress-diagnostics')
			],
			'home' => [
				'title' => __('Home URL', 'espresso-export-wordpress-diagnostics'),
				'description' => __('Website Home as given by then home_url() function', 'espresso-export-wordpress-diagnostics')
			],
		];

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
	 * This function introduces the theme options into the 'Appearance' menu under the tools Submenu.
	 * 
	 * @since    1.0.0
	 */
	public function setup_plugin_options_menu() {
	    
		//Add the menu to the Plugins set of menu items
		add_management_page(
			__('WP Diagnostics', 'espresso-export-wordpress-diagnostics'),		// The title to be displayed in the browser window for this page.
			__('WP Diagnostics', 'espresso-export-wordpress-diagnostics'),  		// The text to be displayed for this menu item
			'manage_options',					            						// Which type of users can see this menu item
			'espresso-export-wordpress-diagnostics',		        				// The unique ID - that is, the slug - for this menu item
			array( $this, 'render_admin_page_content'),   							// The name of the function to call when rendering this menu's page
			50																		// Position in the submenu
		);

	}

	/**
	 * Renders a simple page to display for the theme menu defined above.
	 * 
	 * @since    1.0.0
	 */

	public function render_admin_page_content() {
		$wpDetails=$this->getBloginfo();
		$wpDescriptors=$this->WPDescriptors;
		$wpPlugins=$this->getPlugins();
		$themes=$this->getThemes();
		

		require_once plugin_dir_path( __FILE__ ). 'partials/espresso-export-wordpress-diagnostics-admin-display.php';//*/
	}


	/**
	 * Returns all useful data belonging to the Wordpress Install
	 *
	 * @since    1.0.0
	 */

	private function getBloginfo() {
		return [
			'name'                  => get_bloginfo('name'),
			'description'           => get_bloginfo("description"),
			'wpurl'                 => get_bloginfo("wpurl"),
			'url'                   => get_bloginfo("url"),
			'charset'               => get_bloginfo("charset"),
			'version'               => get_bloginfo('version'),
			'html_type'             => get_bloginfo("html_type"),
			'is_rtl'                => is_rtl(),
			'language'              => get_bloginfo("language"),
			'stylesheet_url'        => get_bloginfo("stylesheet_url"),
			'stylesheet_directory'  => get_bloginfo("stylesheet_directory"),
			'template_url'          => get_bloginfo("template_url"),
			'template_directory'    => get_bloginfo("template_url"),
			'pingback_url'          => get_bloginfo("pingback_url"),
			'atom_url'              => get_bloginfo("atom_url"),
			'rdf_url'               => get_bloginfo("rdf_url"),
			'rss_url'               => get_bloginfo("rss_url"),
			'rss2_url'              => get_bloginfo("rss2_url"),
			'comments_atom_url'     => get_bloginfo("comments_atom_url"),
			'comments_rss2_url'     => get_bloginfo("comments_rss2_url"),
			'home'                  => home_url(),
		];
	}

	/**
	 * Returns all useful data belonging to the Wordpress Plugins, dividing into an array with active and inactive keys
	 *
	 * @since    1.0.0
	 */

	private function getPlugins() {
		$plugins=get_plugins();
		$pluginList=[
			'active' => [],
			'inactive' => [],
		];
		foreach ($plugins as $plugin=>$details) {
			$state="inactive";
			if (is_plugin_active($plugin)) {
				$state="active";
			}
			$pluginList[$state][$plugin]=$details;
		}
		return $pluginList;
	}

	private function getThemes() {
		$themes = wp_get_themes( );
		$themeList=[];
		$activeTheme = wp_get_theme();
		foreach ( $themes as $theme => $object ) {
			$status="inactive";
			if ($activeTheme->get_stylesheet()==$theme) {
				$status="active";
			}
			$parentName="";
			$parent=$object->parent();
			if (!empty($parent)) {
				$parentName=$parent->get_stylesheet();
			}
			$themeList[]=[
				'name' 			=> $object->get("Name"),
				'description'	=> $object->get("Description"),
				'author' 		=> $object->get("Author"),
				'version' 		=> $object->get("Version"),
				'themeuri' 		=> $object->get("ThemeURI"),
				'authoruri' 	=> $object->get("AuthorURI"),
				'tags' 			=> $object->get("Tags"),
				'stylesheet'	=> $theme,
				'parent'		=> $parentName,
				'status'		=> $status
			];
			
		}
		return $themeList;
	}

}
