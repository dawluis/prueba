<?php
include ('bGeneral.php');
cabecera($_SERVER['PHP_SELF']);
$error = false;
if (! isset($_REQUEST['bAceptar'])) {
    ?>

<form ACTION="<?=$_SERVER ['PHP_SELF'] //el archivo actual?>"
	METHOD="post">
	Nombre: <input TYPE="text" NAME="nombre"><br> Edad: <input TYPE="text"
		NAME="edad"><br> <input TYPE="submit" name="bAceptar" VALUE="aceptar">
</form>
</body>
</html>
<?php
} // En esta parte comprobamos los datos recibidos
else {
    $nombre = recoge("nombre");
    $edad = recoge('edad');
    
    if ((cTexto($nombre) == 0)) {
        $error = true;
    }
    if ((cNum($edad) == 0)) {
        $error = true;
    }
    if (! $error) {
        header("location:correcto.php?nombre=$nombre&edad=$edad");
    } else {
        
        ?>
<form ACTION="<?=$_SERVER ['PHP_SELF'] //el archivo actual?>"
	METHOD='post'>
	<p>Los datos que has introducido no están en el formato correcto</p>
	Nombre: <input TYPE="text" NAME="nombre"
		VALUE="<?php
        echo $nombre;
        ?>"> <br> Edad: <input TYPE="text" NAME="edad"
		VALUE="<?php
        echo $edad;
        ?>"> <br>
		<?php
        echo '<input TYPE="submit" name="bAceptar" VALUE="aceptar">';
    }
}
?>
		  
</form>
<?php

pie();
?>
	