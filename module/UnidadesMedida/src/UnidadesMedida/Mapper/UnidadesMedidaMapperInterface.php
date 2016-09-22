<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 14/09/16
 * Time: 08:33 PM
 */

namespace UnidadesMedida\Mapper;

use UnidadesMedida\Model\UnidadesMedidaInterface;

interface UnidadesMedidaMapperInterface
{
    public function encontrar($id);

    public function encontrarTodos();

    public function guardar(UnidadesMedidaInterface $unidadMedida);

    public function borrar(UnidadesMedidaInterface $unidadMedida);

}