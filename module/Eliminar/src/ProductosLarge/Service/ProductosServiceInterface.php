<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 14/09/16
 * Time: 11:26 AM
 */

namespace ProductosLarge\Service;

use ProductosLarge\Model\ProductosLargeInterface;

interface ProductosLargeServiceInterface
{
    public function encontrarTodosProductosLarge();


    public function encontrarProducto($id);

    public function guardarProducto(ProductosLargeInterface $producto);

    public function borrarProducto(ProductosLargeInterface $producto);

}