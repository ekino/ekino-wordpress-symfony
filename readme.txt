=== Ekino Symfony Wordpress ===
Contributors: Thomas Vial <thomas.vial@ekino.com>, Vincent Composieux <vincent.composieux@ekino.com>
Donate link: http://www.github.com/ekino/ekino-wordpress-symfony
Tags: symfony, symfony2, wordpress, hook, event
Requires at least: 3.0.1
Tested up to: 3.7
Stable tag: 1.0
License: MIT
License URI: http://opensource.org/licenses/MIT

Allows to use Wordpress with Symfony [Symfony](http://www.symfony.com) framework (call symfony services, run symfony events on hooks, ...).
Contribute on http://www.github.com/ekino/ekino-wordpress-symfony

== Description ==

* When authenticated on Wordpress, authenticated on Symfony too with correct user roles. (requires EkinoWordpressBundle),
* Catch some Wordpress hooks to be dispatched by Symfony EventDispatcher (requires EkinoWordpressBundle).

Symfony EkinoWordpressBundle is available here: http://www.github.com/ekino/EkinoWordpressBundle

== Installation ==

* Enable the "Ekino Wordpress Symfony" plugin,
* Put the following lines in your wp-config.php file, according to your project configuration:

```
define('WP_SYMFONY_PATH', __DIR__.'/symfony/');
define('WP_SYMFONY_ENVIRONMENT', 'dev');
define('WP_SYMFONY_DEBUG', true);
```

* Install Symfony EkinoWordpressBundle, which is available here: http://www.github.com/ekino/EkinoWordpressBundle

== Usage ==

Mix Wordpress and Symfony together to allow doing multiple things like:

* Use custom Symfony services into Wordpress,
* Use Symfony to manipulate Wordpress database,
* Create custom Symfony routes out of Wordpress,
* When authenticated on Wordpress, authenticated on Symfony too with correct user roles,
* Catch some Wordpress hooks to be dispatched by Symfony EventDispatcher.

== Changelog ==

= 1.0 =
* Add initial version.
