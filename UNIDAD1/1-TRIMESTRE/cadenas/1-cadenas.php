<?php
$correo="sf@zaad.com";
$prueba=substr($correo, 8,9);
//CONTAMOS EL NUMERO DE VECES QUE COINCIDE CON LA @
$vecesArroba= substr_count($correo, "@");
//BUSCAMOS LA POSICION DE LA @
$posicion= mb_strpos($correo,"@");
$parte1=substr($correo,0,$posicion);
$posicionPunto= mb_strpos($correo,".");
$parte2=substr($correo,$posicion,$posicionPunto);
$parte2=substr($correo,$posicion+1,$posicionPunto);
$antesdelPunto=strlen($parte2);
$antesdelArroba=strlen($parte1);
$resta=$posicionPunto-$posicion;


if($vecesArroba > 1){
    echo"EXISTE MAS DE UNA @ EN EL CORREO";
            
}else if($antesdelArroba < 2 ){
    echo "EL CORREO DEBE CONTENER ALMENOS 2 CARACTERES ANTES DE LA @";
}else if($resta < 3){
    echo "EL CORREO DEBE CONTENER ALMENOS 2 CARACTERES ANTES DEL PUNTO";
}else{
    echo"EL CORREO ES CORRECTO!<br>NOMBRE DE USUARIO: $parte1 <br>NOMBRE DEL DOMINIO: $parte2";
        
}
   

/*
echo "VECES QUE ESTA LA @ EN LA CADENA : $vecesArroba <br>";
echo "CARACTERES ANTES DE LA ARROBA : $antesdelArroba <br>";
echo "CARACTERES ANTES DE EL PUNTO : $antesdelPunto <br>";
*/

?>