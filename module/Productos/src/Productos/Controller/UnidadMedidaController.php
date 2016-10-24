<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 21/09/16
 * Time: 03:25 PM
 */

namespace Productos\Controller;


use Productos\Form\UnidadMedidaForm;
use Productos\Model\UnidadMedidaEntity;
use Zend\Http\Request;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\Router\RouteMatch;
use Zend\View\Model\ViewModel;

class UnidadMedidaController extends AbstractActionController
{
    public function indexAction()
    {
        $mapper = $this->getUnidadMedidaMapper();
        return new ViewModel(array('unidadesMedida' => $mapper->fetchAll()));
    }

    public function selectAction()
    {
        $id = $this->params('id');
        $tipo = $this->params('tipo');

        $request = $this->getRequest();
        $referer = $request->getHeader('referer');
        $refererUri = $referer->getUri();
        $refererRequest = new Request();
        $refererRequest->setUri($refererUri);
        $serviceManager = $this->getServiceLocator();
        $routeStack = $serviceManager->get('Router');
        $match = $routeStack->match($refererRequest);
        if ($match instanceof RouteMatch) {
            $route = $match->getMatchedRouteName();
            $urlcontroller = $match->getParam('controller');
            $urlaction = $match->getParam('action');
            $urlid = $match->getParam('id');
            $urlcat = $match->getParam('cat');
            $urldet = $match->getParam('det');
            $urlmay = $match->getParam('may');

        }
        if (is_null($urlid)) {$urlid = 0;}
        if (is_null($urlcat)) {$urlcat = 0;}
        if (is_null($urldet)) {$urldet = 0;}
        if (is_null($urlmay)) {$urlmay = 0;}

        $mapper = $this->getUnidadMedidaMapper();
        return new ViewModel(array(
            'unidadesMedida' => $mapper->fetchAll(),
            'id' => $id,
            'tipo' => $tipo,
            'urlroute' => $route,
            'urlaction' => $urlaction,
            'urlid' => $urlid,
            'urlcat' => $urlcat,
            'urldet' => $urldet,
            'urlmay' => $urlmay
            ));
    }

    public function getUnidadMedidaMapper()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('UnidadMedidaMapper');
    }

    public function addAction()
    {
        $form = new UnidadMedidaForm();
        $unidadMedida = new UnidadMedidaEntity();
        $form->bind($unidadMedida);

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $this->getUnidadMedidaMapper()->saveUnidadMedida($unidadMedida);

                // Redirect to list of productos
                return $this->redirect()->toRoute('unidad-medida');
            }
        }

        return array('form' => $form);
    }

    public function editAction()
    {
        $id = (int)$this->params('id');
        if (!$id) {
            return $this->redirect()->toRoute('unidad-medida', array('action'=>'add'));
        }
        $unidadMedida = $this->getUnidadMedidaMapper()->getUnidadMedida($id);

        $form = new UnidadMedidaForm();
        $form->bind($unidadMedida);

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $this->getUnidadMedidaMapper()->saveUnidadMedida($unidadMedida);

                return $this->redirect()->toRoute('unidad-medida');
            }
        }

        return array(
            'id' => $id,
            'form' => $form,
        );
    }

    public function deleteAction()
    {
        $id = $this->params('id');
        $unidadMedida = $this->getUnidadMedidaMapper()->getUnidadMedida($id);
        if (!$unidadMedida) {
            return $this->redirect()->toRoute('unidad-medida');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            if ($request->getPost()->get('del') == 'Yes') {
                $this->getUnidadMedidaMapper()->deleteUnidadMedida($id);
            }

            return $this->redirect()->toRoute('unidad-medida');
        }

        return array(
            'id' => $id,
            'unidadMedida' => $unidadMedida
        );
    }
}