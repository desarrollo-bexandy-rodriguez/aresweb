<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 15/09/16
 * Time: 01:23 PM
 */

namespace UnidadesMedida\Factory;


use UnidadesMedida\Mapper\UnidadesMedidaMapper;
use UnidadesMedida\Model\UnidadesMedida;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator\ClassMethods;

class UnidadesMedidaMapperFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new UnidadesMedidaMapper(
            $serviceLocator->get('Zend\Db\Adapter\Adapter'),
            new ClassMethods(false),
            new UnidadesMedida()
        );
    }
}