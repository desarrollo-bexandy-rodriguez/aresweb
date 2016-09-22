<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 15/09/16
 * Time: 12:42 PM
 */

namespace Categorias\Factory;


use Categorias\Service\CategoriasService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class CategoriasServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new CategoriasService(
            $serviceLocator->get('Categorias\Mapper\CategoriasMapperInterface')
        );
    }
}