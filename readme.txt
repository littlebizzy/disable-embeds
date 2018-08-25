=== Disable Embeds ===

Contributors: littlebizzy
Donate link: https://www.patreon.com/littlebizzy
Tags: disable, remove, embeds, iframes, oembed
Requires at least: 4.4
Tested up to: 4.9
Requires PHP: 7.0
Multisite support: No
Stable tag: 1.1.1
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Prefix: DSBEBD

Disables both external and internal embedding functions to avoid slow page render, instability and SEO issues, and to improve overall loading speed.

== Description ==

Disables both external and internal embedding functions to avoid slow page render, instability and SEO issues, and to improve overall loading speed.

* [**Join our FREE Facebook group for support!**](https://www.facebook.com/groups/littlebizzy/)
* [**Worth a 5-star review? Thank you!**](https://wordpress.org/support/plugin/disable-embeds-littlebizzy/reviews/?rate=5#new-post)
* [Plugin Homepage](https://www.littlebizzy.com/plugins/disable-embeds)
* [Plugin GitHub](https://github.com/littlebizzy/disable-emojis)

*Our related OSS projects:*

* [SlickStack (LEMP stack automation)](https://slickstack.io)
* [WP Lite boilerplate](https://wplite.org)
* [Starter Theme](https://starter.littlebizzy.com)

#### The Long Version #####

1. disable all oEmbed functions (e.g. disable automatic converting hyperlinks to iframe/embed HTML)
2. prevent other sites from embed your site (outgoing embeds)
3. prevent own site from embed other pages from own site (internal embeds)
4. remove all embed javascript from footer

For the 1 and 4 points, I have inspected all the WP core hooks and I think I have neutralized all of them, but let me know if you detect or suspect about any client side embed related code.

There are several differences between the existing Disable Embeds plugin and this one, the main one regards to the_content filter using the autoembed function, so I do not understand why that plugin does not disable it due its importance (I suppose WP changed the way to call this filter, which he did that plugin ineffective).

Another feature is that disables completely the embeds in the WP post editor (the previous plugin only disables a deprecated TinyMCE view, so it still shows embeds).

About the 2 and 3 points, the internal query var that manages the embed display is disabled, and also the params are removed from the rewrite rules, so I think this behaviour is disabled, both for internal or external embeds attempts.

About the last point I removed the related hooks, I hope it does not cause any conflict, at the moment I have not detected any client side effects.

    define('DISABLE_EMBEDS_ALLOWED_SOURCES', 'twitter, youtube');

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

This plugin has been designed for use on LEMP (Nginx) web servers with PHP 7.0 and MySQL 5.7 to achieve best performance. All of our plugins are meant for single site WordPress installations only; for both performance and security reasons, we highly recommend against using WordPress Multisite for the vast majority of projects.

#### Defined Constants ####

The following defined constants are supported by this plugin:

* `define('DISABLE_NAG_NOTICES', true);`
* `define('DISABLE_EMBEDS_ALLOWED_SOURCES', 'youtube, twitter, facebook, etc');`

#### Plugin Features ####

* Settings Page: No
* Premium Version Available: Yes ([Speed Demon](https://www.littlebizzy.com/plugins/speed-demon))
* Includes Media (Images, Icons, Etc): No
* Includes CSS: No
* Database Storage: Yes
  * Transients: No
  * Options: Yes
  * Creates New Tables: No
* Database Queries: Backend Only (Options API)
* Must-Use Support: Yes (Use With [Autoloader](https://github.com/littlebizzy/autoloader))
* Multisite Support: No
* Uninstalls Data: Yes

#### Nag Notices ####

This plugin generates multiple [Admin Notices](https://codex.wordpress.org/Plugin_API/Action_Reference/admin_notices) in the WP Admin dashboard. The first is a notice that fires during plugin activation which recommends several related free plugins that we believe will enhance this plugin's features; this notice will re-appear approximately once every 6 months as our code and recommendations evolve. The second is a notice that fires a few days after plugin activation which asks for a 5-star rating of this plugin on its WordPress.org profile page. This notice will re-appear approximately once every 9 months. These notices can be dismissed by clicking the **(x)** symbol in the upper right of the notice box. These notices may annoy or confuse certain users, but are appreciated by the majority of our userbase, who understand that these notices support our free contributions to the WordPress community while providing valuable (free) recommendations for optimizing their website.

If you feel that these notices are too annoying, than we encourage you to consider one or more of our upcoming premium plugins that combine several free plugin features into a single control panel, or even consider developing your own plugins for WordPress, if supporting free plugin authors is too frustrating for you. A final alternative would be to place the defined constant mentioned below inside of your `wp-config.php` file to manually hide this plugin's nag notices:

    define('DISABLE_NAG_NOTICES', true);

Note: This defined constant will only affect the notices mentioned above, and will not affect any other notices generated by this plugin or other plugins, such as one-time notices that communicate with admin-level users.

#### Inspiration ####

* [Disable Embeds](https://wordpress.org/plugins/disable-embeds/)

#### Free Plugins ####

* [404 To Homepage](https://wordpress.org/plugins/404-to-homepage-littlebizzy/)
* [Autoloader](https://github.com/littlebizzy/autoloader)
* [CloudFlare](https://wordpress.org/plugins/cf-littlebizzy/)
* [Delete Expired Transients](https://wordpress.org/plugins/delete-expired-transients-littlebizzy/)
* [Disable Admin-AJAX](https://wordpress.org/plugins/disable-admin-ajax-littlebizzy/)
* [Disable Author Pages](https://wordpress.org/plugins/disable-author-pages-littlebizzy/)
* [Disable Cart Fragments](https://wordpress.org/plugins/disable-cart-fragments-littlebizzy/)
* [Disable Embeds](https://wordpress.org/plugins/disable-embeds-littlebizzy/)
* [Disable Emojis](https://wordpress.org/plugins/disable-emojis-littlebizzy/)
* [Disable Empty Trash](https://wordpress.org/plugins/disable-empty-trash-littlebizzy/)
* [Disable Image Compression](https://wordpress.org/plugins/disable-image-compression-littlebizzy/)
* [Disable jQuery Migrate](https://wordpress.org/plugins/disable-jq-migrate-littlebizzy/)
* [Disable Search](https://wordpress.org/plugins/disable-search-littlebizzy/)
* [Disable WooCommerce Status](https://wordpress.org/plugins/disable-wc-status-littlebizzy/)
* [Disable WooCommerce Styles](https://wordpress.org/plugins/disable-wc-styles-littlebizzy/)
* [Disable XML-RPC](https://wordpress.org/plugins/disable-xml-rpc-littlebizzy/)
* [Download Media](https://wordpress.org/plugins/download-media-littlebizzy/)
* [Download Plugin](https://wordpress.org/plugins/download-plugin-littlebizzy/)
* [Download Theme](https://wordpress.org/plugins/download-theme-littlebizzy/)
* [Duplicate Post](https://wordpress.org/plugins/duplicate-post-littlebizzy/)
* [Enable Subtitles](https://wordpress.org/plugins/enable-subtitles-littlebizzy/)
* [Export Database](https://wordpress.org/plugins/export-database-littlebizzy/)
* [Facebook Pixel](https://wordpress.org/plugins/fb-pixel-littlebizzy/)
* [Force HTTPS](https://wordpress.org/plugins/force-https-littlebizzy/)
* [Force Strong Hashing](https://wordpress.org/plugins/force-strong-hashing-littlebizzy/)
* [Google Analytics](https://wordpress.org/plugins/ga-littlebizzy/)
* [Header Cleanup](https://wordpress.org/plugins/header-cleanup-littlebizzy/)
* [Index Autoload](https://wordpress.org/plugins/index-autoload-littlebizzy/)
* [Maintenance Mode](https://wordpress.org/plugins/maintenance-mode-littlebizzy/)
* [Profile Change Alerts](https://wordpress.org/plugins/profile-change-alerts-littlebizzy/)
* [Remove Category Base](https://wordpress.org/plugins/remove-category-base-littlebizzy/)
* [Remove Query Strings](https://wordpress.org/plugins/remove-query-strings-littlebizzy/)
* [Server Status](https://wordpress.org/plugins/server-status-littlebizzy/)
* [StatCounter](https://wordpress.org/plugins/sc-littlebizzy/)
* [View Defined Constants](https://wordpress.org/plugins/view-defined-constants-littlebizzy/)
* [Virtual Robots.txt](https://wordpress.org/plugins/virtual-robotstxt-littlebizzy/)

#### Premium Plugins ####

* [**Members Only**](https://www.littlebizzy.com/members)
* [Dunning Master](https://www.littlebizzy.com/plugins/dunning-master)
* [Genghis Khan](https://www.littlebizzy.com/plugins/genghis-khan)
* [Great Migration](https://www.littlebizzy.com/plugins/great-migration)
* [Security Guard](https://www.littlebizzy.com/plugins/security-guard)
* [SEO Genius](https://www.littlebizzy.com/plugins/seo-genius)
* [Speed Demon](https://www.littlebizzy.com/plugins/speed-demon)

#### Special Thanks ####

* [Alex Georgiou](https://www.alexgeorgiou.gr)
* [Automattic](https://automattic.com)
* [Brad Touesnard](https://bradt.ca)
* [Daniel Auener](http://www.danielauener.com)
* [Delicious Brains](https://deliciousbrains.com)
* [Greg Rickaby](https://gregrickaby.com)
* [Matt Mullenweg](https://ma.tt)
* [Mika Epstein](https://halfelf.org)
* [Mike Garrett](https://mikengarrett.com)
* [Samuel Wood](http://ottopress.com)
* [Scott Reilly](http://coffee2code.com)
* [Jan Dembowski](https://profiles.wordpress.org/jdembowski)
* [Jeff Starr](https://perishablepress.com)
* [Jeff Chandler](https://jeffc.me)
* [Jeff Matson](https://jeffmatson.net)
* [Jeremy Wagner](https://jeremywagner.me)
* [John James Jacoby](https://jjj.blog)
* [Leland Fiegel](https://leland.me)
* [Paul Irish](https://www.paulirish.com)
* [Rahul Bansal](https://profiles.wordpress.org/rahul286)
* [Roots](https://roots.io)
* [rtCamp](https://rtcamp.com)
* [Ryan Hellyer](https://geek.hellyer.kiwi)
* [WP Chat](https://wpchat.com)
* [WP Tavern](https://wptavern.com)

#### Disclaimer ####

We released this plugin in response to our managed hosting clients asking for better access to their server, and our primary goal will remain supporting that purpose. Although we are 100% open to fielding requests from the WordPress community, we kindly ask that you keep the above-mentioned goals in mind... thanks!

== Installation ==

1. Upload to `/wp-content/plugins/disable-embeds-littlebizzy`
2. Activate via WP Admin > Plugins
3. Test plugin is working by pasting a media URL (such as a YouTube video) into your post editor

== Frequently Asked Questions ==

= How can I change this plugin's settings? =

For speed, security, and simplicity, there is no settings page.

= How can I whitelist certain sources? =

Please review the readme for more information about the below defined constant:

`DISABLE_EMBEDS_ALLOWED_SOURCES`

= I have a suggestion, how can I let you know? =

Please avoid leaving negative reviews in order to get a feature implemented. Instead, we kindly ask that you post your feedback on the wordpress.org support forums by tagging this plugin in your post. If needed, you may also contact our homepage.

== Changelog ==

= 1.1.1 =
* updated plugin meta

= 1.1.0 =
* plugin re-written using PHP namespaces
* plugin uses object-oriented codebase
* support for `DISABLE_EMBEDS_ALLOWED_SOURCES`
* (whitelist certain embed sources using a defined constant)

= 1.0.3 =
* added warning for Multisite installations
* updated recommended plugins

= 1.0.2 =
* tested with WP 4.9
* support for `DISABLE_NAG_NOTICES`

= 1.0.1 =
* added recommended plugins notice
* added WP.org rating request notice

= 1.0.0 =
* initial release
* tested with PHP 7.0
