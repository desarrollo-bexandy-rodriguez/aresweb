<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 18/09/16
 * Time: 11:03 AM
 */

namespace Categorias\Controller;


use Categorias\Service\CategoriasServiceInterface;
use Zend\Form\FormInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ModificarController extends AbstractActionController
{
    protected $categoriasService;

    protected $categoriasForm;

    public function __construct(
        CategoriasServiceInterface $categoriasService,
        FormInterface $categoriasForm
    )
    {
        $this->categoriasService = $categoriasService;
        $this->categoriasForm = $categoriasForm;
    }

    public function nuevoAction()
    {
        $request = $this->getRequest();

        if ($request->isPost()) {
            $this->categoriasForm->setData($request->getPost());

            if ($this->categoriasForm->isValid()) {
                try {
                    // \Zend\Debug\Debug::dump($this->categoriasForm->getData());
                    $this->categoriasService->guardarCategoria($this->categoriasForm->getData());
                    return $this->redirect()->toRoute('categorias');
                } catch (\Exception $e) {
                    die($e->getMessage());
                }
            }
        }
        return new ViewModel(array(
            'form' => $this->categoriasForm,
        ));
    }

    public function editarAction()
        {
            $request = $this->getRequest();
            $categoria = $this->categoriasService->encontrarCategoria($this->params('id'));

            $this->categoriasForm->bind($categoria);

            if ($request->isPost()) {
                $this->categoriasForm->setData($request->getPost());

                if ($this->categoriasForm->isValid()) {
                    try {
                        $this->categoriasService->guardarCategoria($categoria);
                        return $this->redirect()->toRoute('categorias');
                    } catch (\Exception $e) {
                        die($e->getMessage());
                    }
                }
            }

            return new ViewModel(array(
                'form' => $this->categoriasForm,
            ));
        }
}
