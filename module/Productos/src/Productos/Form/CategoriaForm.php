<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 21/09/16
 * Time: 08:43 AM
 */

namespace Productos\Form;


use Zend\Form\Form;
use Zend\Stdlib\Hydrator\ClassMethods;

class CategoriaForm extends Form
{
    public function __construct($name = null, $options = array())
    {
        parent::__construct('categoria');

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
                'label' =>  'Nombre de la Categoria',
            ),
        ));

        $this->add(array(
            'type'  =>  'text',
            'name'  =>  'imagen',
            'options'   =>  array(
                'label' =>  'Ruta de la Foto del Categoria',
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