<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 19/09/16
 * Time: 10:23 PM
 */

namespace ProductosLarge\Controller;


use ProductosLarge\Service\ProductosLargeServiceInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class BorrarController extends AbstractActionController
{
    protected $productosService;

    public function __construct(ProductosLargeServiceInterface $productosService)
    {
        $this->productosService = $productosService;
    }

    public function eliminarAction()
    {
        try {
            $producto = $this->productosService->encontrarProducto($this->params('id'));
        } catch (\InvalidArgumentException $e) {
            return $this->redirect()->toRoute('productos-large');
        }

        $request = $this->getRequest();

        if ($request->isPost()) {
            $del = $request->getPost('confirmar_eliminacion', 'no');

            if ($del === 'si') {
                $this->productosService->borrarProducto($producto);
            }

            return $this->redirect()->toRoute('productos-large');
        }

        return new ViewModel(array(
            'producto' => $producto,
        ));
    }
}