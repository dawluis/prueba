<?php
if(isset($_REQUEST['crear'])){
    $tiempo=intval($_POST['tiempo']);
    setcookie('nombre', 'Luis Marco', time()+$tiempo);
    $mensaje="COOKIE CREADA CON UNA DURACION DE ".$tiempo." segundos";
  
}else if(isset($_REQUEST['comprobar'])){
    if(isset($_COOKIE['nombre'])){
        $mensaje="LA COOKIE EXISTE Y SU VALOR ES ".$_COOKIE['nombre'];  
    }else{
        $mensaje="LA COOKIE NO  EXISTE";
    }
  
}else if(isset($_REQUEST['destruir'])){
    if(isset($_COOKIE['nombre'])){
        setcookie('nombre', 'Luis Marco', time()-10);
        $mensaje="LA COOKIE SE HA BORRADO CORRECTAMENTE";
        
    }else{
        $mensaje="LA COOKIE NO SE PUEDE BORRAR PORQUE NO EXISTE";
    }
}
if(isset($mensaje)){
    echo $mensaje;}
    ?>
<form action="<?php $_SERVER['PHP_SELF']?>" method="POST"> 
Crear una cookie con una duracion de <input type="text" name="tiempo"> segundos (entre 1 y 60) <input type="submit" name="crear" value="Crear"><br>
Comprobar la cookie <input type="submit" name="comprobar" value="Comprobar"><br>
Destruir la cookie <input type="submit" name="destruir" value="Destruir">
</form>
<?php 

?>