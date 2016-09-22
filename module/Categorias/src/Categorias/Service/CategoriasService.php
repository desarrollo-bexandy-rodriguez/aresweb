<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 14/09/16
 * Time: 11:31 AM
 */

namespace Categorias\Service;


use Categorias\Mapper\CategoriasMapperInterface;
use Categorias\Model\CategoriasInterface;

class CategoriasService implements CategoriasServiceInterface
{
    protected $categoriasMapper;

    public function __construct(CategoriasMapperInterface $categoriasMapper)
    {
        $this->categoriasMapper = $categoriasMapper;
    }
    public function encontrarTodosCategorias()
    {
        return $this->categoriasMapper->encontrarTodos();
    }

    public function encontrarCategoria($id)
    {
        return $this->categoriasMapper->encontrar($id);
    }

    public function guardarCategoria(CategoriasInterface $categoria)
    {
        return $this->categoriasMapper->guardar($categoria);
    }

    public function borrarCategoria(CategoriasInterface $categoria)
    {
        return $this->categoriasMapper->borrar($categoria);
    }
}