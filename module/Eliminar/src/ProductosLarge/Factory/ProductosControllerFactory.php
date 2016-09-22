<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 14/09/16
 * Time: 12:57 PM
 */

namespace ProductosLarge\Factory;


use ProductosLarge\Controller\ProductosLargeController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ProductosLargeControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        $productosService = $realServiceLocator->get('ProductosLargeLarge\Service\ProductosLargeServiceInterface');

        return new ProductosLargeController($productosService);
    }
}