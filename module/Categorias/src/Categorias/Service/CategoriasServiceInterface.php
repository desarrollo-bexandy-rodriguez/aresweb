<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 14/09/16
 * Time: 11:26 AM
 */

namespace Categorias\Service;

use Categorias\Model\CategoriasInterface;

interface CategoriasServiceInterface
{
    public function encontrarTodosCategorias();


    public function encontrarCategoria($id);

    public function guardarCategoria(CategoriasInterface $categoria);

    public function borrarCategoria(CategoriasInterface $categoria);

}