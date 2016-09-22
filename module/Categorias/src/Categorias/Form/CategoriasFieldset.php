<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 18/09/16
 * Time: 09:29 AM
 */

namespace Categorias\Form;


use Categorias\Model\Categorias;
use Zend\Form\Fieldset;
use Zend\Stdlib\Hydrator\ClassMethods;

class CategoriasFieldset extends Fieldset
{
    public function __construct($name = null, $options =array())
    {
        parent::__construct($name, $options);

        $this->setHydrator(new ClassMethods());
        $this->setObject(new Categorias());

        $this->add(array(
            'type'  =>  'hidden',
            'name'  =>  'id',
        ));

        $this->add(array(
            'type'  =>  'text',
            'name'  =>  'nombre',
            'options'   =>  array(
                'label' =>  'Nombre del Categoria',
            ),
        ));

        $this->add(array(
            'type'  =>  'text',
            'name'  =>  'imagen',
            'options'   =>  array(
                'label' =>  'Ruta de la Foto del Categoria',
            ),
        ));

    }
}
