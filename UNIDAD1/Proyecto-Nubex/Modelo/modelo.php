<?php
require_once 'config.php';
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
        $resultado= $this->prepare($consulta);
        $resultado->execute();
        return $resultado;
    }
    
    public function registroUsuario($nombreUsuario,$contraCrip,$email){
        $sql="INSERT INTO usuarios (nombre, contrasena, email) VALUES (:nombre, :contrasena, :email)";
        $preparada=$this->prepare($sql);
        $preparada->bindParam(':nombre', $nombreUsuario);
        $preparada->bindParam(':contrasena', $contraCrip);
        $preparada->bindParam(':email', $email);
        
        try{
            $resultado=$preparada->execute();
            return $resultado;
        }catch(PDOException $e){
            if($e->getCode() == 23000){
                $error="El usuario ya existe en el sistema";
                return $error;
            }else{
                return $e->getMessage();
            }
        }
       
    }
    
    public function login($nombreUsuario,$contrasena){
        $sql="SELECT contrasena FROM usuarios WHERE nombre= :nombreUsuario";
        $prep=$this->prepare($sql);
        $prep->bindParam(':nombreUsuario', $nombreUsuario);
        $res=$prep->execute();
        $contadorLineas=$prep->rowCount();
        
        if($contadorLineas == 1){
            while($result = $prep->fetch()){
                $passwd = $result['contrasena'];
            }
            $encriptada=crypt_blowfish($contrasena);
            
            if($encriptada==$passwd){
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
    
    public function getId($nombreUsuario){
       $sql="SELECT id_usuario FROM usuarios WHERE nombre= :nombreUsuario";
       $prep=$this->prepare($sql);
       $prep->bindParam(':nombreUsuario', $nombreUsuario);
       $prep->execute();
       while($result = $prep->fetch()){
           $id = $result['id_usuario'];
       }
       return $id;
        
    }
    
    public function archivo($idUsuario, $nombreArchivo, $ruta, $tipo){
        $sql="INSERT INTO archivos (id_usuario, nombre_archivo, ruta_archivo, tipo_archivo) VALUES (:id_usuario, :nombre_archivo, :ruta_archivo, :tipo_archivo)";
        $prep=$this->prepare($sql);
        $prep->bindParam(':id_usuario', $idUsuario);
        $prep->bindParam(':nombre_archivo', $nombreArchivo);
        $prep->bindParam(':ruta_archivo', $ruta);
        $prep->bindParam(':tipo_archivo', $tipo);
        $res=$prep->execute();
        
    }
    
    public function getArchivos($idUsuario){
        $sql="SELECT nombre_archivo,ruta_archivo,fecha_subida,tipo_archivo FROM archivos WHERE id_usuario= :id_usuario ORDER BY fecha_subida desc";
        $prep=$this->prepare($sql);
        $prep->bindParam(':id_usuario', $idUsuario);
        $prep->execute();
        return $prep;
    }
    
    public function getArchivosPublicos(){
        $sql="SELECT nombre_archivo,ruta_archivo,id_usuario,fecha_subida FROM archivos WHERE tipo_archivo='publico'";
       
        $consultaPublicos=$this->query($sql);        
       
        return $consultaPublicos;
    }
    
    public function getNombre($id){
        $sql="SELECT nombre FROM usuarios WHERE id_usuario=$id";
        $resultado=$this->query($sql);
        
        while($res = $resultado->fetch()){
            $nombre=$res['nombre'];
        }
        
        return $nombre;
       
        
    }
    
    public function deleteArchivo($nombreArchivo){
        $sql="DELETE FROM archivos WHERE nombre_archivo= :nombreArchivo";
        $prep=$this->prepare($sql);
        $prep->bindParam(':nombreArchivo', $nombreArchivo);
        $resultado=$prep->execute();
        return $resultado;
    }
    
    public function moodArchivo($nombreArchivo,$tipoArchivo){
        $sql="UPDATE archivos SET tipo_archivo=:tipoArchivo WHERE nombre_archivo= :nombreArchivo";
        $prep=$this->prepare($sql);
        $prep->bindParam(':tipoArchivo', $tipoArchivo);
        $prep->bindParam(':nombreArchivo', $nombreArchivo);
        $resultado=$prep->execute();
        return $resultado;
    }
    
    
    
}

?>