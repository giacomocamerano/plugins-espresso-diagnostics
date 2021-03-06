<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://espressoplugins.com
 * @since      1.0.0
 *
 * @package    Espresso_Diagnostics
 * @subpackage Espresso_Diagnostics/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Espresso_Diagnostics
 * @subpackage Espresso_Diagnostics/admin
 * @author     Espresso Plugins <giacomo.camerano@studiocaffeina.it>
 */
class Espresso_Diagnostics_Admin {

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
				'title' => __('Site title', 'espresso-diagnostics'),
				'description' => __('Site title (set in Settings > General)', 'espresso-diagnostics')
			],
			'description' => [
				'title' => __('Site tagline', 'espresso-diagnostics'),
				'description' => __('Site tagline (set in Settings > General)', 'espresso-diagnostics')
			],
			'wpurl' => [
				'title' => __('WP Address', 'espresso-diagnostics'),
			 	'description' => __('The WordPress address (URL) (set in Settings > General)', 'espresso-diagnostics')
			],
			'url' => [
				'title' => __('Site Address', 'espresso-diagnostics'),
				'description' => __('The Site address (URL) (set in Settings > General)', 'espresso-diagnostics')
			],
			'charset' => [
				'title' => __('Charset', 'espresso-diagnostics'),
				'description' => __('The Encoding for pages and feeds (set in Settings > Reading)', 'espresso-diagnostics')
			],
			'version' => [
				'title' => __('Version', 'espresso-diagnostics'),
				'description' => __('The current WordPress version', 'espresso-diagnostics')
			],
			'html_type' => [
				'title' => __('HTML Type', 'espresso-diagnostics'),
				'description' => __('The content-type (default: "text/html"). Themes and plugins can override the default value using the \'pre_option_html_type\' filter', 'espresso-diagnostics')
			],
			'is_rtl' => [
				'title' => __('Text direction', 'espresso-diagnostics'),
				'description' => __('The text direction determined by the site\'s is_rtl() function', 'espresso-diagnostics')
			],
			'language' => [
				'title' => __('Language', 'espresso-diagnostics'),
				'description' => __('Language code for the current site', 'espresso-diagnostics')
			],
			'stylesheet_url' => [
				'title' => __('Stylesheet URL', 'espresso-diagnostics'),
				'description' => __('URL to the stylesheet for the active theme. An active child theme will take precedence over this value', 'espresso-diagnostics')
			],
			'stylesheet_directory' => [
				'title' => __('Stylesheet directory', 'espresso-diagnostics'),
				'description' => __('Directory path for the active theme. An active child theme will take precedence over this value', 'espresso-diagnostics')
			],
			'template_url' => [
				'title' => __('Template URL', 'espresso-diagnostics'),
				'description' => __('URL of the active theme\'s directory. An active child theme will NOT take precedence over this value', 'espresso-diagnostics')
			],
			'template_directory' => [
				'title' => __('Template Directory', 'espresso-diagnostics'),
				'description' => __('Dicrectory of the active theme\'s directory. An active child theme will NOT take precedence over this value', 'espresso-diagnostics')
			],
			'pingback_url' => [
				'title' => __('Pingback URL', 'espresso-diagnostics'),
				'description' => __('The pingback XML-RPC file URL (xmlrpc.php)', 'espresso-diagnostics')
			],
			'atom_url' => [
				'title' => __('Atom URL', 'espresso-diagnostics'),
				'description' => __('The Atom feed URL (/feed/atom)', 'espresso-diagnostics')
			],
			'rdf_url' => [
				'title' => __('RDF URL', 'espresso-diagnostics'),
				'description' => __('The RDF/RSS 1.0 feed URL (/feed/rdf)', 'espresso-diagnostics')
			],
			'rss_url' => [
				'title' => __('RSS URL', 'espresso-diagnostics'),
				'description' => __('The RSS 0.92 feed URL (/feed/rss)', 'espresso-diagnostics')
			],
			'rss2_url' => [
				'title' => __('RSS2 URL', 'espresso-diagnostics'),
				'description' => __('The RSS 2.0 feed URL (/feed)', 'espresso-diagnostics')
			],
			'comments_atom_url' => [
				'title' => __('Comments Atom URL', 'espresso-diagnostics'),
				'description' => __('The comments Atom feed URL (/comments/feed)', 'espresso-diagnostics')
			],
			'comments_rss2_url' => [
				'title' => __('Comments RSS2 URL', 'espresso-diagnostics'),
				'description' => __('The comments RSS 2.0 feed URL (/comments/feed)', 'espresso-diagnostics')
			],
			'home' => [
				'title' => __('Home URL', 'espresso-diagnostics'),
				'description' => __('Website Home as given by then home_url() function', 'espresso-diagnostics')
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
		 * defined in Espresso_Diagnostics_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Espresso_Diagnostics_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/espresso-diagnostics-admin.css', array(), $this->version, 'all' );

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
		 * defined in Espresso_Diagnostics_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Espresso_Diagnostics_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/espresso-diagnostics-admin.js', array( 'jquery' ), $this->version, false );

	}


	/**
	 * This function introduces the theme options into the 'Appearance' menu under the tools Submenu.
	 * 
	 * @since    1.0.0
	 */
	public function setup_plugin_options_menu() {
	    
		//Add the menu to the Plugins set of menu items
		add_management_page(
			__('WP Diagnostics', 'espresso-diagnostics'),		// The title to be displayed in the browser window for this page.
			__('WP Diagnostics', 'espresso-diagnostics'),  		// The text to be displayed for this menu item
			'manage_options',					            						// Which type of users can see this menu item
			'espresso-diagnostics',		        				// The unique ID - that is, the slug - for this menu item
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
		$info=$this->getInfoArray();
		$wpDescriptors=$this->WPDescriptors;

		require_once plugin_dir_path( __FILE__ ). 'partials/espresso-diagnostics-admin-display.php';//*/
	}

	/**
	 * Renders a simple page with all data on installation to copy and paste
	 *
	 * @since    1.0.0
	 */

	public function plainDisplay() {
		$nonce = $_REQUEST['_wpnonce'];
		if ( ! wp_verify_nonce( $nonce, 'espresso_generate_diagnostic_package_copy' ) ) {
			die(__('Security check failed', 'espresso-diagnostics'));
		} else {
			$info=$this->getInfoArray();
			echo $this->generateText($info);
			die();
		}
	}


	/**
	 * Returns all useful data regarding the Wordpress Install
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
	 * Returns all useful data regarding installed Plugins, dividing into an array with active and inactive keys
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

	/**
	 * Returns all useful data regarding installed Themes
	 *
	 * @since    1.0.0
	 */

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

	/**
	 * Returns all useful data regarding the webserver
	 *
	 * @since    1.0.0
	 */

	private function getServerData() {
		global $is_apache, $is_nginx, $is_IIS, $is_iis7;
		$server=[];
		$server['webserver']=__("Unknown server", 'espresso-diagnostics');

		if ($is_apache) {
			$server['webserver']=__("Apache", 'espresso-diagnostics');
		} elseif ($is_nginx) {
			$server['webserver']=__("NGINX", 'espresso-diagnostics');
		} elseif ($is_IIS) {
			$server['webserver']=__("IIS", 'espresso-diagnostics');
		} elseif ($is_iis7) {
			$server['webserver']=__("IIS7", 'espresso-diagnostics');
		}

		return $server;
	}

	/**
	 * Returns all useful data regarding PHP
	 *
	 * @since    1.0.0
	 */

	private function getPHPData() {
		$php=[];
		$php['version']=PHP_VERSION;
		$php['memory_limit']=ini_get('memory_limit');
		$php['sapi']=php_sapi_name();

		$phpExtensions = get_loaded_extensions();
		usort($phpExtensions, 'strnatcasecmp');
		$php['extensions']=implode(", ", $phpExtensions);
		return $php;
	}


	/**
	 * Returns all useful data regarding the DB
	 *
	 * @since    1.0.0
	 */

	private function getDBData() {
		global $wpdb;
		$db['db']=$wpdb->db_version();
		return $db;
	}


	/**
	 * Returns all useful data packaged into an array
	 *
	 * @since    1.0.0
	 */

	private function getInfoArray() {
		$info=[];
		$info['wp']=$this->getBloginfo();
		$info['plugins']=$this->getPlugins();
		$info['themes']=$this->getThemes();
		$info['server']=$this->getServerData();
		$info['php']=$this->getPHPData();
		$info['db']=$this->getDBData();
		$info['$_SERVER']=$_SERVER;
		return $info;
	}

	/**
	 * Returns a zip or json file to download with all diagnostic data
	 *
	 * @since    1.0.0
	 */

	public function getPackageJson() {
		$nonce = $_REQUEST['_wpnonce'];
		if ( ! wp_verify_nonce( $nonce, 'espresso_generate_diagnostic_package_json' ) ) {
			die(__('Security check failed', 'espresso-diagnostics'));
		} else {
			$info=$this->getInfoArray();
			foreach ($info as $topic => $contents) {
				$info[$topic]=json_encode($contents,JSON_UNESCAPED_SLASHES);
			}
			$this->createPackage($info, "json");
			die();
		}
	}

	/**
	 * Returns a zip of csv files to download with all diagnostic data
	 *
	 * @since    1.0.0
	 */

	public function getPackageCsv() {
		$nonce = $_REQUEST['_wpnonce'];
		if ( ! wp_verify_nonce( $nonce, 'espresso_generate_diagnostic_package_csv' ) ) {
			die(__('Security check failed', 'espresso-diagnostics'));
		} else {
			$info=$this->getInfoArray();
			$files=[];
			$fieldValue=['wp', 'server', 'php', 'db' ,'$_SERVER'];
			foreach ($fieldValue as $type) {
				$arrayCsv=[];
				$arrayCsv[]=['Field', 'Value'];
				foreach ($info[$type] as $field => $value) {
					$arrayCsv[]=[$field, $value];
				}
				$files[$type]=$this->generateCsv($arrayCsv);
			}
			
			if (isset($info['themes']) && isset($info['themes'][0]) && is_array($info['themes'][0])) {
				$arrayCsv=[];
				$arrayCsv[]=array_keys($info['themes'][0]);
				foreach ($info['themes'] as $row) {
					foreach ($row as $index=>$value) {
						if (is_array($value)) {
							$row[$index]=implode(", ", $value);
						}
					}
					$arrayCsv[]=$row;
				}
				$files['themes']=$this->generateCsv($arrayCsv);
			}
			foreach (['plugins_active' => $info['plugins']['active'], 'plugins_inactive' => $info['plugins']['inactive']] as $type => $content) {
				if (isset($content) && is_array($content)) {
					$arrayCsv=[];
					$arrayCsv[]=array_keys(reset($content));
					foreach ($content as $row) {
						foreach ($row as $index=>$value) {
							if (is_array($value)) {
								$row[$index]=implode(", ", $value);
							}
						}
						$arrayCsv[]=$row;
					}
					$files[$type]=$this->generateCsv($arrayCsv);
				}
			}
			$this->createPackage($files, "csv");
			die();
		}
	}

	/**
	 * Returns a zip file with everything passed into $info
	 *
	 * @since    1.0.0
	 */

	private function createPackage($info, $type) {
		$filename=date("Ymd-His")."-diagnostics";
		if (class_exists("ZipArchive")) {
			$tmpfile = tempnam(".", "zip");
			$zip = new ZipArchive();
			$zip->open($tmpfile, ZipArchive::OVERWRITE);
			foreach ($info as $topic=>$contents) {
				$zip->addFromString("$topic.$type", $contents);
			}
			
			// create a summary.txt with plain text version of all info
			$zip->addFromString("summary.txt", $this->generateText($this->getInfoArray(), false));

			$zip->close();
			header('Content-Type: application/zip');
			header('Content-Length: ' . filesize($tmpfile));
			header('Content-Disposition: attachment; filename="'.$filename.'.zip"');
			readfile($tmpfile);
			unlink($tmpfile); 
			die();
		} else {
			die(__('You need ZipArchive to download the zip with csv files', 'espresso-diagnostics'));
		}
	}

	/**
	 * Generate a csv stream
	 *
	 * @since    1.0.0
	 */

	private function generateCsv($data, $delimiter = ',', $enclosure = '"') {
		$contents="";
		$handle = fopen('php://temp', 'r+');
		foreach ($data as $line) {
				fputcsv($handle, $line, $delimiter, $enclosure);
		}
		rewind($handle);
		while (!feof($handle)) {
				$contents .= fread($handle, 8192);
		}
		fclose($handle);
		return $contents;
	}

	/**
	 * Generate plain text version of the diagnostics
	 *
	 * @since    1.0.0
	 */


	private function generateText($info, $tags=true) {
		$wpDescriptors=$this->WPDescriptors;
		$text="";
		$text.="=== ".__('Date of export', 'espresso-diagnostics') .": ". date("Y-m-d H:i:s") ." === <br><br>";
		$text.="=== ".__('Wordpress Details', 'espresso-diagnostics')." === <br><br>"; 
		if (isset($info['wp']) && !empty($info['wp']) && is_array($info['wp'])) {
			foreach ($info['wp'] as $field=>$value) {
				$text.=$wpDescriptors[$field]['title'].": ".$value."<br>";
			}
		}
		$text.="<br><br>";
		$text.="=== ".__('Themes', 'espresso-diagnostics')." === <br><br>";
		if (isset($info['themes']) && !empty($info['themes']) && is_array($info['themes'])) {
			foreach ($info['themes'] as $theme=>$details) {
				$text.=$details['name'].": ". __("Version", 'espresso-diagnostics')." ".$details['version']. "(".$details['status'].")<br>";
		}
		} else {
			$text.=__("There are no themes on this Wordpress installation",'espresso-diagnostics');
		}
		$text.="<br><br>";
		$text.="=== ".__('Active Wordpress Plugins', 'espresso-diagnostics')." === <br><br>";
		if (isset($info['plugins']['active']) && !empty($info['plugins']['active']) && is_array($info['plugins']['active'])) { 
			foreach ($info['plugins']['active'] as $plugin=>$details) {
				$text.=$details['Name'].": ".$details['Version']."<br>";
			}
		} else {
			$text.=__("There are no active plugins on this Wordpress installation",'espresso-diagnostics');
		}
		$text.="<br><br>";
		$text.="=== ".__('Inactive Wordpress Plugins', 'espresso-diagnostics')." === <br><br>";
		if (isset($info['plugins']['inactive']) && !empty($info['plugins']['inactive']) && is_array($info['plugins']['inactive'])) {
			foreach ($info['plugins']['inactive'] as $plugin=>$details) {
				$text.=$details['Name'].": ".$details['Version']."<br>";
			}
		} else {
			$text.=__("There are no inactive plugins on this Wordpress installation",'espresso-diagnostics');
		}
		$text.="<br><br>";

		$topics=['server', 'php', 'db'];

		foreach ($topics as $topic) {

			$text.="=== ".sprintf(__('%s Details', 'espresso-diagnostics'), ucwords($topic))." === <br><br>";
			if (isset($info[$topic]) && !empty($info[$topic]) && is_array($info[$topic])) {
				foreach ($info[$topic] as $field=>$value) { 
					$text.=$field. ": ". $value."<br>"; 
				}
			} else {
				$text.=sprintf(__("There is no info regarding '%s'",'espresso-diagnostics'), $topic)."<br>";
			}
			$text.="<br><br>";
		}
		if (!$tags) {
			$text=preg_replace('#<br\s*/?>#i', "\n", $text);
			$text=strip_tags($text);
		}
		return $text;
	}

}
