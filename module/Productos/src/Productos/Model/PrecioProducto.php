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
    protected $name;
    protected $id;
    protected $nombcategoria;
    protected $nombmarca;
    protected $preciounidad;



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
     * @param string $name
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}