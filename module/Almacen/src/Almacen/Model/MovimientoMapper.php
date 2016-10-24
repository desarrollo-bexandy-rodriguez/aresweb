<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 07/10/16
 * Time: 10:08 AM
 */

namespace Almacen\Model;


use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Sql\Sql;
use Zend\Stdlib\Hydrator\ClassMethods;

class MovimientoMapper
{
    protected $tableName = 'movimiento_almacen';
    protected $dbAdapter;
    protected $sql;
    /**
     * MovimientoMapper constructor.
     */
    public function __construct(Adapter $dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
        $this->sql = new Sql($dbAdapter);
        $this->sql->setTable($this->tableName);
    }

    public function saveMovimiento(MovimientoEntity $movimiento)
    {
        $this->sql->setTable('movimiento_almacen');
        $hydrator = new ClassMethods();
        $data = $hydrator->extract($movimiento);

        if ($movimiento->getId()) {
            // update action
            $action = $this->sql->update();
            unset($data['nombmayor']);
            unset($data['nombdetal']);
            unset($data['nombproducto']);
            unset($data['unidmed']);
            unset($data['disponible']);
            $action->set($data);
            $action->where(array('id' => $movimiento->getId()));
        } else {
            // insert action
            $action = $this->sql->insert();
            unset($data['id']);
            unset($data['nombmayor']);
            unset($data['nombdetal']);
            unset($data['nombproducto']);
            unset($data['unidmed']);
            unset($data['disponible']);
            $action->values($data);
        }
        $statement = $this->sql->prepareStatementForSqlObject($action);
        $result = $statement->execute();

        if (!$movimiento->getId()) {
            $movimiento->setId($result->getGeneratedValue());
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

    public function getMovimientos($idAlmacen)
    {
        $this->sql->setTable('vista_movimientos');
        $select = $this->sql->select();
        $select->where(array('idalmacendetal' => $idAlmacen));

        $statement = $this->sql->prepareStatementForSqlObject($select);
        $result = $statement->execute();
        if (!$result) {
            return null;
        }

        $hydrator = new ClassMethods();
        $ingreso = new MovimientoEntity();

        $resultset = new HydratingResultSet($hydrator, $ingreso);
        $resultset->initialize($result);

        return $resultset;

    }
}