<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 03/10/16
 * Time: 08:24 PM
 */

namespace Almacen\Model;


use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Sql\Sql;
use Zend\Stdlib\Hydrator\ClassMethods;

class IngresoMapper
{
    protected $tableName = 'ingreso_almacen';
    protected $dbAdapter;
    protected $sql;
    /**
     * AlmacenMapper constructor.
     */
    public function __construct(Adapter $dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
        $this->sql = new Sql($dbAdapter);
        $this->sql->setTable($this->tableName);
    }
    public function saveIngresoProducto(IngresoEntity $ingresoEntity)
    {
        $this->sql->setTable('ingreso_almacen');
        $hydrator = new ClassMethods();
        $data = $hydrator->extract($ingresoEntity);

        if ($ingresoEntity->getId()) {
            // update action
            $action = $this->sql->update();
            unset($data['nombproducto']);
            unset($data['nombalmacen']);
            unset($data['unidmed']);
            $action->set($data);
            $action->where(array('id' => $ingresoEntity->getId()));
        } else {
            // insert action
            $action = $this->sql->insert();
            unset($data['id']);
            unset($data['nombproducto']);
            unset($data['nombalmacen']);
            unset($data['unidmed']);
            $action->values($data);
        }
        $statement = $this->sql->prepareStatementForSqlObject($action);
        $result = $statement->execute();

        if (!$ingresoEntity->getId()) {
            $ingresoEntity->setId($result->getGeneratedValue());
        }
        return $result;
    }

    public function actualizarDisponibilidadAlmacen(DisponibilidadAlmacenEntity $disponibilidadAlmacen)
    {
        $this->sql->setTable('disponibilidad_x_almacen');
        $hydrator = new ClassMethods();
        $data = $hydrator->extract($disponibilidadAlmacen);
        $existeRegistro = $this->existeRegistro($disponibilidadAlmacen->getAlmacen(), $disponibilidadAlmacen->getProducto());

        if ($existeRegistro) {
            // update action
            $action = $this->sql->update();
            unset($data['id']);
            unset($data['idalmacen']);
            unset($data['nombre']);
            unset($data['idtipoalmacen']);
            unset($data['tipoalmacen']);
            unset($data['idproducto']);
            unset($data['nombproducto']);
            unset($data['idunidmedalmacen']);
            unset($data['unidmed']);
            unset($data['disponible']);
            unset($data['producto']);
            unset($data['almacen']);
            //$data['cantidad'] = $existeRegistro->getCantidad() + $disponibilidadAlmacen->getCantidad();
            $action->set($data);
            $action->where(array('id' => $existeRegistro->getId()));
        } else {
            // insert action
            $action = $this->sql->insert();
            unset($data['id']);
            unset($data['idalmacen']);
            unset($data['nombre']);
            unset($data['idtipoalmacen']);
            unset($data['tipoalmacen']);
            unset($data['idproducto']);
            unset($data['nombproducto']);
            unset($data['idunidmedalmacen']);
            unset($data['unidmed']);
            unset($data['disponible']);
            $action->values($data);
        }
        $statement = $this->sql->prepareStatementForSqlObject($action);
        $result = $statement->execute();

        if (!$disponibilidadAlmacen->getId()) {
            $disponibilidadAlmacen->setId($result->getGeneratedValue());
        }
        return $result;
    }

    public function existeRegistro($idalmacen, $idproducto)
    {
        $this->sql->setTable('disponibilidad_x_almacen');
        $select = $this->sql->select();
        $select->where(array('producto' => $idproducto, 'almacen' => $idalmacen));

        $statement = $this->sql->prepareStatementForSqlObject($select);
        $result = $statement->execute()->current();
        if (!$result) {
            return null;
        }

        $hydrator = new ClassMethods();
        $disponiblidad = new DisponibilidadAlmacenEntity();
        $hydrator->hydrate($result, $disponiblidad);

        return $disponiblidad;
    }

    public function getDisponibilidadAlmacen($idAlmacen)
    {
        $this->sql->setTable('vista_disponibilidad_almacen');
        $select = $this->sql->select();
        $select->where(array('idalmacen' => $idAlmacen));

        $statement = $this->sql->prepareStatementForSqlObject($select);
        $result = $statement->execute();
        if (!$result) {
            return null;
        }

        $hydrator = new ClassMethods();
        $disponibilidadAlmacen = new DisponibilidadAlmacenEntity();

        $resultset = new HydratingResultSet($hydrator, $disponibilidadAlmacen);
        $resultset->initialize($result);

        return $resultset;

    }

    public function getIngresos($idAlmacen)
    {
        $this->sql->setTable('vista_ingresos');
        $select = $this->sql->select();
        $select->where(array('idalmacen' => $idAlmacen));

        $statement = $this->sql->prepareStatementForSqlObject($select);
        $result = $statement->execute();
        if (!$result) {
            return null;
        }

        $hydrator = new ClassMethods();
        $ingreso = new IngresoEntity();

        $resultset = new HydratingResultSet($hydrator, $ingreso);
        $resultset->initialize($result);

        return $resultset;

    }

}