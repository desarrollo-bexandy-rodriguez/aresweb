<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 14/09/16
 * Time: 08:33 PM
 */

namespace Categorias\Mapper;

use Categorias\Model\CategoriasInterface;

interface CategoriasMapperInterface
{
    public function encontrar($id);

    public function encontrarTodos();

    public function guardar(CategoriasInterface $categoria);

    public function borrar(CategoriasInterface $categoria);

}