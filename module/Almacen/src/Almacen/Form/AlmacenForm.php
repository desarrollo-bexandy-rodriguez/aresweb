<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 02/10/16
 * Time: 08:36 PM
 */

namespace Almacen\Form;


use Zend\Form\Form;
use Zend\Stdlib\Hydrator\ClassMethods;

class AlmacenForm extends Form
{

    /**
     * AlmacenForm constructor.
     */
    public function __construct($name = null, $options = array())
    {
        parent::__construct('almacen');

        $this->setAttribute('method', 'post');
        //$this->setInputFilter(new PedidoFilter());
        $this->setHydrator(new ClassMethods());

        $this->add(array(
            'name' => 'id',
            'type' => 'hidden',
        ));



        $this->add(array(
            'name' => 'nombre',
            'type' => 'text',
            'options' => array(
                'label' => 'Nombre del Almacén: ',
            ),
            'attributes' => array(
                'id' => 'nombre',
                'maxlength' => 100,
                'class' => 'form-control-static',
            )
        ));

        $this->add(array(
            'name' => 'nombtipoalmacen',
            'type' => 'text',
            'options' => array(
                'label' => 'Nombre del Almacén: ',
            ),
            'attributes' => array(
                'id' => 'nombre',
                'maxlength' => 100,
                'readonly' => true,
                'disabled' => true,
                'class' => 'form-control-static',
            )
        ));

        $this->add(array(
            'type' => 'radio',
            'name' => 'idtipoalmacen',
            'options' => array(
                'label' => 'Seleccione tipo de Almacén ?',
                'value_options' => array(
                    '1' => 'Mayor',
                    '2' => 'Detal',
                ),
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Crear Almacén',
                'class' => 'btn btn-primary',
            ),
        ));
    }
}