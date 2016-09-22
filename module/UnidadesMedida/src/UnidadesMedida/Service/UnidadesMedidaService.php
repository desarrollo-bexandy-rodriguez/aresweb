<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 14/09/16
 * Time: 11:31 AM
 */

namespace UnidadesMedida\Service;


use UnidadesMedida\Mapper\UnidadesMedidaMapperInterface;
use UnidadesMedida\Model\UnidadesMedidaInterface;

class UnidadesMedidaService implements UnidadesMedidaServiceInterface
{
    protected $unidadesMedidaMapper;

    public function __construct(UnidadesMedidaMapperInterface $unidadesMedidaMapper)
    {
        $this->unidadesMedidaMapper = $unidadesMedidaMapper;
    }
    public function encontrarTodosUnidadesMedida()
    {
        return $this->unidadesMedidaMapper->encontrarTodos();
    }

    public function encontrarUnidadMedida($id)
    {
        return $this->unidadesMedidaMapper->encontrar($id);
    }

    public function guardarUnidadMedida(UnidadesMedidaInterface $unidadMedida)
    {
        return $this->unidadesMedidaMapper->guardar($unidadMedida);
    }

    public function borrarUnidadMedida(UnidadesMedidaInterface $unidadMedida)
    {
        return $this->unidadesMedidaMapper->borrar($unidadMedida);
    }
}