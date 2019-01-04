<?php
function cabecera($titulo)
{?>
<!DOCTYPE html>
		<html lang="es">
			<head>
				<title>
				<?php
				echo $titulo;
				?>
			
			</title>
				<meta charset="utf-8"/>
			</head>
		<body>
<?php		
}

function pie(){
	echo "</body>
	</html>";
}

function sinTildes($frase) {

	$no_permitidas= array ("�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�");
	$permitidas= array ("a","e","i","o","u","A","E","I","O","U","a","e","i","o","u","A","E","I","O","U");
	$texto = str_replace($no_permitidas, $permitidas ,$frase);
	return $texto;
}

function sinEspacios($frase) {
	$texto = trim(preg_replace('/ +/', ' ', $frase));
	return $texto;
}

function recoge($var)
{
	if (isset($_REQUEST[$var]))
		$tmp=strip_tags(sinEspacios($_REQUEST[$var]));
	else 
		$tmp= "";
	
	return $tmp;
}


function cTexto ($text, &$errores)
{
	if (preg_match("/^[A-Za-z��]{2,30}$/", sinTildes($text)))
		return 1;
	else 
	    $errores[]="El nombre no es correcto";
		return 0;
}

function cUsuario ($text, &$errores)
{
    if (preg_match("/^[A-Za-z��0-9_\*]{2,10}$/", sinTildes($text)))
        return 1;
        else
            $errores[]="El usuario no es correcto";
            return 0;
}
function validaNombreUsuario($nombreUsuario){
    
    if(preg_match('/^[a-z0-9\*_\$]{3,50}$/i', $nombreUsuario)){
        
        return 1;
    }else{
        return 0;
    }
    
}

function validaContrasena($contrasena){
    
    if(preg_match('/^[a-zA-z0-9\*_]{4,20}$/', $contrasena)){
        
        return 1;
    }else{
        return 0;
    }
    
}
function validaEmail ($email){
    
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        
        return 1;
        
    }else{
        
        return 0;
        
    }
}
function compruebaFecha($fecha){
    $vecesGuion=substr_count($fecha, '-');
    $vecesBarra=substr_count($fecha, '/');
    
    
    if($vecesBarra!=2 || $vecesGuion!=2){

        return false;
         
    }else{
    
    $trozosfecha=preg_split('/[\/-]/', $fecha);
    
    if(checkdate($trozosfecha[0], $trozosfecha[1], $trozosfecha[2])){
        
        return true;
        
    }else if(checkdate($trozosfecha[1], $trozosfecha[0], $trozosfecha[2])){
        
        return true;
        
    }else if(checkdate($trozosfecha[2], $trozosfecha[1], $trozosfecha[0])){
        
        return true;
    }else{
        $errores[]="La fecha no es correcta";
        return false;
    }
    }
}
function validaFecha($fecha){
    $trozosfecha=preg_split('/[\/-]/', $fecha);
    if(count($trozosfecha)==3 && is_numeric($trozosfecha[2])){
        if(checkdate($trozosfecha[1], $trozosfecha[0], $trozosfecha[2])){
            return 1;
        }else{
            return false;
        }
    }else{
        return false;
    }
    
}

function escribeLinea($frase, $nombreFichero="ficheros/frases.txt"){
    
    $trozos=preg_split('/\//', $nombreFichero);
    
    if(is_dir($trozos[0])){
        
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
        
    }else{
        mkdir($trozos[0]);
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



function leeFichero($fichero="ficheros/frases.txt"){
    $array;
    
    if($file=fopen($fichero, "r+")){
        
        while(!feof($file)){
            
            $linea=fgets($file);
            
            if($linea==""){
                
            }else{
                $array[]=$linea;
            }
            
            
        }
        fclose($file);
        
        return $array;
    }else{
        return false;
    }
    
    
}


function campoImagen($nombre, $dir, $nombreUsuario, &$errores)
{
    
if ($_FILES[$nombre]['error'] != 0) {
        switch ($_FILES[$nombre]['error']) {
            case 1:
                $errores[$nombre] = "Fichero demasiado grande";
                break;
            case 2:
                $errores[$nombre] = 'El fichero es demasiado grande';
                break;
            case 3:
                $errores[$nombre] = 'El fichero no se ha podido subir entero';
                break;
            case 4:
                $errores[$nombre] = 'No se ha podido subir el fichero';
                break;
            case 6:
                $errores[$nombre] = "Falta carpeta temporal";
                break;
            case 7:
                $errores[$nombre] = "No se ha podido escribir en el disco";
                break;
            default:
                $errores[$nombre] = 'Error indeterminado.';
        }
        return 0;
    } else {
        $max_file_size = "200000";
        $extensionesValidas = array(
            "jpg",
            "png"
        );
        
        $nombreArchivo = $_FILES[$nombre]['name'];
        $tama�oArchivo = $_FILES[$nombre]['size'];
        $directorioTemp = $_FILES[$nombre]['tmp_name'];
        $arrayArchivo = pathinfo($nombreArchivo);
        
        $extension = $arrayArchivo['extension'];
        if (! in_array($extension, $extensionesValidas)) {
            $errores[$nombre] = "La extensi�n del archivo no es v�lida o no se ha subido ning�n archivo <br>";
            return 0;
        } elseif ($tama�oArchivo > $max_file_size) {
            $errores[$nombre] = "La imagen debe de tener un tama�o inferior a $max_file_size B <br>";
            return 0;
        }
        
        if (! isset($errores[$nombre])) {
            $nombreArchivo = $nombreUsuario."-". $arrayArchivo['filename'] . time();
            $nombreCompleto = $dir . $nombreArchivo . "." . $extension;
            if (is_dir($dir))
                if (move_uploaded_file($directorioTemp, $nombreCompleto)) {
                    return $nombreCompleto;
                } else {
                    $errores[$nombre] = "Error: No se puede mover el fichero a su destino";
                    return 0;
                }
            else
                $errores[$nombre] = "Error: No se puede mover el fichero a su destino";
                return 0;
        }
    }		
		
		
}

?>

