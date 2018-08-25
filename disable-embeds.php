<?php
/*
Plugin Name: Disable Embeds
Plugin URI: https://wordpress.org/plugins/disable-embeds-littlebizzy/
Description: Disables both external and internal embedding functions to avoid slow page render, instability and SEO issues, and to improve overall loading speed.
Version: 1.1.1
Author: LittleBizzy
Author URI: https://www.littlebizzy.com
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Prefix: DSBEBD
*/

// Plugin namespace
namespace LittleBizzy\DisableEmbeds;

// Block direct calls
if (!function_exists('add_action'))
	die;

// Plugin constants
const FILE = __FILE__;
const PREFIX = 'dsbebd';
const VERSION = '1.1.1';

// Loader
require_once dirname(FILE).'/helpers/loader.php';

// Admin Notices
Admin_Notices::instance(__FILE__);

/**
 * Admin Notices Multisite check
 * Uncomment "//return" to disable this plugin on Multisite installs
 */
require_once dirname(__FILE__).'/admin-notices-ms.php';
if (false !== Admin_Notices_MS::instance(__FILE__)) {
	//return;
}

// Run the main class
Helpers\Runner::start('Core\Core', 'instance');
