<?php

// Subpackage namespace
namespace LittleBizzy\DisableEmbeds\Helpers;

/**
 * Singleton class
 *
 * @package Disable Embeds
 * @subpackage Helpers
 */
class Singleton {



	// Properties
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Singleton class
	 */
	protected static $instance;



	/**
	 * Plugin object
	 */
	protected $plugin;



	// Initialization
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Create or retrieve instance
	 */
	public static function instance($plugin = null) {

		// Check instance
		if (!isset(self::$instance))
			self::$instance = new self($plugin);

		// Done
		return self::$instance;
	}



	/**
	 * Constructor
	 */
	private function __construct($plugin) {

		// Copy plugin object
		$this->plugin = $plugin;

		// Custom constructor
		$this->onConstruct();
	}



	/**
	 * Pseudo constructor
	 */
	protected function onConstruct() {}



}