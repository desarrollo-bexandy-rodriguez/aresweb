<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 15/09/16
 * Time: 01:14 PM
 */

namespace ProductosLarge\Mapper;

use ProductosLarge\Model\ProductosLargeInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Sql\Delete;
use Zend\Db\Sql\Insert;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Update;
use Zend\Stdlib\Hydrator\HydratorInterface;

class ZendDbSqlMapper implements ProductosLargeMapperInterface
{
    protected $dbAdapter;
    protected $hydrator;
    protected $productosPrototype;

    public function __construct(
        AdapterInterface $dbAdapter,
        HydratorInterface $hydrator,
        ProductosLargeInterface $productosPrototype
    )
    {
        $this->dbAdapter = $dbAdapter;
        $this->hydrator = $hydrator;
        $this->productosPrototype = $productosPrototype;
    }

    public function encontrar($id)
    {
        $sql = new Sql($this->dbAdapter);
        $select = $sql->select('productos-large');
        $select->where(array('id = ?' => $id));

        $stmt = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();

        if ($result instanceof ResultInterface && $result->isQueryResult() && $result->getAffectedRows()) {
            return $this->hydrator->hydrate($result->current(),$this->productosPrototype);
        }

        throw new \InvalidArgumentException("Producto con ID: {$id} no encontrado.");
    }

    public function encontrarTodos()
    {
        $sql = new Sql($this->dbAdapter);
        $select = $sql->select('productos-large');

        $stmt = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();

        if ($result instanceof ResultInterface && $result->isQueryResult()){
            $resultSet = new HydratingResultSet($this->hydrator, $this->productosPrototype);

            return $resultSet->initialize($result);
        }

        return array();
    }

    public function guardar(ProductosLargeInterface $productoObject)
    {
        $productoData = $this->hydrator->extract($productoObject);
        unset($productoData['id']);

        if ($productoObject->getId()) {
            // ID presente, es un Update (Actualizacion)
            $action = new Update('productos-large');
            $action->set($productoData);
            $action->where(array('id = ?' => $productoObject->getId()));
        } else {
            // ID no presente, es un Insert (Nuevo)
            $action = new Insert('productos-large');
            $action->values($productoData);
        }
            $sql = new Sql($this->dbAdapter);
            $stmt = $sql->prepareStatementForSqlObject($action);

        try {
            $result = $stmt->execute();

        } catch (\PDOException $e){
            print_r("Error Execute");
            echo $sql."<br>". $e->getMessage();
        }

        if ($result instanceof ResultInterface) {
            if ($newId = $result->getGeneratedValue()) {
                $productoObject->setId($newId);
            }
            return $productoObject;
        }

        throw new \Exception("Error en la Base de Datos");
    }

    public function borrar(ProductosLargeInterface $productoObject)
    {
        $action = new Delete('productos-large');
        $action->where(array('id = ?' => $productoObject->getId()));

        $sql = new Sql($this->dbAdapter);
        $stmt = $sql->prepareStatementForSqlObject($action);
        $result = $stmt->execute();

        return (bool) $result->getAffectedRows();
    }
}
