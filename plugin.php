<?php
	/**
	 * Plugin Name: MapFig Studio Plugin
	 * Description: A Plugin by mapfig.com that allows you to import maps from Leaflet Studio and display on pages, exhibits, and collections.
	 * Author: MapFig
	 * Author URI: https://www.mapfig.com/
	 * Plugin URI: https://www.mapfig.com/
	 * Version: 0.2.1
	 * License: GPL
	 */

	define("STUDIO_HELP_URL", "#");

	global $wpdb;
	define('STUDIO_MAP_TABLE', $wpdb->prefix . 'studio_map');
	define('STUDIO_DOCROOT', dirname(__FILE__));
	define('STUDIO_WEBROOT', str_replace(getcwd(), home_url(), dirname(__FILE__)));
	define('STUDIO_SERVER', get_option('studio_url'));


	define('STUDIO_PLUGIN_NAME', 'mapfig');
	define('STUDIO_PLUGIN_NAME_FORMATED', 'MapFig');
	define('COPYRIGHT_TEXT', 'Copyright @ '.date("Y").' Enciva LLC, MapFig Ltd');
	define('STUDIO_MAIN_DOMAIN', 'mapfig.com');
	define('GOOGLEPLUS_URL', 'https://plus.google.com/109932400786091290489/posts');
	define('LINKEDIN_URL', 'https://www.linkedin.com/company/mapfig');
	define('FACEBOOK_URL', 'https://www.facebook.com/mapfig');
	define('TWITTER_URL', 'https://twitter.com/mapfig');



	include 'include/studioDatabase.class.php';
	include 'include/studioInstaller.class.php';
	include 'include/studioSynchronizer.class.php';

	include 'include/studioFunctions.php';
	include 'include/studioAdminControler.php';
	
	include 'include/studioUpgrade.php';

	include 'include/shortcode/functions.php';
	include 'widget/widget.php';



	register_activation_hook(__FILE__, 'studioInstall');
	register_deactivation_hook(__FILE__, 'studioUninstall');

	add_action('admin_init', 'studioScriptEnqueue');
	add_action('admin_head', 'studioAddMenuIcon');
	add_action('admin_menu', 'studioMenu');
?>