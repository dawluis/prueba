	<?php
	$nombreArchivo="comentarios.txt";
	$error=false;
	$errores=[];
	include 'bGeneral.php';
	include '1-ficheros.php';?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<style type="text/css">
	
	#comentario{
	display:flex;
	word-wrap: break-word;
	
	}
	
	
	</style>
	</head>
	<body>
	<?php
	if(!isset($_REQUEST['enviar'])){
   		include 'formularioVisitas.php';
   		echo"<h2>Mostrar todos los comentarios</h2>";
   		lectorComentarios($nombreArchivo);
	}else{
	    $comentario=sinEspacios(recoge("comentario"));
	    $nombre=sinEspacios(recoge("nombre"));
	    $email=sinEspacios(recoge("email"));
	    if(empty($comentario)){
	        $error=true;
	        $errores['comentario']="El comentario esta vacio";
	        
	    }
	    if(empty($email)||!validaEmail($email)){
	        $error=true;
	        $errores['email']="El email no es correcto";
	        
	    }
	    
	    if(empty($nombre)||!cTexto($nombre)){
	        $error=true;
	        $errores['nombre']="El nombre no es correcto";
	        
	    }
	    
	    if(!$error){ 
	        escribirComentario($nombre, $email, $comentario, $nombreArchivo);
	        include 'formularioVisitas.php';
	        echo"<h2>Mostrar todos los comentarios</h2>";
	        lectorComentarios($nombreArchivo);
   
	    }else{
	        ?>
	        <form action="<?=$_SERVER ['PHP_SELF'] //el archivo actual?>" method="POST">
	        Tu comentario <br> <textarea name="comentario" id="" cols="30" rows="10"></textarea>
	        <?php if(isset($errores['comentario'])){echo $errores['comentario'];}?>
	        <br>
	        Tu nombre <br> <input type="text" name="nombre" >
	         <?php if(isset($errores['nombre'])){echo $errores['nombre'];}?>
	        <br>
	        Tu email <br> <input type="text" name="email">
	        <?php if(isset($errores['email'])){echo $errores['email'];}?>
	        <br> <br>
	        <input type="submit" name="enviar" value="Enviar">
	        </form>
	        <?php
	        echo"<h2>Mostrar todos los comentarios</h2>";
	        lectorComentarios($nombreArchivo);
	    }
	  
	   
	   
	   
	   
	   
	}
	?>
	
    
   

</body>
</html>
