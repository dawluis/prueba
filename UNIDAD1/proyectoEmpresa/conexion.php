<?php
$conexion = mysqli_connect("localhost","root","","phpmysql");

//comprobar si la conexion es correcta

if(mysqli_connect_errno()){
    echo "la conexion a la base de datos mysql ha fallado".mysqli_connect_errno();
}else{
    echo "conexion realizada correctamente";
}
echo "<br>";

//Consulta para configurar la codificacion de caracteres

mysqli_query($conexion, "SET NAMES UTF8");
?>