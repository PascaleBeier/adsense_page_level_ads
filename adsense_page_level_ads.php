<?php

/*
Plugin Name:  AdSense Page Level Ads
Plugin URI:   https://pascalebeier.de/wordpress/plugins/adsense-page-level-ads
Description:  AdSense Page Level Ads for WordPress done right.
Text Domain:  adsense_page_level_ads
Version:      0.1.0
Author:       Pascale Beier
Author URI:   https://pascalebeier.de/
License:      MIT License
*/

defined( 'ABSPATH' ) or die;

define( 'ADSENSE_PAGE_LEVEL_ADS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once ADSENSE_PAGE_LEVEL_ADS_PLUGIN_DIR . 'AdSense_Page_Level_Ads_Scripts.php';
require_once ADSENSE_PAGE_LEVEL_ADS_PLUGIN_DIR . 'AdSense_Page_Level_Ads_Admin.php';

add_action( 'init', array( 'AdSense_Page_Level_Ads_Admin', 'init' ) );
add_action( 'init', array( 'AdSense_Page_Level_Ads_Scripts', 'init' ) );
