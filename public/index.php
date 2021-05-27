<?php 

require_once __DIR__ . "/../includes/app.php";

use MVC\Router;
use Controllers\PropiedadController;

$router = new Router();



$router->get('/', [PropiedadController::class, 'index']);
$router->get('/admin', [PropiedadController::class, 'index']);
$router->post('/admin', [PropiedadController::class, 'index']);
$router->get('/crear', [PropiedadController::class, 'crear']);
$router->post('/crear', [PropiedadController::class, 'crear']);
$router->get('/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/eliminar', [PropiedadController::class, 'eliminar']);



$router->comprobarRutas();