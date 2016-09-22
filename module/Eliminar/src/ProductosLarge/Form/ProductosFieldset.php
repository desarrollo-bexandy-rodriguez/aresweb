<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 18/09/16
 * Time: 09:29 AM
 */

namespace ProductosLarge\Form;


use ProductosLarge\Model\ProductosLarge;
use Zend\Form\Fieldset;
use Zend\Stdlib\Hydrator\ClassMethods;

class ProductosLargeFieldset extends Fieldset
{
    public function __construct($name = null, $options =array())
    {
        parent::__construct($name, $options);

        $this->setHydrator(new ClassMethods());
        $this->setObject(new ProductosLarge());

        $this->add(array(
            'type'  =>  'hidden',
            'name'  =>  'id',
        ));

        $this->add(array(
            'type'  =>  'text',
            'name'  =>  'idcategoria',
            'options'   =>  array(
                'label' =>  'ID Categoría',
            ),
        ));

        $this->add(array(
            'type'  =>  'text',
            'name'  =>  'nombre',
            'options'   =>  array(
                'label' =>  'Nombre del Producto',
            ),
        ));

        $this->add(array(
            'type'  =>  'text',
            'name'  =>  'unidadmedidaventas',
            'options'   =>  array(
                'label' =>  'ID Unidad de Medida (Ventas al Detal)',
            ),
        ));

        $this->add(array(
            'type'  =>  'text',
            'name'  =>  'preciounidad',
            'options'   =>  array(
                'label' =>  'Precio por Unidad',
            ),
        ));



        $this->add(array(
            'type'  =>  'text',
            'name'  =>  'unidadmedidaalmacen',
            'options'   =>  array(
                'label' =>  'ID Unidad de Medida (Almacen al _Mayor)',
            ),
        ));

        $this->add(array(
            'type'  =>  'text',
            'name'  =>  'imagen',
            'options'   =>  array(
                'label' =>  'Ruta de la Foto del Producto',
            ),
        ));

    }
}
