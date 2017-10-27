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

	}



	// Plugin actions
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Plugin activation
	 */
	public static function activation() {

	}



	/**
	 * Plugin deactivation
	 */
	public static function deactivation() {

	}



}