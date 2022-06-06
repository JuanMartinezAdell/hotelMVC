<?php

namespace Controllers;

use MVC\Router;
use Model\Habitacion;

class HabitacionController
{


    public static function index(Router $router)
    {
        //  session_start();

        isAdmin();

        $habitaciones = Habitacion::all();

        $router->render('habitaciones/index', [
            'nombre' => $_SESSION['nombre'],
            'habitaciones' => $habitaciones
        ]);
    }

    public static function crear(Router $router)
    {
        //session_start();

        isAdmin();

        $habitacion = new Habitacion;
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $habitacion->sincronizar($_POST);

            $alertas = $habitacion->validar();

            if (empty($alertas)) {
                $habitacion->guardar();
                header('Location: /habitaciones');
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
        //session_start();

        isAdmin();

        if (!is_numeric($_GET['id'])) return;

        $habitacion = Habitacion::find($_GET['id']);
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $habitacion->sincronizar($_POST);

            $alertas = $habitacion->validar();

            if (empty($alertas)) {
                $habitacion->guardar();
                header('Location: /habitaciones');
            }
        }

        $router->render('habitaciones/actualizar', [
            'nombre' => $_SESSION['nombre'],
            'habitacion' => $habitacion,
            'alertas' => $alertas
        ]);
    }

    public static function eliminar(Router $router)
    {
        session_start();

        isAdmin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $habitacion = Habitacion::find($id);
            $habitacion->eliminar();
            header('Location: /habitaciones');
        }
    }
}
