<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 14/09/16
 * Time: 11:42 AM
 */

namespace UnidadesMedida\Model;


class UnidadesMedida implements UnidadesMedidaInterface
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
