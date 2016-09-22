<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 19/09/16
 * Time: 10:34 PM
 */

namespace Categorias\Factory;


use Categorias\Controller\BorrarController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class BorrarControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        $categoriasService = $realServiceLocator->get('Categorias\Service\CategoriasServiceInterface');

        return new BorrarController($categoriasService);
    }
}