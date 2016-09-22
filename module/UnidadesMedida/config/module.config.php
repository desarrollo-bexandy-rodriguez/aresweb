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
            'UnidadesMedida\Mapper\UnidadesMedidaMapperInterface' => 'UnidadesMedida\Factory\UnidadesMedidaMapperFactory',
            'UnidadesMedida\Service\UnidadesMedidaServiceInterface' => 'UnidadesMedida\Factory\UnidadesMedidaServiceFactory',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__.'/../view',
        ),
    ),
    'controllers' => array(
        'factories' => array(
            'UnidadesMedida\Controller\Listar' => 'UnidadesMedida\Factory\ListarControllerFactory',
            'UnidadesMedida\Controller\Modificar'   =>  'UnidadesMedida\Factory\ModificarControllerFactory',
            'UnidadesMedida\Controller\Borrar' => 'UnidadesMedida\Factory\BorrarControllerFactory'
        ),
    ),
    'router' => array(
        'routes' => array(
            'unidadesmedida' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/unidadesmedida',
                    'defaults' => array(
                        'controller' => 'UnidadesMedida\Controller\Listar',
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
                                'controller'    =>  'UnidadesMedida\Controller\Modificar',
                                'action'    =>  'nuevo',
                            ),
                        ),
                    ),
                    'editar' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/editar/:id',
                            'defaults' => array(
                                'controller' => 'UnidadesMedida\Controller\Modificar',
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
                                'controller' => 'UnidadesMedida\Controller\Borrar',
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
