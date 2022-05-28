<?php

namespace Model;


class Habitacion extends ActiveRecord
{
    //Base de datos
    protected static $tabla = 'habitaciones';
    protected static $columnasDB = ['numero', 'tipo', 'precioTAlta', 'precioTBaja', 'estado', 'descripcion', 'fechaEntrada', 'fechaSalida'];

    public $numero;
    public $tipo;
    public $precioTAlta;
    public $precioTBaja;
    public $estado;
    public $descripcion;
    public $fechaEntrada;
    public $fechaSalida;

    public function __construct($args = [])
    {
        $this->numero = $args['numero'] ?? '';
        $this->tipo = $args['tipo'] ?? '';
        $this->precioTAlta = $args['precioTAlta'] ?? '';
        $this->precioTBaja = $args['precioTBaja'] ?? '';
        $this->estado = $args['estado'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->fechaEntrada = $args['fechaEntrada'] ?? '';
        $this->fechaSalida = $args['fechaSalida'] ?? '';
    }
}
