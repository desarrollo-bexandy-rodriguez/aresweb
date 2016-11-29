<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 14/11/16
 * Time: 11:49 AM
 */

namespace Reportes\Model;


use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Expression;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Sql;

class ReportesMapper
{
    protected $tableName = 'pedidos';
    protected $dbAdapter;
    protected $sql;

    public function __construct(Adapter $dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
        $this->sql = new Sql($dbAdapter);
       $this->sql->setTable($this->tableName);
    }

    public function getPedidosDespachador($desde,$hasta)
    {
        $this->sql->setTable('pedidos');
        $objectDesde = date_create_from_format('d/m/Y', $desde);
        $objectHasta = date_create_from_format('d/m/Y', $hasta);
        $dateDesde = date_format($objectDesde,"Y-m-d'");
        $dateHasta = date_format($objectHasta,"Y-m-d'");

        $select = $this->sql->select();
        //$select->setTable('pedidos');
        $select->columns(array(
            'pedidos' => new Expression("Count(*)"),
            'estatus' => 'estatus',
        ));

        $select->join('users', 'users.id = pedidos.despachador', array('despachador' => 'displayName'), 'left');

        $select->where(array('estatus' => 4));
        $select->where->AND->between("fecha",$dateDesde,$dateHasta);
        $select->group('despachador');

        $statement = $this->sql->prepareStatementForSqlObject($select);

        $results = $statement->execute();

        if ($results instanceof ResultInterface && $results->isQueryResult()) {
            $resultSet = new ResultSet();

            $resultSet->initialize($results);
        }

        $data = $resultSet->toArray();

        return $data;
    }

    public function getPedidosDiarioDespachador($desde,$hasta)
    {
        $this->sql->setTable('pedidos');
        $objectDesde = date_create_from_format('d/m/Y', $desde);
        $objectHasta = date_create_from_format('d/m/Y', $hasta);
        $dateDesde = date_format($objectDesde,"Y-m-d'");
        $dateHasta = date_format($objectHasta,"Y-m-d'");

        $select = $this->sql->select();
        $select->columns(array(
            'fecha' => 'fecha',
            'pedidos' => new Expression("Count(*)"),
            'estatus' => 'estatus',
        ));

        $select->join('users', 'users.id = pedidos.despachador', array('despachador' => 'displayName'), 'left');

        $select->where(array('estatus' => 4));
        $select->where->AND->between("fecha",$dateDesde,$dateHasta);
        $select->group(array('fecha','despachador'));

        $statement = $this->sql->prepareStatementForSqlObject($select);

        $results = $statement->execute();

        if ($results instanceof ResultInterface && $results->isQueryResult()) {
            $resultSet = new ResultSet();

            $resultSet->initialize($results);
        }

        $data = $resultSet->toArray();

        foreach ($data as $registro)
        {
            $resultado[$registro['fecha']][]= array('nombre' => $registro['despachador'],'y' => $registro['pedidos'] );
            $prueba[$registro['despachador']][$registro['fecha']]=$registro['pedidos'] ;
        }

        $categorias = array_keys($resultado);

        foreach ($prueba as $nombre=>$valores)
        {
            foreach ($categorias as $fecha)
            {
                if (array_key_exists($fecha, $valores)){
                    $dataserie[] = (int) $valores[$fecha];
                } else {
                    $dataserie[] = null;
                }
            }

            $series[] = array('name' => $nombre, 'data' => $dataserie);
            unset($dataserie);
        }


        $json = array('categorias' => $categorias,'series' => $series);

        return $json;
    }

    public function getTopProductos($desde,$hasta)
    {
        $this->sql->setTable('productos_x_pedido');
        $objectDesde = date_create_from_format('d/m/Y', $desde);
        $objectHasta = date_create_from_format('d/m/Y', $hasta);
        $dateDesde = date_format($objectDesde,"Y-m-d'");
        $dateHasta = date_format($objectHasta,"Y-m-d'");
        $select = $this->sql->select();
        $select->columns(array(
            'cantidad' => new Expression("SUM(productos_x_pedido.cantidad)")
        ));

        $select->join('productos', 'productos.id = productos_x_pedido.producto', array('nombre' => 'nombre'), 'left');
        $select->join('pedidos', 'pedidos.id = productos_x_pedido.pedido', null, 'left');
        $select->where(array('pedidos.estatus' => 4));
        $select->where->AND->between("pedidos.fecha",$dateDesde,$dateHasta);
        $select->group('nombre');
        $select->order('cantidad DESC');
        $select->limit(20);

        $statement = $this->sql->prepareStatementForSqlObject($select);

        $results = $statement->execute();

        if ($results instanceof ResultInterface && $results->isQueryResult()) {
            $resultSet = new ResultSet();

            $resultSet->initialize($results);
        }

        $data = $resultSet->toArray();

        //$datos = array_map(function($value) { return (int)$value; },$data);
        foreach ($data as $registro)
        {
            $datos[] = array('name' => $registro['nombre'], 'y' => (int) $registro['cantidad']);
        }
        $datos[0]['sliced'] = true;
        $datos[0]['selected'] = true;

        $name = 'Productos';
        $colorByPoint = true;

        $series = array('name' => $name,'colorByPoint' => $colorByPoint, 'data' => $datos);


        return $series;
    }
}