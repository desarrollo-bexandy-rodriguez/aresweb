<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 22/09/16
 * Time: 06:12 PM
 */

namespace Pedidos\Model;


use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Sql\Sql;
use Zend\Stdlib\Hydrator\ClassMethods;

class ItemMapper
{
    protected $tableName = 'productos_x_pedido';
    protected $dbAdapter;
    protected $sql;
    /**
     * ItemMapper constructor.
     */
    public function __construct(Adapter $dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
        $this->sql = new Sql($dbAdapter);
        $this->sql->setTable($this->tableName);
    }

    public function fetchAll()
    {
        $this->sql->setTable('vista_items');
        $select = $this->sql->select();
        $statement = $this->sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();

        $entityPrototype = new ItemEntity();
        $hydrator = new ClassMethods();
        $resultset = new HydratingResultSet($hydrator, $entityPrototype);
        $resultset->initialize($results);
        return $resultset;
    }

    public function getItemsPedido($pedido)
    {
        $this->sql->setTable('vista_items');
        $select = $this->sql->select();
        $select->where(array('pedido' => $pedido));

        $statement = $this->sql->prepareStatementForSqlObject($select);
        // echo $select->getSqlString($this->dbAdapter->getPlatform());

        $results = $statement->execute();

        if (!$results) {
            return null;
        }

        $entityPrototype = new ItemEntity();
        $hydrator = new ClassMethods();
        $resultset = new HydratingResultSet($hydrator, $entityPrototype);
        $resultset->initialize($results);
        return $resultset;
    }

    public function saveItem(ItemEntity $item)
    {
        $hydrator = new ClassMethods();
        $data = $hydrator->extract($item);

        if ( $this->getItem($item->getPedido(),$item->getProducto()) ) {
            // update action
            $action = $this->sql->update();
            unset($data['pedido']);
            unset($data['producto']);
            unset($data['nombproducto']);
            unset($data['unidmedprod']);
            unset($data['seleccion']);
             $action->set($data);
            $action->where(array('pedido' => $item->getPedido(),'producto' => $item->getProducto()));
        } else {
            // insert action
            $action = $this->sql->insert();
            unset($data['nombproducto']);
            unset($data['unidmedprod']);
            unset($data['seleccion']);
            $action->values($data);
        }
        $statement = $this->sql->prepareStatementForSqlObject($action);
        // echo $action->getSqlString($this->dbAdapter->getPlatform()); die();
        $result = $statement->execute();

        return $result;
    }

    public function getItem($pedido,$producto)
    {
        $select = $this->sql->select();
        $select->where(array('pedido' => $pedido, 'producto' => $producto));

        $statement = $this->sql->prepareStatementForSqlObject($select);
        $result = $statement->execute()->current();
        if (!$result) {
            return null;
        }

        $hydrator = new ClassMethods();
        $item = new ItemEntity();
        $hydrator->hydrate($result, $item);

        return $item;
    }

    public function deleteItems($pedido)
    {
        $this->sql->setTable('productos_x_pedido');
        $delete = $this->sql->delete();
        $delete->where(array('pedido' => $pedido));

        $statement = $this->sql->prepareStatementForSqlObject($delete);
        return $statement->execute();
    }

    public function deleteItem($pedido,$producto)
    {
        $this->sql->setTable('productos_x_pedido');
        $delete = $this->sql->delete();
        $delete->where(array('pedido' => $pedido, 'producto' => $producto));

        $statement = $this->sql->prepareStatementForSqlObject($delete);
        //echo $delete->getSqlString($this->dbAdapter->getPlatform()); die();
        return $statement->execute();
    }
}