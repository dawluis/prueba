<?php

class Vectores{
    
    public $vector;
    
    public function __construct($vector){
        $this->vector=$vector;
    }
    public function Añadir($value, $key=NULL){
        if($key==NULL){
            $this->vector[]=$value;
        }else{
            $this->vector[$key]=$value;
        }
    }
    public function MostrarVector(){
        $array=$this->vector;
        $result="";
        foreach($array as $index => $value){
            if(is_array($value)){
                foreach ($value as $indice => $valor){
                    echo "[$index][$indice] => $valor ,";
                }
            }else{
                echo "[$index]=> $value ,";
            }
        }
    }
    public function DevuelveVector(){
        $array=$this->vector;
        
        foreach($array as $index => $value){
            if(is_array($value)){
                foreach ($value as $indice => $valor){
                    $array[$index][$indice] = $valor;
                }
            }else{
                $array[$index]= $value;
            }
        }
        $this->vector=$array;
        
        return $this->vector;
    }
        
}

$vector=array("hola", "pepe", "quetal", array("mas", "cosas", "dentro"),"fin");
$objeto= new Vectores($vector);

echo $objeto->MostrarVector();

echo "<br>añado hola al objeto<br>";

$objeto->Añadir("hola");

echo "<br>muestro objeto<br>";

echo $objeto->MostrarVector();

echo "<br>muestro objeto<br>";

var_dump($objeto->vector);
?>