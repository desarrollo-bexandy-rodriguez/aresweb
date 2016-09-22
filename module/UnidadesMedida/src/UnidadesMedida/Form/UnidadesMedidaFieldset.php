<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 18/09/16
 * Time: 09:29 AM
 */

namespace UnidadesMedida\Form;


use UnidadesMedida\Model\UnidadesMedida;
use Zend\Form\Fieldset;
use Zend\Stdlib\Hydrator\ClassMethods;

class UnidadesMedidaFieldset extends Fieldset
{
    public function __construct($name = null, $options =array())
    {
        parent::__construct($name, $options);

        $this->setHydrator(new ClassMethods());
        $this->setObject(new UnidadesMedida());

        $this->add(array(
            'type'  =>  'hidden',
            'name'  =>  'id',
        ));

        $this->add(array(
            'type'  =>  'text',
            'name'  =>  'nombre',
            'options'   =>  array(
                'label' =>  'Nombre de la Unidad de Medida',
            ),
        ));

        $this->add(array(
            'type'  =>  'text',
            'name'  =>  'abreviatura',
            'options'   =>  array(
                'label' =>  'Abreviatura de la Unidad de Medida',
            ),
        ));

        $this->add(array(
            'type'  =>  'text',
            'name'  =>  'simbolo',
            'options'   =>  array(
                'label' =>  'Simbolo de la Unidad de Medida',
            ),
        ));

    }
}
