<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 21/09/16
 * Time: 03:24 PM
 */

namespace Productos\Model;


class UnidadMedidaEntity
{
    protected $id;
    protected $nombre;
    protected $abreviatura;
    protected $simbolo;

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

    public function getAbreviatura()
    {
        return $this->abreviatura;
    }

    public function setAbreviatura($abreviatura)
    {
        $this->abreviatura = $abreviatura;
    }

    public function getSimbolo()
    {
        return $this->simbolo;
    }

    public function setSimbolo($simbolo)
    {
        $this->simbolo = $simbolo;
    }
}