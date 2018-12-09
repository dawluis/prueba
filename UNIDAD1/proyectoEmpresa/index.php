
<?php

/*
 * <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Document</title>
</head>
 
require_once 'conexion.php';

//Consulta select desde php

$query=mysqli_query($conexion, "SELECT * FROM notas");

$notas= mysqli_fetch_assoc($query);

while($nota = mysqli_fetch_assoc($query)){
    echo "<h2>".$nota['titulo']."</h2><br>";
    echo $nota['descripcion']."<br>";
    echo "<br><br><br><br>";
}

?>



<body>

</body>
</html>







<?php 


