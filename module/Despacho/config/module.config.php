<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 09/10/16
 * Time: 09:49 AM
 */
return array(
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__.'/../view',
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Despacho\Controller\Index' => 'Despacho\Controller\IndexController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'despacho' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/despacho[/:action[/:id]]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Despacho\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'constraints' => array(
                    'action'    =>  '(add|edit|delete)',
                    'id'    =>  '[0-9]*',
                ),
            ),
        ),
    ),
);