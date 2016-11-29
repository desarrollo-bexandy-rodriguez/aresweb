<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 20/09/16
 * Time: 11:28 AM
 */

namespace Productos\Controller;

use Productos\Form\FileUploadFilter;
use Productos\Form\ProductoForm;
use Productos\Model\ProductoEntity;
use Zend\File\Transfer\Adapter\Http;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Validator\File\Size;
use Zend\View\Model\ViewModel;

class ProductoController extends AbstractActionController
{
    public function indexAction()
    {
        $categorias = $this->getCategoriaMapper()->fetchAll();
        $mapper = $this->getProductoMapper();


        $request = $this->getRequest();
        if ($request->isPost()) {
            $selcat = $request->getPost()->get('selcat');
            $cat = str_replace(" ", "_", $selcat);
            $idcat = $request->getPost()->get($cat);

            if ($idcat === "0") {
                $productos = $mapper->fetchAll(true);
                $paginator = $mapper->fetchAll(true,true);
                $paginator->setCurrentPageNumber((int) $this->params()->fromQuery('page', 1));
                $paginator->setItemCountPerPage(18);
            } else {
                $productos = $mapper->getProductosCategoria($idcat, true);
                $paginator = $mapper->getProductosCategoria($idcat,true,true);
                $paginator->setCurrentPageNumber((int) $this->params()->fromQuery('page', 1));
                $paginator->setItemCountPerPage(18);
            }

        } else {
            $productos = $mapper->fetchAll(true);
            $paginator = $mapper->fetchAll(true,true);
            $paginator->setCurrentPageNumber((int) $this->params()->fromQuery('page', 1));
            $paginator->setItemCountPerPage(18);
        }

        return new ViewModel(array(
            'productos' => $productos,
            'categorias' => $categorias,
            'paginator' => $paginator
            ));
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

    public function getCrearProductoForm()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('CrearProductoForm');
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

        $producto = $this->getProductoMapper()->getProducto($id, true);

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

    public function actualizarPreciosAction()
    {
        $productoMapper = $this->getProductoMapper();

        $request = $this->getRequest();

        if ($request->isPost()) {
            $selcat = $request->getPost()->get('selcat');
            $cat = str_replace(" ", "_", $selcat);
            $idcat = $request->getPost()->get($cat);

            if ($idcat === "0") {
                $productos = $productoMapper->getPrecios();
            } else {
                $productos = $productoMapper->getPrecios();
            }

        } else {
            $productos = $productoMapper->getPrecios();
        }

        return new ViewModel(array(
            'productos' => $productos,
        ));
    }

    public function crearProductoAction()
    {
        $form = $this->getCrearProductoForm();
        $producto = new ProductoEntity();
        $form->bind($producto);
        $fileUploadFilter = new FileUploadFilter();
        $form->setInputFilter($fileUploadFilter->getInputFilter());
        $request = $this->getRequest();
        if ($request->isPost()) {
            $nonFile = $request->getPost()->toArray();
            $File = $this->params()->fromFiles('fileupload');
             $data    = array_merge_recursive(
                $this->getRequest()->getPost()->toArray(),
                $this->getRequest()->getFiles()->toArray()
            );
            $form->setData($data);


            if ($form->isValid()) {
                $size = new Size(array('max' => 2000000));

                $adapter = new Http();
                $adapter->setValidators(array($size),$File['name']);
                $adapter->setOptions(array('ignoreNoFile'=>true));

                if (!$adapter->isValid())
                {
                    $dataError = $adapter->getMessages();
                    $error = array();
                    foreach ($dataError as $key => $row) {
                        $error[] = $row;
                    }
                    $form->setMessages(array('fileupload' => $error));
                } else {
                    if ($File['error'] !== 4) {
                        $adapter->setDestination(dirname(PUBLIC_PATH) . '/public/img/productos/tmp');
                        $tmp_pre = str_replace('/tmp/', '', $File['tmp_name']);
                        $file_name = $tmp_pre . '_' . $File['name'];
                        if ($adapter->receive($file_name)) {
                            $imagen = $adapter->getFileName();
                            $thumbnailer = $this->getServiceLocator()->get('WebinoImageThumb');
                            $thumb = $thumbnailer->create($imagen, $options = [], $plugins = []);

                            $thumb->adaptiveResize(100, 72);
                            $thumb_name = dirname(PUBLIC_PATH) . '/public/img/productos/thumb_' . $File['name'];

                            $thumb->save($thumb_name);
                            $rutaImagen = str_replace(PUBLIC_PATH, '', $thumb_name);

                            $producto->setImagen($rutaImagen);
                        }
                    }

                    if ($File['error'] === 4) {
                        $rutaImagen = 'img/productos/default.png';

                        $producto->setImagen($rutaImagen);
                    }



                    $vencimiento = $producto->getVencimiento();

                    if ($vencimiento !== "") {
                        if ($this->validarFechaEspanol($vencimiento)) {
                            $objectVenc = date_create_from_format('d/m/Y', $vencimiento);
                            $dateVenc = date_format($objectVenc, "Y-m-d'");
                        } else {
                            $dateVenc = ($vencimiento === '0000-00-00') ? null : $vencimiento;
                        }
                    }else {
                        $dateVenc = null;
                    }
                    $producto->setVencimiento($dateVenc);
                    $producto->setModificado(date('Y-m-d'));
                    $this->getProductoMapper()->saveProducto($producto);
                    echo ("<script type='text/javascript' >alert('Nuevo Producto Creado');</script>");
                    return $this->redirect()->toRoute('producto');
                }

            }
        }
        return array(
            'form' => $form,
        );
    }

    public function editarProductoAction()
    {
        $id = (int)$this->params('id');
        $form = $this->getCrearProductoForm();
        $producto = $this->getProductoMapper()->getProducto($id, true);
        $form->get('categoria')->setValue($producto->getIdcategoria());
        $form->get('marca')->setValue($producto->getIdmarca());
        $form->get('mayor')->setValue($producto->getUnidadmedidaalmacen());
        $form->get('detal')->setValue($producto->getUnidadmedidaventas());
        $form->bind($producto);
        $fileUploadFilter = new FileUploadFilter();
        $form->setInputFilter($fileUploadFilter->getInputFilter());
        $request = $this->getRequest();
        if ($request->isPost()) {
            $nonFile = $request->getPost()->toArray();
            $File = $this->params()->fromFiles('fileupload');
            $data    = array_merge_recursive(
                $this->getRequest()->getPost()->toArray(),
                $this->getRequest()->getFiles()->toArray()
            );
            $form->setData($data);


            if ($form->isValid()) {
                $size = new Size(array('max' => 2000000));

                $adapter = new Http();
                $adapter->setValidators(array($size),$File['name']);
                $adapter->setOptions(array('ignoreNoFile'=>true));

                if (!$adapter->isValid())
                {
                    $dataError = $adapter->getMessages();
                    $error = array();
                    foreach ($dataError as $key => $row) {
                        $error[] = $row;
                    }
                    $form->setMessages(array('fileupload' => $error));
                } else {
                    if ($File['error'] !== 4) {
                        $adapter->setDestination(dirname(PUBLIC_PATH).'/public/img/productos/tmp');
                        $tmp_pre = str_replace('/tmp/','',$File['tmp_name']);
                        $file_name =$tmp_pre . '_' . $File['name'];
                        if ($adapter->receive($file_name)) {
                            $imagen = $adapter->getFileName();
                            $thumbnailer = $this->getServiceLocator()->get('WebinoImageThumb');
                            $thumb       = $thumbnailer->create($imagen, $options = [], $plugins = []);

                            $thumb->adaptiveResize(100, 72);
                            $thumb_name = dirname(PUBLIC_PATH).'/public/img/productos/thumb_'.$File['name'];

                            $thumb->save($thumb_name);
                            $rutaImagen = str_replace(PUBLIC_PATH,'',$thumb_name);
                            $producto->setImagen($rutaImagen);
                        }
                    }

                    $vencimiento = $producto->getVencimiento();

                    if ($vencimiento !== "") {
                        if ($this->validarFechaEspanol($vencimiento)) {
                                $objectVenc = date_create_from_format('d/m/Y', $vencimiento);
                                $dateVenc = date_format($objectVenc, "Y-m-d'");
                        } else {
                                $dateVenc = ($vencimiento === '0000-00-00') ? null : $vencimiento;
                        }
                    }else {
                        $dateVenc = null;
                    }
                    $producto->setVencimiento($dateVenc);
                    $producto->setModificado(date('Y-m-d'));
                    $this->getProductoMapper()->saveProducto($producto);
                    echo ("<script type='text/javascript' >alert('Producto Editado');</script>");
                    return $this->redirect()->toRoute('producto');

                }
            }
        }
        return array(
            'form' => $form,
            'id' => $id
        );
    }

    // dates = 01-31 (and 1-9), and month = 01-12 (and 1-9).
    // preg_match("/([012]?[1-9]|[12]0|3[01])\/(0?[1-9]|1[012])\/([0-9]{4})/", $date_string)
    public function validarFechaEspanol($fecha){
        if (preg_match('/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/', $fecha)) {
            return true;
        } else {
            return false;
        }
    }

}