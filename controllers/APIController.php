<?php

namespace Controllers;

use Model\Habitacion;
use Model\Reserva;

class APIController
{
    public static function index()
    {
        $habitaciones = Habitacion::join();

        echo json_encode($habitaciones);
    }

    public static function guardar()
    {
        $reserva = new Reserva($_POST);

        $resultado = $reserva->guardar();

        echo json_encode($resultado);
    }
}
