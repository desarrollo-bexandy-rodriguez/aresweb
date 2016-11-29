<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 27/11/16
 * Time: 07:54 PM
 */

namespace Almacen\Controller;


use Almacen\Model\DisponibilidadAlmacenEntity;
use Almacen\Model\DisponibilidadProductoEntity;
use Almacen\Model\IngresoEntity;
use Almacen\Model\MovimientoEntity;
use Almacen\Model\TrasladoLoteCollectionEntity;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class TrasladoController extends AbstractActionController
{
    public function indexAction()
    {
        $form = $this->getTrasladoLoteForm();
        $productoCollection = new TrasladoLoteCollectionEntity();
        $mapper = $this->getProductoMapper();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $form->bind($productoCollection);
                $producto = $request->getPost()->get('traslado-lote-collection');
                $idAlmacenMayor = $request->getPost()->get('mayor');
                $idAlmacenDetal = $request->getPost()->get('detal');
                $coleccion = $producto['collection'];

                foreach($coleccion as $item)
                {
                    if ($item['actualizado']==='actualizado')
                    {
                        $almacenMayor = $this->getIngresoMapper()->existeRegistro($idAlmacenMayor,$item['idproducto']);

                        if ($almacenMayor) {
                            $cantAnterior = $almacenMayor->getCantidad();
                            if (!(is_null($cantAnterior) || $cantAnterior === 0)){
                                $almacenMayor->setCantidad($cantAnterior - $item['cantidad']);
                                $this->getIngresoMapper()->actualizarDisponibilidadAlmacen($almacenMayor);
                            }
                        }

                        $almacenDetal = $this->getIngresoMapper()->existeRegistro($idAlmacenDetal,$item['idproducto']);

                        $producto = $this->getProductoMapper()->getProducto($item['idproducto'],true);


                        if ($almacenDetal) {
                            $cantAnterior = $almacenDetal->getCantidad();
                            $conversion = $item['cantidad'] * $producto->getRelacionunidad();
                            $almacenDetal->setCantidad($cantAnterior + $conversion);
                            $this->getIngresoMapper()->actualizarDisponibilidadAlmacen($almacenDetal);
                        } else {
                            $almacenDetal = new DisponibilidadAlmacenEntity();
                            $almacenDetal->setProducto($item['idproducto']);
                            $almacenDetal->setAlmacen($idAlmacenDetal);
                            $conversion = $item['cantidad'] * $producto->getRelacionunidad();
                            $almacenDetal->setCantidad( $conversion);
                            $almacenDetal->setReservado('0');
                            $this->getIngresoMapper()->actualizarDisponibilidadAlmacen($almacenDetal);
                        }

                        $movimiento = new MovimientoEntity();
                        $movimiento->setIdalmacenmayor($idAlmacenMayor);
                        $movimiento->setIdalmacendetal($idAlmacenDetal);
                        $movimiento->setIdproducto($item['idproducto']);
                        $movimiento->setCantidad($item['cantidad']);
                        $movimiento->setFecha(date('Y-m-d'));
                        if ($this->zfcUserAuthentication()->hasIdentity()) {
                            $userId = $this->zfcUserAuthentication()->getIdentity()->getId();
                        }
                        $movimiento->setIdusuario($userId);

                        $this->getMovimientoMapper()->saveMovimiento($movimiento);

                        $disponibilidadProducto = new DisponibilidadProductoEntity();
                        $disponibilidadProducto->setIdproducto($item['idproducto']) ;
                        $disponibilidadProducto->setDisponible(true);
                        $this->getDisponibilidadMapper()->actualizarProducto($disponibilidadProducto);
                    }
                }

                echo ("<script type='text/javascript' >alert('Los productos fueron ingresados');</script>");

                return $this->redirect()->toRoute('application/default', array('controller' => 'index','action'=>'admin'));
            }
        }


                $producto = $mapper->getProductosTraslado();
                $arreglo = $producto->toArray();
                $prueba = count($arreglo);

                $form->getBaseFieldset()->get('collection')->setOptions(array('count'=>$prueba));
                $form->getBaseFieldset()->get('collection')->populateValues($arreglo);

        $form->get('mayor')->setValue('1');
        $form->get('detal')->setValue('2');

        $form->bind($productoCollection);


        return new ViewModel(array(
            'form' => $form
        ));
    }

    public function getDisponibilidadMapper()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('DisponibilidadMapper');
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

    public function getMovimientoMapper()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('MovimientoMapper');
    }

    public function getTrasladoLoteForm()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('TrasladoLoteForm');
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

            if ($productos = $mapper->getProductosTrasladoFiltro($cat_id, $marca_id)) {
                $arreglo = $productos->toArray();
                $response->setContent(\Zend\Json\Json::encode(array('response' => true, 'productos' => $arreglo)));
            } else {
                $response->setContent(\Zend\Json\Json::encode(array('response' => false)));
            }


            return $response;
        }
    }
}