<?php

defined( 'ABSPATH' ) or die;

class AdSense_Page_Level_Ads_Scripts
{
    /**
     * Enqueue the official AdSense JavaScript.
     */
    public function enqueue_script() {
        if ( ! is_admin() ) {
            wp_enqueue_script(
                'adsense_page_level_ads_adsense',
                'https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js'
            );
        }
    }

    /**
     * Add the official AdSense inline JavaScript Configuration.
     */
    public function inline_configuration() {
        if ( ! is_admin() ) {
            $data = '(adsbygoogle = window.adsbygoogle || []).push({ google_ad_client: "ca-pub-' .
                    get_option('adsense_page_level_ads_publisher') . '", enable_page_level_ads: true });';

            wp_add_inline_script( 'adsense_page_level_ads_adsense', $data );
        }
    }

    /**
     * Add async and defer attributes to our AdSense Script.
     *
     * @param string $tag
     * @param string $handle
     *
     * @return mixed
     */
    public function add_async_defer($tag, $handle) {
        if ( 'adsense_page_level_ads_adsense' === $handle ) {
            $tag = str_replace( ' src', ' async defer src', $tag );
        }

        return $tag;
    }

    /**
     * Run our hooks and get the current options.
     */
    public function init()
    {
        add_action( 'wp_enqueue_scripts', array( 'AdSense_Page_Level_Ads_Scripts', 'enqueue_script' ) );
        add_action( 'wp_enqueue_scripts', array( 'AdSense_Page_Level_Ads_Scripts', 'inline_configuration' ) );
        add_filter( 'script_loader_tag', array ( 'AdSense_Page_Level_Ads_Scripts', 'add_async_defer' ), 10, 2 );
    }

}