<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 21/09/16
 * Time: 08:40 AM
 */

namespace Productos\Controller;

use Productos\Form\CategoriaForm;
use Productos\Model\CategoriaEntity;
use Zend\Http\Request;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\Router\RouteMatch;
use Zend\View\Model\ViewModel;

class CategoriaController extends AbstractActionController
{
    public function indexAction()
    {
        $mapper = $this->getCategoriaMapper();
        return new ViewModel(array('categorias' => $mapper->fetchAll()));
    }

    public function selectAction()
    {
        $id = $this->params('id');

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

        $mapper = $this->getCategoriaMapper();
        return new ViewModel(array(
            'categorias' => $mapper->fetchAll(),
            'id' => $id,
            'urlroute' => $route,
            'urlaction' => $urlaction,
            'urlid' => $urlid,
            'urlcat' => $urlcat,
            'urldet' => $urldet,
            'urlmay' => $urlmay
        ));
    }

    public function getCategoriaMapper()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('CategoriaMapper');
    }

    public function addAction()
    {
        $form = new CategoriaForm();
        $categoria = new CategoriaEntity();
        $form->bind($categoria);

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $this->getCategoriaMapper()->saveCategoria($categoria);

                // Redirect to list of productos
                return $this->redirect()->toRoute('categoria');
            }
        }

        return array('form' => $form);
    }

    public function editAction()
    {
        $id = (int)$this->params('id');
        if (!$id) {
            return $this->redirect()->toRoute('categoria', array('action'=>'add'));
        }
        $categoria = $this->getCategoriaMapper()->getCategoria($id);

        $form = new CategoriaForm();
        $form->bind($categoria);

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $this->getCategoriaMapper()->saveCategoria($categoria);

                return $this->redirect()->toRoute('categoria');
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
        $categoria = $this->getCategoriaMapper()->getCategoria($id);
        if (!$categoria) {
            return $this->redirect()->toRoute('categoria');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            if ($request->getPost()->get('del') == 'Yes') {
                $this->getCategoriaMapper()->deleteCategoria($id);
            }

            return $this->redirect()->toRoute('categoria');
        }

        return array(
            'id' => $id,
            'categoria' => $categoria
        );
    }
}