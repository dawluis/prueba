<?php


$datos=file_get_contents('https://randomuser.me/api/');
$datos1=file_get_contents('https://randomuser.me/api/');
$datos2=file_get_contents('https://randomuser.me/api/');
$datos3=file_get_contents('https://randomuser.me/api/');

$json=json_decode($datos);

echo "<pre>";
print_r($json);
echo "<pre>";

$nombre=$json->name->title;

echo $nombre;

?>