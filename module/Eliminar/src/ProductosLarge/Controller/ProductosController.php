<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 14/09/16
 * Time: 10:48 AM
 */

namespace ProductosLarge\Controller;


use ProductosLarge\Service\ProductosLargeServiceInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ProductosLargeController extends AbstractActionController
{
    protected $productosService;

    public function __construct(ProductosLargeServiceInterface $productosService)
    {
        $this->productosService = $productosService;
    }

    public function indexAction()
    {
        return new ViewModel(array(
            'productos-large' => $this->productosService->encontrarTodosProductosLarge(),
        ));
    }

    public function detailAction()
    {
        $id = $this->params()->fromRoute('id');

        try {
            $producto = $this->productosService->encontrarProducto($id);
            $sm = $this->getServiceLocator();
            $catmapper = $sm->get('TaskMapper');
            // \Zend\Debug\Debug::dump($this->productosForm->getData());
        } catch (\InvalidArgumentException $ex) {
            return $this->redirect()->toRoute('productos-large');
        }
        return new ViewModel(array(
            'producto' => $producto,
        ));
    }

}