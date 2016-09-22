<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 15/09/16
 * Time: 12:42 PM
 */

namespace UnidadesMedida\Factory;


use UnidadesMedida\Service\UnidadesMedidaService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class UnidadesMedidaServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new UnidadesMedidaService(
            $serviceLocator->get('UnidadesMedida\Mapper\UnidadesMedidaMapperInterface')
        );
    }
}