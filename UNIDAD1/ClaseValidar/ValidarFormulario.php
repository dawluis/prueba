<?php
require_once 'bGeneral.php';
class ValidarFormulario{
    
    public function ValidaUsuario($nombreUsuario, $contrasena, $email, $fecha){
        $error=false;
     
            if(!validaNombreUsuario($nombreUsuario)){
                $error=true;
                $errores['nombreUsuario']="El nombre de usuario no es correcto";
                
            } 
        
        
      
            if(!validaContrasena($contrasena)){
                $error=true;
                $errores['contrasena']="El contraseña no es correcto";
            }
        
        
  
            if(!validaEmail($email)){
                $error=true;
                $errores['email']="El email es incorrecto";
            }
        
        
    
            if(empty($fecha)){
                $error=true;
                $errores['fecha']="La fecha esta vacia";
            }else{
                if(!validaFecha($fecha)){
                    $error=true;
                    $errores['fecha']="La fecha no es correcta";
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
    
}

?>