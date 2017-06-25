<?php
/**
 * Our main file delegating file inclusion for back- and frontend.
 *
 * @package Adsense_Page_Level_Ads
 * @author Pascale Beier <mail@pascalebeier.de>
 * @license GPL2+
 */

/*
Plugin Name:  AdSense Page Level Ads
Plugin URI:   https://wordpress.org/plugins/page-level-ads-adsense/
Description:  AdSense Page Level Ads for WordPress done right.
Text Domain:  page-level-ads-adsense
Version:      1.0.1
Author:       Pascale Beier
Author URI:   https://pascalebeier.de/
License:      GPL2+
*/

defined( 'ABSPATH' ) || die;

if ( ! defined( 'ADSENSE_PAGE_LEVEL_ADS_PLUGIN_DIR' ) ) {
	define( 'ADSENSE_PAGE_LEVEL_ADS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

require_once ADSENSE_PAGE_LEVEL_ADS_PLUGIN_DIR . 'src/class-adsense-page-level-ads-admin.php';
require_once ADSENSE_PAGE_LEVEL_ADS_PLUGIN_DIR . 'src/class-adsense-page-level-ads-scripts.php';

register_activation_hook( __FILE__, array( 'AdSense_Page_Level_Ads_Admin', 'activate' ) );
add_action( 'init', array( 'AdSense_Page_Level_Ads_Admin', 'init' ) );
add_action( 'wp_default_scripts', array( 'AdSense_Page_Level_Ads_Scripts', 'init' ) );
