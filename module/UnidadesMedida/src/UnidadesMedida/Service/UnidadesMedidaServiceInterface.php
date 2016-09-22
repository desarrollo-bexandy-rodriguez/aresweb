<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 14/09/16
 * Time: 11:26 AM
 */

namespace UnidadesMedida\Service;

use UnidadesMedida\Model\UnidadesMedidaInterface;

interface UnidadesMedidaServiceInterface
{
    public function encontrarTodosUnidadesMedida();

    public function encontrarUnidadMedida($id);

    public function guardarUnidadMedida(UnidadesMedidaInterface $unidadMedida);

    public function borrarUnidadMedida(UnidadesMedidaInterface $unidadMedida);

}