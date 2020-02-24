<?php

use Symfony\Component\DependencyInjection\ContainerInterface;

if (! function_exists('kernel')) {
    /**
     * Get the kernel on request
     *
     * @return \App\Kernel
     */
    function kernel(): \App\Kernel
    {
        global $kernel;

        return $kernel;
    }
}

if (! function_exists('container')) {
    /**
     * Get the container on kernel
     *
     * @return ContainerInterface
     */
    function container(): ContainerInterface
    {
        return kernel()->getContainer();
    }
}

if (! function_exists('entity_manager')) {
    /**
     * Get the entity manager on available container
     *
     * @return \Doctrine\ORM\EntityManagerInterface
     */
    function entity_manager(): \Doctrine\ORM\EntityManagerInterface
    {
        return container()->get('doctrine.orm.entity_manager');
    }
}
