<?php

namespace ContainerMwFJzYx;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getTesteControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\TesteController' shared autowired service.
     *
     * @return \App\Controller\TesteController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/TesteController.php';

        $container->services['App\\Controller\\TesteController'] = $instance = new \App\Controller\TesteController();

        $instance->setContainer(($container->privates['.service_locator.CshazM0'] ?? $container->load('get_ServiceLocator_CshazM0Service'))->withContext('App\\Controller\\TesteController', $container));

        return $instance;
    }
}
