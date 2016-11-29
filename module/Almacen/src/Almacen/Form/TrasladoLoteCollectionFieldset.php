<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 27/11/16
 * Time: 08:01 PM
 */

namespace Almacen\Form;


use Almacen\Model\TrasladoLoteCollectionEntity;
use Zend\Form\Fieldset;
use Zend\Stdlib\Hydrator\ClassMethods;

class TrasladoLoteCollectionFieldset extends Fieldset
{
    public function __construct()
    {
        parent::__construct('traslado-lote-collection');

        $this
            ->setHydrator(new ClassMethods(false))
            ->setObject(new TrasladoLoteCollectionEntity())
        ;

        $this->add(array(
            'type' => 'Zend\Form\Element\Collection',
            'name' => 'collection',
            'options' => array(
                'label' => 'Productos Disponibles',
                'should_create_template' => true,
                'template_placeholder' => '__placeholder__',
                'allow_add' => true,
                'target_element' => array(
                    'type' => 'Almacen\Form\TrasladoLoteFieldset',
                ),
            ),
        ));
    }
}