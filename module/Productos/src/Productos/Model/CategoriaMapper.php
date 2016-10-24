<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 21/09/16
 * Time: 08:41 AM
 */

namespace Productos\Model;


use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Sql\Sql;
use Zend\Stdlib\Hydrator\ClassMethods;

class CategoriaMapper
{
    protected $tableName = 'categorias';
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

    public function saveCategoria(CategoriaEntity $categoria)
    {
        $hydrator = new ClassMethods();
        $data = $hydrator->extract($categoria);

        if ($categoria->getId()) {
            // update action
            $action = $this->sql->update();
            $action->set($data);
            $action->where(array('id' => $categoria->getId()));
        } else {
            // insert action
            $action = $this->sql->insert();
            unset($data['id']);
            $action->values($data);
        }
        $statement = $this->sql->prepareStatementForSqlObject($action);
        $result = $statement->execute();

        if (!$categoria->getId()) {
            $categoria->setId($result->getGeneratedValue());
        }
        return $result;
    }

    public function getCategoria($id)
    {
        $select = $this->sql->select();
        $select->where(array('id' => $id));

        $statement = $this->sql->prepareStatementForSqlObject($select);
        $result = $statement->execute()->current();
        if (!$result) {
            return null;
        }

        $hydrator = new ClassMethods();
        $categoria = new CategoriaEntity();
        $hydrator->hydrate($result, $categoria);

        return $categoria;
    }

    public function deleteCategoria($id)
    {
        $delete = $this->sql->delete();
        $delete->where(array('id' => $id));

        $statement = $this->sql->prepareStatementForSqlObject($delete);
        return $statement->execute();
    }
}