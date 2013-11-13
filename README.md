# ekino-wordpress-symfony

This is the Ekino Wordpress plugin to interact with Symfony.

## Installation

1) Enable the "Ekino Wordpress Symfony" plugin.

2) Put the following lines in your `wp-config.php` file, according to your project configuration:

```php
define('WP_SYMFONY_PATH', __DIR__.'/symfony/');
define('WP_SYMFONY_ENVIRONMENT', 'dev');
define('WP_SYMFONY_DEBUG', true);
```

## Usage

### Retrieve a Symfony service

You can retrieve all Symfony services registered in the dependency injection container with the following method:

```php
$service = \symfony_service('my.symfony.service.identifier');
```

### Dispatch Wordpress hooks in Symfony using EventDispatcher

This plugin allows Wordpress to dispatch some hooks on the Symfony EventDispatcher component.

An example with the two following hooks has been added:

* wp_login: authenticate the user in Symfony application on Wordpress login
* wp_logout: logout user from Symfony when user logout of Wordpress