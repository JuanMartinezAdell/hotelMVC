<?php

namespace Model;


class Habitacion extends ActiveRecord
{
    //Base de datos
    protected static $tabla = 'habitaciones';
    protected static $columnasDB = ['id', 'numero', 'tipo', 'precioTAlta', 'precioTBaja', 'estado', 'descripcion'];

    public $id;
    public $numero;
    public $tipo;
    public $precioTAlta;
    public $precioTBaja;
    public $estado;
    public $descripcion;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->numero = $args['numero'] ?? '';
        $this->tipo = $args['tipo'] ?? '';
        $this->precioTAlta = $args['precioTAlta'] ?? '';
        $this->precioTBaja = $args['precioTBaja'] ?? '';
        $this->estado = $args['estado'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
    }

    public function validar()
    {
        if (!($this->numero)) {
            self::$alertas['error'][] = "El Numero de la Habitacion es Obligatorio";
        }
        if (!is_numeric($this->numero)) {
            self::$alertas['error'][] = "El Numero de la Habitacion no es valido";
        }
        if (!$this->tipo) {
            self::$alertas['error'][] = "El Tipo de la Habitacion es Obligatorio";
        }
        if (!($this->precioTAlta)) {
            self::$alertas['error'][] = "El Precio de la Habitacion en Tarifa ALta es Obligatorio";
        }
        if (!($this->precioTBaja)) {
            self::$alertas['error'][] = "El Precio de la Habitacion en Tarifa ALta es Obligatorio";
        }
        if (!is_numeric($this->precioTAlta)) {
            self::$alertas['error'][] = "El Precio de la Habitacion en Tarifa ALta no es Valido";
        }
        if (!is_numeric($this->precioTBaja)) {
            self::$alertas['error'][] = "El Precio de la Habitacion en Tarifa Baja no es Valido";
        }
        if (!$this->estado) {
            self::$alertas['error'][] = "El Estado de la Habitacion es Obligatorio";
        }
        if (!$this->descripcion) {
            self::$alertas['error'][] = "La descripcion de la Habitacion es Obligatorio";
        }


        return self::$alertas;
    }
}
