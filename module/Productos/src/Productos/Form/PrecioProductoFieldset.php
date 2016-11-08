<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 04/11/16
 * Time: 08:17 AM
 */

namespace Productos\Form;

use Productos\Model\PrecioProducto;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;

class PrecioProductoFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct()
    {
        parent::__construct('collection');

        $this
            ->setHydrator(new ClassMethodsHydrator(false))
            ->setObject(new PrecioProducto())
        ;

        $this->add(array(
            'name' => 'nombcategoria',
            'type' => 'text',
            'attributes' => array(
                'readonly' => true,
                'disabled' => true,
            ),
        ));

        $this->add(array(
            'name' => 'nombmarca',
            'type' => 'text',
            'attributes' => array(
                'readonly' => true,
                'disabled' => true,
            ),
        ));

        $this->add(array(
            'name' => 'id',
            'type' => 'hidden',
        ));

        $this->add(array(
            'name' => 'nombre',
            'type' => 'text',
            'attributes' => array(
                'size' => 60,
                'maxlength' => 100,
                'readonly' => true,
                'disabled' => true,
            ),
        ));

        $this->add(array(
            'name' => 'preciounidad',
            'type' => 'text',
            'options' => array(
                'label' => 'Precio',
            ),
        ));

    }



/**
 * @return array
 */
    public function getInputFilterSpecification()
    {
        return array(
            'name' => array(
                'required' => true,
            ),
        );
    }
}