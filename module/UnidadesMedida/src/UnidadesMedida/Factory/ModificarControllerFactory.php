<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 18/09/16
 * Time: 11:06 AM
 */

namespace UnidadesMedida\Factory;

use UnidadesMedida\Controller\ModificarController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ModificarControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        $unidadesMedidaService = $realServiceLocator->get('UnidadesMedida\Service\UnidadesMedidaServiceInterface');
        $unidadesMedidaInsertForm = $realServiceLocator->get('FormElementManager')->get('UnidadesMedida\Form\UnidadesMedidaForm');

        return new ModificarController(
            $unidadesMedidaService,
            $unidadesMedidaInsertForm
        );
    }
}