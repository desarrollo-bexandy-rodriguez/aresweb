<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 14/09/16
 * Time: 10:16 AM
 */

return array(
    'service_manager' => array(
        'invokables' => array(
            'Productos\Service\ProductosServiceInterface' => 'Productos\Service\ProductosService',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__.'/../view',
        ),
    ),
    'controllers' => array(
        'factories' => array(
            'Productos\Controller\Productos' => 'Productos\Factory\ProductosControllerFactory',
        ),
    ),
    'router' => array(
        'routes' => array(
            'productos' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/productos',
                    'defaults' => array(
                        'controller' => 'Productos\Controller\Productos',
                        'action' => 'index',
                    ),
                ),
            ),
        ),
    ),
);