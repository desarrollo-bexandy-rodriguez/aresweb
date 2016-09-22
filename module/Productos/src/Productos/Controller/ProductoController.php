<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 20/09/16
 * Time: 11:28 AM
 */

namespace Productos\Controller;

use Productos\Form\ProductoForm;
use Productos\Model\ProductoEntity;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ProductoController extends AbstractActionController
{
    public function indexAction()
    {
        $mapper = $this->getProductoMapper();
        return new ViewModel(array('productos' => $mapper->fetchAll()));
    }

    public function getProductoMapper()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('ProductoMapper');
    }

    public function getCategoriaMapper()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('CategoriaMapper');
    }

    public function getUnidadMedidaMapper()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('UnidadMedidaMapper');
    }

    public function addAction()
    {
        $form = new ProductoForm();
        $producto = new ProductoEntity();
        $id = (int)$this->params('id');
        $cat = (int)$this->params('cat');
        $det = (int)$this->params('det');
        $may = (int)$this->params('may');
        if ($cat) {
            $producto->setIdcategoria($cat);
            $categoria = $this->getCategoriaMapper()->getCategoria($cat);
            $nombCategoria = $categoria->getNombre();
            $producto->setNombcategoria($nombCategoria);
        }
        if ($det) {
            $producto->setUnidadmedidaventas($det);
            $unidadMedida = $this->getUnidadMedidaMapper()->getUnidadMedida($det);
            $nombUnidadMedida = $unidadMedida->getSimbolo();
            $producto->setNombunidmedventas($nombUnidadMedida);
        }
        if ($may) {
            $producto->setUnidadmedidaalmacen($may);
            $unidadMedida = $this->getUnidadMedidaMapper()->getUnidadMedida($may);
            $nombUnidadMedida = $unidadMedida->getSimbolo();
            $producto->setNombunidmedalmacen($nombUnidadMedida);
        }
        $form->bind($producto);

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $this->getProductoMapper()->saveProducto($producto);

                // Redirect to list of productos
                return $this->redirect()->toRoute('producto');
            }
        }

        return array('form' => $form,'id' => $id, 'cat' => $cat,'det' => $det,'may' => $may);
    }

    public function editAction()
    {
        $id = (int)$this->params('id');
        $cat = (int)$this->params('cat');
        $det = (int)$this->params('det');
        $may = (int)$this->params('may');

        $producto = $this->getProductoMapper()->getProducto($id);

        if ($producto->getIdCategoria()){
            $categoria = $this->getCategoriaMapper()->getCategoria($producto->getIdCategoria());
            $nombCategoria = $categoria->getNombre();
            $producto->setNombcategoria($nombCategoria);
        }

        if ($producto->getUnidadmedidaventas()){
            $unidadMedida = $this->getUnidadMedidaMapper()->getUnidadMedida($producto->getUnidadmedidaventas());
            $nombUnidadMedida = $unidadMedida->getSimbolo();
            $producto->setNombunidmedventas($nombUnidadMedida);
        }

        if ($producto->getUnidadmedidaalmacen()) {
            $unidadMedida = $this->getUnidadMedidaMapper()->getUnidadMedida($producto->getUnidadmedidaalmacen());
            $nombUnidadMedida = $unidadMedida->getSimbolo();
            $producto->setNombunidmedalmacen($nombUnidadMedida);
        }

        if ($cat) {
            $producto->setIdcategoria($cat);
            $categoria = $this->getCategoriaMapper()->getCategoria($cat);
            $nombCategoria = $categoria->getNombre();
            $producto->setNombcategoria($nombCategoria);
        }
        if ($det) {
            $producto->setUnidadmedidaventas($det);
            $unidadMedida = $this->getUnidadMedidaMapper()->getUnidadMedida($det);
            $nombUnidadMedida = $unidadMedida->getSimbolo();
            $producto->setNombunidmedventas($nombUnidadMedida);
        }
        if ($may) {
            $producto->setUnidadmedidaalmacen($may);
            $unidadMedida = $this->getUnidadMedidaMapper()->getUnidadMedida($may);
            $nombUnidadMedida = $unidadMedida->getSimbolo();
            $producto->setNombunidmedalmacen($nombUnidadMedida);
        }

        if (!$id) {
            return $this->redirect()->toRoute('producto', array('action'=>'add'));
        }

        $form = new ProductoForm();
        $form->bind($producto);

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $this->getProductoMapper()->saveProducto($producto);

                return $this->redirect()->toRoute('producto');
            }
        }

        return array(
            'id' => $id,
            'cat' => $cat,
            'det' => $det,
            'may' => $may,
            'form' => $form,
        );
    }

    public function deleteAction()
    {
        $id = $this->params('id');
        $producto = $this->getProductoMapper()->getProducto($id);
        if (!$producto) {
            return $this->redirect()->toRoute('producto');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            if ($request->getPost()->get('del') == 'Yes') {
                $this->getProductoMapper()->deleteProducto($id);
            }

            return $this->redirect()->toRoute('producto');
        }

        return array(
            'id' => $id,
            'producto' => $producto
        );
    }
}