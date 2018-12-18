<?php
include ('bGeneral.php');
cabecera ($_SERVER ['PHP_SELF']); //el archivo actual
echo "Nombre:", $_GET['nombre'];
echo '<br>';
echo "Edad:", $_GET ['edad'];
echo '<br>';
echo "Email:", $_GET['email'];
pie();
?>
