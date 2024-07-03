<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\APIController;
use Controllers\CitaController;
use Controllers\AdminController;
use Controllers\LoginController;
use Controllers\ServicioController;

$router = new Router();

//Iniciar Sesión
$router->get("/",[LoginController::class,'login']);
$router->post("/",[LoginController::class,'login']);

//Cerrar Sesión
$router->get("/logout",[LoginController::class,'logout']);

//Olvide contraseña
$router->get("/forget",[LoginController::class,'forget']);
$router->post("/forget",[LoginController::class,'forget']);

//Restablecer contraseña
$router->get("/restore",[LoginController::class,'restore']);
$router->post("/restore",[LoginController::class,'restore']);

//Crear cuenta
$router->get("/create_account",[LoginController::class,'create_account']);
$router->post("/create_account",[LoginController::class,'create_account']);

//Confirmar cuenta
$router->get("/confirm_account",[LoginController::class,'confirm_account']);

//Mensaje despues de agregar
$router->get("/message",[LoginController::class,'message']);

//Area privada del sistema Cliente
$router->get("/client",[CitaController::class,'index']);

//API de citas
$router->get("/api/servicios",[APIController::class,'index']); //API para obtener los servicios 
$router->post("/api/citas",[APIController::class,'registrar_cita']); //API para guardar las citas
$router->post("/api/eliminar",[APIController::class,'eliminar_cita']); //API para eliminar las citas

//Area privada del sistema Admin
$router->get("/admin",[AdminController::class,'admin']);

//Controlador para los productos
$router->get("/servicios",[ServicioController::class,'index']);
$router->get("/servicios/crear",[ServicioController::class,'crear']);
$router->post("/servicios/crear",[ServicioController::class,'crear']);
$router->get("/servicios/actualizar",[ServicioController::class,'actualizar']);
$router->post("/servicios/actualizar",[ServicioController::class,'actualizar']);
$router->post("/servicios/eliminar",[ServicioController::class,'eliminar']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();