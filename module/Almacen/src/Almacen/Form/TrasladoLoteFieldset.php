<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 27/11/16
 * Time: 08:03 PM
 */

namespace Almacen\Form;


use Almacen\Model\TrasladoLoteEntity;
use Zend\Form\Fieldset;
use Zend\Stdlib\Hydrator\ClassMethods;

class TrasladoLoteFieldset extends Fieldset
{
    public function __construct()
    {
        parent::__construct('traslado-lote');

        $this
            ->setHydrator(new ClassMethods(false))
            ->setObject(new TrasladoLoteEntity())
        ;

        $this->add(array(
            'name' => 'idalmacenmayor',
            'type' => 'hidden',
        ));

        $this->add(array(
            'name' => 'idalmacendetal',
            'type' => 'hidden',
        ));

        $this->add(array(
            'name' => 'nombmarca',
            'type' => 'text',
            'attributes' => array(
                'size' => 20,
                'readonly' => true,
                'disabled' => true,
            ),
        ));

        $this->add(array(
            'name' => 'nombcategoria',
            'type' => 'text',
            'attributes' => array(
                'size' => 20,
                'readonly' => true,
                'disabled' => true,
            ),
        ));

        $this->add(array(
            'name' => 'idproducto',
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
            'name' => 'nombproducto',
            'type' => 'text',
            'attributes' => array(
                'size' => 45,
                'maxlength' => 45,
                'readonly' => true,
                'disabled' => true,
            ),
        ));

        $this->add(array(
            'name' => 'disponible',
            'type' => 'text',
            'attributes' => array(
                'size' => 5,
                'maxlength' => 10,
                'readonly' => true,
                'disabled' => true,
                'class' => 'disponible',
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
            'name' => 'unidmed',
            'type' => 'text',
            'attributes' => array(
                'size' => 4,
                'maxlength' => 10,
                'readonly' => true,
                'disabled' => true,
            ),
        ));

    }

}