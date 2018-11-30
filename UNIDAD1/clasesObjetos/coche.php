<?php
class Coche{
    //atributos o propiedades
    public $color;
    public $marca;
    public $modelo;
    public $velocidad;
    public $caballaje;
    public $plazas;
    
    public function __construct($color,$marca,$modelo,$velocidad,$caballaje,$plazas){
        
        $this->color=$color;
        $this->marca=$marca;
        $this->modelo=$modelo;
        $this->velocidad=$velocidad;
        $this->caballaje=$caballaje;
        $this->plazas=$plazas;
    }
    
    //Metodos, acciones que hace el objeto
    
    public function getColor() {
        //Busca en esta clase la propiedad -> X
        return $this->color;
    }
    
    public function setColor($color){
        
        $this->color=$color;
    }
    
    public function setModelo($modelo){
        $this->modelo=$modelo;
    }
    
    public function acelerar(){
        $this->velocidad++;
    }
    
    public  function frenar(){
        $this->velocidad--;
    }
    
    public  function getVelocidad(){
        return $this->velocidad;
    }
    
    public function mostrarInfo(Coche $miObjeto){
        $informacion="<h1>Informacion del coche</h1>";
        $informacion .="color: ".$miObjeto->color;
        $informacion .="<br>Modelo: ".$miObjeto->modelo;
        $informacion .="<br>velocidad: ".$miObjeto->velocidad;
        $informacion .="<br>caballaje: ".$miObjeto->caballaje;
        $informacion .="<br>marca: ".$miObjeto->marca;
        
        return $informacion;
    } 
    
}

?>