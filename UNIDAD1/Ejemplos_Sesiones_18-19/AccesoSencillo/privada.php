<?php 
session_start();
include ("biblioteca.php");

//Comprobamos si estamos logueado en el sistema y si tuviesemos nivel de usuario tb lo haríamos       
if ($_SESSION['acceso']!="1")
{
header("Location:index.php");

}
cabecera("Comprobar");
echo "Bienvenido a la página privada ";
echo $_SESSION['usuario'];
echo "<br><a href=salir.php>Salir del sistema</a>";
?>