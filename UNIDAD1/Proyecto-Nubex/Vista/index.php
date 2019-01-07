<?php
require_once __DIR__ . '/../Controlador/controller.php';

$map = array(
    'inicio'=> array('controller' => 'Controller', 'action'=>'inicio'),
    'registro'=> array('controller' => 'Controller', 'action'=>'registro'),
    'login'=> array('controller' => 'Controller', 'action'=>'login'),
    'subir'=> array('controller' => 'Controller', 'action'=>'subir'),
    'destroy'=> array('controller' => 'Controller', 'action'=>'destroy'),
    'nosotros'=> array('controller' => 'Controller', 'action'=>'nosotros'),
    'delete'=> array('controller' => 'Controller', 'action'=>'delete')
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
    call_user_func(array(new $controlador['controller'], $controlador['action']));
} else {
    //Si no existe controlador asociado a la acción, mostramos pantalla de error
    header('Status: 404 Not Found');
    echo '<html><body><h1>Error 404: El controlador <i>' .
        $controlador['controller'] .'->' .	$controlador['action'] .'</i> no existe</h1></body></html>';
}

?>