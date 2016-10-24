<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 05/10/16
 * Time: 12:30 PM
 */

namespace Almacen\Form;


use Zend\Form\Form;
use Zend\Stdlib\Hydrator\ClassMethods;

class InventarioForm extends Form
{

    /**
     * IngresoForm constructor.
     */
    public function __construct($name = null, $options = array())
    {
        parent::__construct('inventario');

        $this->setAttribute('method', 'post');
        //$this->setInputFilter(new PedidoFilter());
        $this->setHydrator(new ClassMethods());

        $this->add(array(
            'name' => 'id',
            'type' => 'hidden',
        ));

        $this->add(array(
            'name' => 'idproducto',
            'type' => 'hidden',
        ));

        $this->add(array(
            'name' => 'nombproducto',
            'type' => 'text',
            'options' => array(
                'label' => 'Nombre del Producto: ',
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
            'name' => 'idalmacen',
            'type' => 'hidden',
        ));

        $this->add(array(
            'name' => 'nombalmacen',
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
            'name' => 'cantidad',
            'type' => 'text',
            'options' => array(
                'label' => 'Cantidad de Producto: ',
            ),
            'attributes' => array(
                'id' => 'nombre',
                'maxlength' => 100,
                'class' => 'form-control-static',
            )
        ));

        $this->add(array(
            'name' => 'fecha',
            'type' => 'text',
            'options' => array(
                'label' => 'Fecha de la Operación: ',
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
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Ingresar Producto al Inventario',
                'class' => 'btn btn-primary',
            ),
        ));

        $this->add(array(
            'type' => 'Collection',
            'name' => 'productos',
            'options' => array(
                'Label' => 'Productos a ingresar en Inventario',
                'count' => 1,
                'should_create_template' => true,
                'allow_add' => true,
                'target_element' => array(
                    'type' => 'Almacen\Model\DetalleProductoEntity'
                ),
            ),
        ));

    }
}