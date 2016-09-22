<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 14/09/16
 * Time: 11:31 AM
 */

namespace Productos\Service;


use Productos\Model\Productos;

class ProductosService implements ProductosServiceInterface
{
    protected $data =array(
        array(
            'id' => 1,
            'categoria' => 'Quesos',
            'nombre' => 'Queso Cerrito Chevré',
            'unidad_medida_ventas' => 'Kg',
            'precio_unidad' => '4500',
            'unidad_medida_almacen' => 'Barras',
            'imagen' => 'img/queso_cerrito_chevre.jpg',

        ),
        array(
            'id' => 2,
            'categoria' => 'Quesos',
            'nombre' => 'Queso Amarillo Torondoy',
            'unidad_medida_ventas' => 'Kg',
            'precio_unidad' => '3500',
            'unidad_medida_almacen' => 'Barras',
            'imagen' => 'img/torondoy.jpg',

        ),
        array(
            'id' => 3,
            'categoria' => 'Quesos',
            'nombre' => 'Queso Paisa',
            'unidad_medida_ventas' => 'Kg',
            'precio_unidad' => '3500',
            'unidad_medida_almacen' => 'Barras',
            'imagen' => 'img/paisa.png',

        ),
        array(
            'id' => 4,
            'categoria' => 'Quesos',
            'nombre' => 'Queso Parmesano Torondoy',
            'unidad_medida_ventas' => 'Kg',
            'precio_unidad' => '6500',
            'unidad_medida_almacen' => 'Barras',
            'imagen' => 'img/queso_parmesano_torondoy.jpg',

        ),
    );

    public function encontrarTodosProductos()
    {
        $todosProductos = array();

        foreach ($this->data as $index => $producto ) {
            $todosProductos[] = $this->encontrarProducto($index);
        }

        return $todosProductos;
    }

    public function encontrarProducto($id)
    {
        $productosData = $this->data[$id];

        $model = new Productos();
        $model->setId($productosData['id']);
        $model->setCategoria($productosData['categoria']);
        $model->setNombre($productosData['nombre']);
        $model->setUnidadMedidaVentas($productosData['unidad_medida_ventas']);
        $model->setPrecioUnidad($productosData['precio_unidad']);
        $model->setUnidadMedidaAlmacen($productosData['unidad_medida_almacen']);
        $model->setImagen($productosData['imagen']);

        return $model;
    }
}