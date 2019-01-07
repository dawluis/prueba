<?php ob_start();
if(isset($_SESSION['nombre'])){
?>
<h1>Bienvenido <?php echo $_SESSION['nombre']?></h1>
<h4>Subir un archivo</h4>
 <form action="index.php?ctl=subir" method="POST" class="form-container" enctype="multipart/form-data">
 	 Publico <input type="radio" name="tipo" value="publico">
 	 Privado <input type="radio" name="tipo" value="privado" checked>
     <input type="file" name="archivo">
     <?php if(isset($resultado)&& $resultado!=1){echo $resultado."<br>";}?>
     <input type="submit" name="enviar" value="SUBIR">
 </form>

<h3>Tus archivos subidos</h3>
<?php 
while($resultado = $res->fetch()){
    echo "<div class='caja-archivo'>
            Nombre del archivo:<br>
            <a href='/../UNIDAD1/Proyecto-Nubex/Archivos/".$_SESSION['nombre']."/".$resultado['nombre_archivo']."' download>".$resultado['nombre_archivo']."</a><br>
            Fecha de subida:<br>".$resultado['fecha_subida']."
            <hr>
            <a href='/../UNIDAD1/Proyecto-Nubex/Archivos/".$_SESSION['nombre']."/".$resultado['nombre_archivo']."' download><img class='img-archivo' src='img/save.png' width='50px'></a>
            <hr>
            <form action='index.php?ctl=mood' method='POST'>
                <hidden>/../UNIDAD1/Proyecto-Nubex/Archivos/".$_SESSION['nombre']."/".$resultado['nombre_archivo']."</hidden>//METER AQUI LA INFORMACION DEL TITULO OCULTO PARA SU POSTERIOR BORRADO  
                <input type='submit' name='borrar' value='delete'>
            </form>

</div>";
}
?>

<?php $contenido = ob_get_clean();
}else{
    $contenido = "NECESITA ESTAR LOGEADO PARA ACCEDER A ESTA PAGINA";
}

?>
<?php include 'layout.php' ?>