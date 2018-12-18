<?php

class manejoArray
{
    private $contador=0;
    public $data;
    private $pila;
    

    // Creamos el array
    function __construct()
    {
        $this->data=array();
        $this->pila=array();
    }

    // Podríamos declarar el --set como añadir elemento
    public function __set($key, $value)
    {
        $this->data[$key] = $value;
        $this->contador++;
        $this->pila[]=$key;
    }

    // Busca si existe un elemento del array
    public function __isset($key)
    {
        return isset($this->data[$key]);
    }

    public function __unset($key)
    {
        unset($this->data[$key]);
        $arrayPila=$this->pila;
        for($i=0; $i < count($arrayPila); $i++ ){
            if($arrayPila[$i]==$key){
                unset($this->pila[$i]);
            }
        }
        $this->contador--;
    }
//Devuelve $data
    public function getArray()
    {
        return $this->data;
        
    }
    
    
    public function add($value, $key = NULL)
    {
        if (is_null($key)){
            $this->data[] = $value;
            $this->contador++;
            $this->pila[]=$value;
        }else{
            $this->data[$key] = $value;
            $this->contador++;}
            $this->pila[]=$key;
    }
 
    public function showCont() {
        return $this->contador;
    }
    
    public function muestraPila(){
        
        return $this->pila;
    }
    
    public function eliminaPrimero(){
        unset($this->data[0]);
        unset($this->pila[0]);
        $this->contador--;
        return true;
    }
    public function eliminaUltimo(){
        $array=$this->data;
        $cont=count($array);
        unset($this->data[$cont-1]);
        $this->contador--;
        return true;
    }
    
    
    public function muestraArray(){
        $array=$this->data;
        $count=count($array);
        
        foreach ($array as $index => $value){
            
        }
    }
    
}

// Instanciamos objeto
$objArray = new manejoArray();

//Añadimos dos elemento sin key
$objArray->add("Hola");
$objArray->add("Adios");
$objArray->add("otraCOsa");
$objArray->add("otraCOsa", "llave");

$array=$objArray->getArray();

print_r($array);
echo "<br><br>CONTADOR:<br><br>";
echo $objArray->showCont();
$objArray->eliminaPrimero();

echo "<br><br>ELIMINO EL ULTIMO Y AHORA EL ARRAY ESTO:<br><br>";

$objArray->eliminaUltimo();
$array=$objArray->getArray();
print_r($objArray->data);
echo "<br>";
echo $objArray->showCont();



?>