<?php
require_once __DIR__ . '/../app/Config.php';
require_once __DIR__ . '/../app/Model.php';
require_once __DIR__ . '/../app/Controller.php';



$map = array(
    'inicio' => array('controller' =>'Controller', 'action' =>'inicio'),
    'post' => array('controller' =>'Controller', 'action' =>'post'),
    'addPost' => array('controller' =>'Controller', 'action' =>'addPost')
);

if(isset($_GET['ctl'])){
    if(isset($map[$_GET['ctl']])){
        $ruta=$_GET['ctl'];
    }else{
        $ruta= 'inicio';
    }
}else{
    $ruta= 'inicio';
}

$controlador=$map[$ruta];

if(method_exists($controlador['controller'], $controlador['action'])){
    call_user_func(array(new $controlador['controller'], $controlador['action']));
}else {
    //Si no existe controlador asociado a la acción, mostramos pantalla de error
    header('Status: 404 Not Found');
    echo '<html><body><h1>Error 404: El controlador <i>' .
        $controlador['controller'] .'->' .	$controlador['action'] .'</i> no existe</h1></body></html>';
}




?>