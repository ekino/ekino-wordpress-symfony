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
    global $sfContainer;

    if (!$sfContainer) {
        require_once sprintf('%s/app/bootstrap.php.cache', WP_SYMFONY_PATH);
        require_once sprintf('%s/app/AppKernel.php', WP_SYMFONY_PATH);

        $kernel = new \AppKernel(WP_SYMFONY_ENVIRONMENT, WP_SYMFONY_DEBUG);
        $kernel->loadClassCache();
        $kernel->boot();

        $sfContainer = $kernel->getContainer();
        $sfContainer->enterScope('request');
        $sfContainer->set('request', new \Symfony\Component\HttpFoundation\Request(), 'request');
    }
}

/**
 * Returns Symfony container
 *
 * @return \Symfony\Component\DependencyInjection\ContainerInterface
 *
 * @throws \RuntimeException
 */
function symfony_container()
{
    global $sfContainer;

    if (!$sfContainer) {
        throw new \RuntimeException('Unable to retrieve Symfony container.');
    }

    return $sfContainer;
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
    return \symfony_container()->get($name);
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
    return \symfony_service('event_dispatcher')->dispatch($name, $event);
}