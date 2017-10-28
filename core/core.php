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

		// Remove from content
		$this->removeContentFilter();

		// Remove content feed filter
		remove_filter('the_content_feed', 			'_oembed_filter_feed_content');

		// Abort embed libraries loading
		remove_action( 'plugins_loaded', 			'wp_maybe_load_embeds', 0);

		// No auto-embedding support
		add_filter( 'pre_option_embed_autourls', 	'__return_false');

		// Avoid oEmbed auto discovery
		add_filter('embed_oembed_discover', 	 	'__return_false');

		// Remove REST API related hooks
		remove_action('rest_api_init', 				'wp_oembed_register_route');
		remove_filter('rest_pre_serve_request', 	'_oembed_rest_pre_serve_request', 10);

		// Remove header actions
		remove_action('wp_head', 					'wp_oembed_add_discovery_links');
		remove_action('wp_head', 					'wp_oembed_add_host_js');

		remove_action( 'embed_head', 				'enqueue_embed_scripts', 1);
		remove_action( 'embed_head', 				'print_emoji_detection_script');
		remove_action( 'embed_head', 				'print_embed_styles');
		remove_action( 'embed_head', 				'wp_print_head_scripts', 20);
		remove_action( 'embed_head', 				'wp_print_styles', 20);
		remove_action( 'embed_head', 				'wp_no_robots');
		remove_action( 'embed_head', 				'rel_canonical');
		remove_action( 'embed_head', 				'locale_stylesheet', 30);

		remove_action( 'embed_content_meta', 		'print_embed_comments_button');
		remove_action( 'embed_content_meta', 		'print_embed_sharing_button');

		remove_action( 'embed_footer', 				'print_embed_sharing_dialog');
		remove_action( 'embed_footer', 				'print_embed_scripts');
		remove_action( 'embed_footer', 				'wp_print_footer_scripts', 20);

		remove_filter( 'excerpt_more', 				'wp_embed_excerpt_more', 20);
		remove_filter( 'the_excerpt_embed', 		'wptexturize');
		remove_filter( 'the_excerpt_embed', 		'convert_chars');
		remove_filter( 'the_excerpt_embed', 		'wpautop');
		remove_filter( 'the_excerpt_embed', 		'shortcode_unautop');
		remove_filter( 'the_excerpt_embed', 		'wp_embed_excerpt_attachment');

		// Remove data and results filters
		remove_filter('oembed_dataparse', 			'wp_filter_oembed_result', 10);
		remove_filter('oembed_response_data', 		'get_oembed_response_data_rich', 10);
		remove_filter('pre_oembed_result', 			'wp_filter_pre_oembed_result', 10);

		// WooCommerce embeds in short description
		remove_filter('woocommerce_short_description', 'wc_do_oembeds');

		// Alter Tiny MCE plugins
		add_filter('tiny_mce_plugins', array(&$this, 'cleanTinyMCE'));

		// Alter rewrite rules
		add_filter('rewrite_rules_array', array(&$this, 'cleanRules'));
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
		return array_diff($plugins, array('wpembed', 'wpview'));
	}



	// Plugin actions
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Plugin activation
	 */
	public static function activation() {
		add_filter('rewrite_rules_array', array(self::instance(), 'cleanRules'));
		flush_rewrite_rules();
	}



	/**
	 * Plugin deactivation
	 */
	public static function deactivation() {
		remove_filter('rewrite_rules_array', array(self::instance(), 'cleanRules'));
		flush_rewrite_rules();
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



	/**
	 * Remove the_content filter
	 */
	private function removeContentFilter() {
		global $wp_embed;
		remove_filter('the_content', array($wp_embed, 'autoembed'), 8);
	}



}