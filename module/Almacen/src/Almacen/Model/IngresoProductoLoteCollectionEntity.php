<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 26/11/16
 * Time: 11:55 AM
 */

namespace Almacen\Model;


class IngresoProductoLoteCollectionEntity
{
    protected $collection;

    /**
     * @return mixed
     */
    public function getCollection()
    {
        return $this->collection;
    }

    /**
     * @param mixed $collection
     */
    public function setCollection($collection)
    {
        $this->collection = $collection;
    }


}