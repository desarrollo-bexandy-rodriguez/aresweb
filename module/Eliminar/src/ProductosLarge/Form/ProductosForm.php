<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 18/09/16
 * Time: 10:56 AM
 */

namespace ProductosLarge\Form;


use Zend\Form\Form;

class ProductosLargeForm extends Form
{
    public function __construct($name = null, $options = array())
    {
        parent::__construct($name,$options);

        $this->add(array(
            'name'  =>  'productos-large-fieldset',
            'type'  =>  'ProductosLargeLarge\Form\ProductosLargeFieldset',
            'options' =>    array(
                'use_as_base_fieldset' => true,
            ),
        ));

        $this->add(array(
            'type'  =>  'submit',
            'name'  =>  'submit',
            'attributes'   =>  array(
                'value' =>  'Insertar Nuevo Producto',
            ),
        ));
    }
}