<?php
session_start();
require_once __DIR__.'/libs/ValidarFormulario.php';
require_once __DIR__.'/libs/bGeneral.php';
require_once  __DIR__.'/../Modelo/modelo.php';

class Controller{
    
    public function inicio()
    {
        $params = array(
            'mensaje' => 'Bienvenido a NUBEX, una nueva manera de gestionar tus archivos',
            'fecha' => date('d-m-y'),
        );
        
        $m= new Modelo();
        
        require __DIR__ . '/../Vista/templates/inicio.php';
    }
    public function registro(){
        if(isset($_POST['enviar'])){
            $nombreUsuario=recoge('nombreUsuario');
            $contrasena= recoge('contrasena');
            $email= recoge('email');
            $fecha= recoge('fecha');
            $validar= new ValidarFormulario();
            $errores=$validar->ValidaUsuario($nombreUsuario, $contrasena, $email);
            if(is_array($errores)){
                require_once __DIR__ . '/../Vista/templates/formRegistro.php';
            }else{
                $contraCrip=crypt_blowfish($contrasena);
                $m= new Modelo();
                $resultado=$m->registroUsuario($nombreUsuario, $contraCrip, $email);
                if($resultado === true){
                    require_once __DIR__ . '/../Vista/templates/registroCorrecto.php';
                }else{
                    require_once __DIR__ . '/../Vista/templates/formRegistro.php';
                }
            }
        }else{
            require_once __DIR__ . '/../Vista/templates/formRegistro.php';
        }
        
    }
    public function login(){
        $m= new Modelo();
       
        if(isset($_POST['enviar'])){
            $nombreUsuario=recoge('nombreUsuario');
            $contrasena= recoge('contrasena');
            $validar= new ValidarFormulario();
           
           $errores=$validar->ValidaLogin($nombreUsuario, $contrasena);
            
           if(is_array($errores)){
               require_once __DIR__ . '/../Vista/templates/form-login.php';
           }else{
               $resultado=$m->login($nombreUsuario, $contrasena);
               if($resultado === true){
                   $_SESSION['nombre']= $nombreUsuario;
                   $idUsuario=$m->getId($_SESSION['nombre']);
                   $res=$m->getArchivos($idUsuario);
                   require_once __DIR__ . '/../Vista/templates/bienvenido.php';
               }else{
                   require_once __DIR__ . '/../Vista/templates/form-login.php';
               }
           }
        
        }else{
            require_once __DIR__ . '/../Vista/templates/form-login.php';
        }
    }
    
    public function destroy(){
        session_destroy();
        $params = array(
            'mensaje' => 'Bienvenido a NUBEX, una nueva manera de gestionar tus archivos',
            'fecha' => date('d-m-y'),
        );
        header('location: index.php');
    }
    
    public function subir(){
        $m= new Modelo();
        if(isset($_SESSION['nombre'])){
        $idUsuario=$m->getId($_SESSION['nombre']);
        $res=$m->getArchivos($idUsuario);
        }
        if(isset($_POST['enviar'])){
            if($_FILES['archivo']['name']==""){
                $resultado= "INTRODUZCA ARCHIVO PARA SUBIR";
                require_once __DIR__ . '/../Vista/templates/bienvenido.php';
            }else{
                $tipo=$_POST['tipo'];
                $var='archivo';
                $dir=$_SESSION['nombre'];
                $max_file_size=200000;
                $extensionesValidas= array ("jpg","jpeg","gif","png","pdf");
                $resultadoSubida=subidaArchivos($var, $dir, $max_file_size, $extensionesValidas);
                
                if(is_array($resultadoSubida)){
                    $resultado=print_r($resultadoSubida);
                    require_once __DIR__ . '/../Vista/templates/bienvenido.php';
                
                
                }else{
                    
                    $trozos=explode(',', $resultadoSubida);
                    $resultado= "SUBIDA CORRECTA";
                    
                    
                    $idUsuario=$m->getId($_SESSION['nombre']);
                    $m->archivo($idUsuario, $trozos[1] , $trozos[0], $tipo);
                    
                    $res=$m->getArchivos($idUsuario);
                    
                    require_once __DIR__ . '/../Vista/templates/bienvenido.php';
                }
            }
        }else{
           
            require_once __DIR__ . '/../Vista/templates/bienvenido.php';
        }
    }
    public function nosotros(){
        require_once __DIR__ . '/../Vista/templates/nosotros.php';
    }
    
 
}




?>