<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 14/09/16
 * Time: 10:48 AM
 */

namespace UnidadesMedida\Controller;


use UnidadesMedida\Service\UnidadesMedidaServiceInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ListarController extends AbstractActionController
{
    protected $unidadesMedidaService;

    public function __construct(UnidadesMedidaServiceInterface $unidadesMedidaService)
    {
        $this->unidadesMedidaService = $unidadesMedidaService;
    }

    public function indexAction()
    {
        return new ViewModel(array(
            'unidadesMedida' => $this->unidadesMedidaService->encontrarTodosUnidadesMedida(),
        ));
    }

    public function detalleAction()
    {
        $id = $this->params()->fromRoute('id');

        try {
            $unidadMedida = $this->unidadesMedidaService->encontrarUnidadMedida($id);
        } catch (\InvalidArgumentException $ex) {
            return $this->redirect()->toRoute('unidadesmedida');
        }
        return new ViewModel(array(
            'unidadMedida' => $unidadMedida,
        ));
    }

}