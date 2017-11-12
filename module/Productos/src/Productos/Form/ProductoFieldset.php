<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 21/11/16
 * Time: 08:34 PM
 */

namespace Productos\Form;


use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Stdlib\Hydrator\ClassMethods;

class ProductoFieldset extends Fieldset implements InputFilterAwareInterface
{
    protected $inputFilter;

    public function __construct($name = null, $options = array())
    {
        parent::__construct('producto');

        $this->setAttribute('method', 'post');
        $this->setInputFilter(new ProductoFilter());
        $this->setHydrator(new ClassMethods());


        $this->add(array(
            'name' => 'id',
            'type' => 'hidden',
            'attributes' => array(
                'id' => 'id',
            )
        ));

        $this->add(array(
            'name' => 'idcategoria',
            'type' => 'hidden',
            'attributes' => array(
                'id' => 'idcategoria',
            )
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
                'class' => 'form-control',
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
                'required' => true,
                'maxlength' => 100,
                'class' => 'form-control',
            )
        ));

        $this->add(array(
            'name' => 'unidadmedidaventas',
            'type' => 'hidden',
            'attributes' => array(
                'id' => 'unidadmedidaventas',
            )
        ));

        $this->add(array(
            'name' => 'nombunidmedventas',
            'type' => 'text',
            'options' => array(
                'label' => 'Ventas al Detal',
            ),
            'attributes' => array(
                'id' => 'nombunidmedventas',
                'maxlength' => 100,
                'readonly' => true,
                'disabled' => true,
                'class' => 'form-control',
            )
        ));

        $this->add(array(
            'name' => 'unidadmedidaalmacen',
            'type' => 'hidden',
            'attributes' => array(
                'id' => 'unidadmedidaalmacen',
            )
        ));


        $this->add(array(
            'name' => 'nombunidmedalmacen',
            'type' => 'text',
            'options' => array(
                'label' => 'Almacen al Mayor',
            ),
            'attributes' => array(
                'id' => 'nombunidmedalmacen',
                'maxlength' => 100,
                'readonly' => true,
                'disabled' => true,
                'class' => 'form-control',
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
                'required' => true,
                'maxlength' => 100,
                'class' => 'form-control'
            )
        ));

        $this->add(array(
            'type'  =>  'hidden',
            'name'  =>  'imagen',
            'options'   =>  array(
                'label' =>  'Ruta de la Foto del Producto',
            ),
            'attributes' => array(
                'id' => 'imagen',
                'maxlength' => 100,
                'class' => 'form-control',
            )
        ));

        $this->add(array(
            'name' => 'idmarca',
            'type' => 'hidden',
            'attributes' => array(
                'id' => 'idmarca',
            )
        ));


        $this->add(array(
            'name' => 'nombmarca',
            'type' => 'text',
            'options' => array(
                'label' => 'Marca del Producto',
            ),
            'attributes' => array(
                'id' => 'nombmarca',
                'maxlength' => 100,
                'readonly' => true,
                'disabled' => true,
                'class' => 'form-control',
            )
        ));

        $this->add(array(
            'name' => 'relacionunidad',
            'type' => 'text',
            'options' => array(
                'label' => 'Constante de Conversión',
            ),
            'attributes' => array(
                'id' => 'relacionunidad',
                'required'=>true,
                'maxlength' => 100,
                'class' => 'form-control',
            )
        ));

        $this->add(array(
            'name' => 'vencimiento',
            'type' => 'text',
            'options' => array(
                'label' => 'Fecha de Vencimiento',
            ),
            'attributes' => array(
                'id' => 'vencimiento',
                'required'=> false,
                'maxlength' => 100,
                'class' => 'form-control',
            )
        ));

        $this->add(array(
            'name' => 'codpremium',
            'type' => 'text',
            'options' => array(
                'label' => 'Código Premium',
            ),
            'attributes' => array(
                'id' => 'codpremium',
                'maxlength' => 100,
                'required' => false,
                'class' => 'form-control',
            )
        ));
    }

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        $this->inputFilter = $inputFilter;
    }

    public function getInputFilter()
    {
        return $this->inputFilter;
    }
}