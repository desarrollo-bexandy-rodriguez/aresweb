<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 27/11/16
 * Time: 07:55 PM
 */

namespace Almacen\Form;


use Almacen\Model\AlmacenMapper;
use Productos\Model\CategoriaMapper;
use Productos\Model\MarcaMapper;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Form\Form;
use Zend\Stdlib\Hydrator\ClassMethods;

class TrasladoLoteForm extends Form
{
    protected $categoriaMapper;
    protected $marcaMapper;
    protected $adapter;
    protected $almacenMapper;

    public function __construct(AdapterInterface $dbAdapter, CategoriaMapper $categoriaMapper, MarcaMapper $marcaMapper, AlmacenMapper $almacenMapper)
    {
        $this->adapter =$dbAdapter;
        $this->categoriaMapper = $categoriaMapper;
        $this->marcaMapper = $marcaMapper;
        $this->almacenMapper = $almacenMapper;

        parent::__construct('traslado-lote');

        $this
            ->setAttribute('method', 'post')
            ->setHydrator(new ClassMethods())
            ->setInputFilter(new TrasladoLoteFilter())
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
            'type' => 'Zend\Form\Element\Select',
            'name' => 'mayor',
            'options' => array(
                'label' => 'Mayor: ',
                'required' => false,
                'empty_option' => 'Seleccione un Almacén',
                'value_options' => $this->getAlmacenMayorForSelect(),
            ),
            'attributes' => array(
                'id' => 'mayor',
            )
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'detal',
            'options' => array(
                'label' => 'Detal: ',
                'required' => false,
                'empty_option' => 'Seleccione un Almacén',
                'value_options' => $this->getAlmacenDetalForSelect(),
            ),
            'attributes' => array(
                'id' => 'detal',
            )
        ));



        $this->add(array(
            'type' => 'Almacen\Form\TrasladoLoteCollectionFieldset',
            'options' => array(
                'use_as_base_fieldset' => true,
            ),
        ));


        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Trasladar Productos',
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

    public function getAlmacenMayorForSelect()
    {
        $almacenMapper = $this->almacenMapper;
        $almacen = $almacenMapper->getAlmacenMayor();
        $result    = $almacen->toArray();

        $selectData = array();

        foreach ($result as $res) {
            $selectData[$res['id']] = $res['nombre'];
        }
        return $selectData;
    }

    public function getAlmacenDetalForSelect()
    {
        $almacenMapper = $this->almacenMapper;
        $almacen = $almacenMapper->getAlmacenDetal();
        $result    = $almacen->toArray();

        $selectData = array();

        foreach ($result as $res) {
            $selectData[$res['id']] = $res['nombre'];
        }
        return $selectData;
    }
}