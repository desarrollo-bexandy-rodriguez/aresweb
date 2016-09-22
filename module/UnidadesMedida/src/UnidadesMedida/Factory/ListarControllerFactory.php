<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 14/09/16
 * Time: 12:57 PM
 */

namespace UnidadesMedida\Factory;


use UnidadesMedida\Controller\ListarController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ListarControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        $unidadesMedidaService = $realServiceLocator->get('UnidadesMedida\Service\UnidadesMedidaServiceInterface');

        return new ListarController($unidadesMedidaService);
    }
}