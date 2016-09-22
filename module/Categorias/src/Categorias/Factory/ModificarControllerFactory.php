<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 18/09/16
 * Time: 11:06 AM
 */

namespace Categorias\Factory;

use Categorias\Controller\ModificarController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ModificarControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        $categoriasService = $realServiceLocator->get('Categorias\Service\CategoriasServiceInterface');
        $categoriasInsertForm = $realServiceLocator->get('FormElementManager')->get('Categorias\Form\CategoriasForm');

        return new ModificarController(
            $categoriasService,
            $categoriasInsertForm
        );
    }
}