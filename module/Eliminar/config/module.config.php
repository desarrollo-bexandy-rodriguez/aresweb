<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 14/09/16
 * Time: 10:16 AM
 */

return array(
    'service_manager' => array(
        'factories' => array(
            'Eliminar\Mapper\ProductosMapperInterface' => 'Eliminar\Factory\ZendDbSqlMapperFactory',
            'Eliminar\Service\ProductosServiceInterface' => 'Eliminar\Factory\ProductosServiceFactory',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__.'/../view',
        ),
    ),
    'controllers' => array(
        'factories' => array(
            'Eliminar\Controller\Eliminar' => 'Eliminar\Factory\ProductosControllerFactory',
            'Eliminar\Controller\Modificar'   =>  'Eliminar\Factory\ModificarControllerFactory',
            'Eliminar\Controller\Borrar' => 'Eliminar\Factory\BorrarControllerFactory'
        ),
    ),
    'router' => array(
        'routes' => array(
            'productos-large' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/productos-large',
                    'defaults' => array(
                        'controller' => 'Eliminar\Controller\Eliminar',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' =>  true,
                'child_routes'  =>  array(
                    'detail'    =>  array(
                        'type'  =>  'segment',
                        'options'   =>  array(
                            'route' =>  '/:id',
                            'defaults'  =>  array(
                                'action'    =>  'detail',
                            ),
                        'constrains'    =>  array(
                            'id'    =>  '[1-9]\d*',
                        ),
                        ),
                    ),
                    'nuevo' =>  array(
                        'type'  =>  'literal',
                        'options'   =>  array(
                            'route' =>  '/nuevo',
                            'defaults'  =>  array(
                                'controller'    =>  'Eliminar\Controller\Modificar',
                                'action'    =>  'nuevo',
                            ),
                        ),
                    ),
                    'editar' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/editar/:id',
                            'defaults' => array(
                                'controller' => 'Eliminar\Controller\Modificar',
                                'action' => 'editar',
                            ),
                            'constraints' => array(
                                'id' => '\d+',
                            ),
                        ),
                    ),
                    'eliminar' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route'    => '/eliminar/:id',
                            'defaults' => array(
                                'controller' => 'Eliminar\Controller\Borrar',
                                'action'     => 'eliminar'
                            ),
                            'constraints' => array(
                                'id' => '\d+'
                            )
                        )
                    ),

                ),
            ),
        ),
    ),
);
