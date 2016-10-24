<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 07/10/16
 * Time: 09:08 AM
 */

namespace Almacen\Form;


use Zend\Form\Form;
use Zend\Stdlib\Hydrator\ClassMethods;

class MovimientoForm extends Form
{

    /**
     * MovimientoForm constructor.
     */
    public function __construct($name = null, $options = array())
    {
        parent::__construct('movimiento');

        $this->setAttribute('method', 'post');
        $this->setInputFilter(new MovimientoFilter());
        $this->setHydrator(new ClassMethods());

        $this->add(array(
            'name' => 'id',
            'type' => 'hidden',
        ));

        $this->add(array(
            'name' => 'idalmacenmayor',
            'type' => 'hidden',
        ));

        $this->add(array(
            'name' => 'idalmacendetal',
            'type' => 'hidden',
        ));

        $this->add(array(
            'name' => 'idproducto',
            'type' => 'hidden',
        ));

        $this->add(array(
            'name' => 'idusuario',
            'type' => 'hidden',
        ));

        $this->add(array(
            'name' => 'cantidad',
            'type' => 'text',
            'options' => array(
                'label' => 'Cantidad: ',
            ),
            'attributes' => array(
                'id' => 'cantidad',
                'maxlength' => 100,
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
            'name' => 'nombmayor',
            'type' => 'text',
            'options' => array(
                'label' => 'Desde : ',
            ),
            'attributes' => array(
                'id' => 'nombmayor',
                'maxlength' => 100,
                'readonly' => true,

                'class' => 'form-control-static',
            )
        ));

        $this->add(array(
            'name' => 'nombdetal',
            'type' => 'text',
            'options' => array(
                'label' => 'Hasta : ',
            ),
            'attributes' => array(
                'id' => 'nombdetal',
                'maxlength' => 100,
                'readonly' => true,

                'class' => 'form-control-static',
            )
        ));

        $this->add(array(
            'name' => 'nombproducto',
            'type' => 'text',
            'options' => array(
                'label' => 'Producto : ',
            ),
            'attributes' => array(
                'id' => 'nombproducto',
                'maxlength' => 100,
                'readonly' => true,

                'class' => 'form-control-static',
            )
        ));

        $this->add(array(
            'name' => 'unidmed',
            'type' => 'text',
            'options' => array(
                'label' => 'Unidad Medida: ',
            ),
            'attributes' => array(
                'id' => 'unidmed',
                'maxlength' => 100,
                'readonly' => true,

                'class' => 'form-control-static',
            )
        ));

        $this->add(array(
            'name' => 'disponible',
            'type' => 'text',
            'options' => array(
                'label' => 'Cantidad Disponible en Deposito: ',
            ),
            'attributes' => array(
                'id' => 'disponible',
                'maxlength' => 100,
                'readonly' => true,

                'class' => 'form-control-static',
            )
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Ingresar Producto al Inventario',
                'class' => 'btn btn-primary',
            ),
        ));

    }
}