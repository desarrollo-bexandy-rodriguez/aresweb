<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 15/09/16
 * Time: 01:14 PM
 */

namespace UnidadesMedida\Mapper;

use UnidadesMedida\Model\UnidadesMedidaInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Sql\Delete;
use Zend\Db\Sql\Insert;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Update;
use Zend\Stdlib\Hydrator\HydratorInterface;

class UnidadesMedidaMapper implements UnidadesMedidaMapperInterface
{
    protected $dbAdapter;
    protected $hydrator;
    protected $unidadesMedidaPrototype;

    public function __construct(
        AdapterInterface $dbAdapter,
        HydratorInterface $hydrator,
        UnidadesMedidaInterface $unidadesMedidaPrototype
    )
    {
        $this->dbAdapter = $dbAdapter;
        $this->hydrator = $hydrator;
        $this->unidadesMedidaPrototype = $unidadesMedidaPrototype;
    }

    public function encontrar($id)
    {
        $sql = new Sql($this->dbAdapter);
        $select = $sql->select('unidad_medida');
        $select->where(array('id = ?' => $id));

        $stmt = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();

        if ($result instanceof ResultInterface && $result->isQueryResult() && $result->getAffectedRows()) {
            return $this->hydrator->hydrate($result->current(),$this->unidadesMedidaPrototype);
        }

        throw new \InvalidArgumentException("Categoria con ID: {$id} no encontrado.");
    }

    public function encontrarTodos()
    {
        $sql = new Sql($this->dbAdapter);
        $select = $sql->select('unidad_medida');

        $stmt = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();

        if ($result instanceof ResultInterface && $result->isQueryResult()){
            $resultSet = new HydratingResultSet($this->hydrator, $this->unidadesMedidaPrototype);

            return $resultSet->initialize($result);
        }

        return array();
    }

    public function guardar(UnidadesMedidaInterface $unidadMedidaObject)
    {
        $unidadMedidaData = $this->hydrator->extract($unidadMedidaObject);
        unset($unidadMedidaData['id']);

        if ($unidadMedidaObject->getId()) {
            // ID presente, es un Update (Actualizacion)
            $action = new Update('unidad_medida');
            $action->set($unidadMedidaData);
            $action->where(array('id = ?' => $unidadMedidaObject->getId()));
        } else {
            // ID no presente, es un Insert (Nuevo)
            $action = new Insert('unidad_medida');
            $action->values($unidadMedidaData);
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
                $unidadMedidaObject->setId($newId);
            }
            return $unidadMedidaObject;
        }

        throw new \Exception("Error en la Base de Datos");
    }

    public function borrar(UnidadesMedidaInterface $unidadMedidaObject)
    {
        $action = new Delete('unidad_medida');
        $action->where(array('id = ?' => $unidadMedidaObject->getId()));

        $sql = new Sql($this->dbAdapter);
        $stmt = $sql->prepareStatementForSqlObject($action);
        $result = $stmt->execute();

        return (bool) $result->getAffectedRows();
    }
}
