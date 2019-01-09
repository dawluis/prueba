<?php
require_once __DIR__ . '/../Controlador/controller.php';

$map = array(
    'inicio'=> array('controller' => 'Controller', 'action'=>'inicio', 'acceso'=>0),
    'registro'=> array('controller' => 'Controller', 'action'=>'registro' , 'acceso'=>0),
    'login'=> array('controller' => 'Controller', 'action'=>'login' , 'acceso'=>0),
    'subir'=> array('controller' => 'Controller', 'action'=>'subir', 'acceso'=>1),
    'destroy'=> array('controller' => 'Controller', 'action'=>'destroy', 'acceso'=>1),
    'nosotros'=> array('controller' => 'Controller', 'action'=>'nosotros', 'acceso'=>0),
    'delete'=> array('controller' => 'Controller', 'action'=>'delete', 'acceso'=>1),
    'mood'=> array('controller' => 'Controller', 'action'=>'mood', 'acceso'=>1)
);

if (isset($_GET['ctl'])) {
    if (isset($map[$_GET['ctl']])) {
        $ruta = $_GET['ctl'];
    } else {
        //Si la opción seleccionada no existe en el array de mapeo, mostramos pantalla de error
        header('Status: 404 Not Found');
        echo '<html><body><h1>Error 404: No existe la ruta <i>' .
            $_GET['ctl'] .'</p></body></html>';
            exit;
    }
} else {
    //Si no se ha seleccionado nada mostraremos pantalla de inicio
    $ruta = 'inicio';
}

$controlador = $map[$ruta]; 
// Ejecución del controlador asociado a la ruta
if (method_exists($controlador['controller'] , $controlador['action'])) {
    session_start();
    //es Publico
    if($controlador['acceso']===0){
        call_user_func(array(new $controlador['controller'], $controlador['action']));
    }else{
        if(isset($_SESSION['nombre'])){
            call_user_func(array(new $controlador['controller'], $controlador['action']));
        }else{
            $controlador=$map['login'];
            call_user_func(array(new $controlador['controller'], $controlador['action']));
        }
    }
    
} else {
    //Si no existe controlador asociado a la acción, mostramos pantalla de error
    header('Status: 404 Not Found');
    echo '<html><body><h1>Error 404: El controlador <i>' .
        $controlador['controller'] .'->' .$controlador['action'] .'</i> no existe</h1></body></html>';
}

?>