<?php
/**
 * This is where all the admin action happens.
 *
 * @package Adsense_Page_Level_Ads
 * @author Pascale Beier <mail@pascalebeier.de>
 * @license MIT
 */

defined( 'ABSPATH' ) || die;

/**
 * Class AdSense_Page_Level_Ads_Admin
 */
class AdSense_Page_Level_Ads_Admin {

	/**
	 * Add our admin menu page.
	 */
	public function menu() {
		add_options_page(
			'AdSense Page Level Ads',
			'Page Level Ads',
			'manage_options',
			'adsense_page_level_ads',
			array( 'AdSense_Page_Level_Ads_Admin', 'options' )
		);
	}

	/**
	 * Add our settings.
	 */
	public function settings() {
		register_setting( 'adsense_page_level_ads', 'adsense_page_level_ads_publisher' );
	}

	/**
	 * Render our options.
	 */
	public function options() {
		include ADSENSE_PAGE_LEVEL_ADS_PLUGIN_DIR . 'views/options.php';
	}

	/**
	 * Run our hooks.
	 */
	public function init() {
		add_action( 'admin_init', array( 'AdSense_Page_Level_Ads_Admin', 'settings' ) );
		add_action( 'admin_menu', array( 'AdSense_Page_Level_Ads_Admin', 'menu' ) );
	}

}
