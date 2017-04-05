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
Plugin URI:   https://pascalebeier.de/wordpress/plugins/adsense-page-level-ads
Description:  AdSense Page Level Ads for WordPress done right.
Text Domain:  adsense_page_level_ads
Version:      0.1.1
Author:       Pascale Beier
Author URI:   https://pascalebeier.de/
License:      GPL2+
*/

defined( 'ABSPATH' ) || die;

if ( ! defined( 'ADSENSE_PAGE_LEVEL_ADS_PLUGIN_DIR' ) ) {
	define( 'ADSENSE_PAGE_LEVEL_ADS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

require_once ADSENSE_PAGE_LEVEL_ADS_PLUGIN_DIR . 'src/class-adsense-page-Level-ads-admin.php';
require_once ADSENSE_PAGE_LEVEL_ADS_PLUGIN_DIR . 'src/class-adsense-page-level-ads-scripts.php';

register_activation_hook( __FILE__, array( 'AdSense_Page_Level_Ads_Admin', 'activate' ) );
add_action( 'init', array( 'AdSense_Page_Level_Ads_Admin', 'init' ) );
add_action( 'wp_default_scripts', array( 'AdSense_Page_Level_Ads_Scripts', 'init' ) );
