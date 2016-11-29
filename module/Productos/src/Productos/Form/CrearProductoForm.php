<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 21/11/16
 * Time: 05:35 PM
 */

namespace Productos\Form;


use Productos\Model\CategoriaMapper;
use Productos\Model\MarcaMapper;
use Productos\Model\UnidadMedidaMapper;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Form\Form;
use Zend\Stdlib\Hydrator\ClassMethods;

class CrearProductoForm extends Form
{
    protected $adapter;
    protected $categoriaMapper;
    protected $marcaMapper;
    protected $unidadMedida;

    public function __construct(AdapterInterface $dbAdapter, CategoriaMapper $categoriaMapper, MarcaMapper $marcaMapper, UnidadMedidaMapper $unidadMedida)
    {
        $this->adapter =$dbAdapter;
        $this->categoriaMapper = $categoriaMapper;
        $this->marcaMapper = $marcaMapper;
        $this->unidadMedida = $unidadMedida;

        parent::__construct('crear-producto');

        $this
            ->setAttribute('method', 'post')
            ->setAttribute('enctype','multipart/form-data')
            ->setHydrator(new ClassMethods(false))

        ;

        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'categoria',
            'options' => array(
                'label' => 'Categoria: ',
                'required' => true,
                'empty_option' => 'Seleccione una Categoría',
                'value_options' => $this->getCategoryForSelect(),
            ),
            'attributes' => array(
                'id' => 'categoria',
                'class' => 'form-control',
            )
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'marca',
            'options' => array(
                'label' => 'Marca: ',
                'required' => true,
                'empty_option' => 'Seleccione una Marca',
                'value_options' => $this->getMarcaForSelect(),
            ),
            'attributes' => array(
                'id' => 'marca',
                'class' => 'form-control',
            )
        ));

        $this->add(array(
            'type' => 'radio',
            'name' => 'mayor',
            'options' => array(
                'label' => 'Unid. Medida Mayor:',
                'value_options' => $this->getMedidaForSelect(),
            ),
            'attributes' => array(
                'id' => 'mayor',
                'class' => 'radio-inline form-control ui-checkboxradio',
            )
        ));

        $this->add(array(
            'type' => 'radio',
            'name' => 'detal',
            'options' => array(
                'label' => 'Unid. Medida Detal:',
                'value_options' => $this->getMedidaForSelect(),
            ),
            'attributes' => array(
                'id' => 'detal',
                'class' => 'radio-inline form-control ui-checkboxradio',
            )
        ));


        $this->add(array(
            'name'  =>  'producto',
            'type'  =>  'Productos\Form\ProductoFieldset',
            'options' =>    array(
                'use_as_base_fieldset' => true,
            ),
        ));

        $this->add(array(
            'type'  =>  'submit',
            'name'  =>  'submit',
            'attributes'   =>  array(
                'value' =>  'Crear Producto',
                'class' => 'btn btn-primary',
            ),
        ));

        $this->add(array(
            'name' => 'fileupload',
            'attributes' => array(
                'type'  => 'file',
                'id' => 'fileupload',
            ),
            'options' => array(
                'label' => 'File Upload',
                'ignoreNoFile' => true,
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

    public function getMedidaForSelect()
    {

        $marcaMapper = $this->unidadMedida;
        $medida = $marcaMapper->fetchAll();
        $result    = $medida->toArray();

        $selectData = array();

        foreach ($result as $res) {
            $selectData[$res['id']] = $res['nombre'];
        }
        return $selectData;
    }
}