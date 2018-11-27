<?php
include 'clases.php';



$persona= new Persona();

$informatico= new Informatico();

$informatico->setAltura(2);
 echo $informatico->sabeLenguajes("php,css,php,js, etc");

 $tecnico= new TecnicoRedes();
 
 var_dump($tecnico);
var_dump($informatico);

?>