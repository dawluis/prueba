<?php

require_once "libs/utils.php";
require_once 'libs/bGeneral.php';

class Controller{
    
    public function inicio(){
        require_once __DIR__. '/templates/inicio.php';
    }
    
    public function post(){
        require_once __DIR__. '/templates/post.php';
    }
    public function addPost(){
        $autor= $_POST['autor'];
        $titulo= $_POST['titulo'];
        $contenido= $_POST['contenido'];
        $time=time();
        
        $fecha=date("d-m-Y");
        
        $m= new Model();
        $result=$m->insertaPost($autor,$titulo,$contenido);
        if($result){
            
            $noticias = new SimpleXMLElement('../app/noticias.xml', 0, true);
            $nuevaNoticia=$noticias->channel->addChild('item');
            $nuevaNoticia->addChild("autor", $autor);
            $nuevaNoticia->addChild("titulo", $titulo);
            $nuevaNoticia->addChild("contenido", $contenido);
            $nuevaNoticia->addChild("fecha_publicacion", $fecha);
            $noticias->asXML('../app/noticias.xml');
            require_once __DIR__. '/templates/resultPost.php';
            
        }else{
            require_once __DIR__. '/templates/post.php';
        }
        
    }
    
    
}





?>
