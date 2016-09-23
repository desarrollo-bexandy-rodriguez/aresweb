<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 22/09/16
 * Time: 06:15 PM
 */

namespace Pedidos\Controller;


use Pedidos\Form\ItemForm;
use Pedidos\Model\ItemEntity;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ItemController extends AbstractActionController
{
    public function indexAction()
    {
        $idpedido = (int)$this->params('pedido');
        $itemMapper = $this->getItemMapper();
        $items = $itemMapper->getItemsPedido($idpedido);
        $pedidoMapper = $this->getPedidoMapper();
        $pedido = $pedidoMapper->getPedido($idpedido);
        return new ViewModel(array('items' => $items, 'pedido' => $pedido));
    }

    public function getItemMapper()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('ItemMapper');
    }

    public function getPedidoMapper()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('PedidoMapper');
    }

    public function getProductoMapper()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('ProductoMapper');
    }

    public function addAction()
    {
        $idpedido = (int)$this->params('pedido');
        $idproducto = (int)$this->params('producto');

        if (!$idpedido && !$idproducto) {
            return $this->redirect()->toRoute('pedido', array('action'=>'edit', 'id' => $idpedido));
        }

        $producto = $this->getProductoMapper()->getProducto($idproducto);
        $pedido = $this->getPedidoMapper()->getPedido($idpedido);

        $item = new ItemEntity();

        $item->setPedido($idpedido);
        $item->setProducto($idproducto);

        $form = new ItemForm();
        $form->bind($item);

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $subtotal = $item->getCantidad() * $producto->getPreciounidad();
                $item->setSubtotal($subtotal);
                $this->getItemMapper()->saveitem($item);

                return $this->redirect()->toRoute('pedido', array('action'=>'edit', 'id' => $idpedido));
            }
        }

        return array(
            'form' => $form,
            'producto' => $producto,
            'idpedido' => $idpedido,
            'idproducto' => $idproducto
        );
    }


}