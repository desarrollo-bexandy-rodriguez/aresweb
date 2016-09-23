<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 22/09/16
 * Time: 01:49 PM
 */

namespace Pedidos\Controller;


use Pedidos\Form\ItemForm;
use Pedidos\Form\PedidoForm;
use Pedidos\Model\ItemEntity;
use Pedidos\Model\PedidoEntity;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PedidoController extends AbstractActionController
{
    public function indexAction()
    {
        $mapper = $this->getPedidoMapper();
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

    public function getProductoMapper()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('ProductoMapper');
    }

    public function addAction()
    {
        $pedidoMapper = $this->getPedidoMapper();
        $pedidoForm = new PedidoForm();
        $pedidoEntity = new PedidoEntity();
        $pedidoForm->bind($pedidoEntity);

        $itemMapper = $this->getItemMapper();
        $itemForm = new ItemForm();
        $itemEntity = new ItemEntity();
        //$itemForm->bind($itemEntity);

        $productoMapper = $this->getProductoMapper();

        return new ViewModel(array(
            'pedidoForm' => $pedidoForm,
            'itemEntity' => $itemEntity,
            'productos' =>  $productoMapper->fetchAll(),
        ));
    }

    public function editAction()
    {
        $id = (int)$this->params('id');
        $pedidoMapper = $this->getPedidoMapper();
        $pedidoForm = new PedidoForm();
        $pedidoEntity = new PedidoEntity();
        $pedido = $pedidoMapper->getPedido($id);
        $pedidoForm->bind($pedidoEntity);

        $itemMapper = $this->getItemMapper();
        $itemForm = new ItemForm();
        $itemEntity = new ItemEntity();
        $items = $itemMapper->getItemsPedido($id);
        //$itemForm->bind($itemEntity);

        $productoMapper = $this->getProductoMapper();

        return new ViewModel(array(
            'pedido' => $pedido,
            'items' => $items,
            'productos' =>  $productoMapper->fetchAll(),
        ));
    }
}