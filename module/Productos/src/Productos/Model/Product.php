<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 04/11/16
 * Time: 08:11 AM
 */

namespace Productos\Model;

class Product
{
/**
 * @var array
 */
protected $collection;


/**
 * @param array $collection
 * @return Product
 */
public function setCollection(array $collection)
{
    $this->collection = $collection;
    return $this;
}

/**
 * @return array
 */
public function getCollection()
{
    return $this->collection;
}
}



