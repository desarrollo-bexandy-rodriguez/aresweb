<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 14/09/16
 * Time: 10:48 AM
 */

namespace Categorias\Controller;


use Categorias\Service\CategoriasServiceInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ListarController extends AbstractActionController
{
    protected $categoriasService;

    public function __construct(CategoriasServiceInterface $categoriasService)
    {
        $this->categoriasService = $categoriasService;
    }

    public function indexAction()
    {
        return new ViewModel(array(
            'categorias' => $this->categoriasService->encontrarTodosCategorias(),
        ));
    }

    public function detalleAction()
    {
        $id = $this->params()->fromRoute('id');

        try {
            $categoria = $this->categoriasService->encontrarCategoria($id);
        } catch (\InvalidArgumentException $ex) {
            return $this->redirect()->toRoute('categorias');
        }
        return new ViewModel(array(
            'categoria' => $categoria,
        ));
    }

}