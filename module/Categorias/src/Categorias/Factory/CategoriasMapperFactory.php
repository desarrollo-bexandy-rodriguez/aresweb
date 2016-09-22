<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 15/09/16
 * Time: 01:23 PM
 */

namespace Categorias\Factory;


use Categorias\Mapper\CategoriasMapper;
use Categorias\Model\Categorias;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator\ClassMethods;

class CategoriasMapperFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new CategoriasMapper(
            $serviceLocator->get('Zend\Db\Adapter\Adapter'),
            new ClassMethods(false),
            new Categorias()
        );
    }
}