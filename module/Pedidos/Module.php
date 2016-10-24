<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 22/09/16
 * Time: 01:48 PM
 */

namespace Pedidos;


use Pedidos\Model\ItemMapper;
use Pedidos\Model\PedidoMapper;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements
    AutoloaderProviderInterface,
    ConfigProviderInterface
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    // Autoload all classes from namespace 'Blog' from '/module/Blog/src/Blog'
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                )
            )
        );
    }

    public function getConfig()
    {
        return include __DIR__.'/config/module.config.php';
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'PedidoMapper' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $mapper = new PedidoMapper($dbAdapter);
                    return $mapper;
                },
                'ItemMapper' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $mapper = new ItemMapper($dbAdapter);
                    return $mapper;
                },
            ),
        );
    }
}