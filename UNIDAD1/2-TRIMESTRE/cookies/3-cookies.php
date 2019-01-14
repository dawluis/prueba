<?php

if(isset($_REQUEST['cookie'])){
    setcookie('color', 'red', time()+60);
    echo"COOKIE CARGADA";
}
if(isset($_REQUEST['comprobar'])){
    if(isset($_COOKIE['color'])){
        echo"<h1>EL NAVEGADOR ACEPTA LAS COOKIES</h1>";
    }else{
        echo"PORFAVOR PRIMERO CARGA LA COOKIE";
    }
}

echo "<a href='3-cookies.php?cookie=true'>Cargar la cookie</a><br>";

echo "<a href=3-cookies.php?comprobar=comprobar>COMPROBAR</a>";


?>