# ekino-wordpress-symfony

This is the Ekino Wordpress plugin to interact with Symfony.

## Installation

1) Enabled the "Ekino Wordpress Symfony" plug-in.

2) Put the following lines in your `wp-config.php` file, according to your project configuration:

```php
define('WP_SYMFONY_PATH', __DIR__.'/symfony/');
define('WP_SYMFONY_ENVIRONMENT', 'dev');
define('WP_SYMFONY_DEBUG', true);
```