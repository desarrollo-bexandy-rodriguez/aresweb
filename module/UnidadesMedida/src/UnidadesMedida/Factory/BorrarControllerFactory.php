<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 19/09/16
 * Time: 10:34 PM
 */

namespace UnidadesMedida\Factory;


use UnidadesMedida\Controller\BorrarController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class BorrarControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        $unidadesMedidaService = $realServiceLocator->get('UnidadesMedida\Service\UnidadesMedidaServiceInterface');

        return new BorrarController($unidadesMedidaService);
    }
}