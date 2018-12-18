<?php
require_once 'config.php';
require_once 'bGeneral.php';
class Modelo extends PDO{
    
    private static $instance=null;
    
    public function __construct(){
        parent::__construct('mysql:host=' .Config :: $hostname. ';dbname=' . Config::$dbName . '', Config::$dbUserName, Config::$dbPassword);
        parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        parent::exec("set names utf8");
    }
    
    public static function GetInstance(){
        if(self::$instance==null){
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function getAll(){
        $consulta="SELECT * FROM usuarios";
        $resultado= $this->prepare($consulta);/*que significa el this?*/
        $resultado->execute();
        return $resultado;
    }
    
    public function registroUsuario($user,$contraCrip){
        $sql="INSERT INTO usuarios (usuario,password) VALUES (:user, :contrasena)";
        $preparada=$this->prepare($sql);
        $preparada->bindParam(':user', $user);
        $preparada->bindParam(':contrasena', $contraCrip);
        $preparada->execute();    
    }
    
    public function registroAmigos($usuarioAmigo,$emailAmigo,$id_amigo){
        $sql="INSERT INTO amigos (nombre_amigo,email,id_usuario) VALUES (:nombre_amigo, :email, :id_usuario)";
        $preparada1=$this->prepare($sql);
        $preparada1->bindParam(':nombre_amigo', $usuarioAmigo);
        $preparada1->bindParam(':email', $emailAmigo);
        $preparada1->bindParam(':id_usuario', $id_amigo);
        $preparada1->execute();
    }
    
    public function login($user,$passwd){
        $sql="SELECT password FROM usuarios WHERE usuario=:user";
        $prep=$this->prepare($sql);
        $prep->bindParam(':user', $user);
        $res=$prep->execute();
        $contadorLineas=$prep->rowCount();
        
        if($contadorLineas == 1){
            while($result = $prep->fetch()){
                $contrasena = $result['password'];
            }
            $encriptada=crypt_blowfish($passwd);
            
            if($encriptada==$contrasena){
                return true;
                
            }else{
                $errores="CONTRASEÑA INCORRECTA";
                return $errores;
            }
        }else{
            $errores="USUARIO NO REGISTRADO";
            return $errores;
        }
    }
    
    
    
    
}



?>
