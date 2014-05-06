<?php
/*
Plugin Name: Ekino Wordpress Symfony
Plugin URI: https://github.com/ekino/ekino-wordpress-symfony
Description: Use Symfony services inside Wordpress
Author: Ekino
Author URI: http://www.ekino.com
Version: 0.1
*/

require_once 'core.php';
require_once 'hook.php';

symfony_boot();

/**
 * User login hook
 */
add_action('wp_login', 'ekino_wordpress_symfony_hook_wp_login', 10, 2);

/**
 * User cookie validation hook
 */
add_action('auth_cookie_valid', 'ekino_wordpress_symfony_hook_wp_login_cookie', 20, 2);

/**
 * User logout hook
 */
add_action('wp_logout', 'ekino_wordpress_symfony_hook_wp_logout');