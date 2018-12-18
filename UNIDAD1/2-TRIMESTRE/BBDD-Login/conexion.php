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
    
}



?>
