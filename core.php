<?php
/*
 * This file is part of the Ekino Wordpress package.
 *
 * (c) 2013 Ekino
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Boot symfony and register the container
 */
function symfony_boot()
{
    $sfContainer = symfony_get_container();

    if (!$sfContainer) {
        require_once sprintf('%s/app/bootstrap.php.cache', WP_SYMFONY_PATH);
        require_once sprintf('%s/app/AppKernel.php', WP_SYMFONY_PATH);

        $kernel = new AppKernel(WP_SYMFONY_ENVIRONMENT, WP_SYMFONY_DEBUG);
        $kernel->loadClassCache();
        $kernel->boot();

        $sfContainer = $kernel->getContainer();
        $sfContainer->enterScope('request');
        $sfContainer->set('request', new \Symfony\Component\HttpFoundation\Request(), 'request');

        symfony_get_container($sfContainer);
    }
}

/**
 * Returns a Symfony service from its name
 *
 * @param string $name
 *
 * @return object
 */
function symfony_service($name)
{
    return symfony_get_container()->get($name);
}

/**
 * Returns Symfony container from Symfony EkinoWordpressBundle if installed else from static loaded here
 *
 * @param ContainerInterface|null $sfContainer
 *
 * @return ContainerInterface
 */
function symfony_get_container($sfContainer = null)
{
    static $container;

    if (function_exists('symfony_container')) {
        $container = symfony_container();
    }

    return $container = $sfContainer ?: $container;
}

/**
 * Dispatch an event using Symfony EventDispatcher service
 *
 * @param string                                      $name  Name of the event to dispatch
 * @param \Ekino\WordpressBundle\Event\WordpressEvent $event A Wordpress event
 *
 * @return mixed
 */
function symfony_event_dispatch($name, \Ekino\WordpressBundle\Event\WordpressEvent $event)
{
    return symfony_service('event_dispatcher')->dispatch($name, $event);
}