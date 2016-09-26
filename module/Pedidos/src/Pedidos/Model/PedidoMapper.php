<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 22/09/16
 * Time: 01:51 PM
 */

namespace Pedidos\Model;


use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Sql\Sql;
use Zend\Stdlib\Hydrator\ClassMethods;

class PedidoMapper
{
    protected $tableName = 'pedidos';
    protected $dbAdapter;
    protected $sql;
    /**
     * PedidoMapper constructor.
     */
    public function __construct(Adapter $dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
        $this->sql = new Sql($dbAdapter);
        $this->sql->setTable($this->tableName);
    }

    public function fetchAll()
    {
        $this->sql->setTable('vista_pedidos');
        $select = $this->sql->select();
        $statement = $this->sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();

        $entityPrototype = new PedidoEntity();
        $hydrator = new ClassMethods();
        $resultset = new HydratingResultSet($hydrator, $entityPrototype);
        $resultset->initialize($results);
        return $resultset;
    }

    public function savePedido(PedidoEntity $pedido)
    {
        $hydrator = new ClassMethods();
        $data = $hydrator->extract($pedido);

        if ($pedido->getId()) {
            // update action
            $action = $this->sql->update();
            unset($data['nombvendedor']);
            unset($data['nombestatus']);
            unset($data['msgclientes']);
            unset($data['msgventas']);
            unset($data['msgdespacho']);
            unset($data['nombdespachador']);
            $action->set($data);
            $action->where(array('id' => $pedido->getId()));
        } else {
            // insert action
            $action = $this->sql->insert();
            unset($data['id']);
            unset($data['nombvendedor']);
            unset($data['nombestatus']);
            unset($data['msgclientes']);
            unset($data['msgventas']);
            unset($data['msgdespacho']);
            unset($data['nombdespachador']);
            $action->values($data);
        }
        $statement = $this->sql->prepareStatementForSqlObject($action);
        $result = $statement->execute();

        if (!$pedido->getId()) {
            $pedido->setId($result->getGeneratedValue());
        }
        return $result;
    }

    public function getLastCodigoToday()
    {
        $today = date('Y-m-d');
        $select = $this->sql->select();
        $select->columns(array('codigo'));
        $select->where(array('fecha' => $today));
        $select->order('id DESC');
        $select->limit(1);

        $statement = $this->sql->prepareStatementForSqlObject($select);
        $result = $statement->execute()->current();

        if (!$result) {
            return 0;
        } else {
            return $result['codigo'];

        }
    }

    public function getPedido($id)
    {
        $this->sql->setTable('vista_pedidos');
        $select = $this->sql->select();
        $select->where(array('id' => $id));

        $statement = $this->sql->prepareStatementForSqlObject($select);
        $result = $statement->execute()->current();
        if (!$result) {
            return null;
        }

        $hydrator = new ClassMethods();
        $pedido = new PedidoEntity();
        $hydrator->hydrate($result, $pedido);

        return $pedido;
    }

    public function deletePedido($id)
    {
        $delete = $this->sql->delete();
        $delete->where(array('id' => $id));

        $statement = $this->sql->prepareStatementForSqlObject($delete);
        return $statement->execute();
    }
}