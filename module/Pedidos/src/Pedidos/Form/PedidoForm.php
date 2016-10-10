<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 22/09/16
 * Time: 01:53 PM
 */

namespace Pedidos\Form;


use Zend\Form\Form;
use Zend\Stdlib\Hydrator\ClassMethods;

class PedidoForm extends Form
{

    /**
     * PedidoForm constructor.
     */
    public function __construct($name = null, $options = array())
    {
        parent::__construct('pedido');

        $this->setAttribute('method', 'post');
        $this->setInputFilter(new PedidoFilter());
        $this->setHydrator(new ClassMethods());

        $this->add(array(
            'name' => 'id',
            'type' => 'hidden',
        ));

        $this->add(array(
            'name' => 'idalmacen',
            'type' => 'hidden',
        ));

        $this->add(array(
            'name' => 'codigo',
            'type' => 'text',
            'options' => array(
                'label' => 'Código del Pedido',
            ),
            'attributes' => array(
                'id' => 'codigo',
                'maxlength' => 15,
                'readonly' => true,
                'disabled' => true,
                'class' => 'form-control-static text-center',
            )
        ));

        $this->add(array(
            'name' => 'vendedor',
            'type' => 'hidden',
        ));

        $this->add(array(
            'name' => 'nombvendedor',
            'type' => 'text',
            'options' => array(
                'label' => 'Realizado por: ',
            ),
            'attributes' => array(
                'id' => 'nombvendedor',
                'maxlength' => 100,
                'readonly' => true,
                'class' => 'form-control-static',
            )
        ));

        $this->add(array(
            'name' => 'preciototal',
            'type' => 'text',
            'options' => array(
                'label' => 'Precio Total (BsF)',
            ),
            'attributes' => array(
                'id' => 'preciototal',
                'maxlength' => 50,
                'readonly' => true,
                'class' => 'form-control-static text-center',
            )
        ));

        $this->add(array(
            'name' => 'cliente',
            'type' => 'text',
            'options' => array(
                'label' => 'Nombre del Cliente: ',
            ),
            'attributes' => array(
                'id' => 'cliente',
                'maxlength' => 100,
            )
        ));

        $this->add(array(
            'name' => 'estatus',
            'type' => 'hidden',
        ));

        $this->add(array(
            'name' => 'nombestatus',
            'type' => 'hidden',
        ));

        $this->add(array(
            'name' => 'msgventas',
            'type' => 'text',
            'options' => array(
                'label' => 'Estatus:  ',
            ),
            'attributes' => array(
                'id' => 'msgventas',
                'maxlength' => 100,
                'readonly' => true,
                'class' => 'form-control-static',
            )
        ));

        $this->add(array(
            'name' => 'msgventas',
            'type' => 'text',
            'options' => array(
                'label' => 'Estatus:  ',
            ),
            'attributes' => array(
                'id' => 'msgventas',
                'maxlength' => 100,
                'readonly' => true,
                'class' => 'form-control-static text-center',
            )
        ));

        $this->add(array(
            'name' => 'msgdespacho',
            'type' => 'text',
            'options' => array(
                'label' => 'Estatus:  ',
            ),
            'attributes' => array(
                'id' => 'msgdespacho',
                'maxlength' => 100,
                'readonly' => true,
                'class' => 'form-control-static',
            )
        ));

        $this->add(array(
            'name' => 'despachador',
            'type' => 'hidden',
        ));

        $this->add(array(
            'name' => 'nombdespachador',
            'type' => 'text',
            'options' => array(
                'label' => 'Atendido por: ',
            ),
            'attributes' => array(
                'id' => 'nombdespachador',
                'maxlength' => 100,
                'readonly' => true,
                'class' => 'form-control-static',
            )
        ));

        $this->add(array(
            'name' => 'fecha',
            'type' => 'text',
            'options' => array(
                'label' => 'Fecha: ',
            ),
            'attributes' => array(
                'id' => 'fecha',
                'maxlength' => 100,
                'readonly' => true,
                'class' => 'form-control-static',
            )
        ));

        $this->add(array(
            'name' => 'hora',
            'type' => 'text',
            'options' => array(
                'label' => 'Hora: ',
            ),
            'attributes' => array(
                'id' => 'hora',
                'maxlength' => 100,
                'readonly' => true,
                'class' => 'form-control-static',
            )
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Enviar',
                'class' => 'btn btn-success btn-lg',
            ),
        ));

    }
}