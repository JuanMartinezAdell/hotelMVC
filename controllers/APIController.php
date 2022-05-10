<?php

namespace Controllers;

use Model\Habitacion;

class APIController
{
    public static function index()
    {
        $habitaciones = Habitacion::join();

        debuguear($habitaciones);
    }
}
