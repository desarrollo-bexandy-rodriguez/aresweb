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
            'Categorias\Mapper\CategoriasMapperInterface' => 'Categorias\Factory\CategoriasMapperFactory',
            'Categorias\Service\CategoriasServiceInterface' => 'Categorias\Factory\CategoriasServiceFactory',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__.'/../view',
        ),
    ),
    'controllers' => array(
        'factories' => array(
            'Categorias\Controller\Listar' => 'Categorias\Factory\ListarControllerFactory',
            'Categorias\Controller\Modificar'   =>  'Categorias\Factory\ModificarControllerFactory',
            'Categorias\Controller\Borrar' => 'Categorias\Factory\BorrarControllerFactory'
        ),
    ),
    'router' => array(
        'routes' => array(
            'categorias' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/categorias',
                    'defaults' => array(
                        'controller' => 'Categorias\Controller\Listar',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' =>  true,
                'child_routes'  =>  array(
                    'detalle'    =>  array(
                        'type'  =>  'segment',
                        'options'   =>  array(
                            'route' =>  '/:id',
                            'defaults'  =>  array(
                                'action'    =>  'detalle',
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
                                'controller'    =>  'Categorias\Controller\Modificar',
                                'action'    =>  'nuevo',
                            ),
                        ),
                    ),
                    'editar' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/editar/:id',
                            'defaults' => array(
                                'controller' => 'Categorias\Controller\Modificar',
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
                                'controller' => 'Categorias\Controller\Borrar',
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
