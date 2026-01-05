<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\ClaseController;
use Controllers\InicioAdminController;
use Controllers\InicioUserController;
use Controllers\PrincipalController;
use Controllers\LoginController;
use Controllers\PlanController;
use Controllers\SuscripcionController;
use Model\Suscripcion;
use MVC\Router;

$router = new Router();

//Pagina principal

$router->get('/',[PrincipalController::class, 'principal']);

//Iniciar sesion

$router->get('/login',[LoginController::class, 'login']);
$router->post('/login',[LoginController::class, 'login']);

$router->get('/logout',[PrincipalController::class, 'principal']);
$router->post('/logout',[PrincipalController::class, 'principal']);

//Recuperar password

$router->get('/olvide',[LoginController::class, 'olvide']);
$router->post('/olvide',[LoginController::class, 'olvide']);
$router->get('/recuperar',[LoginController::class, 'recuperar']);
$router->post('/recuperar',[LoginController::class, 'recuperar']);

//Crear cuenta

$router->get('/crear-cuenta',[LoginController::class, 'crearCuenta']);
$router->post('/crear-cuenta',[LoginController::class, 'crearCuenta']);

//Pagina inicio admin

$router->get('/inicio-admin',[InicioAdminController::class, 'inicioAdmin']);

//Pagina inicio usuario

$router->get('/inicio-user',[InicioUserController::class, 'inicioUser']);

$router->get('/modificar-usuario',[LoginController::class, 'modificarUsuario']);
$router->post('/modificar-usuario',[LoginController::class, 'modificarUsuario']);

//Administrar clase

$router->get('/mostrar-clases',[ClaseController::class, 'mostrarClases']);
$router->get('/mostrar-clases-u',[ClaseController::class, 'mostrarClasesU']);

$router->get('/crear-clase',[ClaseController::class, 'crearClase']);
$router->post('/crear-clase',[ClaseController::class, 'crearClase']);

$router->get('/eliminar-clase',[ClaseController::class, 'eliminarClase']);
$router->post('/eliminar-clase',[ClaseController::class, 'eliminarClase']);

$router->get('/modificar-clase',[ClaseController::class, 'modificarClase']);
$router->post('/modificar-clase',[ClaseController::class, 'modificarClase']);

$router->get('/inscribir-clase',[ClaseController::class, 'inscribirClase']);
$router->post('/inscribir-clase',[ClaseController::class, 'inscribirClase']);

$router->get('/cancelar-clase',[ClaseController::class, 'cancelarClase']);
$router->post('/cancelar-clase',[ClaseController::class, 'cancelarClase']);

$router->get('/crear-plan',[PlanController::class, 'crearPlan']);
$router->post('/crear-plan',[PlanController::class, 'crearPlan']);

$router->get('/modificar-plan',[PlanController::class, 'modificarPlan']);
$router->post('/modificar-plan',[PlanController::class, 'modificarPlan']);

$router->get('/eliminar-plan',[PlanController::class, 'eliminarPlan']);
$router->post('/eliminar-plan',[PlanController::class, 'eliminarPlan']);

$router->get('/mostrar-planes',[PlanController::class, 'mostrarPlanes']);
$router->get('/mostrar-planes-u',[PlanController::class, 'mostrarPlanesU']);

$router->get('/realizar-suscripcion',[SuscripcionController::class, 'realizarSuscripcion']); 
$router->post('/realizar-suscripcion',[SuscripcionController::class, 'realizarSuscripcion']);

$router->get('/eliminar-suscripcion',[SuscripcionController::class, 'eliminarSuscripcion']); 
$router->post('/eliminar-suscripcion',[SuscripcionController::class, 'eliminarSuscripcion']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();

