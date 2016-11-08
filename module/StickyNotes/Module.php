<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 28/10/16
 * Time: 11:29 PM
 */
namespace StickyNotes;

use StickyNotes\Model\StickyNotesTable;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements
    AutoloaderProviderInterface,
    ConfigProviderInterface
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
                'StickyNotes\Model\StickyNotesTable' => function($sm){
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new StickyNotesTable($dbAdapter);
                    return $table;
                }
            ),
        );
    }
}