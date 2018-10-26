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
        
        return preg_match("/^[a-z][a-zñ_0-9]{6,22}[^_]$/i", $usuario);
        
    }
    /*
    $usuario="a23456789012345678901234";
    
    if(compruebaUsuario($usuario)){
        echo compruebaUsuario($usuario);
    }else{
        echo "NO VA";}
     */
    
    /*Crea una función que compruebe si la cadena recibida corresponde con un email válido. Tener en cuenta  que para nuestro servidor de correo:
    • El nombre de usuario tiene que comenzar por una letra y puede contener letras, números y símbolos como . y _. Como mínimo tendrá 3 caracteres antes de la  @
    • El nombre de usuario estará seguido de @
    • El nombre del dominio puede estar compuesto por letras y al menos un punto seguido por al menos dos letras. En ningún caso permitirá tildes ni la letra ñ.
    • La función devolverá verdadero o falso.
*/
    
    
    function compruebaEmail ($email){
        
        return preg_match('/^[a-z][a-z0-9\._]{2,}@[a-z]+\.[a-z]{2,}$/', $email);
        
    }
    $email="hola@hola.com";
    /*
    if(compruebaEmail ($email)){
        echo compruebaEmail ($email);
    }else{
        echo "NO VA";}
   */ 
    

?>