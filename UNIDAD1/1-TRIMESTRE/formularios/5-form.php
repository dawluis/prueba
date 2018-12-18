<?php

$num1= intval($_REQUEST['numeroMenor']);
$num2= intval($_REQUEST['numeroMayor']);


$resultado=0;

if(isset($_REQUEST['tipo'])){
    $tipo=$_REQUEST['tipo'];
    for($i=0; $i < count($tipo); $i++){
        switch($tipo[$i]){
            case "+":
                $resultado=$num1+$num2;
                echo "El resultado de la SUMA  de $num1 y $num2 es: $resultado <br>";
                
                break;
                
            case "-":
                $resultado=$num1-$num2;
                echo "El resultado de la RESTA  de $num1 y $num2 es: $resultado <br>";
                
                break;
                
            case "/":
                $resultado=$num1/$num2;
                echo "El resultado de la DIVISION  de $num1 y $num2 es: $resultado <br>";
                
                
                break;
                
            case "*":
                $resultado= $num1*$num2;
                echo "El resultado de la MULTIPLICACION  de $num1 y $num2 es: $resultado <br>";
                
                break;
        }}}else{
            echo "INTRODUZCA TIPO DE OPERACION";
        }
    
    echo"<a href='5-form.html'>VOLVER</a>";

?>
