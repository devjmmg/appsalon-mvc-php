<?php

namespace Controllers;

use Model\Servicio;
use MVC\Router;

class ServicioController {
    
    public static function index(Router $router) {

        isAdmin();
        
        $servicios = Servicio::all();
        
        $router->render("/servicios/index",[
            "nombre" => $_SESSION["nombre"],
            "servicios" => $servicios
        ]);
        
    }
    
    public static function crear(Router $router) {

        isAdmin();
        
        $servicio = new Servicio;

        $alertas = $servicio::getAlertas();

        if($_SERVER["REQUEST_METHOD"] === "POST") {
            
            $servicio->sincronizar($_POST);
            
            $alertas = $servicio->validarServicio();
            
            if(empty($alertas)){
                $servicio->guardar();
                header("Location: /servicios");
            }
            
        }
        
        $router->render("/servicios/crear",[
            "nombre" => $_SESSION["nombre"],
            "alertas" => $alertas,
            "servicio" => $servicio
        ]);
        
    }
    
    public static function actualizar(Router $router) {

        isAdmin();

        $id = $_GET["id"];
        $id = filter_var($id,FILTER_VALIDATE_INT);
        if(!$id) {
            header("Location: /servicios");
        }

        $servicio = Servicio::find($id);
        if(!$servicio) {
            header("Location: /servicios");
        }

        $alertas = $servicio::getAlertas();
        
        if($_SERVER["REQUEST_METHOD"] === "POST") {

            $servicio->sincronizar($_POST);

            $alertas = $servicio->validarServicio();

            if(empty($alertas)){
                $servicio->guardar();
                header("Location: /servicios");
            }
            
        }

        $alertas = Servicio::getAlertas();
        
        $router->render("/servicios/actualizar",[
            "nombre" => $_SESSION["nombre"],
            "alertas" => $alertas,
            "servicio" => $servicio 
        ]);
        
    }
    
    public static function eliminar() {

        isAdmin();
        
        if($_SERVER["REQUEST_METHOD"] === "POST") {

            $id = $_POST["id"];

            $servicio = Servicio::find($id);
            $servicio->eliminar();

            header("Location: /servicios");
            
        }
        
    }
    
}