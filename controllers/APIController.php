<?php

namespace Controllers;

use Model\Cita;
use MVC\Router;
use Model\Servicio;
use Model\CitaServicio;

class APIController {

    public static function index() {

        $servicios = Servicio::all();
        echo json_encode($servicios);

    }

    public static function registrar_cita() {

        $cita = new Cita($_POST);
        $resultado = $cita->guardar();

        $servicios_id = explode(",",$_POST["servicio_id"]);

        foreach ($servicios_id as $servicio_id) {

            $args = [
                "cita_id" => $resultado["id"],
                "servicio_id" => $servicio_id
            ];

            $citaServicio = new CitaServicio($args);
            $citaServicio->guardar();

        }

        echo json_encode(["resultado" => true]);

    }

    public static function eliminar_cita(Router $router) {

        if($_SERVER["REQUEST_METHOD"] === "POST") {

            $id = $_POST["id"];

            //Como en la base de datos las propiedades de integridad referencial son 
            //ON DELETE NO ACTION
            //ON UPDATE NO ACTION
            //Tenemos que leiminar primero los registros hijos que tengan la relación

            $consulta = "SELECT id FROM citasservicios WHERE cita_id = $id";
            $resultado = CitaServicio::SQL($consulta);

            foreach($resultado as $r):

                $citaServicio = CitaServicio::find($r->id);
                $citaServicio->eliminar();

            endforeach;

            //Despues eliminar el padre
            $cita = Cita::find($id);
            $cita->eliminar();

            header("Location:" . $_SERVER["HTTP_REFERER"]);

        }

    }

}