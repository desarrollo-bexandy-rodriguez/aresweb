<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 16/10/16
 * Time: 12:11 AM
 */

namespace Application\Form;


use Zend\Form\Form;
use Zend\Stdlib\Hydrator\ClassMethods;

class UserForm extends Form
{


    /**
     * UserForm constructor.
     */
    public function __construct($name = null, $options = array())
    {
        parent::__construct('User');

        $this->setAttribute('method', 'post');
        //$this->setInputFilter(new PedidoFilter());
        $this->setHydrator(new ClassMethods());

        $this->add(array(
            'name' => 'username',
            'type' => 'text',
            'options' => array(
                'label' => 'Username: '
            ),
        ));

        $this->add(array(
            'name' => 'password',
            'type' => 'password',
            'options' => array(
                'label' => 'Password: '
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Submit',
                'class' => 'btn btn-primary',
            ),
        ));
    }
}