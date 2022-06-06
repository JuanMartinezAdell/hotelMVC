<?php

namespace Model;

class Reserva extends ActiveRecord
{
    //Base de datos
    protected static $tabla = 'reservas';
    protected static $columnasDB = ['id', 'numhabitacion', 'fechaEntrada', 'fechaSalida'/*, 'usuarioId', 'habitacionId'*/];

    public $id;
    public $numhabitacion;
    public $fechaEntrada;
    public $fechaSalida;
    // public $usuarioId;
    // public $habitacionId;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->numhabitacion = $args['numhabitacion'] ?? '';
        $this->fechaEntrada = $args['fechaEntrada'] ?? '';
        $this->fechaSalida = $args['fechaSalida'] ?? '';
        //  $this->usuarioId = $args['usuarioId'] ?? '';
        //  $this->habitacionId = $args['habitacionId'] ?? '';
    }
}
