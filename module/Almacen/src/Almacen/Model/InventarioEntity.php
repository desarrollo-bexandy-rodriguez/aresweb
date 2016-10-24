<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 03/10/16
 * Time: 08:25 PM
 */

namespace Almacen\Model;


class InventarioEntity
{
    protected $id;
    protected $idalmacen;
    protected $nombalmacen;
    protected $cantidad;
    protected $fecha;


    /**
     * @return mixed
     */
    public function getNombalmacen()
    {
        return $this->nombalmacen;
    }

    /**
     * @param mixed $nombalmacen
     */
    public function setNombalmacen($nombalmacen)
    {
        $this->nombalmacen = $nombalmacen;
    }

    public function __construct()
    {
        $this->fecha = date('Y-m-d');
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
    public function getIdalmacen()
    {
        return $this->idalmacen;
    }

    /**
     * @param mixed $idalmacen
     */
    public function setIdalmacen($idalmacen)
    {
        $this->idalmacen = $idalmacen;
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

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }
}

class DetalleProductoEntity
{
    protected $idproducto;
    protected $nombproducto;
    protected $unidmed;

    /**
     * @return mixed
     */
    public function getUnidmed()
    {
        return $this->unidmed;
    }

    /**
     * @param mixed $unidmed
     */
    public function setUnidmed($unidmed)
    {
        $this->unidmed = $unidmed;
    }

    /**
     * @return mixed
     */
    public function getNombproducto()
    {
        return $this->nombproducto;
    }

    /**
     * @param mixed $nombproducto
     */
    public function setNombproducto($nombproducto)
    {
        $this->nombproducto = $nombproducto;
    }

    /**
     * @return mixed
     */
    public function getIdproducto()
    {
        return $this->idproducto;
    }

    /**
     * @param mixed $idproducto
     */
    public function setIdproducto($idproducto)
    {
        $this->idproducto = $idproducto;
    }

}