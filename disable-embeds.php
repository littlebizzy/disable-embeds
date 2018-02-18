<?php
/*
Plugin Name: Disable Embeds
Plugin URI: https://wordpress.org/plugins/disable-embeds-littlebizzy/
Description: Disables both external and internal embedding functions to avoid slow page render, instability and SEO issues, and to improve overall loading speed.
Version: 1.0.3
Author: LittleBizzy
Author URI: https://www.littlebizzy.com
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Prefix: DSBEBD
*/

// Admin Notices module
require_once dirname(__FILE__).'/admin-notices.php';
DSBEBD_Admin_Notices::instance(__FILE__);

/**
 * Admin Notices Multisite check
 * Uncomment //return to disable this plugin on Multisite installs
 */
require_once dirname(__FILE__).'/admin-notices-ms.php';
if (false !== \LittleBizzy\DisableEmbeds\Admin_Notices_MS::instance(__FILE__)) {
	//return;
}

// Block direct calls
if (!function_exists('add_action'))
	die;

// This plugin constants
define('DSBEBD_FILE', __FILE__);
define('DSBEBD_PATH', dirname(DSBEBD_FILE));
define('DSBEBD_VERSION', '1.0.3');

// Load main class
require_once DSBEBD_PATH.'/core/core.php';
DSBEBD_Core::instance();
