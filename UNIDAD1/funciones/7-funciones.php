<?php
/*Realiza una función cabecera que reciba como parámetro el título de la página y escriba el
encabezado html, el head y el títle de la misma con el encoding. Si no le pasas el título tiene que
poner el nombre del fichero. Puedes hacer una variante donde le pases también la ubicación del
CSS para que lo enlace.*/

function cabecera($titulo="",$css="styles.css"){
    if($titulo==""){
        $titulo=basename($_SERVER['PHP_SELF']);
    }
    $cabecera='<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>'.$titulo.'</title>
    <link rel="stylesheet" href="'.$css.'">
</head>
<body>';
    
    return $cabecera;  
}
echo cabecera();








?>