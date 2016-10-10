<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 02/10/16
 * Time: 12:13 PM
 */

namespace Almacen\Model;


class AlmacenEntity
{
    protected $id;
    protected $nombre;
    protected $idtipoalmacen;
    protected $nombtipoalmacen;

    /**
     * @return mixed
     */
    public function getIdtipoalmacen()
    {
        return $this->idtipoalmacen;
    }

    /**
     * @param mixed $idtipoalmacen
     */
    public function setIdtipoalmacen($idtipoalmacen)
    {
        $this->idtipoalmacen = $idtipoalmacen;
    }

    /**
     * @return mixed
     */
    public function getNombtipoalmacen()
    {
        return $this->nombtipoalmacen;
    }

    /**
     * @param mixed $nombtipoalmacen
     */
    public function setNombtipoalmacen($nombtipoalmacen)
    {
        $this->nombtipoalmacen = $nombtipoalmacen;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }



}