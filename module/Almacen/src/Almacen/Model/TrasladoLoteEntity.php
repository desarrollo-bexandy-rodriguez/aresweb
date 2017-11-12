<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 27/11/16
 * Time: 08:04 PM
 */

namespace Almacen\Model;


class TrasladoLoteEntity
{
    protected $id;
    protected $idalmacenmayor;
    protected $idalmacendetal;
    protected $idproducto;
    protected $cantidad;
    protected $fecha;
    protected $idusuario;
    protected $nombmayor;
    protected $nombdetal;
    protected $nombproducto;
    protected $unidmed;
    protected $disponible;
    protected $actualizado = false;
    protected $nombcategoria;
    protected $nombmarca;


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
    public function getIdalmacenmayor()
    {
        return $this->idalmacenmayor;
    }

    /**
     * @param mixed $idalmacenmayor
     */
    public function setIdalmacenmayor($idalmacenmayor)
    {
        $this->idalmacenmayor = $idalmacenmayor;
    }

    /**
     * @return mixed
     */
    public function getIdalmacendetal()
    {
        return $this->idalmacendetal;
    }

    /**
     * @param mixed $idalmacendetal
     */
    public function setIdalmacendetal($idalmacendetal)
    {
        $this->idalmacendetal = $idalmacendetal;
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

    /**
     * @return mixed
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     * @param mixed $idusuario
     */
    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;
    }

    /**
     * @return mixed
     */
    public function getNombmayor()
    {
        return $this->nombmayor;
    }

    /**
     * @param mixed $nombmayor
     */
    public function setNombmayor($nombmayor)
    {
        $this->nombmayor = $nombmayor;
    }

    /**
     * @return mixed
     */
    public function getNombdetal()
    {
        return $this->nombdetal;
    }

    /**
     * @param mixed $nombdetal
     */
    public function setNombdetal($nombdetal)
    {
        $this->nombdetal = $nombdetal;
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
    public function getDisponible()
    {
        return $this->disponible;
    }

    /**
     * @param mixed $disponible
     */
    public function setDisponible($disponible)
    {
        $this->disponible = $disponible;
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
}