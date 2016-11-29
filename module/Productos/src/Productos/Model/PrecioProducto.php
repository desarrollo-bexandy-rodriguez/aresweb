<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 04/11/16
 * Time: 08:45 AM
 */

namespace Productos\Model;


class PrecioProducto
{
    /**
     * @var string
     */
    protected $nombre;
    protected $id;
    protected $nombcategoria;
    protected $nombmarca;
    protected $preciounidad;
    protected $actualizado = false;

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
    public function getPreciounidad()
    {
        return $this->preciounidad;
    }

    /**
     * @param mixed $preciounidad
     */
    public function setPreciounidad($preciounidad)
    {
        $this->preciounidad = $preciounidad;
    }

    /**
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }


}