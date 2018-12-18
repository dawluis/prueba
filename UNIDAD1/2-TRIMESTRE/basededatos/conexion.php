<?php
$db= new PDO('mysql:host=localhost;dbname=curso_php',"root", "");
// Realiza el enlace con la BD en utf-8
$db->exec("set names utf8");
//Accionamos el uso de excepciones
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//Impedimos que se muestren los errores enviados por MySQL que no lanzan excepción
//Por ejemplo hacer una consulta a una tabla que no existe
//En modo desarrollo nos ayuda ver los errores pero en producción hay que silenciarlos
//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
?>