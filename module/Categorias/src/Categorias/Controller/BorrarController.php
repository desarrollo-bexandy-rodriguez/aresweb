<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 19/09/16
 * Time: 10:23 PM
 */

namespace Categorias\Controller;


use Categorias\Service\CategoriasServiceInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class BorrarController extends AbstractActionController
{
    protected $categoriasService;

    public function __construct(CategoriasServiceInterface $categoriasService)
    {
        $this->categoriasService = $categoriasService;
    }

    public function eliminarAction()
    {
        try {
            $categoria = $this->categoriasService->encontrarCategoria($this->params('id'));
        } catch (\InvalidArgumentException $e) {
            return $this->redirect()->toRoute('categorias');
        }

        $request = $this->getRequest();

        if ($request->isPost()) {
            $del = $request->getPost('confirmar_eliminacion', 'no');

            if ($del === 'si') {
                $this->categoriasService->borrarCategoria($categoria);
            }

            return $this->redirect()->toRoute('categorias');
        }

        return new ViewModel(array(
            'categoria' => $categoria,
        ));
    }
}