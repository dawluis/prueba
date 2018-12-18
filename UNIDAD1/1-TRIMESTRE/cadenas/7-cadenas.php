<?php
$cadena="ApRendEr proGraMarciÓnn";
//PASAMOS LA CADENA A MINUSCULAS
$minus=mb_strtolower($cadena);
//CALCULAMOS SU LONGITUD
$long=mb_strlen($cadena);
//SACAMOS LAS MITADES
$mitadPar=$long/2;
$mitadImpar=($long/2)+1;

if($long%2==0){ 
    //RELLENAMOS UN ARRAY CON EL CARACTER *
    $rellenoPar=array();
    for($i=1 ; $i <= $mitadPar ; $i++){
        $rellenoPar[$i]="*";
    }
    //CONVERTIMOS ARRAY EN STRING
    $string1=implode("",$rellenoPar);
    //CONCATENAMOS LOS *
    echo $string1.$minus.$string1;   
}

else{
    //RELLENAMOS UN ARRAY CON EL CARACTER *
    $rellenoImpar=array();
    for($i=1 ; $i <= $mitadImpar ; $i++){
        $rellenoImpar[$i]="*";
    }
    //CONVERTIMOS ARRAY EN STRING
    $string2=implode("",$rellenoImpar);
    //CONCATENAMOS LOS *
    echo $string2.$minus.$string2;
}
?>