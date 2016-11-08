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
 * @var string
 */
protected $name;

/**
 * @var int
 */
protected $price;

/**
 * @var Brand
 */
protected $brand;

/**
 * @var array
 */
protected $collection;

/**
 * @param string $name
 * @return Product
 */
public function setName($name)
{
    $this->name = $name;
    return $this;
}

/**
 * @return string
 */
public function getName()
{
    return $this->name;
}

/**
 * @param int $price
 * @return Product
 */
public function setPrice($price)
{
    $this->price = $price;
    return $this;
}

/**
 * @return int
 */
public function getPrice()
{
    return $this->price;
}

/**
 * @param Brand $brand
 * @return Product
 */
public function setBrand(Brand $brand)
{
    $this->brand = $brand;
    return $this;
}

/**
 * @return Brand
 */
public function getBrand()
{
    return $this->brand;
}

/**
 * @param array $categories
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



