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
            $panel1 = $request->getPost()->get('panel1');
            $accion = $request->getPost()->get('submit');

            if ($accion === 'Atender'){

                $itemMapper = $this->getItemMapper();
                $items = $itemMapper->getItemsPedido($idpedido);
                $pedidoMapper = $this->getPedidoMapper();
                $pedido = $pedidoMapper->getPedido($idpedido);

                if (is_null($panel1)) {
                    $panel1 = 'Ocupado';
                    $pedido1 = $pedido;
                    $items1 = $items;

                    return array(
                        'pedidos' => $mapper->fetchAll(),
                        'panel1' => $panel1,
                        'pedido1' => $pedido1,
                        'items1' => $items1,
                    );
                }
            }

            return $this->redirect()->toRoute('despacho');
        }

        return new ViewModel(array('pedidos' => $mapper->fetchAll()));
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