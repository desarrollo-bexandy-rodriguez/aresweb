<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 26/11/16
 * Time: 11:51 AM
 */

namespace Almacen\Model;


class IngresoProductoLoteEntity
{
    protected $nombre;
    protected $id;
    protected $nombcategoria;
    protected $nombmarca;
    protected $cantidad;
    protected $actualizado = false;
    protected $nombunidmedalmacen;

    /**
     * @return mixed
     */
    public function getNombunidmedalmacen()
    {
        return $this->nombunidmedalmacen;
    }

    /**
     * @param mixed $nombunidmedalmacen
     */
    public function setNombunidmedalmacen($nombunidmedalmacen)
    {
        $this->nombunidmedalmacen = $nombunidmedalmacen;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @return boolean
     */
    public function isActualizado()
    {
        return $this->actualizado;
    }

    /**
     * @param boolean $actualizado
     */
    public function setActualizado($actualizado)
    {
        $this->actualizado = $actualizado;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
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
    public function getNombcategoria()
    {
        return $this->nombcategoria;
    }

    /**
     * @param mixed $nombcategoria
     */
    public function setNombcategoria($nombcategoria)
    {
        $this->nombcategoria = $nombcategoria;
    }

    /**
     * @return mixed
     */
    public function getNombmarca()
    {
        return $this->nombmarca;
    }

    /**
     * @param mixed $nombmarca
     */
    public function setNombmarca($nombmarca)
    {
        $this->nombmarca = $nombmarca;
    }

    /**
     * @return mixed
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * @param mixed $cantidad
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

}