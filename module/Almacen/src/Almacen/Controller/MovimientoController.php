<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 03/10/16
 * Time: 03:50 PM
 */

namespace Almacen\Controller;


use Almacen\Form\MovimientoForm;
use Almacen\Model\DisponibilidadAlmacenEntity;
use Almacen\Model\DisponibilidadProductoEntity;
use Almacen\Model\MovimientoEntity;
use Zend\Http\Request;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\Router\RouteMatch;
use Zend\View\Model\ViewModel;

class MovimientoController extends AbstractActionController
{

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

    public function getDisponibilidadMapper()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('DisponibilidadMapper');
    }

    public function movimientoProductoAction()
    {
        $movimiento = new MovimientoEntity();
        $idmayor = (int)$this->params('idmayor');
        $iddetal = (int)$this->params('iddetal');
        $idproducto = (int)$this->params('idproducto');

        if ($idmayor) {
            $movimiento->setIdalmacenmayor($idmayor);
            $almacen = $this->getAlmacenMapper()->getAlmacen($idmayor);
            $nombAlmacen = $almacen->getNombre();
            $movimiento->setNombmayor($nombAlmacen);
        }
        if (!$idmayor) {
            $movimiento->setIdalmacenmayor('1');
            $movimiento->setNombmayor('Depósito');
        }

        if ($iddetal) {
            $movimiento->setIdalmacendetal($iddetal);
            $almacen = $this->getAlmacenMapper()->getAlmacen($iddetal);
            $nombAlmacen = $almacen->getNombre();
            $movimiento->setNombdetal($nombAlmacen);
        }
        if (!$iddetal) {
            $movimiento->setIdalmacendetal('2');
            $movimiento->setNombdetal('Tienda');
        }

        if ($idproducto) {
            $movimiento->setIdproducto($idproducto);
            $producto = $this->getProductoMapper()->getProducto($idproducto,true);
            $nombProducto = $producto->getNombre();
            $movimiento->setNombproducto($nombProducto);
            $movimiento->setUnidmed($producto->getNombunidmedalmacen());
            $movimiento->setIdusuario('1');
        }


        if ($movimiento->getIdalmacenmayor() && $movimiento->getIdproducto()) {
            $disponibilidadAlmacen = $this->getIngresoMapper()->existeRegistro($movimiento->getIdalmacenmayor(),$movimiento->getIdproducto());
            if ($disponibilidadAlmacen) {
                $movimiento->setDisponible($disponibilidadAlmacen->getCantidad());
            } else {
                $movimiento->setDisponible('0');
            }

        }

        if (!($movimiento->getIdalmacenmayor() && $movimiento->getIdproducto())) {
           $movimiento->setDisponible('0');
        }


        $form = new MovimientoForm();

        $form->bind($movimiento);

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            //\Zend\Debug\Debug::dump($request->getPost()); die();
            \Zend\Debug\Debug::dump($form->isValid());
            if ($form->isValid()) {
                // \Zend\Debug\Debug::dump($form->getData()); die();

                $almacenMayor = $this->getIngresoMapper()->existeRegistro($movimiento->getIdalmacenmayor(),$movimiento->getIdproducto());

                if ($almacenMayor) {
                    $cantAnterior = $almacenMayor->getCantidad();
                    if (is_null($cantAnterior) || $cantAnterior === 0){
                        return $this->redirect()->toRoute('almacen');
                    }
                    $almacenMayor->setCantidad($cantAnterior - $movimiento->getCantidad());
                    $this->getIngresoMapper()->actualizarDisponibilidadAlmacen($almacenMayor);
                }

                $almacenDetal = $this->getIngresoMapper()->existeRegistro($movimiento->getIdalmacendetal(),$movimiento->getIdproducto());

                $producto = $this->getProductoMapper()->getProducto($movimiento->getIdproducto());


                if ($almacenDetal) {
                    $cantAnterior = $almacenDetal->getCantidad();
                    $conversion = $movimiento->getCantidad() * $producto->getRelacionunidad();
                    $almacenDetal->setCantidad($cantAnterior + $conversion);
                    $this->getIngresoMapper()->actualizarDisponibilidadAlmacen($almacenDetal);
                } else {
                    $almacenDetal = new DisponibilidadAlmacenEntity();
                    $almacenDetal->setProducto($movimiento->getIdproducto());
                    $almacenDetal->setAlmacen($movimiento->getIdalmacendetal());
                    $conversion = $movimiento->getCantidad() * $producto->getRelacionunidad();
                    $almacenDetal->setCantidad( $conversion);
                    $almacenDetal->setReservado('0');
                    $this->getIngresoMapper()->actualizarDisponibilidadAlmacen($almacenDetal);
                }

                $this->getMovimientoMapper()->saveMovimiento($movimiento);

                $disponibilidadProducto = new DisponibilidadProductoEntity();
                $disponibilidadProducto->setIdproducto($movimiento->getIdproducto()) ;
                $disponibilidadProducto->setDisponible(true);
                $this->getDisponibilidadMapper()->actualizarProducto($disponibilidadProducto);

                // Redirect to list of productos


                return $this->redirect()->toRoute('almacen');
            } else {

                \Zend\Debug\Debug::dump($form->getData());
            }
        }

        return array(
            'form' => $form,
        );
    }

    public function selectAlmacenMayorAction()
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
            $urlidmayor = $match->getParam('idmayor');
            $urliddetal = $match->getParam('iddetal');
            $urlidproducto = $match->getParam('idproducto');

        }
        if (is_null($urlidmayor)) {$urlidmayor = 0;}
        if (is_null($urliddetal)) {$urliddetal = 0;}
        if (is_null($urlidproducto)) {$urlidproducto = 0;}

        $mapper = $this->getAlmacenMapper();
        return new ViewModel(array(
            'almacenes' => $mapper->fetchAll(),
            'urlroute' => $route,
            'urlaction' => $urlaction,
            'urlidmayor' => $urlidmayor,
            'urliddetal' => $urliddetal,
            'urlidproducto' => $urlidproducto,
        ));
    }

    public function selectAlmacenDetalAction()
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
            $urlidmayor = $match->getParam('idmayor');
            $urliddetal = $match->getParam('iddetal');
            $urlidproducto = $match->getParam('idproducto');

        }
        if (is_null($urlidmayor)) {$urlidmayor = 0;}
        if (is_null($urliddetal)) {$urliddetal = 0;}
        if (is_null($urlidproducto)) {$urlidproducto = 0;}

        $mapper = $this->getAlmacenMapper();
        return new ViewModel(array(
            'almacenes' => $mapper->fetchAll(),
            'urlroute' => $route,
            'urlaction' => $urlaction,
            'urlidmayor' => $urlidmayor,
            'urliddetal' => $urliddetal,
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
            $urlidmayor = $request->getPost()->get('urlidmayor');
            $urliddetal = $request->getPost()->get('urliddetal');
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
                $urlidmayor = $match->getParam('idmayor');
                $urliddetal = $match->getParam('iddetal');
                $urlidproducto = $match->getParam('idproducto');

            }
            if (is_null($urlidmayor)) {$urlidmayor = 0;}
            if (is_null($urliddetal)) {$urliddetal = 0;}
            if (is_null($urlidproducto)) {$urlidproducto = 0;}
        }

        return new ViewModel(array(
            'productos' => $productos,
            'categorias' => $categorias,
            'urlroute' => $route,
            'urlaction' => $urlaction,
            'urlidmayor' => $urlidmayor,
            'urliddetal' => $urliddetal,
            'urlidproducto' => $urlidproducto,

        ));
    }

    public function disponibilidadDetalAction()
    {
        $idAlmacen = (int)$this->params('idmayor');

        $almacen = $this->getAlmacenMapper()->getAlmacen($idAlmacen);

        if (!$idAlmacen) {
            return $this->redirect()->toRoute('almacen');
        }
        $disponibilidadAlmacen = $this->getIngresoMapper()->getDisponibilidadAlmacen($idAlmacen);

        return array(
            'idmayor' => $idAlmacen,
            'disponibilidadAlmacen' => $disponibilidadAlmacen,
            'almacen' => $almacen
        );
    }

    public function verMovimientosAction()
    {

        $idAlmacen = (int)$this->params('idmayor');
        $almacen = $this->getAlmacenMapper()->getAlmacen($idAlmacen);

        if (!$idAlmacen) {
            return $this->redirect()->toRoute('almacen');
        }
        $movimientos = $this->getMovimientoMapper()->getMovimientos($idAlmacen);

        return array(
            'idalmacendetal' => $idAlmacen,
            'movimientos' => $movimientos,
            'almacen' => $almacen
        );
    }
}