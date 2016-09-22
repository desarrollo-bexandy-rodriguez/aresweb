<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 20/09/16
 * Time: 05:30 PM
 */

namespace Productos\Form;

use Zend\Form\Form;
use Zend\Stdlib\Hydrator\ClassMethods;

class ProductoForm extends Form
{
    public function __construct($name = null, $options = array())
    {
        parent::__construct('producto');

        $this->setAttribute('method', 'post');
        $this->setInputFilter(new ProductoFilter());
        $this->setHydrator(new ClassMethods());

        $this->add(array(
            'name' => 'id',
            'type' => 'hidden',
        ));

        $this->add(array(
            'name' => 'idcategoria',
            'type' => 'hidden',
        ));

        $this->add(array(
            'name' => 'nombcategoria',
            'type' => 'text',
            'options' => array(
                'label' => 'Categoría',
            ),
            'attributes' => array(
                'id' => 'nombcategoria',
                'maxlength' => 100,
                'readonly' => true,
                'disabled' => true,
                'class' => 'form-control-static',
            )
        ));

        $this->add(array(
            'name' => 'nombre',
            'type' => 'text',
            'options' => array(
                'label' => 'Nombre del Producto',
            ),
            'attributes' => array(
                'id' => 'nombre',
                'maxlength' => 100,
            )
        ));

        $this->add(array(
            'name' => 'unidadmedidaventas',
            'type' => 'hidden',
        ));

        $this->add(array(
            'name' => 'nombunidmedventas',
            'type' => 'text',
            'options' => array(
                'label' => 'Unidad de Medida (Ventas al Detal)',
            ),
            'attributes' => array(
                'id' => 'nombunidmedventas',
                'maxlength' => 100,
                'readonly' => true,
                'disabled' => true,
                'class' => 'form-control-static',
            )
        ));

        $this->add(array(
            'name' => 'unidadmedidaalmacen',
            'type' => 'hidden',
        ));


        $this->add(array(
            'name' => 'nombunidmedalmacen',
            'type' => 'text',
            'options' => array(
                'label' => 'Unidad de Medida (Almacen al _Mayor)',
            ),
            'attributes' => array(
                'id' => 'nombunidmedalmacen',
                'maxlength' => 100,
                'readonly' => true,
                'disabled' => true,
                'class' => 'form-control-static',
            )
        ));

        $this->add(array(
            'name' => 'preciounidad',
            'type' => 'text',
            'options' => array(
                'label' => 'Precio por Unidad',
            ),
            'attributes' => array(
                'id' => 'nombre',
                'maxlength' => 100,
            )
        ));

        $this->add(array(
            'type'  =>  'text',
            'name'  =>  'imagen',
            'options'   =>  array(
                'label' =>  'Ruta de la Foto del Producto',
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