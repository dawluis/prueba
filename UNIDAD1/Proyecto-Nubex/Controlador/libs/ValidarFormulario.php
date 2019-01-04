<?php
require_once 'bGeneral.php';
class ValidarFormulario{
    
    public function ValidaUsuario($nombreUsuario, $contrasena, $email){
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
        
        
        if($error==true){
           return $errores; 
        }else{
            return true;
        }
        
        
        
        
    }
    
    public function ValidaLogin($nombreUsuario,$contrasena){
        $error=false;
        $errores;
        
        if(empty($nombreUsuario)||!validaNombreUsuario($nombreUsuario)){
            $error=true;
            $errores['nombreUsuario']="El nombre no es correcto";
        }
        if(!validaContrasena($contrasena)){
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