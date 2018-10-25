<?php
$num1= intval($_REQUEST['numeroMenor']);
$num2= intval($_REQUEST['numeroMayor']);
$tipo=$_REQUEST['tipoDeOperacion'];
$resultado;


switch($tipo){
    case "+":
        
        echo "El resultado de la SUMA  de $num1 y $num2 es: ";
        
        $resultado=$num1+$num2;
        
        break;
    
    case "-":
         echo "El resultado de la RESTA  de $num1 y $num2 es: ";
        $resultado=$num1-$num2;
        
        break;
    
    case "/":
        echo "El resultado de la DIVISION  de $num1 y $num2 es: ";
        $resultado=$num1/$num2;
        
        break;
    
    case "*":
        echo "El resultado de la MULTIPLICACION  de $num1 y $num2 es: ";
        $resultado= $num1*$num2;
        
        break;
}

echo $resultado."<br>";
echo"<a href='4-form.html'>VOLVER</a>";

?>
