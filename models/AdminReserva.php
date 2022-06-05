<?php

namespace Model;

class AdminReserva extends ActiveRecord
{
    protected static $tabla = 'reservas';
    protected static $columnasDB = ['id', 'numero', 'tipo', 'precioTAlta', 'precioTBaja', 'descripcion', 'fechaEntrada', 'fechaSalida', 'nombre', 'email', 'dni', 'direccion', 'telefono'];

    public $id;
    public $numero;
    public $tipo;
    public $precioTAlta;
    public $precioTBaja;
    public $descripcion;
    public $fechaEntrada;
    public $fechaSalida;
    public $nombre;
    public $email;
    public $dni;
    public $direccion;
    public $telefono;

    public function __construct()
    {
        $this->id = $args['id'] ?? null;
        $this->numero = $args['numero'] ?? '';
        $this->tipo = $args['tipo'] ?? '';
        $this->precioTAlta = $args['precioTAlta'] ?? '';
        $this->precioTBaja = $args['precioTBaja'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->fechaEntrada = $args['fechaEntrada'] ?? '';
        $this->fechaSalida = $args['fechaSalida'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->dni = $args['dni'] ?? '';
        $this->direccion = $args['direccion'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }
}
