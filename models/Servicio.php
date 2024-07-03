<?php

namespace Model;

class Servicio extends ActiveRecord {

    protected static $tabla = 'servicios';
    protected static $columnasDB = ['id','nombre','precio'];
    
    public $id;
    public $nombre;
    public $precio;

    public function __construct( $args = [] )
    {
        $this->id = $args["id"] ?? NULL;
        $this->nombre = $args["nombre"] ?? NULL;
        $this->precio = $args["precio"] ?? NULL;

    }

    public function validarServicio() {

        if(!$this->nombre) {
            self::$alertas["error"][] = "El nombre del servicio es obligatorio";
        }

        if(!$this->precio) {
            self::$alertas["error"][] = "El precio del servicio es obligatorio";
        }
        return self::$alertas;
    }

}