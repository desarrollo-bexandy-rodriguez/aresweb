<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 02/10/16
 * Time: 12:08 PM
 */

namespace Almacen;


use Almacen\Form\IngresoLoteForm;
use Almacen\Form\TrasladoLoteForm;
use Almacen\Model\AlmacenMapper;
use Almacen\Model\DetalleProductoEntity;
use Almacen\Model\DisponibilidadMapper;
use Almacen\Model\IngresoMapper;
use Almacen\Model\MovimientoMapper;
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
                'AlmacenMapper' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $mapper = new AlmacenMapper($dbAdapter);
                    return $mapper;
                },
                'IngresoMapper' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $mapper = new IngresoMapper($dbAdapter);
                    return $mapper;
                },
                'arregloProductos' => function ($sm) {
                    $entity = new DetalleProductoEntity();
                    return $entity;
                },
                'MovimientoMapper' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $mapper = new MovimientoMapper($dbAdapter);
                    return $mapper;
                },
                'DisponibilidadMapper' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $mapper = new DisponibilidadMapper($dbAdapter);
                    return $mapper;
                },
                'IngresoLoteForm' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $categoriaMapper = $sm->get('CategoriaMapper');
                    $marcaMapper = $sm->get('MarcaMapper');
                    $almacenMapper = $sm->get('AlmacenMapper');
                    $mapper = new IngresoLoteForm($dbAdapter, $categoriaMapper, $marcaMapper, $almacenMapper);
                    return $mapper;
                },
                'TrasladoLoteForm' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $categoriaMapper = $sm->get('CategoriaMapper');
                    $marcaMapper = $sm->get('MarcaMapper');
                    $almacenMapper = $sm->get('AlmacenMapper');
                    $mapper = new TrasladoLoteForm($dbAdapter, $categoriaMapper, $marcaMapper, $almacenMapper);
                    return $mapper;
                },
            ),
        );
    }
}