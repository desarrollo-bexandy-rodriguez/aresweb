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
        return new ViewModel(array('pedidos' => $mapper->fetchAllEstatus(array('1','2'))));
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
        $pedidoEntity->setIdalmacen(2);

        if ($this->zfcUserAuthentication()->hasIdentity()) {
            $userId = $this->zfcUserAuthentication()->getIdentity()->getId();
        }
        $pedidoEntity->setVendedor($userId);

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

    public function getCategoriaMapper()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('CategoriaMapper');
    }

    public function editAction()
    {
        $id = (int)$this->params('id');
        $pedidoMapper = $this->getPedidoMapper();
        $pedido = $pedidoMapper->getPedido($id);

        if ($pedido->getEstatus() != '1'){
            $this->redirect()->toRoute('item',array('pedido' => $id));
        }
        $categorias = $this->getCategoriaMapper()->fetchAll();
        $pedidoForm = new PedidoForm();
        $pedidoForm->bind($pedido);

        $itemMapper = $this->getItemMapper();
        $items = $itemMapper->getItemsPedido($id);

        $productoMapper = $this->getProductoMapper();

        $request = $this->getRequest();

        if ($request->isPost()) {
            $pedidoForm->setData($request->getPost());
            $selcat = $request->getPost()->get('selcat');

            if (is_null($selcat)) {
                if ($pedidoForm->isValid()) {
                    $submit = $pedidoForm->get('submit')->getValue();

                    if ($submit === "Enviar"){
                        $pedido->setEstatus(2);
                    }
                    if ($submit === "Guardar"){
                        $pedido->setEstatus(1);
                    }

                    if ($this->zfcUserAuthentication()->hasIdentity()) {
                        $userId = $this->zfcUserAuthentication()->getIdentity()->getId();
                    }
                    $pedido->setVendedor($userId);

                    $this->getPedidoMapper()->savePedido($pedido);

                    return $this->redirect()->toRoute('pedido');
                } else {
                    $productos = $productoMapper->fetchAll();
                }
            } else {
                $cat = str_replace(" ", "_", $selcat);
                $idcat = $request->getPost()->get($cat);

                if ($idcat === "0") {
                    $productos = $productoMapper->fetchAll();
                } else {
                    $productos = $productoMapper->getProductosCategoria($idcat);
                }
            }

        } else {
            $productos = $productoMapper->fetchAll();
        }

        return new ViewModel(array(
            'pedido' => $pedido,
            'items' => $items,
            'productos' =>  $productos,
            'pedidoForm' => $pedidoForm,
            'categorias' => $categorias,
        ));
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