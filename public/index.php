<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Model\Habitacion;
use Controllers\APIController;
use Controllers\AdminController;
use Controllers\LoginController;
use Controllers\ReservaController;
use Controllers\HabitacionController;

$router = new Router();

//Iniciar sesion
$router->get('/', [LoginController::class, 'login']);
$router->post('/', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

// Recuperar password
$router->get('/olvide', [LoginController::class, 'olvide']);
$router->post('/olvide', [LoginController::class, 'olvide']);
$router->get('/recuperar', [LoginController::class, 'recuperar']);
$router->post('/recuperar', [LoginController::class, 'recuperar']);

//Crear Cuenta
$router->get('/crear-cuenta', [LoginController::class, 'crear']);
$router->post('/crear-cuenta', [LoginController::class, 'crear']);

//Confirmar cuenta
$router->get('/confirmar-cuenta', [LoginController::class, 'confirmar']);
$router->get('/mensaje', [LoginController::class, 'mensaje']);

// API de registro
$router->get('/api/habitaciones', [APIController::class, 'index']);
$router->post('/api/reservas', [APIController::class, 'guardar']);
$router->post('/api/cancelar', [APIController::class, 'cancelar']);
$router->post('/api/eliminar', [APIController::class, 'eliminar']);

// CRUD de Habitaciones
$router->get('/habitaciones', [HabitacionController::class, 'index']);
$router->get('/habitaciones/crear', [HabitacionController::class, 'crear']);
$router->post('/habitaciones/crear', [HabitacionController::class, 'crear']);
$router->get('/habitaciones/actualizar', [HabitacionController::class, 'actualizar']);
$router->post('/habitaciones/actualizar', [HabitacionController::class, 'actualizar']);
$router->post('/habitaciones/eliminar', [HabitacionController::class, 'eliminar']);

//AREA PRIVADA
$router->get('/reserva', [ReservaController::class, 'index']);
$router->get('/admin', [AdminController::class, 'index']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
