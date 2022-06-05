<?php

namespace Controllers;

use MVC\Router;
use Model\Habitacion;

class HabitacionController
{


    public static function index(Router $router)
    {
        //session_start();

        $habitaciones = Habitacion::all();

        $router->render('habitaciones/index', [
            'nombre' => $_SESSION['nombre'],
            'habitaciones' => $habitaciones
        ]);
    }

    public static function crear(Router $router)
    {

        $habitacion = new Habitacion;
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $habitacion->sincronizar($_POST);

            $alertas = $habitacion->validar();

            if (empty($alertas)) {
                $habitacion->guardar();
                header('Locatio: /habitacion');
            }
        }

        $router->render('habitaciones/crear', [
            'nombre' => $_SESSION['nombre'],
            'habitacion' => $habitacion,
            'alertas' => $alertas
        ]);
    }

    public static function actualizar(Router $router)
    {


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        }

        $router->render('habitaciones/actualizar', [
            'nombre' => $_SESSION['nombre'],

        ]);
    }

    public static function eliminar(Router $router)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        }

        $router->render('habitaciones/eliminar', [
            'nombre' => $_SESSION['nombre']
        ]);
    }
}
