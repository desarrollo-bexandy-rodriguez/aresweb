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
use Zend\Http\Request;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\Router\RouteMatch;
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

        $item = new ItemEntity();
        $item->setPedido($idpedido);
        $item->setProducto($idproducto);

        $form = new ItemForm();
        $form->bind($item);

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {

                if ($form->get('seleccion')->getValue() === 'cantidad'){
                    $form->get('cantidad')->setAttributes(array('readonly'=>true,'disabled'=>true));
                    $subtotal = $item->getCantidad() * $producto->getPreciounidad();
                    $item->setSubtotal($subtotal);
                }

                if ($form->get('seleccion')->getValue() === 'precio'){
                    $form->get('precio')->setAttributes(array('readonly'=>true,'disabled'=>true));
                    $cantidad_temp = $form->get('precio')->getValue() / $producto->getPreciounidad();
                    $cantidad = round($cantidad_temp,3);
                    $item->setSubtotal($form->get('precio')->getValue());
                    $item->setCantidad($cantidad);
                }
                $cantidad = str_replace(",", ".", $item->getCantidad());
                $subtotal = str_replace(",", ".", $item->getSubtotal());
                $item->setCantidad($cantidad);
                $item->setSubtotal($subtotal);

                $this->getItemMapper()->saveitem($item);

                $total = 0;
                $items = $this->getItemMapper()->getItemsPedido($idpedido);
                foreach ($items as $i)
                {
                    $total = $total + $i->getSubtotal();
                }

                $pedido = $this->getPedidoMapper()->getPedido($idpedido);
                $pedido->setPreciototal($total);
                $this->getPedidoMapper()->savePedido($pedido);

                return $this->redirect()->toRoute('pedido', array('action'=>'edit', 'id' => $idpedido));
            }
        }

        $form->get('seleccion')->setValue('cantidad');
        $form->get('precio')->setAttributes(array('readonly' => true, 'disabled' => true));

        return array(
            'form' => $form,
            'producto' => $producto,
            'idpedido' => $idpedido,
            'idproducto' => $idproducto
        );
    }

    public function editAction()
    {
        $idpedido = $this->params('pedido');
        $idproducto = $this->params('producto');
/*
        $request = $this->getRequest();
        $referer = $request->getHeader('referer');
        $refererUri = $referer->getUri();
        $refererRequest = new Request();
        $refererRequest->setUri($refererUri);
        $serviceManager = $this->getServiceLocator();
        $routeStack = $serviceManager->get('Router');
        $match = $routeStack->match($refererRequest);
        if ($match instanceof RouteMatch) {
            $route = $match->getMatchedRouteName();
            $urlaction = $match->getParam('action');
            $urlpedido = $match->getParam('pedido');
            $urlid = $match->getParam('id');
            $urlproducto = $match->getParam('producto');

        }
        if (is_null($urlpedido)) {$urlpedido = 0;}
        if (is_null($urlproducto)) {$urlproducto = 0;}
*/
        if (!($idpedido && $idproducto)) {
            return $this->redirect()->toRoute('pedido', array('action'=>'edit', 'id' => $idpedido));
            /*
            if ($route === 'pedido'){
                return $this->redirect()->toRoute($route, array('action'=>$urlaction, 'id' => $urlid));
            } elseif ($route === 'item') {
                return $this->redirect()->toRoute($route, array('pedido' => $urlpedido));
            } else {
                return $this->redirect()->toRoute('pedido');
            }
*/
        }

        $producto = $this->getProductoMapper()->getProducto($idproducto,true);

        $item = $this->getItemMapper()->getItem($idpedido,$idproducto);

        if (!$item) {
            return $this->redirect()->toRoute('pedido', array('action'=>'edit', 'id' => $idpedido));
            /*
            if ($route === 'pedido'){
                return $this->redirect()->toRoute($route, array('action'=>$urlaction, 'id' => $urlid));
            } elseif ($route === 'item') {
                return $this->redirect()->toRoute($route, array('pedido' => $urlpedido));
            } else {
                return $this->redirect()->toRoute('pedido');
            }
            */
        }

        $form = new ItemForm();
        $form->bind($item);

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {

                if ($form->get('seleccion')->getValue() === 'cantidad'){
                    //$form->get('cantidad')->setAttributes(array('readonly'=>true,'disabled'=>true));
                    $subtotal = $item->getCantidad() * $producto->getPreciounidad();
                    $item->setSubtotal($subtotal);
                }

                if ($form->get('seleccion')->getValue() === 'precio'){
                    //$form->get('precio')->setAttributes(array('readonly'=>true,'disabled'=>true));
                    $cantidad_temp = $form->get('precio')->getValue() / $producto->getPreciounidad();
                    $cantidad = round($cantidad_temp,3);
                    $item->setSubtotal($form->get('precio')->getValue());
                    $item->setCantidad($cantidad);
                }

                $this->getItemMapper()->saveitem($item);

                $total = 0;
                $items = $this->getItemMapper()->getItemsPedido($idpedido);
                foreach ($items as $i)
                {
                    $total = $total + $i->getSubtotal();
                }

                $pedido = $this->getPedidoMapper()->getPedido($idpedido);
                $pedido->setPreciototal($total);
                $this->getPedidoMapper()->savePedido($pedido);

                return $this->redirect()->toRoute('pedido', array('action'=>'edit', 'id' => $idpedido));
                /*
                if ($route === 'pedido'){
                    return $this->redirect()->toRoute($route, array('action'=>$urlaction, 'id' => $urlid));
                } elseif ($route === 'item') {
                    return $this->redirect()->toRoute($route, array('pedido' => $urlpedido));
                } else {
                    return $this->redirect()->toRoute('pedido');
                }
                */
            }
        }

        $form->get('seleccion')->setValue('cantidad');
        $form->get('precio')->setAttributes(array('readonly' => true, 'disabled' => true));

        return array(
            'form' => $form,
            'producto' => $producto,
            'idpedido' => $idpedido,
            'idproducto' => $idproducto,
            /*
            'route' => $route,
            'urlaction' => $urlaction,
            'urlpedido' => $urlpedido,
            'urlproducto' => $urlproducto,
            'urlid' => $urlid,
            */
        );

    }

    public function deleteAction()
    {
        $idpedido = $this->params('pedido');
        $idproducto = $this->params('producto');
        $producto = $this->getProductoMapper()->getProducto($idproducto,true);
        $pedido = $this->getPedidoMapper()->getPedido($idpedido);
        $item = $this->getItemMapper()->getItem($idpedido, $idproducto);
        if (!$item) {
            return $this->redirect()->toRoute('pedido');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            if ($request->getPost()->get('del') == 'Si') {
                $this->getItemMapper()->deleteItem($idpedido, $idproducto);

                $total = 0;
                $items = $this->getItemMapper()->getItemsPedido($idpedido);
                foreach ($items as $i)
                {
                    $total = $total + $i->getSubtotal();
                }

                $pedido->setPreciototal($total);
                $this->getPedidoMapper()->savePedido($pedido);
            }

            return $this->redirect()->toRoute('item',array('action' => 'edit', 'pedido' => $idpedido, 'producto' => $idproducto));
        }

        return array(
            'idpedido' => $idpedido,
            'idproducto' => $idproducto,
            'pedido' => $pedido,
            'item' => $item,
            'producto' => $producto,
        );
    }

}