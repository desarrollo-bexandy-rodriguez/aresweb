<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 26/11/16
 * Time: 11:05 AM
 */

namespace Almacen\Controller;


use Almacen\Model\DisponibilidadAlmacenEntity;
use Almacen\Model\IngresoEntity;
use Almacen\Model\IngresoProductoLoteCollectionEntity;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IngresoController extends AbstractActionController
{
    public function indexAction()
    {
        $form = $this->getIngresoLoteForm();
        $productoCollection = new IngresoProductoLoteCollectionEntity();
        $mapper = $this->getProductoMapper();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $form->bind($productoCollection);
                $producto = $request->getPost()->get('ingreso-producto-lote-collection');
                $coleccion = $producto['collection'];

                foreach($coleccion as $item)
                {
                    if ($item['actualizado']==='actualizado')
                    {
                        $disponibilidadAlmacen = $this->getIngresoMapper()->existeRegistro('1',$item['id']);

                        if ($disponibilidadAlmacen) {
                            $cantAnterior = $disponibilidadAlmacen->getCantidad();
                            $disponibilidadAlmacen->setCantidad($cantAnterior + $item['cantidad']);
                            $this->getIngresoMapper()->actualizarDisponibilidadAlmacen($disponibilidadAlmacen);
                        } else {
                            $disponibilidadAlmacen = new DisponibilidadAlmacenEntity();
                            $disponibilidadAlmacen->setProducto($item['id']);
                            $disponibilidadAlmacen->setAlmacen('1');
                            $disponibilidadAlmacen->setCantidad($item['cantidad']);

                            $this->getIngresoMapper()->actualizarDisponibilidadAlmacen($disponibilidadAlmacen);
                        }

                        $ingreso = new IngresoEntity();
                        $ingreso->setIdalmacen('1');
                        $ingreso->setCantidad($item['cantidad']);
                        $ingreso->setFecha(date('Y-m-d'));
                        $ingreso->setIdproducto($item['id']);

                        $this->getIngresoMapper()->saveIngresoProducto($ingreso);
                    }
                }

                echo ("<script type='text/javascript' >alert('Los productos fueron ingresados');</script>");

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
        $form->get('almacen')->setValue('1');

        $form->bind($productoCollection);


        return new ViewModel(array(
            'form' => $form
        ));

    }

    public function getProductoMapper()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('ProductoMapper');
    }

    public function getIngresoMapper()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('IngresoMapper');
    }

    public function getIngresoLoteForm()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('IngresoLoteForm');
    }

    public function filtroAction()
    {
        $request = $this->getRequest();
        $response = $this->getResponse();
        $mapper = $this->getProductoMapper();

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