<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 04/11/16
 * Time: 08:19 AM
 */

namespace Productos\Form;

use Productos\Model\Product;
use Zend\Di\ServiceLocator;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;

class ProductFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct()
    {
        parent::__construct('product');

        $this
            ->setHydrator(new ClassMethodsHydrator(false))
            ->setObject(new Product())
        ;


        $this->add(array(
            'name' => 'name',
            'options' => array(
                'label' => 'Name of the product',
            ),
            'attributes' => array(
                'required' => 'required',
            ),
        ));

        $this->add(array(
            'name' => 'price',
            'options' => array(
                'label' => 'Price of the product',
            ),
            'attributes' => array(
                'required' => 'required',
            ),
        ));

        $this->add(array(
            'type' => 'Productos\Form\BrandFieldSet',
            'name' => 'brand',
            'options' => array(
                'label' => 'Brand of the product',
            ),
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Collection',
            'name' => 'collection',
            'options' => array(
                'label' => 'Productos Disponibles',
                'count' => 2,
                'should_create_template' => true,
                'template_placeholder' => '__placeholder__',
                'allow_add' => true,
                'target_element' => array(
                    'type' => 'Productos\Form\PrecioProductoFieldset',
                ),
            ),
        ));
    }

    /**
     * Should return an array specification compatible with
     * {@link Zend\InputFilter\Factory::createInputFilter()}.
     *
     * @return array
     */
    public function getInputFilterSpecification()
    {
        return array(
            'name' => array(
                'required' => true,
            ),
            'price' => array(
                'required' => true,
                'validators' => array(
                    array(
                        'name' => 'Float',
                    ),
                ),
            ),
        );
    }
}