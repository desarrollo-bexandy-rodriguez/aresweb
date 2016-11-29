<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 05/10/16
 * Time: 02:53 PM
 */

namespace Almacen\Model;


class DisponibilidadAlmacenEntity
{
    protected $id;
    protected $idalmacen;
    protected $nombre;
    protected $idtipoalmacen;
    protected $tipoalmacen;
    protected $idproducto;
    protected $nombproducto;
    protected $producto;
    protected $idunidmedalmacen;
    protected $unidmed;
    protected $almacen;
    protected $cantidad;
    protected $reservado;
    protected $disponible;
    protected $idunidmedventas;
    protected $unidmeddetal;

    /**
     * @return mixed
     */
    public function getIdunidmedventas()
    {
        return $this->idunidmedventas;
    }

    /**
     * @param mixed $idunidmedventas
     */
    public function setIdunidmedventas($idunidmedventas)
    {
        $this->idunidmedventas = $idunidmedventas;
    }

    /**
     * @return mixed
     */
    public function getUnidmeddetal()
    {
        return $this->unidmeddetal;
    }

    /**
     * @param mixed $unidmeddetal
     */
    public function setUnidmeddetal($unidmeddetal)
    {
        $this->unidmeddetal = $unidmeddetal;
    }

    /**
     * @return mixed
     */
    public function getReservado()
    {
        return (float) $this->reservado;
    }

    /**
     * @param mixed $reservado
     */
    public function setReservado($reservado)
    {
        $this->reservado = (float) $reservado;
    }

    /**
     * @return mixed
     */
    public function getDisponible()
    {
        return (float) $this->disponible;
    }

    /**
     * @param mixed $disponible
     */
    public function setDisponible($disponible)
    {
        $this->disponible = (float) $disponible;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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
    public function getTipoalmacen()
    {
        return $this->tipoalmacen;
    }

    /**
     * @param mixed $tipoalmacen
     */
    public function setTipoalmacen($tipoalmacen)
    {
        $this->tipoalmacen = $tipoalmacen;
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
    public function getIdunidmedalmacen()
    {
        return $this->idunidmedalmacen;
    }

    /**
     * @param mixed $idunidmedalmacen
     */
    public function setIdunidmedalmacen($idunidmedalmacen)
    {
        $this->idunidmedalmacen = $idunidmedalmacen;
    }

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
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * @param mixed $producto
     */
    public function setProducto($producto)
    {
        $this->producto = $producto;
    }

    /**
     * @return mixed
     */
    public function getAlmacen()
    {
        return $this->almacen;
    }

    /**
     * @param mixed $almacen
     */
    public function setAlmacen($almacen)
    {
        $this->almacen = $almacen;
    }

    /**
     * @return mixed
     */
    public function getCantidad()
    {
        return (float) $this->cantidad;
    }

    /**
     * @param mixed $cantidad
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = (float) $cantidad;
    }


}