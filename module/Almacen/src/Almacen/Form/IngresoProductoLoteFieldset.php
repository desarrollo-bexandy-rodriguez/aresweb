<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 26/11/16
 * Time: 11:47 AM
 */

namespace Almacen\Form;


use Almacen\Model\IngresoProductoLoteEntity;
use Zend\Form\Fieldset;
use Zend\Stdlib\Hydrator\ClassMethods;

class IngresoProductoLoteFieldset extends Fieldset
{
    public function __construct()
    {
        parent::__construct('ingreso-producto-lote');

        $this
            ->setHydrator(new ClassMethods(false))
            ->setObject(new IngresoProductoLoteEntity())
        ;

        $this->add(array(
            'name' => 'nombmarca',
            'type' => 'text',
            'attributes' => array(
                'readonly' => true,
                'disabled' => true,
            ),
        ));

        $this->add(array(
            'name' => 'nombcategoria',
            'type' => 'text',
            'attributes' => array(
                'readonly' => true,
                'disabled' => true,
            ),
        ));

        $this->add(array(
            'name' => 'id',
            'type' => 'hidden',
        ));

        $this->add(array(
            'name' => 'actualizado',
            'type' => 'hidden',
            'attributes' => array(
                'class' => 'actualizado',
            ),
        ));

        $this->add(array(
            'name' => 'nombre',
            'type' => 'text',
            'attributes' => array(
                'size' => 45,
                'maxlength' => 100,
                'readonly' => true,
                'disabled' => true,
            ),
        ));

        $this->add(array(
            'name' => 'cantidad',
            'type' => 'text',
            'options' => array(
                'label' => 'Cantidad',
            ),
            'attributes' => array(
                'size' => 20,
                'class' => 'cantidad',
            ),
        ));

        $this->add(array(
            'name' => 'nombunidmedalmacen',
            'type' => 'text',
            'attributes' => array(
                'size' => 10,
                'maxlength' => 10,
                'readonly' => true,
                'disabled' => true,
            ),
        ));

    }
}