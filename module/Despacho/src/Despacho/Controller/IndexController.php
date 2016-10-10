<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 09/10/16
 * Time: 09:56 AM
 */

namespace Despacho\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $id = $this->params('id');
        $mapper = $this->getPedidoMapper();

        $request = $this->getRequest();
        if ($request->isPost()) {
            $idpedido = $request->getPost()->get('idpedido');
            $idpedido1 = $request->getPost()->get('idpedido1');
            $idpedido2 = $request->getPost()->get('idpedido2');
            $panel1 = $request->getPost()->get('panel1');
            $panel2 = $request->getPost()->get('panel2');
            $accion = $request->getPost()->get('submit');

            $itemMapper = $this->getItemMapper();
            $pedidoMapper = $this->getPedidoMapper();

            $pedido1 = array();
            $items1 = array();
            $pedido2 = array();
            $items2 = array();

            if (! is_null($idpedido1)){
                $pedido1 = $pedidoMapper->getPedido($idpedido1);
                $items1 = $itemMapper->getItemsPedido($idpedido1);
            }

            if (! is_null($idpedido2)){
                $pedido2 = $pedidoMapper->getPedido($idpedido2);
                $items2 = $itemMapper->getItemsPedido($idpedido2);
            }

            if ($accion === 'Atender'){
                if (is_null($panel1) || !($panel1 === 'Ocupado')) {
                    $idpedido1 = $idpedido;
                    $panel1 = 'Ocupado';
                    $pedido1 = $pedidoMapper->getPedido($idpedido1);
                    $items1 = $itemMapper->getItemsPedido($idpedido1);

                    if (is_null($panel2) || !($panel2 === 'Ocupado')){
                        $pedido2 = array();
                        $items2 = array();
                    } else {
                        $pedido2 = $pedidoMapper->getPedido($idpedido2);
                        $items2 = $itemMapper->getItemsPedido($idpedido2);
                    }

                    return array(
                        'pedidos' => $mapper->fetchAll(),
                        'panel1' => $panel1,
                        'idpedido1' => $idpedido1,
                        'pedido1' => $pedido1,
                        'items1' => $items1,
                        'panel2' => $panel2,
                        'idpedido2' => $idpedido2,
                        'pedido2' => $pedido2,
                        'items2' => $items2
                    );
                } elseif (is_null($panel2) || !($panel2 === 'Ocupado')) {
                    $idpedido2 = $idpedido;
                    $panel2 = 'Ocupado';
                    $pedido2 = $pedidoMapper->getPedido($idpedido2);
                    $items2 = $itemMapper->getItemsPedido($idpedido2);

                    $pedido1 = $pedidoMapper->getPedido($idpedido1);
                    $items1 = $itemMapper->getItemsPedido($idpedido1);

                    return array(
                        'pedidos' => $mapper->fetchAll(),
                        'panel1' => $panel1,
                        'idpedido1' => $idpedido1,
                        'pedido1' => $pedido1,
                        'items1' => $items1,
                        'panel2' => $panel2,
                        'idpedido2' => $idpedido2,
                        'pedido2' => $pedido2,
                        'items2' => $items2
                    );
                }

            }

            if ($accion === 'Finalizar'){
                $idfinalizado = $request->getPost()->get('idfinalizado');

                if ($idfinalizado === 'panel1') {
                    $panel1 = 'Libre';
                    $pedido1 = array();
                    $items1 = array();
                    $idpedido1 = null;

                    if (is_null($panel2) || !($panel2 === 'Ocupado')){
                        $pedido2 = array();
                        $items2 = array();
                    } else {
                        $pedido2 = $pedidoMapper->getPedido($idpedido2);
                        $items2 = $itemMapper->getItemsPedido($idpedido2);
                    }

                    return array(
                        'pedidos' => $mapper->fetchAll(),
                        'panel1' => $panel1,
                        'idpedido1' => $idpedido1,
                        'pedido1' => $pedido1,
                        'items1' => $items1,
                        'panel2' => $panel2,
                        'idpedido2' => $idpedido2,
                        'pedido2' => $pedido2,
                        'items2' => $items2
                    );
                }

                if ($idfinalizado === 'panel2') {
                    $panel2 = 'Libre';
                    $pedido2 = array();
                    $items2 = array();
                    $idpedido2 = null;

                    if (is_null($panel1) || !($panel1 === 'Ocupado')){
                        $pedido1 = array();
                        $items1 = array();
                    } else {
                        $pedido1 = $pedidoMapper->getPedido($idpedido1);
                        $items1 = $itemMapper->getItemsPedido($idpedido1);
                    }

                    return array(
                        'pedidos' => $mapper->fetchAll(),
                        'panel1' => $panel1,
                        'idpedido1' => $idpedido1,
                        'pedido1' => $pedido1,
                        'items1' => $items1,
                        'panel2' => $panel2,
                        'idpedido2' => $idpedido2,
                        'pedido2' => $pedido2,
                        'items2' => $items2
                    );
                }
            }

            return array(
                'pedidos' => $mapper->fetchAll(),
                'panel1' => $panel1,
                'idpedido1' => $idpedido1,
                'pedido1' => $pedido1,
                'items1' => $items1,
                'panel2' => $panel2,
                'idpedido2' => $idpedido2,
                'pedido2' => $pedido2,
                'items2' => $items2
            );
        }

        return new ViewModel(array(
            'pedidos' => $mapper->fetchAll())
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

}