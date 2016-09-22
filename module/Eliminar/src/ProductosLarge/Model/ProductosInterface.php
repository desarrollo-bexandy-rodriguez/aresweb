<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 14/09/16
 * Time: 11:33 AM
 */

namespace ProductosLarge\Model;


interface ProductosLargeInterface
{
    public function getId();

    public function getIdcategoria();

    public function getNombre();

    public function getUnidadmedidaventas();

    public function getPreciounidad();

    public function getUnidadmedidaalmacen();

    public function getImagen();

}