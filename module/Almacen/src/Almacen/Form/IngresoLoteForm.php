<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 26/11/16
 * Time: 11:06 AM
 */

namespace Almacen\Form;


use Almacen\Model\AlmacenMapper;
use Productos\Model\CategoriaMapper;
use Productos\Model\MarcaMapper;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Form\Form;
use Zend\Stdlib\Hydrator\ClassMethods;

class IngresoLoteForm extends Form
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

        parent::__construct('ingreso-lote');

        $this
            ->setAttribute('method', 'post')
            ->setHydrator(new ClassMethods())
            ->setInputFilter(new IngresoLoteFilter())
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
            'name' => 'almacen',
            'options' => array(
                'label' => 'Almacen Mayor: ',
                'required' => false,
                'empty_option' => 'Seleccione un Almacén',
                'value_options' => $this->getAlmacenForSelect(),
            ),
            'attributes' => array(
                'id' => 'almacen',
            )
        ));

        $this->add(array(
            'type' => 'Almacen\Form\IngresoProductoLoteCollectionFieldset',
            'options' => array(
                'use_as_base_fieldset' => true,
            ),
        ));


        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Ingresar Productos',
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

    public function getAlmacenForSelect()
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

}