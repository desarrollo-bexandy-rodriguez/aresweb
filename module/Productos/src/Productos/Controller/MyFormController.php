<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 04/11/16
 * Time: 08:27 AM
 */

namespace Productos\Controller;


use Productos\Form\CreateProduct;
use Productos\Model\Product;
use Zend\Mvc\Controller\AbstractActionController;

class MyFormController extends AbstractActionController
{
    public function indexAction()
    {
        $form = new CreateProduct();
        $product = new Product();



        $mapper = $this->getProductoMapper();
        $producto = $mapper->fetchAll(true);
        $arreglo = $producto->toArray();
        $prueba = count($arreglo);

        $form->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'categoria',
            'tabindex' =>2,
            'options' => array(
                'label' => 'Categoria: ',
                'empty_option' => 'Seleccione una Categoría',
                'value_options' => $this->getCategoryForSelect(),
            ),
            'attributes' => array(
                'id' => 'categoria',
            )
        ));

        $form->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'marca',
            'tabindex' =>3,
            'options' => array(
                'label' => 'Marca: ',
                'empty_option' => 'Seleccione una Marca',
                'value_options' => $this->getMarcaForSelect(),
            ),
            'attributes' => array(
                'id' => 'marca',
            )
        ));

        $form->getBaseFieldset()->get('collection')->populateValues($arreglo);
        $form->getBaseFieldset()->get('collection')->setOptions(array('count'=>$prueba));

        $form->bind($product);

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());

            if ($form->isValid()) {
                var_dump($product);
            }
        }

        return array(
            'form' => $form,
        );
    }

    public function getProductoMapper()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('ProductoMapper');
    }

    public function getCategoriaMapper()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('CategoriaMapper');
    }

    public function getMarcaMapper()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('MarcaMapper');
    }

    public function getCategoryForSelect()
    {

        $categoryMapper = $this->getCategoriaMapper();
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

        $marcaMapper = $this->getMarcaMapper();
        $marca = $marcaMapper->fetchAll();
        $result    = $marca->toArray();

        $selectData = array();

        foreach ($result as $res) {
            $selectData[$res['id']] = $res['nombre'];
        }
        return $selectData;
    }

    public function Categoria45Action()
    {
        $request = $this->getRequest();
        $response = $this->getResponse();

        $mapper = $this->getProductoMapper();
        $form = new CreateProduct();
        $product = new Product();

        if ($request->isPost()) {
            $post_data = $request->getPost();
            $cat_id = $post_data['categoria'];
            $marca_id = $post_data['marca'];

            if ($cat_id === "0") {
                if($productos = $mapper->fetchAll(true)){
                    $arreglo = $productos->toArray();
                    $response->setContent(\Zend\Json\Json::encode(array('response' => true, 'productos' => $arreglo, 'form' => $form)));
                } else {
                    $response->setContent(\Zend\Json\Json::encode(array('response' => false)));
                }

            } else {
                if ($productos = $mapper->getProductosCategoria($cat_id, true)){
                    $arreglo = $productos->toArray();
                    $response->setContent(\Zend\Json\Json::encode(array('response' => true, 'productos' => $arreglo)));
                }  else {
                    $response->setContent(\Zend\Json\Json::encode(array('response' => false)));
                }

            }

        } else {
            if ($productos = $mapper->fetchAll(true)){
                $arreglo = $productos->toArray();
                $response->setContent(\Zend\Json\Json::encode(array('response' => true, 'productos' => $arreglo)));
            } else {
                $response->setContent(\Zend\Json\Json::encode(array('response' => false)));
            }
        }

        return $response;
    }

    public function CategoriaAction()
    {
        $request = $this->getRequest();
        $response = $this->getResponse();

        $mapper = $this->getProductoMapper();
        $form = new CreateProduct();
        $product = new Product();

        if ($request->isPost()) {
            $post_data = $request->getPost();
            $cat_id = $post_data['categoria'];
            $marca_id = $post_data['marca'];

            if ($productos = $mapper->getProductosFiltro($cat_id, $marca_id)) {
                $arreglo = $productos->toArray();
                $response->setContent(\Zend\Json\Json::encode(array('response' => true, 'productos' => $arreglo)));
            } else {
                $response->setContent(\Zend\Json\Json::encode(array('response' => false)));
            }


            return $response;
        }
    }
}