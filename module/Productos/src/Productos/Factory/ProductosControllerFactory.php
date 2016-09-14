<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 14/09/16
 * Time: 12:57 PM
 */

namespace Productos\Factory;


use Productos\Controller\ProductosController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ProductosControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        $productosService = $realServiceLocator->get('Productos\Service\ProductosServiceInterface');

        return new ProductosController($productosService);
    }
}