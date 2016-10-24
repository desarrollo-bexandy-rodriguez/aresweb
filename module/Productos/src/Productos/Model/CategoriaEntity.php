<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 21/09/16
 * Time: 08:43 AM
 */

namespace Productos\Model;


class CategoriaEntity
{
    protected $id;
    protected $nombre;
    protected $imagen;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
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