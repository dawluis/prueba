<?php
include 'bGeneral.php';

$error=false;
$errores=[];

if(isset($_POST['enviar'])){
    
    $nombre=recoge('nombre');
    $edad=recoge('edad');
    $email=recoge('email');
     
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
    $dir="imagenes/";
    $max_file_size = "51200";
    $extensionesValidas = array(
        "jpg",
        "gif"
    );
    $errorArchivo=false;
    $erroresArchivos=[];
    
    
    if ($_FILES['imagen']['error'] != 0) {
        echo 'Error: ';
        $errorArchivo=true;
        switch ($_FILES['imagen']['error']) {
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
                echo 'Error indeterminado.';
        }
    } else {
        
        $fileName=$_FILES['imagen']['name'];
        $fileSize=$_FILES['imagen']['size'];
        $directorioTemp = $_FILES['imagen']['tmp_name'];
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
            $errorArchivo=true;
            
        }
    }
     
    if(($error==true)||($errorArchivo==true)){
        if(!empty($errores)){
            print_r($errores);
        }
        if(!empty($errores)){
            print_r($erroresArchivos);
        }
     
      ?>
    <form action="formulario.php" method="POST" enctype="multipart/form-data">
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
        echo "imagen del usuario: <br> <img src='$nombreCompleto'>";
    } 
}else{
    ?>
    <form action="formulario.php" method="POST" enctype="multipart/form-data">
    <label>Nombre</label><input type="text" name="nombre"><br><br>
    <label>Edad</label><input type="number" name="edad"><br><br>
    <label>Email</label><input type="text" name="email"><br><br>
    <label>Foto</label><input type="file" name="imagen" id="imagen"><br><br>
    <input type="submit" value="Enviar" name="enviar">
    </form>
<?php 
}
?>