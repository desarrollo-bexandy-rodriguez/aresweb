<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Reportes\Controller\Reportes' => 'Reportes\Controller\ReportesController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'reportes' => array(
                'type'    => 'Segment',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/reportes[/:action]',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        '__NAMESPACE__' => 'Reportes\Controller',
                        'controller'    => 'Reportes',
                        'action'        => 'index',
                    ),
                    'options' => array(
                        'route'    => '/',
                        'constraints' => array(
                            'action'     => '(index|headmap|column-stacked|pedidos-despachador|torta|prueba|datos-top-productos|datos-pedidos-diarios-despachador)',
                        ),
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'Reportes' => __DIR__ . '/../view',
        ),
    ),

);