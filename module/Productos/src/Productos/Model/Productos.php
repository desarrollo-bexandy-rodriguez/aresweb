<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 14/09/16
 * Time: 11:42 AM
 */

namespace Productos\Model;


class Productos implements ProductosInterface
{
    protected $id;
    protected $categoria;
    protected $nombre;
    protected $unidad_medida_ventas;
    protected $precio_unidad;
    protected $unidad_medida_almacen;
    protected $imagen;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getUnidadMedidaVentas()
    {
        return $this->unidad_medida_ventas;
    }

    public function setUnidadMedidaVentas($unidad_medida_ventas)
    {
        $this->unidad_medida_ventas = $unidad_medida_ventas;
    }

    public function getPrecioUnidad()
    {
        return $this->precio_unidad;
    }

    public function setPrecioUnidad($precio_unidad)
    {
        $this->precio_unidad = $precio_unidad;
    }

    public function getUnidadMedidaAlmacen()
    {
        return $this->unidad_medida_almacen;
    }

    public function setUnidadMedidaAlmacen($unidad_medida_almacen)
    {
        $this->unidad_medida_almacen = $unidad_medida_almacen;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }
}