<?php

namespace Model;

class Usuario extends ActiveRecord {
    
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id','nombre','apellido','email','password','telefono','admin','confirmado','token'];
    
    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $password;
    public $telefono;
    public $admin;
    public $confirmado;
    public $token;
    
    public function __construct( $args = [] )
    {
        $this->id = $args["id"] ?? NULL;
        $this->nombre = $args["nombre"] ?? "";
        $this->apellido = $args["apellido"] ?? "";
        $this->email = $args["email"] ?? "";
        $this->password = $args["password"] ?? "";
        $this->telefono = $args["telefono"] ?? "";
        $this->admin = $args["admin"] ?? "0";
        $this->confirmado = $args["confirmado"] ?? "0";
        $this->token = $args["token"] ?? "";
    }
    
    //Mensajes de validación para crear una cuenta
    public function validarCrearCuenta() {
        
        if(!$this->nombre) {
            self::$alertas["error"][] = "El nombre es obligatorio";
        }
        
        if(!$this->apellido) {
            self::$alertas["error"][] = "El apellido es obligatorio";
        }
        
        if(!$this->telefono) {
            self::$alertas["error"][] = "El telefono es obligatorio";
        }else{
            if(!preg_match("/[0-9]{10}/",$this->telefono)) {
                self::$alertas["error"][] = "El formato del telefono es invalido";
            }
        }
        
        if(!$this->email) {
            self::$alertas["error"][] = "El correo electrónico es obligatorio";
        }
        
        if(!$this->password) {
            self::$alertas["error"][] = "La contraseña es obligatorio";
        }else{
            if(strlen($this->password) < 6) {
                self::$alertas["error"][] = "La contraseña debe contener al menos 6 caracteres";
            }
        }
        
        return self::$alertas;
        
    }
    
    //Revisa si el usuario ya existe
    public function existeUsuario() {
        
        $consulta = "SELECT * FROM " . self::$tabla . " WHERE email = '$this->email' LIMIT 1";
        $resultado = self::$db->query($consulta);
        
        if($resultado->num_rows) {
            self::$alertas["error"][] = "El usuario ya esta registrado";
        }
        
        return $resultado;
        
    }
    
    //Hashear Password
    public function hashPassword() {
        
        $this->password = password_hash($this->password,PASSWORD_BCRYPT);
        
    }
    
    //Generar un token único
    public function crearToken() {
        
        $this->token = uniqid();
        
    }
    
    //Mensajes de validación para iniciar sesión
    public function validarLogin() {
        
        if(!$this->email) {
            self::$alertas["error"][] = "El correo electrónico es obligatorio";
        }
        
        if(!$this->password) {
            self::$alertas["error"][] = "La contraseña es obligatorio";
        }
        
        return self::$alertas;
        
    }
    
    public function validarPasswordAndToken($password) {
        
        $verificarPassword = password_verify($password,$this->password);
        
        if(!$verificarPassword) {
            
            Usuario::setAlerta("error","El correo electrónico o la contraseña son incorrectas");
            
        }else {
            
            if(!$this->confirmado) {
                
                Usuario::setAlerta("error","Por favor, confirma tu cuenta para poder iniciar sesión");
                
            }else {
                
                return true;
                
            }
            
        }
        
        return false;
        
    }
    
    //Mensajes de validación para recuperar la cuenta
    public function validarEmail() {
        
        if(!$this->email) {
            self::$alertas["error"][] = "El correo electrónico es obligatorio";
        }
        
        return self::$alertas;
        
    }

}