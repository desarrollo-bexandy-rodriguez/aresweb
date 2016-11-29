<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 22/09/16
 * Time: 06:14 PM
 */

namespace Pedidos\Form;


use Zend\Form\Form;
use Zend\Stdlib\Hydrator\ClassMethods;

class ItemForm extends Form
{

    /**
     * ItemForm constructor.
     */
    public function __construct($name = null, $options = array())
    {
        parent::__construct('item');

        $this->setAttribute('method', 'post');
        $this->setInputFilter(new ItemFilter());
        $this->setHydrator(new ClassMethods());

        $this->add(array(
            'name' => 'pedido',
            'type' => 'hidden',
        ));

        $this->add(array(
            'name' => 'producto',
            'type' => 'hidden',
        ));

        $this->add(array(
            'name' => 'nombproducto',
            'type' => 'text',
            'options' => array(
                'label' => 'Producto',
            ),
            'attributes' => array(
                'id' => 'nombproducto',
                'maxlength' => 100,
                'readonly' => true,
                'disabled' => true,
                'class' => 'form-control-static',
            )
        ));

        $this->add(array(
            'name' => 'unidmedprod',
            'type' => 'text',
            'options' => array(
                'label' => 'Unidad de Medida',
            ),
            'attributes' => array(
                'id' => 'unidmedprod',
                'maxlength' => 100,
                'readonly' => true,
                'disabled' => true,
                'class' => 'form-control-static',
            )
        ));

        $this->add(array(
            'name' => 'subtotal',
            'type' => 'hidden',
        ));

        $this->add(array(
            'name' => 'precio',
            'type' => 'text',
            'options' => array(
                'label' => 'Precio: ',
            ),
            'attributes' => array(
                'id' => 'precio',
                'required' => false,
                'maxlength' => 100,
            )
        ));

        $this->add(array(
            'name' => 'cantidad',
            'type' => 'text',
            'options' => array(
                'label' => 'Cantidad: ',
            ),
            'attributes' => array(
                'id' => 'cantidad',
                'required' => false,
                'maxlength' => 100,
            )
        ));

        $this->add(array(
            'type' => 'radio',
            'name' => 'seleccion',
            'options' => array(
                'label' => 'Como desea realizar el pedido ?',
                'value_options' => array(
                    'cantidad' => 'Cantidad',
                    'precio' => 'Precio',
                ),
            ),
            'attributes' => array(
                'id' => 'seleccion',
            )
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