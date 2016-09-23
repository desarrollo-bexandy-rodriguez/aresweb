<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 22/09/16
 * Time: 01:51 PM
 */

namespace Pedidos\Model;


class PedidoEntity
{
    protected $id;
    protected $codigo;
    protected $vendedor;
    protected $nombvendedor;
    protected $preciototal;
    protected $cliente;
    protected $estatus;
    protected $nombestatus;
    protected $msgclientes;
    protected $msgventas;
    protected $msgdespacho;
    protected $despachador;
    protected $nombdespachador;
    protected $fecha;
    protected $hora;

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
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param mixed $codigo
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    /**
     * @return mixed
     */
    public function getVendedor()
    {
        return $this->vendedor;
    }

    /**
     * @param mixed $vendedor
     */
    public function setVendedor($vendedor)
    {
        $this->vendedor = $vendedor;
    }

    /**
     * @return mixed
     */
    public function getNombvendedor()
    {
        return $this->nombvendedor;
    }

    /**
     * @param mixed $nombvendedor
     */
    public function setNombvendedor($nombvendedor)
    {
        $this->nombvendedor = $nombvendedor;
    }

    /**
     * @return mixed
     */
    public function getPreciototal()
    {
        return $this->preciototal;
    }

    /**
     * @param mixed $preciototal
     */
    public function setPreciototal($preciototal)
    {
        $this->preciototal = $preciototal;
    }

    /**
     * @return mixed
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * @param mixed $cliente
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }

    /**
     * @return mixed
     */
    public function getEstatus()
    {
        return $this->estatus;
    }

    /**
     * @param mixed $estatus
     */
    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;
    }

    /**
     * @return mixed
     */
    public function getNombestatus()
    {
        return $this->nombestatus;
    }

    /**
     * @param mixed $nombestatus
     */
    public function setNombestatus($nombestatus)
    {
        $this->nombestatus = $nombestatus;
    }

    /**
     * @return mixed
     */
    public function getMsgclientes()
    {
        return $this->msgclientes;
    }

    /**
     * @param mixed $msgclientes
     */
    public function setMsgclientes($msgclientes)
    {
        $this->msgclientes = $msgclientes;
    }

    /**
     * @return mixed
     */
    public function getMsgventas()
    {
        return $this->msgventas;
    }

    /**
     * @param mixed $msgventas
     */
    public function setMsgventas($msgventas)
    {
        $this->msgventas = $msgventas;
    }

    /**
     * @return mixed
     */
    public function getMsgdespacho()
    {
        return $this->msgdespacho;
    }

    /**
     * @param mixed $msgdespacho
     */
    public function setMsgdespacho($msgdespacho)
    {
        $this->msgdespacho = $msgdespacho;
    }

    /**
     * @return mixed
     */
    public function getDespachador()
    {
        return $this->despachador;
    }

    /**
     * @param mixed $despachador
     */
    public function setDespachador($despachador)
    {
        $this->despachador = $despachador;
    }

    /**
     * @return mixed
     */
    public function getNombdespachador()
    {
        return $this->nombdespachador;
    }

    /**
     * @param mixed $nombdespachador
     */
    public function setNombdespachador($nombdespachador)
    {
        $this->nombdespachador = $nombdespachador;
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
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * @param mixed $hora
     */
    public function setHora($hora)
    {
        $this->hora = $hora;
    }


}