<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 14/09/16
 * Time: 11:33 AM
 */

namespace Categorias\Model;


interface CategoriasInterface
{
    public function getId();

    public function getNombre();

    public function getImagen();

}