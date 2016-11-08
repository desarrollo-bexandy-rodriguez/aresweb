<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 22/10/16
 * Time: 06:26 PM
 */

namespace Despacho\Model;


class DespachoMapper
{
    protected $tableName = 'user';
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
}