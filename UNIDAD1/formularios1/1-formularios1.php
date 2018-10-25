<?php
$errores=[];
$error=false;

include ('bGeneral.php');
cabecera ($_SERVER ['PHP_SELF']);

if(! isset($_REQUEST['enviar'])){

?>
<html>
<form action="">
	<label>Nombre</label><input type="text" name="nombre"><br>
	<label>Edad</label><input type="number" name="edad"><br>
	<label>Email</label><input type="text" name="email"><br>
	<input type="submit" value="Enviar" name="enviar">
</form>
</html>
<?php   
}else{
    
    $nombre= recoge("nombre");
    $edad= recoge("edad");
    $email= recoge("email");
    
    if((cTexto($nombre)==0)){
        $errores['nombre']= "El nombre no es correcto";
        $error= true;
    }
    if((cNum($edad)==0)){
        $errores['edad']= "La edad no es correcta";
        $error= true;
    }
    if((validaEmail($email)==0)){
        $errores['email']= "EL email no es correcto";
        $error= true;
    }
    
    if(!$error){  
        header("location: correcto.php?nombre=$nombre&edad=$edad&email=$email");
   
    }else{
        
        ?>
        <form ACTION="<?php $_SERVER ['PHP_SELF'] //el archivo actual?>" METHOD='post'>
        Nombre: <input TYPE="text" NAME="nombre" VALUE="<?php echo $nombre;?>"> <br>
        
        <?php
        
        if (isset($errores['nombre']))
            echo "$errores[nombre] <br>";
        
        ?>
         
	    Edad: <input TYPE="text" NAME="edad" VALUE="<?php echo $edad; ?>"><br>
		<?php
        if (isset($errores['edad']))
            echo $errores['edad'];
        echo '<br>';
        ?>
        
        Email: <input TYPE="text" NAME="email" VALUE="<?php echo $email; ?>"><br>
        <?php 
        if (isset($errores['email']))
            echo $errores['email'];
            echo '<br>';
        
         echo '<input TYPE="submit" name="bAceptar" VALUE="aceptar">';
        
    }
}
?>
		  
</form>
<?php 
pie();
?>
