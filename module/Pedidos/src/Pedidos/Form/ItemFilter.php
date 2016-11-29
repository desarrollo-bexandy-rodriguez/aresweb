<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 22/09/16
 * Time: 06:14 PM
 */

namespace Pedidos\Form;



use Zend\InputFilter\InputFilter;

class ItemFilter extends InputFilter
{

       /**
     * ItemFilter constructor.
     */
    public function __construct()
    {
        $this->add(array(
            'name' => 'cantidad',
            'required' => false,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'Float',
                    'options' => array(
                        'locale' => 'en_US',
                    ),
                ),
            ),
        ));

        $this->add(array(
            'name' => 'precio',
            'required' => false,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'Float',
                    'options' => array(
                        'locale' => 'en_US',
                    ),
                ),
            ),
        ));

        $this->add(array(
            'name' => 'subtotal',
            'required' => false,
            'validators' => array(
                array(
                    'name' => 'Float',
                    'options' => array(
                        'locale' => 'en_US',
                    ),
                ),
            ),
        ));


    }
}