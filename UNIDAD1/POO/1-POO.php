<?php
//CREAMOS UNA CLASE
class Usuario{
    private $nombre;
    private $usuario;
    private $email;
    private $contrasena;
    
    //INICIALIZAR LAS VARIABLES Y NOS FACILITA LA ENTRADA DE DATOS CUANDO LO LLAMAMOS EN UN OBJETO. ES ESTRICTO Y NECESITA TODOS LOS DATOS PARA FUNCIONAR
    function __construct($nombre,$usuario,$email,$contrasena){
        $this ->nombre=$nombre;
        $this ->usuario=$usuario;
        $this ->email=$email;
        $this ->contrasena=$contrasena;
    }
    //IMPRIMIR EN PANTALLA LOS VALORES INDICADOS
    function __toString(){
        return $this->nombre.','.$this->usuario.','.$this->email.','.$this->contrasena.'<br>';
    }
    //INSTERTAR O CAMBIAR VALORES DE LA VARIABLE QUE LE INDICQUEMOS
    function __set($var, $valor){
        if(property_exists(__CLASS__, $var)){
            $this->$var=$valor;
        }
    }
    //SACAR EL VALOR DE LA VARIABLE QUE LE INDIQUEMOS
    function __get($var){
        if(property_exists(__CLASS__, $var)){
            return $this->$var;
        }
    }
    
}

$user= new Usuario("Luis", "marco", "asdas@asda.com", "contraseña");
$user2= new Usuario("Pepe", "tal", "pepe@asd.com", "lacontra");



//MOSTRAR EL VALOR (GET)
//echo $user->nombre;

//AQUI CAMBIAMOS DATO NOMBRE EN EL OBJETO USERS2 (SET)
$user2->nombre="Juan";

//IMPRIMOS TODOS LOS VALORES  DEL OBJETO (TOSTRING)
echo $user2;





?>