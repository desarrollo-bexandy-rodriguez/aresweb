<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 18/10/16
 * Time: 07:28 PM
 */
$settings = array(
    //'zend_db_adapter' => 'Zend\Db\Adapter\Adapter',
    'user_entity_class' => 'Application\Entity\User',
    'enable_default_entities' => false,
    'enable_username' => true,
    'auth_identity_fields' => array( 'username' ),

    //'auth_adapters' => array( 100 => 'ZfcUser\Authentication\Adapter\Db' ),

);

return array(
    'zfcuser' => $settings,
    'service_manager' => array(
        'aliases' => array(
            'zfcuser_zend_db_adapter' => (isset($settings['zend_db_adapter'])) ? $settings['zend_db_adapter']: 'Zend\Db\Adapter\Adapter',
        ),
    ),
    'translator' => array(
        'locale' => 'es_VE',
        'translation_file_patterns' => array(
            array(
                // translation for ZFCUSER module OK
                'type' => 'gettext',
                'base_dir' => './vendor/zf-commons/zfc-user/src/ZfcUser/language',
                'pattern' => '%s.mo',
            ),
        ),
    ),
);