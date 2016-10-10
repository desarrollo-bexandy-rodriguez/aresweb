<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 07/10/16
 * Time: 08:00 PM
 */

namespace Almacen\Model;


use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;
use Zend\Stdlib\Hydrator\ClassMethods;

class DisponibilidadMapper
{
    protected $tableName = 'disponiblidad_productos';
    protected $dbAdapter;
    protected $sql;
    /**
     * DisponibilidadMapper constructor.
     */
    public function __construct(Adapter $dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
        $this->sql = new Sql($dbAdapter);
        $this->sql->setTable($this->tableName);
    }

    public function actualizarProducto(DisponibilidadProductoEntity $disponibilidadProducto)
    {
        $hydrator = new ClassMethods();
        $data = $hydrator->extract($disponibilidadProducto);
        $existeRegistro = $this->existeProducto($disponibilidadProducto->getIdproducto());

        if ($existeRegistro) {
            // update action
            $action = $this->sql->update();
            unset($data['id']);
            unset($data['idproducto']);
            $action->set($data);
            $action->where(array('id' => $existeRegistro->getId()));
        } else {
            // insert action
            $action = $this->sql->insert();
            unset($data['id']);
            $action->values($data);
        }
        $statement = $this->sql->prepareStatementForSqlObject($action);
        $result = $statement->execute();

        if (!$disponibilidadProducto->getId()) {
            $disponibilidadProducto->setId($result->getGeneratedValue());
        }
        return $result;
    }

    public function existeProducto($idproducto)
    {
        $select = $this->sql->select();
        $select->where(array('idproducto' => $idproducto));

        $statement = $this->sql->prepareStatementForSqlObject($select);
        $result = $statement->execute()->current();
        if (!$result) {
            return null;
        }

        $hydrator = new ClassMethods();
        $disponiblidad = new DisponibilidadProductoEntity();
        $hydrator->hydrate($result, $disponiblidad);

        return $disponiblidad;
    }
}