<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 04/11/16
 * Time: 08:21 AM
 */

namespace Productos\Form;


use Productos\Model\CategoriaMapper;
use Productos\Model\MarcaMapper;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Form\Form;
use Zend\InputFilter\InputFilter;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;

class CreateProduct extends Form
{
    protected $categoriaMapper;
    protected $marcaMapper;
    protected $adapter;

    public function __construct(AdapterInterface $dbAdapter, CategoriaMapper $categoriaMapper, MarcaMapper $marcaMapper)
    {
        $this->adapter =$dbAdapter;
        $this->categoriaMapper = $categoriaMapper;
        $this->marcaMapper = $marcaMapper;

        parent::__construct('create_product');

        $this
            ->setAttribute('method', 'post')
            ->setHydrator(new ClassMethodsHydrator(false))
            ->setInputFilter(new CreateProductFilter())
        ;

        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'categoria',
            'options' => array(
                'label' => 'Categoria: ',
                'required' => false,
                'empty_option' => 'Seleccione una Categoría',
                'value_options' => $this->getCategoryForSelect(),
            ),
            'attributes' => array(
                'id' => 'categoria',
            )
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'marca',
            'options' => array(
                'label' => 'Marca: ',
                'required' => false,
                'empty_option' => 'Seleccione una Marca',
                'value_options' => $this->getMarcaForSelect(),
            ),
            'attributes' => array(
                'id' => 'marca',
            )
        ));


        $this->add(array(
            'type' => 'Productos\Form\ProductFieldset',
            'options' => array(
                'use_as_base_fieldset' => true,
            ),
        ));


        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Cambiar Precios',
                'class' => 'btn btn-primary'
            ),
        ));
    }


    public function getCategoryForSelect()
    {

        $categoryMapper = $this->categoriaMapper;
        $category = $categoryMapper->fetchAll();
        $result    = $category->toArray();

        $selectData = array();

        foreach ($result as $res) {
            $selectData[$res['id']] = $res['nombre'];
        }
        return $selectData;
    }

    public function getMarcaForSelect()
    {

        $marcaMapper = $this->marcaMapper;
        $marca = $marcaMapper->fetchAll();
        $result    = $marca->toArray();

        $selectData = array();

        foreach ($result as $res) {
            $selectData[$res['id']] = $res['nombre'];
        }
        return $selectData;
    }

}