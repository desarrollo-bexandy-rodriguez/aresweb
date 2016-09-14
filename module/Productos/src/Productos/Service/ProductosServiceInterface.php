<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 14/09/16
 * Time: 11:26 AM
 */

namespace Productos\Service;

use Productos\Model\ProductosInterface;

interface ProductosServiceInterface
{
    public function encontrarTodosProductos();


    public function encontrarProducto($id);

}