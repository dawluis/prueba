<?php

function devuelveDir($rutaDir){
    $dir=opendir($rutaDir);
    $array=[];
    while($archivo = readdir($dir)){  
        $array[]=$archivo;
    }
    return $array;

    closedir($dir);
}


function devuelveDirSubDir($rutaDir){
    
    $dir=opendir($rutaDir);
    $array=[];
    while($archivo=readdir($dir)){
        
        if($archivo!="." && $archivo!=".."){
        
            if(is_dir($archivo)){
            /*$rutaSub=$rutaDir."/".$archivo;
            $subDir=opendir($rutaSub);
            while ($elemento=readdir($subDir)){
                $array[]=$rutaDir."/".$archivo."/".$elemento;
                
            }*/
            
            echo "sadadsasdasdasdsad";
            }else{
                $array[]=$rutaDir."/".$archivo;
            }
      
        }else{
            
        }
        
       
        
    }
    
    
    return $array;
}

$rutaDir="carpeta";
print_r(devuelveDirSubDir($rutaDir));






?>