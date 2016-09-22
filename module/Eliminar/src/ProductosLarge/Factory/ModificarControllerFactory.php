<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 18/09/16
 * Time: 11:06 AM
 */

namespace ProductosLarge\Factory;

use ProductosLarge\Controller\ModificarController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ModificarControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        $productosService = $realServiceLocator->get('ProductosLargeLarge\Service\ProductosLargeServiceInterface');
        $productosInsertForm = $realServiceLocator->get('FormElementManager')->get('ProductosLargeLarge\Form\ProductosLargeForm');

        return new ModificarController(
            $productosService,
            $productosInsertForm
        );
    }
}