<?php


function recorreDir($carpeta){
 $vector=[];
if(is_dir($carpeta)){
$dir=opendir($carpeta);

while($archivo = readdir($dir)){
    if($archivo=="."||$archivo==".."){   
    }else{
        if(is_dir($carpeta."/".$archivo)){
            $car=$carpeta."/".$archivo;
            $vector[]=recorreDir($car);
        }else{
            $vector[]=$archivo;
        }
    }
}
return $vector;
closedir($dir);   
}
}

$carpeta='carpeta';

$array=recorreDir($carpeta);

if(is_array($array)){
   echo count($array);
}else{
    echo "nada";
}

?>