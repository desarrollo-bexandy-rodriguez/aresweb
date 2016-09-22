<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 18/09/16
 * Time: 10:56 AM
 */

namespace UnidadesMedida\Form;


use Zend\Form\Form;

class UnidadesMedidaForm extends Form
{
    public function __construct($name = null, $options = array())
    {
        parent::__construct($name,$options);

        $this->add(array(
            'name'  =>  'unidadesmedida-fieldset',
            'type'  =>  'UnidadesMedida\Form\UnidadesMedidaFieldset',
            'options' =>    array(
                'use_as_base_fieldset' => true,
            ),
        ));

        $this->add(array(
            'type'  =>  'submit',
            'name'  =>  'submit',
            'attributes'   =>  array(
                'value' =>  'Insertar Nueva Unidad de Medida',
            ),
        ));
    }
}