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
    
    if(count($trozosfecha)==3){
        if(checkdate($trozosfecha[1], $trozosfecha[0], $trozosfecha[2])){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
    
}

function crypt_blowfish($password) {
    $salt = '$2a$07$usesomesillystringforsalt$';
    $pass= crypt($password, $salt);
    return $pass;
}


function subidaArchivos($var,$dir,$max_file_size,$extensionesValidas){
    
    $errorArchivo=false;
    $erroresArchivos;
    if ($_FILES[$var]['error'] != 0) {
        $errorArchivo=true;
        switch ($_FILES[$var]['error']) {
            case 1:
                $erroresArchivos["UPLOAD_ERR_INI_SIZE"]="Fichero demasiado grande";
                break;
            case 2:
                $erroresArchivos["UPLOAD_ERR_FORM_SIZE"]="El fichero es demasiado grande";
                break;
            case 3:
                $erroresArchivos["UPLOAD_ERR_PARTIAL"]="El fichero no se ha podido subir entero";
                break;
            case 4:
                $erroresArchivos["UPLOAD_ERR_NO_FILE"]="No se ha podido subir el fichero";
                break;
            case 6:
                $erroresArchivos["UPLOAD_ERR_NO_TMP_DIR"]="Falta carpeta temporal";
            case 7:
                $erroresArchivos["UPLOAD_ERR_CANT_WRITE"]="No se ha podido escribir en el disco";
            default:
                $erroresArchivos["INDETERMINADO"]="Error";
                
                return $erroresArchivos;
        }
    } else {
        
        $fileName=$_FILES[$var]['name'];
        $fileSize=$_FILES[$var]['size'];
        $directorioTemp = $_FILES[$var]['tmp_name'];
        $arrayArchivo = pathinfo($fileName);
        
        /*
         * Extraemos la extensión del fichero, desde el último punto. Si hubiese doble extensión, no lo
         * tendría en cuenta.
         */
        $extension = $arrayArchivo['extension'];
        // Comprobamos la extensión del archivo dentro de la lista que hemos definido al principio
        if (! in_array($extension, $extensionesValidas)) {
            $errorArchivo=true;
            $erroresArchivos['extension'] = "La extensión del archivo no es válida o no se ha subido ningún archivo";
        }
        // Comprobamos el tamaño del archivo
        if ($fileSize > $max_file_size) {
            $errorArchivo=true;
            $erroresArchivos['tamaño'] = "La imagen debe de tener un tamaño inferior a 50 kb";
        }
        // Almacenamos el archivo en ubicación definitiva si no hay errores
        
        if (empty($erroresArchivos)) {
            if(!is_dir(__DIR__."/../../Archivos/".$dir)){
                mkdir(__DIR__."/../../Archivos/".$dir , 0700); 
            }
            // Añadimo time() al nombre del fichero, así lo haremos único y si tuviera doble extensión
            // Haríamos inservible la segunda.
            $nombreArchivo = $arrayArchivo['filename'] . time();
            $nombreCompleto = __DIR__."/../../Archivos/"."/".$dir."/". $nombreArchivo . "." . $extension;
            // Movemos el fichero a la ubicación definitiva
            
            if (move_uploaded_file($directorioTemp, $nombreCompleto)) {
                return $nombreCompleto.",".$nombreArchivo.".".$extension;
                
            } else {
                $errorArchivo=true;
                $erroresArchivos['moveArchivo']= "Error: No se puede mover el fichero a su destino";
                
                return $erroresArchivos;
            }
        }else{
            return $erroresArchivos;
            
        }
        
    }
}

?>

