<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Reportes\Controller\Reportes' => 'Reportes\Controller\ReportesController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'Reportes' => array(
                'type'    => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/reportes',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        '__NAMESPACE__' => 'Reportes\Controller',
                        'controller'    => 'Reportes',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    // This route is a sane default when developing a module;
                    // as you solidify the routes for your module, however,
                    // you may want to remove it and replace it with more
                    // specific routes.
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action[/:id]]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'        =>  '[0-9]*',
                            ),
                            'defaults' => array(
                            ),
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

    /*
     * if you're using AssetManager module, you can save assets in your module's public
     * assetmanager module can be install by require "rwoverdijk/assetmanager": "*" in your composer.json
     * 'asset_manager' => array(
         'resolver_configs' => array(
             'paths' => array(
                 'TestAjax' => __DIR__ . '/../public',
             ),
         ),
     ), */

);