<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 22/09/16
 * Time: 01:48 PM
 */
return array(
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__.'/../view',
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Pedidos\Controller\Pedido' => 'Pedidos\Controller\PedidoController',
            'Pedidos\Controller\Item' => 'Pedidos\Controller\ItemController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'pedido' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/pedido[/:action[/:id]]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Pedidos\Controller',
                        'controller'    => 'Pedido',
                        'action'        => 'index',
                    ),
                ),
                'constraints' => array(
                    'action'    =>  '(add|edit|delete)',
                    'id'    =>  '[0-9]*',
                ),
            ),
            'item' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/item[/:action]/:pedido/:producto',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Pedidos\Controller',
                        'controller'    => 'Item',
                        'action'        => 'index',
                    ),
                ),
                'constraints' => array(
                    'action'    =>  '(add|edit|delete)',
                    'pedido'    =>  '[0-9]*',
                    'producto'    =>  '[0-9]*',
                ),
            ),
        ),
    ),
);