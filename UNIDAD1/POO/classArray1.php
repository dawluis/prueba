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
        $valor=$this->pila[0];
        unset($this->data[$valor]);
        $this->contador--;
    }
    
    public function eliminaUltimo(){
        $arreglo=$this->pila;
        $cont=count($arreglo);
        $val=$this->pila[$cont-1];
        unset($this->data[$val]);
        $this->contador--;
    }
    
    
    public static  function muestraArray($array){
        foreach ($array as $index => $value){
            if(is_array($value)){
                self::muestraArray($array[$index]);
            }else{
                $vector[$index]=$value;
            }
        }
        return $vector;
    }
    
    
    public function ordenaArrayPorKey(){
        $array=$this->data;
        ksort($array);
        $this->data=$array;
    }
    
    public function ordenaArrayPorValor(){
        $array=$this->data;
        $arrayOrdenado= asort($array);
        $this->data=$arrayOrdenado;
    }
    
}

// Instanciamos objeto
$objArray = new manejoArray();

//Añadimos dos elemento sin key
$objArray->add("Hola","x");
$objArray->add("hola", "b");
$objArray->add("hola", "c");
$objArray->add("hola", "a");

$array=$objArray->getArray();

print_r($array);
echo "<br><br>CONTADOR:<br><br>";
echo $objArray->showCont();


echo "<br><br>ELIMINO EL ULTIMO Y AHORA EL ARRAY ESTO:<br><br>";
$objArray->eliminaPrimero();
$objArray->eliminaUltimo();
$array=$objArray->getArray();
print_r($objArray->data);
echo "<br>";
echo $objArray->showCont();
echo "<br>";
$objArray->ordenaArrayPorKey();
$array=$objArray->getArray();
print_r($array);
echo "<br>";
$objArray->eliminaUltimo();
print_r($objArray->data);
var_dump($objArray->muestraArray($array));




?>