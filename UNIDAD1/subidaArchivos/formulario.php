<?php
include 'bGeneral.php';

$error=false;
$errores=[];

if(isset($_POST['enviar'])){
    
    $nombre=recoge('nombre');
    $edad=recoge('edad');
    $email=recoge('email');
    $foto=recoge('foto');
     
    if(cTexto($nombre)==0){
        $error=true;
        $errores['nombre']="El nombre no es correcto";
    }
    if(cNum($edad)==0){
        $error=true;
        $errores['edad']="El edad no es correcto";
    }
    if(validaEmail($email)==0){
        $error=true;
        $errores['email']="El email no es correcto";
    }
    
    //------------------------------IMAGENES--------------------//
    $dir="archivos/";
    $max_file_size = "51200";
    $extensionesValidas = array(
        "jpeg",
        "gif"
    );
    $errorArchivo=false;
    $erroresArchivos=[];
    
    
    if ($_FILES['imagen']['error'] != 0) {
        echo 'Error: ';
        $errorArchivo=true;
        switch ($_FILES['imagen']['error']) {
            case 1:
                echo "UPLOAD_ERR_INI_SIZE <br>";
                echo "Fichero demasiado grande<br>";
                break;
            case 2:
                echo "UPLOAD_ERR_FORM_SIZE<br>";
                echo 'El fichero es demasiado grande<br>';
                break;
            case 3:
                echo "UPLOAD_ERR_PARTIAL<br>";
                echo 'El fichero no se ha podido subir entero<br>';
                break;
            case 4:
                echo "UPLOAD_ERR_NO_FILE<br>";
                echo 'No se ha podido subir el fichero<br>';
                break;
            case 6:
                echo "UPLOAD_ERR_NO_TMP_DIR<br>";
                echo "Falta carpeta temporal<br>";
            case 7:
                echo "UPLOAD_ERR_CANT_WRITE<br>";
                echo "No se ha podido escribir en el disco<br>";
                
            default:
                echo 'Error indeterminado.';
        }
    } else {
        
        $fileName=$_FILES['imagen']['name'];
        $fileSize=$_FILES['imagen']['size'];
        $directorioTemp = $_FILES['imagen']['tmp_name'];
        $arrayArchivo = pathinfo($nombreArchivo);
        
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
        if ($filesize > $max_file_size) {
            $errorArchivo=true;
            $erroresArchivos['tamaño'] = "La imagen debe de tener un tamaño inferior a 50 kb";
        }
        // Almacenamos el archivo en ubicación definitiva si no hay errores
        
        if (empty($erroresArchivos)) {
            // Añadimo time() al nombre del fichero, así lo haremos único y si tuviera doble extensión
            // Haríamos inservible la segunda.
            $nombreArchivo = $arrayArchivo['filename'] . time();
            $nombreCompleto = $dir . $nombreArchivo . "." . $extension;
            // Movemos el fichero a la ubicación definitiva
            if (move_uploaded_file($directorioTemp, $nombreCompleto)) {
                $exitoArchivo= "<br> El fichero \"$nombreCompleto\" ha sido guardado";
            } else {
                $errorArchivo=true;
                $erroresArchivos['moveArchivo']= "Error: No se puede mover el fichero a su destino";
            }
        }else{
            $error=true;
            $errores['imagen']=print_r($erroresArchivos);
            
        }
        
        
        
        
    
    }
     
    if(($error==true)||($errorArchivo==true)){  
     print_r($errores);
      ?>
    <form action="" method="POST">
    <label>Nombre</label><input type="text" name="nombre"><br><br>
    <label>Edad</label><input type="number" name="edad"><br><br>
    <label>Email</label><input type="text" name="email"><br><br>
    <label>Foto</label><input type="file" name="imagen" id="imagen"><br><br>
    <input type="submit" value="Enviar" name="enviar">
    </form>
	<?php       
    }else{
        
        echo "TODOS LOS DATOS SON CORRECTOS<br>";
        echo "$exitoArchivo<br>";
        echo "Nombre: $nombre <br> Edad: $edad <br> Email: $email <br>";
        
    }
    
    
    
    
    
}else{
    ?>
    <form action="" method="POST">
    <label>Nombre</label><input type="text" name="nombre"><br><br>
    <label>Edad</label><input type="number" name="edad"><br><br>
    <label>Email</label><input type="text" name="email"><br><br>
    <label>Foto</label><input type="file" name="imagen" id="imagen"><br><br>
    <input type="submit" value="Enviar" name="enviar">
    </form>
<?php 
}
?>