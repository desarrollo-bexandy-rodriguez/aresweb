<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 14/09/16
 * Time: 11:31 AM
 */

namespace ProductosLarge\Service;


use ProductosLarge\Mapper\ProductosLargeMapperInterface;
use ProductosLarge\Model\ProductosLarge;
use ProductosLarge\Model\ProductosLargeInterface;

class ProductosLargeService implements ProductosLargeServiceInterface
{
    protected $productosMapper;

    public function __construct(ProductosLargeMapperInterface $productosMapper)
    {
        $this->productosMapper = $productosMapper;
    }
    public function encontrarTodosProductosLarge()
    {
        return $this->productosMapper->encontrarTodos();
    }

    public function encontrarProducto($id)
    {
        return $this->productosMapper->encontrar($id);
    }

    public function guardarProducto(ProductosLargeInterface $producto)
    {
        return $this->productosMapper->guardar($producto);
    }

    public function borrarProducto(ProductosLargeInterface $producto)
    {
        return $this->productosMapper->borrar($producto);
    }
}