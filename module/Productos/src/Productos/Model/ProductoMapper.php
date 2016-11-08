<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 20/09/16
 * Time: 01:09 PM
 */

namespace Productos\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\HydratingResultSet;

class ProductoMapper
{
    protected $tableName = 'productos';
    protected $dbAdapter;
    protected $sql;

    public function __construct(Adapter $dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
        $this->sql = new Sql($dbAdapter);
        $this->sql->setTable($this->tableName);
    }

    public function fetchAll($verTodos = false)
    {
        if ($verTodos) {
            $this->sql->setTable('vista_productos');
        } else {
            $this->sql->setTable('vista_productos_disponibles');
        }

        $select = $this->sql->select();
        $statement = $this->sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();

        $entityPrototype = new ProductoEntity();
        $hydrator = new ClassMethods();
        $resultset = new HydratingResultSet($hydrator, $entityPrototype);
        $resultset->initialize($results);
        return $resultset;
    }

    public function saveProducto(ProductoEntity $producto)
    {
        $this->sql->setTable('productos');
        $hydrator = new ClassMethods();
        $data = $hydrator->extract($producto);

        if ($producto->getId()) {
            // update action
            $action = $this->sql->update();
            unset($data['nombcategoria']);
            unset($data['nombunidmedventas']);
            unset($data['nombunidmedalmacen']);
            $action->set($data);
            $action->where(array('id' => $producto->getId()));
        } else {
            // insert action
            $action = $this->sql->insert();
            unset($data['id']);
            unset($data['nombcategoria']);
            unset($data['nombunidmedventas']);
            unset($data['nombunidmedalmacen']);
            $action->values($data);
        }
        $statement = $this->sql->prepareStatementForSqlObject($action);
        $result = $statement->execute();

        if (!$producto->getId()) {
            $producto->setId($result->getGeneratedValue());
        }
        return $result;
    }

    public function getProducto($id, $verTodos = false)
    {
        if ($verTodos) {
            $this->sql->setTable('vista_productos');
        } else {
            $this->sql->setTable('vista_productos_disponibles');
        }

        $select = $this->sql->select();
        $select->where(array('id' => $id));

        $statement = $this->sql->prepareStatementForSqlObject($select);
        $result = $statement->execute()->current();
        if (!$result) {
            return null;
        }

        $hydrator = new ClassMethods();
        $producto = new ProductoEntity();
        $hydrator->hydrate($result, $producto);

        return $producto;
    }

    public function getProductosCategoria($idcategoria, $verTodos = false)
    {
        if ($verTodos) {
            $this->sql->setTable('vista_productos');
        } else {
            $this->sql->setTable('vista_productos_disponibles');
        }
        $select = $this->sql->select();
        $select->where(array('idcategoria' => $idcategoria));

        $statement = $this->sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();
        if (!$results) {
            return null;
        }

        $entityPrototype = new ProductoEntity();
        $hydrator = new ClassMethods();
        $resultset = new HydratingResultSet($hydrator, $entityPrototype);
        $resultset->initialize($results);
        return $resultset;
    }

    public function deleteProducto($id)
    {
        $delete = $this->sql->delete();
        $delete->where(array('id' => $id));

        $statement = $this->sql->prepareStatementForSqlObject($delete);
        return $statement->execute();
    }

    public function getPrecios()
    {
        $this->sql->setTable('vista_productos');

        $select = $this->sql->select();
        $select->columns(array('nombmarca', 'id', 'nombre', 'preciounidad'));

        $statement = $this->sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();
        if (!$results) {
            return null;
        }

        $entityPrototype = new ProductoEntity();
        $hydrator = new ClassMethods();
        $resultset = new HydratingResultSet($hydrator, $entityPrototype);
        $resultset->initialize($results);
        return $resultset;
    }

    public function getProductosFiltro($idcategoria, $idmarca)
    {
        $this->sql->setTable('vista_productos');

        $select = $this->sql->select();
        $where = array();

        if (!empty($idcategoria)){
            $where['idcategoria'] = $idcategoria;
        }

        if (!empty($idmarca)){
            $where['idmarca'] = $idmarca;
        }


        $select->where($where);

        $statement = $this->sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();
        if (!$results) {
            return null;
        }

        $entityPrototype = new ProductoEntity();
        $hydrator = new ClassMethods();
        $resultset = new HydratingResultSet($hydrator, $entityPrototype);
        $resultset->initialize($results);
        return $resultset;
    }
}
