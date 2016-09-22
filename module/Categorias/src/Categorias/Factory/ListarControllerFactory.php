<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 14/09/16
 * Time: 12:57 PM
 */

namespace Categorias\Factory;


use Categorias\Controller\ListarController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ListarControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        $categoriasService = $realServiceLocator->get('Categorias\Service\CategoriasServiceInterface');

        return new ListarController($categoriasService);
    }
}