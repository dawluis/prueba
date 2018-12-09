<?php


class Operaciones{
    public function MediaArray($array){
        $sumatorio=0;
        foreach($array as $index){
            $sumatorio+=$index;
        }
        $media=$sumatorio/count($array);
        return $media;
    }
    
}



?>