<?php
include ("biblioteca.php");
session_start();
cabecera("Comprobar");

if (isset($_POST['bAceptar'])) {
    //recogemos y comprobamos usuario
    if (! strcmp(recoge("nombre"), "root") && ! strcmp(recoge("clave"), "super")) {
        //inicializamos variables de sesión//en caso de tener guardaríamos también nivel de usuario
        $_SESSION['acceso'] = 1;
        $_SESSION['usuario'] = 'root';
        header("location:privada.php");
    } else
        echo "No son correctos los datos de usuario o contraseña";
}
include ("fAcceso.php");
?>