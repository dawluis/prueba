<?php ob_start();
if(isset($_SESSION['nombre'])){
?>
<h1>Bienvenido <?php echo $_SESSION['nombre']?></h1>
<h4>Subir un archivo</h4>
<?php if(isset($mensaje)){echo $mensaje;}?>
 <form action="index.php?ctl=subir" method="POST" class="form-subida" enctype="multipart/form-data">
 	 Publico <input type="radio" name="tipo" value="publico">
 	 Privado <input type="radio" name="tipo" value="privado" checked>
     <input type="file" name="archivo">
     <?php if(isset($resultado) && $resultado!=1){
         if(is_array($resultado)){
            foreach($resultado as $value){
                echo "<span style='color:red;'>$value</span>";
            }
         }else{
         echo $resultado."<br>";}}?>
     <input type="submit" name="enviar" value="SUBIR">
 </form>

<h3>Tus archivos subidos</h3>
<?php 
while($resultado = $res->fetch()){
    if($resultado['tipo_archivo']=="publico"){
        $tipoArchivo="Privatizar";
    }else{
        $tipoArchivo="Publicar";
    }
    echo "<div class='caja-archivo'>
            <u>Nombre del archivo:</u><br>
            <a href='/../UNIDAD1/Proyecto-Nubex/Archivos/".$_SESSION['nombre']."/".$resultado['nombre_archivo']."' download>".$resultado['nombre_archivo']."</a><br>
            <u>Fecha de subida:</u><br>".$resultado['fecha_subida']."<br>
            <u>Tipo de archivo:</u> ".$resultado['tipo_archivo']."<br><br>
            <div class='two-forms'>
                <form action='index.php?ctl=delete' method='POST' class='formOne'>
                    <input type='hidden' name='rutaArchivo' value='../Archivos/".$_SESSION['nombre']."/".$resultado['nombre_archivo']."'>
                    <input type='hidden' name='nombreArchivo' value='".$resultado['nombre_archivo']."'>
                    <input type='submit' name='borrar' value='Eliminar'>
                </form>
                <form action='index.php?ctl=mood' method='POST' class='formTwo'>
                    <input type='hidden' name='tipoArchivo' value='".$resultado['tipo_archivo']."'>
                    <input type='hidden' name='rutaArchivo' value='../Archivos/".$_SESSION['nombre']."/".$resultado['nombre_archivo']."'>
                    <input type='hidden' name='nombreArchivo' value='".$resultado['nombre_archivo']."'>
                    <input type='submit' name='mood' value='".$tipoArchivo."'>
                </form>
            </div>
            <hr>
            <u><h4>Descargar</h4><br></u>
            <a href='/../UNIDAD1/Proyecto-Nubex/Archivos/".$_SESSION['nombre']."/".$resultado['nombre_archivo']."' download><img class='img-archivo' src='img/save.png' width='50px'></a>


</div>";
}
?>

<?php $contenido = ob_get_clean();
}else{
    $contenido = "NECESITA ESTAR LOGEADO PARA ACCEDER A ESTA PAGINA";
}

?>
<?php include 'layout.php' ?>