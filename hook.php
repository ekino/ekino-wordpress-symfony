<?php
/*
 * This file is part of the Ekino Wordpress package.
 *
 * (c) 2011 Ekino
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Dispatch Wordpress user login hook on Symfony event dispatcher
 *
 * @param string   $user_login Username of user logged in
 * @param \WP_User $user       Wordpress user object
 *
 * @see http://codex.wordpress.org/Plugin_API/Action_Reference/wp_login
 */
function ekino_wordpress_symfony_hook_wp_login($user_login, $user) {
    $event = new \Ekino\WordpressBundle\Event\WordpressEvent(array(
        'user_login' => $user_login,
        'user'       => $user
    ));

    symfony_event_dispatch('ekino.wordpress.user_login', $event);
}

/**
 * Dispatch Wordpress user auth cookie validation on Symfony event dispatcher
 * only if trying to access the administration page
 *
 * @param array $cookie_elements Wordpress cookie data
 * @param \WP_User $user         Wordpress user object
 */
function ekino_wordpress_symfony_hook_wp_login_cookie($cookie_elements, $user) {
    if (!is_admin()) {
        return;
    }

    $event = new \Ekino\WordpressBundle\Event\WordpressEvent(array(
        'cookie_elements' => $cookie_elements,
        'user'            => $user
    ));

    symfony_event_dispatch('ekino.wordpress.user_login', $event);
}

/**
 * Dispatch Wordpress user log out hook on Symfony event dispatcher
 *
 * @see http://codex.wordpress.org/Plugin_API/Action_Reference/wp_logout
 */
function ekino_wordpress_symfony_hook_wp_logout() {
    $event = new \Ekino\WordpressBundle\Event\WordpressEvent();

    symfony_event_dispatch('ekino.wordpress.user_logout', $event);
}