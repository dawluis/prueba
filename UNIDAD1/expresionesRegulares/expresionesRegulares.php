<?php

$texto=12344;


function codigoPostal($texto){
    return preg_match("/^[0-9]{5}$/", $texto);

}
/*
if(codigoPostal($texto))
{
    echo "correcto";
}else{
    echo "incorrecto";
}
*/
//---------------------------------------------------------------------------/

function numTelefono($telefono){
    
    return preg_match("/^[0-9]{9}$/",trim(preg_replace("/[ \.\-]+/", '', $telefono)));}
    /*
    $telefono="61.234-56 78";

if(numTelefono($telefono)){
    echo "correcto";
}else{
    echo "incorrecto";
}
*/
//--------------------------------------------------------------------------------/

    function direccion($calle){
        
        return preg_match("/(calle|avenida|paseo)/i", $calle);
        
    }
/*
$calle="calle hola";

if(direccion($calle)){
    echo "correcto";
}else{
    echo "incorrecto";
}
*/


//--------------------------------------------------------------------------------/

/*Crea una función que reciba una cadena y compruebe si es un nombre de usuario válido para nuestro sistema, temiendo en cuenta que:
    • Debe empezar con una letra minúscula ó mayúscula.
    • Debe contener solo letras, números y guión bajo.
    • Debe contener entre 8 y 24 caracteres.
    • No debe finalizar en guión bajo.
La función devolverá verdadero o falso.*/    
    
    function compruebaUsuario($usuario){
        
        return preg_match("/^[a-zñ](a-zñ0-9_){8,24}^_$/i", $usuario);
        
        
    }
    
    $usuario="holaquetalasd";
    
    if(compruebaUsuario($usuario)){
        echo "correcto";
    }else{
        echo "incorrecto";
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    

?>