<?php
//CREAMOS LA FUNCION Y LE PASAMOS POR DEFAULT UN VALOR A NOMBRE DE FICHERO
function escribeLinea($frase, $nombreFichero="ficheros/frases.txt"){
    //PARTIMOS EN DOS EL NOMBRE DEL FICHERO PARA SACAR LA CARPETA Y APARTE EL FICHERO
    $trozos=preg_split('/\//', $nombreFichero);
    //SI ES UN DIRECTORIO
    if(is_dir($trozos[0])){
        //ESCRIBIMOS
       if($file=fopen($nombreFichero, "a+")){
       
       $tiempo=time();
       
       $fecha=date("d-m-Y", $tiempo);
       
       $fraseMas=$frase."#".$fecha;
       
       fwrite($file, $fraseMas.PHP_EOL);
       
       fclose($file);
       
       return true;
        
        }else{
            
            return false;
        }
    // SI NO ES UN DIRECTORIO ENTONZES LO CREA
    }else{
        mkdir($trozos[0]);
        //ESCRIBIMOS
        if($file=fopen($nombreFichero, "a+")){
            
            $tiempo=time();
            
            $fecha=date("d-m-Y", $tiempo);
            
            $fraseMas=$frase."#".$fecha;
            
            fwrite($file, $fraseMas.PHP_EOL);
            
            fclose($file);
            
            return true;
            
        }else{
            
            return false;
        }
    }
    
}


//CREAMOS LA FUNCION Y LE PASAMOS POR DEFAULT UN VALOR A NOMBRE DE FICHERO
function leeFichero($fichero="ficheros/frases.txt"){
    $array;
    
    //ABRIMOS PARA LA LECTURA
    if($file=fopen($fichero, "r+")){
    
    while(!feof($file)){
        
        $linea=fgets($file);
        
        if($linea==""){
            
        }else{
            $array[]=$linea;
        }
        
       
    }
    fclose($file);
    
    //DEVUELVE EL ARRAY CON CADA LINEA EN CADA CASILLA DE ARRAY
    return $array;
    
    
    //SI NO SE PUEDE ABRIR DEVUELVE FALSE
    }else{
        return false;
    }
    
    
}


$frase="HOLA QUE TAL";
$nombreFichero="ficheros/frases.txt";
escribeLinea($frase,$nombreFichero);

//print_r(leeFichero("ficheros/frases.txt"));
?>