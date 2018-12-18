<?php
require_once 'bGeneral.php';
class ValidarFormulario{
    
    public function ValidaUsuario($nombre=NULL, $nombreUsuario=NULL, $contrasena=NULL, $email=NULL, $fecha=NULL){
        $error=false;
        //Validaciones
        if($nombre != NULL){
            if(empty($nombre)||!validaNombre($nombre)){
                $error=true;
                $errores['nombre']="El nombre no es correcto";
            }
        }
       
        if($nombreUsuario != NULL){
            if(!validaNombreUsuario($nombreUsuario)){
                $error=true;
                $errores['nombreUsuario']="El nombre de usuario no es correcto";
                
            } 
        }
        
        if($contrasena != NULL){
            if(!validaContrasena($contrasena)){
                $error=true;
                $errores['contrasena']="El contraseña no es correcto";
            }
        }
        
        if($email != NULL){
            if(!validaEmail($email)){
                $error=true;
                $errores['email']="El email es incorrecto";
            }
        }
        
        if($fecha != NULL){
            if(empty($fecha)){
                $error=true;
                $errores['fecha']="La fecha no es correcta";
            }else{
                if(!validaFecha($fecha)){
                    $error=true;
                    $errores['fecha']="La fecha no es correcta";
                }
            }
        }
        
        if($error==true){
           return $errores; 
        }else{
            return true;
        }
        
        
        
        
    }
    
    public function ValidaLogin($user,$password){
        $error=false;
        $errores;
        if(empty($user)||!validaNombre($user)){
            $error=true;
            $errores['nombre']="El nombre no es correcto";
        }
        if(!validaContrasena($password)){
            $error=true;
            $errores['contrasena']="El contraseña no es correcto";
        }
        
        if($error==true){
            return $errores;
        }else{
            return true;
        }
        
    }
    
    public function ValidaRegistroUsuario($user,$password,$nombreAmigo1,$emailAmigo1,$nombreAmigo2,$emailAmigo2){
        $error=false;
        $errores;
        if(empty($user)||!validaNombre($user)){
            $error=true;
            $errores['nombre']="El nombre no es correcto";
        }
        if(!validaContrasena($password)){
            $error=true;
            $errores['contrasena']="El contraseña no es correcto";
        }
        if(empty($nombreAmigo1)||!validaNombre($nombreAmigo1)){
            $error=true;
            $errores['nombreAmigo1']="El nombre no es correcto";
        }
        if(!validaEmail($emailAmigo1)){
            $error=true;
            $errores['emailAmigo1']="El email es incorrecto";
        }
        if(empty($nombreAmigo2)||!validaNombre($nombreAmigo2)){
            $error=true;
            $errores['nombreAmigo2']="El nombre no es correcto";
        }
        if(!validaEmail($emailAmigo2)){
            $error=true;
            $errores['emailAmigo2']="El email es incorrecto";
        }
        if($error==true){
            return $errores;
        }else{
            return true;
        }
        
      
    }
    

}

?>