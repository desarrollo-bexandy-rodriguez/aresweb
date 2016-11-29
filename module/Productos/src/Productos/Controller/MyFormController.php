<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 04/11/16
 * Time: 08:27 AM
 */

namespace Productos\Controller;


use Productos\Model\Product;
use Zend\Mvc\Controller\AbstractActionController;

class MyFormController extends AbstractActionController
{
    public function indexAction()
    {
        $form = $this->getCreateProductForm();
        $product = new Product();
        $mapper = $this->getProductoMapper();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $form->bind($product);
                $producto = $request->getPost()->get('product');
                $coleccion = $producto['collection'];

                foreach($coleccion as $item)
                {
                    if ($item['actualizado']==='actualizado')
                    {
                        $mapper->updatePrecio($item['id'], $item['preciounidad'], date('Y-m-d'));
                    }
                }

                echo ("<script type='text/javascript' >alert('Los productos fueron actualizados');</script>");

                return $this->redirect()->toRoute('application/default', array('controller' => 'index','action'=>'admin'));
            }
        }

        /*
        $producto = $mapper->fetchAll(true);
        $arreglo = $producto->toArray();
        $prueba = count($arreglo);

        $form->getBaseFieldset()->get('collection')->setOptions(array('count'=>$prueba));
        $form->getBaseFieldset()->get('collection')->populateValues($arreglo);
*/

        $form->bind($product);



        return array(
            'form' => $form,
        );
    }

    public function getProductoMapper()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('ProductoMapper');
    }

     public function getCreateProductForm()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('CreateProduct');
    }

    public function CategoriaAction()
    {
        $request = $this->getRequest();
        $response = $this->getResponse();

        $mapper = $this->getProductoMapper();
        $form = $this->getCreateProductForm();
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