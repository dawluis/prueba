<?php
include ('config.php');
/*
 * En este caso utilizamos un uso de la conexión adaptada al patrón Singletón
 */
class modelo extends PDO
{

    private static $instance = null;

    // El constructor se encarga de crear la conexión
    public function __construct()
    {

        /* Los datos de la conexión los tomamos de config */
        parent::__construct('mysql:host=' . Config::$hostname . ';dbname=' . Config::$nombre . '', Config::$usuario, Config::$clave);
        parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        parent::exec("set names utf8");
    }

    /*
     * Para crear el objeto usando SINGLETON se utiliza este metodo
     * que comprueba si existe una conexión a la BD para aprovecharla, sino
     * existe llama al constructor para que cree la conexión
     */
    public static function GetInstance()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getUsuario($usuario)
    {
        $consulta = "SELECT * FROM usuarios WHERE usuario=:usuario";
        $result = $this->prepare($consulta);
        $result->bindParam(':usuario', $usuario);
        $result->execute();
        return $result;
    }
}
?>