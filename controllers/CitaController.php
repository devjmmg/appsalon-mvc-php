<?php 

namespace Controllers;
use MVC\Router;

class CitaController {

    public static function index(Router $router) {

        isAuth();
        
        $router->render("client/index", [
            "nombre" => $_SESSION["nombre"],
            "usuario_id" => $_SESSION["usuario_id"]
        ]);
        
    }

}