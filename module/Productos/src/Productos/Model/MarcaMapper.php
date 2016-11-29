<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 08/11/16
 * Time: 09:48 AM
 */

namespace Productos\Model;


use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Sql\Sql;
use Zend\Stdlib\Hydrator\ClassMethods;

class MarcaMapper
{
    protected $tableName = 'marca';
    protected $dbAdapter;
    protected $sql;

    public function __construct(Adapter $dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
        $this->sql = new Sql($dbAdapter);
        $this->sql->setTable($this->tableName);
    }

    public function fetchAll()
    {
        $select = $this->sql->select();
        $statement = $this->sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();

        $entityPrototype = new ProductoEntity();
        $hydrator = new ClassMethods();
        $resultset = new HydratingResultSet($hydrator, $entityPrototype);
        $resultset->initialize($results);
        return $resultset;
    }

    public function saveMarca(MarcaEntity $marca)
    {
        $hydrator = new ClassMethods();
        $data = $hydrator->extract($marca);

        if ($marca->getId()) {
            // update action
            $action = $this->sql->update();
            $action->set($data);
            $action->where(array('id' => $marca->getId()));
        } else {
            // insert action
            $action = $this->sql->insert();
            unset($data['id']);
            $action->values($data);
        }
        $statement = $this->sql->prepareStatementForSqlObject($action);
        $result = $statement->execute();

        if (!$marca->getId()) {
            $marca->setId($result->getGeneratedValue());
        }
        return $result;
    }

    public function getMarca($id)
    {
        $select = $this->sql->select();
        $select->where(array('id' => $id));

        $statement = $this->sql->prepareStatementForSqlObject($select);
        $result = $statement->execute()->current();
        if (!$result) {
            return null;
        }

        $hydrator = new ClassMethods();
        $marca = new MarcaEntity();
        $hydrator->hydrate($result, $marca);

        return $marca;
    }

    public function deleteMarca($id)
    {
        $delete = $this->sql->delete();
        $delete->where(array('id' => $id));

        $statement = $this->sql->prepareStatementForSqlObject($delete);
        return $statement->execute();
    }
}