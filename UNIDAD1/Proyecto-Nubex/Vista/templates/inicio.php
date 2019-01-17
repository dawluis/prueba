<?php ob_start() ?>
<img class="img-nosotros" src="img/portada.jpg" alt="">
<h3> <?php echo $params['mensaje']."<br>";?> </h3> 
<hr>
<h4>Archivos Públicos</h4> 
<?php
$publicos=$m->getArchivosPublicos();

while($resultado = $publicos->fetch()){
    $id=$resultado['id_usuario'];
    $nombre=$m->getNombre($id);
    $arrayTodo[]="<div class='caja-archivo'>Nombre del archivo:<br><a href='../Archivos/".$nombre."/".$resultado['nombre_archivo']."' download>".$resultado['nombre_archivo']."</a><br><hr>Subido por: <u>".$nombre."</u><br> Fecha de subida:<br>".$resultado['fecha_subida']."<hr><a href='../Archivos/".$nombre."/".$resultado['nombre_archivo']."' download><img class='img-archivo' src='img/save.png' width='50px'></a></div>";
}
if(isset($arrayTodo)){
    if(count($arrayTodo)>0){
        for($i=count($arrayTodo)-1; $i>=0 ; $i--){
            echo $arrayTodo[$i];
        }
    }
    
}else{
    echo"TODAVIA NO HAY ARCHIVOS PUBLICADOS";
}

?>
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?> 