<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 14/09/16
 * Time: 11:33 AM
 */

namespace Productos\Model;


interface ProductosInterface
{
    public function getId();

    public function getCategoria();

    public function getNombre();

    public function getUnidadMedidaVentas();

    public function getPrecioUnidad();

    public function getUnidadMedidaAlmacen();

    public function getImagen();

}