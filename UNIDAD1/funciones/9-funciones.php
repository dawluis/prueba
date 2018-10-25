<?php
function potencia($num, $num2){
    if($num2==0){
        return 1;
    }else{
    return $num*potencia($num, --$num2);
    }
}
echo potencia(5, 4);
?>