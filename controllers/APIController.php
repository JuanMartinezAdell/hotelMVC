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

    public static function eliminar()
    {
        //Leo el id de la reserva y directamene elimino la reserva que ha hecho el cliente

        //echo "Cancelando reserva...";
        //debuguear($_POST);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $reserva = Reserva::find($id);
            //debuguear($reserva);
            $reserva->eliminar();
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    public static function cancelar()
    {
        //Leo el id de la reserva y actulizao el estado de la reserva

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $reserva = Reserva::find($id);
            //debuguear($reserva);
            $reserva->actualizar();
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
}
