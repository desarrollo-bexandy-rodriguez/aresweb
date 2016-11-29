<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 20/09/16
 * Time: 01:09 PM
 */

namespace Productos\Model;

use Almacen\Model\TrasladoLoteEntity;
use Zend\Db\Adapter\Adapter;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;
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

    public function fetchAll($verTodos = false, $paginated=false)
    {
        if ($verTodos) {
            $this->sql->setTable('vista_productos');
        } else {
            $this->sql->setTable('vista_productos_disponibles');
        }

        $entityPrototype = new ProductoEntity();
        $hydrator = new ClassMethods();
        $resultset = new HydratingResultSet($hydrator, $entityPrototype);

        $select = $this->sql->select();


        if ($paginated) {

            $paginatorAdapter = new DbSelect($select,$this->dbAdapter, $resultset);
            $paginator = new Paginator($paginatorAdapter);
            return $paginator;
        }

        $statement = $this->sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();
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
            unset($data['nombmarca']);
            unset($data['nombunidmedventas']);
            unset($data['nombunidmedalmacen']);
            unset($data['disponible']);
            $action->set($data);
            $action->where(array('id' => $producto->getId()));
        } else {
            // insert action
            $action = $this->sql->insert();
            unset($data['id']);
            unset($data['nombcategoria']);
            unset($data['nombmarca']);
            unset($data['nombunidmedventas']);
            unset($data['nombunidmedalmacen']);
            unset($data['disponible']);
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

    public function getProductosCategoria($idcategoria, $verTodos = false, $paginated=false)
    {
        if ($verTodos) {
            $this->sql->setTable('vista_productos');
        } else {
            $this->sql->setTable('vista_productos_disponibles');
        }
        $entityPrototype = new ProductoEntity();
        $hydrator = new ClassMethods();
        $resultset = new HydratingResultSet($hydrator, $entityPrototype);

        $select = $this->sql->select();
        $select->where(array('idcategoria' => $idcategoria));

        if ($paginated) {

            $paginatorAdapter = new DbSelect($select,$this->dbAdapter, $resultset);
            $paginator = new Paginator($paginatorAdapter);
            return $paginator;
        }

        $statement = $this->sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();
        if (!$results) {
            return null;
        }

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

    public function updatePrecio($id, $preciounidad, $modificado)
    {
        $this->sql->setTable('productos');
        $data = array('preciounidad' => $preciounidad, 'modificado' => $modificado);

        $action = $this->sql->update();
        $action->set($data);
        $action->where(array('id' => $id));

        $statement = $this->sql->prepareStatementForSqlObject($action);
        $result = $statement->execute();

        return $result;
    }

    public function getProductosTraslado($paginated=false)
    {
        $this->sql->setTable('vista_productos_traslado');

        $entityPrototype = new TrasladoLoteEntity();
        $hydrator = new ClassMethods();
        $resultset = new HydratingResultSet($hydrator, $entityPrototype);

        $select = $this->sql->select();


        if ($paginated) {

            $paginatorAdapter = new DbSelect($select,$this->dbAdapter, $resultset);
            $paginator = new Paginator($paginatorAdapter);
            return $paginator;
        }

        $statement = $this->sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();
        $resultset->initialize($results);
        return $resultset;
    }

    public function getProductosTrasladoFiltro($idcategoria, $idmarca)
    {
        $this->sql->setTable('vista_productos_traslado');

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

        $entityPrototype = new TrasladoLoteEntity();
        $hydrator = new ClassMethods();
        $resultset = new HydratingResultSet($hydrator, $entityPrototype);
        $resultset->initialize($results);
        return $resultset;
    }
}
