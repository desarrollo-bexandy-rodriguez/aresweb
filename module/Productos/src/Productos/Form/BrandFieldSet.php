<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 04/11/16
 * Time: 08:13 AM
 */

namespace Productos\Form;



use Productos\Model\Brand;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;

class BrandFieldSet extends Fieldset implements InputFilterProviderInterface
{
    public function __construct()
    {
        parent::__construct('brand');

        $this
            ->setHydrator(new ClassMethodsHydrator(false))
            ->setObject(new Brand())
        ;

        $this->add(array(
            'name' => 'name',
            'options' => array(
                'label' => 'Name of the brand',
            ),
            'attributes' => array(
                'required' => 'required',
            ),
        ));

        $this->add(array(
            'name' => 'url',
            'type' => 'Zend\Form\Element\Url',
            'options' => array(
                'label' => 'Website of the brand',
            ),
            'attributes' => array(
                'required' => 'required',
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