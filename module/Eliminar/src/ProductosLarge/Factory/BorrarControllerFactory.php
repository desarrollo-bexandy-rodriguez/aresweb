<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 19/09/16
 * Time: 10:34 PM
 */

namespace ProductosLarge\Factory;


use ProductosLarge\Controller\BorrarController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class BorrarControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        $productosService = $realServiceLocator->get('ProductosLargeLarge\Service\ProductosLargeServiceInterface');

        return new BorrarController($productosService);
    }
}