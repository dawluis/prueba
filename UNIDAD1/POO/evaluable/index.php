<?php
//Declaramos las variables de error
$error=false;
$errores=[];
//incluimos la biblioteca de funciones para separar y limpiar el codigo
include 'bGeneral.php';

cabecera("index");

//si enviar no se ha pulsado aun, mostramos el formulario
if(!isset($_REQUEST['enviar'])){
    
    include 'form.php';
//si ya se ha pulsado enviar hacemos todas las validaciones y comrpobaciones    
}else{
    
    include '../classValidar.php';
    $datos=$_POST;
    $validar= new Validacion();
    $regla=array(
        array('name'=>'nombre','regla'=>'no-empty,texto'),
        array('name'=>'nombreUsuario','regla'=>'no-empty,nombreUsuario'),
        array('name'=>'password','regla'=>'no-empty,contrasena'),
        array('name'=>'email','regla'=>'no-empty,email')
    );
    $validaciones= $validar->rules($regla,$datos);
    
    print_r($validaciones);

    }

 pie();
 ?>   
