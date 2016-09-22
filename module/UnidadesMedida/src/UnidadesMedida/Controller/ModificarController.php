<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 18/09/16
 * Time: 11:03 AM
 */

namespace UnidadesMedida\Controller;


use UnidadesMedida\Service\UnidadesMedidaServiceInterface;
use Zend\Form\FormInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ModificarController extends AbstractActionController
{
    protected $unidadesMedidaService;

    protected $unidadesMedidaForm;

    public function __construct(
        UnidadesMedidaServiceInterface $unidadesMedidaService,
        FormInterface $unidadesMedidaForm
    )
    {
        $this->unidadesMedidaService = $unidadesMedidaService;
        $this->unidadesMedidaForm = $unidadesMedidaForm;
    }

    public function nuevoAction()
    {
        $request = $this->getRequest();

        if ($request->isPost()) {
            $this->unidadesMedidaForm->setData($request->getPost());

            if ($this->unidadesMedidaForm->isValid()) {
                try {
                    // \Zend\Debug\Debug::dump($this->unidadesMedidaForm->getData());
                    $this->unidadesMedidaService->guardarUnidadMedida($this->unidadesMedidaForm->getData());
                    return $this->redirect()->toRoute('unidadesmedida');
                } catch (\Exception $e) {
                    die($e->getMessage());
                }
            }
        }
        return new ViewModel(array(
            'form' => $this->unidadesMedidaForm,
        ));
    }

    public function editarAction()
        {
            $request = $this->getRequest();
            $unidadMedida = $this->unidadesMedidaService->encontrarUnidadMedida($this->params('id'));

            $this->unidadesMedidaForm->bind($unidadMedida);

            if ($request->isPost()) {
                $this->unidadesMedidaForm->setData($request->getPost());

                if ($this->unidadesMedidaForm->isValid()) {
                    try {
                        $this->unidadesMedidaService->guardarUnidadMedida($unidadMedida);
                        return $this->redirect()->toRoute('unidadesmedida');
                    } catch (\Exception $e) {
                        die($e->getMessage());
                    }
                }
            }

            return new ViewModel(array(
                'form' => $this->unidadesMedidaForm,
            ));
        }
}
