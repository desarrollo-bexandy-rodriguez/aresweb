<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 02/10/16
 * Time: 12:08 PM
 */
return array(
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__.'/../view',
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Almacen\Controller\Almacen' => 'Almacen\Controller\AlmacenController',
            'Almacen\Controller\Inventario' => 'Almacen\Controller\InventarioController',
            'Almacen\Controller\Movimiento' => 'Almacen\Controller\MovimientoController',
            'Almacen\Controller\Ingreso' => 'Almacen\Controller\IngresoController',
            'Almacen\Controller\Traslado' => 'Almacen\Controller\TrasladoController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'almacen' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/almacen[/:action[/:id]]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Almacen\Controller',
                        'controller'    => 'Almacen',
                        'action'        => 'index',
                    ),
                ),
                'constraints' => array(
                    'action'    =>  '(add|edit|delete)',
                    'id'    =>  '[0-9]*',
                ),
            ),
            'inventario' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/inventario/:action[/:idalmacen][/:idproducto]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Almacen\Controller',
                        'controller'    => 'Inventario',
                    ),
                ),
                'constraints' => array(
                    'action'    =>  '(ingreso-producto|select-almacen|select-producto|disponibilidad-almacen|ver-ingresos|movimiento)',
                    'idalmacen'    =>  '[0-9]*',
                    'idproducto'    =>  '[0-9]*',
                ),
            ),
            'movimiento' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/movimiento/:action[/:idmayor][/:iddetal][/:idproducto]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Almacen\Controller',
                        'controller'    => 'Movimiento',
                        'action' =>  'movimiento-producto'
                    ),
                ),
                'constraints' => array(
                    'action'    =>  '(movimiento-producto|disponibilidad-detal)',
                    'idmayor'    =>  '[0-9]*',
                    'iddetal'    =>  '[0-9]*',
                    'idproducto'    =>  '[0-9]*',
                ),
            ),
            'ingreso-productos'=> array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/ingreso-productos[/:action[/:categoria][/:marca]]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Almacen\Controller',
                        'controller'    => 'Ingreso',
                        'action' =>  'index'
                    ),
                ),
                'constraints' => array(
                    'action'    =>  '(index|filtro)',
                    'categoria'    =>  '[1-9][0-9]*',
                    'marca'    =>  '[1-9][0-9]*',
                ),
            ),
            'traslado-productos'=> array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/traslado-productos[/:action[/:categoria][/:marca]]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Almacen\Controller',
                        'controller'    => 'Traslado',
                        'action' =>  'index'
                    ),
                ),
                'constraints' => array(
                    'action'    =>  '(index|filtro)',
                    'categoria'    =>  '[1-9][0-9]*',
                    'marca'    =>  '[1-9][0-9]*',
                ),
            ),
        ),

    ),
);