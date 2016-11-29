<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 20/09/16
 * Time: 05:30 PM
 */

namespace Productos\Form;

use Zend\Form\Form;

class ProductoForm extends Form
{
    public function __construct($name = null, $options = array())
    {
        parent::__construct($name,$options);

        $this->add(array(
            'name'  =>  'producto',
            'type'  =>  'Productos\Form\ProductoFieldset',
            'options' =>    array(
                'use_as_base_fieldset' => true,
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Go',
                'class' => 'btn btn-primary',
            ),
        ));
    }
}