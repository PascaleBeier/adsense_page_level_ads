<?php
/**
 * Inserts the official AdSense JavaScript source and inline configuration.
 *
 * @package Adsense_Page_Level_Ads
 * @author Pascale Beier <mail@pascalebeier.de>
 * @license GPL2+
 */

defined( 'ABSPATH' ) || die;

/**
 * Class AdSense_Page_Level_Ads_Scripts
 */
class AdSense_Page_Level_Ads_Scripts {

	/**
	 * Enqueue the official AdSense JavaScript.
	 */
	public function enqueue_script() {
		wp_enqueue_script(
			'adsense_page_level_ads_adsense',
			'https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js'
		);
	}

	/**
	 * Add the official AdSense inline JavaScript Configuration.
	 */
	public function inline_configuration() {
		$data = '(adsbygoogle = window.adsbygoogle || []).push({ google_ad_client: "ca-pub-' .
		        get_option( 'adsense_page_level_ads_publisher' ) . '", enable_page_level_ads: true });';

		wp_add_inline_script( 'adsense_page_level_ads_adsense', $data );
	}

	/**
	 * Add async and defer attributes to our AdSense Script.
	 *
	 * @param string $tag <script> tags.
	 * @param string $handle handle as registered.
	 *
	 * @return mixed
	 */
	public function add_async_defer( $tag, $handle ) {
		if ( 'adsense_page_level_ads_adsense' === $handle ) {
			$tag = str_replace( ' src', ' async defer src', $tag );
		}

		return $tag;
	}

	/**
	 * Run our hooks.
	 */
	public function init() {
		if ( ! is_admin() && in_array( get_post_type( get_queried_object_id() ), get_option( 'adsense_page_level_ads_display' ), true )
		     && strpos( get_post_field( 'post_content', get_queried_object_id() ), '<!--NoPageLevelAds-->' ) === false ) {
			add_action( 'wp_enqueue_scripts', array( 'AdSense_Page_Level_Ads_Scripts', 'enqueue_script' ) );
			add_action( 'wp_enqueue_scripts', array( 'AdSense_Page_Level_Ads_Scripts', 'inline_configuration' ) );
			add_filter( 'script_loader_tag', array( 'AdSense_Page_Level_Ads_Scripts', 'add_async_defer' ), 10, 2 );
		}
	}
}
