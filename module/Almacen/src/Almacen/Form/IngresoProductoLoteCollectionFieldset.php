<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 26/11/16
 * Time: 11:44 AM
 */

namespace Almacen\Form;


use Almacen\Model\IngresoProductoLoteCollectionEntity;
use Zend\Form\Fieldset;
use Zend\Stdlib\Hydrator\ClassMethods;

class IngresoProductoLoteCollectionFieldset extends Fieldset
{
    public function __construct()
    {
        parent::__construct('ingreso-producto-lote-collection');

        $this
            ->setHydrator(new ClassMethods(false))
            ->setObject(new IngresoProductoLoteCollectionEntity())
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
                    'type' => 'Almacen\Form\IngresoProductoLoteFieldset',
                ),
            ),
        ));
    }
}