<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 14/09/16
 * Time: 11:42 AM
 */

namespace ProductosLarge\Model;


class ProductosLarge implements ProductosLargeInterface
{
    protected $id;
    protected $idcategoria;
    protected $nombre;
    protected $unidadmedidaventas;
    protected $preciounidad;
    protected $unidadmedidaalmacen;
    protected $imagen;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getIdcategoria()
    {
        return $this->idcategoria;
    }

    public function setIdcategoria($idcategoria)
    {
        $this->idcategoria = $idcategoria;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getUnidadmedidaventas()
    {
        return $this->unidadmedidaventas;
    }

    public function setUnidadmedidaventas($unidadmedidaventas)
    {
        $this->unidadmedidaventas = $unidadmedidaventas;
    }

    public function getPreciounidad()
    {
        return $this->preciounidad;
    }

    public function setPreciounidad($preciounidad)
    {
        $this->preciounidad = $preciounidad;
    }

    public function getUnidadmedidaalmacen()
    {
        return $this->unidadmedidaalmacen;
    }

    public function setUnidadmedidaalmacen($unidadmedidaalmacen)
    {
        $this->unidadmedidaalmacen = $unidadmedidaalmacen;
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
