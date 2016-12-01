<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 18/10/16
 * Time: 07:27 PM
 */
return array(
    'doctrine' => array(
        'connection' => array(
            'orm_default' => array(
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params' => array(
                    'host' => 'localhost',
                    'port' => '3306',
                ),
            ),
        ),
    ),
);