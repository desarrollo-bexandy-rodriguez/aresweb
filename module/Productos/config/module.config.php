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
            'Productos\Controller\Producto' => 'Productos\Controller\ProductoController',
            'Productos\Controller\Categoria' => 'Productos\Controller\CategoriaController',
            'Productos\Controller\UnidadMedida' => 'Productos\Controller\UnidadMedidaController',
            'Productos\Controller\MyForm' => 'Productos\Controller\MyFormController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'producto' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/producto[/:action[/:id][/:cat][/:det][/:may]]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Productos\Controller',
                        'controller'    => 'Producto',
                        'action'        => 'index',
                    ),
                ),
                'constraints' => array(
                    'action'    =>  '(add|edit|delete|crear-producto|editar-producto)',
                    'id'    =>  '[0-9]*',
                    'cat'    =>  '[0-9]*',
                    'det'    =>  '[0-9]*',
                    'may'    =>  '[0-9]*',
                ),
            ),
            'categoria' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/categoria[/:action[/:id]]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Productos\Controller',
                        'controller'    => 'Categoria',
                        'action'        => 'index',
                    ),
                ),
                'constraints' => array(
                    'action'    =>  '(add|edit|delete|select)',
                    'id'    =>  '[1-9][0-9]*',
                ),
            ),
            'unidad-medida' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/unidad-medida[/:action[/:id][/:tipo]]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Productos\Controller',
                        'controller'    => 'UnidadMedida',
                        'action'        => 'index',
                    ),
                ),
                'constraints' => array(
                    'action'    =>  '(add|edit|delete|select)',
                    'id'    =>  '[1-9][0-9]*',
                ),
            ),
            'my-form' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/myform[/:action[/:categoria][/:marca]]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Productos\Controller',
                        'controller'    => 'MyForm',
                        'action'        => 'index',
                    ),
                    'constraints' => array(
                        'action'    =>  '(categoria|marca|filtros)',
                        'categoria'    =>  '[1-9][0-9]*',
                        'marca'    =>  '[1-9][0-9]*',
                    ),
                ),
            ),
        ),
    ),
);
