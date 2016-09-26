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
        $lastCodigoToday = $pedidoMapper->getLastCodigoToday();
        $codigo = $this->generateCodigo($lastCodigoToday);
        $pedidoEntity = new PedidoEntity();

        $pedidoEntity->setCodigo($codigo);
        $pedidoEntity->setEstatus(1);
        $pedidoEntity->setPreciototal(0);
        $pedidoEntity->setFecha(date('Y-m-d'));
        $pedidoEntity->setHora(date('H:i:s'));

        $pedidoMapper->savePedido($pedidoEntity);

        $id = $pedidoEntity->getId();

        if (!$id) {
            return $this->redirect()->toRoute('pedido', array('action'=>'add'));
        }

        return $this->redirect()->toRoute('pedido', array('action'=>'edit', 'id' => $id));
    }

    public function generateCodigo($ultimoCodigo)
    {
        if (($ultimoCodigo == 0) || ($ultimoCodigo === 9999)){
            $nuevoCodigo = (string) date('Ymd').'-0001';
            return $nuevoCodigo;
        } else {
            $ultimaSecuencia = substr($ultimoCodigo,-4);
            $nuevaSecuencia =  (int) $ultimaSecuencia + 1;
            $nuevoCodigo = date('Ymd').'-'.str_pad($nuevaSecuencia,4,'0',STR_PAD_LEFT);
            return $nuevoCodigo;
        }
    }

    public function editAction()
    {
        $id = (int)$this->params('id');
        $pedidoMapper = $this->getPedidoMapper();
        $pedidoForm = new PedidoForm();
        $pedido = $pedidoMapper->getPedido($id);
        $pedidoForm->bind($pedido);

        $itemMapper = $this->getItemMapper();
        $items = $itemMapper->getItemsPedido($id);

        $productoMapper = $this->getProductoMapper();

        $request = $this->getRequest();
        if ($request->isPost()) {
            $pedidoForm->setData($request->getPost());
            if ($pedidoForm->isValid()) {
                $pedido->setEstatus(2);
                $this->getPedidoMapper()->savePedido($pedido);

                return $this->redirect()->toRoute('pedido');
            }
        }

        return new ViewModel(array(
            'pedido' => $pedido,
            'items' => $items,
            'productos' =>  $productoMapper->fetchAll(),
            'pedidoForm' => $pedidoForm,
        ));
    }
}