<?php

namespace Controllers;

use Model\AdminReserva;
use MVC\Router;

class AdminController
{
    public static function index(Router $router)
    {
        //session_start();

        // Consultar la base de datos
        $consulta = "SELECT habitaciones.numero, habitaciones.tipo, habitaciones.precioTAlta, habitaciones.precioTBaja, habitaciones.descripcion, reservas.fechaEntrada, reservas.fechaSalida, CONCAT (usuarios.nombre, '  ', usuarios.apellido) AS nombre, ";
        $consulta .= "  usuarios.email, usuarios.dni, usuarios.direccion, usuarios.telefono ";
        $consulta .= "FROM reservas ";
        $consulta .= "LEFT OUTER JOIN usuarios ";
        $consulta .= " ON reservas.usuarioId=usuarios.id ";
        $consulta .= "LEFT OUTER JOIN habitaciones ";
        $consulta .= "ON reservas.habitacionId=habitaciones.id ";
        // $consulta .= "WHERE  fechaEntrada >= '${fechaEntrada}' AND fechaSalida <= '${fechaSalida}' ";

        $reservas = AdminReserva::SQL($consulta);

        //debuguear($reservas);

        $router->render('admin/index', [
            'nombre' => $_SESSION['nombre'],
            'reservas' => $reservas
        ]);
    }
}
