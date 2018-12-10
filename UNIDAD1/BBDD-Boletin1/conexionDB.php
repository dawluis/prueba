<?php
include 'config.php';




class modelo extends PDO{
    
    private static $instance=null; 
    
    public function __construct(){
        parent::__construct('mysql:host=' . Config::$hostname . ';dbname=' . Config::$name . '', Config::$usuario, Config::$clave);
        parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        parent::exec("set names utf8");
    }
    
    public static function GetInstance(){
        if(self::$instance==null){
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function getAll(){
        $consulta="SELECT * FROM empleados";
        $resultado= $this->prepare($consulta);/*que significa el this?*/
        $resultado->execute();
        return $resultado;
    }
    
    
}



?>