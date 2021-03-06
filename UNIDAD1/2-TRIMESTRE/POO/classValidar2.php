
<?php 
/**
* Clase para realizar validaciones en el modelo
* Es utilizada para realizar validaciones en el modelo de nuestras clases.
*
* @author Carlos Belisario
*/
class Validacion
{
 protected $_atributos;
 protected $_error;
 public $mensaje;
 
 /**
 * Metodo para indicar la regla de validacion
 * El método retorna un valor verdadero si la validación es correcta, de lo contrario retorna el objeto 
 * actual, permitiendo acceder al atributo Validacion::$mensaje ya que es publico
 */
 public function rules($rule = array(),$data)
 {
  
  if(!is_array($rule)){
   $this->mensaje = "las reglas deben de estar en formato de arreglo";
   return $this;
  }
  
  foreach($rule as $key => $rules){
   $reglas = explode(',',$rules['regla']);
   
   if(array_key_exists($rules['name'],$data)){
    foreach($data as $indice => $valor){     
        if($indice === $rules['name']){
            foreach($reglas as $clave => $valores){ 
       
       $validator = $this->_getInflectedName($valores);        
       
       if(!is_callable(array($this, $validator))){
          throw new BadMethodCallException("No se encontro el metodo actual");
       }
       $respuesta = $this->$validator($rules['name'], $valor);        
      }
      break;
     }
    }
   }
   else{
    $this->mensaje[$rules['name']] = "el campo $value no esta dentro de la regla de validación o en el formulario";    
   }
  }  
  if(!$respuesta){
   return $this;
  }
  else{
   return true;
  }
 } 
 
 /**
 * Metodo inflector de la clase 
 * por medio de este metodo llamamos a las reglas de validacion que se generen
 */
 private function _getInflectedName($text)
 {
  $validator="";
  $_validator = preg_replace('/[^A-Za-z0-9]+/',' ',$text);
  $arrayValidator = explode(' ',$_validator);    
  if(count($arrayValidator) > 1){
   foreach($arrayValidator as $key => $value){     
    if($key == 0){
     $validator .= "_".$value; 
    }
    else{     
     $validator .= ucwords($value);
    }
   }
  }
  else{
   $validator = "_".$_validator;
  }    
  return $validator;
 }
 
 
 protected function _cTexto ($campo, $valor)
 {
     if(preg_match("/^[A-Za-zÑñ]+$/",$valor)){
         return true;
     }
     else{
         $this->mensaje[$campo][] = "el campo $campo debe contener solo letras";
         return false;
     }
 }
 
 protected function _validaNombreUsuario($campo, $valor){
     
     if(preg_match('/^[a-z0-9\*_\$]{3,50}$/i', $valor)){
         
         return true;
     }else{
         $this->mensaje[$campo][] = "el campo $campo debe contener solo letras y numeros con un tamaño minimo de 3 y un maximo de 50";
         return false;
     }
     
 }
 function validaContrasena($campo, $valor){
     
     if(preg_match('/^[a-zA-z0-9\*_]{8,20}$/', $valor)){
         
         return true;
     }else{
         $this->mensaje[$campo][] = "el campo $campo debe contener solo letras, numeros, * y _ con un tamaño minimo de 8 y un maximo de 20";
         return false;
     }
     
 }
 
 /**
 * Metodo de verificacion de que el dato no este vacio o NULL
 * El metodo retorna un valor verdadero si la validacion es correcta de lo contrario retorna un valor falso
 * y llena el atributo validacion::$mensaje con un arreglo indicando el campo que mostrara el mensaje y el 
 * mensaje que visualizara el usuario
 */
 protected function _noEmpty($campo,$valor)
 {   
  if(isset($valor) && !empty($valor)){   
   return true;   
  }
  else{   
   $this->mensaje[$campo][] = "el campo $campo debe de estar lleno";
   return false;
  }
 }
 /**
 * Metodo de verificacion de tipo numerico
 * El metodo retorna un valor verdadero si la validacion es correcta de lo contrario retorna un valor falso
 * y llena el atributo validacion::$mensaje con un arreglo indicando el campo que mostrara el mensaje y el 
 * mensaje que visualizara el usuario
 */
 protected function _numeric($campo,$valor)
 {   
  if(is_numeric($valor)){
   return true;
  }  
  else{
   $this->mensaje[$campo][] = "el campo $campo debe de ser numerico";
   return false;
  }
 }
 
 /**
 * Metodo de verificacion de tipo email
 * El metodo retorna un valor verdadero si la validacion es correcta de lo contrario retorna un valor falso
 * y llena el atributo validacion::$mensaje con un arreglo indicando el campo que mostrara el mensaje y el 
 * mensaje que visualizara el usuario
 */
 protected function _email($campo,$valor)
 {
  if(preg_match("/^[a-z]+([\.]?[a-z0-9_-]+)*@[a-z]+([\.-]+[a-z0-9]+)*\.[a-z]{2,}$/",$valor)){     
   return true;
  } 
  else{
   $this->mensaje[$campo][] = "el campo $campo de estar en el formato de email usuario@servidor.com";
   return false;
  }
 }
}

//el uso de la clase es muy sencillo aca dejo las pruebas que realice a la clase
/*
$_POST['campo1'] = 1;
$_POST['campo2'] = "usuario@hotmail.com";
$datos = $_POST;
$validacion =  new Validacion();
$regla = array(
   array('name'=>'nombre','regla'=>'no-empty,numeric'),
   array('name'=>'nombreUsuario','regla'=>'no-empty,email')
  );
$validaciones = $validacion->rules($regla,$datos);
print_r($validaciones);*/

?>
