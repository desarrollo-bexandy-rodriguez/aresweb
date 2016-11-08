<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 20/09/16
 * Time: 11:29 AM
 */
namespace Productos;

use Productos\Form\CreateProduct;
use Productos\Model\CategoriaMapper;
use Productos\Model\MarcaMapper;
use Productos\Model\ProductoMapper;
use Productos\Model\UnidadMedidaMapper;
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
                'ProductoMapper' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $mapper = new ProductoMapper($dbAdapter);
                    return $mapper;
                },
                'CategoriaMapper' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $mapper = new CategoriaMapper($dbAdapter);
                    return $mapper;
                },
                'UnidadMedidaMapper' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $mapper = new UnidadMedidaMapper($dbAdapter);
                    return $mapper;
                },
                'MarcaMapper' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $mapper = new MarcaMapper($dbAdapter);
                    return $mapper;
                },
                'CreateProduct' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $mapper = new CreateProduct($dbAdapter);
                    return $mapper;
                },
            ),
        );
    }
}