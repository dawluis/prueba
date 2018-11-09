<?php
function devuelveDir($rutaDir){
    $dir=opendir($rutaDir);
    $array=[];
    while($archivo = readdir($dir)){
        if($archivo!="." && $archivo!=".."){
            if(is_file($rutaDir."/".$archivo)){
                $array[]=$archivo;
            }
        }
    }
    return $array;

    closedir($dir);
}


function devuelveDirSubDir($rutaDir){
    
    $dir=opendir($rutaDir);
    $array=[];
    while($archivo=readdir($dir)){
        
        if($archivo!="." && $archivo!=".."){
            if(is_dir($rutaDir."/".$archivo)){
                $rutaSub=$rutaDir."/".$archivo;
                $array[]=devuelveDirSubDir($rutaSub);
            }else{
                $array[]=$rutaDir."/".$archivo;
            }
        }
    }
    closedir($dir);
    return $array;
}

function recorreArrayMultiDimensional($arrayMulti){
    foreach($arrayMulti as $index =>$valor){
        
        if(is_array($valor)){
            
            foreach($valor as $indice =>$dato){
                
                echo"[$index] [$indice] : $dato <br>";
                
            }
            
            
        }else{
            echo"[$index] : $valor <br>";
            
        }
    }
}
/*
$arrayMulti= Array(
    20,30,40,
    array(1,2,3,4,5),
    array(6,7,8,9,10)
    );

recorreArrayMultiDimensional($arrayMulti);
*/
























?>