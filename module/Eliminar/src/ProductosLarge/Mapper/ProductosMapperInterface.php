<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 14/09/16
 * Time: 08:33 PM
 */

namespace ProductosLarge\Mapper;

use ProductosLarge\Model\ProductosLargeInterface;

interface ProductosLargeMapperInterface
{
    public function encontrar($id);

    public function encontrarTodos();

    public function guardar(ProductosLargeInterface $producto);

    public function borrar(ProductosLargeInterface $producto);

}