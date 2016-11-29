<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 09/10/16
 * Time: 09:56 AM
 */

namespace Despacho\Controller;


use Almacen\Model\DisponibilidadAlmacenEntity;
use Almacen\Model\DisponibilidadProductoEntity;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    protected $userMapper;

    public function indexAction()
    {
        $id = $this->params('id');
        $mapper = $this->getPedidoMapper();
        $itemMapper = $this->getItemMapper();

        $pedidosDespacho = $mapper->fetchAllEstatus(array('3'));

        $despachadores = $this->listarDespachadores();
        $listaNombDespachador = $this->extraerNombres($despachadores);

        $request = $this->getRequest();
        if ($request->isPost()) {
            $idpedido = $request->getPost()->get('idpedido');
            $idpedido1 = $request->getPost()->get('idpedido1');
            $idpedido2 = $request->getPost()->get('idpedido2');
            $idpedido3 = $request->getPost()->get('idpedido3');
            $idpedido4 = $request->getPost()->get('idpedido4');
            $panel1 = $request->getPost()->get('panel1');
            $panel2 = $request->getPost()->get('panel2');
            $panel3 = $request->getPost()->get('panel3');
            $panel4 = $request->getPost()->get('panel4');
            $accion = $request->getPost()->get('submit');
            $asignado = false;

            $pedidoMapper = $this->getPedidoMapper();

            $pedido1 = array();
            $items1 = array();
            $pedido2 = array();
            $items2 = array();
            $pedido3 = array();
            $items3 = array();
            $pedido4 = array();
            $items4 = array();

                        if (in_array($accion, $listaNombDespachador)) {
                switch ($accion) {
                    case $listaNombDespachador[0]:
                        if ($panel1 != 'Ocupado') {
                            $idpedido1 = $idpedido;
                            $panel1 = 'Ocupado';
                            $pedido = $mapper->getPedido($idpedido1);
                            $pedido->setEstatus(3);
                            $despachador = $despachadores[0];
                            $idDespachador = $despachador->getId();
                            $nombDespachador = $despachador->getDisplayName();
                            $pedido->setDespachador($idDespachador);
                            $mapper->savePedido($pedido);
                        } else {
                            $despachador = $despachadores[0];
                            $nombDespachador = utf8_encode($despachador->getDisplayName());
                            echo "<script type='text/javascript'> alert('$nombDespachador ya esta atendiendo un pedido.')</script>";
                        }
                        break;
                    case $listaNombDespachador[1]:
                        if ($panel2 != 'Ocupado') {
                            $idpedido2 = $idpedido;
                            $panel2 = 'Ocupado';
                            $asignado = true;
                            $pedido = $mapper->getPedido($idpedido2);
                            $pedido->setEstatus(3);
                            $despachador = $despachadores[1];
                            $idDespachador = $despachador->getId();
                            $pedido->setDespachador($idDespachador);
                            $mapper->savePedido($pedido);
                        } else {
                            $despachador = $despachadores[1];
                            $nombDespachador = utf8_encode($despachador->getDisplayName());
                            echo "<script type='text/javascript'> alert('$nombDespachador ya esta atendiendo un pedido.')</script>";
                        }
                        break;
                    case $listaNombDespachador[2]:
                        if ($panel3 != 'Ocupado') {
                            $idpedido3 = $idpedido;
                            $panel3 = 'Ocupado';
                            $asignado = true;
                            $pedido = $mapper->getPedido($idpedido3);
                            $pedido->setEstatus(3);
                            $despachador = $despachadores[2];
                            $idDespachador = $despachador->getId();
                            $pedido->setDespachador($idDespachador);
                            $mapper->savePedido($pedido);
                        } else {
                            $despachador = $despachadores[2];
                            $nombDespachador = utf8_encode($despachador->getDisplayName());
                            echo "<script type='text/javascript'> alert('$nombDespachador ya esta atendiendo un pedido.')</script>";
                        }
                        break;
                    case $listaNombDespachador[3]:
                        if (($panel4 != 'Ocupado') && !($asignado)) {
                            $idpedido4 = $idpedido;
                            $panel4 = 'Ocupado';
                            $asignado = true;
                            $pedido = $mapper->getPedido($idpedido4);
                            $pedido->setEstatus(3);
                            $despachador = $despachadores[3];
                            $idDespachador = $despachador->getId();
                            $pedido->setDespachador($idDespachador);
                            $mapper->savePedido($pedido);
                        } else {
                            $despachador = $despachadores[3];
                            $nombDespachador = utf8_encode($despachador->getDisplayName());
                            echo "<script type='text/javascript'> alert('$nombDespachador ya esta atendiendo un pedido.')</script>";
                        }
                        break;
                }
            }

            if ($accion === 'Finalizar') {
                $idfinalizado = $request->getPost()->get('idfinalizado');

                if ($idfinalizado === 'panel1') {
                    $this->finalizarPedido($idpedido1);
                    $panel1 = null;
                    $idpedido1 = null;
                }

                if ($idfinalizado === 'panel2') {
                    $this->finalizarPedido($idpedido2);
                    $panel2 = null;
                    $idpedido2 = null;
                }

                if ($idfinalizado === 'panel3') {
                    $this->finalizarPedido($idpedido3);
                    $panel3 = null;
                    $idpedido3 = null;
                }

                if ($idfinalizado === 'panel4') {
                    $this->finalizarPedido($idpedido4);
                    $panel4 = null;
                    $idpedido4 = null;
                }
            }

            if ($accion === 'Eliminar') {
                $idfinalizado = $request->getPost()->get('idfinalizado');

                if ($idfinalizado === 'panel1') {
                    $this->eliminarPedido($idpedido1);
                    $panel1 = null;
                    $idpedido1 = null;
                }

                if ($idfinalizado === 'panel2') {
                    $this->eliminarPedido($idpedido2);
                    $panel2 = null;
                    $idpedido2 = null;
                }

                if ($idfinalizado === 'panel3') {
                    $this->eliminarPedido($idpedido3);
                    $panel3 = null;
                    $idpedido3 = null;
                }

                if ($idfinalizado === 'panel4') {
                    $this->eliminarPedido($idpedido4);
                    $panel4 = null;
                    $idpedido4 = null;
                }
            }

            if ($accion === 'Descartar') {
                $idfinalizado = $request->getPost()->get('idfinalizado');

                if ($idfinalizado === 'panel1') {
                    $this->descartarPedido($idpedido1);
                    $panel1 = null;
                    $idpedido1 = null;
                }

                if ($idfinalizado === 'panel2') {
                    $this->descartarPedido($idpedido2);
                    $panel2 = null;
                    $idpedido2 = null;
                }

                if ($idfinalizado === 'panel3') {
                    $this->descartarPedido($idpedido3);
                    $panel3 = null;
                    $idpedido3 = null;
                }

                if ($idfinalizado === 'panel4') {
                    $this->descartarPedido($idpedido4);
                    $panel4 = null;
                    $idpedido4 = null;
                }
            }

            if (!is_null($idpedido1) && !empty($idpedido1)) {
                $pedido1 = $pedidoMapper->getPedido($idpedido1);
                $items1 = $itemMapper->getItemsPedido($idpedido1);
            }

            if (!is_null($idpedido2) && !empty($idpedido2)) {
                $pedido2 = $pedidoMapper->getPedido($idpedido2);
                $items2 = $itemMapper->getItemsPedido($idpedido2);
            }

            if (!is_null($idpedido3) && !empty($idpedido3)) {
                $pedido3 = $pedidoMapper->getPedido($idpedido3);
                $items3 = $itemMapper->getItemsPedido($idpedido3);
            }

            if (!is_null($idpedido4) && !empty($idpedido4)) {
                $pedido4 = $pedidoMapper->getPedido($idpedido4);
                $items4 = $itemMapper->getItemsPedido($idpedido4);
            }

            return array(
                'pedidos' => $mapper->fetchAllEstatus(array('2')),
                'panel1' => $panel1,
                'idpedido1' => $idpedido1,
                'pedido1' => $pedido1,
                'items1' => $items1,
                'panel2' => $panel2,
                'idpedido2' => $idpedido2,
                'pedido2' => $pedido2,
                'items2' => $items2,
                'panel3' => $panel3,
                'idpedido3' => $idpedido3,
                'pedido3' => $pedido3,
                'items3' => $items3,
                'panel4' => $panel4,
                'idpedido4' => $idpedido4,
                'pedido4' => $pedido4,
                'items4' => $items4,
                'despachadores' => $listaNombDespachador,
                'usuarios' => $despachadores
            );
        } elseif ($pedidosDespacho) {
            $arreglo = $this->extraerId($despachadores);
            foreach ($pedidosDespacho as $despachoPedido) {
                $buscar = $despachoPedido->getDespachador();
                $clave = array_search($buscar,$arreglo);
                $arrayPedidos[$clave] = $despachoPedido->getId();
            }
            $idpedido1 = (!empty($arrayPedidos[0])) ? $arrayPedidos[0] : null;
            $pedido1 = (is_null($idpedido1)) ? null : $mapper->getPedido($idpedido1);
            $panel1 = (is_null($idpedido1)) ? null : 'Ocupado';
            $items1 = (is_null($idpedido1)) ? null : $itemMapper->getItemsPedido($idpedido1);

            $idpedido2 = (!empty($arrayPedidos[1])) ? $arrayPedidos[1] : null;
            $pedido2 = (is_null($idpedido2)) ? null : $mapper->getPedido($idpedido2);
            $panel2 = (is_null($idpedido2)) ? null : 'Ocupado';
            $items2 = (is_null($idpedido2)) ? null : $itemMapper->getItemsPedido($idpedido2);

            $idpedido3 = (!empty($arrayPedidos[2])) ? $arrayPedidos[2] : null;
            $pedido3 = (is_null($idpedido3)) ? null : $mapper->getPedido($idpedido3);
            $panel3 = (is_null($idpedido3)) ? null : 'Ocupado';
            $items3 = (is_null($idpedido3)) ? null : $itemMapper->getItemsPedido($idpedido3);

            $idpedido4 = (!empty($arrayPedidos[3])) ? $arrayPedidos[3] : null;
            $pedido4 = (is_null($idpedido4)) ? null : $mapper->getPedido($idpedido4);
            $panel4 = (is_null($idpedido4)) ? null : 'Ocupado';
            $items4 = (is_null($idpedido4)) ? null : $itemMapper->getItemsPedido($idpedido4);


        }

        return new ViewModel(array(
                'pedidos' => $mapper->fetchAllEstatus(array('2')),
                'panel1' => $panel1,
                'idpedido1' => $idpedido1,
                'pedido1' => $pedido1,
                'items1' => $items1,
                'panel2' => $panel2,
                'idpedido2' => $idpedido2,
                'pedido2' => $pedido2,
                'items2' => $items2,
                'panel3' => $panel3,
                'idpedido3' => $idpedido3,
                'pedido3' => $pedido3,
                'items3' => $items3,
                'panel4' => $panel4,
                'idpedido4' => $idpedido4,
                'pedido4' => $pedido4,
                'items4' => $items4,
                'despachadores' => $listaNombDespachador,
                'usuarios' => $despachadores
            )
        );
    }

    public function getPedidoMapper()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('PedidoMapper');
    }

    public function getItemMapper()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('ItemMapper');
    }

    public function getDisponibilidadMapper()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('DisponibilidadMapper');
    }

    public function getIngresoMapper()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('IngresoMapper');
    }

    public function deleteAction()
    {
        $id = $this->params('id');
        $pedido = $this->getPedidoMapper()->getPedido($id);
        $items = $this->getItemMapper()->getItemsPedido($id);
        if (!$pedido) {
            return $this->redirect()->toRoute('pedido');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            if ($request->getPost()->get('del') == 'Si') {
                $this->getItemMapper()->deleteItems($id);
                $this->getPedidoMapper()->deletePedido($id);
            }

            return $this->redirect()->toRoute('pedido');
        }

        return array(
            'id' => $id,
            'pedido' => $pedido,
            'items' => $items
        );
    }

    public function finalizarPedido($id)
    {
        $itemMapper = $this->getItemMapper();
        $pedidoMapper = $this->getPedidoMapper();

        $pedido = $pedidoMapper->getPedido($id);
        $pedido->setEstatus(4);
        $pedidoMapper->savePedido($pedido);

        $almacen = $pedido->getIdalmacen();
        $ingreso = $this->getIngresoMapper();
        $items = $itemMapper->getItemsPedido($id);
        foreach ($items as $item) {
            $producto = $item->getProducto();

            $disponibilidadAlmacen = $ingreso->existeRegistro($almacen, $producto);

            if ($disponibilidadAlmacen) {
                $cantAnterior = $disponibilidadAlmacen->getCantidad();
                $cantidad = $cantAnterior - $item->getCantidad();
                $disponibilidadAlmacen->setCantidad($cantidad);
                if ($cantidad <= 0 ){
                    $disponibilidadProducto = new DisponibilidadProductoEntity();
                    $disponibilidadProducto->setIdproducto($producto);
                    $disponibilidadProducto->setDisponible(false);
                    $this->getDisponibilidadMapper()->actualizarProducto($disponibilidadProducto);
                }
                $this->getIngresoMapper()->actualizarDisponibilidadAlmacen($disponibilidadAlmacen);
            } else {
                $disponibilidadAlmacen = new DisponibilidadAlmacenEntity();
                $disponibilidadAlmacen->setProducto($producto);
                $disponibilidadAlmacen->setAlmacen($almacen);
                $disponibilidadAlmacen->setCantidad($item->getCantidad());
                if ($item->getCantidad() <= 0 ){
                    $disponibilidadProducto = new DisponibilidadProductoEntity();
                    $disponibilidadProducto->setIdproducto($producto);
                    $disponibilidadProducto->setDisponible(false);
                    $this->getDisponibilidadMapper()->actualizarProducto($disponibilidadProducto);
                }
                $this->getIngresoMapper()->actualizarDisponibilidadAlmacen($disponibilidadAlmacen);
            }

        }
    }

    public function eliminarPedido($id)
    {
        $pedidoMapper = $this->getPedidoMapper();

        $pedido = $pedidoMapper->getPedido($id);
        $pedido->setEstatus(5);
        $pedidoMapper->savePedido($pedido);

    }

    public function descartarPedido($id)
    {
        $pedidoMapper = $this->getPedidoMapper();

        $pedido = $pedidoMapper->getPedido($id);
        $pedido->setEstatus(2);
        $pedido->setDespachador(null);
        $pedidoMapper->savePedido($pedido);

    }

    public function listarDespachadores()
    {
        $userMapper = $this->getUserMapper();
        $users = $userMapper->findAll();

        foreach ($users as $user)
        {
            $roles =$user->getRoles();
            foreach ($roles as $rol) {
                $rolId = $rol->getRoleId();

                if ($rolId === 'despachador'){
                    $despachadores[] = $user;
                }
            }
        }
        return $despachadores;
    }

    public function getUserMapper()
    {
        if (null === $this->userMapper) {
            $this->userMapper = $this->getServiceLocator()->get('zfcuser_user_mapper');
        }
        return $this->userMapper;
    }

    public function extraerNombres($despachadores)
    {
        $usuarios = $despachadores;

        foreach ($usuarios as $user)
        {
            $arrayNombres[] = substr($user->getDisplayName(),0,7);
        }

        return $arrayNombres;
    }

    public function extraerId($despachadores)
    {
        $usuarios = $despachadores;

        foreach ($usuarios as $user)
        {
            $arrayId[] = $user->getId();
        }

        return $arrayId;
    }
}

