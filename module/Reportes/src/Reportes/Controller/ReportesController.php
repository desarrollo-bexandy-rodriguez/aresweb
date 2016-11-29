<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 01/11/16
 * Time: 07:08 PM
 */

namespace Reportes\Controller;


use HighRoller\LineChart;
use HighRoller\SeriesData;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Helper\ViewModel;

class ReportesController extends AbstractActionController
{
    public function indexAction()
    {
        return array();
    }

    public function headmapAction()
    {
        return array();
    }

    public function columnStackedAction()
    {
        return array();
    }

    public function pedidosDespachadorAction()
    {
        return array();
    }

    public function tortaAction()
    {
        return array();
    }

    public function pruebaAction()
    {


        return array();
    }

    public function traerAction()
    {
        $request = $this->getRequest();
        $response = $this->getResponse();

        if ($request->isGet()) {
            $desde = $_GET['desde'];
            $hasta = $_GET['hasta'];

            $mapper = $this->getReportesMapper();
            $databdd = $mapper->getPedidosDespachador($desde,$hasta);

            foreach ($databdd as $registro)
            {
                $categorias[] = $registro['despachador'];
                $data[] = (int) $registro['pedidos'];
            }

            $name = 'Pedidos Atendidos';
            $series = array('name' => $name,'data' => $data);

            $datos = array('categorias' => $categorias, 'series' => $series);

            $response->setContent(\Zend\Json\Json::encode(array('response' => true, 'datos' => $datos)));
        }

        return $response;
    }

    public function datosTopProductosAction()
    {
        $request = $this->getRequest();
        $response = $this->getResponse();

        if ($request->isGet()) {
            $desde = $_GET['desde'];
            $hasta = $_GET['hasta'];

            $mapper = $this->getReportesMapper();
            $databdd = $mapper->getTopProductos($desde,$hasta);

        $response->setContent(\Zend\Json\Json::encode(array('response' => true, 'datos' => $databdd)));

        }

        return $response;
    }

    public function datosPedidosDiariosDespachadorAction()
    {
        $request = $this->getRequest();
        $response = $this->getResponse();

        if ($request->isGet()) {
            $desde = $_GET['desde'];
            $hasta = $_GET['hasta'];

            $mapper = $this->getReportesMapper();
            $databdd = $mapper->getPedidosDiarioDespachador($desde,$hasta);

            //$databdd = array();

            $response->setContent(\Zend\Json\Json::encode(array('response' => true, 'datos' => $databdd)));

        }

        return $response;
    }

    public function getReportesMapper()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('ReportesMapper');
    }
}