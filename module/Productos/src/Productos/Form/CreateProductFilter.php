<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 10/11/16
 * Time: 09:17 PM
 */

namespace Productos\Form;


use Zend\InputFilter\InputFilter;

class CreateProductFilter extends InputFilter
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
    }
}