<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 02/11/16
 * Time: 08:00 AM
 */

namespace Reportes;


use Reportes\Model\ReportesMapper;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements AutoloaderProviderInterface, ConfigProviderInterface
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                )
            )
        );
    }

    public function getConfig()
    {
        return include __DIR__.'/config/module.config.php';
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'ReportesMapper' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $mapper = new ReportesMapper($dbAdapter);
                    return $mapper;
                },
            ),
        );
    }
}