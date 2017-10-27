<?php

/**
 * Disable Embeds - Core class
 *
 * @package Disable Embeds
 * @subpackage Disable Embeds Core
 */
final class DSBEBD_Core {



	// Properties
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Single class instance
	 */
	private static $instance;



	// Initialization
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Create or retrieve instance
	 */
	public static function instance() {
//error_log('instance');
		// Check instance
		if (!isset(self::$instance))
			self::$instance = new self;

		// Done
		return self::$instance;
	}



	/**
	 * Constructor
	 */
	private function __construct() {

		// Init hook
		add_action('init', array(&$this, 'init'), PHP_INT_MAX);

		// Plugin actions
		register_activation_hook(DSBEBD_FILE, array(__CLASS__, 'activation'));
		register_deactivation_hook(DSBEBD_FILE, array(__CLASS__, 'deactivation'));
	}



	// Handle WP Hooks
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Initialization
	 */
	public function init() {

		// Remove from query vars
		$this->removeQueryVar();

		// Remove content feed filter
		add_filter('the_content_feed', '_oembed_filter_feed_content');

		// Avoid oEmbed auto discovery
		add_filter('embed_oembed_discover', '__return_false');

		// Remove REST API related hooks
		remove_action('rest_api_init', 'wp_oembed_register_route');
		remove_filter('rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10);

		// Remove header actions
		remove_action('wp_head', 'wp_oembed_add_discovery_links');
		remove_action('wp_head', 'wp_oembed_add_host_js');

		// Remove data and results filters
		remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
		remove_filter('oembed_response_data', 'get_oembed_response_data_rich', 10);
		remove_filter('pre_oembed_result', 'wp_filter_pre_oembed_result', 10);

		// Alter Tiny MCE plugins
		add_filter( 'tiny_mce_plugins', array(&$this, 'cleanTinyMCE'));

		// Alter rewrite rules
		add_filter('rewrite_rules_array', array(&$this, 'cleanRules'));

		// WooCommerce embeds in short description
		remove_filter('woocommerce_short_description', 'wc_do_oembeds');
	}



	/**
	 * Removes rules with embed rewrites
	 */
	public function cleanRules($rules) {

		// Initialize
		$new_rules = array();

		// Enum current rules
		foreach ($rules as $rule => $rewrite) {

			// Check embed param
			if (false !== ($pos = strpos($rewrite, '?'))) {
				$params = explode('&', substr($rewrite, $pos + 1));
				if (in_array('embed=true', $params))
					continue;
			}

			// Add rule
			$new_rules[$rule] = $rewrite;
		}

		// Done
		return $new_rules;
	}



	/**
	 * Remove any related embed TinyMCE plugin
	 */
	public function cleanTinyMCE($plugins) {
		return array_diff($plugins, array('wpembed'));
	}



	// Plugin actions
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Plugin activation
	 */
	public static function activation() {
//error_log('activation');
		add_filter('rewrite_rules_array', array(self::instance(), 'cleanRules'));
		flush_rewrite_rules();
	}



	/**
	 * Plugin deactivation
	 */
	public static function deactivation() {
//error_log('deactivation');
		remove_filter('rewrite_rules_array', array(self::instance(), 'cleanRules'));
	}



	// Internal
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Remove the embed query var.
	 */
	private function removeQueryVar() {
		global $wp;
		$wp->public_query_vars = array_diff($wp->public_query_vars, array('embed'));
	}



}