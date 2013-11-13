# ekino-wordpress-symfony

This is the Ekino Wordpress plugin to interact with Symfony.

## Installation

1) Enabled the "Ekino Wordpress Symfony" plugin.

2) Put the following lines in your `wp-config.php` file, according to your project configuration:

```php
define('WP_SYMFONY_PATH', __DIR__.'/symfony/');
define('WP_SYMFONY_ENVIRONMENT', 'dev');
define('WP_SYMFONY_DEBUG', true);
```

## Usage

This plugin allows Wordpress to dispatch some hooks on the Symfony EventDispatcher component.

An example with the two following hooks has been added:

* wp_login: authenticate the user in Symfony application on Wordpress login
* wp_logout: logout user from Symfony when user logout of Wordpress