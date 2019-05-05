# Disable Embeds

Disables both external and internal embedding functions to avoid slow page render, instability and SEO issues, and to improve overall loading speed.

* [Plugin Homepage (LittleBizzy.com)](https://www.littlebizzy.com/plugins/disable-embeds)
* [Free Facebook Group](https://www.facebook.com/groups/littlebizzy/)

### Defined Constants

    /* Plugin Meta */
    define('DISABLE_NAG_NOTICES', true);
    
    /* Disable Embeds Functions */
    define('DISABLE_EMBEDS', 'true'); // default = true
    define('DISABLE_EMBEDS_ALLOWED_SOURCES', 'youtube,twitter,scribd'); // default = none (blank)

### Compatibility

This plugin has been designed for use on [SlickStack](https://slickstack.io) web servers with PHP 7.2 and MySQL 5.7 to achieve best performance. All of our plugins are meant for single site WordPress installations only — for both performance and usability reasons, we strongly recommend avoiding WordPress Multisite for the vast majority of your projects.

Any of our WordPress plugins may also be loaded as "Must-Use" plugins (meaning that they load first, and cannot be deactivated) by using our free [Autoloader](https://github.com/littlebizzy/autoloader) script in the `mu-plugins` directory.

### Support Issues

Please do not submit Pull Requests. Instead, kindly create a new Issue with relevant information if you are an experienced developer, otherwise you may become a [**LittleBizzy.com Member**](https://www.littlebizzy.com/members) if your company requires official support.
