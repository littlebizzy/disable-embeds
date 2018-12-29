=== Disable Embeds ===

Contributors: littlebizzy
Donate link: https://www.patreon.com/littlebizzy
Tags: disable, remove, embeds, iframes, oembed
Requires at least: 4.4
Tested up to: 5.0
Requires PHP: 7.0
Multisite support: No
Stable tag: 1.3.0
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Prefix: DSBEBD

Disables both external and internal embedding functions to avoid slow page render, instability and SEO issues, and to improve overall loading speed.

== Description ==

Disables both external and internal embedding functions to avoid slow page render, instability and SEO issues, and to improve overall loading speed.

* [**Join our FREE Facebook group for support**](https://www.facebook.com/groups/littlebizzy/)
* [**Worth a 5-star review? Thank you!**](https://wordpress.org/support/plugin/disable-embeds-littlebizzy/reviews/?rate=5#new-post)
* [Plugin Homepage](https://www.littlebizzy.com/plugins/disable-emojis)
* [Plugin GitHub](https://github.com/littlebizzy/disable-emojis)

#### Current Features ####

* disable all oEmbed functions (e.g. disable automatic converting hyperlinks to iframe/embed HTML)
* prevent other sites from embed your site (outgoing embeds)
* prevent own site from embed other pages from own site (internal embeds)
* remove all embed javascript from footer

For the 1 and 4 points, I have inspected all the WP core hooks and I think I have neutralized all of them, but let me know if you detect or suspect about any client side embed related code.

There are several differences between the existing Disable Embeds plugin and this one, the main one regards to the_content filter using the autoembed function, so I do not understand why that plugin does not disable it due its importance (I suppose WP changed the way to call this filter, which he did that plugin ineffective).

Another feature is that disables completely the embeds in the WP post editor (the previous plugin only disables a deprecated TinyMCE view, so it still shows embeds).

About the 2 and 3 points, the internal query var that manages the embed display is disabled, and also the params are removed from the rewrite rules, so I think this behaviour is disabled, both for internal or external embeds attempts.

About the last point I removed the related hooks, I hope it does not cause any conflict, at the moment I have not detected any client side effects.

The following sources (only) can be whitelisted using the above defined constant:

* YouTube
* Twitter
* Facebook
* Instagram
* Scribd
* SoundCloud
* Reddit
* Imgur
* Flickr
* Vimeo

...all other sources are blacklisted for performance reasons, including internal site URLs.

Version 1.1.0:

The code is completely refactored using namespaces and object encapsulation.

With or without the allowed sources constant, the plugin behavior removes any reference to embeds code as it did in the previous version.

But with detected allowed sources, the plugin allows the WP 'autoembed' filter in the post content, but limiting its execution only to the services indicated in the plugin constant, so it disables the WP autodiscovery embed feature and its associated "postmeta cache".

Note: The supported scribd URLs must follow the format "https://www.scribd.com/doc/" or "https://www.scribd.com/doc/" to be detected by the WordPress oEmbed system, because from scribd.com portal they expose these URLs using "/document/" instead "/doc/".

#### Compatibility ####

This plugin has been designed for use on [SlickStack](https://slickstack.io) web servers with PHP 7.2 and MySQL 5.7 to achieve best performance. All of our plugins are meant for single site WordPress installations only; for both performance and usability reasons, we highly recommend avoiding WordPress Multisite for the vast majority of projects.

Any of our WordPress plugins may also be loaded as "Must-Use" plugins by using our free [Autoloader](https://github.com/littlebizzy/autoloader) script in the `mu-plugins` directory.

#### Defined Constants ####

    /* Plugin Meta */
    define('DISABLE_NAG_NOTICES', true);

    /* Disable Embeds Functions */
    define('DISABLE_EMBEDS_ALLOWED_SOURCES', 'none');

#### Technical Details ####

* Prefix: DSBEBD
* Parent Plugin: [**Speed Demon**](https://wordpress.org/plugins/speed-demon-littlebizzy/)
* Disable Nag Notices: [Yes](https://codex.wordpress.org/Plugin_API/Action_Reference/admin_notices#Disable_Nag_Notices)
* Settings Page: No
* PHP Namespaces: Yes
* Object-Oriented Code: Yes
* Includes Media (images, icons, etc): No
* Includes CSS: No
* Database Storage: Yes
  * Transients: No
  * WP Options Table: Yes
  * Other Tables: No
  * Creates New Tables: No
  * Creates New WP Cron Jobs: No
* Database Queries: Backend Only (Options API)
* Must-Use Support: [Yes](https://github.com/littlebizzy/autoloader)
* Multisite Support: No
* Uninstalls Data: Yes

#### Disclaimer ####

We released this plugin in response to our managed hosting clients asking for better access to their server, and our primary goal will remain supporting that purpose. Although we are 100% open to fielding requests from the WordPress community, we kindly ask that you keep these conditions in mind, and refrain from slandering, threatening, or harassing our team members in order to get a feature added, or to otherwise get "free" support. The only place you should be contacting us is in our free [**Facebook group**](https://www.facebook.com/groups/littlebizzy/) which has been setup for this purpose, or via GitHub if you are an experienced developer. Thank you!

== Installation ==

1. Upload to `/wp-content/plugins/disable-embeds-littlebizzy/`
2. Activate via WP Admin > Plugins
3. Test plugin is working:

After plugin activation, purge all caches. Then, refresh one of your blog posts where an autoembed (oEmbed) previously displayed and it should no longer be displayed (for example, automatic conversion of a YouTube video link into an iframe player).

== Frequently Asked Questions ==

= How can I change this plugin's settings? =

For speed, security, and simplicity, there is no settings page.

= How can I whitelist certain sources? =

Please review the readme for more information about the below defined constant:

`DISABLE_EMBEDS_ALLOWED_SOURCES`

= I have a suggestion, how can I let you know? =

Please avoid leaving negative reviews in order to get a feature implemented. Instead, join our Facebook group.

== Changelog ==

= 1.3.0 =
* PBP boilerplate 1.1.0
* tested with PHP 7.0
* tested with PHP 7.1
* tested with PHP 7.2
* tested with PHP 5.6 (no fatal errors only)
* support for `DISABLE_EMBEDS`
* better support with our Custom Functions plugin (late constants definition)
* fixed SoundCloud embeds in certain environments
* fixed Scribd embeds in certain environments
* supports alternative Scribd `/document/` embed in addition to default `/doc/` embed URI)

= 1.2.0 =
* tested with WP 5.0
* updated plugin meta

= 1.1.1 =
* updated plugin meta

= 1.1.0 =
* plugin re-written using PHP namespaces
* plugin uses object-oriented code
* support for `DISABLE_EMBEDS_ALLOWED_SOURCES`
* (whitelist external embed sources using a defined constant)

= 1.0.3 =
* added warning for Multisite installations
* updated recommended plugins

= 1.0.2 =
* tested with WP 4.9
* support for `DISABLE_NAG_NOTICES`

= 1.0.1 =
* added recommended plugins notice
* added rating request notice

= 1.0.0 =
* initial release
