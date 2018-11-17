<?php

function escribirTresNumeros($num1, $num2, $num3){
    if($file=fopen("datosEjercicio1.txt", "a+")){
        fwrite($file, $num1.PHP_EOL);
        fwrite($file, $num2.PHP_EOL);
        fwrite($file, $num3.PHP_EOL);
        fclose($file);
        return true;
    }else{
        return false;
    }
}
/*
if(escribirTresNumeros(1, 2, 3)){
    echo "todo correcto";
}else{
    echo "todo mal";
}
*/


/*Ejercicio 2 Realiza una función 
 * denominada obtenerSuma que reciba 
 * como parámetro un archivo con un número por 
 * línea, los lea, y devuelva la suma. 
 * Suponemos que el archivo sólo contiene 
 * números.*/

function obtenerSuma($archivo){
    $suma=0;
    if($file=fopen($archivo, "r+")){
        
        while(!feof($file)){
            
            $linea= fgets($file);
            
            $val=intval($linea);
            
            $suma=$suma+$val;
        }
        fclose($file);
        
        return $suma;
        
    }else{
        return false;
    }
}

//echo obtenerSuma("datosEjercicio1.txt");

/*Ejercicio  3.- Contador. Vamos a crear un 
 * contador de visitas.  
 * Inserta en una página cualquiera, 
 * para ello es necesario crear un 
 * archivo de texto en blanco llamado 
 * counter.txt en la misma ubicación donde
 *  se ejecuta el script. Cada vez que se 
 *  cargue la página se mostrará el número
 *   de visitas hasta el momento. 
 * Guárdalo como contador.php. */

function contador($archivo){
    
    if(file_exists($archivo)){
        
        $file= fopen($archivo, "r+");
        
        $numero=fgets($file);
        
        rewind($file);
        
        $numero=intval($numero);
        
        fwrite($file, $numero+1);
      
        fclose($file); 
        
        return $numero+1;
            
    }else{
    $file= fopen($archivo, "w+");
    
    fwrite($file, 1);
    
    fclose($file);
    return 1;
    }
}
/*
echo contador("counter.txt");
*/
function escribirComentario($nombre, $email, $comentario, $nombreArchivo){
    $time=time();
    $fecha=date("d-m-Y", $time);
    $hora=date("H:i:s", $time);
    if($file=fopen($nombreArchivo, "a+")){
        fwrite($file, $nombre.",");
        fwrite($file, $email.",");
        fwrite($file, $comentario.",");
        fwrite($file, $fecha.",");
        fwrite($file, $hora.PHP_EOL);
        fclose($file);
        return true;
    }else{
        return false;
    }
}

function lectorComentarios($nombreArchivo){
    $coments=[];
    $i;
    if(file_exists($nombreArchivo)){
        if($file=fopen($nombreArchivo, "r+")){
      
            while(!feof($file)){
                $linea=fgets($file);
                $coments[]=$linea;
                
            }
            rewind($file);
            fclose($file);
            
            if(count($coments) > 2){
                for($i=count($coments)-2; $i>=0; $i--){
                    $cadena=$coments[$i];
                    $comentario=explode(',', $cadena);
                    
                    echo "$comentario[0], (<span style='color:blue;'><u>$comentario[1]</u></span>) escrito el $comentario[3] a las $comentario[4] : <br> <div id='comentario'> <p>$comentario[2] </p> </div><br>";
                    
                }  
            }else{
                $cadena=$coments[0];
                $comentario=explode(',', $cadena);
                echo "$comentario[0],(<span style='color:blue;'><u>$comentario[1]</u></span>) escrito el $comentario[3] a las $comentario[4] : <br>$comentario[2] <br>";
            }
            
           
            
            
        }
        
        
    }else{
        
    }
    
    
    
}














?>