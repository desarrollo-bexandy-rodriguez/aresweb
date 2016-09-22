<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 14/09/16
 * Time: 10:16 AM
 */

return array(
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__.'/../view',
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Productos\Controller\Task' => 'Productos\Controller\TaskController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'producto' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/producto[/:action[/:id]]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Productos\Controller',
                        'controller'    => 'Task',
                        'action'        => 'index',
                    ),
                ),
                'constraints' => array(
                    'action'    =>  '(add|edit|delete)',
                    'id'    =>  '[0-9]+',
                ),
            ),
        ),
    ),
);
