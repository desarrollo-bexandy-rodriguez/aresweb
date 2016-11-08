<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 31/10/16
 * Time: 05:27 PM
 */

namespace TestAjax\Controller;


use TestAjax\Model\TestEntity;
use Zend\Form\Annotation\AnnotationBuilder;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

class SkeletonController extends AbstractActionController
{
    public function indexAction()
    {
        return array();
    }

    protected function getForm()
    {
        $builder    = new AnnotationBuilder();
        $entity     = new TestEntity();
        $form       = $builder->createForm($entity);

        return $form;
    }

    public function savetodb()
    {
        // codigo
    }

    public function showformAction()
    {
        $viewmodel  = new ViewModel();
        $form       = $this->getForm();
        $request    = $this->getRequest();

        //disable layout if request by Ajax
        $viewmodel->setTerminal($request->isXmlHttpRequest());

        $is_xmlhttprequest = 1;
        if (! $request->isXmlHttpRequest()) {
            //if NOT using Ajax
            $is_xmlhttprequest = 0;
            if ($request->isPost()){
                $form->setData($request->getPost());
                if ($form->isValid()){
                    //save to db<img src="https://s0.wp.com/wp-content/mu-plugins/wpcom-smileys/twemoji/2/svg/1f609.svg" alt="😉" class="emoji" draggable="false">
                    $this->savetodb($form->getData());
                }
            }
        }

        $viewmodel->setVariables(array(
            'form' => $form,
            // is_xmlhttprequest is needed for check this form is in modal dialog or not
            // in view
            'is_xmlhttprequest' => $is_xmlhttprequest
        ));

        return $viewmodel;
    }

    public function validatepostajaxAction()
    {
        $form       = $this->getForm();
        $request    = $this->getRequest();
        $response   = $this->getResponse();

        $messages   = array();

        if ($request->isPost()){
            $form->setData($request->getPost());

            if (! $form->isValid()){
                $errors = $form->getMessages();
                foreach($errors as $key => $row)
                {
                    if (!empty($row) && $key != 'submit'){
                        foreach($row as $keyer => $rower)
                        {
                            // save error(s) per-element that
                            // needed by Javascript
                            $messages[$key][] = $rower;
                        }
                    }
                }
            }

            if (!empty($messages)){
                $response->setContent(\Zend\Json\Json::encode($messages));
            } else {
                //save to db<img src="https://s0.wp.com/wp-content/mu-plugins/wpcom-smileys/twemoji/2/svg/1f609.svg" alt="😉" class="emoji" draggable="false">
                $this->savetodb($form->getData());
                $response->setContent(\Zend\Json\Json::encode(array('success' => 1)));
            }

        }

        return $response;
    }

    public function pruebaAction()
    {
        $categorias = $this->getCategoriaMapper()->fetchAll();
        $mapper = $this->getProductoMapper();

        $productos = $mapper->fetchAll(true);

        return new ViewModel(array(
            'productos' => $productos,
            'categorias' => $categorias,
        ));
    }

    public function updateAction()
    {
        $request = $this->getRequest();
        $response = $this->getResponse();

        $mapper = $this->getProductoMapper();

        if ($request->isPost()) {
            $post_data = $request->getPost();
            $cat_id = $post_data['id'];

            if ($cat_id === "0") {
                if($productos = $mapper->fetchAll(true)){
                    $arreglo = $productos->toArray();
                    $response->setContent(\Zend\Json\Json::encode(array('response' => true, 'productos' => $arreglo)));
                } else {
                    $response->setContent(\Zend\Json\Json::encode(array('response' => false)));
                }

            } else {
                if ($productos = $mapper->getProductosCategoria($cat_id, true)){
                    $arreglo = $productos->toArray();
                    $response->setContent(\Zend\Json\Json::encode(array('response' => true, 'productos' => $arreglo)));
                }  else {
                    $response->setContent(\Zend\Json\Json::encode(array('response' => false)));
                }

            }

        } else {
            if ($productos = $mapper->fetchAll(true)){
                $arreglo = $productos->toArray();
                $response->setContent(\Zend\Json\Json::encode(array('response' => true, 'productos' => $arreglo)));
            } else {
                $response->setContent(\Zend\Json\Json::encode(array('response' => false)));
            }
        }

        return $response;
    }

    public function getProductoMapper()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('ProductoMapper');
    }

    public function getCategoriaMapper()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('CategoriaMapper');
    }

    public function getUnidadMedidaMapper()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('UnidadMedidaMapper');
    }
}