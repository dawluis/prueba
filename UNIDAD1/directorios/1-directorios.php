<?php

function devuelveDir($rutaDir){
    $dir=opendir($rutaDir);
    $array=[];
    while($archivo = readdir($dir)){
        if($archivo!="." && $archivo!=".."){
            $array[]=$archivo;
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
                $subDir=opendir($rutaSub);
            
                while ($elemento=readdir($subDir)){
                    
                    if($elemento!="." && $elemento!=".."){
                    
                        $array[]=$rutaDir."/".$archivo."/".$elemento;
                    }
                }
            }else{
                $array[]=$rutaDir."/".$archivo;
            }
        }  
    } 
    return $array;
}






?>