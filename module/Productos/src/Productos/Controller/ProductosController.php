<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 14/09/16
 * Time: 10:48 AM
 */

namespace Productos\Controller;


use Productos\Service\ProductosServiceInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ProductosController extends AbstractActionController
{
    protected $productosService;

    public function __construct(ProductosServiceInterface $productosService)
    {
        $this->productosService = $productosService;
    }

    public function indexAction()
    {
        return new ViewModel(array(
            'productos' => $this->productosService->encontrarTodosProductos(),
        ));
    }
}