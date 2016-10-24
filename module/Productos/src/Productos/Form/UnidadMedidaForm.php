<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 21/09/16
 * Time: 03:24 PM
 */

namespace Productos\Form;


use Zend\Form\Form;
use Zend\Stdlib\Hydrator\ClassMethods;

class UnidadMedidaForm extends Form
{
    public function __construct($name = null, $options = array())
    {
        parent::__construct('unidad-medida');

        $this->setAttribute('method', 'post');
        $this->setInputFilter(new CategoriaFilter());
        $this->setHydrator(new ClassMethods());

        $this->add(array(
            'type'  =>  'hidden',
            'name'  =>  'id',
        ));

        $this->add(array(
            'type'  =>  'text',
            'name'  =>  'nombre',
            'options'   =>  array(
                'label' =>  'Nombre de la Unidad de Medida',
            ),
        ));

        $this->add(array(
            'type'  =>  'text',
            'name'  =>  'abreviatura',
            'options'   =>  array(
                'label' =>  'Abreviatura de la Unidad de Medida',
            ),
        ));

        $this->add(array(
            'type'  =>  'text',
            'name'  =>  'simbolo',
            'options'   =>  array(
                'label' =>  'Símbolo de la Unidad de Medida',
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