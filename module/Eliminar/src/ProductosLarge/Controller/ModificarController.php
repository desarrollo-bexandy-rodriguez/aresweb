<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 18/09/16
 * Time: 11:03 AM
 */

namespace ProductosLarge\Controller;


use ProductosLarge\Service\ProductosLargeServiceInterface;
use Zend\Form\FormInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ModificarController extends AbstractActionController
{
    protected $productosService;

    protected $productosForm;

    public function __construct(
        ProductosLargeServiceInterface $productosService,
        FormInterface $productosForm
    )
    {
        $this->productosService = $productosService;
        $this->productosForm = $productosForm;
    }

    public function nuevoAction()
    {
        $request = $this->getRequest();

        if ($request->isPost()) {
            $this->productosForm->setData($request->getPost());

            if ($this->productosForm->isValid()) {
                try {
                    // \Zend\Debug\Debug::dump($this->productosForm->getData());
                    $this->productosService->guardarProducto($this->productosForm->getData());
                    return $this->redirect()->toRoute('productos-large');
                } catch (\Exception $e) {
                    die($e->getMessage());
                }
            }
        }
        return new ViewModel(array(
            'form' => $this->productosForm,
        ));
    }

    public function editarAction()
        {
            $request = $this->getRequest();
            $producto = $this->productosService->encontrarProducto($this->params('id'));

            $this->productosForm->bind($producto);

            if ($request->isPost()) {
                $this->productosForm->setData($request->getPost());

                if ($this->productosForm->isValid()) {
                    try {
                        $this->productosService->guardarProducto($producto);
                        return $this->redirect()->toRoute('productos-large');
                    } catch (\Exception $e) {
                        die($e->getMessage());
                    }
                }
            }

            return new ViewModel(array(
                'form' => $this->productosForm,
            ));
        }
}
