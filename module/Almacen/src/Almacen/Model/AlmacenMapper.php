<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 02/10/16
 * Time: 12:12 PM
 */

namespace Almacen\Model;


use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Sql\Sql;
use Zend\Stdlib\Hydrator\ClassMethods;

class AlmacenMapper
{
    protected $tableName = 'almacen';
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

    public function fetchAll()
    {
        $this->sql->setTable('vista_almacen');
        $select = $this->sql->select();
        $statement = $this->sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();

        $entityPrototype = new AlmacenEntity();
        $hydrator = new ClassMethods();
        $resultset = new HydratingResultSet($hydrator, $entityPrototype);
        $resultset->initialize($results);
        return $resultset;
    }

    public function saveAlmacen(AlmacenEntity $almacen)
    {
        $this->sql->setTable('almacen');
        $hydrator = new ClassMethods();
        $data = $hydrator->extract($almacen);

        if ($almacen->getId()) {
            // update action
            $action = $this->sql->update();
            unset($data['nombtipoalmacen']);
            $action->set($data);
            $action->where(array('id' => $almacen->getId()));
        } else {
            // insert action
            $action = $this->sql->insert();
            unset($data['id']);
            unset($data['nombtipoalmacen']);
            $action->values($data);
        }
        $statement = $this->sql->prepareStatementForSqlObject($action);
        $result = $statement->execute();

        if (!$almacen->getId()) {
            $almacen->setId($result->getGeneratedValue());
        }
        return $result;
    }

    public function getAlmacen($id)
    {
        $this->sql->setTable('vista_almacen');
        $select = $this->sql->select();
        $select->where(array('id' => $id));

        $statement = $this->sql->prepareStatementForSqlObject($select);
        $result = $statement->execute()->current();
        if (!$result) {
            return null;
        }

        $hydrator = new ClassMethods();
        $almacen = new AlmacenEntity();
        $hydrator->hydrate($result, $almacen);

        return $almacen;
    }

    public function getAlmacenMayor()
    {
        $this->sql->setTable('vista_almacen');
        $select = $this->sql->select();
        $select->where(array('idtipoalmacen' => '1'));

        $statement = $this->sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();

        $entityPrototype = new AlmacenEntity();
        $hydrator = new ClassMethods();
        $resultset = new HydratingResultSet($hydrator, $entityPrototype);
        $resultset->initialize($results);
        return $resultset;

    }

    public function getAlmacenDetal()
    {
        $this->sql->setTable('vista_almacen');
        $select = $this->sql->select();
        $select->where(array('idtipoalmacen' => '2'));

        $statement = $this->sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();

        $entityPrototype = new AlmacenEntity();
        $hydrator = new ClassMethods();
        $resultset = new HydratingResultSet($hydrator, $entityPrototype);
        $resultset->initialize($results);
        return $resultset;

    }

    public function deleteAlmacen($id)
    {
        $this->sql->setTable('almacen');
        $delete = $this->sql->delete();
        $delete->where(array('id' => $id));

        $statement = $this->sql->prepareStatementForSqlObject($delete);
        return $statement->execute();
    }
}