<?php

namespace Model;

class AdminCita extends ActiveRecord {

    //Usa la función SQL de ActiveRecord
    protected static $tabla = '';
    protected static $columnasDB = ["id","hora","cliente","telefono","email","servicio_id","servicio","precio"];

    public $id;
    public $hora;
    public $cliente;
    public $telefono;
    public $email;
    public $servicio_id;
    public $servicio;
    public $precio;

    public function __construct($args = [])
    {
        $this->id = $args["id"] ?? NULL;
        $this->hora = $args["hora"] ?? "";
        $this->cliente = $args["cliente"] ?? "";
        $this->telefono = $args["telefono"] ?? "";
        $this->email = $args["email"] ?? "";
        $this->servicio_id = $args["servicio_id"] ?? "";
        $this->servicio = $args["servicio"] ?? "";
        $this->precio = $args["precio"] ?? "";
    }

}