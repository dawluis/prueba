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

//Consulta select desde php

$query=mysqli_query($conexion, "SELECT * FROM notas");

$notas= mysqli_fetch_assoc($query);

while($nota = mysqli_fetch_assoc($query)){
    echo $nota['titulo']."<br>";
    echo $nota['descripcion']."<br>";
    echo "<br><br><br><br>";
}

//Insertar datos
$sql = "INSERT INTO notas VALUES(null, 'Nota de php', 'Esto es una nota de PHP', 'green')";
$insert= mysqli_query($conexion, $sql);

if($insert){
    echo "Datos insertado correctamente";
    
}else{
    echo "Error:".mysqli_error($conexion);
}


?>