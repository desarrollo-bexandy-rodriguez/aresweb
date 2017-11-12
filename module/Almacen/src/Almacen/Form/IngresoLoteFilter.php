<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 27/11/16
 * Time: 12:22 AM
 */

namespace Almacen\Form;


use Zend\InputFilter\InputFilter;

class IngresoLoteFilter extends InputFilter
{
    public function __construct()
    {
        $this->add(array(
            'name' => 'categoria',
            'required' => false,
            'allowEmpty' => true,
        ));

        $this->add(array(
            'name' => 'marca',
            'required' => false,
            'allowEmpty' => true,
        ));

        $this->add(array(
            'name' => 'almacen',
            'required' => false,
            'allowEmpty' => true,
        ));
    }
}