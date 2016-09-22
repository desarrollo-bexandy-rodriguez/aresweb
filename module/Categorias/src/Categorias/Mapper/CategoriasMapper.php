<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 15/09/16
 * Time: 01:14 PM
 */

namespace Categorias\Mapper;

use Categorias\Model\CategoriasInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Sql\Delete;
use Zend\Db\Sql\Insert;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Update;
use Zend\Stdlib\Hydrator\HydratorInterface;

class CategoriasMapper implements CategoriasMapperInterface
{
    protected $dbAdapter;
    protected $hydrator;
    protected $categoriasPrototype;

    public function __construct(
        AdapterInterface $dbAdapter,
        HydratorInterface $hydrator,
        CategoriasInterface $categoriasPrototype
    )
    {
        $this->dbAdapter = $dbAdapter;
        $this->hydrator = $hydrator;
        $this->categoriasPrototype = $categoriasPrototype;
    }

    public function encontrar($id)
    {
        $sql = new Sql($this->dbAdapter);
        $select = $sql->select('categorias');
        $select->where(array('id = ?' => $id));

        $stmt = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();

        if ($result instanceof ResultInterface && $result->isQueryResult() && $result->getAffectedRows()) {
            return $this->hydrator->hydrate($result->current(),$this->categoriasPrototype);
        }

        throw new \InvalidArgumentException("Categoria con ID: {$id} no encontrado.");
    }

    public function encontrarTodos()
    {
        $sql = new Sql($this->dbAdapter);
        $select = $sql->select('categorias');

        $stmt = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();

        if ($result instanceof ResultInterface && $result->isQueryResult()){
            $resultSet = new HydratingResultSet($this->hydrator, $this->categoriasPrototype);

            return $resultSet->initialize($result);
        }

        return array();
    }

    public function guardar(CategoriasInterface $categoriaObject)
    {
        $categoriaData = $this->hydrator->extract($categoriaObject);
        unset($categoriaData['id']);

        if ($categoriaObject->getId()) {
            // ID presente, es un Update (Actualizacion)
            $action = new Update('categorias');
            $action->set($categoriaData);
            $action->where(array('id = ?' => $categoriaObject->getId()));
        } else {
            // ID no presente, es un Insert (Nuevo)
            $action = new Insert('categorias');
            $action->values($categoriaData);
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
                $categoriaObject->setId($newId);
            }
            return $categoriaObject;
        }

        throw new \Exception("Error en la Base de Datos");
    }

    public function borrar(CategoriasInterface $categoriaObject)
    {
        $action = new Delete('categorias');
        $action->where(array('id = ?' => $categoriaObject->getId()));

        $sql = new Sql($this->dbAdapter);
        $stmt = $sql->prepareStatementForSqlObject($action);
        $result = $stmt->execute();

        return (bool) $result->getAffectedRows();
    }
}
