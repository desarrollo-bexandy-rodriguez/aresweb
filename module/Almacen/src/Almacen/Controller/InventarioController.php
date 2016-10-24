<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 03/10/16
 * Time: 03:50 PM
 */

namespace Almacen\Controller;


use Almacen\Form\IngresoForm;
use Almacen\Model\DisponibilidadAlmacenEntity;
use Almacen\Model\IngresoEntity;
use Zend\Http\Request;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\Router\RouteMatch;
use Zend\View\Model\ViewModel;


class InventarioController extends AbstractActionController
{

    public function ingresoProductoAction()
    {
        $ingreso = new IngresoEntity();
        $idalmacen = (int)$this->params('idalmacen');
        $idproducto = (int)$this->params('idproducto');
        if ($idalmacen) {
            $ingreso->setIdalmacen($idalmacen);
            $almacen = $this->getAlmacenMapper()->getAlmacen($idalmacen);
            $nombAlmacen = $almacen->getNombre();
            $ingreso->setNombalmacen($nombAlmacen);
        }
        if (!$idalmacen) {
            $ingreso->setIdalmacen('1');
            $ingreso->setNombalmacen('Depósito');
        }

        if ($idproducto) {
            $ingreso->setIdproducto($idproducto);
            $producto = $this->getProductoMapper()->getProducto($idproducto,true);
            $nombProducto = $producto->getNombre();
            $ingreso->setNombproducto($nombProducto);
        }


        $form = new IngresoForm();

        $form->bind($ingreso);

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {

                $disponibilidadAlmacen = $this->getIngresoMapper()->existeRegistro($ingreso->getIdalmacen(),$ingreso->getIdproducto());

                if ($disponibilidadAlmacen) {
                    $cantAnterior = $disponibilidadAlmacen->getCantidad();
                    $disponibilidadAlmacen->setCantidad($cantAnterior + $ingreso->getCantidad());
                    $this->getIngresoMapper()->actualizarDisponibilidadAlmacen($disponibilidadAlmacen);
                } else {
                    $disponibilidadAlmacen = new DisponibilidadAlmacenEntity();
                    $disponibilidadAlmacen->setProducto($ingreso->getIdproducto());
                    $disponibilidadAlmacen->setAlmacen($ingreso->getIdalmacen());
                    $disponibilidadAlmacen->setCantidad($ingreso->getCantidad());

                    $this->getIngresoMapper()->actualizarDisponibilidadAlmacen($disponibilidadAlmacen);
                }

                $this->getIngresoMapper()->saveIngresoProducto($ingreso);


                // Redirect to list of productos
                return $this->redirect()->toRoute('almacen');
            }
        }

        return array('form' => $form);
    }

    public function ingresoLoteAction()
    {
        $ingreso = new IngresoEntity();
        $id = (int)$this->params('id');
        $idalmacen = (int)$this->params('idalmacen');
        $idproducto = (int)$this->params('idproducto');
        if ($idalmacen) {
            $ingreso->setIdalmacen($idalmacen);
            $almacen = $this->getAlmacenMapper()->getAlmacen($idalmacen);
            $nombAlmacen = $almacen->getNombre();
            $ingreso->setNombalmacen($nombAlmacen);
        }
        if (!$idalmacen) {
            $ingreso->setIdalmacen('1');
            $ingreso->setNombalmacen('Depósito');
        }

        if ($idproducto) {
            $ingreso->setIdproducto($idproducto);
            $producto = $this->getProductoMapper()->getProducto($idproducto);
            $nombProducto = $producto->getNombre();
            $ingreso->setNombproducto($nombProducto);
        }


        $form = new IngresoForm();

        $form->bind($ingreso);

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {


                $this->getIngresoMapper()->saveIngresoProducto($ingreso);

                $disponibilidadAlmacen = new DisponibilidadAlmacenEntity();
                $disponibilidadAlmacen->setProducto($ingreso->getIdproducto());
                $disponibilidadAlmacen->setAlmacen($ingreso->getIdalmacen());
                $disponibilidadAlmacen->setCantidad($ingreso->getCantidad());

                $this->getIngresoMapper()->actualizarDisponibilidadAlmacen($disponibilidadAlmacen);
                // Redirect to list of productos
                return $this->redirect()->toRoute('almacen');
            }
        }

        return array('form' => $form);
    }

    public function getIngresoMapper()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('IngresoMapper');
    }

    public function selectAlmacenAction()
    {
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
            $urlidalmacen = $match->getParam('idalmacen');
            $urlidproducto = $match->getParam('idproducto');

        }
        if (is_null($urlidalmacen)) {$urlidalmacen = 0;}
        if (is_null($urlidproducto)) {$urlidproducto = 0;}

        $mapper = $this->getAlmacenMapper();
        return new ViewModel(array(
            'almacenes' => $mapper->fetchAll(),
            'urlroute' => $route,
            'urlaction' => $urlaction,
            'urlidalmacen' => $urlidalmacen,
            'urlidproducto' => $urlidproducto,
        ));
    }

    public function selectProductoAction()
    {


        $categorias = $this->getCategoriaMapper()->fetchAll();
        $mapper = $this->getProductoMapper();

        $request = $this->getRequest();
        if ($request->isPost()) {
            $selcat = $request->getPost()->get('selcat');
            $cat = str_replace(" ", "_", $selcat);
            $idcat = $request->getPost()->get($cat);
            $route = $request->getPost()->get('urlroute');
            $urlaction = $request->getPost()->get('urlaction');
            $urlidalmacen = $request->getPost()->get('urlidalmacen');
            $urlidproducto = $request->getPost()->get('urlidproducto');

            if ($idcat === "0") {
                $productos = $mapper->fetchAll(true);

            } else {
                $productos = $mapper->getProductosCategoria($idcat,true);
            }

        } else {
            $productos = $mapper->fetchAll(true);

            $id = $this->params('id');

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
                $urlidalmacen = $match->getParam('idalmacen');
                $urlidproducto = $match->getParam('idproducto');

            }
            if (is_null($urlidalmacen)) {$urlidalmacen = 0;}
            if (is_null($urlidproducto)) {$urlidproducto = 0;}
        }

        return new ViewModel(array(
            'productos' => $productos,
            'categorias' => $categorias,
            'urlroute' => $route,
            'urlaction' => $urlaction,
            'urlidalmacen' => $urlidalmacen,
            'urlidproducto' => $urlidproducto,

        ));
    }

    public function getArregloProductos()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('arregloProductos');
    }

    public function getCategoriaMapper()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('CategoriaMapper');
    }

    public function getAlmacenMapper()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('AlmacenMapper');
    }

    public function getProductoMapper()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('ProductoMapper');
    }

    public function disponibilidadAlmacenAction()
    {
        $idAlmacen = (int)$this->params('idalmacen');

        $almacen = $this->getAlmacenMapper()->getAlmacen($idAlmacen);

        if (!$idAlmacen) {
            return $this->redirect()->toRoute('almacen');
        }
        $disponibilidadAlmacen = $this->getIngresoMapper()->getDisponibilidadAlmacen($idAlmacen);

        return array(
            'idalmacen' => $idAlmacen,
            'disponibilidadAlmacen' => $disponibilidadAlmacen,
            'almacen' => $almacen
        );
    }

    public function verIngresosAction()
    {
        $idAlmacen = (int)$this->params('idalmacen');
        $almacen = $this->getAlmacenMapper()->getAlmacen($idAlmacen);

        if (!$idAlmacen) {
            return $this->redirect()->toRoute('almacen');
        }
        $ingresos = $this->getIngresoMapper()->getIngresos($idAlmacen);

        return array(
            'idalmacen' => $idAlmacen,
            'ingresos' => $ingresos,
            'almacen' => $almacen
        );
    }



}