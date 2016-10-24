<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 02/10/16
 * Time: 06:50 PM
 */

namespace Almacen\Controller;


use Almacen\Form\AlmacenForm;
use Almacen\Model\AlmacenEntity;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class AlmacenController extends AbstractActionController
{
    public function indexAction()
    {
        $mapper = $this->getAlmacenMapper();
        return new ViewModel(array('almacenes' => $mapper->fetchAll()));
    }

    public function getAlmacenMapper()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('AlmacenMapper');
    }

    public function addAction()
    {
        $form = new AlmacenForm();
        $almacen = new AlmacenEntity();
        $form->bind($almacen);

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $this->getAlmacenMapper()->saveAlmacen($almacen);

                // Redirect to list of productos
                return $this->redirect()->toRoute('almacen');
            }
        }

        return array('form' => $form);
    }

    public function editAction()
    {
        $id = (int)$this->params('id');
        if (!$id) {
            return $this->redirect()->toRoute('almacen', array('action'=>'add'));
        }
        $almacen = $this->getAlmacenMapper()->getAlmacen($id);

        $form = new AlmacenForm();
        $form->bind($almacen);

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $this->getAlmacenMapper()->saveAlmacen($almacen);

                return $this->redirect()->toRoute('almacen');
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
        $almacen = $this->getAlmacenMapper()->getAlmacen($id);
        if (!$almacen) {
            return $this->redirect()->toRoute('almacen');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            if ($request->getPost()->get('del') == 'Si') {
                $this->getAlmacenMapper()->deleteAlmacen($id);
            }

            return $this->redirect()->toRoute('almacen');
        }

        return array(
            'id' => $id,
            'almacen' => $almacen
        );
    }
}