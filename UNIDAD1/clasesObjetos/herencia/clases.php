<?php

//HERENCIA: LA POSIBILIDAD DE COMPRARTIR ATRIBUTOS Y METODOS ENTRE CLASES



Class Persona{
    
    public $nombre;
    public $apellidos;
    public $altura;
    public $edad;
    
    
    public function getNombre(){
         return $this->nombre;
    }
    /**
     * @return mixed
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @return mixed
     */
    public function getAltura()
    {
        return $this->altura;
    }

    /**
     * @return mixed
     */
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * @param mixed $apellidos
     */
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }

    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    /**
     * @param mixed $altura
     */
    public function setAltura($altura)
    {
        $this->altura = $altura;
    }

    /**
     * @param mixed $edad
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;
    }
    
    public function hablar(){
        return "estoy hablando";
    }
    
    public function caminar(){
        return "estoy caminando";
    }
    
    
}


class Informatico extends Persona{
    
    public $lenguajes;
    
    public function sabeLenguajes($lenguajes){
        $this->lenguajes=$lenguajes;   
        return $this->lenguajes;
    }
    
    public function programar(){
        return "soy programador";
    }
    
    
    public function repararOrdenador(){
        return "ordenador reparado";
    }
    
    
    
    
}
class TecnicoRedes extends Informatico{
    public $auditarRedes;
    
    public function __construct(){
        $this->auditarRedes= 'experto';
    }
    
    public function auditoria(){
        return "estoy auditando esta red";
    }
}









?>