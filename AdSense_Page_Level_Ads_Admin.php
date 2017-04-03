<?php

defined( 'ABSPATH' ) or die;

class AdSense_Page_Level_Ads_Admin
{
    public function menu() {
        add_options_page(
            'AdSense Page Level Ads',
            'Page Level Ads',
            'manage_options',
            'adsense_page_level_ads',
            array( 'AdSense_Page_Level_Ads_Admin', 'options')
        );
    }

    public function settings() {
        register_setting('adsense_page_level_ads', 'adsense_page_level_ads_publisher');
    }

    public function options() {
        if ( !current_user_can( 'manage_options' ) )  {
            wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
        }
        include ADSENSE_PAGE_LEVEL_ADS_PLUGIN_DIR . 'views/options.php';
    }

    public function init() {
        add_action('admin_init', array('AdSense_Page_Level_Ads_Admin', 'settings'));
        add_action('admin_menu', array( 'AdSense_Page_Level_Ads_Admin', 'menu') );
    }

}