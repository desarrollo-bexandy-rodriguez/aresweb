<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 19/09/16
 * Time: 10:23 PM
 */

namespace UnidadesMedida\Controller;


use UnidadesMedida\Service\UnidadesMedidaServiceInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class BorrarController extends AbstractActionController
{
    protected $unidadesMedidaService;

    public function __construct(UnidadesMedidaServiceInterface $unidadesMedidaService)
    {
        $this->unidadesMedidaService = $unidadesMedidaService;
    }

    public function eliminarAction()
    {
        try {
            $unidadMedida = $this->unidadesMedidaService->encontrarUnidadMedida($this->params('id'));
        } catch (\InvalidArgumentException $e) {
            return $this->redirect()->toRoute('unidadesmedida');
        }

        $request = $this->getRequest();

        if ($request->isPost()) {
            $del = $request->getPost('confirmar_eliminacion', 'no');

            if ($del === 'si') {
                $this->unidadesMedidaService->borrarUnidadMedida($unidadMedida);
            }

            return $this->redirect()->toRoute('unidadesmedida');
        }

        return new ViewModel(array(
            'unidadMedida' => $unidadMedida,
        ));
    }
}