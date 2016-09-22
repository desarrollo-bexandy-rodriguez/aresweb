<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 15/09/16
 * Time: 12:42 PM
 */

namespace ProductosLarge\Factory;


use ProductosLarge\Service\ProductosLargeService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ProductosLargeServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new ProductosLargeService(
            $serviceLocator->get('ProductosLargeLarge\Mapper\ProductosLargeMapperInterface')
        );
    }
}